<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SimpleMail;
use App\Models\Log;
use App\Models\Fpt;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FptController extends Controller
{
    public function fptCreate() {
        $fpts = User::where('role','fpt')->get();
        $role_member = 'fpt';
        return view('dashboard.fpt.createFpt',compact('fpts','role_member'));
    }
    
    public function FptBefore() {
        return view('dashboard.fpt.Fptbefore3');
    }

    public function showrecord() {
        if(auth()->user()->role == 'admin'){
            $fptView = Fpt::all();
        }else{
            $fptView = Fpt::where('creater_id', auth()->user()->id)->get();
        }
        return view('dashboard.fpt.viewFpt',compact('fptView'));
    }

    public function viewFpt($id) {
        $fpt = Fpt::findOrFail($id);
        $fptUser=User::where('role','fpt')->get();
        return view('dashboard.fpt.show_fpt', compact('fpt','fptUser'));
    }
    
    public function fptStore(Request $request) {
        $userMember = new User();
        $userMember->name = $request->input('user_name');
        $userMember->creator_id = auth()->user()->id;   
        $userMember->email = $request->input('user_email');
        $userMember->password = Hash::make('12345678');
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

        $fpt = new Fpt();
        $fpt->scheme_name = $request->scheme_name;
        $fpt->contact_name = $request->contact_name;
        $fpt->company_name = $request->company_name;
        $fpt->address = $request->address;
        $fpt->country = $request->country;
        $fpt->post_code = $request->post_code;
        $fpt->dial_code = $request->dial_code;
        $fpt->phone_number = $request->phone_number;
        $fpt->email = $request->email;
        $fpt->regulated_by = $request->regulated_by;
        $fpt->auth_number = $request->auth_number;
        $fpt->initial_fee = $request->initial_fee;
        $fpt->scheme_establishment = $request->scheme_establishment;
        $fpt->date_option = $request->date_option;
        $fpt->date_day = $request->date_day;
        $fpt->annual_fee = $request->annual_fee;
        $fpt->scheme_anniversary = $request->scheme_anniversary;
        $fpt->date_option2 = $request->date_option2;
        $fpt->date2_day = $request->date2_day;
        $fpt->percentage_checkbox = $request->percentage_checkbox;
        $fpt->specific_investments_checkbox = $request->specific_investments_checkbox;
        $fpt->specific_investments_list = $request->specific_investments_list;
        $fpt->initial_fee_amount1 = $request->initial_fee_amount1;
        $fpt->initial_fee_percentage1 = $request->initial_fee_percentage1;
        $fpt->scheme_establishment_alternative1 = $request->scheme_establishment_alternative1;
        $fpt->date_alternative1 = $request->date_alternative1;
        $fpt->date_alt_day1 = $request->date_alt_day1;
        $fpt->scheme_anniversary_alternative1 = $request->scheme_anniversary_alternative1;
        $fpt->transfer_amount_checkbox1 = $request->transfer_amount_checkbox1;
        $fpt->transfer_amount_value1 = $request->transfer_amount_value1;
        $fpt->percentage_checkbox_transfer1 = $request->percentage_checkbox_transfer1;
        $fpt->transfer_percentage_value1 = $request->transfer_percentage_value1;
        $fpt->transfer_payment1 = $request->transfer_payment1;
        $fpt->future_terms1 = $request->future_terms1;
        $fpt->print_name_left1 = $request->print_name_left1;
        $fpt->date_signed_left_day1 = $request->date_signed_left_day1;
        $fpt->print_name_right1 = $request->print_name_right1;
        $fpt->date_signed_right_day1 = $request->date_signed_right_day1;
        $fpt->initial_fee_amount2 = $request->initial_fee_amount2;
        $fpt->initial_fee_percentage2 = $request->initial_fee_percentage2;
        $fpt->scheme_establishment_alternative2 = $request->scheme_establishment_alternative2;
        $fpt->specific_date2 = $request->specific_date2;
        $fpt->date_alt_day = $request->date_alt_day;
        $fpt->anniversary_fee2 = $request->anniversary_fee2;
        $fpt->anniversary_fee1 = $request->anniversary_fee1;
        $fpt->scheme_anniversary_alternative2 = $request->scheme_anniversary_alternative2;
        $fpt->transfer_amount_checkbox = $request->transfer_amount_checkbox;
        $fpt->transfer_amount_value = $request->transfer_amount_value;
        $fpt->percentage_checkbox_transfer = $request->percentage_checkbox_transfer;
        $fpt->transfer_percentage_value = $request->transfer_percentage_value;
        $fpt->transfer_payment2 = $request->transfer_payment2;
        $fpt->future_terms2 = $request->future_terms2;
        $fpt->print_name_left2 = $request->print_name_left2;
        $fpt->date_signed_left_day2 = $request->date_signed_left_day2;
        $fpt->print_name_right2 = $request->print_name_right2;
        $fpt->date_signed_right_day2 = $request->date_signed_right_day2;
        $fpt->print_name_left_additional1 = $request->print_name_left_additional1;
        $fpt->date_signed_left_additional_day3 = $request->date_signed_left_additional_day3;
        $fpt->print_name_right_additional = $request->print_name_right_additional;
        $fpt->chairman_contact_name = $request->chairman_contact_name;
        $fpt->chairman_firm_name = $request->chairman_firm_name;
        $fpt->chairman_address_line_1 = $request->chairman_address_line_1;
        $fpt->chairman_address_line_2 = $request->chairman_address_line_2;
        $fpt->chairman_city = $request->chairman_city;
        $fpt->chairman_postcode = $request->chairman_postcode;
        $fpt->chairman_telephone = $request->chairman_telephone;
        $fpt->chairman_email = $request->chairman_email;
        $fpt->member_true_print_name_1 = $request->member_true_print_name_1;
        $fpt->member_true_print_name_2 = $request->member_true_print_name_2;
        $fpt->member_true_print_name_3 = $request->member_true_print_name_3;
        $fpt->member_true_print_name_4 = $request->member_true_print_name_4;
        $fpt->principal_reason_family = $request->principal_reason_family;
        $fpt->common_funds_number = $request->common_funds_number;
        $fpt->common_funds_investment_fund_1 = $request->common_funds_investment_fund_1;
        $fpt->common_funds_print_name_1_1 = $request->common_funds_print_name_1_1;
        $fpt->common_funds_print_name_1_2 = $request->common_funds_print_name_1_2;
        $fpt->common_funds_print_name_1_3 = $request->common_funds_print_name_1_3;
        $fpt->common_funds_print_name_1_4 = $request->common_funds_print_name_1_4;
        $fpt->common_funds_reason_for_fund_1 = $request->common_funds_reason_for_fund_1;
        $fpt->common_funds_investment_fund_2 = $request->common_funds_investment_fund_2;
        $fpt->common_funds_print_name_2_1 = $request->common_funds_print_name_2_1;
        $fpt->common_funds_print_name_2_2 = $request->common_funds_print_name_2_2;
        $fpt->common_funds_print_name_2_3 = $request->common_funds_print_name_2_3;
        $fpt->common_funds_print_name_2_4 = $request->common_funds_print_name_2_4;
        $fpt->common_funds_reason_for_fund_2 = $request->common_funds_reason_for_fund_2;
        $fpt->scheme_adviser_contact_name = $request->scheme_adviser_contact_name;
        $fpt->scheme_adviser_company_name = $request->scheme_adviser_company_name;
        $fpt->scheme_adviser_address = $request->scheme_adviser_address;
        $fpt->scheme_adviser_address_line_2 = $request->scheme_adviser_address_line_2;
        $fpt->scheme_adviser_city = $request->scheme_adviser_city;
        $fpt->scheme_adviser_postcode = $request->scheme_adviser_postcode;
        $fpt->scheme_adviser_telephone_number = $request->scheme_adviser_telephone_number;
        $fpt->scheme_adviser_email_address = $request->scheme_adviser_email_address;
        $fpt->scheme_adviser_regulated_by = $request->scheme_adviser_regulated_by;
        $fpt->scheme_adviser_authorization_number = $request->scheme_adviser_authorization_number;
        $fpt->scheme_adviser_is_part_of_network = $request->scheme_adviser_is_part_of_network;
        $fpt->scheme_adviser_network_name = $request->scheme_adviser_network_name;
        $fpt->scheme_adviser_regulated_by_2 = $request->scheme_adviser_regulated_by_2;
        $fpt->scheme_adviser_company_authorization_number = $request->scheme_adviser_company_authorization_number;
        $fpt->accountant_details_contact_name = $request->accountant_details_contact_name;
        $fpt->accountant_details_firm_name = $request->accountant_details_firm_name;
        $fpt->accountant_details_address_line_1 = $request->accountant_details_address_line_1;
        $fpt->accountant_details_address_line_2 = $request->accountant_details_address_line_2;
        $fpt->accountant_details_city = $request->accountant_details_city;
        $fpt->accountant_details_postcode = $request->accountant_details_postcode;
        $fpt->accountant_details_telephone_number = $request->accountant_details_telephone_number;
        $fpt->accountant_details_email_address = $request->accountant_details_email_address;
        $fpt->declaration_signature_1 = $request->declaration_signature_1;
        $fpt->declaration_print_name_1 = $request->declaration_print_name_1;
        $fpt->declaration_position_1 = $request->declaration_position_1;
        $fpt->declaration_day_1 = $request->declaration_day_1;
        $fpt->declaration_signature_2 = $request->declaration_signature_2;
        $fpt->declaration_print_name_2 = $request->declaration_print_name_2;
        $fpt->declaration_position_2 = $request->declaration_position_2;
        $fpt->declaration_day_2 = $request->declaration_day_2;
        $fpt->adviser_agrement_initial_fee = $request->adviser_agrement_initial_fee;
        $fpt->pay_following_establishment = $request->pay_following_establishment;
        $fpt->day_1 = $request->day_1;
        $fpt->pay_anniversary = $request->pay_anniversary;
        $fpt->day_2 = $request->day_2;
        $fpt->initial_fee_percentage = $request->initial_fee_percentage;
        $fpt->pay_following_establishment_2 = $request->pay_following_establishment_2;
        $fpt->day_3 = $request->day_3;
        $fpt->percentage_total_fund = $request->percentage_total_fund;
        $fpt->specific_investments = $request->specific_investments;
        $fpt->adviser_agrement_initial_fee1 = $request->adviser_agrement_initial_fee1;
        $fpt->adviser_agrement_pay_following_establishment = $request->adviser_agrement_pay_following_establishment;
        $fpt->adviser_agrement_day_1 = $request->adviser_agrement_day_1;
        $fpt->adviser_agrement_annual_fee = $request->adviser_agrement_annual_fee;
        $fpt->adviser_agrement_pay_anniversary = $request->adviser_agrement_pay_anniversary;
        $fpt->adviser_agrement_day_2 = $request->adviser_agrement_day_2;
        $fpt->adviser_agrement_initial_fee_percentage1 = $request->adviser_agrement_initial_fee_percentage1;
        $fpt->adviser_agrement_pay_following_establishment_2 = $request->adviser_agrement_pay_following_establishment_2;
        $fpt->adviser_agrement_day_3 = $request->adviser_agrement_day_3;
        $fpt->adviser_agrement_percentage_total_fund = $request->adviser_agrement_percentage_total_fund;
        $fpt->adviser_agrement_specific_investments = $request->adviser_agrement_specific_investments;
        $fpt->adviser_agrement_specific_investments_list = $request->adviser_agrement_specific_investments_list;
        $fpt->adviser_agrement_initial_fee_percentage = $request->adviser_agrement_initial_fee_percentage;
        $fpt->emp_contr_emp_contr_regular_contribution = $request->emp_contr_emp_contr_regular_contribution;
        $fpt->adviser_agrement_pay_following_establishment11 = $request->adviser_agrement_pay_following_establishment11;
        $fpt->adviser_agrement_day_11 = $request->adviser_agrement_day_11;
        $fpt->adviser_agrement_pay_anniversary11 = $request->adviser_agrement_pay_anniversary11;
        $fpt->adviser_agrement_transfer_amount = $request->adviser_agrement_transfer_amount;
        $fpt->adviser_agrement_percentage_of_transfer = $request->adviser_agrement_percentage_of_transfer;
        $fpt->adviser_agrement_transfer_payments = $request->adviser_agrement_transfer_payments;
        $fpt->adviser_agrement_same_terms_apply = $request->adviser_agrement_same_terms_apply;
        $fpt->adviser_agrement_sign_name_left = $request->adviser_agrement_sign_name_left;
        $fpt->adviser_agrement_sign_name_right = $request->adviser_agrement_sign_name_right;
        $fpt->adviser_agrement_signature_left = $request->adviser_agrement_signature_left;
        $fpt->adviser_agrement_signature_right = $request->adviser_agrement_signature_right;
        $fpt->adviser_agrement_day_signed_left = $request->adviser_agrement_day_signed_left;
        $fpt->adviser_agrement_day_signed_right = $request->adviser_agrement_day_signed_right;
        $fpt->interim_deed_appointed = $request->interim_deed_appointed;
        $fpt->interim_deed_network_name = $request->interim_deed_network_name;
        $fpt->interim_deed_payment_to_network = $request->interim_deed_payment_to_network;
        $fpt->interim_deed_fees_to_be_paid_by = $request->interim_deed_fees_to_be_paid_by;
        $fpt->interim_deed_bank_name = $request->interim_deed_bank_name;
        $fpt->interim_deed_branch = $request->interim_deed_branch;
        $fpt->interim_deed_account_number = $request->interim_deed_account_number;
        $fpt->interim_deed_sort_code = $request->interim_deed_sort_code;
        $fpt->interim_deed_payment_ref = $request->interim_deed_payment_ref;
        $fpt->interim_deed_print_name = $request->interim_deed_print_name;
        $fpt->interim_deed_signature = $request->interim_deed_signature;
        $fpt->interim_deed_position = $request->interim_deed_position;
        $fpt->interim_deed_company_stamp = $request->interim_deed_company_stamp;
        $fpt->interim_deed_date_signed = $request->interim_deed_date_signed;
        $fpt->member_questionaire_title = $request->member_questionaire_title;
        $fpt->member_questionaire_forenames = $request->member_questionaire_forenames;
        $fpt->member_questionaire_surname = $request->member_questionaire_surname;
        $fpt->member_questionaire_previous_names = $request->member_questionaire_previous_names;
        $fpt->member_questionaire_address = $request->member_questionaire_address;
        $fpt->member_questionaire_county = $request->member_questionaire_county;
        $fpt->member_questionaire_postcode = $request->member_questionaire_postcode;
        $fpt->member_questionaire_time_at_address_years = $request->member_questionaire_time_at_address_years;
        $fpt->member_questionaire_time_at_address_months = $request->member_questionaire_time_at_address_months;
        $fpt->member_questionaire_previous_address = $request->member_questionaire_previous_address;
        $fpt->member_questionaire_previous_county = $request->member_questionaire_previous_county;
        $fpt->member_questionaire_previous_postcode = $request->member_questionaire_previous_postcode;
        $fpt->member_questionaire_telephone_number = $request->member_questionaire_telephone_number;
        $fpt->member_questionaire_email_address = $request->member_questionaire_email_address;
        $fpt->member_questionaire_national_insurance_number = $request->member_questionaire_national_insurance_number;
        $fpt->member_questionaire_taxpayer_reference = $request->member_questionaire_taxpayer_reference;
        $fpt->member_questionaire_occupation = $request->member_questionaire_occupation;
        $fpt->member_questionaire_employer_name = $request->member_questionaire_employer_name;
        $fpt->member_questionaire_dob_day = $request->member_questionaire_dob_day;
        $fpt->member_questionaire_gender = $request->member_questionaire_gender;
        $fpt->member_questionaire_nationality = $request->member_questionaire_nationality;
        $fpt->member_questionaire_marital_status = $request->member_questionaire_marital_status;
        $fpt->member_questionaire_employment_status = $request->member_questionaire_employment_status;
        $fpt->member_questionaire_current_occupation = $request->member_questionaire_current_occupation;
        $fpt->member_questionaire_job_title = $request->member_questionaire_job_title;
        $fpt->member_questionaire_opted_out = $request->member_questionaire_opted_out;
        $fpt->member_questionaire_protection = $request->member_questionaire_protection;
        $fpt->member_questionaire_primary_protection = $request->member_questionaire_primary_protection;
        $fpt->member_questionaire_lump_sum_protection = $request->member_questionaire_lump_sum_protection;
        $fpt->member_questionaire_mpaa = $request->member_questionaire_mpaa;
        $fpt->member_questionaire_mpaa_day = $request->member_questionaire_mpaa_day;
        $fpt->entitlement_tax_relief_option = $request->entitlement_tax_relief_option;
        $fpt->financial_que_adviser_same = $request->financial_que_adviser_same;
        $fpt->financial_que_contact_name = $request->financial_que_contact_name;
        $fpt->financial_que_company_name = $request->financial_que_company_name;
        $fpt->financial_que_address = $request->financial_que_address;
        $fpt->financial_que_country = $request->financial_que_country;
        $fpt->financial_que_postcode = $request->financial_que_postcode;
        $fpt->financial_que_telephone_number = $request->financial_que_telephone_number;
        $fpt->financial_que_email_address = $request->financial_que_email_address;
        $fpt->financial_que_regulated_by = $request->financial_que_regulated_by;
        $fpt->financial_que_authorisation_number = $request->financial_que_authorisation_number;
        $fpt->financial_que_network_name = $request->financial_que_network_name;
        $fpt->financial_que_network_regulated_by = $request->financial_que_network_regulated_by;
        $fpt->financial_que_company_authorisation_number = $request->financial_que_company_authorisation_number;
        $fpt->fund_common_investment_1 = $request->fund_common_investment_1;
        $fpt->fund_investment_1 = $request->fund_investment_1;
        $fpt->fund_common_investment_2 = $request->fund_common_investment_2;
        $fpt->fund_investment_2 = $request->fund_investment_2;
        $fpt->fund_additional_details = $request->fund_additional_details;
        $fpt->members_fund_investment_1 = $request->members_fund_investment_1;
        $fpt->members_fund_investment_2 = $request->members_fund_investment_2;
        $fpt->members_fund_investment_3 = $request->members_fund_investment_3;
        $fpt->members_fund_investment_4 = $request->members_fund_investment_4;
        $fpt->nomination_beneficiary_1_name = $request->nomination_beneficiary_1_name;
        $fpt->nomination_beneficiary_1_relationship = $request->nomination_beneficiary_1_relationship;
        $fpt->nomination_beneficiary_1_percentage = $request->nomination_beneficiary_1_percentage;
        $fpt->nomination_beneficiary_2_name = $request->nomination_beneficiary_2_name;
        $fpt->nomination_beneficiary_2_relationship = $request->nomination_beneficiary_2_relationship;
        $fpt->nomination_beneficiary_2_percentage = $request->nomination_beneficiary_2_percentage;
        $fpt->nomination_beneficiary_3_name = $request->nomination_beneficiary_3_name;
        $fpt->nomination_beneficiary_3_relationship = $request->nomination_beneficiary_3_relationship;
        $fpt->nomination_beneficiary_3_percentage = $request->nomination_beneficiary_3_percentage;
        $fpt->nomination_charity_1_name = $request->nomination_charity_1_name;
        $fpt->nomination_charity_1_percentage = $request->nomination_charity_1_percentage;
        $fpt->nomination_charity_2_name = $request->nomination_charity_2_name;
        $fpt->nomination_charity_2_percentage = $request->nomination_charity_2_percentage;
        $fpt->nomination_charity_3_name = $request->nomination_charity_3_name;
        $fpt->nomination_charity_3_percentage = $request->nomination_charity_3_percentage;
        $fpt->personal_regular_contribution = $request->personal_regular_contribution;
        $fpt->personal_single_contribution = $request->personal_single_contribution;
        $fpt->personal_source_of_funds = $request->personal_source_of_funds;
        $fpt->personal_contribution_frequency = $request->personal_contribution_frequency;
        $fpt->personal_start_date_day = $request->personal_start_date_day;
        $fpt->personal_employer_pay = $request->personal_employer_pay;
        $fpt->questionaries_employer_name = $request->questionaries_employer_name;
        $fpt->questionaries_registered_address = $request->questionaries_registered_address;
        $fpt->questionaries_country = $request->questionaries_country;
        $fpt->questionaries_postcode = $request->questionaries_postcode;
        $fpt->questionaries_telephone_number = $request->questionaries_telephone_number;
        $fpt->questionaries_email_address = $request->questionaries_email_address;
        $fpt->questionaries_trading_address = $request->questionaries_trading_address;
        $fpt->questionaries_trading_country = $request->questionaries_trading_country;
        $fpt->questionaries_trading_postcode = $request->questionaries_trading_postcode;
        $fpt->questionaries_employer_status = $request->questionaries_employer_status;
        $fpt->questionaries_nature_of_business = $request->questionaries_nature_of_business;
        $fpt->questionaries_employer_year_end_day = $request->questionaries_employer_year_end_day;
        $fpt->questionaries_registration_number = $request->questionaries_registration_number;
        $fpt->questionaries_employed_since_day = $request->questionaries_employed_since_day;
        $fpt->questionaries_director_status = $request->questionaries_director_status;
        $fpt->questionaries_shareholdings = $request->questionaries_shareholdings;
        $fpt->emp_contr_regular_contribution = $request->emp_contr_regular_contribution;
        $fpt->emp_contr_single_contribution = $request->emp_contr_single_contribution;
        $fpt->emp_contr_frequency = $request->emp_contr_frequency;
        $fpt->emp_contr_day = $request->emp_contr_day;
        $fpt->empl_dec_print_name = $request->empl_dec_print_name;
        $fpt->empl_dec_position = $request->empl_dec_position;
        $fpt->empl_dec_day = $request->empl_dec_day;
        $fpt->transf_auth_print_name = $request->transf_auth_print_name;
        $fpt->transf_auth_plan_scheme_no = $request->transf_auth_plan_scheme_no;
        $fpt->transf_auth_day = $request->transf_auth_day;
        $fpt->trans_plan_member_name = $request->trans_plan_member_name;
        $fpt->trans_plan_telephone_number = $request->trans_plan_telephone_number;
        $fpt->trans_plan_email_address = $request->trans_plan_email_address;
        $fpt->trans_plan_transfer_scheme_type = $request->trans_plan_transfer_scheme_type;
        $fpt->trans_plan_address = $request->trans_plan_address;
        $fpt->trans_plan_postcode = $request->trans_plan_postcode;
        $fpt->trans_plan_country = $request->trans_plan_country;
        $fpt->trans_plan_scheme_type = $request->trans_plan_scheme_type;
        $fpt->trans_plan_plan_scheme_name = $request->trans_plan_plan_scheme_name;
        $fpt->trans_plan_scheme_number = $request->trans_plan_scheme_number;
        $fpt->trans_plan_reference = $request->trans_plan_reference;
        $fpt->trans_plan_value_of_fund = $request->trans_plan_value_of_fund;
        $fpt->trans_plan_wish_transfer = $request->trans_plan_wish_transfer;
        $fpt->trans_plan_important_to_transfer = $request->trans_plan_important_to_transfer;
        $fpt->trans_plan_existing_scheme = $request->trans_plan_existing_scheme;
        $fpt->trans_plan_block_transfer = $request->trans_plan_block_transfer;
        $fpt->member_consent_contact_me = $request->member_consent_contact_me;
        $fpt->member_consent_pass_contact = $request->member_consent_pass_contact;
        $fpt->member_consent_prefer_email = $request->member_consent_prefer_email;
        $fpt->member_consent_prefer_post = $request->member_consent_prefer_post;
        $fpt->member_consent_print_name = $request->member_consent_print_name;
        $fpt->member_consent_date_day = $request->member_consent_date_day;
        $fpt->date_alternative2 = $request->date_alternative2;
        $fpt->member_declra_waive_rights = $request->member_declra_waive_rights;
        $fpt->member_declra_responsibility_declaration = $request->member_declra_responsibility_declaration;
        $fpt->member_declra_confirm_information = $request->member_declra_confirm_information;
        $fpt->member_declra_notify_information = $request->member_declra_notify_information;
        $fpt->member_declra_consent_declaration = $request->member_declra_consent_declaration;
        $fpt->member_declra_print_name = $request->member_declra_print_name;
        $fpt->member_declra_date_day = $request->member_declra_date_day;
        $fpt->member_declra_waive_cancellation_rights = $request->member_declra_waive_cancellation_rights;
        $fpt->member_declra_parental_responsibility = $request->member_declra_parental_responsibility;
        $fpt->notes = $request->notes;
        
        $fpt->signature_left1 = $request->signature_left1;
        $fpt->signature_right1 = $request->signature_right1;
        $fpt->signature_left2 = $request->signature_left2;
        $fpt->signature_right2 = $request->signature_right2;
        $fpt->signature_left_additional = $request->signature_left_additional;
        $fpt->signature_1 = $request->signature_1;
        $fpt->signature_2 = $request->signature_2;
        $fpt->signature_left = $request->signature_left;
        $fpt->signature_right = $request->signature_right;
        $fpt->signature = $request->signature;
        $fpt->empl_dec_signature = $request->empl_dec_signature;
        $fpt->transf_auth_signature = $request->transf_auth_signature;
        $fpt->member_consent_signature = $request->member_consent_signature;
        $fpt->member_declra_signature = $request->member_declra_signature;
        
        

        if ($request->hasFile('signature_file')) {
            $file = $request->file('signature_file');
            $request->validate([
                'signature_file' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_left1 = '/storage/app/public/' . $filePath;
        }
        elseif($request->signature_left1)  {
            $signatureData = $request->signature_left1;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_left1'] = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file1')) {
            $file = $request->file('signature_file1');
            $request->validate([
                'signature_file1' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_right1 = '/storage/app/public/' . $filePath;
        
        }
        elseif($request->signature_right1)  {
            $signatureData = $request->signature_right1;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_right1'] = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file2')) {
            $file = $request->file('signature_file2');
            $request->validate([
                'signature_file2' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_left2 = '/storage/app/public/' . $filePath;
        }
        elseif($request->signature_left2)  {
            $signatureData = $request->signature_left2;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_left2'] = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file3')) {
            $file = $request->file('signature_file3');
            $request->validate([
                'signature_file3' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_right2 = '/storage/app/public/' . $filePath;
        }
        elseif($request->signature_right2) {
            $signatureData = $request->signature_right2;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_right2'] = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file4')) {
            $file = $request->file('signature_file4');
            $request->validate([
                'signature_file4' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_left_additional = '/storage/app/public/' . $filePath;
        }
        elseif($request->signature_left_additional)  {
            $signatureData = $request->signature_left_additional;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_left_additional'] = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file5')) {
            $file = $request->file('signature_file5');
            $request->validate([
                'signature_file5' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_1 = '/storage/app/public/' . $filePath;
        }
        elseif($request->signature_1)  {
            $signatureData = $request->signature_1;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_1'] = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file6')) {
            $file = $request->file('signature_file6');
            $request->validate([
                'signature_file6' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_2 = '/storage/app/public/' . $filePath;
        }
        elseif($request->signature_2)  {
            $signatureData = $request->signature_2;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_2'] = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file7')) {
            $file = $request->file('signature_file7');
            $request->validate([
                'signature_file7' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_left = '/storage/app/public/' . $filePath;
        
        }
        elseif($request->signature_left)  {
            $signatureData = $request->signature_left;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_left'] = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file8')) {
            $file = $request->file('signature_file8');
            $request->validate([
                'signature_file8' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_right = '/storage/app/public/' . $filePath;
        }
        elseif($request->signature_right)  {
            $signatureData = $request->signature_right;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_right'] = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file9')) {
            $file = $request->file('signature_file9');
            $request->validate([
                'signature_file9' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature = '/storage/app/public/' . $filePath;
        }
        elseif($request->signature)  {
            $signatureData = $request->signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature'] = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file10')) {
            $file = $request->file('signature_file10');
            $request->validate([
                'signature_file10' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->empl_dec_signature = '/storage/app/public/' . $filePath;
        }
        elseif($request->empl_dec_signature)  {
            $signatureData = $request->empl_dec_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['empl_dec_signature'] = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file11')) {
            $file = $request->file('signature_file11');
            $request->validate([
                'signature_file11' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->transf_auth_signature = '/storage/app/public/' . $filePath;
        }
        elseif($request->transf_auth_signature)  {
            $signatureData = $request->transf_auth_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['transf_auth_signature'] = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file12')) {
            $file = $request->file('signature_file12');
            $request->validate([
                'signature_file12' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->member_consent_signature = '/storage/app/public/' . $filePath;    
        }
        elseif($request->member_consent_signature)  {
            $signatureData = $request->member_consent_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['member_consent_signature'] = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file13')) {
            $file = $request->file('signature_file13');
            $request->validate([
                'signature_file13' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->member_declra_signature = '/storage/app/public/' . $filePath;
        }
        elseif($request->member_declra_signature)  {
            $signatureData = $request->member_declra_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['member_declra_signature'] = '/storage/app/public/signatures/' . $fileName;
        }
        $fpt->save();
        
        $username = $userMember->name;
        $userEmail = $userMember->email;
        $messageContent = "
            <div style='font-family: Arial, sans-serif; line-height: 1.6; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px;'>
                <h2 style='color: #333;'>Alltrust Application Received – Next Steps</h2>
                <p>Dear {$username},</p>
                <p>Thank you for submitting your application to Alltrust Services Limited.</p>
                <p>To proceed, please log in to our portal to review and complete your application details.</p>
                <p><strong>Click the link below to access your account:</strong></p>
                <p><a href='https://www.alltrust.co.uk/alltrustonline/view-fpt/{$fpt->id}' target='_blank' style='color: #007bff; text-decoration: none;'>Portal Link</a></p>
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
        return redirect()->back();
    }

    public function editFpt($id) {
        $fpt = Fpt::findOrFail($id);
        $fptUser=User::where('role','fpt')->get();
        $editFpt = Fpt::with('user')->find($id);
        $user = User::find($editFpt->user_id);
        $role_member = 'fpt';
        return view('dashboard.fpt.Edit_Fpt', compact('fpt','fptUser','user','role_member'));
    }

   public function fptUpdate(Request $request, $id) {
        $fpt = Fpt::findOrFail($id);
        $fpt->scheme_name = $request->scheme_name;
        $fpt->contact_name = $request->contact_name;
        $fpt->company_name = $request->company_name;
        $fpt->address = $request->address;
        $fpt->country = $request->country;
        $fpt->post_code = $request->post_code;
        $fpt->dial_code = $request->dial_code;
        $fpt->phone_number = $request->phone_number;
        $fpt->email = $request->email;
        $fpt->regulated_by = $request->regulated_by;
        $fpt->auth_number = $request->auth_number;
        $fpt->initial_fee = $request->initial_fee;
        $fpt->scheme_establishment = $request->scheme_establishment;
        $fpt->date_option = $request->date_option;
        $fpt->date_day = $request->date_day;
        $fpt->annual_fee = $request->annual_fee;
        $fpt->scheme_anniversary = $request->scheme_anniversary;
        $fpt->date_option2 = $request->date_option2;
        $fpt->date2_day = $request->date2_day;
        $fpt->percentage_checkbox = $request->percentage_checkbox;
        $fpt->specific_investments_checkbox = $request->specific_investments_checkbox;
        $fpt->specific_investments_list = $request->specific_investments_list;
        $fpt->initial_fee_amount1 = $request->initial_fee_amount1;
        $fpt->initial_fee_percentage1 = $request->initial_fee_percentage1;
        $fpt->scheme_establishment_alternative1 = $request->scheme_establishment_alternative1;
        $fpt->date_alternative1 = $request->date_alternative1;
        $fpt->date_alt_day1 = $request->date_alt_day1;
        $fpt->scheme_anniversary_alternative1 = $request->scheme_anniversary_alternative1;
        $fpt->transfer_amount_checkbox1 = $request->transfer_amount_checkbox1;
        $fpt->transfer_amount_value1 = $request->transfer_amount_value1;
        $fpt->percentage_checkbox_transfer1 = $request->percentage_checkbox_transfer1;
        $fpt->transfer_percentage_value1 = $request->transfer_percentage_value1;
        $fpt->transfer_payment1 = $request->transfer_payment1;
        $fpt->future_terms1 = $request->future_terms1;
        $fpt->print_name_left1 = $request->print_name_left1;
        $fpt->date_signed_left_day1 = $request->date_signed_left_day1;
        $fpt->print_name_right1 = $request->print_name_right1;
        $fpt->date_signed_right_day1 = $request->date_signed_right_day1;
        $fpt->initial_fee_amount2 = $request->initial_fee_amount2;
        $fpt->initial_fee_percentage2 = $request->initial_fee_percentage2;
        $fpt->scheme_establishment_alternative2 = $request->scheme_establishment_alternative2;
        $fpt->specific_date2 = $request->specific_date2;
        $fpt->date_alt_day = $request->date_alt_day;
        $fpt->anniversary_fee2 = $request->anniversary_fee2;
        $fpt->anniversary_fee1 = $request->anniversary_fee1;
        $fpt->scheme_anniversary_alternative2 = $request->scheme_anniversary_alternative2;
        $fpt->transfer_amount_checkbox = $request->transfer_amount_checkbox;
        $fpt->transfer_amount_value = $request->transfer_amount_value;
        $fpt->percentage_checkbox_transfer = $request->percentage_checkbox_transfer;
        $fpt->transfer_percentage_value = $request->transfer_percentage_value;
        $fpt->transfer_payment2 = $request->transfer_payment2;
        $fpt->future_terms2 = $request->future_terms2;
        $fpt->print_name_left2 = $request->print_name_left2;
        $fpt->date_signed_left_day2 = $request->date_signed_left_day2;
        $fpt->print_name_right2 = $request->print_name_right2;
        $fpt->date_signed_right_day2 = $request->date_signed_right_day2;
        $fpt->print_name_left_additional1 = $request->print_name_left_additional1;
        $fpt->date_signed_left_additional_day3 = $request->date_signed_left_additional_day3;
        $fpt->print_name_right_additional = $request->print_name_right_additional;
        $fpt->chairman_contact_name = $request->chairman_contact_name;
        $fpt->chairman_firm_name = $request->chairman_firm_name;
        $fpt->chairman_address_line_1 = $request->chairman_address_line_1;
        $fpt->chairman_address_line_2 = $request->chairman_address_line_2;
        $fpt->chairman_city = $request->chairman_city;
        $fpt->chairman_postcode = $request->chairman_postcode;
        $fpt->chairman_telephone = $request->chairman_telephone;
        $fpt->chairman_email = $request->chairman_email;
        $fpt->member_true_print_name_1 = $request->member_true_print_name_1;
        $fpt->member_true_print_name_2 = $request->member_true_print_name_2;
        $fpt->member_true_print_name_3 = $request->member_true_print_name_3;
        $fpt->member_true_print_name_4 = $request->member_true_print_name_4;
        $fpt->principal_reason_family = $request->principal_reason_family;
        $fpt->common_funds_number = $request->common_funds_number;
        $fpt->common_funds_investment_fund_1 = $request->common_funds_investment_fund_1;
        $fpt->common_funds_print_name_1_1 = $request->common_funds_print_name_1_1;
        $fpt->common_funds_print_name_1_2 = $request->common_funds_print_name_1_2;
        $fpt->common_funds_print_name_1_3 = $request->common_funds_print_name_1_3;
        $fpt->common_funds_print_name_1_4 = $request->common_funds_print_name_1_4;
        $fpt->common_funds_reason_for_fund_1 = $request->common_funds_reason_for_fund_1;
        $fpt->common_funds_investment_fund_2 = $request->common_funds_investment_fund_2;
        $fpt->common_funds_print_name_2_1 = $request->common_funds_print_name_2_1;
        $fpt->common_funds_print_name_2_2 = $request->common_funds_print_name_2_2;
        $fpt->common_funds_print_name_2_3 = $request->common_funds_print_name_2_3;
        $fpt->common_funds_print_name_2_4 = $request->common_funds_print_name_2_4;
        $fpt->common_funds_reason_for_fund_2 = $request->common_funds_reason_for_fund_2;
        $fpt->scheme_adviser_contact_name = $request->scheme_adviser_contact_name;
        $fpt->scheme_adviser_company_name = $request->scheme_adviser_company_name;
        $fpt->scheme_adviser_address = $request->scheme_adviser_address;
        $fpt->scheme_adviser_address_line_2 = $request->scheme_adviser_address_line_2;
        $fpt->scheme_adviser_city = $request->scheme_adviser_city;
        $fpt->scheme_adviser_postcode = $request->scheme_adviser_postcode;
        $fpt->scheme_adviser_telephone_number = $request->scheme_adviser_telephone_number;
        $fpt->scheme_adviser_email_address = $request->scheme_adviser_email_address;
        $fpt->scheme_adviser_regulated_by = $request->scheme_adviser_regulated_by;
        $fpt->scheme_adviser_authorization_number = $request->scheme_adviser_authorization_number;
        $fpt->scheme_adviser_is_part_of_network = $request->scheme_adviser_is_part_of_network;
        $fpt->scheme_adviser_network_name = $request->scheme_adviser_network_name;
        $fpt->scheme_adviser_regulated_by_2 = $request->scheme_adviser_regulated_by_2;
        $fpt->scheme_adviser_company_authorization_number = $request->scheme_adviser_company_authorization_number;
        $fpt->accountant_details_contact_name = $request->accountant_details_contact_name;
        $fpt->accountant_details_firm_name = $request->accountant_details_firm_name;
        $fpt->accountant_details_address_line_1 = $request->accountant_details_address_line_1;
        $fpt->accountant_details_address_line_2 = $request->accountant_details_address_line_2;
        $fpt->accountant_details_city = $request->accountant_details_city;
        $fpt->accountant_details_postcode = $request->accountant_details_postcode;
        $fpt->accountant_details_telephone_number = $request->accountant_details_telephone_number;
        $fpt->accountant_details_email_address = $request->accountant_details_email_address;
        $fpt->declaration_signature_1 = $request->declaration_signature_1;
        $fpt->declaration_print_name_1 = $request->declaration_print_name_1;
        $fpt->declaration_position_1 = $request->declaration_position_1;
        $fpt->declaration_day_1 = $request->declaration_day_1;
        $fpt->declaration_signature_2 = $request->declaration_signature_2;
        $fpt->declaration_print_name_2 = $request->declaration_print_name_2;
        $fpt->declaration_position_2 = $request->declaration_position_2;
        $fpt->declaration_day_2 = $request->declaration_day_2;
        $fpt->adviser_agrement_initial_fee = $request->adviser_agrement_initial_fee;
        $fpt->pay_following_establishment = $request->pay_following_establishment;
        $fpt->day_1 = $request->day_1;
        $fpt->pay_anniversary = $request->pay_anniversary;
        $fpt->day_2 = $request->day_2;
        $fpt->initial_fee_percentage = $request->initial_fee_percentage;
        $fpt->pay_following_establishment_2 = $request->pay_following_establishment_2;
        $fpt->day_3 = $request->day_3;
        $fpt->percentage_total_fund = $request->percentage_total_fund;
        $fpt->specific_investments = $request->specific_investments;
        $fpt->adviser_agrement_initial_fee1 = $request->adviser_agrement_initial_fee1;
        $fpt->adviser_agrement_pay_following_establishment = $request->adviser_agrement_pay_following_establishment;
        $fpt->adviser_agrement_day_1 = $request->adviser_agrement_day_1;
        $fpt->adviser_agrement_annual_fee = $request->adviser_agrement_annual_fee;
        $fpt->adviser_agrement_pay_anniversary = $request->adviser_agrement_pay_anniversary;
        $fpt->adviser_agrement_day_2 = $request->adviser_agrement_day_2;
        $fpt->adviser_agrement_initial_fee_percentage1 = $request->adviser_agrement_initial_fee_percentage1;
        $fpt->adviser_agrement_pay_following_establishment_2 = $request->adviser_agrement_pay_following_establishment_2;
        $fpt->adviser_agrement_day_3 = $request->adviser_agrement_day_3;
        $fpt->adviser_agrement_percentage_total_fund = $request->adviser_agrement_percentage_total_fund;
        $fpt->adviser_agrement_specific_investments = $request->adviser_agrement_specific_investments;
        $fpt->adviser_agrement_specific_investments_list = $request->adviser_agrement_specific_investments_list;
        $fpt->adviser_agrement_initial_fee_percentage = $request->adviser_agrement_initial_fee_percentage;
        $fpt->emp_contr_emp_contr_regular_contribution = $request->emp_contr_emp_contr_regular_contribution;
        $fpt->adviser_agrement_pay_following_establishment11 = $request->adviser_agrement_pay_following_establishment11;
        $fpt->adviser_agrement_day_11 = $request->adviser_agrement_day_11;
        $fpt->adviser_agrement_pay_anniversary11 = $request->adviser_agrement_pay_anniversary11;
        $fpt->adviser_agrement_transfer_amount = $request->adviser_agrement_transfer_amount;
        $fpt->adviser_agrement_percentage_of_transfer = $request->adviser_agrement_percentage_of_transfer;
        $fpt->adviser_agrement_transfer_payments = $request->adviser_agrement_transfer_payments;
        $fpt->adviser_agrement_same_terms_apply = $request->adviser_agrement_same_terms_apply;
        $fpt->adviser_agrement_sign_name_left = $request->adviser_agrement_sign_name_left;
        $fpt->adviser_agrement_sign_name_right = $request->adviser_agrement_sign_name_right;
        $fpt->adviser_agrement_signature_left = $request->adviser_agrement_signature_left;
        $fpt->adviser_agrement_signature_right = $request->adviser_agrement_signature_right;
        $fpt->adviser_agrement_day_signed_left = $request->adviser_agrement_day_signed_left;
        $fpt->adviser_agrement_day_signed_right = $request->adviser_agrement_day_signed_right;
        $fpt->interim_deed_appointed = $request->interim_deed_appointed;
        $fpt->interim_deed_network_name = $request->interim_deed_network_name;
        $fpt->interim_deed_payment_to_network = $request->interim_deed_payment_to_network;
        $fpt->interim_deed_fees_to_be_paid_by = $request->interim_deed_fees_to_be_paid_by;
        $fpt->interim_deed_bank_name = $request->interim_deed_bank_name;
        $fpt->interim_deed_branch = $request->interim_deed_branch;
        $fpt->interim_deed_account_number = $request->interim_deed_account_number;
        $fpt->interim_deed_sort_code = $request->interim_deed_sort_code;
        $fpt->interim_deed_payment_ref = $request->interim_deed_payment_ref;
        $fpt->interim_deed_print_name = $request->interim_deed_print_name;
        $fpt->interim_deed_signature = $request->interim_deed_signature;
        $fpt->interim_deed_position = $request->interim_deed_position;
        $fpt->interim_deed_company_stamp = $request->interim_deed_company_stamp;
        $fpt->interim_deed_date_signed = $request->interim_deed_date_signed;
        $fpt->member_questionaire_title = $request->member_questionaire_title;
        $fpt->member_questionaire_forenames = $request->member_questionaire_forenames;
        $fpt->member_questionaire_surname = $request->member_questionaire_surname;
        $fpt->member_questionaire_previous_names = $request->member_questionaire_previous_names;
        $fpt->member_questionaire_address = $request->member_questionaire_address;
        $fpt->member_questionaire_county = $request->member_questionaire_county;
        $fpt->member_questionaire_postcode = $request->member_questionaire_postcode;
        $fpt->member_questionaire_time_at_address_years = $request->member_questionaire_time_at_address_years;
        $fpt->member_questionaire_time_at_address_months = $request->member_questionaire_time_at_address_months;
        $fpt->member_questionaire_previous_address = $request->member_questionaire_previous_address;
        $fpt->member_questionaire_previous_county = $request->member_questionaire_previous_county;
        $fpt->member_questionaire_previous_postcode = $request->member_questionaire_previous_postcode;
        $fpt->member_questionaire_telephone_number = $request->member_questionaire_telephone_number;
        $fpt->member_questionaire_email_address = $request->member_questionaire_email_address;
        $fpt->member_questionaire_national_insurance_number = $request->member_questionaire_national_insurance_number;
        $fpt->member_questionaire_taxpayer_reference = $request->member_questionaire_taxpayer_reference;
        $fpt->member_questionaire_occupation = $request->member_questionaire_occupation;
        $fpt->member_questionaire_employer_name = $request->member_questionaire_employer_name;
        $fpt->member_questionaire_dob_day = $request->member_questionaire_dob_day;
        $fpt->member_questionaire_gender = $request->member_questionaire_gender;
        $fpt->member_questionaire_nationality = $request->member_questionaire_nationality;
        $fpt->member_questionaire_marital_status = $request->member_questionaire_marital_status;
        $fpt->member_questionaire_employment_status = $request->member_questionaire_employment_status;
        $fpt->member_questionaire_current_occupation = $request->member_questionaire_current_occupation;
        $fpt->member_questionaire_job_title = $request->member_questionaire_job_title;
        $fpt->member_questionaire_opted_out = $request->member_questionaire_opted_out;
        $fpt->member_questionaire_protection = $request->member_questionaire_protection;
        $fpt->member_questionaire_primary_protection = $request->member_questionaire_primary_protection;
        $fpt->member_questionaire_lump_sum_protection = $request->member_questionaire_lump_sum_protection;
        $fpt->member_questionaire_mpaa = $request->member_questionaire_mpaa;
        $fpt->member_questionaire_mpaa_day = $request->member_questionaire_mpaa_day;
        $fpt->entitlement_tax_relief_option = $request->entitlement_tax_relief_option;
        $fpt->financial_que_adviser_same = $request->financial_que_adviser_same;
        $fpt->financial_que_contact_name = $request->financial_que_contact_name;
        $fpt->financial_que_company_name = $request->financial_que_company_name;
        $fpt->financial_que_address = $request->financial_que_address;
        $fpt->financial_que_country = $request->financial_que_country;
        $fpt->financial_que_postcode = $request->financial_que_postcode;
        $fpt->financial_que_telephone_number = $request->financial_que_telephone_number;
        $fpt->financial_que_email_address = $request->financial_que_email_address;
        $fpt->financial_que_regulated_by = $request->financial_que_regulated_by;
        $fpt->financial_que_authorisation_number = $request->financial_que_authorisation_number;
        $fpt->financial_que_network_name = $request->financial_que_network_name;
        $fpt->financial_que_network_regulated_by = $request->financial_que_network_regulated_by;
        $fpt->financial_que_company_authorisation_number = $request->financial_que_company_authorisation_number;
        $fpt->fund_common_investment_1 = $request->fund_common_investment_1;
        $fpt->fund_investment_1 = $request->fund_investment_1;
        $fpt->fund_common_investment_2 = $request->fund_common_investment_2;
        $fpt->fund_investment_2 = $request->fund_investment_2;
        $fpt->fund_additional_details = $request->fund_additional_details;
        $fpt->members_fund_investment_1 = $request->members_fund_investment_1;
        $fpt->members_fund_investment_2 = $request->members_fund_investment_2;
        $fpt->members_fund_investment_3 = $request->members_fund_investment_3;
        $fpt->members_fund_investment_4 = $request->members_fund_investment_4;
        $fpt->nomination_beneficiary_1_name = $request->nomination_beneficiary_1_name;
        $fpt->nomination_beneficiary_1_relationship = $request->nomination_beneficiary_1_relationship;
        $fpt->nomination_beneficiary_1_percentage = $request->nomination_beneficiary_1_percentage;
        $fpt->nomination_beneficiary_2_name = $request->nomination_beneficiary_2_name;
        $fpt->nomination_beneficiary_2_relationship = $request->nomination_beneficiary_2_relationship;
        $fpt->nomination_beneficiary_2_percentage = $request->nomination_beneficiary_2_percentage;
        $fpt->nomination_beneficiary_3_name = $request->nomination_beneficiary_3_name;
        $fpt->nomination_beneficiary_3_relationship = $request->nomination_beneficiary_3_relationship;
        $fpt->nomination_beneficiary_3_percentage = $request->nomination_beneficiary_3_percentage;
        $fpt->nomination_charity_1_name = $request->nomination_charity_1_name;
        $fpt->nomination_charity_1_percentage = $request->nomination_charity_1_percentage;
        $fpt->nomination_charity_2_name = $request->nomination_charity_2_name;
        $fpt->nomination_charity_2_percentage = $request->nomination_charity_2_percentage;
        $fpt->nomination_charity_3_name = $request->nomination_charity_3_name;
        $fpt->nomination_charity_3_percentage = $request->nomination_charity_3_percentage;
        $fpt->personal_regular_contribution = $request->personal_regular_contribution;
        $fpt->personal_single_contribution = $request->personal_single_contribution;
        $fpt->personal_source_of_funds = $request->personal_source_of_funds;
        $fpt->personal_contribution_frequency = $request->personal_contribution_frequency;
        $fpt->personal_start_date_day = $request->personal_start_date_day;
        $fpt->personal_employer_pay = $request->personal_employer_pay;
        $fpt->questionaries_employer_name = $request->questionaries_employer_name;
        $fpt->questionaries_registered_address = $request->questionaries_registered_address;
        $fpt->questionaries_country = $request->questionaries_country;
        $fpt->questionaries_postcode = $request->questionaries_postcode;
        $fpt->questionaries_telephone_number = $request->questionaries_telephone_number;
        $fpt->questionaries_email_address = $request->questionaries_email_address;
        $fpt->questionaries_trading_address = $request->questionaries_trading_address;
        $fpt->questionaries_trading_country = $request->questionaries_trading_country;
        $fpt->questionaries_trading_postcode = $request->questionaries_trading_postcode;
        $fpt->questionaries_employer_status = $request->questionaries_employer_status;
        $fpt->questionaries_nature_of_business = $request->questionaries_nature_of_business;
        $fpt->questionaries_employer_year_end_day = $request->questionaries_employer_year_end_day;
        $fpt->questionaries_registration_number = $request->questionaries_registration_number;
        $fpt->questionaries_employed_since_day = $request->questionaries_employed_since_day;
        $fpt->questionaries_director_status = $request->questionaries_director_status;
        $fpt->questionaries_shareholdings = $request->questionaries_shareholdings;
        $fpt->emp_contr_regular_contribution = $request->emp_contr_regular_contribution;
        $fpt->emp_contr_single_contribution = $request->emp_contr_single_contribution;
        $fpt->emp_contr_frequency = $request->emp_contr_frequency;
        $fpt->emp_contr_day = $request->emp_contr_day;
        $fpt->empl_dec_print_name = $request->empl_dec_print_name;
        $fpt->empl_dec_position = $request->empl_dec_position;
        $fpt->empl_dec_day = $request->empl_dec_day;
        $fpt->transf_auth_print_name = $request->transf_auth_print_name;
        $fpt->transf_auth_plan_scheme_no = $request->transf_auth_plan_scheme_no;
        $fpt->transf_auth_day = $request->transf_auth_day;
        $fpt->trans_plan_member_name = $request->trans_plan_member_name;
        $fpt->trans_plan_telephone_number = $request->trans_plan_telephone_number;
        $fpt->trans_plan_email_address = $request->trans_plan_email_address;
        $fpt->trans_plan_transfer_scheme_type = $request->trans_plan_transfer_scheme_type;
        $fpt->trans_plan_address = $request->trans_plan_address;
        $fpt->trans_plan_postcode = $request->trans_plan_postcode;
        $fpt->trans_plan_country = $request->trans_plan_country;
        $fpt->trans_plan_scheme_type = $request->trans_plan_scheme_type;
        $fpt->trans_plan_plan_scheme_name = $request->trans_plan_plan_scheme_name;
        $fpt->trans_plan_scheme_number = $request->trans_plan_scheme_number;
        $fpt->trans_plan_reference = $request->trans_plan_reference;
        $fpt->trans_plan_value_of_fund = $request->trans_plan_value_of_fund;
        $fpt->trans_plan_wish_transfer = $request->trans_plan_wish_transfer;
        $fpt->trans_plan_important_to_transfer = $request->trans_plan_important_to_transfer;
        $fpt->trans_plan_existing_scheme = $request->trans_plan_existing_scheme;
        $fpt->trans_plan_block_transfer = $request->trans_plan_block_transfer;
        $fpt->member_consent_contact_me = $request->member_consent_contact_me;
        $fpt->member_consent_pass_contact = $request->member_consent_pass_contact;
        $fpt->member_consent_prefer_email = $request->member_consent_prefer_email;
        $fpt->member_consent_prefer_post = $request->member_consent_prefer_post;
        $fpt->member_consent_print_name = $request->member_consent_print_name;
        $fpt->member_consent_date_day = $request->member_consent_date_day;
        $fpt->date_alternative2 = $request->date_alternative2;
        $fpt->member_declra_waive_rights = $request->member_declra_waive_rights;
        $fpt->member_declra_responsibility_declaration = $request->member_declra_responsibility_declaration;
        $fpt->member_declra_confirm_information = $request->member_declra_confirm_information;
        $fpt->member_declra_notify_information = $request->member_declra_notify_information;
        $fpt->member_declra_consent_declaration = $request->member_declra_consent_declaration;
        $fpt->member_declra_print_name = $request->member_declra_print_name;
        $fpt->member_declra_date_day = $request->member_declra_date_day;
        $fpt->member_declra_waive_cancellation_rights = $request->member_declra_waive_cancellation_rights;
        $fpt->member_declra_parental_responsibility = $request->member_declra_parental_responsibility;
        $fpt->notes = $request->notes;
        
        $fpt->signature_left1 = $request->signature_left1;
        $fpt->signature_right1 = $request->signature_right1;
        $fpt->signature_left2 = $request->signature_left2;
        $fpt->signature_right2 = $request->signature_right2;
        $fpt->signature_left_additional = $request->signature_left_additional;
        $fpt->signature_1 = $request->signature_1;
        $fpt->signature_2 = $request->signature_2;
        $fpt->signature_left = $request->signature_left;
        $fpt->signature_right = $request->signature_right;
        $fpt->signature = $request->signature;
        $fpt->empl_dec_signature = $request->empl_dec_signature;
        $fpt->transf_auth_signature = $request->transf_auth_signature;
        $fpt->member_consent_signature = $request->member_consent_signature;
        $fpt->member_declra_signature = $request->member_declra_signature;


        if ($request->hasFile('signature_file')) {
            $file = $request->file('signature_file');
            $request->validate([
                'signature_file' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_left1) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_left1))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_left1));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_left1 = '/storage/app/public/' . $filePath;
        }

        elseif ($request->signature_left1) {
            $signatureData = $request->signature_left1;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_left1) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_left1))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_left1));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_left1 = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file1')) {
            $file = $request->file('signature_file1');
            $request->validate([
                'signature_file1' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_right1) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_right1))) {
            Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_right1));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_right1 = '/storage/app/public/' . $filePath;
        }

        elseif ($request->signature_right1) {
            $signatureData = $request->signature_right1;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_right1) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_right1))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_right1));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_right1 = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file2')) {
            $file = $request->file('signature_file2');
            $request->validate([
                'signature_file2' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_left2) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_left2))) {
            Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_left2));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_left2 = '/storage/app/public/' . $filePath;
        }

        elseif ($request->signature_left2) {
            $signatureData = $request->signature_left2;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_left2) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_left2))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_left2));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_left2 = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file3')) {
            $file = $request->file('signature_file3');
            $request->validate([
                'signature_file3' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_right2) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_right2))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_right2));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_right2 = '/storage/app/public/' . $filePath;
        }

        elseif ($request->signature_right2) {
            $signatureData = $request->signature_right2;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_right2) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_right2))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_right2));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_right2 = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file4')) {
            $file = $request->file('signature_file4');
            $request->validate([
                'signature_file4' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_left_additional) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_left_additional))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_left_additional));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_left_additional = '/storage/app/public/' . $filePath;
        }

        elseif ($request->signature_left_additional) {
            $signatureData = $request->signature_left_additional;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_left_additional) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_left_additional))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_left_additional));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_left_additional = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file5')) {
            $file = $request->file('signature_file5');
            $request->validate([
                'signature_file5' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_1) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_1))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_1));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_1 = '/storage/app/public/' . $filePath;
        }

        elseif ($request->signature_1) {
            $signatureData = $request->signature_1;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_1) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_1))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_1));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_1 = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file6')) {
            $file = $request->file('signature_file6');
            $request->validate([
                'signature_file6' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_2) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_2))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_2));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_2 = '/storage/app/public/' . $filePath;
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
            if (!empty($fpt->signature_2) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_2))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_2));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_2 = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file7')) {
            $file = $request->file('signature_file7');
            $request->validate([
                'signature_file7' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_left) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_left))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_left));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_left = '/storage/app/public/' . $filePath;
        }

        elseif ($request->signature_left) {
            $signatureData = $request->signature_left;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_left) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_left))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_left));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_left = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file8')) {
            $file = $request->file('signature_file8');
            $request->validate([
                'signature_file8' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_right) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_right))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_right));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_right = '/storage/app/public/' . $filePath;
        }

        elseif ($request->signature_right) {
            $signatureData = $request->signature_right;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_right) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_right))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_right));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_right = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file9')) {
            $file = $request->file('signature_file9');
            $request->validate([
                'signature_file9' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature = '/storage/app/public/' . $filePath;
        }

        elseif ($request->signature) {
            $signatureData = $request->signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file10')) {
            $file = $request->file('signature_file10');
            $request->validate([
                'signature_file10' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->empl_dec_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->empl_dec_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->empl_dec_signature));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->empl_dec_signature = '/storage/app/public/' . $filePath;
        }

        elseif ($request->empl_dec_signature) {
            $signatureData = $request->empl_dec_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));

            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->empl_dec_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->empl_dec_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->empl_dec_signature));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->empl_dec_signature = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file11')) {
            $file = $request->file('signature_file11');
            $request->validate([
                'signature_file11' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->transf_auth_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->transf_auth_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->transf_auth_signature));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->transf_auth_signature = '/storage/app/public/' . $filePath;
        }

        elseif ($request->transf_auth_signature) {
            $signatureData = $request->transf_auth_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->transf_auth_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->transf_auth_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->transf_auth_signature));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->transf_auth_signature = '/storage/app/public/signatures/' . $fileName;
        }

        if ($request->hasFile('signature_file12')) {
            $file = $request->file('signature_file12');
            $request->validate([
                'signature_file12' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->member_consent_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->member_consent_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->member_consent_signature));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->member_consent_signature = '/storage/app/public/' . $filePath;
        }

        elseif ($request->member_consent_signature) {
            $signatureData = $request->member_consent_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->member_consent_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->member_consent_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->member_consent_signature));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->member_consent_signature = '/storage/app/public/signatures/' . $fileName;
        }
        if ($request->hasFile('signature_file13')) {
            $file = $request->file('signature_file13');
            $request->validate([
                'signature_file13' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
        if (!empty($fpt->member_declra_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->member_declra_signature))) {
            Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->member_declra_signature));
        }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->member_declra_signature = '/storage/app/public/' . $filePath;
        }
        
        elseif ($request->member_declra_signature) {
            $signatureData = $request->member_declra_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->member_declra_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->member_declra_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->member_declra_signature));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->member_declra_signature = '/storage/app/public/signatures/' . $fileName;
        }
        
        $fpt->update();
        return back()->with('success', 'FPT updated successfully.');
    }
    
    public function destroy($id) {
        $fpt = Fpt::find($id);
        if ($fpt) {
            $fpt->delete();
            $log = new Log;
            $log->user_id = auth()->user()->id;
            $log->text = auth()->user()->name . ' deleted the fpt member application';
            $log->save();
            return redirect()->back()->with('success', 'Fpt deleted successfully.');
        }
        return redirect()->back()->with('error', 'Fpt not found.');
    }

    public function deleted() {
        $deletedFpt = Fpt::onlyTrashed()->get();
        return view('dashboard.fpt.DeletedFpt', compact('deletedFpt'));
    }

    public function changefptstatus($id,$status) {
        $offfpt = Fpt::find($id);
        $offfpt->status = $status;
        $offfpt->save();
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . ' changed the fpt member application status';
        $log->save();
        return redirect()->back();
    }
    
    public function restoreFpt($id) {
        $fpt = Fpt::withTrashed()->find($id);
        if ($fpt) {
            $fpt->restore();
            $log = new Log;
            $log->user_id = auth()->user()->id;
            $log->text = auth()->user()->name . ' restore the fpt member application';
            $log->save();
            return redirect()->back()->with('success', 'FPT member restored successfully');
        }
        return redirect()->back()->with('error', 'FPT member not found');
    }

    public function viewstatuschange($id, $status) {
        $offfpt = Fpt::find($id);
        if ($offfpt) {
            $offfpt->status = $status;
            $offfpt->save();
            if($offfpt->status == 'active'){
                $user = User::find($offfpt->user_id);
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
            $log->text = auth()->user()->name . ' changed the fpt member application status';
            $log->save();
            return redirect()->back()->with('success', "FPT status updated to {$status} successfully!");
        }
        return redirect()->back()->with('error', 'FPT status update failed!');
    }
    
 public function fptsign(Request $request, $id){
    $member = Fpt::find($id);
        
    if ($request->hasFile('signature_file')) {
        $file = $request->file('signature_file');
        $request->validate([
            'signature_file' => 'mimes:jpg,jpeg,png,pdf|max:2048'
        ]);
        $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('signatures', $fileName, 'public');
        $member->fpt_signature = '/storage/app/public/' . $filePath;
        $member->save();
    }
    
    elseif($request->signature_1) {
        $signatureData = $request->signature_1;
        if (strpos($signatureData, 'data:image/png;base64,') === 0) {
            $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
        }
        $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
        if ($signatureImage === false) {
            return back()->with('error', 'Invalid signature image format.');
        }
        $fileName = 'signature_' . uniqid() . '.png';
        Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
        $member->fpt_signature = '/storage/app/public/signatures/' . $fileName;
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
            <p><a href='https://www.alltrust.co.uk/alltrustonline/view-fpt/{$member->id}' target='_blank' style='color: #007bff; text-decoration: none;'>View Application</a></p>
            <p>Please liaise with the adviser and/or member directly with any questions or clarity required to complete the review process.</p>
            <p>Best regards,<br>The Alltrust Team</p>
        </div>
    ";

    Mail::to($userEmail)->send(new SimpleMail($messageContent));
    
    $log = new Log;
    $log->user_id = auth()->user()->id;
    $log->text = auth()->user()->name . ' signed the fpt member application';
    $log->save();
    
    return redirect()->back();
    }
}