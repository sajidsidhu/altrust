<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\SimpleMail;
use App\Http\Controllers\Controller;
use App\Models\Advisers;
use App\Models\pensionmanagement;
use App\Models\Member;
use App\Models\Memberdetail;
use App\Models\Fpt;
use App\Models\User;
use App\Models\DraftMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DraftMemberController extends Controller
{
    public function members() {
        $memberOasis =  User::where('role', 'oasis_sipp')->get();
        $role_member = 'oasis_sipp';
        return view('dashboard.member.createOasisSipp', compact('memberOasis','role_member'));
    }
    
    public function memberSipp() {
        $memberOasis =  User::where('role', 'sipp_property')->get();
         $role_member = 'sipp_property';
        return view('dashboard.member.createOasisSipp', compact('memberOasis','role_member'));
    }

    public function memberSippFull() {
        $memberOasis =  User::where('role', 'full_sipp_property')->get();
        $role_member  = 'full_sipp_property';
        return view('dashboard.member.createOasisSipp', compact('memberOasis','role_member'));
    }
    
    public function draftMember(Request $request) {
        $membersStore = new DraftMember();
        $membersStore->forename = $request->input('forename');
        $membersStore->surname = $request->input('surname');
        $membersStore->address = $request->input('address');
        $membersStore->country = $request->input('country');
        $membersStore->postcode = $request->input('postcode');
        $membersStore->telephone = $request->input('telephone');
        $membersStore->email = $request->input('email');
        $membersStore->nationality = $request->input('nationality');
        $membersStore->ni_number = $request->input('ni_number');
        $membersStore->dob = $request->input('dob');
        $membersStore->spouse_dob = $request->input('spouse_dob');
        $membersStore->pension_order = $request->input('pension_order');
        $membersStore->occupation = $request->input('occupation');
        $membersStore->opted_out = $request->opted_out;
        $membersStore->pension_protection = $request->pension_protection;
        $membersStore->annual_allowance = $request->annual_allowance;
        $membersStore->first_payment_date = $request->first_payment_date;
        $membersStore->contribute_regular_contribution = $request->contribute_regular_contribution;
        $membersStore->contribute_single_contribution = $request->contribute_single_contribution;
        $membersStore->payment_frequency = $request->payment_frequency;
        $membersStore->employer_pay = $request->employer_pay;
        $membersStore->employer_name = $request->input('employer_name');
        $membersStore->registered_office = $request->input('registered_office');
        $membersStore->employee_postcode = $request->input('employee_postcode');
        $membersStore->telephone_number = $request->input('telephone_number');
        $membersStore->employee_contact_name = $request->input('employee_contact_name');
        $membersStore->email_address = $request->input('email_address');
        $membersStore->trading_address = $request->input('trading_address');
        $membersStore->trading_postcode = $request->input('trading_postcode');
        $membersStore->fax_number = $request->input('fax_number');
        $membersStore->additional_telephone = $request->input('additional_telephone');
        $membersStore->regular_contribution = $request->input('regular_contribution');
        $membersStore->single_contribution = $request->input('single_contribution');
        $membersStore->payment_frequency = $request->input('payment_frequency');
        $membersStore->start_date = $request->input('start_date');
        $membersStore->signature = $request->input('signature');
        $membersStore->print_name = $request->input('print_name');
        $membersStore->position = $request->input('position');
        $membersStore->date = $request->input('date');
        $membersStore->financial_contact_name = $request->input('financial_contact_name');
        $membersStore->financial_company_name = $request->input('financial_company_name');
        $membersStore->street_address = $request->input('street_address');
        $membersStore->city = $request->input('city');
        $membersStore->financial_postcode = $request->input('financial_postcode');
        $membersStore->financial_telephone_number = $request->input('financial_telephone_number');
        $membersStore->financial_fax_number = $request->input('financial_fax_number');
        $membersStore->financial_email_address = $request->input('financial_email_address');
        $membersStore->regulated_by = $request->input('regulated_by');
        $membersStore->authorisation_number = $request->input('authorisation_number');
        $membersStore->network_status = $request->input('network_status');
        $membersStore->network_name = $request->input('network_name');
        $membersStore->regulated_by_second = $request->input('regulated_by_second');
        $membersStore->company_authorisation_number = $request->input('company_authorisation_number');
        $membersStore->type = $request->input('type');
        $membersStore->investment_option = $request->input('investment_option');
        $membersStore->contact_name = $request->input('contact_name');
        $membersStore->investment_company_name = $request->input('investment_company_name');
        $membersStore->investment_address = $request->input('investment_address');
        $membersStore->investment_postcode = $request->input('investment_postcode');
        $membersStore->investment_telephone_number = $request->input('investment_telephone_number');
        $membersStore->investment_fax_number = $request->input('investment_fax_number');
        $membersStore->investment_email_address = $request->input('investment_email_address');
        $membersStore->plan_type = $request->input('plan_type');
        $membersStore->benefits_future = $request->input('benefits_future');
        $membersStore->take_benefits_soon = $request->input('take_benefits_soon');
        $membersStore->benefits_method = $request->input('benefits_method');
        $membersStore->benefit_start_date = $request->input('benefit_start_date');
        $membersStore->provider_name = $request->input('provider_name');
        $membersStore->other_benefits_address = $request->input('other_benefits_address');
        $membersStore->other_benefits_postcode = $request->input('other_benefits_postcode');
        $membersStore->other_telephone_number = $request->input('other_telephone_number');
        $membersStore->other_fax_number = $request->input('other_fax_number');
        $membersStore->other_email_address = $request->input('other_email_address');
        $membersStore->plan_scheme_type = $request->input('plan_scheme_type');
        $membersStore->is_occupational_scheme = $request->input('is_occupational_scheme');
        $membersStore->plan_scheme_name = $request->input('plan_scheme_name');
        $membersStore->pension_scheme_tax_reference = $request->input('pension_scheme_tax_reference');
        $membersStore->fund_value = $request->input('fund_value');
        $membersStore->full_value_scheme = $request->input('full_value_scheme');
        $membersStore->funds_crystallised = $request->input('funds_crystallised');
        $membersStore->crystallised_method = $request->input('crystallised_method');
        $membersStore->other_signature = $request->input('other_signature');
        $membersStore->other_print_name = $request->input('other_print_name');
        $membersStore->other_date = $request->input('other_date');
        $membersStore->contact_consent = $request->input('contact_consent');
        $membersStore->passing_contact_consent = $request->input('passing_contact_consent');
        $membersStore->contact_method = $request->input('contact_method');
        $membersStore->signature_consent = $request->input('signature_consent');
        $membersStore->signatur_print_name = $request->input('signatur_print_name');
        $membersStore->date = $request->input('date');
        $membersStore->signature_declaration = $request->input('signature_declaration');
        $membersStore->print_name_declaration = $request->input('print_name_declaration');
        $membersStore->position_declaration = $request->input('position_declaration');
        $membersStore->declaration_date = $request->input('declaration_date');
        $membersStore->infor_company_name = $request->input('infor_company_name');
        $membersStore->entity_type = $request->input('entity_type');
        $membersStore->registered_address = $request->input('registered_address');
        $membersStore->registered_number = $request->input('registered_number');
        $membersStore->infor_country = $request->input('infor_country');
        $membersStore->company_info_postcode = $request->input('company_info_postcode');
        $membersStore->nature_of_business = $request->input('nature_of_business');
        $membersStore->individual_verification = $request->input('individual_verification');
        $membersStore->beneficial_verification = $request->input('beneficial_verification');
        $membersStore->standard_verification = $request->input('standard_verification');
        $membersStore->confirmation_letter = $request->input('confirmation_letter');
        $membersStore->open_account = $request->input('open_account');
        $membersStore->name_of_regulated_firm = $request->input('name_of_regulated_firm');
        $membersStore->regulator_name_reference = $request->input('regulator_name_reference');
        $membersStore->regulated_individual_name = $request->input('regulated_individual_name');
        $membersStore->regulated_individual_reference = $request->input('regulated_individual_reference');
        $membersStore->signature_segnature = $request->input('signature_segnature');
        $membersStore->regulated_name = $request->input('regulated_name');
        $membersStore->regulated_position = $request->input('regulated_position');
        $membersStore->regulated_date = $request->input('regulated_date');
        $membersStore->applicant_name = $request->input('applicant_name');
        $membersStore->application_dob = $request->input('application_dob');
        $membersStore->applicant_address = $request->input('applicant_address');
        $membersStore->application_country = $request->input('application_country');
        $membersStore->applicant_info_postcode = $request->input('applicant_info_postcode');
        $membersStore->changed_address = $request->input('changed_address');
        $membersStore->previous_country = $request->input('previous_country');
        $membersStore->previous_postcode = $request->input('previous_postcode');
        $membersStore->regulator_firm_name = $request->input('regulator_firm_name');
        $membersStore->regulator_reference = $request->input('regulator_reference');
        $membersStore->regulated_cer_individual_name = $request->input('regulated_cer_individual_name');
        $membersStore->regulated_certification_individual_reference = $request->input('regulated_certification_individual_reference');
        $membersStore->certification_signature = $request->input('certification_signature');
        $membersStore->certification_name = $request->input('certification_name');
        $membersStore->certification_position = $request->input('certification_position');
        $membersStore->certification_date = $request->input('certification_date');
        $membersStore->defined_fee = $request->input('defined_fee');
        $membersStore->annual_fee_defined = $request->input('annual_fee_defined');
        $membersStore->date_fee = $request->input('date_fee');
        $membersStore->percentage_fund = $request->input('percentage_fund');
        $membersStore->annual_fee_fund = $request->input('annual_fee_fund');
        $membersStore->date_fund = $request->input('date_fund');
        $membersStore->gross_contribution = $request->input('gross_contribution');
        $membersStore->annual_fee_gross = $request->input('annual_fee_gross');
        $membersStore->date_gross = $request->input('date_gross');
        $membersStore->transfer_value = $request->input('transfer_value');
        $membersStore->fee_transfer = $request->input('fee_transfer');
        $membersStore->payment_received = $request->input('payment_received');
        $membersStore->future_transfers = $request->input('future_transfers');
        $membersStore->signature_member = $request->input('signature_member');
        $membersStore->print_name_member = $request->input('print_name_member');
        $membersStore->date_member = $request->input('date_member');
        $membersStore->adviser_network = $request->input('adviser_network');
        $membersStore->name_of_network = $request->input('name_of_network');
        $membersStore->network_payment = $request->input('network_payment');
        $membersStore->bank_name = $request->input('bank_name');
        $membersStore->branch = $request->input('branch');
        $membersStore->account_name = $request->input('account_name');
        $membersStore->account_number = $request->input('account_number');
        $membersStore->sort_code = $request->input('sort_code');
        $membersStore->signature_adviser = $request->input('signature_adviser');
        $membersStore->name_adviser = $request->input('name_adviser');
        $membersStore->position_adviser = $request->input('position_adviser');
        $membersStore->date_adviser = $request->input('date_adviser');
        $membersStore->company_stamp = $request->input('company_stamp');
        $membersStore->pension_scheme_type = $request->pension_scheme_type;
        $membersStore->pension_scheme_name = $request->pension_scheme_name;
        $membersStore->pension_provider_name = $request->pension_provider_name;
        $membersStore->professional_trustee_address = $request->professional_trustee_address;
        $membersStore->scheme_admin_address = $request->scheme_admin_address;
        $membersStore->employer_pay_premiums = $request->employer_pay_premiums;
        $membersStore->hmrc_registration_number = $request->hmrc_registration_number;
        $membersStore->alt_scheme_admin_address = $request->alt_scheme_admin_address;
        $membersStore->statements_required = $request->statements_required;
        $membersStore->amount_to_be_deposited = $request->input('amount_to_be_deposited');
        $membersStore->term_months = $request->input('term_months');
        $membersStore->professional_trustee_only = $request->input('professional_trustee_only');
        $membersStore->authorised_signatories = $request->input('authorised_signatories');
        $membersStore->signing_instructions = $request->input('signing_instructions');
        $membersStore->fraud_prevention = $request->fraud_prevention;
        $membersStore->declaration = $request->declaration;
        $membersStore->certification = $request->certification;
        $membersStore->company_name = $request->input('company_name');
        $membersStore->company_address = $request->input('company_address');
        $membersStore->company_post_code = $request->input('company_post_code');
        $membersStore->company_telephone = $request->input('company_telephone');
        $membersStore->contact_person = $request->input('contact_person');
        $membersStore->contact_email = $request->input('contact_email');
        $membersStore->part_one_surname = $request->input('part_one_surname');
        $membersStore->given_name = $request->input('given_name');
        $membersStore->additional_name = $request->input('additional_name');
        $membersStore->honorific_title = $request->input('honorific_title');
        $membersStore->part_one_gender = $request->input('part_one_gender');
        $membersStore->home_address = $request->input('home_address');
        $membersStore->locality = $request->input('locality');
        $membersStore->zip_code = $request->input('zip_code');
        $membersStore->region = $request->input('region');
        $membersStore->nation = $request->input('nation');
        $membersStore->birth_date = $request->input('birth_date');
        $membersStore->birthplace_city = $request->input('birthplace_city');
        $membersStore->birthplace_nation = $request->input('birthplace_nation');
        $membersStore->previous_name = $request->input('previous_name');
        $membersStore->previous_address = $request->input('previous_address');
        $membersStore->title = $request->input('title');
        $membersStore->from_date = $request->input('from_date');
        $membersStore->homeowner = $request->input('homeowner');
        $membersStore->ni_reason = $request->input('ni_reason');
        $membersStore->pob = $request->input('pob');
        $membersStore->dual_nationality = $request->input('dual_nationality');
        $membersStore->nationality_countries = $request->input('nationality_countries');
        $membersStore->employment_status = $request->input('employment_status');
        $membersStore->status_postcode = $request->input('status_postcode');
        $membersStore->recent_occupation = $request->input('recent_occupation');
        $membersStore->enhanced_protection = $request->input('enhanced_protection');
        $membersStore->dependents = $request->input('dependents');
        $membersStore->dependents_count = $request->input('dependents_count');
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
        $membersStore->initial_fees = $request->initial_fees;
        $membersStore->frequency = $request->frequency;
        $membersStore->approx_amount = $request->input('approx_amount');
        $membersStore->benefit_continuation = $request->input('benefit_continuation');
        $membersStore->transfer_assets = $request->input('transfer_assets');
        $membersStore->defined_benefit = $request->input('defined_benefit');
        $membersStore->bankruptcy_orders = $request->input('bankruptcy_orders');
        $membersStore->scheme_protection = $request->input('scheme_protection');
        $membersStore->annuity_guarantee = $request->input('annuity_guarantee');
        $membersStore->block_transfer = $request->input('block_transfer');
        $membersStore->funded_transfer = $request->input('funded_transfer');
        $membersStore->ceding_scheme = $request->input('ceding_scheme');
        $membersStore->employer_contributions = $request->input('employer_contributions');
        $membersStore->personal_bank_payment = $request->input('personal_bank_payment');
        $membersStore->funds_outside_uk = $request->input('funds_outside_uk');
        $membersStore->applicable_protection = $request->input('applicable_protection');
        $membersStore->tin_number = $request->tin_number;
        $membersStore->reason_b_explanation = $request->input('reason_b_explanation');
        $membersStore->tax_residence_more_than_three = $request->input('tax_residence_more_than_three');
        $membersStore->confirm_all_residences = $request->input('confirm_all_residences');
        $membersStore->us_person = $request->input('us_person');
        $membersStore->residency_mismatch_reason = $request->input('residency_mismatch_reason');
        $membersStore->additional_details = $request->input('additional_details');
        $membersStore->tax_relief = $request->tax_relief;
        $membersStore->part_four_signature = $request->input('part_four_signature');
        $membersStore->signature_print_name = $request->input('signature_print_name');
        $membersStore->sign_date = $request->input('sign_date');
        $membersStore->capacity = $request->input('capacity');
        $membersStore->signature_date = $request->signature_date;
        $membersStore->member_title = json_encode($request->member_title);
        $membersStore->first_name = json_encode($request->first_name);
        $membersStore->middle_name = json_encode($request->middle_name);
        $membersStore->date_of_birth = json_encode($request->date_of_birth);
        $membersStore->tanee_member_gender = json_encode($request->tanee_member_gender);
        $membersStore->member_nationality = json_encode($request->member_nationality);
        $membersStore->member_surname = json_encode($request->member_surname);
        $membersStore->country_of_birth = json_encode($request->country_of_birth);
        $membersStore->home_telephone_number = json_encode($request->home_telephone_number);
        $membersStore->mobile_number = json_encode($request->mobile_number);
        $membersStore->member_email_address = json_encode($request->member_email_address);
        $membersStore->current_address = json_encode($request->current_address);
        $membersStore->date_moved_in = json_encode($request->date_moved_in);
        $membersStore->member_statements_required = json_encode($request->member_statements_required);
        $membersStore->is_member_trustee = json_encode($request->is_member_trustee);
        $membersStore->is_online_banking_required = json_encode($request->is_online_banking_required);
        $membersStore->fixed_term_savings_sipp_ssas_account = json_encode($request->fixed_term_savings_sipp_ssas_account);
        $membersStore->defined_benefit = $request->input('defined_benefit');
        $membersStore->bankruptcy_orders = $request->input('bankruptcy_orders');
        $membersStore->scheme_protection = $request->input('scheme_protection');
        $membersStore->annuity_guarantee = $request->input('annuity_guarantee');
        $membersStore->block_transfer = $request->input('block_transfer');
        $membersStore->funded_transfer = $request->input('funded_transfer');
        $membersStore->ceding_scheme = $request->input('ceding_scheme');
        $membersStore->employer_contributions = $request->input('employer_contributions');
        $membersStore->personal_bank_payment = $request->input('personal_bank_payment');
        $membersStore->funds_outside_uk = $request->input('funds_outside_uk');
        $membersStore->trustee_name = json_encode($request->trustee_name);
        $membersStore->trustee_signature = json_encode($request->trustee_signature);
        $membersStore->trustee_date = json_encode($request->trustee_date);
        $membersStore->sipp_ssas_account = json_encode($request->sipp_ssas_account);
        $membersStore->cheque_book_required = json_encode($request->cheque_book_required);
        $membersStore->tax_residence_country = json_encode($request->tax_residence_country);
        $membersStore->tin_reason = json_encode($request->tin_reason);
        $membersStore->tin_number = json_encode($request->tin_number);
        $membersStore->gender = json_encode($request->gender);
        $membersStore->marital_status = json_encode($request->marital_status);
        $membersStore->protection_type = json_encode($request->protection_type);
        $membersStore->privacy_print_name = json_encode($request->privacy_print_name);
        $membersStore->privacy_signature = json_encode($request->privacy_signature);
        $membersStore->privacy_position = json_encode($request->privacy_position );
        $membersStore->privacy_date = json_encode($request->privacy_date);
        $membersStore->funds_deposited_by = json_encode($request->funds_deposited_by);
        $membersStore->fees_paid_by = json_encode($request->fees_paid_by);
        $membersStore->controller_names = json_encode($request->controller_names);
        $membersStore->controller_dobs = json_encode($request->controller_dobs);
        $membersStore->beneficial_owner_names = json_encode($request->beneficial_owner_names);
        $membersStore->beneficial_owner_dobs = json_encode($request->beneficial_owner_dobs);
        $membersStore->investment_details = json_encode($request->investment_details);
        $membersStore->beneficiary_name = json_encode($request->beneficiary_name);
        $membersStore->charity_name = json_encode($request->charity_name);
        $membersStore->charity_percentage = json_encode($request->charity_percentage);
        $membersStore->relationship = json_encode($request->beneficiary_relationship);
        $membersStore->status = 'pending';
        $membersStore->percentage = json_encode($request->beneficiary_percentage);
        
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
        
            // Decode Base64
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
        
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
        
            // Generate a unique filename
            $fileName = 'signature_' . uniqid() . '.png';
        
            // Store the file
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
        
            // Save path to database
            $membersStore->signature_adviser = '/storage/app/public/signatures/' . $fileName;
        }







// Check if a signature is drawn
if ($request->hasFile('file_upload')) {
    $file = $request->file('file_upload');



    // Validate the file
    $request->validate([
        'file_upload' => 'mimes:jpg,jpeg,png,pdf|max:2048' // Allow images & PDFs, max 2MB
    ]);

    // Store the uploaded file
    $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
    $filePath = $file->storeAs('signatures', $fileName, 'public');
    

    // Save path to database
    $membersStore->part_four_signature = '/storage/app/public/' . $filePath;
}
// If no file is uploaded, check for the signature
elseif($request->part_four_signature) {
    $signatureData = $request->part_four_signature;

    // Remove Base64 prefix
    if (strpos($signatureData, 'data:image/png;base64,') === 0) {
        $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
    }

    // Decode Base64
    $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));

    if ($signatureImage === false) {
        return back()->with('error', 'Invalid signature image format.');
    }

    // Generate a unique filename
    $fileName = 'signature_' . uniqid() . '.png';

    // Store the file
    Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);

    // Save path to database
    $membersStore->part_four_signature = '/storage/app/public/signatures/' . $fileName;
}
      
        
        $membersStore->save();
        
  
       
        return redirect()->back();
    }

    public function  memberedit($id, $source = 'existing')
    {
        $memberOasis = User::where('role', 'oasis_sipp')->get();
        
         $editMember = Member::with('user')->find($id);
       
         $user = User::find($editMember->role);
         
    //          $editMember->privacy_print_name = json_decode($editMember->privacy_print_name, true) ?? [];
    // $editMember->privacy_signature = json_decode($editMember->privacy_signature, true) ?? [];
    // $editMember->privacy_position = json_decode($editMember->privacy_position, true) ?? [];
    // $editMember->privacy_date = json_decode($editMember->privacy_date, true) ?? [];

        //  dd($user);  
     
        return view('dashboard.member.editOasisSipp', compact('editMember', 'memberOasis', 'source','user'));
    }
    public function memberUpdate(Request $request)
    {
        $user = User::find($request->user_id);

            
        $member_id = $request->member_id;
        $member = Member::findOrFail($member_id);
        $member->title = $request->input('title');  // Forename
        $member->forename = $request->input('forename');  // Forename
        $member->surname = $request->input('surname');  // Surname
        $member->previous_name = $request->input('previous_name');  // previous_name
        $member->from_date = $request->input('from_date');  // from_date
        $member->address = $request->input('address');  // Residential Address
        $member->country = $request->input('country');  // Country
        $member->postcode = $request->input('postcode');  // Postcode
        $member->homeowner = $request->input('homeowner');  // Postcode
        $member->previous_address = $request->input('previous_address');  // Postcode
        $member->ni_reason = $request->input('ni_reason');  // Postcode
        $member->telephone = $request->input('telephone');  // Telephone Number
        $member->email = $request->input('email');  // Email Address

        $member->nationality = $request->input('nationality');  // Nationality or Citizenship
        $member->ni_number = $request->input('ni_number');  // Nationality or Citizenship
        $member->dob = $request->input('dob');  // Date of Birth
        $member->pob = $request->input('pob');  // Date of Birth
        $member->dual_nationality = $request->input('dual_nationality');  // Date of Birth
        $member->nationality_countries = $request->input('nationality_countries');  // Date of Birth

        $member->spouse_dob = $request->input('spouse_dob');  // Spouse's Date of Birth
        $member->pension_order = $request->input('pension_order');  // Pension Sharing or Pension Earmarking Order (Yes/No)
        $member->occupation = $request->input('occupation');  // Occupation
        $member->status_postcode = $request->input('status_postcode');  // Employment Status
        $member->enhanced_protection = $request->input('enhanced_protection');  // Employment Status
        $member->recent_occupation = $request->input('recent_occupation');  // Employment Status
        $member->applicable_protection = $request->input('applicable_protection');  // Employment Status
        $member->dependents = $request->input('dependents');  // Employment Status
        $member->dependents_count = $request->input('dependents_count');  // Employment Status
        $member->opted_out = $request->opted_out;  // Opted Out of Pension Arrangement (Yes/No)
        $member->pension_protection = $request->pension_protection;  // Protection of Existing Pension Rights (Yes/No)

        $member->annual_allowance = $request->annual_allowance;  // Annual Allowance (Yes/No)
        $member->first_payment_date = $request->first_payment_date;

        //<!-- contribution -->

        $member->contribute_regular_contribution = $request->contribute_regular_contribution;  // Regular Contribution
        $member->contribute_single_contribution = $request->contribute_single_contribution;  // Single Contribution
        $member->payment_frequency = $request->payment_frequency;  // Payment Frequency (e.g., Monthly, Quarterly)
        $member->employer_pay = $request->employer_pay;  // Whe

        //<!-- employer detail -->

        $member->employer_name = $request->input('employer_name');  // Employer's name
        $member->registered_office = $request->input('registered_office');  // Registered office address
        $member->employee_postcode = $request->input('employee_postcode');  // Postcode
        $member->telephone_number = $request->input('telephone_number');  // Telephone number (including area code)
        $member->employee_contact_name = $request->input('employee_contact_name');  // Contact person's name
        $member->email_address = $request->input('email_address');  // Email address
        $member->trading_address = $request->input('trading_address');  // Trading address (if different from registered office)
        $member->trading_postcode = $request->input('trading_postcode');  // Postcode for trading address
        $member->fax_number = $request->input('fax_number');  // Fax number (including area code)
        $member->additional_telephone = $request->input('additional_telephone');  // Additional telephone number

        //<!-- employer contribution -->

        $member->regular_contribution = $request->input('regular_contribution');  // Regular contribution provided by the employer
        $member->single_contribution = $request->input('single_contribution');  // Single contribution provided by the employer
        $member->payment_frequency = $request->input('payment_frequency');  // Frequency of regular contributions (e.g., Monthly, Quarterly)
        $member->start_date = $request->input('start_date');  // Start date

        //<!-- employee declaration -->

        $member->signature = $request->input('signature');  // Signature of the authorised signatory
        $member->print_name = $request->input('print_name');  // Print name of the authorised signatory
        $member->position = $request->input('position');  // Position of the authorised signatory
        $member->date = $request->input('date');  // D

        //<!-- financial adviser -->

        $member->financial_contact_name = $request->input('financial_contact_name');  // Contact name of the adviser
        $member->financial_company_name = $request->input('financial_company_name');  // Company name of the adviser
        $member->street_address = $request->input('street_address');  // Street address
        $member->city = $request->input('city');  // City
        $member->financial_postcode = $request->input('financial_postcode');  // Postcode
        $member->financial_telephone_number = $request->input('financial_telephone_number');  // Telephone number
        $member->financial_fax_number = $request->input('financial_fax_number');  // Fax number
        $member->financial_email_address = $request->input('financial_email_address');  // Email address
        $member->regulated_by = $request->input('regulated_by');  // Authority regulating the adviser
        $member->authorisation_number = $request->input('authorisation_number');  // Authorisation number
        $member->network_status = $request->input('network_status');  // Whether part of a network (Yes/No)
        $member->network_name = $request->input('network_name');  // Name of the network
        $member->regulated_by_second = $request->input('regulated_by_second');  // Regulated by (second time)
        $member->company_authorisation_number = $request->input('company_authorisation_number');  // Company authorisation number

        //<!-- beneficiries -->


        $member->type = $request->input('type');  // Typ

        //<!-- investment -->

        $member->investment_option = $request->input('investment_option');  // Full or Single Investment

        $member->contact_name = $request->input('contact_name');  // Contact name of the investment manager
        $member->investment_company_name = $request->input('investment_company_name');  // Company name of the investment manager
        $member->investment_address = $request->input('investment_address');  // Address
        $member->investment_postcode = $request->input('investment_postcode');  // Postcode
        $member->investment_telephone_number = $request->input('investment_telephone_number');  // Telephone number
        $member->investment_fax_number = $request->input('investment_fax_number');  // Fax number
        $member->investment_email_address = $request->input('investment_email_address');  // Email address
        $member->plan_type = $request->input('plan_type');  // Plan type
        $member->benefits_future = $request->input('benefits_future');  // Plan type

        //<!-- benefits -->

        // Assign the request inputs to the respective fields in the model
        $member->take_benefits_soon = $request->input('take_benefits_soon');  // Whether the user intends to take benefits soon
        $member->benefits_method = $request->input('benefits_method');  // Method of taking benefits
        $member->approx_amount = $request->input('approx_amount');
        $member->benefit_continuation = $request->input('benefit_continuation');

        //<!-- other benefits -->

        $member->provider_name = $request->input('provider_name');  // Provider's Full Name
        $member->other_benefits_address = $request->input('other_benefits_address');  // Address
        $member->other_benefits_postcode = $request->input('other_benefits_postcode');  // Postcode
        $member->other_telephone_number = $request->input('other_telephone_number');  // Telephone Number
        $member->other_fax_number = $request->input('other_fax_number');  // Fax Number
        $member->other_email_address = $request->input('other_email_address');  // Email Address
        $member->plan_scheme_type = $request->input('plan_scheme_type');  // Plan/Scheme Type
        $member->is_occupational_scheme = $request->input('is_occupational_scheme');  // Is this an occupational scheme?
        $member->plan_scheme_name = $request->input('plan_scheme_name');  // Plan/Scheme Name
        $member->pension_scheme_tax_reference = $request->input('pension_scheme_tax_reference');  // Pension Scheme Tax Reference
        $member->fund_value = $request->input('fund_value');  // Value of Fund to be Transferred
        $member->full_value_scheme = $request->input('full_value_scheme');  // Does this represent the full value of the current plan/scheme?
        $member->funds_crystallised = $request->input('funds_crystallised');  // Have any funds been crystallised?
        $member->crystallised_method = $request->input('crystallised_method');  // Crystallisation method
        $member->other_signature = $request->input('other_signature');  // Signature
        $member->other_print_name = $request->input('other_print_name');  // Print Name
        $member->other_date = $request->input('other_date');

        //<!-- member constent -->

        // Member Consent Section

        $member->contact_consent = $request->input('contact_consent');  // Contact consent for products and services
        $member->passing_contact_consent = $request->input('passing_contact_consent');  // Consent for passing contact to other subsidiaries
        $member->contact_method = $request->input('contact_method');  // Preferred contact method (email or post)

        // Signature, Name, and Date for Consent

        // Assign the request inputs to the respective fields in the model
        $member->signature_consent = $request->input('signature_consent');  // Signature for consent
        $member->signatur_print_name = $request->input('signatur_print_name');  // Printed name for consent
        $member->date = $request->input('date');  // Da

        // Member Declaration Section

        $member->signature_declaration = $request->input('signature_declaration');  // Signature for declaration
        $member->print_name_declaration = $request->input('print_name_declaration');  // Printed name for declaration
        $member->position_declaration = $request->input('position_declaration');  // Position of the person signing the declaration
        $member->declaration_date = $request->input('declaration_date');

        //<!-- Corporate -->

        // Company Information

        $member->infor_company_name = $request->input('infor_company_name');  // Company Name
        $member->entity_type = $request->input('entity_type');  // Entity Type
        $member->registered_address = $request->input('registered_address');  // Registered Address
        $member->registered_number = $request->input('registered_number');  // Registered Number
        $member->infor_country = $request->input('infor_country');  // Country
        $member->company_info_postcode = $request->input('company_info_postcode');  // Postcode
        $member->nature_of_business = $request->input('nature_of_business');  // Nature of Business

        // Control Information

        $member->individual_verification = $request->input('individual_verification');


        $member->beneficial_verification = $request->input('beneficial_verification');  // Beneficial owner verification (Yes/No)

        // Certification Information
        $member->standard_verification = $request->input('standard_verification');  // Standard verification (Yes/No)
        $member->confirmation_letter = $request->input('confirmation_letter');  // Confirmation letter (Yes/No)
        $member->open_account = $request->input('open_account');  // Open account (Yes/No)

        // Signature Information
        $member->name_of_regulated_firm = $request->input('name_of_regulated_firm');  // Name of the regulated firm
        $member->regulator_name_reference = $request->input('regulator_name_reference');  // Regulator's name and reference
        $member->regulated_individual_name = $request->input('regulated_individual_name');  // Name of the regulated individual
        $member->regulated_individual_reference = $request->input('regulated_individual_reference');  // Reference of the regulated individual
        $member->signature_segnature = $request->input('signature_segnature');  // Signature
        $member->regulated_name = $request->input('regulated_name');  // Name of the signatory
        $member->regulated_position = $request->input('regulated_position');  // Position of the signatory
        $member->regulated_date = $request->input('regulated_date');


        // Applicant Information
        $member->applicant_name = $request->input('applicant_name');  // Applicant's Name
        $member->application_dob = $request->input('application_dob');  // Applicant's Date of Birth
        $member->applicant_address = $request->input('applicant_address');  // Applicant's Address
        $member->application_country = $request->input('application_country');  // Applicant's Country
        $member->applicant_info_postcode = $request->input('applicant_info_postcode');  // Applicant's Postcode

        // Previous Address Information (if changed)
        $member->changed_address = $request->input('changed_address');  // Previous Address (if changed)
        $member->previous_country = $request->input('previous_country');  // Previous Country (if changed)
        $member->previous_postcode = $request->input('previous_postcode');  // Previous Postcode (if changed)

        // Certification Information
        $member->regulator_firm_name = $request->input('regulator_firm_name');  // Regulator Firm Name
        $member->regulator_reference = $request->input('regulator_reference');  // Regulator Reference
        $member->regulated_cer_individual_name = $request->input('regulated_cer_individual_name');  // Regulated Individual's Name
        $member->regulated_certification_individual_reference = $request->input('regulated_certification_individual_reference');  // Regulated Individual's Reference
        $member->certification_signature = $request->input('certification_signature');  // Signature
        $member->certification_name = $request->input('certification_name');  // Printed Name
        $member->certification_position = $request->input('certification_position');  // Position
        $member->certification_date = $request->input('certification_date');  // Date of Certification
        
        $member->defined_benefit = $request->input('defined_benefit');
        $member->transfer_assets = $request->input('transfer_assets');
        $member->bankruptcy_orders = $request->input('bankruptcy_orders');
        $member->scheme_protection = $request->input('scheme_protection');
        $member->annuity_guarantee = $request->input('annuity_guarantee');
        $member->block_transfer = $request->input('block_transfer');
        $member->funded_transfer = $request->input('funded_transfer');
        $member->ceding_scheme = $request->input('ceding_scheme');
        $member->employer_contributions = $request->input('employer_contributions');
        $member->personal_bank_payment = $request->input('personal_bank_payment');
        $member->funds_outside_uk = $request->input('funds_outside_uk');

        //<!-- Agreement -->

        // Section One - Initial and ongoing fees
        // Fee Information
        $member->defined_fee = $request->input('defined_fee');  // Defined Fee for arranging SIPP
        $member->annual_fee_defined = $request->input('annual_fee_defined');  // Annual Fee for SIPP arrangement
        $member->date_fee = $request->input('date_fee');  // Payment date for the defined fee

        $member->percentage_fund = $request->input('percentage_fund');  // Percentage of Fund
        $member->annual_fee_fund = $request->input('annual_fee_fund');  // Annual Fee for the fund
        $member->date_fund = $request->input('date_fund');  // Payment date for the fund

        $member->gross_contribution = $request->input('gross_contribution');  // Percentage of Gross Contribution
        $member->annual_fee_gross = $request->input('annual_fee_gross');  // Annual Fee for gross contribution
        $member->date_gross = $request->input('date_gross');  // Payment date for gross contributions

        // Transfer Related Fees
        $member->transfer_value = $request->input('transfer_value');  // Value of Transfer
        $member->fee_transfer = $request->input('fee_transfer');  // Fee for the transfer
        $member->payment_received = $request->input('payment_received');  // Payment received date for the transfer

        // Apply for Future Transfers
        $member->future_transfers = $request->input('future_transfers');  // Future transfers (Yes/No)

        // SIPP Member Section
        $member->signature_member = $request->input('signature_member');  // SIPP Member's Signature
        $member->print_name_member = $request->input('print_name_member');  // SIPP Member's Printed Name
        $member->date_member = $request->input('date_member');  // SIPP Member's Signature Date

        $member->adviser_network = $request->input('adviser_network');  // Adviser network (Yes/No)
        $member->name_of_network = $request->input('name_of_network');  // Name of network
        $member->network_payment = $request->input('network_payment');  // Network payment option (Yes/No)

        // Payment Information

        $member->bank_name = $request->input('bank_name');  // Bank name
        $member->branch = $request->input('branch');  // Branch name
        $member->account_name = $request->input('account_name');  // Account name
        $member->account_number = $request->input('account_number');  // Account number
        $member->sort_code = $request->input('sort_code');  // Sort code

        // Adviser Information
        $member->signature_adviser = $request->input('signature_adviser');  // Adviser signature
        $member->name_adviser = $request->input('name_adviser');  // Adviser name
        $member->position_adviser = $request->input('position_adviser');  // Adviser's position
        $member->date_adviser = $request->input('date_adviser');  // Date of signature
        $member->company_stamp = $request->input('company_stamp');  //

        // Pension Scheme Information
        $member->pension_scheme_type = $request->pension_scheme_type;  // Type of pension scheme

        $member->pension_scheme_name = $request->pension_scheme_name;  // Pension scheme name

        $member->pension_provider_name = $request->pension_provider_name;  // Pension provider name
        $member->professional_trustee_address = $request->professional_trustee_address;  // Trustee address
        $member->scheme_admin_address = $request->scheme_admin_address;  // Scheme admin address
        $member->employer_pay_premiums = $request->employer_pay_premiums;  // Employer pays premiums (Yes/No)
        $member->hmrc_registration_number = $request->hmrc_registration_number;  // HMRC registration number
        $member->alt_scheme_admin_address = $request->alt_scheme_admin_address;  // Alternate scheme admin address
        $member->statements_required = $request->statements_required;  // Statements required (Yes/No)


        $member->amount_to_be_deposited = $request->input('amount_to_be_deposited');  // Amount to be deposited
        $member->term_months = $request->input('term_months');  // Term in months

        // Mandate Information
        $member->professional_trustee_only = $request->input('professional_trustee_only');  // Professional trustee only
        $member->authorised_signatories = $request->input('authorised_signatories');  // Authorised signatories
        $member->signing_instructions = $request->input('signing_instructions');  // Signing instructions

        // Privacy Notices
        $member->fraud_prevention = $request->fraud_prevention;  // Fraud prevention
        $member->declaration = $request->declaration;  // Declaration
        $member->certification = $request->certification;  // Certification


        // Professional Adviser Details
        $member->company_name = $request->input('company_name');  // Company name
        $member->company_address = $request->input('company_address');  // Company address
        $member->company_post_code = $request->input('company_post_code');  // Post code
        $member->company_telephone = $request->input('company_telephone');  // Telephone number
        $member->contact_person = $request->input('contact_person');  // Contact person
        $member->contact_email = $request->input('contact_email');  // Contact email

        // Part 1: Personal Information
        $member->part_one_surname = $request->input('part_one_surname');  // Surname
        $member->given_name = $request->input('given_name');  // Given name
        $member->additional_name = $request->input('additional_name');  // Additional or middle name
        $member->honorific_title = $request->input('honorific_title');  // Title
        $member->part_one_gender = $request->input('part_one_gender');  // Gender
        $member->home_address = $request->input('home_address');  // Home address
        $member->locality = $request->input('locality');  // Locality or city
        $member->zip_code = $request->input('zip_code');  // ZIP or postal code
        $member->region = $request->input('region');  // Region or state
        $member->nation = $request->input('nation');  // Country of residence
        $member->birth_date = $request->input('birth_date');  // Date of birth
        $member->birthplace_city = $request->input('birthplace_city');  // City of birth
        $member->birthplace_nation = $request->input('birthplace_nation');  // Country of birth

        // Part 2: Tax Information



        $member->tin_number = $request->tin_number;  // Taxpayer Identification Number
        $member->reason_b_explanation = $request->input('reason_b_explanation');  // Reason B explanation
        $member->tax_residence_more_than_three = $request->input('tax_residence_more_than_three');  // More than three tax residences?
        $member->confirm_all_residences = $request->input('confirm_all_residences');  // Confirm all tax residences included
        $member->us_person = $request->input('us_person');  // US person (Yes/No)

        // Part 3: Residency Information
        $member->residency_mismatch_reason = $request->input('residency_mismatch_reason');  // Reason for residency mismatch
        $member->additional_details = $request->input('additional_details');  // Additional details (optional)
        $member->tax_relief = $request->tax_relief;  // Additional details (optional)
        
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
        
        $member->initial_fees = $request->initial_fees;
        $member->frequency = $request->frequency;
        

        //        dd($request->date_of_birth);
        // Part 4: Signature Information
        $member->part_four_signature = $request->input('part_four_signature');  // Signature
        $member->signature_print_name = $request->input('signature_print_name');  // Print name
        $member->sign_date = $request->input('sign_date');  // Print name
        $member->capacity = $request->input('capacity');  // Capacity of signatory

        $member->signature_date = $request->signature_date;  // Capacity of signatory
        //        dd($request->signature_date);
        //        dd($request->all());

        $member->first_name = json_encode($request->first_name);
        $member->middle_name = json_encode($request->middle_name);
        $member->date_of_birth = json_encode($request->date_of_birth);  // Date of birth
        $member->tanee_member_gender = json_encode($request->tanee_member_gender);  // Gender
        $member->member_nationality = json_encode($request->member_nationality);  // Nationality
        $member->member_surname = json_encode($request->member_surname);  // Nationality
        $member->country_of_birth = json_encode($request->country_of_birth);  // Country of birth
        $member->home_telephone_number = json_encode($request->home_telephone_number);  // Home telephone number
        $member->mobile_number = json_encode($request->mobile_number);  // Mobile number
        $member->member_email_address = json_encode($request->member_email_address);  // Email address
        $member->current_address = json_encode($request->current_address);  // Current address
        $member->date_moved_in = json_encode($request->date_moved_in);  // Date moved in
        $member->member_statements_required = json_encode($request->member_statements_required);  // Statements required (Yes/No)
        $member->is_member_trustee = json_encode($request->is_member_trustee);  // Is member a trustee? (Yes/No)
        $member->is_online_banking_required = json_encode($request->is_online_banking_required);  // Online banking (Yes/No)
        $member->fixed_term_savings_sipp_ssas_account = json_encode($request->fixed_term_savings_sipp_ssas_account);  // Online banking (Yes/No)



        // Member Trustee Information
        $member->trustee_name = json_encode($request->trustee_name);  // Trustee name
        $member->trustee_signature = json_encode($request->trustee_signature);  // Trustee signature
        $member->trustee_date = json_encode($request->trustee_date);  // Date of trustee signature
        $member->sipp_ssas_account = json_encode($request->sipp_ssas_account);  // Date of trustee signature
        $member->cheque_book_required = json_encode($request->cheque_book_required);  // Date of trustee signature;

        $member->tax_residence_country = json_encode($request->tax_residence_country);  // Country of tax residence

        $member->tin_reason = json_encode($request->tin_reason);  // Reason for not having a TIN
        $member->tin_number = json_encode($request->tin_number);  // Reason for not having a TIN

        $member->gender = json_encode($request->gender);
        $member->marital_status = json_encode($request->marital_status);
        $member->protection_type = json_encode($request->protection_type);
        $member->privacy_print_name = json_encode($request->privacy_print_name);
        $member->privacy_signature = json_encode($request->privacy_signature);
        $member->privacy_position = json_encode($request->privacy_position);
        $member->privacy_date = json_encode($request->privacy_date);
        $member->funds_deposited_by = json_encode($request->funds_deposited_by);
        $member->fees_paid_by = json_encode($request->fees_paid_by);
        $member->controller_names = json_encode($request->controller_names);
        $member->controller_dobs = json_encode($request->controller_dobs);
        $member->beneficial_owner_names = json_encode($request->beneficial_owner_names);
        $member->beneficial_owner_dobs = json_encode($request->beneficial_owner_dobs);
        $member->investment_details = json_encode($request->investment_details);
        $member->beneficiary_name = json_encode($request->beneficiary_name);  // Name of the beneficiary or charity
        $member->relationship = json_encode($request->beneficiary_relationship);  // Relationship (only for beneficiaries)

        $member->percentage = json_encode($request->beneficiary_percentage);


// Check if a new file is uploaded
  if ($request->hasFile('signature_file')) {
    $file = $request->file('signature_file');

    // Validate the file
    $request->validate([
        'signature_file' => 'mimes:jpg,jpeg,png,pdf|max:2048' // Allow images & PDFs, max 2MB
    ]);

    // Delete the old signature file if it exists
    if ($member->signature_adviser) {
        $oldFilePath = str_replace('/storage/app/public/', '', $member->signature_adviser);
        Storage::disk('public')->delete($oldFilePath);
    }

    // Store the uploaded file
    $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
    $filePath = $file->storeAs('signatures', $fileName, 'public');

    // Save new file path to database
    $member->signature_adviser = '/storage/app/public/' . $filePath;
}
// If no file is uploaded, check if a new signature is drawn
elseif ($request->signature_adviser) {
    $signatureData = $request->signature_adviser;

    // Remove Base64 prefix if exists
    if (strpos($signatureData, 'data:image/png;base64,') === 0) {
        $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
    }

    // Decode Base64
    $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));

    if ($signatureImage === false) {
        return back()->with('error', 'Invalid signature image format.');
    }

    // Delete the old signature file if it exists
    if ($member->signature_adviser) {
        $oldFilePath = str_replace('/storage/app/public/', '', $member->signature_adviser);
        Storage::disk('public')->delete($oldFilePath);
    }

    // Generate a unique filename
    $fileName = 'signature_' . uniqid() . '.png';

    // Store the new signature file
    Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);

    // Save new path to database
    $member->signature_adviser = '/storage/app/public/signatures/' . $fileName;
}




    // Check if a new file is uploaded
    if ($request->hasFile('file_upload')) {
        $file = $request->file('file_upload');

        // Validate the file
        $request->validate([
            'file_upload' => 'mimes:jpg,jpeg,png,pdf|max:2048' // Allow images & PDFs, max 2MB
        ]);

        // Delete the old signature file if it exists
        if ($member->part_four_signature && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $member->part_four_signature))) {
            Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $member->part_four_signature));
        }

        // Store the new uploaded file
        $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('signatures', $fileName, 'public');

        // Save the new file path in the database
        $member->part_four_signature = '/storage/app/public/' . $filePath;
    } 
    // Check if a new signature is drawn
    elseif ($request->part_four_signature) {
        $signatureData = $request->part_four_signature;

        // Remove Base64 prefix
        if (strpos($signatureData, 'data:image/png;base64,') === 0) {
            $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
        }

        // Decode Base64
        $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));

        if ($signatureImage === false) {
            return back()->with('error', 'Invalid signature image format.');
        }

        // Delete the old signature file if it exists
        if ($member->part_four_signature && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $member->part_four_signature))) {
            Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $member->part_four_signature));
        }

        // Generate a unique filename
        $fileName = 'signature_' . uniqid() . '.png';

        // Store the new file
        Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);

        // Save the new file path in the database
        $member->part_four_signature = '/storage/app/public/signatures/' . $fileName;
    }


        $member->save();
        


        return redirect()->back();
    }
    public function  memberViewSpecific($id)
    {
        $viewMember = Member::find($id);
        $member = Member::find($id);
        return view('dashboard.member.viewOasisSipp', compact('viewMember', 'member'));
    }

    public function destroys($id)
    {
        try {
            $member = Member::findOrFail($id);
            $member->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

 public function membersPending()
{
    // Get pending members with associated user information
    
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
    
   
//     $pendingMembers = Member::where('status', 'pending')->get();
//  $fptPendingMembers = Fpt::where('status', 'pending')->with('user')->get();

        
    //   dd($fptPendingMembers); 
        
    return view('dashboard.member.pendingApplications', compact('pendingMembers','fptPendingMembers'));
}


    public function memberExisting()
    {
        
        
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
        
        return view('dashboard.member.existingApplications', compact('existingMembers','fptActiveMembers'));
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

 



    return redirect()->back()->with('success', 'Status updated and emails sent.');
}



    public function membersDetails()
    {
        
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'advisor_firm'){
                    $memberDetails = Member::where('status', 'active')->get();
                    $ftpmemberDetails = FPT::where('status', 'active')->get();
                     $newmemberDetails = pensionmanagement::all();
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

    
    public function addmembersDetails(){
         return view('dashboard.member.addmemberDetails');
    }
    
    public function membersDetailstore(Request $request){
        
        $member = Memberdetail::create($request->all());
        
         return redirect()->route('members-details');
}

    public function membersDetailsEdit($id)
    {
        $member = Member::find($id);
        return view('dashboard.member.memberDetailsEdit',compact('member'));
    }

    public function membersDetailsView($id)
    {
        $member = Member::find($id);
        return view('dashboard.member.memberDetailsView',compact('member'));
    }
    
    public function memberExistingDetailView($id)
    {
        $member = pensionmanagement::find($id);
        return view('dashboard.member.memberExistingDetailView',compact('member'));
    }
    
        public function membersDetailsViewftp($id)
    {
        $member = FPT::find($id);
        return view('dashboard.member.memberDetailsView',compact('member'));
    }

    public function membersDetailsUpdate(Request $request, $id)
    {
        $member = Memberdetail::find($id);
        if ($member) {           
            $member->update($request->all());
             return redirect(route('members-details'))->with('success', 'Data Updated Siccessfully...');
        }
        return redirect()->back()->with('error', 'Failed to update the record!');
    }
    
    public function membersDetailsDelete($id)
    {
        $post = Memberdetail::find($id);
        $post->delete();

        return redirect()->back()->with('success', 'Post soft deleted successfully.');
    }

    public function showDeletedMember()
    {
        $deletedMembers = Member::onlyTrashed()->get(); // Fetch soft deleted posts
        return view('dashboard.member.deletedMembers', compact('deletedMembers'));
    }

   // Restore deleted member
public function restoreMember($id)
{
    // Find the soft deleted member
    $member = Member::withTrashed()->find($id);

    if ($member) {
        // Restore the member
        $member->restore();

        // Redirect with success message
        return redirect()->back()->with('success', 'Member restored successfully');
    }

    // If member not found, return an error message
    return redirect()->back()->with('error', 'Member not found');
}

    
    public function destroy($id)
    {
        $member = Member::find($id);

        if ($member) {
            $member->delete(); // Soft delete the member
            return redirect()->back()->with('success', 'Member soft deleted successfully.');
        }

        return redirect()->back()->with('error', 'Member not found.');
    }

    // Fetch all soft deleted members
 // Fetch all soft deleted members
 public function deleted()
 {
      // Fetch all deleted advisers
        $deletedFpt = Fpt::onlyTrashed()->get();
     $deletedMembers = Member::onlyTrashed()->get(); // Fetch all deleted members
     return view('dashboard.member.deletemember', compact('deletedMembers','deletedFpt'));
 }
 
  public function declinedList()
  
 {
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

     // Pass both variables to the view
     return view('dashboard.member.declinedApplication', compact('declinedMember', 'declinedFpt'));
 }

    public function membersBefore() {
        
        return view('dashboard.member.memberbefore');
    }
    
    public function membersBefore2() {
        
        return view('dashboard.member.memberbefore2');
    }
    
    public function membersBefore3() {
        
        return view('dashboard.member.memberbefore3');
    }
    
    public function changestatus($id, $status) {
        
        $member = Member::find($id);
    
        if ($member) {
            // Status update karein
            $member->status = $status;
            $member->save();
    
            return redirect()->back()->with('success', "Member status updated to {$status} successfully!");
        }
    
        return redirect()->back()->with('error', 'Member status update failed!');
    }


    public function signmember(Request $request, $id){
        
        
        $member = Member::find($id);
        
 // Check if a signature is drawn
 if ($request->hasFile('signature_file')) {
    $file = $request->file('signature_file');



    // Validate the file
    $request->validate([
        'signature_file' => 'mimes:jpg,jpeg,png,pdf|max:2048' // Allow images & PDFs, max 2MB
    ]);

    // Store the uploaded file
    $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
    $filePath = $file->storeAs('signatures', $fileName, 'public');
    

    // Save path to database
    $member->signature = '/storage/app/public/' . $filePath;
    $member->save();
   
}
// If no file is uploaded, check for the signature
elseif($request->signature_1) {
    $signatureData = $request->signature_1;

    // Remove Base64 prefix
    if (strpos($signatureData, 'data:image/png;base64,') === 0) {
        $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
    }

    // Decode Base64
    $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));

    if ($signatureImage === false) {
        return back()->with('error', 'Invalid signature image format.');
    }

    // Generate a unique filename
    $fileName = 'signature_' . uniqid() . '.png';

    // Store the file
    Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);

    // Save path to database
    $member->signature = '/storage/app/public/signatures/' . $fileName;
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
        <p><a href='https://newalltrust.ilcorpdev.com/members-oasis-view/{$member->id}' target='_blank' style='color: #007bff; text-decoration: none;'>View Application</a></p>
        <p>Please liaise with the adviser and/or member directly with any questions or clarity required to complete the review process.</p>
        <p>Best regards,<br>The Alltrust Team</p>
    </div>
";


        
        Mail::to($userEmail)->send(new SimpleMail($messageContent));
    

return redirect()->back();
    }



}
