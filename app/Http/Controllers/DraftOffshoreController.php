<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Mail\SimpleMail;
use App\Models\Offshore;
use App\Models\Advisers;
use App\Models\User;
use App\Models\DraftOffshore;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DraftOffshoreController extends Controller
{
    
    public function draftOffshore(Request $request) {
        $userData = new DraftOffshore();
        $userData->company_name = $request->company_name;
        $userData->creater_id = auth()->user()->id; 
        $userData->trading_as = $request->trading_as;
        $userData->type = $request->type;
        $userData->other_details = $request->other_details;
        $userData->main_contact = $request->main_contact;
        $userData->additional_details = $request->additional_details;
        $userData->surname_surname = $request->surname_surname;
        $userData->forename = $request->forename;
        $userData->previous_names = $request->previous_names;
        $userData->registered_address = $request->registered_address;
        $userData->registered_country = $request->registered_country;
        $userData->registered_post_code = $request->registered_post_code;
        $userData->physical_address = $request->physical_address;
        $userData->physical_country = $request->physical_country;
        $userData->physical_post_code = $request->physical_post_code;
        $userData->office_number = $request->office_number;
        $userData->direct_line = $request->direct_line;
        $userData->mobile_number = $request->mobile_number;
        $userData->email_address = $request->email_address;
        $userData->website = $request->website;
        $userData->financial_adviser = $request->financial_adviser;
        $userData->insurance_broker = $request->insurance_broker;
        $userData->asset_manager = $request->asset_manager;
        $userData->accountant = $request->accountant;
        $userData->tax_adviser = $request->tax_adviser;
        $userData->lawyer = $request->lawyer;
        $userData->other_business_activity = $request->other_business_activity;
        $userData->other_business_specify = $request->other_business_specify;
        $userData->licensing_body = $request->licensing_body;
        $userData->licensing_reference = $request->licensing_reference;
        $userData->restrictions = $request->restrictions;
        $userData->restrictions_imposed = $request->restrictions_imposed;
        $userData->insurance = $request->insurance;
        $userData->investment = $request->investment;
        $userData->regulatory_visit = $request->regulatory_visit;
        $userData->date_follow = $request->date_follow;
        $userData->areas_review = $request->areas_review;
        $userData->highlighted_review = $request->highlighted_review;
        $userData->percentage_breakdown = $request->percentage_breakdown;
        $userData->professional_indemnity = $request->professional_indemnity;
        $userData->cyber_insurance = $request->cyber_insurance;
        $userData->face_to_face = $request->face_to_face;
        $userData->non_face_policy = $request->non_face_policy;
        $userData->high_risk = $request->high_risk;
        $userData->standard_risk = $request->standard_risk;
        $userData->low_risk = $request->low_risk;
        $userData->sanctioned = $request->sanctioned;
        $userData->refer = $request->refer;
        $userData->client_risk = $request->client_risk;
        $userData->kyc_revisit = $request->kyc_revisit;
        $userData->accept_peps = $request->accept_peps;
        $userData->pep_policy = $request->pep_policy;
        $userData->due_diligence = $request->due_diligence;
        $userData->provide_details = $request->provide_details;
        $userData->collectDetails = $request->collectDetails;
        $userData->writtenPolicies = $request->writtenPolicies;
        $userData->reviewDocuments = $request->reviewDocuments;
        $userData->updatedDocuments = $request->updatedDocuments;
        $userData->amlPolicies = $request->amlPolicies;
        $userData->trainingFrequency = $request->trainingFrequency;
        $userData->internalCompliance = $request->internalCompliance;
        $userData->complianceApproval = $request->complianceApproval;
        $userData->complianceComments = $request->complianceComments;
        $userData->countryLists_highRisk = $request->countryLists_highRisk;
        $userData->countryLists_fatf = $request->countryLists_fatf;
        $userData->countryLists_sanctioned = $request->countryLists_sanctioned;
        $userData->countryLists_corruption = $request->countryLists_corruption;
        $userData->countryLists_complianceAlert = $request->countryLists_complianceAlert;
        $userData->countryLists_drugTrafficking = $request->countryLists_drugTrafficking;
        $userData->additionalComments = $request->additionalComments;
        $userData->screenSystems = $request->screenSystems;
        $userData->identifyHighRisk = $request->identifyHighRisk;
        $userData->recordDetails_intended = $request->recordDetails_intended;
        $userData->recordDetails_expected = $request->recordDetails_expected;
        $userData->recordDetails_perTransaction = $request->recordDetails_perTransaction;
        $userData->yes_details = $request->yes_details;
        $userData->risk_assessment = $request->risk_assessment;
        $userData->risk_details = $request->risk_details;
        $userData->client_fee_structure = $request->client_fee_structure;
        $userData->investment_products = $request->investment_products;
        $userData->products_details = $request->products_details;
        $userData->platform_WRAP = $request->platform_WRAP;
        $userData->funds_platform = $request->funds_platform;
        $userData->market_investments = $request->market_investments;
        $userData->restricted_mass = $request->restricted_mass;
        $userData->advisory_stockbroker = $request->advisory_stockbroker;
        $userData->model_portfolios = $request->model_portfolios;
        $userData->investments_defined = $request->investments_defined;
        $userData->structured_deposits = $request->structured_deposits;
        $userData->deposit_accounts = $request->deposit_accounts;
        $userData->commercial_property = $request->commercial_property;
        $userData->title = $request->title;
        $userData->please_details = $request->please_details;
        $userData->surname = $request->surname;
        $userData->forenames = $request->forenames;
        $userData->profession = $request->profession;
        $userData->qualifications = $request->qualifications;
        $userData->certifiers_address = $request->certifiers_address;
        $userData->country = $request->country;
        $userData->post_code = $request->post_code;
        $userData->full_name_1 = $request->full_name_1;
        $userData->position_1 = $request->position_1;
        
        if ($request->hasFile('signature_file')) {
            $file = $request->file('signature_file');
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $userData->signature_1 = '/storage/app/public/signatures/' . $filePath;
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
            $userData->signature_1 = '/storage/app/public/signatures/' . $fileName;
        }
        
        $userData->date_signed_1 = $request->date_signed_1;
        $userData->full_name_2 = $request->position_2;
        
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $request->validate([
                'file_upload' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $userData->signature_2 = '/storage/app/public/signatures/' . $filePath;
        }
        
        elseif ($request->filled('signature-2')) {
            $signatureData = $request->input('signature-2');
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $userData->signature_2 = '/storage/app/public/signatures/' . $fileName;
        }

        $userData->date_signed_2 = $request->date_signed_2;
        $userData->date_received = $request->date_received;
        $userData->date_approved = $request->date_approved;
        $userData->approved_by = $request->approved_by;
        
        if ($request->hasFile('file_uploaded')) {
            $request->validate([
                'file_uploaded' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $file = $request->file('file_uploaded');
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $userData->approval_signature = '/storage/app/public/signatures/' . $filePath;
        }
        
        elseif ($request->filled('approval-signature')) {
            $signatureData = $request->input('approval-signature');
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $userData->approval_signature = '/storage/app/public/signatures/' . $fileName;
        }
        
        $userData->status = 'pending';
            
        if ($request->hasFile('company_structure_chart')) {
            $file = $request->file('company_structure_chart');
            $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $path = $file->storeAs('documents', $fileName, 'public');
            $company_chart_url = asset('storage/app/public/' . $path);
            $userData->company_structure_chart = $company_chart_url;
        }
        
        if ($request->hasFile('company_register_shareholder')) {
            $file = $request->file('company_register_shareholder');
             $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $path = $file->storeAs('documents', $fileName, 'public');
            $company_shareholder_url = asset('storage/app/public/' . $path);
            $userData->company_register_shareholder = $company_shareholder_url;
        }
        
        if ($request->hasFile('company_authorised_signatory')) {
            $file = $request->file('company_authorised_signatory');
             $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $path = $file->storeAs('documents', $fileName, 'public');
            $company_authorised_url = asset('storage/app/public/' . $path);
            $userData->company_authorised_signatory = $company_authorised_url;
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
        
        $userData->adviser_multifiles = $jsonUrls;
        $userData->appointed_text = $request->appointed_text;
        $userData->save();
        return redirect()->back()->with('success', 'Your application has been saved as a draft. To continue, go to the menu and select Draft Applications.');
    }
    
    public function draftOffshore_continue(Request $request,$id) {
        $display = DraftOffshore::find($id);
        if ($display) {
            return view('dashboard.adviser.DraftOffshoreContinue', compact('display'));
        }
        return redirect()->back()->with('error', 'Record not found!');
    }
    
    public function draftOffshore_destroy($id) {
        $delete = DraftOffshore::find($id);
        if ($delete) {
            $delete->delete();
            return redirect()->back()->with('success', 'Record deleted successfully.');
        }
        return redirect()->back()->with('error', 'Record not found.');
    }
}