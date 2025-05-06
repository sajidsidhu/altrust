<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advisers;
use App\Models\Offshore;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\SimpleMail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Draft;
use App\Models\DraftOffshore;
use Illuminate\Support\Facades\Storage;


class DraftController extends Controller
{

    public function store(Request $request) {
        $adviser = new draft();
        $adviser->creater_id = auth()->user()->id;
        $adviser->company_name = $request->company_name;
        $adviser->trading_name = $request->trading_name;
        $adviser->address = $request->address;
        $adviser->country = $request->country;
        $adviser->post_code = $request->post_code;
        $adviser->share_holder_details = $request->share_holder_details;
        $adviser->regulated_adviser = $request->regulated_adviser;
        $adviser->contact_email = $request->contact_email;
        $adviser->website = $request->website;
        $adviser->telephone = $request->telephone;
        $adviser->fca_firms_reference = $request->fca_firms_reference;
        $adviser->directly_authorised_checked = $request->directly_authorised_checked;
        $adviser->appointed_representative_checked = $request->appointed_representative_checked;
        $adviser->principal_company_name = $request->principal_company_name;
        $adviser->their_frn = $request->their_frn;
        $adviser->advice = $request->advice;
        $adviser->provide_countries = $request->provide_countries;
        $adviser->hear_about_us = $request->hear_about_us;
        $adviser->word_of_referrals_checked = $request->word_of_referrals_checked;
        $adviser->lead_generation_checked = $request->lead_generation_checked;
        $adviser->marketing_checked = $request->marketing_checked;
        $adviser->other_specify_checked = $request->other_specify_checked;
        $adviser->other_specify = $request->other_specify;
        $adviser->restrictions_yes_permission = $request->restrictions_yes_permission;
        $adviser->restrictions_yes_permission_answer = $request->restrictions_yes_permission_answer;
        $adviser->sanctions = $request->sanctions;
        $adviser->sanctions_yes_answer = $request->sanctions_yes_answer;
        $adviser->connection_connection = $request->connection_connection;
        $adviser->connection_connection_yes_answer = $request->connection_connection_yes_answer;
        $adviser->professional_indemnity_insurance = $request->professional_indemnity_insurance;
        $adviser->policy_excess_DB = $request->policy_excess_DB;
        $adviser->other_money = $request->other_money;
        $adviser->separate_cyber_security = $request->separate_cyber_security;
        $adviser->permissions_for_advising = $request->permissions_for_advising;
        $adviser->initial_advice_fee = $request->initial_advice_fee;
        $adviser->going_annual_fee = $request->going_annual_fee;
        $adviser->house_portfolio_solutions = $request->house_portfolio_solutions;
        $adviser->receive_provider_commission = $request->receive_provider_commission;
        $adviser->investment_strategy = json_encode($request->investmentStrategy);
        $adviser->typical_investment_strategy = $request->typical_investment_strategy;
        $adviser->running_managing_portfolios = $request->running_managing_portfolios;
        $adviser->basis = $request->basis;
        $adviser->principal_company_name1 = $request->principal_company_name1;
        $adviser->principal_company_name2 = $request->principal_company_name2;
        $adviser->principal_company_name3 = $request->principal_company_name3;
        $adviser->principal_company_name4 = $request->principal_company_name4;
        $adviser->account_name = $request->account_name;
        $adviser->bank_name = $request->bank_name;
        $adviser->account_number = $request->account_number;
        $adviser->sort_code = $request->sort_code;
        $adviser->not_applicable = $request->not_applicable;
        $adviser->advisers_permitted = $request->advisers_permitted;
        $adviser->staff_supervisory_position = $request->staff_supervisory_position;
        $adviser->gold_standard = $request->gold_standard;
        $adviser->db_transfers_12_months = $request->db_transfers_12_months;
        $adviser->total_value_12_months = $request->total_value_12_months;
        $adviser->percentage_db_transfers_12_months = $request->percentage_db_transfers_12_months;
        $adviser->db_transfers_24_months = $request->db_transfers_24_months;
        $adviser->total_value_24_months = $request->total_value_24_months;
        $adviser->percentage_db_transfers_24_months = $request->percentage_db_transfers_24_months;
        $adviser->db_transfers_36_months = $request->db_transfers_36_months;
        $adviser->total_value_36_months = $request->total_value_36_months;
        $adviser->percentage_db_transfers_36_months = $request->percentage_db_transfers_36_months;
        $adviser->complaints_12_months = $request->complaints_12_months;
        $adviser->redress_cases_12_months = $request->redress_cases_12_months;
        $adviser->complaints_24_months = $request->complaints_24_months;
        $adviser->redress_cases_24_months = $request->redress_cases_24_months;
        $adviser->complaints_36_months = $request->complaints_36_months;
        $adviser->redress_cases_36_months = $request->redress_cases_36_months;
        $adviser->percentage_db_transfers = $request->percentage_db_transfers;
        $adviser->pension_specialist = $request->pension_specialist;
        $adviser->act_as_specialist = $request->act_as_specialist;
        $adviser->details_of_firms = $request->details_of_firms;
        $adviser->contact_name = $request->contact_name;
        $adviser->email_address = $request->email_address;
        $adviser->phone_number = $request->phone_number;
        $adviser->dial_code = $request->dial_code;
        $adviser->minimum_cetv = $request->minimum_cetv;
        $adviser->conduct_db_transfers = $request->conduct_db_transfers;
        $adviser->accept_insistent_clients = $request->accept_insistent_clients;
        $adviser->work_with_unregulated_firms = $request->work_with_unregulated_firms;
        $adviser->receive_referrals = $request->receive_referrals;
        $adviser->referral_details = $request->referral_details;
        $adviser->db_transfer_percentage = $request->db_transfer_percentage;
        $adviser->db_client_source = $request->db_client_source;
        $adviser->relationships_with_trustees = $request->relationships_with_trustees;
        $adviser->trustee_relationship_details = $request->trustee_relationship_details;
        $adviser->contingent_charging = $request->contingent_charging;
        $adviser->contingent_charging_details = $request->contingent_charging_details;
        $adviser->triage_service = $request->triage_service;
        $adviser->advice_fee = $request->advice_fee;
        $adviser->charging_structure_breakdown = $request->charging_structure_breakdown;
        $adviser->policies_coverage = $request->policies_coverage;
        $adviser->not_covered_details = $request->not_covered_details;
        $adviser->high_risk = $request->high_risk;
        $adviser->standard_risk = $request->standard_risk;
        $adviser->low_risk = $request->low_risk;
        $adviser->sensitive_jurisdictions = $request->sensitive_jurisdictions;
        $adviser->accept_peps = $request->accept_PEPs;
        $adviser->enhanced_due_diligence = $request->enhanced_due_diligence;
        $adviser->add_details_text = $request->add_details_text;
        $adviser->collect_source = $request->collect_source;
        $adviser->review_frequency = $request->review_frequency;
        $adviser->unregulated_firms = $request->unregulated_firms;
        $adviser->firms_details = $request->firms_details;
        $adviser->total_business_percentage = $request->total_business_percentage;
        $adviser->investments_introduced = $request->investments_introduced;
        $adviser->meet_client = $request->meet_client;
        $adviser->business_conducted = $request->business_conducted;
        $adviser->knowledgeable_investors = $request->knowledgeable_investors;
        $adviser->criteria_details = $request->criteria_details;
        $adviser->products_design = $request->products_design;
        $adviser->fair_value = $request->fair_value;
        $adviser->clear_communications = $request->clear_communications;
        $adviser->post_sales_support = $request->post_sales_support;
        $adviser->customer_understanding = $request->customer_understanding;
        $adviser->customer_adequate_controls = $request->customer_adequate_controls;
        $adviser->customer_evidence = $request->customer_evidence;
        $adviser->customer_had_licences = $request->customer_had_licences;
        
        if ($request->hasFile('signature_file')) {
            $file = $request->file('signature_file');
            $request->validate([
                'signature_file' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $adviser->signature_adviser = '/storage/app/public/' . $filePath;
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
            $adviser->signature_adviser = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $request->validate([
                'file_upload' => 'mimes:jpg,jpeg,png,pdf|max:2048' // Allow images & PDFs, max 2MB
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $adviser->signature_alltrust = '/storage/app/public/' . $filePath;
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
            $adviser->signature_alltrust = '/storage/app/public/signatures/' . $fileName;
        }
        
        $adviser->management_function = $request->management_function;
        $adviser->position_adviser = $request->position_adviser;
        $adviser->financial_adviser_number = $request->financial_adviser_number;
        
        if ($request->hasFile('company_structure_chart')) {
            $file = $request->file('company_structure_chart');
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $path = $file->storeAs('documents', $fileName, 'public');
            $company_chart_url = asset('storage/app/public/' . $path);
            $adviser->company_structure_chart = $company_chart_url;
        }
        
        if ($request->hasFile('company_register_shareholder')) {
            $file = $request->file('company_register_shareholder');
             $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $path = $file->storeAs('documents', $fileName, 'public');
            $company_shareholder_url = asset('storage/app/public/' . $path);
            $adviser->company_register_shareholder = $company_shareholder_url;
        }
        
        if ($request->hasFile('company_authorised_signatory')) {
            $file = $request->file('company_authorised_signatory');
             $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $path = $file->storeAs('documents', $fileName, 'public');
            $company_authorised_url = asset('storage/app/public/' . $path);
            $adviser->company_authorised_signatory = $company_authorised_url;
        }
        
        $jsonUrls = Null;
        
        if ($request->hasFile('adviser_multifiles')) {
            $urls = [];  
            foreach ($request->file('adviser_multifiles') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('documents', $fileName, 'public');
                $url = url('/storage/app/public/' . $path);
                $urls[] = $url;
            }
            $jsonUrls = json_encode($urls);
        }
    
        $adviser->adviser_multifiles = $jsonUrls;
        $adviser->appointed_text = $request->appointed_text;
        $adviser->date_column = $request->date;
        $adviser->position_alltrust = $request->position_alltrust;
        $adviser->date_column2 = $request->date_column2;
        $adviser->advisers = json_encode($request->adviser);
        $adviser->status = 'pending';
        $adviser->save();
        return redirect()->back()->with('success', 'Your application has been saved as a draft. To continue, go to the menu and select Draft Applications.');
    }
    
    public function draftOnshore() {
        $draftAdviser = Draft::where('creater_id', auth()->user()->id)->get();
        $offshore = DraftOffshore::where('creater_id', auth()->user()->id)->get();
        return view('dashboard.adviser.DraftOnshore', compact('draftAdviser', 'offshore'));
    }
    
    public function draftOnshore_continue(Request $request,$id) {
        $editAdviser = Draft::find($id);
        if ($editAdviser) {
            return view('dashboard.adviser.DraftContinue', compact('editAdviser'));
        }
        return redirect()->back()->with('error', 'Record not found!');
    }
    
    public function draftOnshore_destroy($id) {
        $delete = Draft::find($id);
        if ($delete) {
            $delete->delete();
            return redirect()->back()->with('success', 'Record deleted successfully.');
        }
        return redirect()->back()->with('error', 'Record not found.');
    }
}