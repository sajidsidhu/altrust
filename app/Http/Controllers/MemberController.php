<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Mail\SimpleMail;
use App\Http\Controllers\Controller;
use App\Models\Advisers;
use App\Models\Member;
use App\Models\Memberdetail;
use App\Models\Fpt;
use App\Models\User;
use App\Models\pensionmanagement;
use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
 
    public function viewMember($scheme) {
        $schemeName = addslashes($scheme);
        $apiUrl = "https://prod-08.northcentralus.logic.azure.com:443/workflows/88ad918d7f9644ee8c6835121cfb0069/triggers/When_a_HTTP_request_is_received/paths/invoke?api-version=2016-10-01&sp=%2Ftriggers%2FWhen_a_HTTP_request_is_received%2Frun&sv=1.0&sig=ZP1zTl5H29ovAluQrmd820nGHViP7UxlcrcYYuuLOOs";
        try {
    
    $policyQuery = [
        "query" => "SELECT TOP 100  
    p.ID AS PolicyID,  
    p.REFERENCE AS SchemeName,  
    p.RECEIVEDDATE AS PlanCommencementDate,  
    m.NINUMBER AS NationalInsuranceNumber,  
    c.ID AS ContactID,  
    c.TITLE AS Title,  
    c.FIRSTNAME AS FirstName,  
    c.MIDDLENAME AS MiddleName,  
    c.SURNAME AS Surname,  
    c.DATEOFBIRTH,  
    c.NAME AS Name,  
    v.Scheme_Name AS ProductName  
FROM  
    T_POLICY p  
JOIN T_MEMBER m ON p.MEMBER_MEMBER_ID = m.MEMBER_ID  
JOIN T_CONTACT c ON c.ID = m.CONTACTDETAILS_ID  
LEFT JOIN T_PORTFOLIO port ON p.ID = port.POLICY_ID  
LEFT JOIN IA_V_POLICY_SCHEME v ON p.ID = v.Policy_ID  
WHERE p.REFERENCE = '$schemeName';"


    ];
            $policyResponse = Http::timeout(10)->post($apiUrl, ["query" => $policyQuery["query"]]);
    
            if (!$policyResponse->successful()) {
                return back()->with('error', 'Failed to fetch policy data.');
            }
    
            $member = $policyResponse->json()['ResultSets']['Table1'][0] ?? null;
         
            if (!$member) {
                return back()->with('error', 'No member data found.');
            }
    
            // ✅ 2nd API Call – Fetch Address & Contact Details
           if (!empty($member['ContactID'])) {
        $contactID = addslashes($member['ContactID']);
    
        $addressQuery = [
            "query" => "SELECT  
                            ca.SUBBUILDING,  
                            ca.BUILDING,  
                            ca.LINE1,  
                            ca.LINE2,  
                            ca.LINE3,  
                            ca.TOWN,  
                            ca.COUNTY,  
                            ca.POSTCODE,  
                            ca.COUNTRY,  
                            cm1.VALUE AS Email,  
                            cm2.VALUE AS PhoneNo  
                        FROM  
                            T_CONTACTADDRESS ca  
                        LEFT JOIN T_CONTACTMETHOD cm1 
                            ON cm1.CONTACTDETAILS_ID = ca.CONTACT_ID 
                            AND cm1.LABEL IN ('E-mail', 'E-mail 2', 'E-mail 3', 'Primary')  
                        LEFT JOIN T_CONTACTMETHOD cm2 
                            ON cm2.CONTACTDETAILS_ID = ca.CONTACT_ID 
                            AND cm2.LABEL IN ('Mobile', 'Home', 'Business', 'Home 2', 'Business 2', 'Reception')  
                        WHERE ca.CONTACT_ID = '$contactID' 
                            AND ca.EFFECTIVETO IS NULL  
                        ORDER BY ca.ID DESC;"
        ];
    
        $addressResponse = Http::timeout(10)->post($apiUrl, ["query" => $addressQuery["query"]]);
    
        if ($addressResponse->successful()) {
            $addressRecords = $addressResponse->json()['ResultSets']['Table1'] ?? [];
    
            if (!empty($addressRecords)) {
                $uniqueAddresses = [];
                $email = 'N/A';
                $phone = 'N/A';
    
                foreach ($addressRecords as $i => $a) {
                    $singleAddress = implode(', ', array_filter([
                        $a['SUBBUILDING'] ?? '',
                        $a['BUILDING'] ?? '',
                        $a['LINE1'] ?? '',
                        $a['LINE2'] ?? '',
                        $a['LINE3'] ?? '',
                        $a['TOWN'] ?? '',
                        $a['COUNTY'] ?? '',
                        $a['POSTCODE'] ?? '',
                        $a['COUNTRY'] ?? '',
                    ]));
    
                    if (!empty($singleAddress) && !in_array($singleAddress, $uniqueAddresses)) {
                        $uniqueAddresses[] = $singleAddress;
                    }
    
                    if ($i === 0) {
                        $email = $a['Email'] ?? 'N/A';
                        $phone = $a['PhoneNo'] ?? 'N/A';
                    }
                }
    
                $member['Address'] = implode("\n", $uniqueAddresses);
                $member['Email'] = $email;
                $member['PhoneNo'] = $phone;
            }
        }
    }
    
    
    
$schemeName = addslashes($scheme);
$yearFilterFtat = '';
$yearFilterFt = '';
$filterStatus = ''; // Will only be set if scheme doesn't start with M0000

if (strpos($schemeName, 'M000') !== 0) {
    $yearFilterFtat = "AND YEAR(ftat.TRANSACTIONDATE) = 2025";
    $yearFilterFt = "AND YEAR(ft.TRANSACTIONDATE) = 2025";
    $filterStatus = 'Contribution History available from 2025 if you require details of your contributions please contact us.';
}

if (!empty($member['PolicyID'])) {
    $policyID = addslashes($member['PolicyID']);

    $contributionQuery = [
        "query" => "
            SELECT DISTINCT * FROM (
                SELECT 
                    ftat.TRANSACTIONDATE AS Date,
                    ftat.TYPENAME AS Type,
                    tc.CATEGORYNAME AS Category,
                    ftat.NARRATIVE AS Narrative,
                    ftat.NETAMOUNT AS NetAmount,
                    ftat.TRANSACTIONDATE AS SortDate
                FROM 
                    [dbo].[IA_V_FINANCIALTRANSACTIONANDTYPE] ftat
                INNER JOIN 
                    [dbo].[T_FINANCIALTRANSACTION] ft ON ftat.FINANCIALTRANSACTION_ID = ft.ID
                INNER JOIN 
                    [dbo].[T_POLICY] p ON ft.POLICYID = p.ID
                INNER JOIN 
                    [dbo].[V_TRANSACTIONTYPE] tt ON ft.TRANSACTIONTYPEID = tt.ID
                INNER JOIN 
                    [dbo].[T_TRANSACTIONCATEGORY] tc ON tt.TRANSACTIONCATEGORYID = tc.ID
                WHERE 
                    p.ID = '$policyID'
                    AND tc.CATEGORYNAME = 'Contribution'
                    $yearFilterFtat

                UNION ALL

                SELECT 
                    ft.TRANSACTIONDATE AS Date,
                    ftat.TYPENAME AS Type,
                    tc.CATEGORYNAME AS Category,
                    ftat.NARRATIVE AS Narrative,
                    ft.NETAMOUNT AS NetAmount,
                    ft.TRANSACTIONDATE AS SortDate
                FROM 
                    [dbo].[T_CONTRIBUTIONTAXCLAIM] ctc
                INNER JOIN 
                    [dbo].[T_FINANCIALTRANSACTION] ft ON ctc.CONTRIBUTIONTRANSACTIONID = ft.ID
                INNER JOIN 
                    [dbo].[T_POLICY] tp ON ctc.POLICYID = tp.ID
                LEFT JOIN 
                    [dbo].[IA_V_FINANCIALTRANSACTIONANDTYPE] ftat ON ft.ID = ftat.FINANCIALTRANSACTION_ID
                INNER JOIN 
                    [dbo].[V_TRANSACTIONTYPE] tt ON ft.TRANSACTIONTYPEID = tt.ID
                INNER JOIN 
                    [dbo].[T_TRANSACTIONCATEGORY] tc ON tt.TRANSACTIONCATEGORYID = tc.ID
                WHERE 
                    tp.ID = '$policyID'
                    AND tc.CATEGORYNAME = 'Contribution'
                    $yearFilterFt

                UNION ALL

                SELECT 
                    ft.TRANSACTIONDATE AS Date,
                    tt.TYPENAME AS Type,
                    tc.CATEGORYNAME AS Category,
                    ft.Narrative AS Narrative,
                    ft.NETAMOUNT AS NetAmount,
                    ft.TRANSACTIONDATE AS SortDate
                FROM 
                    [dbo].[T_FINANCIALTRANSACTION] ft
                INNER JOIN 
                    [dbo].[T_POLICY] p ON ft.POLICYID = p.ID
                LEFT JOIN 
                    [dbo].[V_TRANSACTIONTYPE] tt ON ft.TRANSACTIONTYPEID = tt.ID
                LEFT JOIN 
                    [dbo].[T_TRANSACTIONCATEGORY] tc ON tt.TRANSACTIONCATEGORYID = tc.ID
                WHERE 
                    p.ID = '$policyID'
                    AND ft.Narrative LIKE '%Contribution%'
                    $yearFilterFt
            ) AS CombinedResults
            ORDER BY SortDate DESC;
        "
    ];

    $contributionResponse = Http::timeout(30)->post($apiUrl, ["query" => $contributionQuery["query"]]);

    if ($contributionResponse->successful()) {
        $contributionData = $contributionResponse->json()['ResultSets']['Table1'] ?? [];

        // Add FilterStatus to each row only if filter applied
        if (!empty($filterStatus)) {
            $contributionData = array_map(function ($row) use ($filterStatus) {
                $row['FilterApplied'] = $filterStatus;
                return $row;
            }, $contributionData);
        }

        $member['contribution_transactions'] = $contributionData;
        $member['filter_status'] = $filterStatus;
    } else {
        \Log::error("Failed to fetch contribution transactions for PolicyID: $policyID - " . $contributionResponse->body());
        $member['contribution_transactions'] = [];
        $member['filter_status'] = '';
    }
}




    
            // ✅ 4th API Call – Fetch Beneficiary Data
            if (!empty($member['PolicyID'])) {
                $beneficiaryQuery = [
    "query" => "SELECT  
                    COALESCE(
                        NULLIF(LTRIM(RTRIM(bc.NAME)), ''),  
                        bc.TITLE + ' ' + bc.FIRSTNAME + ' ' + ISNULL(bc.MIDDLENAME + ' ', '') + bc.SURNAME
                    ) AS BeneficiaryName,  
                    b.RELATIONSHIP AS BeneficiaryRelationship,  
                    b.PERCENTAGE AS BeneficiaryPercentage,  
                    bc.DATEOFBIRTH AS BeneficiaryDOB  
                FROM T_BENEFICIARY b  
                LEFT JOIN T_CONTACT bc ON b.CONTACT_ID = bc.ID  
                WHERE b.POLICY_ID = '$policyID' AND b.ISDELETED = 'N';"
];

    
                $beneficiaryResponse = Http::timeout(10)->post($apiUrl, ["query" => $beneficiaryQuery["query"]]);
    
                if ($beneficiaryResponse->successful()) {
                    $beneficiaryData = $beneficiaryResponse->json()['ResultSets']['Table1'] ?? [];
                    if (!empty($beneficiaryData)) {
                        $member['Beneficiaries'] = $beneficiaryData;
                    }
                }
            }
    
    // 5th API Call – Fetch Payslip Details  
    if (!empty($member['PolicyID'])) {
        $payslipQuery = [
            "query" => "SELECT  
                            ph.PAYDATE AS PaymentDate,  
                            pd.NARRATIVE AS Narrative,  
                            pp.GROSSAMOUNT,  
                            pp.NETAMOUNT AS Net,  
                            pp.TAXAMOUNT AS PAYE
                        FROM 
                            [dbo].[T_PAYSLIPHEADER] ph
                        INNER JOIN 
                            [dbo].[T_PAYSLIPPOLICY] pp ON pp.PAYSLIPHEADER_ID = ph.ID
                        INNER JOIN 
                            [dbo].[T_PAYSLIPDETAIL] pd ON pd.PAYSLIPPOLICY_ID = pp.ID
                        INNER JOIN 
                            [dbo].[T_POLICY] p ON pp.POLICYID = p.ID
                        INNER JOIN 
                            [dbo].[T_MEMBER] m ON p.MEMBER_MEMBER_ID = m.MEMBER_ID
                        WHERE 
                            p.REFERENCE = '${schemeName}'
                        ORDER BY 
                            ph.PAYDATE ASC;"
        ];
    
        $payslipResponse = Http::timeout(10)->post($apiUrl, ["query" => $payslipQuery["query"]]);
    
        if ($payslipResponse->successful()) {
            $payslipData = $payslipResponse->json()['ResultSets']['Table1'] ?? [];
            if (!empty($payslipData)) {
                $member['PayslipDetails'] = $payslipData;
            }
        }
    }
            
           // ✅ 6th API Call – Fetch DateReceived, NetContribution, and Total
    if (!empty($member['PolicyID'])) {
        $additionalQuery = [
            "query" => "SELECT 
                            tp.RECEIVEDDATE AS DateReceived, 
                            tctc.NETCONTRIBUTIONAMOUNT AS NetContribution, 
                            ta.INITIALVALUE AS Total
                        FROM 
                            T_CONTRIBUTIONTAXCLAIM tctc
                        JOIN 
                            T_POLICY tp ON tctc.POLICYID = tp.ID
                        JOIN 
                            T_ARRANGEMENT ta ON tctc.ARRANGEMENTID = ta.ID
                        WHERE 
                            tp.REFERENCE = '$schemeName'
                        ORDER BY 
                            tctc.ID DESC;"
        ];
    
        $additionalResponse = Http::timeout(10)->post($apiUrl, ["query" => $additionalQuery["query"]]);
    
        if ($additionalResponse->successful()) {
            $additionalData = $additionalResponse->json()['ResultSets']['Table1'] ?? [];
    
            if (!empty($additionalData)) {
                // Store multiple contribution records in the $member array
                $member['contributions'] = $additionalData;
            } else {
                $member['contributions'] = []; // Empty array if no data found
            }
        }
    }
    
    
    
     if (!empty($member['PolicyID'])) {
                $policyID = addslashes($member['PolicyID']);
    
    //           $benefitQuery = [
    //     "query" => "SELECT  
    //                     aae.REFERENCEDATE AS CrystallisationDate,  
    //                     atype.TYPENAME AS ArrangementType,  
    //                     aae.TOTALCRYSTALLISED AS AmountCrystallised,  
    //                     aae.TAXFREELUMPSUM AS TaxFreeLumpSum,  
    //                     aae.TAXFREELUMPSUM AS NetLumpSum  
    //                 FROM  
    //                     T_POLICY p  
    //                 INNER JOIN T_ARRANGEMENT a ON a.POLICYID = p.ID  
    //                 INNER JOIN T_ARRANGEMENTALLOCATIONEVENT aae ON aae.ARRANGEMENTID = a.ID  
    //                 INNER JOIN T_ARRANGEMENTTYPE atype ON a.ARRANGEMENTTYPEID = atype.ID  
    //                 WHERE p.REFERENCE = '$schemeName' 
    //                 AND a.STATUS IN ('A', 'R');"
    // ];
    
    
    $benefitQuery = [
    "query" => "SELECT  
                    aae.REFERENCEDATE AS CrystallisationDate,  
                    atype.TYPENAME AS ArrangementType,  
                    aae.TOTALCRYSTALLISED AS AmountCrystallised,  
                    aae.TAXFREELUMPSUM AS TaxFreeLumpSum,  
                    aae.TAXFREELUMPSUM AS NetLumpSum,  
                    aae.TOTALALLOCATED AS TotalAllocated  
                FROM  
                    T_POLICY p  
                INNER JOIN T_ARRANGEMENT a ON a.POLICYID = p.ID  
                INNER JOIN T_ARRANGEMENTALLOCATIONEVENT aae ON aae.ARRANGEMENTID = a.ID  
                INNER JOIN T_ARRANGEMENTTYPE atype ON a.ARRANGEMENTTYPEID = atype.ID  
                WHERE p.REFERENCE = '" . addslashes($schemeName) . "';"
];

    
                $benefitResponse = Http::timeout(10)->post($apiUrl, ["query" => $benefitQuery["query"]]);
  
                if ($benefitResponse->successful()) {
                    $benefitData = $benefitResponse->json()['ResultSets']['Table1'] ?? [];
                   
                    if (!empty($benefitData)) {
                        $member['Benefits'] = $benefitData;
                    }
                }
            }
            
            
            
    // ✅ New API Call – Fetch Banking Details
    if (!empty($member['PolicyID'])) {
        $policyID = addslashes($member['PolicyID']);
    
        // Fetch Banking Details (same as before, no change needed)
        $bankingQuery = [
            "query" => "SELECT  
                            p.REFERENCE AS SchemeReference, 
                            a.ACCOUNTTYPECODE AS Provider, 
                            ba.SORTCODE AS SortCode, 
                            ba.ACCOUNTNUMBER AS AccountNumber, 
                            ba.ACCOUNTNAME AS AccountName, 
                            a.DESCRIPTION AS Syndicate, 
                            p.ID AS PolicyId, 
                            a.ID AS AccountId, 
                            ba.ID AS BankAccountId
                        FROM 
                            T_POLICY p
                        LEFT JOIN 
                            T_ACCOUNT a ON p.REFERENCE = a.PORTFOLIOHOLDERREFERENCE
                        LEFT JOIN 
                            T_BANKACCOUNT ba ON a.BANKACCOUNTID = ba.ID
                        WHERE 
                            p.ID = '$policyID'
                        ORDER BY 
                            p.ID DESC;"
        ];
    
        $bankingResponse = Http::timeout(30)->post($apiUrl, ["query" => $bankingQuery["query"]]);
        if ($bankingResponse->successful()) {
            $responseData = $bankingResponse->json();
            if (!empty($responseData['ResultSets']['Table1'])) {
                $bankingDetails = collect($responseData['ResultSets']['Table1'])
                    ->filter(function ($item) {
                        return !is_null($item['SortCode']) && !is_null($item['AccountNumber']) && !is_null($item['AccountName']);
                    })->values()->all();
                $member['banking_details'] = $bankingDetails;
            }
        }
    
        // Fetch Financial Transactions for each bank account (Updated Query)
    foreach ($member['banking_details'] as $key => &$bank) {
        $bankAccountId = strtoupper(trim(addslashes($bank['BankAccountId'])));
        \Log::info("Fetching transactions for BankAccountId: $bankAccountId");
    
        // Updated query for financial transactions
// $transactionQuery = [
//     "query" => "SELECT 
//                     ba.SORTCODE AS SortCode,
//                     ba.ACCOUNTNUMBER AS AccountNumber,
//                     ft.TRANSACTIONNUMBER AS [Transaction],
//                     ft.TRANSACTIONDATE AS TransactionDate, 
//                     tct.CATEGORYNAME AS CategoryName, 
//                     ft.NARRATIVE AS Narrative, 
//                     typ.TYPENAME AS TypeName, 
//                     ft.NETAMOUNT AS NetAmount,
//                     ft.STATUS AS Status,
//                     ft.VATAMOUNT AS VatAmount,
//                     ROUND(ft.NETAMOUNT + ft.VATAMOUNT, 2) AS GrossAmount,
//                     pr.POSTINGRULETYPE AS PostingRuleType,
//                     CASE 
//                         WHEN pr.POSTINGRULETYPE = 'C' THEN 'Credit'
//                         WHEN pr.POSTINGRULETYPE = 'D' THEN 'Debit'
//                         ELSE 'N/A'
//                     END AS PostingType,
//                     'System' AS TransactionType,
//                     pol.REFERENCE AS PolicyReference
//                 FROM 
//                     T_POLICY pol
//                     INNER JOIN T_PORTFOLIO po ON po.POLICY_ID = pol.ID 
//                     INNER JOIN T_FINANCIALTRANSACTION ft ON ft.PORTFOLIOID = po.ID
//                     INNER JOIN T_POSTING ps ON ps.FINANCIALTRANSACTION_ID = ft.ID
//                     INNER JOIN T_POSTINGRULE pr ON pr.ID = ps.POSTINGRULEID
//                     INNER JOIN T_ACCOUNT ac ON ac.ID = ps.ACCOUNTID
//                     LEFT JOIN T_BANKACCOUNT ba ON ac.BANKACCOUNTID = ba.ID
//                     INNER JOIN T_TRANSACTIONTYPE typ ON typ.ID = ft.TRANSACTIONTYPEID
//                     INNER JOIN T_TRANSACTIONCATEGORY tct ON tct.ID = typ.TRANSACTIONCATEGORYID
//                 WHERE 
//                     ft.STATUS = 'A' 
//                     AND ft.REVERSALSTATE = 'A' 
//                     AND pr.ISRECONCILABLE = 'Y' 
//                     AND ac.ACCOUNTTYPECODE = 'CASH'
//                     AND pol.REFERENCE = '${schemeName}'

//                 UNION ALL

//                 SELECT 
//                     ba.SORTCODE AS SortCode,
//                     ba.ACCOUNTNUMBER AS AccountNumber,
//                     NULL AS [Transaction],
//                     bt.POSTINGDATE AS TransactionDate,
//                     NULL AS CategoryName,
//                     TRIM(CONCAT_WS(' ', bt.NARRATIVE1, bt.NARRATIVE2, bt.NARRATIVE3, bt.NARRATIVE4, bt.NARRATIVE5)) AS Narrative,
//                     NULL AS TypeName,
//                     bt.AMOUNT AS NetAmount,
//                     NULL AS Status,
//                     0 AS VatAmount,
//                     bt.AMOUNT AS GrossAmount,
//                     bt.DRCR AS PostingRuleType,
//                     CASE 
//                         WHEN bt.DRCR = 'C' THEN 'Credit'
//                         WHEN bt.DRCR = 'D' THEN 'Debit'
//                         ELSE 'N/A'
//                     END AS PostingType,
//                     'Bank' AS TransactionType,
//                     pol.REFERENCE AS PolicyReference
//                 FROM 
//                     T_POLICY pol
//                     INNER JOIN T_PORTFOLIO po ON po.POLICY_ID = pol.ID 
//                     INNER JOIN T_ACCOUNT ac ON ac.PORTFOLIO_ID = po.ID
//                     INNER JOIN T_BANKACCOUNT ba ON ba.ID = ac.BANKACCOUNTID
//                     INNER JOIN T_BANKTRANSACTION bt ON bt.BANKACCOUNTID = ba.ID
//                 WHERE 
//                     bt.RECONCILEDDATE IS NULL
//                     AND pol.REFERENCE = '${schemeName}'
                
//                 ORDER BY 
//                     TransactionDate DESC,
//                     PolicyReference;"
// ];


 $transactionQuery = [
                        "query" => "
                            SELECT 
                                ba.SORTCODE AS SortCode,
                                ba.ACCOUNTNUMBER AS AccountNumber,
                                ft.TRANSACTIONNUMBER AS [Transaction],
                                ft.TRANSACTIONDATE AS TransactionDate, 
                                tct.CATEGORYNAME AS CategoryName, 
                                ft.NARRATIVE AS Narrative, 
                                typ.TYPENAME AS TypeName, 
                                ft.NETAMOUNT AS NetAmount,
                                ft.STATUS AS Status,
                                ft.VATAMOUNT AS VatAmount,
                                ROUND(ft.NETAMOUNT + ft.VATAMOUNT, 2) AS GrossAmount,
                                ps.POSTINGTYPE AS PostingRuleType,
                                CASE 
                                    WHEN ps.POSTINGTYPE = 'C' THEN 'Credit'
                                    WHEN ps.POSTINGTYPE = 'D' THEN 'Debit'
                                    ELSE 'N/A'
                                END AS PostingType,
                                'System' AS TransactionType,
                                pol.REFERENCE AS PolicyReference
                            FROM 
                                T_POLICY pol
                                INNER JOIN T_PORTFOLIO po ON po.POLICY_ID = pol.ID 
                                INNER JOIN T_FINANCIALTRANSACTION ft ON ft.PORTFOLIOID = po.ID
                                INNER JOIN T_POSTING ps ON ps.FINANCIALTRANSACTION_ID = ft.ID
                                INNER JOIN T_POSTINGRULE pr ON pr.ID = ps.POSTINGRULEID
                                INNER JOIN T_ACCOUNT ac ON ac.ID = ps.ACCOUNTID
                                LEFT JOIN T_BANKACCOUNT ba ON ac.BANKACCOUNTID = ba.ID
                                INNER JOIN T_TRANSACTIONTYPE typ ON typ.ID = ft.TRANSACTIONTYPEID
                                INNER JOIN T_TRANSACTIONCATEGORY tct ON tct.ID = typ.TRANSACTIONCATEGORYID
                            WHERE 
                                ft.[STATUS] IN ('A','P','R') 
                                AND ft.REVERSALSTATE = 'A' 
                                AND (pr.ISRECONCILABLE = 'Y' OR typ.TRANSACTIONCODE IN ('BalAdjCR', 'BalAdjDR')) 
                                AND ac.ACCOUNTTYPECODE = 'CASH'
                                AND pol.REFERENCE = '{$schemeName}'

                            UNION ALL

                            SELECT 
                                ba.SORTCODE AS SortCode,
                                ba.ACCOUNTNUMBER AS AccountNumber,
                                NULL AS [Transaction],
                                bt.POSTINGDATE AS TransactionDate,
                                NULL AS CategoryName,
                                bt.NARRATIVE1 AS Narrative,
                                NULL AS TypeName,
                                bt.AMOUNT AS NetAmount,
                                NULL AS Status,
                                0 AS VatAmount,
                                bt.AMOUNT AS GrossAmount,
                                bt.DRCR AS PostingRuleType,
                                CASE 
                                    WHEN bt.DRCR = 'C' THEN 'Credit'
                                    WHEN bt.DRCR = 'D' THEN 'Debit'
                                    ELSE 'N/A'
                                END AS PostingType,
                                'Bank' AS TransactionType,
                                pol.REFERENCE AS PolicyReference
                            FROM 
                                T_POLICY pol
                                INNER JOIN T_PORTFOLIO po ON po.POLICY_ID = pol.ID 
                                INNER JOIN T_ACCOUNT ac ON ac.PORTFOLIO_ID = po.ID
                                INNER JOIN T_BANKACCOUNT ba ON ba.ID = ac.BANKACCOUNTID
                                INNER JOIN T_BANKTRANSACTION bt ON bt.BANKACCOUNTID = ba.ID
                            WHERE 
                                bt.RECONCILEDDATE IS NULL
                                AND pol.REFERENCE = '{$schemeName}'

                            ORDER BY 
                                TransactionDate ASC,
                                PostingRuleType
                        "
                    ];
    











    
    
    

    
        // Fetch transactions data
        $transactionResponse = Http::timeout(10)->post($apiUrl, ["query" => $transactionQuery["query"]]);
   
        if ($transactionResponse->successful()) {
            $responseData = $transactionResponse->json();
            $transactionData = $responseData['ResultSets']['Table1'] ?? [];
    
            // Check if transaction data exists and format it correctly
            if (!empty($transactionData)) {
                $formattedTransactions = collect($transactionData)->map(function ($transaction) {
                    return [
                        'TransactionNumber' => $transaction['Transaction'] ?? '',
                        'ValueDate' => $transaction['TransactionDate'] ?? '',
                        'Type' => $transaction['CategoryName'] ?? '',
                        'TransactionType' => $transaction['TypeName'] ?? '',
                        'Narrative' => $transaction['Narrative'] ?? '',
                        'NetAmount' => $transaction['NetAmount'] ?? 0,
                        'VatAmount' => $transaction['VatAmount'] ?? 0,
                        'Status' => $transaction['Status'] ?? '',
                        'PostingType' => $transaction['PostingType'] ?? '',
                    ];
                })->all();
    
                $bank['Transactions'] = $formattedTransactions;
    
                // Calculate Bank Balance (sum of NETAMOUNT + VATAMOUNT where POSTINGTYPE = 'C' and Narrative does not contain 'Ring Fence')
                $balanceQuery = [
                    "query" => "SELECT  
                                    SUM(ft.NETAMOUNT + ft.VATAMOUNT) AS BankBalance
                                FROM 
                                    [dbo].[T_FINANCIALTRANSACTION] ft
                                INNER JOIN 
                                    [dbo].[T_POSTING] tp
                                    ON ft.ID = tp.FINANCIALTRANSACTION_ID
                                INNER JOIN 
                                    [dbo].[T_POLICY] p
                                    ON ft.POLICYID = p.ID
                                LEFT JOIN 
                                    [dbo].[IA_V_FINANCIALTRANSACTIONANDTYPE] ftat
                                    ON ft.ID = ftat.FINANCIALTRANSACTION_ID
                                LEFT JOIN 
                                    [dbo].[T_ACCOUNT] a
                                    ON p.REFERENCE = a.PORTFOLIOHOLDERREFERENCE
                                LEFT JOIN 
                                    [dbo].[T_BANKACCOUNT] ba
                                    ON a.BANKACCOUNTID = ba.ID
                                WHERE 
                                    p.REFERENCE = '${schemeName}'
                                    AND tp.POSTINGTYPE = 'C'
                                    AND ba.ID = '$bankAccountId'
                                    AND (ftat.NARRATIVE NOT LIKE '%Ring Fence%' OR ftat.NARRATIVE IS NULL);"
                ];
    
                $balanceResponse = Http::timeout(10)->post($apiUrl, ["query" => $balanceQuery["query"]]);
                if ($balanceResponse->successful()) {
                    $balanceData = $balanceResponse->json()['ResultSets']['Table1'][0] ?? [];
                    $bank['BankBalance'] = $balanceData['BankBalance'] ?? 0;
                } else {
                    $bank['BankBalance'] = 0;
                    \Log::error("Failed to fetch bank balance for BankAccountId: $bankAccountId - " . $balanceResponse->body());
                }
            } else {
                $bank['Transactions'] = [];
                $bank['BankBalance'] = 0;
            }
        } else {
            $bank['Transactions'] = [];
            $bank['BankBalance'] = 0;
            \Log::error("Failed to fetch transactions for BankAccountId: $bankAccountId - " . $transactionResponse->body());
        }
    }
    unset($bank);
    }
    
    
    
    
    
    
    
    
    
    
    
    // ✅ New API Call – Fetch Provider Details
    if (!empty($member['PolicyID'])) {
        $policyID = addslashes($member['PolicyID']);
    
    $providerQuery = [
        "query" => "SELECT  
                        p.REFERENCE AS SchemeReference,
                        ben.CALCULATIONDATE AS CrystallisationDate,
                        ben.QUOTEVALUE AS AmountCrystallised,
                        ben.MAXTFC AS TaxFreeLumpSum,
                        ben.MAXTFC AS NetLumpSum, -- Added MAXTFC as Net Lump Sum
                        ben.REVIEWEDARRANGEMENT_ID AS ReviewedArrId,
                        ben.QUOTEDARRANGEMENT_ID AS QuotedArrId,
                        ben.ID AS BenefitId,
                        arr.ID AS ArrangementId,
                        arr.LATESTVALUATIONAMOUNT AS NetPensionFund, -- Added LATESTVALUATIONAMOUNT as Net Pension Fund
                        arr.REFERENCENAME AS ArrangementType, -- Added REFERENCENAME as ArrangementType
                        p.ID AS PolicyId
                    FROM T_BENEFITS ben
                    LEFT JOIN T_ARRANGEMENT arr ON ben.REVIEWEDARRANGEMENT_ID = arr.ID OR ben.QUOTEDARRANGEMENT_ID = arr.ID
                    LEFT JOIN T_POLICY p ON arr.POLICYID = p.ID
                    WHERE p.ID = '$policyID'
                    ORDER BY ben.ID DESC;"
    ];
    
    
    
        $providerResponse = Http::timeout(10)->post($apiUrl, ["query" => $providerQuery["query"]]);
    
        if ($providerResponse->successful()) {
            $providerData = $providerResponse->json()['ResultSets']['Table1'] ?? [];
    
            if (!empty($providerData)) {
                $member['provider_details'] = $providerData;
            }
        }
    }
    
    
    // Fetch Asset Details
    if (!empty($member['PolicyID'])) {
        $policyID = addslashes($member['PolicyID']);
    
       $assetQuery = [
        "query" => "SELECT 
                        pol.REFERENCE AS [SchemeReference], 
                        exm.ID AS [AssetID], 
                        exm.EMAName AS [AssetName], 
                        exm.PROVIDERREFERENCE AS [ProviderReference], 
                        pvd.ProviderID, 
                        pvd.ProviderName AS [ProviderName], 
                        emt.EMATYPENAME AS [EmaTypeName],
                        exm.EFFECTIVEFROM AS [EffectiveFrom], 
                        exm.EFFECTIVETO AS [EffectiveTo], 
                        va.VALUATIONDATE AS [CurrentValuationDate], 
                        ROUND(va.AMOUNT, 2) AS [CurrentValuationAmount]
                    FROM 
                        T_EXTERNALLYMANAGEDASSET exm
                        INNER JOIN T_PORTFOLIO por ON por.ID = exm.OWNERPORTFOLIO_ID
                        INNER JOIN T_POLICY pol ON pol.ID = por.POLICY_ID
                        INNER JOIN T_EMATYPE emt ON emt.ID = exm.EMATYPEID
                        OUTER APPLY (
                            SELECT TOP 1 v.VALUATIONDATE, v.AMOUNT
                            FROM T_VALUATION v
                                INNER JOIN T_PORTFOLIO p ON p.ID = v.PORTFOLIO_ID
                            WHERE v.[STATUS] = 'A' 
                                AND p.EXTERNALLYMANAGEDASSET_ID = exm.ID
                            ORDER BY v.VALUATIONDATE DESC
                        ) va
                        LEFT OUTER JOIN (
                            SELECT 
                                exm2.ID, 
                                con.ID AS [ProviderID], 
                                CASE 
                                    WHEN con.NAME IS NULL THEN con.FIRSTNAME + ' ' + con.SURNAME 
                                    ELSE con.NAME 
                                END AS [ProviderName]
                            FROM T_EXTERNALLYMANAGEDASSET exm2
                                INNER JOIN T_EMATYPE ety ON ety.ID = exm2.EMATYPEID
                                INNER JOIN T_RELATION rel ON rel.SOURCEID = exm2.ID
                                INNER JOIN T_RELATIONRULE rul ON rul.ID = rel.RELATIONRULE_ID 
                                    AND rul.SOURCETYPE = ety.EMAOBJECTTYPE
                                INNER JOIN T_CONTACT con ON con.ID = rel.TARGETID
                            WHERE 
                                rel.EFFECTIVEFROM <= GETDATE() 
                                AND (rel.EFFECTIVETO >= GETDATE() OR rel.EFFECTIVETO IS NULL) 
                                AND rel.ISDELETED = 'N'
                        ) pvd ON pvd.ID = exm.ID
                    WHERE 
                        pol.REFERENCE = '$schemeName'
                        AND exm.EFFECTIVETO IS NULL
                    ORDER BY 
                        pol.REFERENCE, 
                        exm.EMANAME;"
    ];
    
    
        $assetResponse = Http::timeout(10)->post($apiUrl, ["query" => $assetQuery["query"]]);
    
       if ($assetResponse->successful()) {
            
    $assetData = $assetResponse->json()['ResultSets']['Table1'] ?? [];

    $csvPaths = [
        storage_path('app/public/SGKH.csv'),
        storage_path('app/public/Quilter.csv'),
        storage_path('app/public/Platformone.csv'), // Added the third CSV file
    ];

    $csvRows = [];

    // Load all CSV rows
    foreach ($csvPaths as $csvPath) {
        if (file_exists($csvPath) && ($handle = fopen($csvPath, 'r')) !== false) {
            $headers = fgetcsv($handle); // Get column headers
            while (($row = fgetcsv($handle)) !== false) {
                $csvRows[] = array_combine($headers, $row);
            }
            fclose($handle);
        }
    }

    // Match CSV data to each asset
    if (!empty($assetData) && !empty($csvRows)) {
        foreach ($assetData as &$asset) {
            $matchedRows = [];

            foreach ($csvRows as $csvRow) {
                $csvMatchCode = $csvRow['SGHCODE'] ?? $csvRow['Account Id'] ?? $csvRow['Account Reference'] ?? NULL;

                if (
                    $csvMatchCode &&
                    isset($asset['ProviderReference']) &&
                    trim($csvMatchCode) === trim($asset['ProviderReference'])
                ) {
                    // Normalize if CSV2 or CSV3 (same format)
                    if (isset($csvRow['Fund Name'])) {
                        $normalized = [
                            'HLDNAME' => $csvRow['Fund Name'],
                            'ISIN' => $csvRow['ISIN'] ?? '',
                            'TYPE' => $csvRow['Fund Price'] ?? '',
                            'QUANTITY' => $csvRow['Fund Units'] ?? $csvRow['Units'] ?? '',
                            'MKTVALGBP' => $csvRow['Fund Value'] ?? '',
                        ];
                        $matchedRows[] = array_merge($csvRow, $normalized);
                    } else {
                        $matchedRows[] = $csvRow; // Already in correct format (CSV1)
                    }
                }
            }

            // Assign all matched CSV rows to this asset
            if (!empty($matchedRows)) {
                $asset['CsvData'] = $matchedRows;
            }
        }

        $member['ExternallyManagedAssets'] = array_values($assetData);
    } else {
        $member['ExternallyManagedAssets'] = [];
    }
}
    }
    
    
    
    // Calculate Total Valuation for all assets
    if (!empty($member['PolicyID'])) {
        $policyID = addslashes($member['PolicyID']);
    
        $totalValuationQuery = [
            "query" => "WITH LatestValuation AS (
                            SELECT 
                                PORTFOLIO_ID,
                                AMOUNT,
                                ROW_NUMBER() OVER (PARTITION BY PORTFOLIO_ID ORDER BY VALUATIONDATE DESC) AS RN
                            FROM 
                                [dbo].[T_VALUATION]
                            WHERE 
                                EFFECTIVETO IS NULL
                        )
                        SELECT  
                            SUM(lv.AMOUNT) AS TotalValuation
                        FROM 
                            [dbo].[T_PORTFOLIO] port
                        INNER JOIN 
                            [dbo].[T_POLICY] p ON port.POLICY_ID = p.ID  
                        LEFT JOIN 
                            LatestValuation lv ON lv.PORTFOLIO_ID = port.ID AND lv.RN = 1  
                        WHERE 
                            p.ID = '$policyID';"
        ];
    
        $totalValuationResponse = Http::timeout(10)->post($apiUrl, ["query" => $totalValuationQuery["query"]]);
    
        if ($totalValuationResponse->successful()) {
            $totalValuationData = $totalValuationResponse->json()['ResultSets']['Table1'][0] ?? [];
            $member['TotalValuation'] = $totalValuationData['TotalValuation'] ?? 0;
        } else {
            $member['TotalValuation'] = 0;
            \Log::error("Failed to fetch total valuation for PolicyID: $policyID - " . $totalValuationResponse->body());
        }
    }
    
    
    
    
    
     // ✅ Second API Call – Fetch Transfer Data
    if (!empty($member['PolicyID'])) {
        $transferQuery = [
                "query" => "SELECT 
                        t.EXPECTEDACCEPTANCEDATE AS RequestReceivedDate,
                        t.DATEACCEPTED AS DateAccepted,
                        t.SCHEMENAME AS CedingSchemeName,
                        t.POLICYREFS AS CedingSchemeReference,
                        t.TOTALVALUE AS TransferAmount,
                        t.CASHVALUE AS CashReceived,
                        t.DATECOMPLETED AS CompletionDate,
                        t.STATUS AS CrystallizationStatus,
                        t.ID AS TransferId,
                        p.ID AS PolicyId
                    FROM 
                        T_TRANSFERINPOSTADAY t
                    LEFT JOIN 
                        T_POLICY p ON t.POLICYID = p.ID
                    WHERE 
                        p.ID = '$policyID'
                    ORDER BY t.ID ASC;"
    ];
    
        $transferResponse = Http::timeout(30)->post($apiUrl, ["query" => $transferQuery["query"]]);
    
       if ($transferResponse->successful()) {
            $transfer = $transferResponse->json()['ResultSets']['Table1'] ?? [];
    
            if (!empty($transfer)) {
                $member['TransferDetails'] = $transfer; // Store as an array
            }
        }
        
    }
    
    
        } catch (\Exception $e) {
            return back()->with('error', 'API request failed: ' . $e->getMessage());
        }
        return view('dashboard.member.MemberApiView', compact('member'));
    }


    public function member() {
        $memberOasis =  User::where('role', 'oasis_sipp')->get();
        $role_member = 'oasis_sipp';
        return view('dashboard.member.CreateMember', compact('memberOasis','role_member'));
    }
    
    public function memberSipp() {
        $memberOasis =  User::where('role', 'sipp_property')->get();
        $role_member = 'sipp_property';
        return view('dashboard.member.CreateMember', compact('memberOasis','role_member'));
    }

    public function memberSippFull() {
        $memberOasis =  User::where('role', 'full_sipp_property')->get();
        $role_member  = 'full_sipp_property';
        return view('dashboard.member.CreateMember', compact('memberOasis','role_member'));
    }
    
    public function memberStore(Request $request) {
        $userMember = new User();
        $userMember->name = $request->user_name;
        $userMember->creator_id = auth()->user()->id;   
        $userMember->email = $request->user_email;
        $userMember->role = 'pre_approved_member';
        $userMember->oasis_sipp__check = 'oasis_sipp__check';
        $userMember->sipp_property_check = 'sipp_property_check';
        $userMember->full_sipp_check = 'full_sipp_check';
        $userMember->ftp_check = 'ftp_check';
        $userMember->password = Hash::make('12345678');
        $userMember->support_check = 'support_check';
        $userMember->faq_check = 'faq_check';
        $userMember->email_verified_at = now();
        $userMember->save();
        
        $membersStore = new Member();
        $membersStore->role = $userMember->id;
        $membersStore->creater_id = auth()->user()->id;
        $membersStore->title = $request->title;
        $membersStore->forename = $request->forename;
        $membersStore->surname = $request->surname;
        $membersStore->dob = $request->dob;
        $membersStore->previous_name = $request->previous_name;
        $membersStore->address = $request->address;
        $membersStore->country = $request->country;
        $membersStore->postcode = $request->postcode;
        $membersStore->time_spent_address = $request->time_spent_address;
        $membersStore->previous_address = $request->previous_address;
        $membersStore->previous_residential_postcode = $request->previous_residential_postcode;
        $membersStore->previous_residential_country = $request->previous_residential_country;
        $membersStore->telephone = $request->telephone;
        $membersStore->email = $request->email;
        $membersStore->ni_number = $request->ni_number;
        $membersStore->utr = $request->utr;
        $membersStore->nationality = $request->nationality;
        $membersStore->marital_status = $request->marital_status;
        $membersStore->employment_status = $request->employment_status;
        $membersStore->emp_name = $request->emp_name;
        $membersStore->j_title = $request->j_title;
        $membersStore->occupation = $request->occupation;
        $membersStore->opt_out = $request->opt_out;
        $membersStore->pension_protection = $request->pension_protection;
        $membersStore->applicable_protection1 = $request->applicable_protection1;
        $membersStore->applicable_protection2 = $request->applicable_protection2;
        $membersStore->applicable_protection3 = $request->applicable_protection3;
        $membersStore->applicable_protection4 = $request->applicable_protection4;
        $membersStore->applicable_protection5 = $request->applicable_protection5;
        $membersStore->applicable_protection6 = $request->applicable_protection6;
        $membersStore->applicable_protection7 = $request->applicable_protection7;
        $membersStore->applicable_protection8 = $request->applicable_protection8;
        $membersStore->applicable_protection9 = $request->applicable_protection9;
        $membersStore->applicable_protection10 = $request->applicable_protection10;
        $membersStore->annual_allowance = $request->annual_allowance;
        $membersStore->first_payment_date = $request->first_payment_date;
        $membersStore->lump_sum_amount = $request->lump_sum_amount;
        $membersStore->income_employment = $request->income_employment;
        $membersStore->income_pension = $request->income_pension;
        $membersStore->income_savings = $request->income_savings;
        $membersStore->income_gifted = $request->income_gifted;
        $membersStore->income_lottery = $request->income_lottery;
        $membersStore->income_property = $request->income_property;
        $membersStore->income_inheritance = $request->income_inheritance;
        $membersStore->income_divorce = $request->income_divorce;
        $membersStore->income_other = $request->income_other;
        $membersStore->assets_outside_uk = $request->assets_outside_uk;
        $membersStore->assets_details = $request->assets_details;
        $membersStore->tax_relief = $request->tax_relief;
        $membersStore->financial_contact_name = $request->financial_contact_name;
        $membersStore->financial_company_name = $request->financial_company_name;
        $membersStore->street_address = $request->street_address;
        $membersStore->financial_postcode = $request->financial_postcode;
        $membersStore->city = $request->city;
        $membersStore->financial_telephone_number = $request->financial_telephone_number;
        $membersStore->financial_email_address = $request->financial_email_address;
        $membersStore->regulated_by = $request->regulated_by;
        $membersStore->authorisation_number = $request->authorisation_number;
        $membersStore->network_name = $request->network_name;
        $membersStore->regulated_by_second = $request->regulated_by_second;
        $membersStore->company_authorisation_number = $request->company_authorisation_number;
        $membersStore->financial_adviser_remuneration = $request->financial_adviser_remuneration;
        $membersStore->initial_fees = $request->initial_fees;
        $membersStore->ongoing_fees = $request->ongoing_fees;
        $membersStore->frequency = $request->frequency;
        $membersStore->scheme_establishment = $request->scheme_establishment;
        $membersStore->date_option = $request->date_option;
        $membersStore->date_day = $request->date_day;
        $membersStore->scheme_anniversary = $request->scheme_anniversary;
        $membersStore->date_option2 = $request->date_option2;
        $membersStore->date2_day = $request->date2_day;
        $membersStore->beneficiary_name = json_encode($request->beneficiary_name);
        $membersStore->beneficiary_relationship = json_encode($request->beneficiary_relationship);
        $membersStore->beneficiary_percentage = json_encode($request->beneficiary_percentage);
        $membersStore->charity_name = json_encode($request->charity_name);
        $membersStore->charity_percentage = json_encode($request->charity_percentage);
        $membersStore->contribute_regular_contribution = $request->contribute_regular_contribution;
        $membersStore->contribute_single_contribution = $request->contribute_single_contribution;
        $membersStore->source_of_funds = $request->source_of_funds;
        $membersStore->payment_frequency = $request->payment_frequency;
        $membersStore->employer_pay = $request->employer_pay;
        $membersStore->employer_name = $request->employer_name;
        $membersStore->reg_address = $request->reg_address;
        $membersStore->employer_details_country = $request->employer_details_country;
        $membersStore->employee_postcode = $request->employee_postcode;
        $membersStore->telephone_number = $request->telephone_number;
        $membersStore->email_address = $request->email_address;
        $membersStore->trading_address = $request->trading_address;
        $membersStore->trading_address_country = $request->trading_address_country;
        $membersStore->trading_postcode = $request->trading_postcode;
        $membersStore->trading_telephone_number = $request->trading_telephone_number;
        $membersStore->trading_email_address = $request->trading_email_address;
        $membersStore->employer_status = $request->employer_status;
        $membersStore->business_name = $request->business_name;
        $membersStore->employer_year_end = $request->employer_year_end;
        $membersStore->regist_number = $request->regist_number;
        $membersStore->join_date = $request->join_date;
        $membersStore->is_director = $request->is_director;
        $membersStore->director_date = $request->director_date;
        $membersStore->shareholdings = $request->shareholdings;
        $membersStore->gross_regular_contribution = $request->gross_regular_contribution;
        $membersStore->gross_single_contribution = $request->gross_single_contribution;
        $membersStore->gross_payment_frequency = $request->gross_payment_frequency;
        $membersStore->gross_start_date = $request->gross_start_date;
        $membersStore->declaration_print_name = $request->declaration_print_name;
        $membersStore->declaration_position = $request->declaration_position;
        $membersStore->declaration_date = $request->declaration_date;
        $membersStore->alltrust_platform = $request->alltrust_platform;
        $membersStore->ajBell = $request->ajBell;
        $membersStore->canaccord = $request->canaccord;
        $membersStore->kleinwort = $request->kleinwort;
        $membersStore->quilter = $request->quilter;
        $membersStore->rbc = $request->rbc;
        $membersStore->stocktrade = $request->stocktrade;
        $membersStore->transact = $request->transact;
        $membersStore->sim = $request->sim;
        $membersStore->brooks = $request->brooks;
        $membersStore->hubwise = $request->hubwise;
        $membersStore->lgt = $request->lgt;
        $membersStore->rathbones = $request->rathbones;
        $membersStore->scottishWidows = $request->scottishWidows;
        $membersStore->telford = $request->telford;
        $membersStore->commercialProperty = $request->commercialProperty;
        $membersStore->goldBullion = $request->goldBullion;
        $membersStore->unlistedShares = $request->unlistedShares;
        $membersStore->fixedDeposit = $request->fixedDeposit;
        $membersStore->nsI = $request->nsI;
        $membersStore->othername = $request->othername;
        $membersStore->checkbox_textarea = $request->checkbox_textarea;
        $membersStore->pension_benefits = $request->pension_benefits;
        $membersStore->provider_name = $request->provider_name;
        $membersStore->other_benefits_address = $request->other_benefits_address;
        $membersStore->other_benefits_country = $request->other_benefits_country;
        $membersStore->other_benefits_postcode = $request->other_benefits_postcode;
        $membersStore->other_telephone_number = $request->other_telephone_number;
        $membersStore->other_email_address = $request->other_email_address;
        $membersStore->plan_scheme_type = $request->plan_scheme_type;
        $membersStore->plan_scheme_name = $request->plan_scheme_name;
        $membersStore->plan_scheme_number = $request->plan_scheme_number;
        $membersStore->pension_scheme_tax_reference = $request->pension_scheme_tax_reference;
        $membersStore->is_occupational_scheme = $request->is_occupational_scheme;
        $membersStore->defined_benefit = $request->defined_benefit;
        $membersStore->full_value_scheme = $request->full_value_scheme;
        $membersStore->funds_crystallised = $request->funds_crystallised;
        $membersStore->crystallised_method = $request->crystallised_method;
        $membersStore->transfer_assets = $request->transfer_assets;
        $membersStore->bankruptcy_orders = $request->bankruptcy_orders;
        $membersStore->scheme_protection = $request->scheme_protection;
        $membersStore->annuity_guarantee = $request->annuity_guarantee;
        $membersStore->block_transfer = $request->block_transfer;
        $membersStore->funded_transfer = $request->funded_transfer;
        $membersStore->employer_contributions = $request->employer_contributions;
        $membersStore->name_of_employer = $request->name_of_employer;
        $membersStore->personal_bank_payment = $request->personal_bank_payment;
        $membersStore->ceding_scheme = $request->ceding_scheme;
        $membersStore->funds_outside_uk = $request->funds_outside_uk;
        $membersStore->other_please_specify = $request->other_please_specify;
        $membersStore->transfers_authority_print_name = $request->transfers_authority_print_name;
        $membersStore->transfers_authority_no = $request->transfers_authority_no;
        $membersStore->transfers_authority_date = $request->transfers_authority_date;
        $membersStore->limited_contacting_products = $request->limited_contacting_products;
        $membersStore->alltrust_subsidiaries = $request->alltrust_subsidiaries;
        $membersStore->member_consent_print_name = $request->member_consent_print_name;
        $membersStore->member_consent_date = $request->member_consent_date;
        $membersStore->personal_needs_objectives = $request->personal_needs_objectives;
        $membersStore->investment_linked_costs = $request->investment_linked_costs;
        $membersStore->communication_satisfaction = $request->communication_satisfaction;
        $membersStore->provider_investments = $request->provider_investments;
        $membersStore->circumstances_alltrust = $request->circumstances_alltrust;
        $membersStore->establishment_SIPP = $request->establishment_SIPP;
        $membersStore->parental_responsibility = $request->parental_responsibility;
        $membersStore->member_declaration_print_name = $request->member_declaration_print_name;
        $membersStore->member_declaration_date = $request->member_declaration_date;
        $membersStore->status = 'pending';
        
        if ($request->hasFile('signature_file')) {
            $file = $request->file('signature_file');
            $request->validate([
                'signature_file' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $membersStore->signature_adviser = '/storage/app/public/' . $filePath;
        }
        
        elseif($request->signature_adviser)  {
            $signatureData = $request->signature_adviser;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $membersStore->signature_adviser = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $request->validate([
                'file_upload' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $membersStore->signature_alltrust = '/storage/app/public/' . $filePath;
        }
        
        elseif($request->signature_alltrust) {
            $signatureData = $request->signature_alltrust;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $membersStore->signature_alltrust = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file_3')) {
            $file = $request->file('signature_file_3');
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $membersStore->signature_1 = '/storage/app/public/' . $filePath;
        }
        
        elseif($request->input('signature_1')) {
            $signatureData = $request->input('signature_1');
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode($signatureData);
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $membersStore->signature_1 = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('file_upload_4')) {
            $file = $request->file('file_upload_4');
            $request->validate([
                'file_upload' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $membersStore->signature_2 = '/storage/app/public/' . $filePath;
        }
        
        elseif ($request->filled('signature_2')) {
            $signatureData = $request->input('signature_2');
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
    
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $membersStore->signature_2 = '/storage/app/public/signatures/' . $fileName;
        }
        
        $membersStore->save();
  
        $username = $userMember->name;
        $userEmail = $userMember->email;
       
        $messageContent = "
            <div style='font-family: Arial, sans-serif; line-height: 1.6; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px;'>
                <h2 style='color: #333;'>Alltrust Application Received – Next Steps</h2>
                <p>Dear {$username},</p>
                <p>Thank you for submitting your application to Alltrust Services Limited.</p>
                <p>To proceed, please log in to our portal to review and complete your application details.</p>
                <p><strong>Click the link below to access your account:</strong></p>
                <p><a href='https://www.alltrust.co.uk/alltrustonline/members-oasis-view/{$membersStore->id}' target='_blank' style='color: #007bff; text-decoration: none;'>Portal Link</a></p>
                <p><strong>To log in, please use the details below:</strong></p>
                <p><strong>Username:</strong> {$userEmail}</p>
                <p><strong>Temporary Password:</strong> 12345678</p>
                <p>For security purposes, please log in as soon as possible and update your password.</p>
                <p>If you encounter any issues or have questions, feel free to contact our IT support team at 
                    <a href='mailto:portalsupport@alltrust.co.uk' style='color: #007bff; text-decoration: none;'>portalsupport@alltrust.co.uk</a>.
                </p>
                <p>You will need to review the information in the application, electronically sign within our secure environment, and submit the application.</p>
                <p>Please complete this <a href='#' target='_blank' style='color: #007bff; text-decoration: none;'>link to the Alltrust ID Pal</a> to upload your proof of identification and address so that we can process your application quickly. This link is also available on our website next to the “Members Access” button.</p>
                <p>We look forward to progressing your application and will keep you updated every step of the way.</p>
                <p>Best regards,</p>
                <p><strong>The Alltrust Team</strong></p>
            </div>
        ";
        
        Mail::to($userEmail)->send(new SimpleMail($messageContent));
    
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . 'saved the member application';
        $log->save();
        return redirect()->back();
    }

    public function  memberedit($id, $source = 'existing') {
        $memberOasis = User::where('role', 'oasis_sipp')->get();
        $editMember = Member::with('user')->find($id);
        $user = User::find($editMember->role);
        return view('dashboard.member.EditMember', compact('editMember', 'memberOasis', 'source','user'));
    }
    
    public function memberUpdate(Request $request) {
        $user = User::find($request->user_id);
        $member_id = $request->member_id;
        $member = Member::findOrFail($member_id);
        $member->title = $request->title;
        $member->forename = $request->forename;
        $member->surname = $request->surname;
        $member->dob = $request->dob;
        $member->previous_name = $request->previous_name;
        $member->address = $request->address;
        $member->country = $request->country;
        $member->postcode = $request->postcode;
        $member->time_spent_address = $request->time_spent_address;
        $member->previous_address = $request->previous_address;
        $member->previous_residential_postcode = $request->previous_residential_postcode;
        $member->previous_residential_country = $request->previous_residential_country;
        $member->telephone = $request->telephone;
        $member->email = $request->email;
        $member->ni_number = $request->ni_number;
        $member->utr = $request->utr;
        $member->nationality = $request->nationality;
        $member->marital_status = $request->marital_status;
        $member->employment_status = $request->employment_status;
        $member->emp_name = $request->emp_name;
        $member->j_title = $request->j_title;
        $member->occupation = $request->occupation;
        $member->opt_out = $request->opt_out;
        $member->pension_protection = $request->pension_protection;
        $member->applicable_protection1 = $request->applicable_protection1;
        $member->applicable_protection2 = $request->applicable_protection2;
        $member->applicable_protection3 = $request->applicable_protection3;
        $member->applicable_protection4 = $request->applicable_protection4;
        $member->applicable_protection5 = $request->applicable_protection5;
        $member->applicable_protection6 = $request->applicable_protection6;
        $member->applicable_protection7 = $request->applicable_protection7;
        $member->applicable_protection8 = $request->applicable_protection8;
        $member->applicable_protection9 = $request->applicable_protection9;
        $member->applicable_protection10 = $request->applicable_protection10;
        $member->annual_allowance = $request->annual_allowance;
        $member->first_payment_date = $request->first_payment_date;
        $member->lump_sum_amount = $request->lump_sum_amount;
        $member->income_employment = $request->income_employment;
        $member->income_pension = $request->income_pension;
        $member->income_savings = $request->income_savings;
        $member->income_gifted = $request->income_gifted;
        $member->income_lottery = $request->income_lottery;
        $member->income_property = $request->income_property;
        $member->income_inheritance = $request->income_inheritance;
        $member->income_divorce = $request->income_divorce;
        $member->income_other = $request->income_other;
        $member->assets_outside_uk = $request->assets_outside_uk;
        $member->assets_details = $request->assets_details;
        $member->tax_relief = $request->tax_relief;
        $member->financial_contact_name = $request->financial_contact_name;
        $member->financial_company_name = $request->financial_company_name;
        $member->street_address = $request->street_address;
        $member->financial_postcode = $request->financial_postcode;
        $member->city = $request->city;
        $member->financial_telephone_number = $request->financial_telephone_number;
        $member->financial_email_address = $request->financial_email_address;
        $member->regulated_by = $request->regulated_by;
        $member->authorisation_number = $request->authorisation_number;
        $member->network_name = $request->network_name;
        $member->regulated_by_second = $request->regulated_by_second;
        $member->company_authorisation_number = $request->company_authorisation_number;
        $member->financial_adviser_remuneration = $request->financial_adviser_remuneration;
        $member->initial_fees = $request->initial_fees;
        $member->ongoing_fees = $request->ongoing_fees;
        $member->frequency = $request->frequency;
        $member->scheme_establishment = $request->scheme_establishment;
        $member->date_option = $request->date_option;
        $member->date_day = $request->date_day;
        $member->scheme_anniversary = $request->scheme_anniversary;
        $member->date_option2 = $request->date_option2;
        $member->date2_day = $request->date2_day;
        $member->beneficiary_name = json_encode($request->beneficiary_name);
        $member->beneficiary_relationship = json_encode($request->beneficiary_relationship);
        $member->beneficiary_percentage = json_encode($request->beneficiary_percentage);
        $member->charity_name = json_encode($request->charity_name);
        $member->charity_percentage = json_encode($request->charity_percentage);
        $member->contribute_regular_contribution = $request->contribute_regular_contribution;
        $member->contribute_single_contribution = $request->contribute_single_contribution;
        $member->source_of_funds = $request->source_of_funds;
        $member->payment_frequency = $request->payment_frequency;
        $member->employer_pay = $request->employer_pay;
        $member->employer_name = $request->employer_name;
        $member->reg_address = $request->reg_address;
        $member->employer_details_country = $request->employer_details_country;
        $member->employee_postcode = $request->employee_postcode;
        $member->telephone_number = $request->telephone_number;
        $member->email_address = $request->email_address;
        $member->trading_address = $request->trading_address;
        $member->trading_address_country = $request->trading_address_country;
        $member->trading_postcode = $request->trading_postcode;
        $member->trading_telephone_number = $request->trading_telephone_number;
        $member->trading_email_address = $request->trading_email_address;
        $member->employer_status = $request->employer_status;
        $member->business_name = $request->business_name;
        $member->employer_year_end = $request->employer_year_end;
        $member->regist_number = $request->regist_number;
        $member->join_date = $request->join_date;
        $member->is_director = $request->is_director;
        $member->director_date = $request->director_date;
        $member->shareholdings = $request->shareholdings;
        $member->gross_regular_contribution = $request->gross_regular_contribution;
        $member->gross_single_contribution = $request->gross_single_contribution;
        $member->gross_payment_frequency = $request->gross_payment_frequency;
        $member->gross_start_date = $request->gross_start_date;
        $member->declaration_print_name = $request->declaration_print_name;
        $member->declaration_position = $request->declaration_position;
        $member->declaration_date = $request->declaration_date;
        $member->alltrust_platform = $request->alltrust_platform;
        $member->ajBell = $request->ajBell;
        $member->canaccord = $request->canaccord;
        $member->kleinwort = $request->kleinwort;
        $member->quilter = $request->quilter;
        $member->rbc = $request->rbc;
        $member->stocktrade = $request->stocktrade;
        $member->transact = $request->transact;
        $member->sim = $request->sim;
        $member->brooks = $request->brooks;
        $member->hubwise = $request->hubwise;
        $member->lgt = $request->lgt;
        $member->rathbones = $request->rathbones;
        $member->scottishWidows = $request->scottishWidows;
        $member->telford = $request->telford;
        $member->commercialProperty = $request->commercialProperty;
        $member->goldBullion = $request->goldBullion;
        $member->unlistedShares = $request->unlistedShares;
        $member->fixedDeposit = $request->fixedDeposit;
        $member->nsI = $request->nsI;
        $member->othername = $request->othername;
        $member->checkbox_textarea = $request->checkbox_textarea;
        $member->pension_benefits = $request->pension_benefits;
        $member->provider_name = $request->provider_name;
        $member->other_benefits_address = $request->other_benefits_address;
        $member->other_benefits_country = $request->other_benefits_country;
        $member->other_benefits_postcode = $request->other_benefits_postcode;
        $member->other_telephone_number = $request->other_telephone_number;
        $member->other_email_address = $request->other_email_address;
        $member->plan_scheme_type = $request->plan_scheme_type;
        $member->plan_scheme_name = $request->plan_scheme_name;
        $member->plan_scheme_number = $request->plan_scheme_number;
        $member->pension_scheme_tax_reference = $request->pension_scheme_tax_reference;
        $member->is_occupational_scheme = $request->is_occupational_scheme;
        $member->defined_benefit = $request->defined_benefit;
        $member->full_value_scheme = $request->full_value_scheme;
        $member->funds_crystallised = $request->funds_crystallised;
        $member->crystallised_method = $request->crystallised_method;
        $member->transfer_assets = $request->transfer_assets;
        $member->bankruptcy_orders = $request->bankruptcy_orders;
        $member->scheme_protection = $request->scheme_protection;
        $member->annuity_guarantee = $request->annuity_guarantee;
        $member->block_transfer = $request->block_transfer;
        $member->funded_transfer = $request->funded_transfer;
        $member->employer_contributions = $request->employer_contributions;
        $member->name_of_employer = $request->name_of_employer;
        $member->personal_bank_payment = $request->personal_bank_payment;
        $member->ceding_scheme = $request->ceding_scheme;
        $member->funds_outside_uk = $request->funds_outside_uk;
        $member->other_please_specify = $request->other_please_specify;
        $member->transfers_authority_print_name = $request->transfers_authority_print_name;
        $member->transfers_authority_no = $request->transfers_authority_no;
        $member->transfers_authority_date = $request->transfers_authority_date;
        $member->limited_contacting_products = $request->limited_contacting_products;
        $member->alltrust_subsidiaries = $request->alltrust_subsidiaries;
        $member->member_consent_print_name = $request->member_consent_print_name;
        $member->member_consent_date = $request->member_consent_date;
        $member->personal_needs_objectives = $request->personal_needs_objectives;
        $member->investment_linked_costs = $request->investment_linked_costs;
        $member->communication_satisfaction = $request->communication_satisfaction;
        $member->provider_investments = $request->provider_investments;
        $member->circumstances_alltrust = $request->circumstances_alltrust;
        $member->establishment_SIPP = $request->establishment_SIPP;
        $member->parental_responsibility = $request->parental_responsibility;
        $member->member_declaration_print_name = $request->member_declaration_print_name;
        $member->member_declaration_date = $request->member_declaration_date;
        $member->status = 'pending';
        
        if ($request->hasFile('signature_file')) {
            $file = $request->file('signature_file');
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            if ($member->signature_adviser) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $member->signature_adviser));
            }
            $member->signature_adviser = '/storage/app/public/' . $filePath;
        }
        
        elseif ($request->signature_adviser) {
            $signatureData = $request->signature_adviser;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            if ($member->signature_adviser) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $member->signature_adviser));
            }
            $member->signature_adviser = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $request->validate([
                'file_upload' => 'mimes:jpg,jpeg,png,pdf|max:2048',
            ]);
            if ($member->signature_alltrust) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $member->signature_alltrust));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $member->signature_alltrust = '/storage/app/public/' . $filePath;
        }
        
        elseif ($request->signature_alltrust) {
            $signatureData = $request->signature_alltrust;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            if ($member->signature_alltrust) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $member->signature_alltrust));
            }
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $member->signature_alltrust = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file_1')) {
            if ($member->signature_1) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $member->signature_1));
            }
            $file = $request->file('signature_file_1');
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $member->signature_1 = '/storage/app/public/' . $filePath;
        }
        
        elseif ($request->signature_1) {
            $signatureData = $request->signature_1;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode($signatureData);
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if ($member->signature_1) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $member->signature_1));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $member->signature_1 = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('file_upload_2')) {
            if ($member->signature_2) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $member->signature_2));
            }
            $file = $request->file('file_upload_2');
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $member->signature_2 = '/storage/app/public/' . $filePath;
        }
        
        elseif ($request->signature_2) {
            $signatureData = $request->signature_2;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            if ($member->signature_2) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $member->signature_2));
            }
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $member->signature_2 = '/storage/app/public/signatures/' . $fileName;
        }
        
        $member->save();
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . ' saved the member application';
        $log->save();
        
        return redirect()->back();
    }
    
    public function  memberViewSpecific($id) {
        $viewMember = Member::find($id);
        $member = Member::find($id);
        return view('dashboard.member.ViewMember', compact('viewMember', 'member'));
    }

    public function destroys($id) {
        try {
            $member = Member::findOrFail($id);
            $member->delete();
            $log = new Log;
            $log->user_id = auth()->user()->id;
            $log->text = auth()->user()->name . ' deleted the member application';
            $log->save();
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function membersPending() {
        if(auth()->user()->role == 'admin'){
                $pendingMembers = Member::where('status', 'pending')->get();
                $fptPendingMembers = Fpt::where('status', 'pending')->get();
        }
        elseif(auth()->user()->role == 'oasis_sipp' || auth()->user()->role == 'sipp_property' || auth()->user()->role == 'full_sipp_property' || auth()->user()->role == 'fpt' || auth()->user()->role == 'member'){
            $pendingMembers = Member::where('status', 'pending')->where('role',auth()->user()->id)->get();
             $fptPendingMembers = Fpt::where('status', 'pending')->where('user_id',auth()->user()->id)->get();
        }
        else{
            $pendingMembers = Member::where('status', 'pending')->where('creater_id',auth()->user()->id)->get();
            $fptPendingMembers = Fpt::where('status', 'pending')->where('creater_id',auth()->user()->id )->get();
        }
        return view('dashboard.member.PendingMember', compact('pendingMembers','fptPendingMembers'));
    }


    public function memberExisting() {
        if(auth()->user()->role == 'admin'){
            $existingMembers = Member::where('status', 'active')->get();
            $fptActiveMembers = Fpt::where('status', 'active')->with('user')->get();
        }
        elseif(auth()->user()->role == 'oasis_sipp' || auth()->user()->role == 'sipp_property' || auth()->user()->role == 'full_sipp_property' || auth()->user()->role == 'fpt'  || auth()->user()->role == 'member'){
            $existingMembers = Member::where('status', 'active')->where('role',auth()->user()->id)->get();
            $fptActiveMembers = Fpt::where('status', 'active')->where('user_id',auth()->user()->id )->get();
        }
        else{
            $existingMembers = Member::where('status', 'active')->where('creater_id',auth()->user()->id)->get();
            $fptActiveMembers = Fpt::where('status', 'active')->where('creater_id',auth()->user()->id )->get();
        }
        return view('dashboard.member.ExistingMember', compact('existingMembers','fptActiveMembers'));
    }


    public function pendingamember($id, $status) {
        $offmember = Member::find($id);
        if (!$offmember) {
            return redirect()->back()->with('error', 'Member not found.');
        }
        $offmember->status = $status;
        $offmember->save();
        
        if($offmember->status == 'active'){
               $user = User::find($offmember->role);
            $user->role = 'member';
             $user->oasis_sipp__check = Null;
                $user->sipp_property_check = Null;
                $user->full_sipp_check = Null;
                $user->ftp_check = Null;
                $user->member_details_check = 'member_details_check';
            $user->save();
        }
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . ' changed the member application status';
        $log->save();
        return redirect()->back()->with('success', 'Status updated and emails sent.');
    }
    
    public function membersDetail() {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'advisor_firm'){
            $memberDetails = Member::where('status', 'active')->get();
            $ftpmemberDetails = FPT::where('status', 'active')->get();
            $apiUrl = "https://prod-08.northcentralus.logic.azure.com:443/workflows/88ad918d7f9644ee8c6835121cfb0069/triggers/When_a_HTTP_request_is_received/paths/invoke?api-version=2016-10-01&sp=%2Ftriggers%2FWhen_a_HTTP_request_is_received%2Frun&sv=1.0&sig=ZP1zTl5H29ovAluQrmd820nGHViP7UxlcrcYYuuLOOs";

  $sqlQuery = [
    "query" => "WITH CTE AS ( 
        SELECT  
            COALESCE(c.TITLE + ' ', '') + COALESCE(c.FIRSTNAME + ' ', '') + COALESCE(c.MIDDLENAME + ' ', '') + COALESCE(c.SURNAME, '') AS MemberName, 
            c.DATEOFBIRTH,  
            m.NINUMBER AS NationalInsuranceNumber, 
            p.REFERENCE AS SchemeName,  
            ROW_NUMBER() OVER (ORDER BY c.ID) AS RowNum  
        FROM  
            T_CONTACT c  
            JOIN T_MEMBER m ON m.CONTACTDETAILS_ID = c.ID  
            JOIN T_POLICY p ON p.MEMBER_MEMBER_ID = m.MEMBER_ID
        WHERE
            p.STATUS = 'A'
    )  
    SELECT MemberName, DATEOFBIRTH, NationalInsuranceNumber, SchemeName FROM CTE;"
];


            try {
                $response = Http::post($apiUrl, $sqlQuery);
                if ($response->successful()) {
                    $newmemberDetails = $response->json()['ResultSets']['Table1'] ?? [];
                } else {
                    $newmemberDetails = [];
                }
            } catch (\Exception $e) {
                $newmemberDetails = [];
            }
            
        }
        elseif(auth()->user()->role == 'oasis_sipp' || auth()->user()->role == 'sipp_property' || auth()->user()->role == 'full_sipp_property' || auth()->user()->role == 'fpt' || auth()->user()->role == 'member'){
            $memberDetails = Member::where('status', 'active')->where('role',auth()->user()->id)->get();
            $ftpmemberDetails = FPT::where('status', 'active')->where('user_id',auth()->user()->id)->get();
            $newmemberDetails = pensionmanagement::all();
        }
        else{
            $memberDetails = Member::where('status', 'active')->where('creater_id',auth()->user()->id)->get();
            $ftpmemberDetails = FPT::where('status', 'active')->where('creater_id',auth()->user()->id)->get();
            $newmemberDetails = pensionmanagement::all();
        }
        
        return view('dashboard.member.memberDetails', compact('memberDetails','ftpmemberDetails','newmemberDetails'));
    }
    
    public function restoreMember($id) {
        $member = Member::withTrashed()->find($id);
        if ($member) {
            $member->restore();
            $log = new Log;
            $log->user_id = auth()->user()->id;
            $log->text = auth()->user()->name . ' restored the member application';
            $log->save();
            return redirect()->back()->with('success', 'Member restored successfully');
        }
        return redirect()->back()->with('error', 'Member not found');
    }
    
    public function destroy($id) {
        $member = Member::find($id);
        if ($member) {
            $member->delete();
            $log = new Log;
            $log->user_id = auth()->user()->id;
            $log->text = auth()->user()->name . ' deleted the member application';
            $log->save();
            return redirect()->back()->with('success', 'Member soft deleted successfully.');
        }
        return redirect()->back()->with('error', 'Member not found.');
    }
    
    public function deleted() {
        $deletedFpt = Fpt::onlyTrashed()->get();
        $deletedMembers = Member::onlyTrashed()->get();
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . ' deleted the member application';
        $log->save();
        return view('dashboard.member.DeleteMember', compact('deletedMembers','deletedFpt'));
    }
 
    public function declinedList() {
        $declinedMember = Member::where('status', 'decline')->get();
        $declinedFpt = FPT::where('status', 'decline')->get();
        if(auth()->user()->role = 'admin'){
            $declinedMember = Member::where('status', 'decline')->get();
            $declinedFpt = FPT::where('status', 'decline')->get();
        }
        elseif(auth()->user()->role == 'oasis_sipp' || auth()->user()->role == 'sipp_property' || auth()->user()->role == 'full_sipp_property' || auth()->user()->role == 'fpt'  || auth()->user()->role == 'member'){
            $declinedMember = Member::where('status', 'decline')->where('role',auth()->user()->id)->get();
            $declinedFpt = FPT::where('status', 'decline')->where('user_id',auth()->user()->id)->get();
        }
        else{
            $declinedMember = Member::where('status', 'decline')->where('creater_id',auth()->user()->id)->get();
            $declinedFpt = FPT::where('status', 'decline')->where('creater_id',auth()->user()->id)->get();
        }
        
        return view('dashboard.member.DeclinedMember', compact('declinedMember', 'declinedFpt'));
    }

    public function membersBefore() {
        return view('dashboard.member.memberbefore');
    }
    
    public function membersBefore1() {
        return view('dashboard.member.memberbefore1');
    }
    
    public function changestatus($id, $status) {
        $member = Member::find($id);
        if ($member) {
            $member->status = $status;
            $member->save();
            $log = new Log;
            $log->user_id = auth()->user()->id;
            $log->text = auth()->user()->name . ' changed the member application status';
            $log->save();
            return redirect()->back()->with('success', "Member status updated to {$status} successfully!");
        }
        return redirect()->back()->with('error', 'Member status update failed!');
    }


    public function memberviewsignature(Request $request, $id){
        $member = Member::find($id);
        
        if ($request->hasFile('signature_file_save')) {
            $file = $request->file('signature_file_save');
            $request->validate([
                'signature_file_save' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $member->signature_save = '/storage/app/public/signatures/' . $fileName;
            $member->save();
        }
    
        elseif($request->signature_save) {
            $signatureData = $request->signature_save;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $member->signature_save = '/storage/app/public/signatures/' . $fileName;
            $member->save();
        }
        
        $username = 'Alltrust Business Team';
        $userEmail = 'testnewbiz@ilcorpdev.com';
           
           $messageContent = "
            <div style='font-family: Arial, sans-serif; line-height: 1.6; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px;'>
                <h2 style='color: #333;'>Member Application Submission Alert</h2>
                <p>Dear New Business Team,</p>
                <p>We have received a new application submission via the online portal. Please review the details at your earliest convenience.</p>
                <p>To access the application, click the link below:</p>
                <p><a href='https://www.alltrust.co.uk/alltrustonline/members-oasis-view/{$member->id}' target='_blank' style='color: #007bff; text-decoration: none;'>View Application</a></p>
                <p>Please liaise with the adviser and/or member directly with any questions or clarity required to complete the review process.</p>
                <p>Best regards,<br>The Alltrust Team</p>
            </div>
        ";
        
        Mail::to($userEmail)->send(new SimpleMail($messageContent));
        
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . ' signed the member application';
        $log->save();
        return redirect()->back();
    }
}