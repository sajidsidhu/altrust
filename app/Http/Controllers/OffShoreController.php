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
use Carbon\Carbon;

use Illuminate\Http\Request;

class OffShoreController extends Controller {

    public function startoffshore() {
        return view('dashboard.adviser.Startoffshore');
    }

    public function create() {
        return view('dashboard.adviser.offshoreCreate');
    }

    public function country_store(Request $request) {
        $id = $request->id;
        $userData = OffShore::find($id);
        $userData->admin_country = json_encode($request->admin_country);
        $userData->save();
        return redirect()->back();
    }

    public function store(Request $request) {
        $userData = new Offshore();
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
            $userData->signature_1 = '/storage/app/public/' . $filePath;
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
        $userData->full_name_2 = $request->full_name_2;
        $userData->position_2 = $request->position_2;
        
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $request->validate([
                'file_upload' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $userData->signature_2 = '/storage/app/public/' . $filePath;
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
            $userData->approval_signature = '/storage/app/public/' . $filePath;
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
        $preapprove = User::find(auth()->user()->id);
            
        // if ($preapprove->email_notification === 'yes') {
        //     $username = $preapprove->name;
        //     $userEmail = $preapprove->email;
        
        //     $messageContent = "
        //         <div style='font-family: Arial, sans-serif; line-height: 1.6; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px;'>
        //             <h2 style='color: #333;'>Confirmation of Your Alltrust Terms of Business Application</h2>
        //             <p>Dear {$username},</p>
        //             <p>Thank you for completing our Terms of Business application.</p>
        //             <p>Our team is currently reviewing your application to ensure everything is in order. Should we require any additional information or clarification, someone from our team will contact you shortly.</p>
        //             <p>In the meantime, if you have any questions or need assistance, please contact us at <a href='' style='color: #007bff; text-decoration: none;'>newbusiness@alltrust.co.uk</a>.</p>
        //             <p>We value your partnership and look forward to working with you.</p>
        //             <p>Warm regards,<br>The Alltrust Team</p>
        //         </div>
        //     ";
        
        //     Mail::to($userEmail)->send(new SimpleMail($messageContent));
        // }

        // $username = 'Alltrust Business Team';
        // $userEmail = 'newbusiness@alltrust.co.uk';
    
        // $messageContent = "
        //     <div style='font-family: Arial, sans-serif; line-height: 1.6; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px;'>
        //         <h2 style='color: #333;'>Adviser Terms Submission Alert</h2>
        //         <p>Dear {$username},</p>
        //         <p>We have received a new Terms application via the online portal. Please review the details at your earliest convenience.</p>
        //         <p>To access the application, click the link below:</p>
        //         <p><a href='https://www.alltrust.co.uk/alltrustonline/newAdviser-show/{$userData->id}' target='_blank' style='color: #007bff; text-decoration: none;'>View Application</a></p>
        //         <p>Please liaise with the advisory firm or adviser directly with any questions or clarity required to complete the review process.</p>
        //         <p>Best regards,<br>The Alltrust Team</p>
        //     </div>

        // ";
        // Mail::to($userEmail)->send(new SimpleMail($messageContent));

        if ($userData->status === 'pending') {
            return redirect()->back()->with('success', 'Thank you for submitting your application. A member of our team will be in contact with you shortly.');
        } else {
            return redirect()->back()->with('success', 'Offshore Added successfully.');
        }
        return redirect->back()->with('success','Offshore Added Successsfully...');
    }

    public function editoffshore($id) {
        $display = Offshore::find($id);
        return view('dashboard.adviser.editOffshore', compact('display'));
    }

    public function updateoffshore(Request $request,$id) {
        $adviser = Offshore::find($id);
        $adviser->company_name = $request->company_name;
        $adviser->trading_as = $request->trading_as;
        $adviser->type = $request->type;
        $adviser->other_details = $request->other_details;
        $adviser->main_contact = $request->main_contact;
        $adviser->additional_details = $request->additional_details;
        $adviser->surname_surname = $request->surname_surname;
        $adviser->forename = $request->forename;
        $adviser->previous_names = $request->previous_names;
        $adviser->registered_address = $request->registered_address;
        $adviser->registered_country = $request->registered_country;
        $adviser->registered_post_code = $request->registered_post_code;
        $adviser->physical_address = $request->physical_address;
        $adviser->physical_country = $request->physical_country;
        $adviser->physical_post_code = $request->physical_post_code;
        $adviser->office_number = $request->office_number;
        $adviser->direct_line = $request->direct_line;
        $adviser->mobile_number = $request->mobile_number;
        $adviser->email_address = $request->email_address;
        $adviser->website = $request->website;
        $adviser->financial_adviser = $request->financial_adviser;
        $adviser->insurance_broker = $request->insurance_broker;
        $adviser->asset_manager = $request->asset_manager;
        $adviser->accountant = $request->accountant;
        $adviser->tax_adviser = $request->tax_adviser;
        $adviser->lawyer = $request->lawyer;
        $adviser->other_business_activity = $request->other_business_activity;
        $adviser->other_business_specify = $request->other_business_specify;
        $adviser->licensing_body = $request->licensing_body;
        $adviser->licensing_reference = $request->licensing_reference;
        $adviser->restrictions = $request->restrictions;
        $adviser->restrictions_imposed = $request->restrictions_imposed;
        $adviser->insurance = $request->insurance;
        $adviser->investment = $request->investment;
        $adviser->regulatory_visit = $request->regulatory_visit;
        $adviser->date_follow = $request->date_follow;
        $adviser->areas_review = $request->areas_review;
        $adviser->highlighted_review = $request->highlighted_review;
        $adviser->percentage_breakdown = $request->percentage_breakdown;
        $adviser->professional_indemnity = $request->professional_indemnity;
        $adviser->cyber_insurance = $request->cyber_insurance;
        $adviser->face_to_face = $request->face_to_face;
        $adviser->non_face_policy = $request->non_face_policy;
        $adviser->high_risk = $request->high_risk;
        $adviser->standard_risk = $request->standard_risk;
        $adviser->low_risk = $request->low_risk;
        $adviser->sanctioned = $request->sanctioned;
        $adviser->refer = $request->refer;
        $adviser->client_risk = $request->client_risk;
        $adviser->kyc_revisit = $request->kyc_revisit;
        $adviser->accept_peps = $request->accept_peps;
        $adviser->pep_policy = $request->pep_policy;
        $adviser->due_diligence = $request->due_diligence;
        $adviser->provide_details = $request->provide_details;
        $adviser->collectDetails = $request->collectDetails;
        $adviser->writtenPolicies = $request->writtenPolicies;
        $adviser->reviewDocuments = $request->reviewDocuments;
        $adviser->updatedDocuments = $request->updatedDocuments;
        $adviser->amlPolicies = $request->amlPolicies;
        $adviser->trainingFrequency = $request->trainingFrequency;
        $adviser->internalCompliance = $request->internalCompliance;
        $adviser->complianceApproval = $request->complianceApproval;
        $adviser->complianceComments = $request->complianceComments;
        $adviser->countryLists_highRisk = $request->countryLists_highRisk;
        $adviser->countryLists_fatf = $request->countryLists_fatf;
        $adviser->countryLists_sanctioned = $request->countryLists_sanctioned;
        $adviser->countryLists_corruption = $request->countryLists_corruption;
        $adviser->countryLists_complianceAlert = $request->countryLists_complianceAlert;
        $adviser->countryLists_drugTrafficking = $request->countryLists_drugTrafficking;
        $adviser->additionalComments = $request->additionalComments;
        $adviser->screenSystems = $request->screenSystems;
        $adviser->identifyHighRisk = $request->identifyHighRisk;
        $adviser->recordDetails_intended = $request->recordDetails_intended;
        $adviser->recordDetails_expected = $request->recordDetails_expected;
        $adviser->recordDetails_perTransaction = $request->recordDetails_perTransaction;
        $adviser->yes_details = $request->yes_details;
        $adviser->risk_assessment = $request->risk_assessment;
        $adviser->risk_details = $request->risk_details;
        $adviser->client_fee_structure = $request->client_fee_structure;
        $adviser->investment_products = $request->investment_products;
        $adviser->products_details = $request->products_details;
        $adviser->platform_WRAP = $request->platform_WRAP;
        $adviser->funds_platform = $request->funds_platform;
        $adviser->market_investments = $request->market_investments;
        $adviser->restricted_mass = $request->restricted_mass;
        $adviser->advisory_stockbroker = $request->advisory_stockbroker;
        $adviser->model_portfolios = $request->model_portfolios;
        $adviser->investments_defined = $request->investments_defined;
        $adviser->structured_deposits = $request->structured_deposits;
        $adviser->deposit_accounts = $request->deposit_accounts;
        $adviser->commercial_property = $request->commercial_property;
        $adviser->title = $request->title;
        $adviser->please_details = $request->please_details;
        $adviser->surname = $request->surname;
        $adviser->forenames = $request->forenames;
        $adviser->profession = $request->profession;
        $adviser->qualifications = $request->qualifications;
        $adviser->certifiers_address = $request->certifiers_address;
        $adviser->country = $request->country;
        $adviser->post_code = $request->post_code;
        $adviser->full_name_1 = $request->full_name_1;
        $adviser->position_1 = $request->position_1;
        $adviser->signature_1 = $request->signature_1;
        
        if ($request->hasFile('signature_file')) {
            if ($adviser->signature_1) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $adviser->signature_1));
            }
            $file = $request->file('signature_file');
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $adviser->signature_1 = '/storage/app/public/' . $filePath;
        }

        elseif ($request->input('signature_1')) {
            $signatureData = $request->input('signature_1');
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode($signatureData);
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if ($adviser->signature_1) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $adviser->signature_1));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $adviser->signature_1 = '/storage/app/public/signatures/' . $fileName;
        }

        $adviser->date_signed_1 = $request->date_signed_1;
        $adviser->full_name_2 = $request->full_name_2;
        $adviser->position_2 = $request->position_2;
        $adviser->signature_2 = $request->signature_2;

        if ($adviser->signature_2) {
            $oldSignaturePath = str_replace('/storage/app/public/', '', $adviser->signature_2);
            Storage::disk('public')->delete($oldSignaturePath);
        }
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $request->validate([
                'file_upload' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $adviser->signature_2 = '/storage/app/public/' . $filePath;
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
            $adviser->signature_2 = '/storage/app/public/signatures/' . $fileName;
        } else {
            return back()->with('error', 'No signature provided.');
        }

        $adviser->date_signed_2 = $request->date_signed_2;
        $adviser->date_received = $request->date_received;
        $adviser->date_approved = $request->date_approved;
        $adviser->approved_by = $request->approved_by;
        $adviser->approval_signature = $request->approval_signature;
        $url = $request->old;

        if ($request->hasFile('approval_signature')) {
            $file = $request->approval_signature;
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('documents', $fileName, 'public');
            $url = url('/storage/app/public/' . $path);
        }
        $adviser->approval_signature = $url;
        if ($request->hasFile('company_structure_chart')) {
            $file = $request->file('company_structure_chart');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('documents', $fileName, 'public');
            $company_chart_url = asset('/storage/app/public/' . $path);
            $adviser->company_structure_chart = $company_chart_url;
        }
        if ($request->hasFile('company_register_shareholder')) {
            $file = $request->file('company_register_shareholder');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('documents', $fileName, 'public');
            $company_shareholder_url = asset('/storage/app/public/' . $path);
            $adviser->company_register_shareholder = $company_shareholder_url;
        }
                
        if ($request->hasFile('company_authorised_signatory')) {
            $file = $request->file('company_authorised_signatory');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('documents', $fileName, 'public');
            $company_authorised_url = asset('/storage/app/public/' . $path);
            $adviser->company_authorised_signatory = $company_authorised_url;
        }
        $jsonUrls = $request->old;
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
        $adviser->update();
        return redirect()->back();
    }

    public function offshoredelete($id) {
        $adviser = Offshore::find($id);
        if ($adviser) {
            $adviser->delete();
            return redirect()->back()->with('success', 'Adviser deleted successfully.');
        }
        return redirect()->back()->with('error', 'Adviser not found.');
    }

    public function deleted() {
        $deletedAdvisers = Offshore::onlyTrashed()->get();
        return view('dashboard.adviser.offshoreadviser.deletedoffshore', compact('deletedAdvisers'));
    }

    public function offshoreview($id) {
        $data = Offshore::find($id);
        return view('dashboard.adviser.viewoffshore',compact('data'));
    }

    public function offshoreStatusChange($id,$status){
        $offadviser = Offshore::find($id);
        $offadviser->status = $status;
        $offadviser->save();
        if($offadviser->status = 'active'){
            $user = User::find($offadviser->creater_id); 
            $user->role = 'advisor_firm';
            $user->user_management_check = 'user_management_check';
            $user->save();
            $username = $user->name;
            $userEmail = $user->email;
            $messageContent = "
                <div style='font-family: Arial, sans-serif; line-height: 1.6; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px;'>
                    <h2 style='color: #333;'>Confirmation of Your Alltrust Terms of Business Application</h2>
                    <p>Dear {$username},</p>
                    <p>Thank you for completing our Terms of Business application.</p>
                    <p>We have reviewed your application, and it has been approved.</p>
                    <p>In the meantime, if you have any questions or need assistance, please contact us at 
                    <a href='mailto:newbusiness@alltrust.co.uk' style='color: #007bff; text-decoration: none;'>newbusiness@alltrust.co.uk</a>.</p>
                    <p>We value your partnership and look forward to working with you.</p>
                    <p>Warm regards,<br>The Alltrust Team</p>
                </div>
            ";
            Mail::to($userEmail)->send(new SimpleMail($messageContent));
        }
        return redirect()->back();
    }

    public function existingStatus($id){
        $adviser = Offshore::find($id);
        if($adviser->status == 'active'){
        $adviser->status = 'pending';
        }else{
            $adviser->status = 'active';
        }
        $adviser->save();
        return redirect()->back();
    }
    
    public function restore($id) {
        $adviser = Offshore::onlyTrashed()->find($id);
        if ($adviser) {
            $adviser->restore();
            return redirect()->back()->with('success', 'Offset restored successfully.');
        }
        return redirect()->back()->with('error', 'Adviser not found.');
    }

    public function flagoffshore($id) {
        $adviser = Offshore::find($id);
        if ($adviser) {
            $adviser->flag = ($adviser->flag == 'yes') ? 'no' : 'yes';
            $adviser->save();
        }
        return redirect()->back();
    }
}