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
                  <form id="multiStepsForm" method="POST" action="{{ route('offshoreupdate', $display->id) }}" enctype="multipart/form-data">
                     @csrf
                     <div id="adviserDetails" class="content" style="display: block;">
                        <h3>Introducer Details</h3>
                        <div class="mb-3">
                           <label for="company-name" class="form-label">Company Name</label>
                           <input type="text" id="company-name" name="company_name" value="{{ $display->company_name }}" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label for="trading-as" class="form-label">Trading As</label>
                           <input type="text" id="trading-as" name="trading_as" value="{{ $display->trading_as }}" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label class="form-label">Type</label>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" id="company" name="type" value="Company" {{ $display->type == 'Company' ? 'checked' : '' }}>
                              <label for="company" class="form-check-label">Company</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" id="partnership" name="type" value="Partnership" {{ $display->type == 'Partnership' ? 'checked' : '' }}>
                              <label for="partnership" class="form-check-label">Partnership</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" id="other" name="type" value="Other" {{ $display->type == 'Other' ? 'checked' : '' }}>
                              <label for="other" class="form-check-label">Other</label>
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="other-details" class="form-label">If Other, please specify</label>
                           <input type="text" id="other-details" name="other_details" value="{{ $display->other_details }}" class="form-control">
                        </div>
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="main-contact" class="form-label">Main Contact</label>
                              <select id="main-contact" name="main_contact" class="form-select">
                                 <option value="">Select</option>
                                 <option value="Mr" {{ $display->main_contact == 'Mr' ? 'selected' : '' }}>Mr</option>
                                 <option value="Mrs" {{ $display->main_contact == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                 <option value="Miss" {{ $display->main_contact == 'Miss' ? 'selected' : '' }}>Miss</option>
                                 <option value="Dr" {{ $display->main_contact == 'Dr' ? 'selected' : '' }}>Dr</option>
                                 <option value="Other" {{ $display->main_contact == 'Other' ? 'selected' : '' }}>Other</option>
                              </select>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="additional-details" class="form-label">If other, please provide details</label>
                              <input type="text" id="additional-details" name="additional_details" value="{{ $display->additional_details }}" class="form-control">
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="surname" class="form-label">Surname</label>
                           <input type="text" id="surname" name="surname" value="{{ $display->surname }}" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label for="forenames" class="form-label">Forenames</label>
                           <input type="text" id="forenames" name="forename" value="{{ $display->forename }}" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label for="previous-names" class="form-label">Previous Name(s)</label>
                           <input 
                              type="text" 
                              id="previous-names" 
                              name="previous_names" 
                              value="{{ $display->previous_names }}" 
                              class="form-control">
                        </div>
                        <div class="mb-3">
                           <label for="registered-address" class="form-label">Registered Address</label>
                           <textarea 
                              id="registered-address" 
                              name="registered_address" 
                              rows="3" 
                              class="form-control">{{ $display->registered_address }}</textarea>
                        </div>
                        <div class="form-section row">
                           <div class="col-md-6 mb-3">
                              <label for="registered_country" class="form-label">Registered Country</label>
                              <select class="form-control" id="registered_country" name="registered_country">
                                 <option value="">Select Country</option>
                                 <option value="Afghanistan" {{ ($display->registered_country == 'Afghanistan') ? 'selected' : '' }}>Afghanistan</option>
                                 <option value="Albania" {{ ($display->registered_country == 'Albania') ? 'selected' : '' }}>Albania</option>
                                 <option value="Algeria" {{ ($display->registered_country == 'Algeria') ? 'selected' : '' }}>Algeria</option>
                                 <option value="Andorra" {{ ($display->registered_country == 'Andorra') ? 'selected' : '' }}>Andorra</option>
                                 <option value="Angola" {{ ($display->registered_country == 'Angola') ? 'selected' : '' }}>Angola</option>
                                 <option value="Argentina" {{ ($display->registered_country == 'Argentina') ? 'selected' : '' }}>Argentina</option>
                                 <option value="Australia" {{ ($display->registered_country == 'Australia') ? 'selected' : '' }}>Australia</option>
                                 <option value="Austria" {{ ($display->registered_country == 'Austria') ? 'selected' : '' }}>Austria</option>
                                 <option value="Azerbaijan" {{ ($display->registered_country == 'Azerbaijan') ? 'selected' : '' }}>Azerbaijan</option>
                                 <option value="Bahrain" {{ ($display->registered_country == 'Bahrain') ? 'selected' : '' }}>Bahrain</option>
                                 <option value="Bangladesh" {{ ($display->registered_country == 'Bangladesh') ? 'selected' : '' }}>Bangladesh</option>
                                 <option value="Belgium" {{ ($display->registered_country == 'Belgium') ? 'selected' : '' }}>Belgium</option>
                                 <option value="Brazil" {{ ($display->registered_country == 'Brazil') ? 'selected' : '' }}>Brazil</option>
                                 <option value="Canada" {{ ($display->registered_country == 'Canada') ? 'selected' : '' }}>Canada</option>
                                 <option value="China" {{ ($display->registered_country == 'China') ? 'selected' : '' }}>China</option>
                                 <option value="Denmark" {{ ($display->registered_country == 'Denmark') ? 'selected' : '' }}>Denmark</option>
                                 <option value="Egypt" {{ ($display->registered_country == 'Egypt') ? 'selected' : '' }}>Egypt</option>
                                 <option value="France" {{ ($display->registered_country == 'France') ? 'selected' : '' }}>France</option>
                                 <option value="Germany" {{ ($display->registered_country == 'Germany') ? 'selected' : '' }}>Germany</option>
                                 <option value="India" {{ ($display->registered_country == 'India') ? 'selected' : '' }}>India</option>
                                 <option value="Indonesia" {{ ($display->registered_country == 'Indonesia') ? 'selected' : '' }}>Indonesia</option>
                                 <option value="Iran" {{ ($display->registered_country == 'Iran') ? 'selected' : '' }}>Iran</option>
                                 <option value="Iraq" {{ ($display->registered_country == 'Iraq') ? 'selected' : '' }}>Iraq</option>
                                 <option value="Ireland" {{ ($display->registered_country == 'Ireland') ? 'selected' : '' }}>Ireland</option>
                                 <option value="Italy" {{ ($display->registered_country == 'Italy') ? 'selected' : '' }}>Italy</option>
                                 <option value="Japan" {{ ($display->registered_country == 'Japan') ? 'selected' : '' }}>Japan</option>
                                 <option value="Kenya" {{ ($display->registered_country == 'Kenya') ? 'selected' : '' }}>Kenya</option>
                                 <option value="Malaysia" {{ ($display->registered_country == 'Malaysia') ? 'selected' : '' }}>Malaysia</option>
                                 <option value="Mexico" {{ ($display->registered_country == 'Mexico') ? 'selected' : '' }}>Mexico</option>
                                 <option value="Netherlands" {{ ($display->registered_country == 'Netherlands') ? 'selected' : '' }}>Netherlands</option>
                                 <option value="New Zealand" {{ ($display->registered_country == 'New Zealand') ? 'selected' : '' }}>New Zealand</option>
                                 <option value="Nigeria" {{ ($display->registered_country == 'Nigeria') ? 'selected' : '' }}>Nigeria</option>
                                 <option value="Norway" {{ ($display->registered_country == 'Norway') ? 'selected' : '' }}>Norway</option>
                                 <option value="Pakistan" {{ ($display->registered_country == 'Pakistan') ? 'selected' : '' }}>Pakistan</option>
                                 <option value="Philippines" {{ ($display->registered_country == 'Philippines') ? 'selected' : '' }}>Philippines</option>
                                 <option value="Poland" {{ ($display->registered_country == 'Poland') ? 'selected' : '' }}>Poland</option>
                                 <option value="Portugal" {{ ($display->registered_country == 'Portugal') ? 'selected' : '' }}>Portugal</option>
                                 <option value="Qatar" {{ ($display->registered_country == 'Qatar') ? 'selected' : '' }}>Qatar</option>
                                 <option value="Russia" {{ ($display->registered_country == 'Russia') ? 'selected' : '' }}>Russia</option>
                                 <option value="Saudi Arabia" {{ ($display->registered_country == 'Saudi Arabia') ? 'selected' : '' }}>Saudi Arabia</option>
                                 <option value="Singapore" {{ ($display->registered_country == 'Singapore') ? 'selected' : '' }}>Singapore</option>
                                 <option value="South Africa" {{ ($display->registered_country == 'South Africa') ? 'selected' : '' }}>South Africa</option>
                                 <option value="South Korea" {{ ($display->registered_country == 'South Korea') ? 'selected' : '' }}>South Korea</option>
                                 <option value="Spain" {{ ($display->registered_country == 'Spain') ? 'selected' : '' }}>Spain</option>
                                 <option value="Sri Lanka" {{ ($display->registered_country == 'Sri Lanka') ? 'selected' : '' }}>Sri Lanka</option>
                                 <option value="Sweden" {{ ($display->registered_country == 'Sweden') ? 'selected' : '' }}>Sweden</option>
                                 <option value="Switzerland" {{ ($display->registered_country == 'Switzerland') ? 'selected' : '' }}>Switzerland</option>
                                 <option value="Thailand" {{ ($display->registered_country == 'Thailand') ? 'selected' : '' }}>Thailand</option>
                                 <option value="Turkey" {{ ($display->registered_country == 'Turkey') ? 'selected' : '' }}>Turkey</option>
                                 <option value="United Arab Emirates" {{ ($display->registered_country == 'United Arab Emirates') ? 'selected' : '' }}>United Arab Emirates</option>
                                 <option value="United Kingdom" {{ ($display->registered_country == 'United Kingdom') ? 'selected' : '' }}>United Kingdom</option>
                                 <option value="United States" {{ ($display->registered_country == 'United States') ? 'selected' : '' }}>United States</option>
                                 <option value="Vietnam" {{ ($display->registered_country == 'Vietnam') ? 'selected' : '' }}>Vietnam</option>
                                 <option value="Zambia" {{ ($display->registered_country == 'Zambia') ? 'selected' : '' }}>Zambia</option>
                                 <option value="Zimbabwe" {{ ($display->registered_country == 'Zimbabwe') ? 'selected' : '' }}>Zimbabwe</option>
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="website" class="form-label">Registered Post Code</label>
                              <input 
                                 type="text" 
                                 class="form-control" 
                                 id="website" 
                                 name="registered_post_code" 
                                 value="{{ $display->registered_post_code }}">
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="physical-address" class="form-label">Physical Address (if different)</label>
                           <textarea 
                              id="physical-address" 
                              name="physical_address" 
                              rows="3" 
                              class="form-control">{{ $display->physical_address }}</textarea>
                        </div>
                        <div class="form-section row">
                           <div class="col-md-6 mb-3">
                              <label for="physical_country" class="form-label">Physical Country</label>
                              <select class="form-control" id="physical_country" name="physical_country">
                                 <option value="">Select Country</option>
                                 <option value="Afghanistan" {{ $display->physical_country == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
                                 <option value="Albania" {{ $display->physical_country == 'Albania' ? 'selected' : '' }}>Albania</option>
                                 <option value="Algeria" {{ $display->physical_country == 'Algeria' ? 'selected' : '' }}>Algeria</option>
                                 <option value="Andorra" {{ $display->physical_country == 'Andorra' ? 'selected' : '' }}>Andorra</option>
                                 <option value="Angola" {{ $display->physical_country == 'Angola' ? 'selected' : '' }}>Angola</option>
                                 <option value="Argentina" {{ $display->physical_country == 'Argentina' ? 'selected' : '' }}>Argentina</option>
                                 <option value="Australia" {{ $display->physical_country == 'Australia' ? 'selected' : '' }}>Australia</option>
                                 <option value="Austria" {{ $display->physical_country == 'Austria' ? 'selected' : '' }}>Austria</option>
                                 <option value="Azerbaijan" {{ $display->physical_country == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
                                 <option value="Bahrain" {{ $display->physical_country == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
                                 <option value="Bangladesh" {{ $display->physical_country == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                 <option value="Belgium" {{ $display->physical_country == 'Belgium' ? 'selected' : '' }}>Belgium</option>
                                 <option value="Brazil" {{ $display->physical_country == 'Brazil' ? 'selected' : '' }}>Brazil</option>
                                 <option value="Canada" {{ $display->physical_country == 'Canada' ? 'selected' : '' }}>Canada</option>
                                 <option value="China" {{ $display->physical_country == 'China' ? 'selected' : '' }}>China</option>
                                 <option value="Denmark" {{ $display->physical_country == 'Denmark' ? 'selected' : '' }}>Denmark</option>
                                 <option value="Egypt" {{ $display->physical_country == 'Egypt' ? 'selected' : '' }}>Egypt</option>
                                 <option value="France" {{ $display->physical_country == 'France' ? 'selected' : '' }}>France</option>
                                 <option value="Germany" {{ $display->physical_country == 'Germany' ? 'selected' : '' }}>Germany</option>
                                 <option value="India" {{ $display->physical_country == 'India' ? 'selected' : '' }}>India</option>
                                 <option value="Indonesia" {{ $display->physical_country == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                 <option value="Iran" {{ $display->physical_country == 'Iran' ? 'selected' : '' }}>Iran</option>
                                 <option value="Iraq" {{ $display->physical_country == 'Iraq' ? 'selected' : '' }}>Iraq</option>
                                 <option value="Ireland" {{ $display->physical_country == 'Ireland' ? 'selected' : '' }}>Ireland</option>
                                 <option value="Italy" {{ $display->physical_country == 'Italy' ? 'selected' : '' }}>Italy</option>
                                 <option value="Japan" {{ $display->physical_country == 'Japan' ? 'selected' : '' }}>Japan</option>
                                 <option value="Kenya" {{ $display->physical_country == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                 <option value="Malaysia" {{ $display->physical_country == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                                 <option value="Mexico" {{ $display->physical_country == 'Mexico' ? 'selected' : '' }}>Mexico</option>
                                 <option value="Netherlands" {{ $display->physical_country == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
                                 <option value="New Zealand" {{ $display->physical_country == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
                                 <option value="Nigeria" {{ $display->physical_country == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                                 <option value="Norway" {{ $display->physical_country == 'Norway' ? 'selected' : '' }}>Norway</option>
                                 <option value="Pakistan" {{ $display->physical_country == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                                 <option value="Philippines" {{ $display->physical_country == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                                 <option value="Poland" {{ $display->physical_country == 'Poland' ? 'selected' : '' }}>Poland</option>
                                 <option value="Portugal" {{ $display->physical_country == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                                 <option value="Qatar" {{ $display->physical_country == 'Qatar' ? 'selected' : '' }}>Qatar</option>
                                 <option value="Russia" {{ $display->physical_country == 'Russia' ? 'selected' : '' }}>Russia</option>
                                 <option value="Saudi Arabia" {{ $display->physical_country == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                                 <option value="Singapore" {{ $display->physical_country == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                                 <option value="South Africa" {{ $display->physical_country == 'South Africa' ? 'selected' : '' }}>South Africa</option>
                                 <option value="South Korea" {{ $display->physical_country == 'South Korea' ? 'selected' : '' }}>South Korea</option>
                                 <option value="Spain" {{ $display->physical_country == 'Spain' ? 'selected' : '' }}>Spain</option>
                                 <option value="Sri Lanka" {{ $display->physical_country == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
                                 <option value="Sweden" {{ $display->physical_country == 'Sweden' ? 'selected' : '' }}>Sweden</option>
                                 <option value="Switzerland" {{ $display->physical_country == 'Switzerland' ? 'selected' : '' }}>Switzerland</option>
                                 <option value="Thailand" {{ $display->physical_country == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                                 <option value="Turkey" {{ $display->physical_country == 'Turkey' ? 'selected' : '' }}>Turkey</option>
                                 <option value="United Arab Emirates" {{ $display->physical_country == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
                                 <option value="United Kingdom" {{ $display->physical_country == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                 <option value="United States" {{ $display->physical_country == 'United States' ? 'selected' : '' }}>United States</option>
                                 <option value="Vietnam" {{ $display->physical_country == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
                                 <option value="Zambia" {{ $display->physical_country == 'Zambia' ? 'selected' : '' }}>Zambia</option>
                                 <option value="Zimbabwe" {{ $display->physical_country == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="website" class="form-label">Physical Post Code</label>
                              <input 
                                 type="text" 
                                 class="form-control" 
                                 id="website" 
                                 name="physical_post_code" 
                                 value="{{ $display->physical_post_code }}">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="office-number" class="form-label">Main Office Number</label>
                              <input 
                                 type="text" 
                                 id="office-number" 
                                 name="office_number" 
                                 value="{{ $display->office_number }}" 
                                 class="form-control">
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="direct-line" class="form-label">Direct Line</label>
                              <input 
                                 type="text" 
                                 id="direct-line" 
                                 name="direct_line" 
                                 value="{{ $display->direct_line }}" 
                                 class="form-control">
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="mobile-number" class="form-label">Mobile Number</label>
                           <input 
                              type="text" 
                              id="mobile-number" 
                              name="mobile_number" 
                              value="{{ $display->mobile_number }}" 
                              class="form-control">
                        </div>
                        <div class="form-section row">
                           <div class="col-md-6 mb-3">
                              <label for="email" class="form-label">Email Address</label>
                              <input 
                                 type="email" 
                                 class="form-control" 
                                 id="email" 
                                 name="email_address" 
                                 value="{{ $display->email_address }}">
                           </div>
                           <div class="col-md-6">
                              <label for="website" class="form-label">Website</label>
                              <input 
                                 type="text" 
                                 class="form-control" 
                                 id="website" 
                                 name="website" 
                                 value="{{ $display->website }}">
                           </div>
                        </div>
                        <div class="form-section">
                           <label class="form-label">Business Activity (Tick all that are relevant)</label>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-check">
                                    <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    id="financial-adviser" 
                                    value="yes" 
                                    name="financial_adviser" 
                                    {{ $display->financial_adviser == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="financial-adviser">Financial Adviser</label>
                                 </div>
                                 <div class="form-check">
                                    <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    id="insurance-broker" 
                                    value="yes" 
                                    name="insurance_broker" 
                                    {{ $display->insurance_broker == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="insurance-broker">Insurance Broker</label>
                                 </div>
                                 <div class="form-check">
                                    <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    id="asset-manager" 
                                    value="yes" 
                                    name="asset_manager" 
                                    {{ $display->asset_manager == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="asset-manager">Asset Manager</label>
                                 </div>
                                 <div class="form-check">
                                    <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    id="accountant" 
                                    value="yes" 
                                    name="accountant" 
                                    {{ $display->accountant == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="accountant">Accountant</label>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-check">
                                    <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    id="tax-adviser" 
                                    value="yes" 
                                    name="tax_adviser" 
                                    {{ $display->tax_adviser == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tax-adviser">Tax Adviser</label>
                                 </div>
                                 <div class="form-check">
                                    <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    id="lawyer" 
                                    value="yes" 
                                    name="lawyer" 
                                    {{ $display->lawyer == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="lawyer">Lawyer</label>
                                 </div>
                                 <div class="form-check">
                                    <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    id="other" 
                                    value="yes" 
                                    name="other_business_activity" 
                                    {{ $display->other_business_activity == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="other">Other</label>
                                 </div>
                                 <input 
                                    type="text" 
                                    class="form-control mt-2" 
                                    id="other-specify" 
                                    name="other_business_specify" 
                                    value="{{ $display->other_business_specify }}">
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
                              value="{{ $display->licensing_body }}">
                           <label for="reg-number" class="form-label">Registration/Licensing Reference</label>
                           <input 
                              type="text" 
                              class="form-control" 
                              name="licensing_reference" 
                              value="{{ $display->licensing_reference }}">
                        </div>
                        <div class="form-section">
                           <label class="form-label">Any restrictions imposed?</label>
                           <div class="form-check">
                              <input 
                              class="form-check-input" 
                              type="radio" 
                              name="restrictions" 
                              id="restrictions-yes" 
                              value="yes" 
                              {{ $display->restrictions == 'yes' ? 'checked' : '' }}>
                              <label class="form-check-label" for="restrictions-yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input 
                              class="form-check-input" 
                              type="radio" 
                              name="restrictions" 
                              id="restrictions-no" 
                              value="no" 
                              {{ $display->restrictions == 'no' ? 'checked' : '' }}>
                              <label class="form-check-label" for="restrictions-no">No</label>
                           </div>
                           <textarea 
                              class="form-control mt-2" 
                              rows="3" 
                              name="restrictions_imposed" 
                              placeholder="If yes, please provide details">{{ $display->restrictions_imposed }}</textarea>
                        </div>
                        <div class="form-section">
                           <label class="form-label">Regulatory Permissions</label>
                           <div class="form-check">
                              <input 
                              class="form-check-input" 
                              type="checkbox" 
                              id="permissions-insurance" 
                              value="yes" 
                              name="insurance" 
                              {{ $display->insurance == 'yes' ? 'checked' : '' }}>
                              <label class="form-check-label" for="permissions-insurance">Insurance</label>
                           </div>
                           <div class="form-check">
                              <input 
                              class="form-check-input" 
                              type="checkbox" 
                              id="permissions-investment" 
                              value="yes" 
                              name="investment" 
                              {{ $display->investment == 'yes' ? 'checked' : '' }}>
                              <label class="form-check-label" for="permissions-investment">Investment</label>
                           </div>
                        </div>
                        <div class="form-section row">
                           <div class="col-md-6 mb-3">
                              <label for="last-visit" class="form-label">Date of Last Regulatory Visit</label>
                              <input 
                                 type="date" 
                                 class="form-control" 
                                 id="last-visit" 
                                 name="regulatory_visit" 
                                 value="{{ $display->regulatory_visit }}">
                           </div>
                           <div class="col-md-6">
                              <label for="follow-up" class="form-label">Date of Follow-Up (if applicable)</label>
                              <input 
                                 type="date" 
                                 class="form-control" 
                                 id="follow-up" 
                                 name="date_follow" 
                                 value="{{ $display->date_follow }}">
                           </div>
                        </div>
                        <div class="form-section">
                           <label class="form-label">Any areas highlighted for review?</label>
                           <div class="form-check">
                              <input 
                              class="form-check-input" 
                              type="radio" 
                              name="areas_review" 
                              id="areas-yes" 
                              value="yes" 
                              {{ $display->areas_review == 'yes' ? 'checked' : '' }}>
                              <label class="form-check-label" for="areas-yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input 
                              class="form-check-input" 
                              type="radio" 
                              name="areas_review" 
                              id="areas-no" 
                              value="no" 
                              {{ $display->areas_review == 'no' ? 'checked' : '' }}>
                              <label class="form-check-label" for="areas-no">No</label>
                           </div>
                           <textarea 
                              class="form-control mt-2" 
                              rows="3" 
                              name="highlighted_review" 
                              placeholder="If yes, please provide details">{{ $display->highlighted_review }}</textarea>
                        </div>
                        <div class="form-section">
                           <label for="geo-cover" class="form-label">Geographical Cover & Percentage Breakdown</label>
                           <textarea 
                              class="form-control" 
                              id="geo-cover" 
                              name="percentage_breakdown" 
                              rows="3">{{ $display->percentage_breakdown }}</textarea>
                        </div>
                        <div class="form-section row">
                           <div class="col-md-6 mb-3">
                              <label for="insurance-level" class="form-label">Level of Professional Indemnity Insurance</label>
                              <input 
                                 type="text" 
                                 class="form-control" 
                                 id="insurance-level" 
                                 name="professional_indemnity" 
                                 value="{{ $display->professional_indemnity }}">
                           </div>
                           <div class="col-md-6">
                              <label class="form-label">Do you have separate Cyber Security Insurance?</label>
                              <div class="form-check">
                                 <input 
                                 class="form-check-input" 
                                 type="radio" 
                                 name="cyber_insurance" 
                                 id="cyber-yes" 
                                 value="yes" 
                                 {{ $display->cyber_insurance == 'yes' ? 'checked' : '' }}>
                                 <label class="form-check-label" for="cyber-yes">Yes</label>
                              </div>
                              <div class="form-check">
                                 <input 
                                 class="form-check-input" 
                                 type="radio" 
                                 name="cyber_insurance" 
                                 id="cyber-no" 
                                 value="no" 
                                 {{ $display->cyber_insurance == 'no' ? 'checked' : '' }}>
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
               class="form-check-input" 
               type="radio" 
               id="face-to-face-yes" 
               name="face_to_face" 
               value="Yes" 
               {{ $display->face_to_face === 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="face-to-face-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" 
               type="radio" 
               id="face-to-face-no" 
               name="face_to_face" 
               value="No" 
               {{ $display->face_to_face === 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="face-to-face-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have a non-face-to-face policy?</label>
               <div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" 
               type="radio" 
               id="non-face-policy-yes" 
               name="non_face_policy" 
               value="Yes" 
               {{ $display->non_face_policy === 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="non-face-policy-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" 
               type="radio" 
               id="non-face-policy-no" 
               name="non_face_policy" 
               value="No" 
               {{ $display->non_face_policy === 'No' ? 'checked' : '' }}>
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
                  class="form-control" 
                  placeholder="%" 
                  value="{{ $display->high_risk }}">
               </div>
               <div class="col-md-4">
               <label for="standard-risk" class="form-label">Standard</label>
               <input 
                  type="number" 
                  id="standard-risk" 
                  name="standard_risk" 
                  class="form-control" 
                  placeholder="%" 
                  value="{{ $display->standard_risk }}">
               </div>
               <div class="col-md-4">
               <label for="low-risk" class="form-label">Low</label>
               <input 
                  type="number" 
                  id="low-risk" 
                  name="low_risk" 
                  class="form-control" 
                  placeholder="%" 
                  value="{{ $display->low_risk }}">
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have relationships with sanctioned or sensitive jurisdictions?</label>
               <div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" 
               type="radio" 
               id="sanctioned-yes" 
               name="sanctioned" 
               value="Yes" 
               {{ $display->sanctioned === 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="sanctioned-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" 
               type="radio" 
               id="sanctioned-no" 
               name="sanctioned" 
               value="No" 
               {{ $display->sanctioned === 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="sanctioned-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Will you refer these relationships to Altruist?</label>
               <div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" 
               type="radio" 
               id="refer-yes" 
               name="refer" 
               value="Yes" 
               {{ $display->refer === 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="refer-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input 
               class="form-check-input" 
               type="radio" 
               id="refer-no" 
               name="refer" 
               value="No" 
               {{ $display->refer === 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="refer-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have a Client Risk Policy?</label>
               <div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" id="client-risk-yes" name="client_risk" value="Yes" {{ $display->client_risk == 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="client-risk-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" id="client-risk-no" name="client_risk" value="No" {{ $display->client_risk == 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="client-risk-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label for="kyc-revisit" class="form-label">How often do you revisit Client KYC/CDD?</label>
               <input type="text" id="kyc-revisit" name="kyc_revisit" class="form-control" value="{{ $display->kyc_revisit }}">
               </div>
               <div class="mb-3">
               <label class="form-label">Do you accept clients classed, in any form, as PEPs?</label>
               <div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" id="accept-peps-yes" name="accept_peps" value="Yes" {{ $display->accept_peps == 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="accept-peps-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" id="accept-peps-no" name="accept_peps" value="No" {{ $display->accept_peps == 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="accept-peps-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have a PEP policy?</label>
               <div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" id="pep-policy-yes" name="pep_policy" value="Yes" {{ $display->pep_policy == 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="pep-policy-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" id="pep-policy-no" name="pep_policy" value="No" {{ $display->pep_policy == 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="pep-policy-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Is enhanced due diligence requested for all high risk and/or PEP relationships?</label>
               <div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" id="due-diligence-yes" name="due_diligence" value="Yes" {{ $display->due_diligence == 'Yes' ? 'checked' : '' }}>
               <label class="form-check-label" for="due-diligence-yes">Yes</label>
               </div>
               <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" id="due-diligence-no" name="due_diligence" value="No" {{ $display->due_diligence == 'No' ? 'checked' : '' }}>
               <label class="form-check-label" for="due-diligence-no">No</label>
               </div>
               </div>
               </div>
               <div class="mb-3">
               <label for="additional-details" class="form-label">If yes, please provide details</label>
               <textarea id="additional-details" name="provide_details" class="form-control" rows="3">{{ $display->provide_details }}</textarea>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you collect and maintain details for clients?</label>
               <div>
               <input type="radio" id="collectYes" name="collectDetails" value="yes" 
               {{ $display->collectDetails == 'yes' ? 'checked' : '' }}> 
               <label for="collectYes">Yes</label>
               <input type="radio" id="collectNo" name="collectDetails" value="no" 
               {{ $display->collectDetails == 'no' ? 'checked' : '' }}> 
               <label for="collectNo">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have written policies covering this?</label>
               <div>
               <input type="radio" id="policiesYes" name="writtenPolicies" value="yes" 
               {{ $display->writtenPolicies == 'yes' ? 'checked' : '' }}> 
               <label for="policiesYes">Yes</label>
               <input type="radio" id="policiesNo" name="writtenPolicies" value="no" 
               {{ $display->writtenPolicies == 'no' ? 'checked' : '' }}> 
               <label for="policiesNo">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label for="reviewDocuments" class="form-label">How often do you revisit & review documents?</label>
               <input type="text" id="reviewDocuments" name="reviewDocuments" class="form-control" value="{{ $display->reviewDocuments }}">
               </div>
               <div class="mb-3">
               <label class="form-label">Do you provide updated documents to providers?</label>
               <div>
               <input type="radio" id="updateYes" name="updatedDocuments" value="yes" 
               {{ $display->updatedDocuments == 'yes' ? 'checked' : '' }}> 
               <label for="updateYes">Yes</label>
               <input type="radio" id="updateNo" name="updatedDocuments" value="no" 
               {{ $display->updatedDocuments == 'no' ? 'checked' : '' }}> 
               <label for="updateNo">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have AML & CTF policies in place?</label>
               <div>
               <input type="radio" id="amlYes" name="amlPolicies" value="yes" 
               {{ $display->amlPolicies == 'yes' ? 'checked' : '' }}> 
               <label for="amlYes">Yes</label>
               <input type="radio" id="amlNo" name="amlPolicies" value="no" 
               {{ $display->amlPolicies == 'no' ? 'checked' : '' }}> 
               <label for="amlNo">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label for="trainingFrequency" class="form-label">How often is AML & CTF training issued?</label>
               <input type="text" id="trainingFrequency" name="trainingFrequency" class="form-control" value="{{ $display->trainingFrequency }}">
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have an internal compliance function?</label>
               <div>
               <input type="radio" id="complianceYes" name="internalCompliance" value="yes" 
               {{ $display->internalCompliance == 'yes' ? 'checked' : '' }}> 
               <label for="complianceYes">Yes</label>
               <input type="radio" id="complianceNo" name="internalCompliance" value="no" 
               {{ $display->internalCompliance == 'no' ? 'checked' : '' }}> 
               <label for="complianceNo">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label for="complianceApproval" class="form-label">When does compliance approve business cases?</label>
               <input type="text" id="complianceApproval" name="complianceApproval" class="form-control" value="{{ $display->complianceApproval }}">
               </div>
               <div class="mb-3">
               <label for="complianceComments" class="form-label">Compliance function comments (if applicable)</label>
               <textarea id="complianceComments" name="complianceComments" class="form-control">{{ $display->complianceComments }}</textarea>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you maintain country lists for any of the following (tick all that apply):</label>
               <div>
               <input type="checkbox" id="highRisk" name="countryLists_highRisk" value="highRisk"  {{ $display->countryLists_highRisk == 'highRisk' ? 'checked' : '' }}> <label for="highRisk">High Risk</label><br>
               <input type="checkbox" id="fatf" name="countryLists_fatf" value="fatf" {{ $display->countryLists_fatf == 'fatf' ? 'checked' : '' }}> <label for="fatf">FATF Blacklisted</label><br>
               <input type="checkbox" id="sanctioned" name="countryLists_sanctioned" value="sanctioned" {{ $display->countryLists_sanctioned == 'sanctioned' ? 'checked' : '' }}> <label for="sanctioned">Sanctioned Countries</label><br>
               <input type="checkbox" id="corruption" name="countryLists_corruption" value="corruption" {{ $display->countryLists_corruption == 'corruption' ? 'checked' : '' }}> <label for="corruption">Risk of Corruption</label><br>
               <input type="checkbox" id="complianceAlert" name="countryLists_complianceAlert" value="complianceAlert" {{ $display->countryLists_complianceAlert == 'complianceAlert' ? 'checked' : '' }}> <label for="complianceAlert">Compliance Alert</label><br>
               <input type="checkbox" id="drugTrafficking" name="countryLists_drugTrafficking" value="drugTrafficking" {{ $display->countryLists_drugTrafficking == 'drugTrafficking' ? 'checked' : '' }}> <label for="drugTrafficking">Major Drug Trafficking</label>
               </div>
               </div>
               <div class="mb-3">
               <label for="additionalComments" class="form-label">Any additional comments on country lists</label>
               <textarea id="additionalComments" name="additionalComments" class="form-control">{{ $display->additionalComments }}</textarea>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have systems & controls in place to screen transactions?</label>
               <div>
               <input type="radio" id="systemsYes" name="screenSystems" value="yes" {{ $display->screenSystems == 'yes' ? 'checked' : '' }}> <label for="systemsYes">Yes</label>
               <input type="radio" id="systemsNo" name="screenSystems" value="no" {{ $display->screenSystems == 'no' ? 'checked' : '' }}> <label for="systemsNo">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Are you able to identify transactions deemed to be high risk?</label>
               <div>
               <input type="radio" id="highRiskYes" name="identifyHighRisk" value="yes" {{ $display->identifyHighRisk == 'yes' ? 'checked' : '' }}> <label for="highRiskYes">Yes</label>
               <input type="radio" id="highRiskNo" name="identifyHighRisk" value="no" {{ $display->identifyHighRisk == 'no' ? 'checked' : '' }}> <label for="highRiskNo">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you record details of:</label>
               <div>
               <input type="checkbox" id="intendedTransactions" name="recordDetails_intended" value="intended" {{ $display->recordDetails_intended == 'intended' ? 'checked' : '' }}> <label for="intendedTransactions">Intended Client Transactions</label><br>
               <input type="checkbox" id="expectedAmounts" name="recordDetails_expected" value="expected" {{ $display->recordDetails_expected == 'expected' ? 'checked' : '' }}> <label for="expectedAmounts">Expected Volume Amounts</label><br>
               <input type="checkbox" id="perTransaction" name="recordDetails_perTransaction" value="perTransaction" {{ $display->recordDetails_perTransaction == 'perTransaction' ? 'checked' : '' }}> <label for="perTransaction">Per Transaction</label>
               </div>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you undertake & record risk assessments for each new relationship?</label>
               <div class="form-check">
               <input class="form-check-input" type="radio" id="risk-yes" name="risk_assessment" value="Yes" {{ $display->risk_assessment == 'Yes' ? 'checked' : '' }}>
               <label for="risk-yes" class="form-check-label">Yes</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" type="radio" id="risk-no" name="risk_assessment" value="No" {{ $display->risk_assessment == 'No' ? 'checked' : '' }}>
               <label for="risk-no" class="form-check-label">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label for="risk-details" class="form-label">If yes, please provide details</label>
               <textarea id="risk-details" name="risk_details" rows="3" class="form-control">{{ $display->risk_details }}</textarea>
               </div>
               <div class="mb-3">
               <label for="client-fee-structure" class="form-label">Please provide details of the client fee structure, indicating whether it is deemed industry standard</label>
               <textarea id="client-fee-structure" name="client_fee_structure" rows="3" class="form-control">{{ $display->client_fee_structure }}</textarea>
               </div>
               <div class="mb-3">
               <label class="form-label">Do you have in-house investment products & offset fees against annual management fees?</label>
               <div class="form-check">
               <input class="form-check-input" type="radio" id="products-yes" name="investment_products" value="Yes" {{ $display->investment_products == 'Yes' ? 'checked' : '' }}>
               <label for="products-yes" class="form-check-label">Yes</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" type="radio" id="products-no" name="investment_products" value="No" {{ $display->investment_products == 'No' ? 'checked' : '' }}>
               <label for="products-no" class="form-check-label">No</label>
               </div>
               </div>
               <div class="mb-3">
               <label for="products-details" class="form-label">If yes, please provide details</label>
               <textarea id="products-details" name="products_details" rows="3" class="form-control">{{ $display->products_details }}</textarea>
               </div>
               <div class="mb-3">
               <label class="form-label">Please tick the boxes below to confirm which investments you will be selecting in respect of your Clients:</label>
               <div class="row">
               <div class="col-md-6">
               <div class="form-check">
               <input class="form-check-input" type="checkbox" id="platform-wrap" name="platform_WRAP" value="Platform / WRAP" {{ $display->platform_WRAP ? 'checked' : '' }}>
               <label for="platform-wrap" class="form-check-label">Platform / WRAP</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" type="checkbox" id="funds" name="funds_platform" value="Funds (direct not via a Platform)" {{ $display->funds_platform ? 'checked' : '' }}>
               <label for="funds" class="form-check-label">Funds (direct not via a Platform)</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" type="checkbox" id="non-mass-market" name="market_investments" value="Non Mass Market Investments" {{ $display->market_investments ? 'checked' : '' }}>
               <label for="non-mass-market" class="form-check-label">Non Mass Market Investments</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" type="checkbox" id="restricted-mass-market" name="restricted_mass" value="Restricted Mass Market Investments" {{ $display->restricted_mass ? 'checked' : '' }}>
               <label for="restricted-mass-market" class="form-check-label">Restricted Mass Market Investments</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" type="checkbox" id="deposit-accounts" name="deposit_accounts" value="Deposit Accounts"{{ $display->deposit_accounts ? 'checked' : '' }}>
               <label for="deposit-accounts" class="form-check-label">Deposit Accounts</label>
               </div>
               </div>
               <div class="col-md-6">
               <div class="form-check">
               <input class="form-check-input" type="checkbox" id="advisory-stockbroker" name="advisory_stockbroker" value="Advisory Stockbroker" {{ $display->advisory_stockbroker ? 'checked' : '' }}>
               <label for="advisory-stockbroker" class="form-check-label">Advisory Stockbroker</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" type="checkbox" id="dfm-model-portfolios" name="model_portfolios" value="DFM / Model Portfolios" {{ $display->model_portfolios ? 'checked' : '' }}>
               <label for="dfm-model-portfolios" class="form-check-label">DFM / Model Portfolios</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" type="checkbox" id="high-risk-investments" name="investments_defined" value="High Risk Investments as defined by FCA" {{ $display->investments_defined ? 'checked' : '' }}>
               <label for="high-risk-investments" class="form-check-label">High Risk Investments as defined by FCA</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" type="checkbox" id="structured-deposits" name="structured_deposits" value="Structured Deposits" {{ $display->structured_deposits ? 'checked' : '' }}>
               <label for="structured-deposits" class="form-check-label">Structured Deposits</label>
               </div>
               <div class="form-check">
               <input class="form-check-input" type="checkbox" id="commercial-property" name="commercial_property" value="Commercial Property" {{ $display->commercial_property ? 'checked' : '' }}>
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
               <input type="text" id="title" name="title" class="form-control" value="{{ $display->title }}">
               </div>
               <div class="col-md-6">
               <label for="other-details" class="form-label">If other, please provide details</label>
               <input type="text" id="other-details" name="please_details" class="form-control" value="{{ $display->please_details }}">
               </div>
               </div>
               <div class="mb-3">
               <label for="surname" class="form-label">Surname</label>
               <input type="text" id="surname" name="surname" class="form-control" value="{{ $display->surname }}">
               </div>
               <div class="mb-3">
               <label for="forenames" class="form-label">Forename(s)</label>
               <input type="text" id="forenames" name="forenames" class="form-control" value="{{ $display->forenames }}">
               </div>
               <div class="mb-3">
               <label for="profession" class="form-label">Profession and name of professional body with registration no.</label>
               <input type="text" id="profession" name="profession" class="form-control" value="{{ $display->profession }}">
               </div>
               <div class="mb-3">
               <label for="qualifications" class="form-label">Qualifications</label>
               <input type="text" id="qualifications" name="qualifications" class="form-control" value="{{ $display->qualifications }}">
               </div>
               <div class="mb-3">
               <label for="certifiers-address" class="form-label">Certifier's Address</label>
               <textarea id="certifiers-address" name="certifiers_address" rows="3" class="form-control">{{ $display->certifiers_address }}</textarea>
               </div>
               <div class="row mb-3">
               <div class="col-md-6">
               <label for="country" class="form-label">Country</label>
               <select id="country" name="country" class="form-control">
               <option value="">Select Country</option>
               <option value="Afghanistan" {{ $display->country == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
               <option value="Albania" {{ $display->country == 'Albania' ? 'selected' : '' }}>Albania</option>
               <option value="Algeria" {{ $display->country == 'Algeria' ? 'selected' : '' }}>Algeria</option>
               <option value="Andorra" {{ $display->country == 'Andorra' ? 'selected' : '' }}>Andorra</option>
               <option value="Angola" {{ $display->country == 'Angola' ? 'selected' : '' }}>Angola</option>
               <option value="Argentina" {{ $display->country == 'Argentina' ? 'selected' : '' }}>Argentina</option>
               <option value="Australia" {{ $display->country == 'Australia' ? 'selected' : '' }}>Australia</option>
               <option value="Austria" {{ $display->country == 'Austria' ? 'selected' : '' }}>Austria</option>
               <option value="Azerbaijan" {{ $display->country == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
               <option value="Bahrain" {{ $display->country == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
               <option value="Bangladesh" {{ $display->country == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
               <option value="Belgium" {{ $display->country == 'Belgium' ? 'selected' : '' }}>Belgium</option>
               <option value="Brazil" {{ $display->country == 'Brazil' ? 'selected' : '' }}>Brazil</option>
               <option value="Canada" {{ $display->country == 'Canada' ? 'selected' : '' }}>Canada</option>
               <option value="China" {{ $display->country == 'China' ? 'selected' : '' }}>China</option>
               <option value="Denmark" {{ $display->country == 'Denmark' ? 'selected' : '' }}>Denmark</option>
               <option value="Egypt" {{ $display->country == 'Egypt' ? 'selected' : '' }}>Egypt</option>
               <option value="France" {{ $display->country == 'France' ? 'selected' : '' }}>France</option>
               <option value="Germany" {{ $display->country == 'Germany' ? 'selected' : '' }}>Germany</option>
               <option value="India" {{ $display->country == 'India' ? 'selected' : '' }}>India</option>
               <option value="Indonesia" {{ $display->country == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
               <option value="Iran" {{ $display->country == 'Iran' ? 'selected' : '' }}>Iran</option>
               <option value="Iraq" {{ $display->country == 'Iraq' ? 'selected' : '' }}>Iraq</option>
               <option value="Ireland" {{ $display->country == 'Ireland' ? 'selected' : '' }}>Ireland</option>
               <option value="Italy" {{ $display->country == 'Italy' ? 'selected' : '' }}>Italy</option>
               <option value="Japan" {{ $display->country == 'Japan' ? 'selected' : '' }}>Japan</option>
               <option value="Kenya" {{ $display->country == 'Kenya' ? 'selected' : '' }}>Kenya</option>
               <option value="Malaysia" {{ $display->country == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
               <option value="Mexico" {{ $display->country == 'Mexico' ? 'selected' : '' }}>Mexico</option>
               <option value="Netherlands" {{ $display->country == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
               <option value="New Zealand" {{ $display->country == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
               <option value="Nigeria" {{ $display->country == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
               <option value="Norway" {{ $display->country == 'Norway' ? 'selected' : '' }}>Norway</option>
               <option value="Pakistan" {{ $display->country == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
               <option value="Philippines" {{ $display->country == 'Philippines' ? 'selected' : '' }}>Philippines</option>
               <option value="Poland" {{ $display->country == 'Poland' ? 'selected' : '' }}>Poland</option>
               <option value="Portugal" {{ $display->country == 'Portugal' ? 'selected' : '' }}>Portugal</option>
               <option value="Qatar" {{ $display->country == 'Qatar' ? 'selected' : '' }}>Qatar</option>
               <option value="Russia" {{ $display->country == 'Russia' ? 'selected' : '' }}>Russia</option>
               <option value="Saudi Arabia" {{ $display->country == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
               <option value="Singapore" {{ $display->country == 'Singapore' ? 'selected' : '' }}>Singapore</option>
               <option value="South Africa" {{ $display->country == 'South Africa' ? 'selected' : '' }}>South Africa</option>
               <option value="South Korea" {{ $display->country == 'South Korea' ? 'selected' : '' }}>South Korea</option>
               <option value="Spain" {{ $display->country == 'Spain' ? 'selected' : '' }}>Spain</option>
               <option value="Sri Lanka" {{ $display->country == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
               <option value="Sweden" {{ $display->country == 'Sweden' ? 'selected' : '' }}>Sweden</option>
               <option value="Switzerland" {{ $display->country == 'Switzerland' ? 'selected' : '' }}>Switzerland</option>
               <option value="Thailand" {{ $display->country == 'Thailand' ? 'selected' : '' }}>Thailand</option>
               <option value="Turkey" {{ $display->country == 'Turkey' ? 'selected' : '' }}>Turkey</option>
               <option value="United Arab Emirates" {{ $display->country == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
               <option value="United Kingdom" {{ $display->country == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
               <option value="United States" {{ $display->country == 'United States' ? 'selected' : '' }}>United States</option>
               <option value="Vietnam" {{ $display->country == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
               <option value="Zambia" {{ $display->country == 'Zambia' ? 'selected' : '' }}>Zambia</option>
               <option value="Zimbabwe" {{ $display->country == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
               </select>
               </div>
               <div class="col-md-6">
               <label for="post-code" class="form-label">Post Code</label>
               <input type="text" id="post-code" name="post_code" class="form-control" value="{{ $display->post_code }}">
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
               @if(isset($display->company_structure_chart))
               <div class="mb-2">
               <a href="https://newalltrust.ilcorpdev.com{{ $display->company_structure_chart }}" target="_blank">
               View Company structure chart
               </a>
               </div>
               @endif
               <input type="file" name="company_structure_chart" id="company_structure_chart" class="form-control" />
               </div>
               <div class="col-md-6 mb-3">
               <label for="company_register_shareholder">Register of directors and shareholders</label>
               @if(isset($display->company_register_shareholder))
               <div class="mb-2">
               <a href="https://newalltrust.ilcorpdev.com{{ $display->company_register_shareholder }}" target="_blank">
               View Register of directors and shareholders
               </a>
               </div>
               @endif
               <input type="file" name="company_register_shareholder" id="company_register_shareholder" class="form-control" />
               </div>
               </div>
               </div>
               <div class="col-md-12">
               <div class="row">
               <div class="col-md-12 mb-3">
               <label for="company_authorised_signatory">Authorised signatory list</label>
               @if(isset($display->company_authorised_signatory))
               <div class="mb-2">
               <a href="https://newalltrust.ilcorpdev.com{{ $display->company_authorised_signatory }}" target="_blank">
               View Authorised signatory list
               </a>
               </div>
               @endif
               <input type="file" name="company_authorised_signatory" id="company_authorised_signatory" class="form-control" />
               </div>
               <div class="col-md-12 mb-3">
               <label for="appointed_text">If you are an appointed representative of another firm, we also require the following:</label>
               <input type="text" name="appointed_text" id="appointed_text" value="{{ $display->appointed_text }}" placeholder="Contact email address for directors and shareholders over 25%" class="form-control" />
               </div>
               <div class="col-md-12 mb-3">
               <label  for="">Multiple File Uplode</label>
               @php
               $data = $display->adviser_multifiles;
               $multiple = json_decode($data);
               @endphp
               @if($data)
               @foreach($multiple as $file)
               <a href="{{$file}}" class="m-5"><i class="ti ti-file" style="font-size:40px;"></i></a>
               @endforeach
               @endif
               <input type="file" multiple name="adviser_multifiles[]" class="form-control" />
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
               <input type="text" id="full-name-1" name="full_name_1" class="form-control" value="{{ $display->full_name_1 }}">
               </div>
               <div class="col-md-6">
               <label for="position-1" class="form-label">Position</label>
               <input type="text" id="position-1" name="position_1" class="form-control" value="{{ $display->position_1 }}">
               </div>
               </div>
               <div class="row mb-3">
               <div class="col-md-12">       
               <label  for="signature_1">Financial Adviser's Signature <i class="ti ti-signature"></i></label>
               <br>
               @if ($display->signature_1)
               <img src="{{url( $display->signature_1 )}}" alt="Signature" style="width: 200px; height: auto;">
               @endif
               <canvas id="signature_pad"></canvas>
               <br><button type="button" id="clear" class="btn btn-danger">Clear</button>
               <button type="button" id="save1" class="btn btn-primary">Save</button>
               <input type="hidden" name="signature_1" id="signature_1" class="form-control" value="{{ old('signature_1', $signature1 ?? '') }}"/>
               <br>
               <label for="signature_file">Upload File</label>
               <input type="file" name="signature_file" id="signature_file" class="form-control">                                                                                                              
               </div>
               </div>
               <div class="col-md-12">
               <label class="form-label">Date Signed</label>
               <input type="date" class="form-control" name="date_signed_1" value="{{ $display->date_signed_1 }}">
               </div>
               <div class="row mb-3">
               <div class="col-md-6">
               <label for="full-name-2" class="form-label">Full Name</label>
               <input type="text" id="full-name-2" name="full_name_2" class="form-control" value="{{ $display->full_name_2 }}">
               </div>
               <div class="col-md-6">
               <label for="position-2" class="form-label">Position</label>
               <input type="text" id="position-2" name="position_2" class="form-control" value="{{ $display->position_2 }}">
               </div>
               </div>
               <div class="row mb-3">
               <div class="col-md-12">       
               <label  for="signature-2">Financial Adviser's Signature <i class="ti ti-signature"></i></label>
               <br>
               @if ($display->signature_2)
               <img src="{{url($display->signature_2 )}}" alt="Signature" style="width: 200px; height: auto;">
               @endif
               <canvas id="signature_pad_two"></canvas>
               <br>
               <button type="button" id="clear_two" class="btn btn-danger">Clear</button>
               <button type="button" id="save2" class="btn btn-primary">Save</button>
               <input type="hidden" name="signature-2" id="signature-2" class="form-control" value="{{ old('signature_2', $signature2 ?? '') }}"/>
               <br>
               <label for="file_upload">Upload File</label>
               <input type="file" name="file_upload" id="file_upload" class="form-control">                                                                                                              
               </div>
               </div>
               <div class="col-md-12">
               <label class="form-label">Date Signed</label>
               <input type="date" class="form-control" name="date_signed_2" value="{{ $display->date_signed_2 }}">
               </div>
               <div class="col-12 d-flex justify-content-between mt-3">
               <button class="btn btn-label-secondary btn-prev">
               <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
               <span class="align-middle d-sm-inline-block d-none">Previous</span>
               </button>
               <button type="submit" class="btn btn-success btn-submit">
               <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Submit</span>
               <i class="ti ti-arrow-right ti-xs"></i>
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