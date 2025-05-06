@extends('dashboard.dashboard')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/lightgallery@2.5.0/css/lightgallery.min.css" rel="stylesheet">
<style>
   .lg-backdrop {
   z-index: 1000000;
   }
   .lg-outer {
   z-index: 010000000000000;
   }
   canvas {
   border: 2px solid black;
   width: 100%;
   height: 200px;
   }
</style>
<div class="authentication-wrapper authentication-cover authentication-bg">
   <div class="authentication-inner row">
      <div class="d-flex col-12 align-items-center justify-content-center authentication-bg p-5">
         <div class="col-12">
            <div id="multiStepsValidation" class="bs-stepper border-none shadow-none mt-5">
               <div class="bs-stepper-content px-0">
                  <form id="multiStepsForm" method="POST" action="{{ route('offshoreupdate', $data->id) }}" enctype="multipart/form-data">
                     @csrf
                     <div id="adviserDetails" class="content" style="display: block;">
                        <h3>Introducer Details</h3>
                        <div class="mb-3">
                           <label for="company-name" class="form-label">Company Name</label>
                           <input type="text" id="company-name" name="company_name" value="{{ $data->company_name }}" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                           <label for="trading-as" class="form-label">Trading As</label>
                           <input type="text" id="trading-as" name="trading_as" value="{{ $data->trading_as }}" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                           <label class="form-label">Type</label>
                           <div class="form-check">
                              <input class="form-check-input" disabled type="radio" id="company" name="type" value="Company" {{ $data->type == 'Company' ? 'checked' : '' }}>
                              <label for="company" class="form-check-label">Company</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" disabled type="radio" id="partnership" name="type" value="Partnership" {{ $data->type == 'Partnership' ? 'checked' : '' }}>
                              <label for="partnership" class="form-check-label">Partnership</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" disabled type="radio" id="other" name="type" value="Other" {{ $data->type == 'Other' ? 'checked' : '' }}>
                              <label for="other" class="form-check-label">Other</label>
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="other-details" class="form-label">If Other, please specify</label>
                           <input type="text" id="other-details" name="other_details" value="{{ $data->other_details }}" class="form-control" readonly>
                        </div>
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="main-contact" class="form-label">Main Contact</label>
                              <input type="text" id="main-contact" name="main_contact" value="{{ $data->main_contact }}" class="form-control" readonly>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="additional-details" class="form-label">If other, please provide details</label>
                              <input type="text" id="additional-details" name="additional_details" value="{{ $data->additional_details }}" class="form-control" readonly>
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="surname" class="form-label">Surname</label>
                           <input type="text" id="surname" name="surname" value="{{ $data->surname }}" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                           <label for="forenames" class="form-label">Forenames</label>
                           <input type="text" id="forenames" name="forename" value="{{ $data->forename }}" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                           <label for="previous-names" class="form-label">Previous Name(s)</label>
                           <input 
                              type="text" 
                              id="previous-names" 
                              name="previous_names" 
                              value="{{ $data->previous_names }}" 
                              class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                           <label for="registered-address" class="form-label">Registered Address</label>
                           <textarea 
                              id="registered-address" 
                              name="registered_address" 
                              rows="3" 
                              class="form-control" readonly>{{ $data->registered_address }}</textarea>
                        </div>
                        <div class="form-section row">
                           <div class="col-md-6 mb-3">
                              <label for="registered_country" class="form-label">Registered Country</label>
                              <input type="text" class="form-control" readonly id="registered_country" name="registered_country" value="{{ $data->registered_country }}">
                           </div>
                           <div class="col-md-6">
                              <label for="website" class="form-label">Registered Post Code</label>
                              <input type="text" class="form-control" readonly id="website" name="registered_post_code" value="{{ $data->registered_post_code }}">
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="physical-address" class="form-label">Physical Address (if different)</label>
                           <textarea 
                              id="physical-address" 
                              name="physical_address" 
                              rows="3" 
                              class="form-control" readonly>{{ $data->physical_address }}</textarea>
                        </div>
                        <div class="form-section row">
                           <div class="col-md-6 mb-3">
                              <label for="physical_country" class="form-label">Physical Country</label>
                              <input type="text" class="form-control" readonly id="physical_country" name="physical_country" value="{{ $data->physical_country }}">
                           </div>
                           <div class="col-md-6">
                              <label for="website" class="form-label">Physical Post Code</label>
                              <input 
                                 type="text" 
                                 class="form-control" readonly 
                                 id="website" 
                                 name="physical_post_code" 
                                 value="{{ $data->physical_post_code }}">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="office-number" class="form-label">Main Office Number</label>
                              <input 
                                 type="text" 
                                 id="office-number" 
                                 name="office_number" 
                                 value="{{ $data->office_number }}" 
                                 class="form-control" readonly>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="direct-line" class="form-label">Direct Line</label>
                              <input 
                                 type="text" 
                                 id="direct-line" 
                                 name="direct_line" 
                                 value="{{ $data->direct_line }}" 
                                 class="form-control" readonly>
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="mobile-number" class="form-label">Mobile Number</label>
                           <input 
                              type="text" 
                              id="mobile-number" 
                              name="mobile_number" 
                              value="{{ $data->mobile_number }}" 
                              class="form-control" readonly>
                        </div>
                        <div class="form-section row">
                           <div class="col-md-6 mb-3">
                              <label for="email" class="form-label">Email Address</label>
                              <input 
                                 type="email" 
                                 class="form-control" readonly 
                                 id="email" 
                                 name="email_address" 
                                 value="{{ $data->email_address }}">
                           </div>
                           <div class="col-md-6">
                              <label for="website" class="form-label">Website</label>
                              <input 
                                 type="text" 
                                 class="form-control" readonly 
                                 id="website" 
                                 name="website" 
                                 value="{{ $data->website }}">
                           </div>
                        </div>
                        <div class="form-section">
                           <label class="form-label">Business Activity (Tick all that are relevant)</label>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-check">
                                    <input 
                                    class="form-check-input" disabled 
                                    type="checkbox" 
                                    id="financial-adviser" 
                                    value="yes" 
                                    name="financial_adviser" 
                                    {{ $data->financial_adviser == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="financial-adviser">Financial Adviser</label>
                                 </div>
                                 <div class="form-check">
                                    <input 
                                    class="form-check-input" disabled 
                                    type="checkbox" 
                                    id="insurance-broker" 
                                    value="yes" 
                                    name="insurance_broker" 
                                    {{ $data->insurance_broker == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="insurance-broker">Insurance Broker</label>
                                 </div>
                                 <div class="form-check">
                                    <input 
                                    class="form-check-input" disabled 
                                    type="checkbox" 
                                    id="asset-manager" 
                                    value="yes" 
                                    name="asset_manager" 
                                    {{ $data->asset_manager == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="asset-manager">Asset Manager</label>
                                 </div>
                                 <div class="form-check">
                                    <input 
                                    class="form-check-input" disabled 
                                    type="checkbox" 
                                    id="accountant" 
                                    value="yes" 
                                    name="accountant" 
                                    {{ $data->accountant == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="accountant">Accountant</label>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-check">
                                    <input 
                                    class="form-check-input" disabled 
                                    type="checkbox" 
                                    id="tax-adviser" 
                                    value="yes" 
                                    name="tax_adviser" 
                                    {{ $data->tax_adviser == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tax-adviser">Tax Adviser</label>
                                 </div>
                                 <div class="form-check">
                                    <input 
                                    class="form-check-input" disabled 
                                    type="checkbox" 
                                    id="lawyer" 
                                    value="yes" 
                                    name="lawyer" 
                                    {{ $data->lawyer == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="lawyer">Lawyer</label>
                                 </div>
                                 <div class="form-check">
                                    <input 
                                    class="form-check-input" disabled 
                                    type="checkbox" 
                                    id="other" 
                                    value="yes" 
                                    name="other_business_activity" 
                                    {{ $data->other_business_activity == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="other">Other</label>
                                 </div>
                                 <input 
                                    type="text" 
                                    class="form-control mt-2" 
                                    id="other-specify" 
                                    name="other_business_specify" 
                                    value="{{ $data->other_business_specify }}">
                              </div>
                           </div>
                        </div>
                        <div class="form-section">
                           <label for="reg-body" class="form-label">Regulatory/Licensing Body</label>
                           <input 
                              type="text" 
                              class="form-control mb-3" 
                              id="reg-body" 
                              name="licensing_body" 
                              value="{{ $data->licensing_body }}">
                           <label for="reg-number" class="form-label">Registration/Licensing Reference</label>
                           <input 
                              type="text" 
                              class="form-control" readonly 
                              name="licensing_reference" 
                              value="{{ $data->licensing_reference }}">
                        </div>
                        <div class="form-section">
                           <label class="form-label">Any restrictions imposed?</label>
                           <div class="form-check">
                              <input 
                              class="form-check-input" disabled 
                              type="radio" 
                              name="restrictions" 
                              id="restrictions-yes" 
                              value="yes" 
                              {{ $data->restrictions == 'yes' ? 'checked' : '' }}>
                              <label class="form-check-label" for="restrictions-yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input 
                              class="form-check-input" disabled 
                              type="radio" 
                              name="restrictions" 
                              id="restrictions-no" 
                              value="no" 
                              {{ $data->restrictions == 'no' ? 'checked' : '' }}>
                              <label class="form-check-label" for="restrictions-no">No</label>
                           </div>
                           <textarea 
                              class="form-control mt-2" 
                              rows="3" 
                              name="restrictions_imposed" 
                              placeholder="If yes, please provide details">{{ $data->restrictions_imposed }}</textarea>
                        </div>
                        <div class="form-section">
                           <label class="form-label">Regulatory Permissions</label>
                           <div class="form-check">
                              <input 
                              class="form-check-input" disabled 
                              type="checkbox" 
                              id="permissions-insurance" 
                              value="yes" 
                              name="insurance" 
                              {{ $data->insurance == 'yes' ? 'checked' : '' }}>
                              <label class="form-check-label" for="permissions-insurance">Insurance</label>
                           </div>
                           <div class="form-check">
                              <input 
                              class="form-check-input" disabled 
                              type="checkbox" 
                              id="permissions-investment" 
                              value="yes" 
                              name="investment" 
                              {{ $data->investment == 'yes' ? 'checked' : '' }}>
                              <label class="form-check-label" for="permissions-investment">Investment</label>
                           </div>
                        </div>
                        <div class="form-section row">
                           <div class="col-md-6 mb-3">
                              <label for="last-visit" class="form-label">Date of Last Regulatory Visit</label>
                              <input 
                                 type="date" 
                                 class="form-control" readonly 
                                 id="last-visit" 
                                 name="regulatory_visit" 
                                 value="{{ $data->regulatory_visit }}">
                           </div>
                           <div class="col-md-6">
                              <label for="follow-up" class="form-label">Date of Follow-Up (if applicable)</label>
                              <input 
                                 type="date" 
                                 class="form-control" readonly 
                                 id="follow-up" 
                                 name="date_follow" 
                                 value="{{ $data->date_follow }}">
                           </div>
                        </div>
                        <div class="form-section">
                           <label class="form-label">Any areas highlighted for review?</label>
                           <div class="form-check">
                              <input 
                              class="form-check-input" disabled 
                              type="radio" 
                              name="areas_review" 
                              id="areas-yes" 
                              value="yes" 
                              {{ $data->areas_review == 'yes' ? 'checked' : '' }}>
                              <label class="form-check-label" for="areas-yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input 
                              class="form-check-input" disabled 
                              type="radio" 
                              name="areas_review" 
                              id="areas-no" 
                              value="no" 
                              {{ $data->areas_review == 'no' ? 'checked' : '' }}>
                              <label class="form-check-label" for="areas-no">No</label>
                           </div>
                           <textarea 
                              class="form-control mt-2" 
                              rows="3" 
                              name="highlighted_review" 
                              placeholder="If yes, please provide details">{{ $data->highlighted_review }}</textarea>
                        </div>
                        <div class="form-section">
                           <label for="geo-cover" class="form-label">Geographical Cover & Percentage Breakdown</label>
                           <textarea 
                              class="form-control" readonly 
                              id="geo-cover" 
                              name="percentage_breakdown" 
                              rows="3">{{ $data->percentage_breakdown }}</textarea>
                        </div>
                        <div class="form-section row">
                           <div class="col-md-6 mb-3">
                              <label for="insurance-level" class="form-label">Level of Professional Indemnity Insurance</label>
                              <input 
                                 type="text" 
                                 class="form-control" readonly 
                                 id="insurance-level" 
                                 name="professional_indemnity" 
                                 value="{{ $data->professional_indemnity }}">
                           </div>
                           <div class="col-md-6">
                              <label class="form-label">Do you have separate Cyber Security Insurance?</label>
                              <div class="form-check">
                                 <input 
                                 class="form-check-input" disabled 
                                 type="radio" 
                                 name="cyber_insurance" 
                                 id="cyber-yes" 
                                 value="yes" 
                                 {{ $data->cyber_insurance == 'yes' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="cyber-yes">Yes</label>
                              </div>
                              <div class="form-check">
                                 <input 
                                 class="form-check-input" disabled 
                                 type="radio" 
                                 name="cyber_insurance" 
                                 id="cyber-no" 
                                 value="no" 
                                 {{ $data->cyber_insurance == 'no' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="cyber-no">No</label>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 d-flex mt-3 justify-content-between">
                           <button class="btn btn-label-secondary btn-prev" disabled>
                           <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                           <span class="align-middle d-sm-inline-block d-none">Previous</span>
                           </button>
                           <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                           <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
                           <i class="ti ti-arrow-right ti-xs"></i>
                           </button>
                        </div>
                     </div>
               </div>
               <div id="personalInfoValidation" class="content" style="display: none;">
               <h3>Company Profile, Policies and Procedures</h3>
               <div class="mb-3">
               <label class="form-label">Do you meet all clients face to face?</label>
               <div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" disabled 
               type="radio" 
               id="face-to-face-yes" 
               name="face_to_face" 
               value="Yes" 
               {{ $data->face_to_face === 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="face-to-face-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" disabled 
               type="radio" 
               id="face-to-face-no" 
               name="face_to_face" 
               value="No" 
               {{ $data->face_to_face === 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="face-to-face-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have a non-face-to-face policy?</label>
               <div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" disabled 
               type="radio" 
               id="non-face-policy-yes" 
               name="non_face_policy" 
               value="Yes" 
               {{ $data->non_face_policy === 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="non-face-policy-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" disabled 
               type="radio" 
               id="non-face-policy-no" 
               name="non_face_policy" 
               value="No" 
               {{ $data->non_face_policy === 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="non-face-policy-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-4">
               <label class="form-label">Client risk category percentage</label>
               <div class="row">
               <div class="col-md-4">
               <label for="high-risk" class="form-label">High</label>
               <input 
                  type="number" 
                  id="high-risk" 
                  name="high_risk" 
                  class="form-control" readonly 
                  placeholder="%" 
                  value="{{ $data->high_risk }}">
               </div>
               <div class="col-md-4">
               <label for="standard-risk" class="form-label">Standard</label>
               <input 
                  type="number" 
                  id="standard-risk" 
                  name="standard_risk" 
                  class="form-control" readonly 
                  placeholder="%" 
                  value="{{ $data->standard_risk }}">
               </div>
               <div class="col-md-4">
               <label for="low-risk" class="form-label">Low</label>
               <input 
                  type="number" 
                  id="low-risk" 
                  name="low_risk" 
                  class="form-control" readonly 
                  placeholder="%" 
                  value="{{ $data->low_risk }}">
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have relationships with sanctioned or sensitive jurisdictions?</label>
               <div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" disabled 
               type="radio" 
               id="sanctioned-yes" 
               name="sanctioned" 
               value="Yes" 
               {{ $data->sanctioned === 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="sanctioned-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" disabled 
               type="radio" 
               id="sanctioned-no" 
               name="sanctioned" 
               value="No" 
               {{ $data->sanctioned === 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="sanctioned-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Will you refer these relationships to Altruist?</label>
               <div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" disabled 
               type="radio" 
               id="refer-yes" 
               name="refer" 
               value="Yes" 
               {{ $data->refer === 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="refer-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" disabled 
               type="radio" 
               id="refer-no" 
               name="refer" 
               value="No" 
               {{ $data->refer === 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="refer-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have a Client Risk Policy?</label>
               <div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" disabled type="radio" id="client-risk-yes" name="client_risk" value="Yes" {{ $data->client_risk == 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="client-risk-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" disabled type="radio" id="client-risk-no" name="client_risk" value="No" {{ $data->client_risk == 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="client-risk-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label for="kyc-revisit" class="form-label">How often do you revisit Client KYC/CDD?</label>
               <input type="text" id="kyc-revisit" name="kyc_revisit" class="form-control" readonly value="{{ $data->kyc_revisit }}">
               </div>
               <div class="mb-3">
               <label class="form-label">Do you accept clients classed, in any form, as PEPs?</label>
               <div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" disabled type="radio" id="accept-peps-yes" name="accept_peps" value="Yes" {{ $data->accept_peps == 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="accept-peps-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" disabled type="radio" id="accept-peps-no" name="accept_peps" value="No" {{ $data->accept_peps == 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="accept-peps-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have a PEP policy?</label>
               <div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" disabled type="radio" id="pep-policy-yes" name="pep_policy" value="Yes" {{ $data->pep_policy == 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="pep-policy-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" disabled type="radio" id="pep-policy-no" name="pep_policy" value="No" {{ $data->pep_policy == 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="pep-policy-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Is enhanced due diligence requested for all high risk and/or PEP relationships?</label>
               <div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" disabled type="radio" id="due-diligence-yes" name="due_diligence" value="Yes" {{ $data->due_diligence == 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="due-diligence-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" disabled type="radio" id="due-diligence-no" name="due_diligence" value="No" {{ $data->due_diligence == 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="due-diligence-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label for="additional-details" class="form-label">If yes, please provide details</label>
               <textarea id="additional-details" name="provide_details" class="form-control" readonly rows="3">{{ $data->provide_details }}</textarea>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you collect and maintain details for clients?</label>
               <div>
                   <input type="radio" id="collectYes" disabled name="collectDetails" value="yes" {{ $data->collectDetails == 'yes' ? 'checked' : '' }} >
                   <label for="collectYes">Yes</label>
                   <input type="radio" id="collectNo" disabled name="collectDetails" value="no" {{ $data->collectDetails == 'no' ? 'checked' : '' }}>
                   <label for="collectNo">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have written policies covering this?</label>
               <div>
               <input type="radio" id="policiesYes" name="writtenPolicies" value="yes"  disabled
               {{ $data->writtenPolicies == 'yes' ? 'checked' : '' }}>
               <label for="policiesYes">Yes</label>
               <input type="radio" id="policiesNo" name="writtenPolicies" value="no"  disabled
               {{ $data->writtenPolicies == 'no' ? 'checked' : '' }}> 
               <label for="policiesNo">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label for="reviewDocuments" class="form-label">How often do you revisit & review documents?</label>
               <input type="text" id="reviewDocuments" name="reviewDocuments" class="form-control" readonly value="{{ $data->reviewDocuments }}">
               </div>
               <div class="mb-3">
               <label class="form-label">Do you provide updated documents to providers?</label>
               <div>
               <input type="radio" id="updateYes" name="updatedDocuments" value="yes"  disabled
               {{ $data->updatedDocuments == 'yes' ? 'checked' : '' }}> 
               <label for="updateYes">Yes</label>
               <input type="radio" id="updateNo" name="updatedDocuments" value="no"  disabled
               {{ $data->updatedDocuments == 'no' ? 'checked' : '' }}> 
               <label for="updateNo">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have AML & CTF policies in place?</label>
               <div>
               <input type="radio" id="amlYes" name="amlPolicies" value="yes"  disabled
               {{ $data->amlPolicies == 'yes' ? 'checked' : '' }}> 
               <label for="amlYes">Yes</label>
               <input type="radio" id="amlNo" name="amlPolicies" value="no"  disabled
               {{ $data->amlPolicies == 'no' ? 'checked' : '' }}> 
               <label for="amlNo">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label for="trainingFrequency" class="form-label">How often is AML & CTF training issued?</label>
               <input type="text" id="trainingFrequency" name="trainingFrequency" class="form-control" readonly value="{{ $data->trainingFrequency }}">
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have an internal compliance function?</label>
               <div>
               <input type="radio" id="complianceYes" name="internalCompliance" value="yes" disabled
               {{ $data->internalCompliance == 'yes' ? 'checked' : '' }}> 
               <label for="complianceYes">Yes</label>
               <input type="radio" id="complianceNo" name="internalCompliance" value="no" disabled
               {{ $data->internalCompliance == 'no' ? 'checked' : '' }}> 
               <label for="complianceNo">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label for="complianceApproval" class="form-label">When does compliance approve business cases?</label>
               <input type="text" id="complianceApproval" name="complianceApproval" class="form-control" readonly value="{{ $data->complianceApproval }}">
               </div>
               <div class="mb-3">
               <label for="complianceComments" class="form-label">Compliance function comments (if applicable)</label>
               <textarea id="complianceComments" name="complianceComments" class="form-control" readonly>{{ $data->complianceComments }}</textarea>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you maintain country lists for any of the following (tick all that apply):</label>
               <div>
               <input type="checkbox" id="highRisk" name="countryLists_highRisk" disabled value="highRisk"  {{ $data->countryLists_highRisk == 'highRisk' ? 'checked' : '' }}> <label for="highRisk">High Risk</label><br>
               <input type="checkbox" id="fatf" name="countryLists_fatf" disabled value="fatf" {{ $data->countryLists_fatf == 'fatf' ? 'checked' : '' }}> <label for="fatf">FATF Blacklisted</label><br>
               <input type="checkbox" id="sanctioned" name="countryLists_sanctioned" disabled value="sanctioned" {{ $data->countryLists_sanctioned == 'sanctioned' ? 'checked' : '' }}> <label for="sanctioned">Sanctioned Countries</label><br>
               <input type="checkbox" id="corruption" name="countryLists_corruption" disabled value="corruption" {{ $data->countryLists_corruption == 'corruption' ? 'checked' : '' }}> <label for="corruption">Risk of Corruption</label><br>
               <input type="checkbox" id="complianceAlert" name="countryLists_complianceAlert" disabled value="complianceAlert" {{ $data->countryLists_complianceAlert == 'complianceAlert' ? 'checked' : '' }}> <label for="complianceAlert">Compliance Alert</label><br>
               <input type="checkbox" id="drugTrafficking" name="countryLists_drugTrafficking" disabled value="drugTrafficking" {{ $data->countryLists_drugTrafficking == 'drugTrafficking' ? 'checked' : '' }}> <label for="drugTrafficking">Major Drug Trafficking</label>
               </div>
               </div>
               <div class="mb-3">
               <label for="additionalComments" class="form-label">Any additional comments on country lists</label>
               <textarea id="additionalComments" name="additionalComments" class="form-control" readonly>{{ $data->additionalComments }}</textarea>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have systems & controls in place to screen transactions?</label>
               <div>
               <input type="radio" id="systemsYes" name="screenSystems" disabled value="yes" {{ $data->screenSystems == 'yes' ? 'checked' : '' }}> <label for="systemsYes">Yes</label>
               <input type="radio" id="systemsNo" name="screenSystems" disabled value="no" {{ $data->screenSystems == 'no' ? 'checked' : '' }}> <label for="systemsNo">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Are you able to identify transactions deemed to be high risk?</label>
               <div>
               <input type="radio" id="highRiskYes" name="identifyHighRisk" disabled value="yes" {{ $data->identifyHighRisk == 'yes' ? 'checked' : '' }}> <label for="highRiskYes">Yes</label>
               <input type="radio" id="highRiskNo" name="identifyHighRisk" disabled value="no" {{ $data->identifyHighRisk == 'no' ? 'checked' : '' }}> <label for="highRiskNo">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you record details of:</label>
               <div>
               <input type="checkbox" id="intendedTransactions" name="recordDetails_intended" disabled value="intended" {{ $data->recordDetails_intended == 'intended' ? 'checked' : '' }}> <label for="intendedTransactions">Intended Client Transactions</label><br>
               <input type="checkbox" id="expectedAmounts" name="recordDetails_expected" disabled value="expected" {{ $data->recordDetails_expected == 'expected' ? 'checked' : '' }}> <label for="expectedAmounts">Expected Volume Amounts</label><br>
               <input type="checkbox" id="perTransaction" name="recordDetails_perTransaction" disabled value="perTransaction" {{ $data->recordDetails_perTransaction == 'perTransaction' ? 'checked' : '' }}> <label for="perTransaction">Per Transaction</label>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you undertake & record risk assessments for each new relationship?</label>
               <div class="form-check">
               <input class="form-check-input" disabled type="radio" id="risk-yes" name="risk_assessment" value="Yes" {{ $data->risk_assessment == 'Yes' ? 'checked' : '' }}>
               <label for="risk-yes" class="form-check-label">Yes</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" disabled type="radio" id="risk-no" name="risk_assessment" value="No" {{ $data->risk_assessment == 'No' ? 'checked' : '' }}>
               <label for="risk-no" class="form-check-label">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label for="risk-details" class="form-label">If yes, please provide details</label>
               <textarea id="risk-details" name="risk_details" rows="3" class="form-control" readonly>{{ $data->risk_details }}</textarea>
               </div>
               <div class="mb-3">
               <label for="client-fee-structure" class="form-label">Please provide details of the client fee structure, indicating whether it is deemed industry standard</label>
               <textarea id="client-fee-structure" name="client_fee_structure" rows="3" class="form-control" readonly>{{ $data->client_fee_structure }}</textarea>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have in-house investment products & offset fees against annual management fees?</label>
               <div class="form-check">
               <input class="form-check-input" disabled type="radio" id="products-yes" name="investment_products" value="Yes" {{ $data->investment_products == 'Yes' ? 'checked' : '' }}>
               <label for="products-yes" class="form-check-label">Yes</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" disabled type="radio" id="products-no" name="investment_products" value="No" {{ $data->investment_products == 'No' ? 'checked' : '' }}>
               <label for="products-no" class="form-check-label">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label for="products-details" class="form-label">If yes, please provide details</label>
               <textarea id="products-details" name="products_details" rows="3" class="form-control" readonly>{{ $data->products_details }}</textarea>
               </div>
               <div class="mb-3">
               <label class="form-label">Please tick the boxes below to confirm which investments you will be selecting in respect of your Clients:</label>
               <div class="row">
               <div class="col-md-6">
               <div class="form-check">
               <input class="form-check-input" disabled type="checkbox" id="platform-wrap" name="platform_WRAP" value="Platform / WRAP" {{ $data->platform_WRAP ? 'checked' : '' }}>
               <label for="platform-wrap" class="form-check-label">Platform / WRAP</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" disabled type="checkbox" id="funds" name="funds_platform" value="Funds (direct not via a Platform)" {{ $data->funds_platform ? 'checked' : '' }}>
               <label for="funds" class="form-check-label">Funds (direct not via a Platform)</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" disabled type="checkbox" id="non-mass-market" name="market_investments" value="Non Mass Market Investments" {{ $data->market_investments ? 'checked' : '' }}>
               <label for="non-mass-market" class="form-check-label">Non Mass Market Investments</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" disabled type="checkbox" id="restricted-mass-market" name="restricted_mass" value="Restricted Mass Market Investments" {{ $data->restricted_mass ? 'checked' : '' }}>
               <label for="restricted-mass-market" class="form-check-label">Restricted Mass Market Investments</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" disabled type="checkbox" id="deposit-accounts" name="deposit_accounts" value="Deposit Accounts"{{ $data->deposit_accounts ? 'checked' : '' }}>
               <label for="deposit-accounts" class="form-check-label">Deposit Accounts</label>
               </div>
               </div>
               <div class="col-md-6">
               <div class="form-check">
               <input class="form-check-input" disabled type="checkbox" id="advisory-stockbroker" name="advisory_stockbroker" value="Advisory Stockbroker" {{ $data->advisory_stockbroker ? 'checked' : '' }}>
               <label for="advisory-stockbroker" class="form-check-label">Advisory Stockbroker</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" disabled type="checkbox" id="dfm-model-portfolios" name="model_portfolios" value="DFM / Model Portfolios" {{ $data->model_portfolios ? 'checked' : '' }}>
               <label for="dfm-model-portfolios" class="form-check-label">DFM / Model Portfolios</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" disabled type="checkbox" id="high-risk-investments" name="investments_defined" value="High Risk Investments as defined by FCA" {{ $data->investments_defined ? 'checked' : '' }}>
               <label for="high-risk-investments" class="form-check-label">High Risk Investments as defined by FCA</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" disabled type="checkbox" id="structured-deposits" name="structured_deposits" value="Structured Deposits" {{ $data->structured_deposits ? 'checked' : '' }}>
               <label for="structured-deposits" class="form-check-label">Structured Deposits</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" disabled type="checkbox" id="commercial-property" name="commercial_property" value="Commercial Property" {{ $data->commercial_property ? 'checked' : '' }}>
               <label for="commercial-property" class="form-check-label">Commercial Property</label>
               </div>
               </div>
               </div>
               </div>
               <div class="col-12 d-flex justify-content-between">
               <button class="btn btn-label-secondary btn-prev">
               <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
               <span class="align-middle d-sm-inline-block d-none">Previous</span>
               </button>
               <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
               <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
               <i class="ti ti-arrow-right ti-xs"></i>
               </button>
               </div>
               </div>
               <div id="investmentStrategy" class="content" style="display: none;">
               <h3>Suitable Certifiers</h3>
               <div class="row mb-3">
               <div class="col-md-6">
               <label for="title" class="form-label">Title (Mr/Mrs/Miss/Dr/Other)</label>
               <input type="text" id="title" name="title" class="form-control" readonly value="{{ $data->title }}">
               </div>
               <div class="col-md-6">
               <label for="other-details" class="form-label">If other, please provide details</label>
               <input type="text" id="other-details" name="please_details" class="form-control" readonly value="{{ $data->please_details }}">
               </div>
               </div>
               <div class="mb-3">
               <label for="surname" class="form-label">Surname</label>
               <input type="text" id="surname" name="surname" class="form-control" readonly value="{{ $data->surname }}">
               </div>
               <div class="mb-3">
               <label for="forenames" class="form-label">Forename(s)</label>
               <input type="text" id="forenames" name="forenames" class="form-control" readonly value="{{ $data->forenames }}">
               </div>
               <div class="mb-3">
               <label for="profession" class="form-label">Profession and name of professional body with registration no.</label>
               <input type="text" id="profession" name="profession" class="form-control" readonly value="{{ $data->profession }}">
               </div>
               <div class="mb-3">
               <label for="qualifications" class="form-label">Qualifications</label>
               <input type="text" id="qualifications" name="qualifications" class="form-control" readonly value="{{ $data->qualifications }}">
               </div>
               <div class="mb-3">
               <label for="certifiers-address" class="form-label">Certifier's Address</label>
               <textarea id="certifiers-address" name="certifiers_address" rows="3" class="form-control" readonly>{{ $data->certifiers_address }}</textarea>
               </div>
               <div class="row mb-3">
               <div class="col-md-6">
                   <label for="country" class="form-label">Country</label>
                   <input type="text" id="country" name="country" class="form-control" readonly value="{{ $data->country }}">
               </div>
               <div class="col-md-6">
               <label for="post-code" class="form-label">Post Code</label>
               <input type="text" id="post-code" name="post_code" class="form-control" readonly value="{{ $data->post_code }}">
               </div>
               <div class="mt-5">
               <h4 class="fw-bold">Certification Wording</h4>
               <p>Where the document bears a photograph, the following is required:</p>
               <p>"Having met/seen the individual and the identification document at the same time, I certify that this is a true copy of the original document and that the photograph is a true likeness to the bearer."</p>
               <p>Non-photographic documents, must be worded:</p>
               <p>"Having seen the original document, I certify that this is a true copy of the original."</p>
               <p>Once certified, you must include the following information about the certifier:</p>
               <ul>
               <li>The certifier's name</li>
               <li>Position within the company and professional body with registration no.</li>
               <li>Date of the certification</li>
               <li>Email address</li>
               </ul>
               <p>If no company stamp is available, the following must also be included:</p>
               <ul>
               <li>Company name that the certifier represents</li>
               <li>Company business address</li>
               <li>Company telephone number</li>
               </ul>
               </div>
               </div>
               <div class="col-12 d-flex justify-content-between">
               <button class="btn btn-label-secondary btn-prev">
               <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
               <span class="align-middle d-sm-inline-block d-none">Previous</span>
               </button>
               <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
               <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
               <i class="ti ti-arrow-right ti-xs"></i>
               </button>
               </div>
               </div>
               <div id="consumer_duty" class="content" style="display: none;">
               <h4 class="mb-4">CDD Uploads</h4>
               <div class="col-md-12">
               <div class="row">
               <div class="col-md-6 mb-3">
               <label for="company_structure_chart">Company structure chart</label>
               @if(isset($data->company_structure_chart))
               <div class="mb-2">
               <a href="https://newalltrust.ilcorpdev.com{{ $data->company_structure_chart }}" target="_blank">
               View Company structure chart
               </a>
               </div>
               @endif
               <input type="file" name="company_structure_chart" id="company_structure_chart" class="form-control" readonly />
               </div>
               <div class="col-md-6 mb-3">
               <label for="company_register_shareholder">Register of directors and shareholders</label>
               @if(isset($data->company_register_shareholder))
               <div class="mb-2">
               <a href="https://newalltrust.ilcorpdev.com{{ $data->company_register_shareholder }}" target="_blank">
               View Register of directors and shareholders
               </a>
               </div>
               @endif
               <input type="file" name="company_register_shareholder" id="company_register_shareholder" class="form-control" readonly />
               </div>
               </div>
               </div>
               <div class="col-md-12">
               <div class="row">
               <div class="col-md-12 mb-3">
               <label for="company_authorised_signatory">Authorised signatory list</label>
               @if(isset($data->company_authorised_signatory))
               <div class="mb-2">
               <a href="https://newalltrust.ilcorpdev.com{{ $data->company_authorised_signatory }}" target="_blank">
               View Authorised signatory list
               </a>
               </div>
               @endif
               <input type="file" name="company_authorised_signatory" id="company_authorised_signatory" class="form-control" readonly />
               </div>
               <div class="col-md-12 mb-3">
               <label for="appointed_text">If you are an appointed representative of another firm, we also require the following:</label>
               <input type="text" name="appointed_text" id="appointed_text" value="{{ $data->appointed_text }}" placeholder="Contact email address for directors and shareholders over 25%" class="form-control" readonly />
               </div>
               <div class="col-md-12 mb-3">
               <label  for="">Multiple File Uplode</label>
               @php
               $file = $data->adviser_multifiles;
               $multiple = json_decode($file);
               @endphp
               @if($file)
               @foreach($multiple as $file)
               <a href="{{$file}}" class="m-5"><i class="ti ti-file" style="font-size:40px;"></i></a>
               @endforeach
               @endif
               <input type="file" multiple name="adviser_multifiles[]" class="form-control" readonly />
               <input type="hidden" name="old" value="{{$data}}">
               </div>
               </div>
               </div>
               <div class="d-flex justify-content-between">
               <button class="btn btn-label-secondary btn-prev" type="button">Previous</button>
               <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
               <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
               <i class="ti ti-arrow-right ti-xs"></i>
               </button>
               </div>
               </div>
               <div id="bank_details" class="content" style="display: none;">
               <h3>Acceptance</h3>
               <div class="row mb-3">
               <div class="col-md-6">
               <label for="full-name-1" class="form-label">Full Name</label>
               <input type="text" id="full-name-1" name="full_name_1" class="form-control" readonly value="{{ $data->full_name_1 }}">
               </div>
               <div class="col-md-6">
               <label for="position-1" class="form-label">Position</label>
               <input type="text" id="position-1" name="position_1" class="form-control" readonly value="{{ $data->position_1 }}">
               </div>
               </div>
               <div class="row mb-3">
                   <div class="col-md-6">
                       <label  for="signature_1">Financial Adviser's Signature <i class="ti ti-signature"></i></label>
                       <br>
                       @if ($data->signature_1)
                       <img src="{{url( $data->signature_1 )}}" alt="Signature" style="width: 200px; height: auto;">
                       @endif                 
                   </div>
               </div>
               <div class="col-md-12">
               <label class="form-label">Date Signed</label>
               <input type="date" class="form-control" readonly name="date_signed_1" value="{{ $data->date_signed_1 }}">
               </div>
               <div class="row mb-3">
               <div class="col-md-6">
               <label for="full-name-2" class="form-label">Full Name</label>
               <input type="text" id="full-name-2" name="full_name_2" class="form-control" readonly value="{{ $data->full_name_2 }}">
               </div>
               <div class="col-md-6">
               <label for="position-2" class="form-label">Position</label>
               <input type="text" id="position-2" name="position_2" class="form-control" readonly value="{{ $data->position_2 }}">
               </div>
               </div>
               <div class="row mb-3">
                   <div class="col-md-6">       
                   <label  for="signature-2">Financial Adviser's Signature <i class="ti ti-signature"></i></label>
                   <br>
                   @if ($data->signature_2)
                   <img src="{{url($data->signature_2 )}}" alt="Signature" style="width: 200px; height: auto;">
                   @endif
                   </div>
               </div>
               <div class="col-md-12">
               <label class="form-label">Date Signed</label>
               <input type="date" class="form-control" readonly name="date_signed_2" value="{{ $data->date_signed_2 }}">
               </div>
               <div class="col-12 d-flex justify-content-between mt-3">
               <button class="btn btn-label-secondary btn-prev">
               <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
               <span class="align-middle d-sm-inline-block d-none">Previous</span>
               </button>
               </div>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.5.0/lightgallery.min.js"></script>
<script>
   document.addEventListener('DOMContentLoaded', function () {
   const nextBtns = document.querySelectorAll('.btn-next');
   const prevBtns = document.querySelectorAll('.btn-prev');
   const contents = document.querySelectorAll('.content');
   let currentStep = 0;
   
   nextBtns.forEach((btn) => {
    btn.addEventListener('click', (event) => {
        event.preventDefault();
        if (currentStep < contents.length - 1) {
            contents[currentStep].style.display = 'none';
            currentStep++;
            contents[currentStep].style.display = 'block';
        }
        toggleButtonState();
    });
   });
   
   prevBtns.forEach((btn) => {
    btn.addEventListener('click', (event) => {
        event.preventDefault();
        if (currentStep > 0) {
            contents[currentStep].style.display = 'none';
            currentStep--;
            contents[currentStep].style.display = 'block';
        }
        toggleButtonState();
    });
   });
   
   function toggleButtonState() {
    prevBtns.forEach((btn) => {
        btn.disabled = currentStep === 0;
    });
   }
  
   });
   
    document.getElementById('signatureAlltrust').addEventListener('change', function(event) {
   const input = event.target;
   
   if (input.files && input.files[0]) {
    const reader = new FileReader();
   
    reader.onload = function(e) {
        const imagePreview = document.getElementById('imagePreview');
        const imageLink = document.getElementById('imageLink');
        const lightgallery = document.getElementById('lightgallery');
        imagePreview.src = e.target.result;
        imageLink.href = e.target.result;
        imageLink.setAttribute('data-src', e.target.result);
        lightgallery.style.display = 'block';
        lightGallery(lightgallery);
    };
   
    reader.readAsDataURL(input.files[0]);
   }
   });
   
   document.getElementById('signatureAdviser').addEventListener('change', function(event) {
   const input = event.target;
   
   if (input.files && input.files[0]) {
    const reader = new FileReader();
   
    reader.onload = function(e) {
        const imagePreview = document.getElementById('imagePreview2');
        const imageLink = document.getElementById('imageLink2');
        const lightgallery = document.getElementById('lightgallery2');
        imagePreview.src = e.target.result;
        imageLink.href = e.target.result;
        imageLink.setAttribute('data-src', e.target.result);
        lightgallery.style.display = 'block';
        lightGallery(lightgallery);
    };
   
    reader.readAsDataURL(input.files[0]);
   }
   });
</script>
<script>
   document.addEventListener("DOMContentLoaded", function () {
   const formSections = document.querySelectorAll(".form-section");
   const nextButtons = document.querySelectorAll(".next-btn");
   nextButtons.forEach((button, index) => {
       button.addEventListener("click", function () {
           const inputs = formSections[index].querySelectorAll("input[required], select[required], textarea[required]");
           let allFilled = true;
   
           inputs.forEach(input => {
               if (!input.value.trim()) {
                   allFilled = false;
                   input.classList.add("error");
               } else {
                   input.classList.remove("error");
               }
           });
   
           if (allFilled) {
               formSections[index].classList.add("hidden");
               formSections[index + 1]?.classList.remove("hidden");
           }
       });
   });
   });
</script>
<script>
   function scrollToTop() {
       window.scrollTo({
           top: 0,
           behavior: "smooth"
       });
   }
</script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>
<script>
   document.addEventListener("DOMContentLoaded", function () {
       function saveSignature(signaturePad, inputId) {
           if (!signaturePad.isEmpty()) {
               let signatureData = signaturePad.toDataURL('image/png');
               document.getElementById(inputId).value = signatureData;
               alert("Signature saved successfully!");
           } else {
               alert("Please draw a signature first.");
           }
       }
       let canvas1 = document.getElementById('signature_pad');
       let signaturePad1 = new SignaturePad(canvas1);
   
       let canvas2 = document.getElementById('signature_pad_two');
       let signaturePad2 = new SignaturePad(canvas2);

       document.getElementById('clear').addEventListener('click', function () {
           signaturePad1.clear();
           document.getElementById('signature_1').value = "";
       });
   
       document.getElementById('clear_two').addEventListener('click', function () {
           signaturePad2.clear();
           document.getElementById('signature-2').value = "";
       });
       document.getElementById('save1').addEventListener('click', function () {
           saveSignature(signaturePad1, 'signature_1');
       });
   
       document.getElementById('save2').addEventListener('click', function () {
           saveSignature(signaturePad2, 'signature-2');
       });
   });
</script>
@endsection