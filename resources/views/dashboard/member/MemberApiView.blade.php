@extends('dashboard.dashboard')

@section('content')

<style>
    /* Color Palette */
    :root {
        --primary-blue: #086898;  /* Your original blue */
        --primary-dark: #054d73;  /* Darker shade for hover */
        --light-gray: #f5f5f5;
        --white: #ffffff;
        --text: #333333;
        --hover: #e8eef2;
    }

    /* Global Font Family and Default Weight */
    * {
        font-family: 'Century Gothic', sans-serif !important;
        font-weight: 400; /* Normal weight for all text */
    }

    /* Main Tabs */
    .main-tabs {
        display: flex;
        margin-bottom: 30px;
        background: var(--white);
        border-bottom: 2px solid var(--primary-blue);
    }
    .main-tab {
        padding: 14px 30px;
        background: var(--light-gray);
        color: var(--text);
        cursor: pointer;
        transition: background 0.3s ease, color 0.3s ease;
        font-size: 1.1em;
    }
    .main-tab:hover {
        background: var(--hover);
    }
    .main-tab.active {
        background: var(--white);
        color: var(--primary-blue);
        border-bottom: 3px solid var(--primary-blue);
        margin-bottom: -2px;
    }

    /* Tab Content */
    .main-tab-content {
        display: none;
        padding: 25px;
        background: var(--white);
    }
    .main-tab-content.active {
        display: block;
    }
    .main-tab-content h3 {
        color: var(--primary-blue);
        font-size: 1.6em;
        margin-bottom: 20px;
    }

    /* Sub Tabs */
    .sub-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 25px;
    }
    .sub-tab {
        padding: 10px 20px;
        background: var(--light-gray);
        color: var(--text);
        cursor: pointer;
        border-radius: 4px;
        transition: all 0.3s ease;
        font-size: 1em;
    }
    .sub-tab:hover {
        background: var(--hover);
    }
    .sub-tab.active {
        background: var(--primary-blue);
        color: var(--white);
    }
    .sub-tab-content {
        display: none;
        padding: 20px;
        background: var(--white);
    }
    .sub-tab-content.active {
        display: block;
    }
    .sub-tab-content h4 {
        color: var(--primary-blue);
        font-size: 1.3em;
        margin-bottom: 15px;
    }

    /* Tables (Main and Subtables) */
    table {
        width: 100%;
        margin-top: 20px;
        background: var(--white);
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 8px;
        overflow: hidden;
    }
    th, td {
        padding: 12px 18px;
        text-align: left;
    }
    thead th {
        background: var(--primary-blue);
        color: var(--white);
        text-transform: uppercase;
        font-size: 0.9em;
        letter-spacing: 0.5px;
    }
    tbody tr:nth-child(even) {
        background: #fafafa;
    }
    tbody tr:hover {
        background: var(--hover);
    }
    tbody td {
        color: var(--text);
        font-size: 1em;
    }

    /* Grid Layouts */
    .personal-info-grid, .beneficiaries-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 15px;
    }
    .personal-info-grid label,
    .beneficiaries-grid label {
        color: var(--text);
        margin-bottom: 6px;
        display: block;
        font-size: 0.95em;
    }

    /* Inputs */
    input, textarea, select {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        font-size: 1em;
        border: none;
        border-bottom: 2px solid var(--primary-blue);
        background: var(--white);
        box-sizing: border-box;
        color: var(--text);
        transition: border-color 0.3s ease;
    }
    input[readonly], textarea[readonly] {
        background: var(--white);
        color: var(--text);
        border-bottom: 1px solid #ccc;
        opacity: 0.85;
    }

    /* Messages */
    .message {
        padding: 15px;
        margin: 15px 0;
        background: var(--light-gray);
        border-left: 4px solid var(--primary-blue);
        color: var(--text);
        font-size: 0.95em;
    }

    /* View Link and Details */
    .view-link {
        color: var(--primary-blue);
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .view-link:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }
    .hidden {
        display: none;
    }
    .details-section {
        margin-top: 25px;
    }
    .details-section h4 {
        color: var(--primary-blue);
        font-size: 1.3em;
        margin-bottom: 15px;
    }
    .back-btn {
        margin-top: 25px;
        padding: 12px 25px;
        background: var(--primary-blue);
        color: var(--white);
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s ease;
    }
    .back-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    /* Filters */
    .filter {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }
    .filter label {
        color: var(--text);
        margin-bottom: 5px;
        font-size: 1em;
    }

    /* Graphs */
    .graph-container {
        margin-top: 25px;
        padding: 20px;
        background: var(--white);
        text-align: center;
    }
    .graph-placeholder {
        height: 200px;
        background: var(--hover);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 15px;
        color: var(--text);
        font-size: 1em;
    }

    /* Selected Scheme Layout */
    .selected-scheme-container {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }
    .card {
        padding: 20px;
        background: var(--white);
    }
    .card h4 {
        color: var(--primary-blue);
        font-size: 1.3em;
        margin-bottom: 15px;
    }
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-top: 15px;
    }
    .info-item {
        display: flex;
        flex-direction: column;
    }
    .info-item label {
        color: #555;
        margin-bottom: 6px;
        font-size: 0.95em;
    }
    .info-item span {
        padding: 10px;
        background: var(--light-gray);
        color: var(--text);
        border-left: 3px solid var(--primary-blue);
    }
    .page-link {
        border-radius: 10px !important;
    }
    #dynamicFundPieChart{
        height: 300px !important;
        width: 300px !important;
    }
    .dataTables_filter{
        text-align: end !important;
    }
</style>

    <div class="main-tabs">
        <!--<div class="main-tab active" data-tab="scheme-selection">Selected Scheme Page (FA only)</div>-->
        <!--<div class="main-tab" data-tab="selected-scheme">Selected Scheme Page (FA or Member)</div>-->
        <div class="main-tab d-none" data-tab="member-information">Member Information | {{ $member['SchemeName'] ?? 'N/A'}}</div>
    </div>

    <!-- Selected Scheme Page (FA only) -->
    <!--<div id="scheme-selection" class="main-tab-content active">-->
    <!--    <h3>Selected Scheme Page (FA only)</h3>-->
    <!--    <table>-->
    <!--        <thead>-->
    <!--            <tr>-->
    <!--                <th>Scheme Name</th>-->
    <!--                <th>Scheme Reference</th>-->
    <!--                <th>Product Name</th>-->
    <!--                <th>Product Type</th>-->
    <!--                <th>Plan Commencement Date</th>-->
    <!--            </tr>-->
    <!--        </thead>-->
    <!--        <tbody>-->
    <!--            <tr>-->
    <!--                <td>{{ $member['MemberName'] ?? 'N/A' }}</td>-->
    <!--                <td>{{ $member['SchemeName'] ?? 'N/A'}}</td>-->
    <!--                <td>{{ $member['ProductName'] ?? 'N/A'}}</td>-->
    <!--                <td>SIPP</td>-->
    <!--                <td>{{ \Carbon\Carbon::parse($member['PlanCommencementDate'])->format('d-m-Y') ?? 'N/A' }}</td>-->

                    
    <!--            </tr>-->
                
    <!--        </tbody>-->
    <!--    </table>-->
    <!--</div>-->

    <!-- Selected Scheme Page (FA or Member) -->
    <!--<div id="selected-scheme" class="main-tab-content">-->
    <!--    <h3>Selected Scheme Page (FA or Member)</h3>-->
    <!--    <div class="selected-scheme-container">-->
            <!-- Section 1: Member Details -->
    <!--        <div class="card">-->
    <!--            <h4>Member Details</h4>-->
    <!--            <div class="info-grid">-->
    <!--                <div class="info-item">-->
    <!--                    <label>Member Name</label>-->
    <!--                    <span>{{ $member['MemberName'] ?? 'N/A' }}</span>-->
    <!--                </div>-->
    <!--                <div class="info-item">-->
    <!--                    <label>Plan Commencement Date</label>-->
    <!--                    <span>{{ $member['PlanCommencementDate'] ?? 'N/A' }}</span>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->

            <!-- Section 2: Plan Value -->
    <!--        <div class="card">-->
    <!--            <h4>Plan Value</h4>-->
    <!--            <div class="info-grid">-->
    <!--                <div class="info-item">-->
    <!--                    <label>Current Valuation</label>-->
    <!--                    <span>£{{ $member['CurrentValuation'] ?? 'N/A' }}</span>-->
    <!--                </div>-->
    <!--                <div class="info-item">-->
    <!--                    <label>Last Fund Split Date</label>-->
    <!--                    <span>{{ $member['LastFundSplitDate'] ?? 'N/A' }}</span>-->
    <!--                </div>-->
    <!--                <div class="info-item">-->
    <!--                    <label>Uncrystallised Value</label>-->
    <!--                    <span>£{{ $member['UncrystallisedValue'] ?? 'N/A' }}</span>-->
    <!--                </div>-->
    <!--                <div class="info-item">-->
    <!--                    <label>Crystallised Value</label>-->
    <!--                    <span>£{{ $member['CrystallisedValue'] ?? 'N/A' }}</span>-->
    <!--                </div>-->
    <!--                <div class="info-item">-->
    <!--                    <label>Total Value</label>-->
    <!--                    <span>£{{ $member['TotalValue'] ?? 'N/A' }}</span>-->
    <!--                </div>-->
    <!--                <div class="info-item">-->
    <!--                    <label>Annual Valuation Dates Since Inception</label>-->
    <!--                    <span>£{{ $member['AnnualValuationDates'] ?? 'N/A' }}</span>-->
    <!--                </div>-->
    <!--                <div class="info-item">-->
    <!--                    <label>Annual Valuations Since Inception</label>-->
    <!--                    <span>£{{ $member['AnnualValuations'] ?? 'N/A' }}</span>-->
    <!--                </div>-->
    <!--                <div class="info-item">-->
    <!--                    <label>Latest Value of Cash Accounts</label>-->
    <!--                    <span>£{{ $member['LatestValueCashAccounts'] ?? 'N/A' }}</span>-->
    <!--                </div>-->
    <!--                <div class="info-item">-->
    <!--                    <label>Latest Value of Platform 1</label>-->
    <!--                    <span>£{{ $member['LatestValuePlatform1'] ?? 'N/A' }}</span>-->
    <!--                </div>-->
    <!--                <div class="info-item">-->
    <!--                    <label>Latest Value of Property</label>-->
    <!--                    <span>£{{ $member['LatestValueProperty'] ?? 'N/A' }}</span>-->
    <!--                </div>-->
    <!--                <div class="info-item">-->
    <!--                    <label>Latest Value of Other Combined Assets</label>-->
    <!--                    <span>£{{ $member['LatestValueOtherAssets'] ?? 'N/A' }}</span>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->

            <!-- Graphs -->
    <!--        <div class="graph-container">-->
    <!--            <h4>Historic Performance Graph</h4>-->
    <!--            <div class="graph-placeholder">-->
    <!--                [Placeholder for Historic Performance Graph: Annual Valuation Dates vs. Annual Valuations]-->
    <!--            </div>-->
    <!--            <p>Data based on Annual Valuation Dates Since Inception and Annual Valuations Since Inception</p>-->
    <!--        </div>-->


    <!--        <div class="graph-container">-->
    <!--            <h4>Holdings Chart</h4>-->
    <!--            <div class="graph-placeholder">-->
    <!--                [Placeholder for Holdings Chart: Cash Accounts, Platform 1, Property, Other Assets]-->
    <!--            </div>-->
    <!--            <p>Latest Values: Cash Accounts (£20,000), Platform 1 (£180,000), Property (£40,000), Other Assets (£10,000)</p>-->
    <!--        </div>-->

            <!-- Note -->
    <!--        <div class="message">-->
    <!--            Note: Current valuation is based on the last values provided, which may not be current depending on asset type.-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
                 @php
    $fullName = trim(($member['Title'] ?? '') . ' ' . ($member['FirstName'] ?? '') . ' ' . ($member['MiddleName'] ?? '') . ' ' . ($member['Surname'] ?? ''));
@endphp
    <!-- Member Information -->
    <div id="member-information" class="main-tab-content active">
        <h3>Member Information: {{ $fullName ?? 'N/A' }} | {{ $member['SchemeName'] ?? 'N/A' }} | Total scheme value = <span id="totalamount">£0.00</span>
</h3>
        
        <div class="sub-tabs">
            <div class="sub-tab active" data-subtab="general-details">General Details</div>
            <div class="sub-tab" data-subtab="beneficiaries">Beneficiaries</div>
            <div class="sub-tab" data-subtab="transfers">Transfers</div>
            <div class="sub-tab" data-subtab="contributions">Contributions</div>
            <div class="sub-tab" data-subtab="bank-accounts">Bank Accounts</div>
            <div class="sub-tab" data-subtab="assets">Assets</div>
            <!--<div class="sub-tab" data-subtab="benefit-events">Benefit Events</div>-->
            <div class="sub-tab" data-subtab="pension-payments">Pension Payments</div>
        </div>

        <!-- General Details -->
        <div id="general-details" class="sub-tab-content active">
            <h4>General Details</h4>
            <div class="personal-info-grid">
                <div>
   
                    
                    <label>Member Name</label>
                    <input type="text" value="{{ $fullName  ?? 'N/A' }}" readonly>
                </div>
                <div>
                    <label>Date of Birth</label>
                   <input type="text" value="{{ isset($member['DATEOFBIRTH']) ? \Carbon\Carbon::parse($member['DATEOFBIRTH'])->format('d-m-Y') : 'N/A' }}" readonly>
                </div>
                <div>
                    <label>National Insurance Number</label>
                    <input type="text" value="{{ $member['NationalInsuranceNumber'] ?? 'N/A' }}" readonly>
                </div>
                <div>
                    <label>Tax Information Number</label>
                    <input type="text" value="{{ $member['TaxInformationNumber'] ?? 'N/A' }}" readonly>
                </div>

<div class="mb-4">
    <label class="font-semibold">E-mail</label>
    <input type="email" class="form-input w-full" value="{{ $member['Email'] ?? 'N/A' }}" readonly>
</div>

<div class="mb-4">
    <label class="font-semibold">Phone No.</label>
    <input type="text" class="form-input w-full" value="{{ $member['PhoneNo'] ?? 'N/A' }}" readonly>
</div>

<div class="mb-4">
    <label class="font-semibold">Address</label>
    <textarea readonly class="form-textarea w-full" rows="5">{{ $member['Address'] ?? 'N/A' }}</textarea>
</div>


                <div>
                    <label>Financial Advisory Firm & Adviser</label>
                    <input type="email" value="{{ $member['Name'] ?? 'N/A' }}" readonly>
                </div>


                </div>

            </div>
            <!--<div class="message">Please ensure your contact information is kept up to date.</div>-->
        </div>

        <!-- Beneficiaries -->
<div id="beneficiaries" class="sub-tab-content">
    <h4>Beneficiaries</h4>

    @if(!empty($member['Beneficiaries']) && count($member['Beneficiaries']) > 0)
        
    <table class="beneficiaries-table" id="myTable4">
        <thead>
            <tr>
                <th>Beneficiary Name</th>
                <th>Relationship to Member</th>
                <th>Percentage</th>
                <!--<th>Date of Birth</th>-->

            </tr>
        </thead>
        <tbody>
            @foreach($member['Beneficiaries'] as $index => $beneficiary) 
    <tr>
        <td>{{ $beneficiary['BeneficiaryName'] ?? 'N/A' }}</td>
        <td>{{ $beneficiary['BeneficiaryRelationship'] ?? 'N/A' }}</td>
        <td>{{ $beneficiary['BeneficiaryPercentage'] ?? 'N/A' }}</td>
    </tr>
@endforeach

        </tbody>
    </table>
            <hr>
        
    @else
        <p>No beneficiaries found.</p>
    @endif

    <!--<div class="message">-->
    <!--    Expression of Wish received: Please note that trustee discretion applies in identifying beneficiaries.-->
    <!--</div>-->
</div>


 <!-- Transfers -->
<div id="transfers" class="sub-tab-content">
    <h4>Transfers</h4>

    @if(!empty($member['TransferDetails']) && count($member['TransferDetails']) > 0)
        <table class="table" id="myTable5">
            <thead>
                <tr>
                    <th>Completion Date</th>
                    <th>Ceding Scheme Name</th>
                    <th>Ceding Scheme Reference</th>
                    <th>Transfer Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
             @foreach ($member['TransferDetails'] as $transfer)
    @php
        $status = $transfer['CrystallizationStatus'] ?? null;
        if ($status === 'CAN' || $status === 'REF') continue;

        $statuses = [
            'ACC' => 'Accepted',
            'CAA' => 'Cancelled After Acceptance',
            'CAN' => 'Cancelled',
            'COM' => 'Completed',
            'PRO' => 'Processing',
            'REF' => 'Refused',
        ];
    @endphp
    <tr>
        <td>{{ isset($transfer['CompletionDate']) ? \Carbon\Carbon::parse($transfer['CompletionDate'])->format('d-m-Y') : 'N/A' }}</td>
        <td>{{ $transfer['CedingSchemeName'] ?? 'N/A' }}</td>
        <td>{{ $transfer['CedingSchemeReference'] ?? 'N/A' }}</td>
        <td>
            £{{ isset($transfer['TransferAmount']) ? number_format($transfer['TransferAmount'], 2, '.', ',') : 'N/A' }}
        </td>
        <td>{{ $statuses[$status] ?? 'N/A' }}</td>
    </tr>
@endforeach

            </tbody>
        </table>
        <hr>
    @else
        <p>No transfers found.</p>
    @endif
</div>


<!-- Contribution Transactions -->
<div id="contributions" class="sub-tab-content">
    <!--<h4>All Contribution Transactions  @if(!empty($member['filter_status'])) ( {{ $member['filter_status'] }} ) @endif </h4>-->
<h5>
    @if (!preg_match('/^(ISS|OAS|CAL|HA|CC|L|A|USS|FS\/|FB\/|GR)/', $member['SchemeName']))
        Please contact us if you require further details regarding your contributions.<br>
        Only reconciled items are displayed.
    @endif
</h5>

    @if(!empty($member['contribution_transactions']) && count($member['contribution_transactions']) > 0)
        @php
            \Log::info("Contributions Data: " . json_encode($member['contribution_transactions']));
        @endphp
        <table class="table" id="myTable3">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Transaction Type</th>
                    <th>Category</th>
                    <th>Narrative</th>
                    <th>Amount (£)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($member['contribution_transactions'] as $contribution)
                    <tr>
                        <td>{{ !empty($contribution['Date']) ? \Carbon\Carbon::parse($contribution['Date'])->format('d-m-Y') : 'N/A' }}</td>
                        <td>{{ $contribution['Type'] ?? 'N/A' }}</td>
                        <td>{{ $contribution['Category'] ?? 'N/A' }}</td>
                        <td>{{ $contribution['Narrative'] ?? 'N/A' }}</td>
                        <td>£{{ number_format($contribution['NetAmount'] ?? 0, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No contribution transactions found.</p>
    @endif
    
        @php
            $schemeName = $member['SchemeName'];
            $csvPath = storage_path('app/public/Sitar.csv');
            $date = null;
        
            if (($handle = fopen($csvPath, 'r')) !== false) {
                while (($data = fgetcsv($handle)) !== false) {
                    if (isset($data[0]) && trim($data[0]) === $schemeName) {
                        $date = $data[3] ?? null;
                        break;
                    }
                }
                fclose($handle);
            }
        @endphp
        
        @if (preg_match('/^(ISS|OAS|CAL|HA|CC|L|A|USS|FS\/|FB\/|GR)/', $member['SchemeName']))
            Your contribution history is available from {{ isset($date) ? \Carbon\Carbon::parse($date)->format('d-m-Y') : 'Not found' }}.  If you require further details, please contact us.
            Only reconciled items are displayed.
        @endif
</div>

<!-- Bank Accounts -->
<div id="bank-accounts" class="sub-tab-content">
    <h4>Bank Accounts</h4>
    <div class="bank-accounts-summary">
        <table class="table" id="myTable6">
            <thead>
                <tr>
                    <th>Sort Code</th>
                    <th>Account Number</th>
                    <th>Account Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               
                @foreach ($member['banking_details'] ?? [] as $bankDetail)
                    @if ($bankDetail['Syndicate'] === 'Policy Cash')
                        <tr>
                            <td>{{ $bankDetail['SortCode'] ?? 'N/A' }}</td>
                            <td>{{ $bankDetail['AccountNumber'] ?? 'N/A' }}</td>
                            <td>{{ $bankDetail['AccountName'] ?? 'N/A' }}</td>
                            <td>
                                <button onclick="showBankDetails({{ json_encode($bankDetail) }})">View</button>
                            </td>
                        </tr>
                    @endif
                @endforeach
                @if (!collect($member['banking_details'] ?? [])->contains('Syndicate', 'Policy Cash'))
                 <p>No Policy Cash bank accounts found.</p>
                   
                @endif
            </tbody>
        </table>
    </div>

    <div class="details-section bank-accounts-details hidden">
        <h5>
            @if (preg_match('/^(ISS|OAS|CAL|HA|CC|L|A|USS|FS\/|FB\/|GR)/', $member['SchemeName']))
                If unreconciled amounts are displayed, they are not available for use until they are reconciled.  
                The balance shown reflects transactions in the member bank account up to the previous working day.  
                Bank account transactions are available from 06/04/2024.
            @else
                If unreconciled amounts are displayed, they are not available for use until they are reconciled.  
                The balance shown reflects transactions in the member bank account up to the previous working day.
            @endif
        </h5>

        <h4 >Account balance : <span id="total"></span></h4>
        <span><small>If unreconciled amounts are displayed, they are not shown in the current balance until they are reconciled.</small></span>
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="minDate">From:</label>
                <input type="date" id="minDate" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="maxDate">To:</label>
                <input type="date" id="maxDate" class="form-control">
            </div>
            <div class="col-md-1 align-self-center">
                <button class="btn btn-primary" onclick="filterByDate()">Filter</button>
            </div>
            <div class="col-md-1 align-self-center">
                <button class="btn btn-secondary" onclick="resetFilter()">Reset</button>
            </div>
            <div class="col-md-1 align-self-center">
                <button class="btn btn-success" onclick="showBankSummary()">Back</button>
            </div>
        </div>
        
        <table class="table" id="myTable1">
            <thead>
                <tr>
                    <th>Date</th>
                    <!--<th>Type</th>-->
                    <th>Transaction Type</th>
                    <th>Narrative</th>
                    <th>Amount</th> 
                    <th>Balance</th>
                    <!-- Updated label -->
                    <!-- Removed Vat column -->
                </tr>
            </thead>
            <tbody id="transactionsTable">
                <!-- Transaction rows will be inserted here dynamically -->
            </tbody>
            
        </table>
    </div>
</div>



        <!-- Assets -->
       <!-- HTML Content -->

<!-- Assets -->
<div id="assets" class="sub-tab-content">
    <h4>Assets</h4>
    <div class="assets-summary">
        <h5>The values displayed are subject to change and should not be relied upon for calculations.</h5>
        <table class="table" id="myTable7">
            <thead>
                <tr>
                    <th>Holding Type</th>
                    <th>Description</th>
                    <th>Provider Reference</th>
                    <th>Purchase Date</th>
                    <th>Value</th>
                    <th>Last Valuation</th>
                    <th>Action</th>
                </tr>
            </thead>
          <tbody>
@if (!empty($member['ExternallyManagedAssets']))
    @foreach ($member['ExternallyManagedAssets'] as $index => $asset)
        @php
            $csv = $asset['CsvData'] ?? null;
            $isArray = is_array($csv);
            $csvItems = $isArray ? $csv : ($csv ? [$csv] : []);
            $hasCsvData = !empty($csvItems);
            $totalVal = 0;

            if ($hasCsvData) {
                foreach ($csvItems as $item) {
                    $totalVal += is_numeric($item['MKTVALGBP'] ?? null) ? $item['MKTVALGBP'] : 0;
                }
            } else {
                $totalVal = $asset['CurrentValuationAmount'] ?? 0;
            }
        @endphp

        <tr>
            <td>{{ $asset['EmaTypeName'] ?? 'N/A' }}</td>
            <td>{{ $asset['AssetName'] ?? 'N/A' }}</td>
            <td>{{ $asset['ProviderReference'] ?? 'N/A' }}</td>
            <td>{{ \Carbon\Carbon::parse($asset['EffectiveFrom'])->format('d-m-Y') ?? 'N/A' }}</td>

            <td>
                {{ $hasCsvData ? '£' . number_format($totalVal, 2) : number_format($totalVal, 2) }}
            </td>

            @if ($totalVal > 0)
            <td>
                {{ $hasCsvData 
                    ? \Carbon\Carbon::yesterday()->format('d-m-Y') 
                    : (!empty($asset['CurrentValuationDate']) 
                        ? \Carbon\Carbon::parse($asset['CurrentValuationDate'])->format('d-m-Y') 
                        : 'N/A') 
                }}
            </td>
            @else
            <td></td>
            @endif

            <td>
                <a href="#" class="view-link" onclick="showAssetDetails({{ $index }})">
                    View
                </a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="7">No Externally Managed Assets Available</td>
    </tr>
@endif
</tbody>


        </table>
    </div>

    <div class="details-section assets-details hidden" id="portfolio-details">
        <div style="margin-top: 30px;">
            <h5>Values may fluctuate based on market conditions.</h5>
            <h4>Fund Value Distribution</h4>
            <div style="display: flex; justify-content: space-between; gap: 20px;">
                <!-- Bar Chart -->
                <div style="flex: 1; max-width: 48%;">
                    <canvas id="dynamicFundBarChart"></canvas>
                </div>
                <!-- Pie Chart -->
                <div style="flex: 1; max-width: 38%;">
                    <canvas id="dynamicFundPieChart"></canvas>
                </div>
            </div>
            <p id="totalValue" class="total-value text-center mt-3"></p>
        </div>

        <div>
            <table class="table" id="myTable8">
                <div class="text-end">
                    <button class="back-btn" onclick="showAssetSummary()">Back</button>
                </div>
                <thead>
                    <tr>
                        <th>Fund Name</th>
                        <th>ISIN</th>
                        <th>Fund Price</th>
                        <th>Units Held</th>
                        <th>Fund Value</th>
                    </tr>
                </thead>
                <tbody id="csv-details-body">
                    <!-- Filled dynamically -->
                </tbody>
            </table>
        </div>
    </div>
</div>

        <!-- Benefit Events -->
<div id="benefit-events" class="sub-tab-content">
    <h4>Benefit Events</h4>

    @if(!empty($member['Benefits']) && count($member['Benefits']) > 0)
        <table class="table" id="myTable9">
            <thead>
                <tr>
                    <th>Crystallisation Date</th>
                    <th>Arrangement Type</th>
                    <th>Amount Crystallised</th>
                    <th>Tax Free Lump Sum</th>
                    <th>Net Pension Fund</th>
                    <th>Total Allocated</th> {{-- New Column --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($member['Benefits'] as $benefit) 
                    <tr>
                        <td>
                            {{ !empty($benefit['CrystallisationDate']) ? \Carbon\Carbon::parse($benefit['CrystallisationDate'])->format('d-m-Y') : 'N/A' }}
                        </td>
                        <td>{{ $benefit['ArrangementType'] ?? 'N/A' }}</td>
                        <td>
                            {{ isset($benefit['AmountCrystallised']) && is_numeric($benefit['AmountCrystallised']) 
                                ? '£' . number_format($benefit['AmountCrystallised'], 2) 
                                : 'N/A' }}
                        </td>
                        <td>
                            {{ isset($benefit['TaxFreeLumpSum']) && is_numeric($benefit['TaxFreeLumpSum']) 
                                ? '£' . number_format($benefit['TaxFreeLumpSum'], 2) 
                                : 'N/A' }}
                        </td>
                        <td>
                            @if (
                                isset($benefit['AmountCrystallised'], $benefit['TaxFreeLumpSum']) &&
                                is_numeric($benefit['AmountCrystallised']) &&
                                is_numeric($benefit['TaxFreeLumpSum'])
                            )
                                £{{ number_format($benefit['AmountCrystallised'] - $benefit['TaxFreeLumpSum'], 2) }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            {{ isset($benefit['TotalAllocated']) && is_numeric($benefit['TotalAllocated']) 
                                ? '£' . number_format($benefit['TotalAllocated'], 2) 
                                : 'N/A' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No benefit events found.</p>
    @endif
</div>



<!-- Pension Payments -->
<div id="pension-payments" class="sub-tab-content">
    <h4>Pension Payments</h4>
    @php
        $schemeName2 = $member['SchemeName'];
        $csvPath2 = storage_path('app/public/Sitar.csv');
        $date2 = null;
    
        if (($handle = fopen($csvPath2, 'r')) !== false) {
            while (($data2 = fgetcsv($handle)) !== false) {
                if (isset($data2[0]) && trim($data2[0]) === $schemeName2) {
                    $date2 = $data2[4] ?? null;
                    break;
                }
            }
            fclose($handle);
        }
    @endphp
    
     @if (preg_match('/^(ISS|OAS|CAL|HA|CC|L|A|USS|FS\/|FB\/|GR)/', $member['SchemeName']))
    <h5>Your pension payment history is available from your next payment date after {{ isset($date2) ? \Carbon\Carbon::parse($date2)->format('d-m-Y') : 'Not found' }}
, if you require further details please contact us.</h5>
    @endif
    
    @if(isset($member['PayslipDetails']) && is_array($member['PayslipDetails']) && count($member['PayslipDetails']) > 0)
       
    
    <table class="table" id="myTable2">
        <thead>
            <tr>
                <th>Payment Date</th>
                <!--<th>Narrative</th>-->
                <th>Gross</th>
                <th>Net</th>
                <th>PAYE</th>
            </tr>
        </thead>
        <tbody>
           
                @foreach($member['PayslipDetails'] as $payslip)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($payslip['PaymentDate'])->format('d/m/Y') }}</td>
                        <!--<td>{{ $payslip['Narrative'] ?? 'N/A' }}</td>-->
                        <td>£{{ number_format($payslip['GROSSAMOUNT'], 2) }}</td>
                        <td>£{{ number_format($payslip['Net'], 2) }}</td>
                        <td>£{{ number_format($payslip['PAYE'], 2) }}</td>
                    </tr>
                @endforeach
          
        </tbody>
    </table>
    @else
        <p>No Pension Payments found</p>
    @endif
    
</div>
    </div>



    <script>
        // Main Tabs Functionality
        const mainTabs = document.querySelectorAll('.main-tab');
        const mainContents = document.querySelectorAll('.main-tab-content');

        mainTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                mainTabs.forEach(item => item.classList.remove('active'));
                mainContents.forEach(content => content.classList.remove('active'));

                tab.classList.add('active');
                document.getElementById(tab.getAttribute('data-tab')).classList.add('active');

                // Reset sub-tabs to show first one
                const subTabs = document.querySelectorAll('.sub-tab');
                const subContents = document.querySelectorAll('.sub-tab-content');
                subTabs.forEach(st => st.classList.remove('active'));
                subContents.forEach(sc => sc.classList.remove('active'));
                if (subTabs.length > 0) {
                    subTabs[0].classList.add('active');
                    subContents[0].classList.add('active');
                }
            });
        });

        // Sub Tabs Functionality
        const subTabs = document.querySelectorAll('.sub-tab');
        const subContents = document.querySelectorAll('.sub-tab-content');

        subTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                subTabs.forEach(item => item.classList.remove('active'));
                subContents.forEach(content => content.classList.remove('active'));

                tab.classList.add('active');
                document.getElementById(tab.getAttribute('data-subtab')).classList.add('active');
            });
        });

        // // Bank Accounts View Functionality
        // function showBankDetails() {
        //     document.querySelector('.bank-accounts-summary').classList.add('hidden');
        //     document.querySelector('.bank-accounts-details').classList.remove('hidden');
        // }

        // function showBankSummary() {
        //     document.querySelector('.bank-accounts-summary').classList.remove('hidden');
        //     document.querySelector('.bank-accounts-details').classList.add('hidden');
        // }

     
    </script>
    
    
  <!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Assuming $member['ExternallyManagedAssets'] has data, you pass it like this
const externallyManagedAssets = @json($member['ExternallyManagedAssets'] ?? []);

let chartInstanceBar = null;  // For bar chart
let chartInstancePie = null;  // For pie chart

function showAssetDetails(index) {
    const asset = externallyManagedAssets[index];
    const csvData = asset.CsvData ?? [];
    const rows = [];

    if (Array.isArray(csvData) && csvData.length > 0) {
        csvData.forEach(csv => {
            rows.push(
                `<tr>
                    <td>${csv.HLDNAME ?? 'N/A'}</td>
                    <td>${csv.ISIN ?? 'N/A'}</td>
                    <td>${isNaN(csv.TYPE) ? (csv.TYPE ?? 'N/A') : Number(csv.TYPE).toLocaleString('en-GB', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                    <td>${isNaN(csv.QUANTITY) ? 'N/A' : Number(csv.QUANTITY).toLocaleString('en-GB', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                    <td>£${isNaN(csv.MKTVALGBP) ? 'N/A' : Number(csv.MKTVALGBP).toLocaleString('en-GB', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                </tr>`
            );
        });
    } else if (csvData && typeof csvData === 'object' && Object.keys(csvData).length > 0) {
        rows.push(
            `<tr>
                <td>${csvData.HLDNAME ?? 'N/A'}</td>
                <td>${csvData.ISIN ?? 'N/A'}</td>
                <td>${isNaN(csvData.TYPE) ? (csvData.TYPE ?? 'N/A') : Number(csvData.TYPE).toLocaleString('en-GB', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                <td>${isNaN(csvData.QUANTITY) ? 'N/A' : Number(csvData.QUANTITY).toLocaleString('en-GB', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                <td>£${isNaN(csvData.MKTVALGBP) ? 'N/A' : Number(csvData.MKTVALGBP).toLocaleString('en-GB', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
            </tr>`
        );
    } else {
        rows.push(
            `<tr>
                <td colspan="5" class="text-center">Detailed Asset information is not currently available</td>
            </tr>`
        );
    }

    renderDynamicCharts(csvData);

    document.getElementById('csv-details-body').innerHTML = rows.join('');
    document.querySelector('.assets-summary').classList.add('hidden');
    document.querySelector('.assets-details').classList.remove('hidden');
}

function showAssetSummary() {
    document.querySelector('.assets-summary').classList.remove('hidden');
    document.querySelector('.assets-details').classList.add('hidden');
}

function renderDynamicCharts(csvData) {
    const funds = Array.isArray(csvData) ? csvData : [csvData];

    const labels = [];
    const values = [];
    let totalValue = 0;

    funds.forEach(fund => {
        const name = fund.HLDNAME ?? 'Unnamed Fund';
        const value = parseFloat(fund.MKTVALGBP) || 0;
        labels.push(name);
        values.push(value);
        totalValue += value;
    });

    const percentages = values.map(val => (val / totalValue) * 100);

    document.getElementById('totalValue').textContent = `Total Fund Value: £${totalValue.toLocaleString('en-GB', { minimumFractionDigits: 2 })}`;

    const ctxBar = document.getElementById('dynamicFundBarChart').getContext('2d');
    const ctxPie = document.getElementById('dynamicFundPieChart').getContext('2d');

    if (chartInstanceBar) {
        chartInstanceBar.destroy();
    }
    if (chartInstancePie) {
        chartInstancePie.destroy();
    }

    // Bar Chart
    chartInstanceBar = new Chart(ctxBar, {
        type: 'bar', 
        data: {
            labels: labels,
            datasets: [{
                label: 'Percentage of Total Fund Value (%)',
                data: percentages,
                backgroundColor: 'rgba(75, 192, 192, 0.7)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    max: 100,
                    title: {
                        display: true,
                        text: 'Percentage (%)'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Fund Name'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const raw = context.raw;
                            const label = context.label;
                            const originalValue = values[context.dataIndex];
                            return `${label}: ${raw.toFixed(2)}% (£${originalValue.toLocaleString('en-GB', { minimumFractionDigits: 2 })})`;
                        }
                    }
                }
            }
        }
    });

function generateColorMap(labels) {
    const usedColors = new Set();
    const colorMap = {};

    let hue = 0;
    const hueStep = Math.floor(360 / labels.length);

    labels.forEach((label, index) => {
        let color;
        let attempts = 0;
        do {
            const saturation = 60 + (index * 15 % 20); // Vary saturation: 60–80%
            const lightness = 50 + (index * 10 % 20); // Vary lightness: 50–70%
            color = `hsl(${hue % 360}, ${saturation}%, ${lightness}%)`;
            hue += hueStep;
            attempts++;
        } while (usedColors.has(color) && attempts < 100);

        usedColors.add(color);
        colorMap[label] = color;
    });

    return colorMap;
}

const colorMap = generateColorMap(labels);
const backgroundColors = labels.map(label => colorMap[label]);

// Pie Chart config stays the same
chartInstancePie = new Chart(ctxPie, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            label: 'Percentage of Total Fund Value (%)',
            data: percentages,
            backgroundColor: backgroundColors,
            borderColor: backgroundColors,
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false 
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const label = context.label || '';
                        const value = context.raw || 0;
                        const originalValue = values[context.dataIndex];
                        return `${label}: ${value.toFixed(2)}% (£${originalValue.toLocaleString('en-GB', { minimumFractionDigits: 2 })})`;
                    }
                }
            }
        }
    }
});


}
</script>

    
    



    

@endsection

@section('script')
<!-- DataTables and Moment.js Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.6/sorting/datetime-moment.js"></script>
<script src="https://newalltrust.ilcorpdev.com/public/assets/js/tables-datatables-advanced.js"></script>



<script>
function showBankDetails(bankDetail) {
    document.querySelector('.bank-accounts-summary').classList.add('hidden');
    document.querySelector('.bank-accounts-details').classList.remove('hidden');

    populateTransactionsTable(bankDetail);
}

function showBankSummary() {
    document.querySelector('.bank-accounts-summary').classList.remove('hidden');
    document.querySelector('.bank-accounts-details').classList.add('hidden');
}








function populateTransactionsTable(bankDetail) {
    
    const transactions = (bankDetail.Transactions || []).filter(tx => bankDetail.Syndicate === 'Policy Cash');
    const $table = $('#myTable1');

    if ($.fn.DataTable.isDataTable('#myTable1')) {
        $table.DataTable().clear().destroy();
    }

    const $tbody = $('#transactionsTable');
    $tbody.empty();

    let totalCredit = 0;
    let totalDebit = 0;
    let anyother = 0;
    let runningBalance = 0;

    // ✅ Step 1: Sort ascending (oldest to newest)
    transactions.sort((a, b) => new Date(a.ValueDate) - new Date(b.ValueDate));

    const seenTransactions = new Set();
    const processedRows = [];

    // transactions.forEach(transaction => {
    //     const transactionNumber = transaction.TransactionNumber || '';
    //     if (!seenTransactions.has(transactionNumber)) {
    //         seenTransactions.add(transactionNumber);

    //         const netAmount = Number(transaction.NetAmount || 0);
    //         const vatAmount = Number(transaction.VatAmount || 0);
    //         const totalAmount = netAmount + vatAmount;

    //         const isDebit = transaction.PostingRuleType === 'D' || transaction.PostingType?.toLowerCase() === 'debit';
    //         const isCredit = transaction.PostingRuleType === 'C' || transaction.PostingType?.toLowerCase() === 'credit';

    //         if (isDebit) {
    //             totalDebit += totalAmount;
    //             runningBalance -= totalAmount;
    //         } else if (isCredit) {
    //             totalCredit += totalAmount;
    //             runningBalance += totalAmount;
    //         } else {
    //             anyother += totalAmount;
    //         }

    //         const sign = isDebit ? '-' : '+';
    //         const signedAmount = `${sign}£${totalAmount.toLocaleString('en-GB', {
    //             minimumFractionDigits: 2,
    //             maximumFractionDigits: 2
    //         })}`;

    //         const balanceFormatted = `£${runningBalance.toLocaleString('en-GB', {
    //             minimumFractionDigits: 2,
    //             maximumFractionDigits: 2
    //         })}`;

    //         // Store for later reverse display
    //         processedRows.push(`
    //             <tr>
    //                 <td>${formatDate(transaction.ValueDate)}</td>
                  
    //                 <td>${transaction.Narrative || 'N/A'}</td>
    //                 <td>${signedAmount}</td>
    //                 <td>${balanceFormatted}</td>
    //             </tr>
    //         `);
    //     }
    // });
    
    transactions.forEach(transaction => {
    const netAmount = Number(transaction.NetAmount || 0);
    const vatAmount = Number(transaction.VatAmount || 0);
    const totalAmount = netAmount + vatAmount;

    const isDebit = transaction.PostingRuleType === 'D' || transaction.PostingType?.toLowerCase() === 'debit';
    const isCredit = transaction.PostingRuleType === 'C' || transaction.PostingType?.toLowerCase() === 'credit';

    if (isDebit) {
        totalDebit += totalAmount;
        runningBalance -= totalAmount;
    } else if (isCredit) {
        totalCredit += totalAmount;
        runningBalance += totalAmount;
    } else {
        anyother += totalAmount;
    }

    const sign = isDebit ? '-' : '+';
    const signedAmount = `${sign}£${totalAmount.toLocaleString('en-GB', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    })}`;

    const balanceFormatted = `£${runningBalance.toLocaleString('en-GB', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    })}`;

    processedRows.push(`
        <tr>
            <td>${formatDate(transaction.ValueDate)}</td>
            <td>${transaction.TransactionType || 'Unreconciled'}</td>
            <td>${transaction.Narrative || 'N/A'}</td>
            <td>${signedAmount}</td>
            <td>${balanceFormatted}</td>
        </tr>
    `);
});

    

    // ✅ Step 2: Reverse to show most recent first in UI
    processedRows.reverse().forEach(row => $tbody.append(row));

    // Format total summary
    const formattedCredit = `£${totalCredit.toLocaleString('en-GB', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    const formattedDebit = `£${totalDebit.toLocaleString('en-GB', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    const formattedOther = `£${anyother.toLocaleString('en-GB', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    const netBalance = totalCredit - totalDebit;
    const balanceType = netBalance >= 0 ? 'Credit' : 'Debit';
    const netSign = netBalance >= 0 ? '+' : '-';
    const formattedNet = `${netSign}£${Math.abs(netBalance).toLocaleString('en-GB', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    })}`;

    // Set in DOM
    document.getElementById('total').innerHTML = ` ${formattedNet}`;

if (window.jQuery) {
    $.fn.dataTable.ext.errMode = 'none';

    if (typeof $.fn.dataTable.moment === 'function') {
        // Register datetime formats
        $.fn.dataTable.moment('DD-MM-YYYY');
        $.fn.dataTable.moment('DD/MM/YYYY');
    } else {
        // ✨ Manual fallback if datetime-moment not registered automatically
        if (typeof moment !== 'undefined') {
            $.fn.dataTable.ext.type.detect.unshift(function (d) {
                return moment(d, 'DD-MM-YYYY', true).isValid() ? 'moment-DD-MM-YYYY' : null;
            });
            $.fn.dataTable.ext.type.order['moment-DD-MM-YYYY-pre'] = function (d) {
                return moment(d, 'DD-MM-YYYY').unix();
            };
        } else {
            console.error('Moment.js not loaded.');
        }
    }
}


    // Initialize DataTable
    $table.DataTable({
        responsive: true,
        autoWidth: false,
        paging: true,
        pageLength: 10,
        lengthChange: true,
        searching: true,
          processing: true,
        serverSide: false,
        info: true,
        ordering: true,
        order: [[0, 'desc']]
    });
}

</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {


if (window.jQuery) {
    $.fn.dataTable.ext.errMode = 'none';

    // Try to use datetime-moment plugin first
    if (typeof $.fn.dataTable.moment === 'function') {
        $.fn.dataTable.moment('DD-MM-YYYY');
        $.fn.dataTable.moment('DD/MM/YYYY');
    } else {
        // Fallback using manual Moment.js detection and sorting
        if (typeof moment !== 'undefined') {
            // Create one common type for both formats
            $.fn.dataTable.ext.type.detect.unshift(function (d) {
                if (moment(d, ['DD-MM-YYYY', 'DD/MM/YYYY'], true).isValid()) {
                    return 'mixed-date-format';
                }
                return null;
            });

            $.fn.dataTable.ext.type.order['mixed-date-format-pre'] = function (d) {
                return moment(d, ['DD-MM-YYYY', 'DD/MM/YYYY']).unix();
            };
        } else {
            console.error('Moment.js is not loaded.');
        }
    }
}


        // Define the table selectors
        const tableIDs = [
            '#myTable2', '#myTable3', '#myTable4', '#myTable5',
            '#myTable6', '#myTable7', '#myTable9', '#myTable8'
        ];

        // Initialize DataTables for each table with independent error handling
        tableIDs.forEach(function (selector) {
            try {
                const tableElement = document.querySelector(selector);
                if (!tableElement) {
                    console.warn(`Table with selector ${selector} not found, skipping.`);
                    return;
                }

                // Skip tables with no rows in the tbody
                const tbody = tableElement.querySelector('tbody');
                if (!tbody || tbody.rows.length === 0) {
                    console.warn(`Table with selector ${selector} is empty, skipping.`);
                    return;
                }

                // Skip if already initialized
                if ($.fn.dataTable.isDataTable(selector)) {
                    console.log(`Table with selector ${selector} already initialized, skipping.`);
                    return;
                }

                // Default sorting: first column, descending
                let orderBy = [[0, 'desc']];

                // Custom sorting for #myTable7
                if (selector === '#myTable7') {
                    orderBy = [[5, 'desc']];
                }

                // Initialize DataTable with try-catch to prevent failure from affecting others
                try {
                    const dataTable = new DataTable(tableElement, {
                        responsive: true,
                        autoWidth: false,
                        paging: true,
                        pageLength: 10,
                        searching: true,
                        info: true,
                        order: orderBy
                    });

                    // Fix search label layout
                    setTimeout(() => {
                        try {
                            const wrapper = tableElement.closest('.dataTables_wrapper');
                            if (wrapper) {
                                const label = wrapper.querySelector('div.dataTables_filter label');
                                if (label) {
                                    const input = label.querySelector('input');
                                    if (input) {
                                        label.innerHTML = '';
                                        label.appendChild(input);
                                    }
                                }
                            }
                        } catch (e) {
                            console.error(`Error fixing search label for ${selector}:`, e);
                        }
                    }, 100);

                    console.log(`Successfully initialized DataTable for ${selector}`);
                } catch (initError) {
                    console.error(`Failed to initialize DataTable for ${selector}:`, initError);
                }

            } catch (outerError) {
                console.error(`Unexpected error processing table ${selector}:`, outerError);
            }
        });
    });
</script>






<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Blade-passed data
        const externallyManagedAssets = @json($member['ExternallyManagedAssets'] ?? []);
        const bankingDetails = @json($member['banking_details'] ?? []);

        let totalValuation = 0;
        let totalCredits = 0;
        let totalDebits = 0;

        // Calculate asset values
        if (Array.isArray(externallyManagedAssets)) {
            externallyManagedAssets.forEach(asset => {
                let assetValue = 0;

                const csvData = asset.CsvData ?? null;
                const isArray = Array.isArray(csvData);
                const csvItems = isArray ? csvData : (csvData ? [csvData] : []);
                const hasCsvData = csvItems.length > 0;

                if (hasCsvData) {
                    csvItems.forEach(item => {
                        const mktVal = parseFloat(item.MKTVALGBP ?? 0);
                        assetValue += isNaN(mktVal) ? 0 : mktVal;
                    });
                } else {
                    const val = parseFloat(asset.CurrentValuationAmount ?? 0);
                    assetValue = isNaN(val) ? 0 : val;
                }

                totalValuation += assetValue;
            });
        }

        // Find Policy Cash account
        const policyAccount = bankingDetails.find(item => item.Syndicate === 'Policy Cash');

        if (policyAccount && Array.isArray(policyAccount.Transactions)) {
            const seenTransactions = new Set();

            policyAccount.Transactions.forEach(tx => {
                const txNum = tx.TransactionNumber ?? '';
                if (seenTransactions.has(txNum)) return;

                seenTransactions.add(txNum);

                const net = parseFloat(tx.NetAmount ?? 0);
                const vat = parseFloat(tx.VatAmount ?? 0);
                const total = (isNaN(net) ? 0 : net) + (isNaN(vat) ? 0 : vat);

                const postingRule = (tx.PostingRuleType ?? '').toUpperCase();
                const postingType = (tx.PostingType ?? '').toLowerCase();

                const isDebit = postingRule === 'D' || postingType === 'debit';
                const isCredit = postingRule === 'C' || postingType === 'credit';

                if (isDebit) totalDebits += total;
                if (isCredit) totalCredits += total;
            });
        }

        const transactionBalance = totalCredits - totalDebits;
        const totalAmount = totalValuation + transactionBalance;

        const formattedAmount = `£${totalAmount.toLocaleString('en-GB', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        })}`;

        document.getElementById('totalamount').textContent = formattedAmount;
    });
    
    
    
    
    let dateFilter = { min: null, max: null };

function formatDate(dateStr) {
    if (!dateStr) return '';
    const date = new Date(dateStr);
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = date.getFullYear();
    return `${day}-${month}-${year}`;
}

function filterByDate() {
    const table = $('#myTable1').DataTable();

    // Clear previous filters
    $.fn.dataTable.ext.search = [];

const minInput = document.getElementById('minDate').value;
    const maxInput = document.getElementById('maxDate').value;


    const minStr = new Date(minInput).toLocaleDateString('en-GB').split('/').join('-');
const maxStr = new Date(maxInput).toLocaleDateString('en-GB').split('/').join('-');

console.log(minStr , maxStr);

    const [minDay, minMonth, minYear] = minStr.split('-');
    const [maxDay, maxMonth, maxYear] = maxStr.split('-');

    const minDate = new Date(`${minYear}-${minMonth}-${minDay}`);
    const maxDate = new Date(`${maxYear}-${maxMonth}-${maxDay}`);

    // Custom filter logic for inclusive date range
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        if (settings.nTable.id !== 'myTable1') return true;

        const dateStr = data[0]; // Assuming date is in dd-mm-yyyy format
        const [d, m, y] = dateStr.split('-');
        const rowDate = new Date(`${y}-${m}-${d}`);

        return rowDate >= minDate && rowDate <= maxDate;
    });

    table.draw();
}


function resetFilter() {
    const table = $('#myTable1').DataTable();

    // Clear the filter array
    $.fn.dataTable.ext.search = [];

    // Clear date inputs if needed
    document.getElementById('minDate').value = '';
    document.getElementById('maxDate').value = '';

    // Redraw table to show all records
    table.draw();
}

    
</script>



  <!--<td>${transaction.Type || 'N/A'}</td>-->

    
@endsection
