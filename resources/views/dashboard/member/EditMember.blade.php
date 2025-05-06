@extends('dashboard.dashboard')
@section('content')
<style>
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
                  <form id="multiStepsForm" method="POST" enctype="multipart/form-data" action="{{ route('member-form-update') }}">
                     @csrf
                     <input type="hidden" name="member_id" value="{{$editMember->id}}">
                     <div id="multiStepsValidation" class="bs-stepper border-none shadow-none mt-5">
                        <div id="adviserDetails" class="content" style="display: block;">
                           <div class="row g-6">
                              <div id="multiStepValidation" class="bs-stepper border-none shadow-none mt-5">
                                 <div class="bs-stepper-content px-0">
                                    <div id="stepPersonal" class="form-step" style="display: block;">
                                       <div class="content-header mb-6">
                                          <h4 class="mb-4">Personal Details</h4>
                                       </div>
                                       <div class="row g-10 mt-3">
                                          <div class="row">
                                             <div class="col-md-6 form-group mb-3">
                                                <label for="title">Title</label>
                                                <select class="form-control" id="title" name="title">
                                                   <option value="">Select Title</option>
                                                   <option value="Mr">Mr</option>
                                                   <option value="Mr" {{ @$editMember->title == 'Mr' ? 'selected' : '' }}>Mr</option>
                                                   <option value="Mrs" {{ @$editMember->title == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                                   <option value="Miss" {{ @$editMember->title == 'Miss' ? 'selected' : '' }}>Miss</option>
                                                   <option value="Other" {{ @$editMember->title == 'Other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                             </div>
                                             <div class=" col-md-6 form-group mb-3">
                                                <label for="forename">Forename</label>
                                                <input type="text" class="form-control" id="forename" name="forename" placeholder="Forename" value="{{@$editMember->forename}}">
                                             </div>
                                             <div class="col-md-6 form-group mb-3">
                                                <label for="surname">Surname</label>
                                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" value="{{@$editMember->surname}}">
                                             </div>
                                             <div class="col-md-6 form-group mb-3">
                                                <label for="dob">Date of Birth</label>
                                                <input type="date" class="form-control" id="dob" name="dob" value="{{@$editMember->dob}}">
                                             </div>
                                             <div class=" col-md-6 form-group mb-3">
                                                <label for="previous_name">Previous name(s) (including maiden name):</label>
                                                <input type="text" class="form-control" id="previous_name" name="previous_name" placeholder="Previous name(s) (e.g., maiden name)" value="{{@$editMember->previous_name}}">
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                <label for="address">Permanent Residential Address</label>
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{@$editMember->address}}">
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                <label for="postcode">Postcode</label>
                                                <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode" value="{{@$editMember->postcode}}">
                                             </div>
                                             <div class="col-md-6">
                                                <label for="country">Country</label>
                                                <select class="form-control" id="country" name="country">
                                                @php
                                                $countries = [
                                                "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
                                                "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
                                                "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi",
                                                "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia",
                                                "Comoros", "Congo (Brazzaville)", "Congo (Kinshasa)", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic",
                                                "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea",
                                                "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany",
                                                "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary",
                                                "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan",
                                                "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia",
                                                "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali",
                                                "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique",
                                                "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea",
                                                "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru",
                                                "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", 
                                                "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", 
                                                "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa",
                                                "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan",
                                                "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", 
                                                "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay",
                                                "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
                                                ];
                                                @endphp
                                                
                                                @foreach($countries as $country)
                                                <option value="{{ $country }}" {{ old('country', $editMember->country ?? '') == $country ? 'selected' : '' }}>
                                                {{ $country }}
                                                </option>
                                                @endforeach
                                                </select>
                                             </div>
                                             <div class="col-md-6 form-group mb-3">
                                                <label for="time_spent_address">Time spent at address</label>
                                                <input type="text" class="form-control" id="time_spent_address" name="time_spent_address" value="{{@$editMember->time_spent_address}}">
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                <label for="previous_address">Previous Residential Address:</label>
                                                <input type="text" class="form-control" id="previous_address" name="previous_address" placeholder="Previous Residential Address" value="{{@$editMember->previous_address}}">
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                <label for="previous_residential_postcode">Postcode</label>
                                                <input type="text" class="form-control" id="previous_residential_postcode" name="previous_residential_postcode" placeholder="Postcode" value="{{@$editMember->previous_residential_postcode}}">
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                <label for="previous_residential_country">Country</label>
                                                <select class="form-control" id="previous_residential_country" name="previous_residential_country">
                                                @php
                                                $countries = [
                                                "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
                                                "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
                                                "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi",
                                                "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia",
                                                "Comoros", "Congo (Brazzaville)", "Congo (Kinshasa)", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic",
                                                "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea",
                                                "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany",
                                                "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary",
                                                "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan",
                                                "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia",
                                                "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali",
                                                "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique",
                                                "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea",
                                                "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru",
                                                "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", 
                                                "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", 
                                                "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa",
                                                "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan",
                                                "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", 
                                                "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay",
                                                "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
                                                ];
                                                @endphp
                                                @foreach($countries as $country)
                                                <option value="{{ $country }}" {{ old('country', $editMember->previous_residential_country ?? '') == $country ? 'selected' : '' }}>
                                                {{ $country }}
                                                </option>
                                                @endforeach
                                                </select>
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                <label for="telephone">Telephone Number</label>
                                                <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Enter Telephone Number" value="{{ @$editMember->telephone }}">
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                <label for="email">Email Address</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ @$editMember->email }}">
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                <label for="ni_number">National Insurance Number:</label>
                                                <input type="text" class="form-control" id="ni_number" name="ni_number" placeholder="National Insurance Number" value="{{ @$editMember->ni_number }}">
                                             </div>
                                             <div class="col-md-6 form-group mb-3">
                                                <label for="utr">Unique Tax Payer Reference (Tax Identification Number (TIN))</label>
                                                <input type="number" class="form-control" id="utr" name="utr" value="{{ @$editMember->utr }}">
                                             </div>
                                             <div class="col-md-6 form-group mb-3">
                                                <label for="nationality">Nationality/Citizenship</label>
                                                <select class="form-control" id="nationality" name="nationality">
                                                @php
                                                $countries = [
                                                "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
                                                "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
                                                "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi",
                                                "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia",
                                                "Comoros", "Congo (Brazzaville)", "Congo (Kinshasa)", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic",
                                                "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea",
                                                "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany",
                                                "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary",
                                                "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan",
                                                "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia",
                                                "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali",
                                                "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique",
                                                "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea",
                                                "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru",
                                                "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", 
                                                "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", 
                                                "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa",
                                                "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan",
                                                "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", 
                                                "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay",
                                                "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
                                                ];
                                                @endphp
                                                @foreach($countries as $country)
                                                <option value="{{ $country }}" {{ old('country', $editMember->nationality ?? '') == $country ? 'selected' : '' }}>
                                                {{ $country }}
                                                </option>
                                                @endforeach
                                                </select>
                                             </div>
                                             <div class="col-md-6 form-group mb-3">
                                                <label for="marital_status">Marital Status</label>
                                                <select class="form-control" id="marital_status" name="marital_status">
                                                <option value="married" {{ @$editMember->marital_status == 'married' ? 'selected' : '' }}>Married</option>
                                                <option value="divorced" {{ @$editMember->marital_status == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                                <option value="widowed" {{ @$editMember->marital_status == 'widowed' ? 'selected' : '' }}>Widowed</option>
                                                <option value="separated" {{ @$editMember->marital_status == 'separated' ? 'selected' : '' }}>Separated</option>
                                                <option value="single" {{ @$editMember->marital_status == 'single' ? 'selected' : '' }}>Single</option>
                                                </select>
                                             </div>
                                             <div class="col-md-6 form-group mb-3">
                                                <label>What is your employment status?</label><br>
                                                <select class="form-control" name="employment_status">
                                                   <option value="" selected disabled>Select employment status</option>
                                                   <option value="employed" {{ @$editMember->employment_status == 'employed' ? 'selected' : '' }}>Employed</option>
                                                   <option value="dependent" {{ @$editMember->employment_status == 'dependent' ? 'selected' : '' }}>Caring for child under 16 or dependent</option>
                                                   <option value="unemployed" {{ @$editMember->employment_status == 'unemployed' ? 'selected' : '' }}>Unemployed</option>
                                                   <option value="education" {{ @$editMember->employment_status == 'education' ? 'selected' : '' }}>In full-time education</option>
                                                   <option value="professional" {{ @$editMember->employment_status == 'professional' ? 'selected' : '' }}>Professional</option>
                                                   <option value="pensioner" {{ @$editMember->employment_status == 'pensioner' ? 'selected' : '' }}>Pensioner (please state previous occupation below)</option>
                                                   <option value="self_employed" {{ @$editMember->employment_status == 'self_employed' ? 'selected' : '' }}>Self-employed (Director/Partner is not self-employed unless a sole trader contractor please confirm in what industry).</option>
                                                   <option value="other" {{ @$editMember->employment_status == 'other' ? 'selected' : '' }}>Other, please state below current or previous occupation.</option>
                                                </select>
                                             </div>
                                             <div class="col-md-6 form-group mb-3">
                                                <label for="emp_name">Employer Name</label>
                                                <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Enter employer name" value="{{ @$editMember->emp_name }}">
                                             </div>
                                             <div class="col-md-6 form-group mb-3">
                                                <label for="j_title">Job Title</label>
                                                <input type="text" class="form-control" id="j_title" name="j_title" placeholder="Enter your job title" value="{{ @$editMember->j_title }}">
                                             </div>
                                             <div class="col-md-6 form-group mb-3">
                                                <label for="occupation">Occupation</label>
                                                <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter your occupation" value="{{ @$editMember->occupation }}">
                                             </div>
                                             <div class="form-group mb-3">
                                                <label>Have you opted out of any occupational or employer-sponsored, pension arrangement in favour of this pension arrangement?</label><br>
                                                <div class="form-check form-check-inline">
                                                   <input class="form-check-input" type="radio" name="opt_out" id="optOutYes" value="Yes" {{ @$editMember->opt_out == 'Yes' ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="optOutYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                   <input class="form-check-input" type="radio" name="opt_out" id="optOutNo" value="No" {{ @$editMember->opt_out == 'No' ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="optOutNo">No</label>
                                                </div>
                                             </div>
                                             <div class="form-group mb-3">
                                                <label>Do you have protection of existing pension rights with HMRC?</label><br>
                                                <div class="form-check form-check-inline">
                                                   <input class="form-check-input" type="radio" name="pension_protection" id="protectionYes" value="Yes" {{ @$editMember->pension_protection == 'Yes' ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="protectionYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                   <input class="form-check-input" type="radio" name="pension_protection" id="protectionNo" value="No" {{ @$editMember->pension_protection == 'No' ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="protectionNo">No</label>
                                                </div>
                                             </div>
                                             <div class="form-group mb-3">
                                                <label>If ‘YES’ please confirm which of the following are applicable:</label><br>
                                                <div class="form-check">
                                                   <input class="form-check-input" type="checkbox" id="primary_protection" name="applicable_protection1" {{ @$editMember->applicable_protection1 ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="primary_protection">Primary Protection</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" type="checkbox" id="enhanced_lifetime" name="applicable_protection2" {{ @$editMember->applicable_protection2 ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="enhanced_lifetime">Enhanced Lifetime Allowance</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" type="checkbox" id="individual_2014" name="applicable_protection3" {{ @$editMember->applicable_protection3 ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="individual_2014">Individual Protection 2014</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" type="checkbox" id="primary_lump" name="applicable_protection4" {{ @$editMember->applicable_protection4 ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="primary_lump">Primary Protection with Lump Sum Protection</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" type="checkbox" id="fixed_2012" name="applicable_protection5" {{ @$editMember->applicable_protection5 ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="fixed_2012">Fixed Protection 2012</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" type="checkbox" id="individual_2016" name="applicable_protection6" {{ @$editMember->applicable_protection6 ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="individual_2016">Individual Protection 2016</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" type="checkbox" id="enhanced_protection" name="applicable_protection7" {{ @$editMember->applicable_protection7 ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="enhanced_protection">Enhanced Protection</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" type="checkbox" id="fixed_2014" name="applicable_protection8" {{ @$editMember->applicable_protection8 ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="fixed_2014">Fixed Protection 2014</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" type="checkbox" id="enhanced_lump" name="applicable_protection9" {{ @$editMember->applicable_protection9 ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="enhanced_lump">Enhanced Protection with Lump Sum Protection</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" type="checkbox" id="fixed_2016" name="applicable_protection10" {{ @$editMember->applicable_protection10 ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="fixed_2016">Fixed Protection 2016</label>
                                                </div>
                                             </div>
                                             <div class="form-group mb-3">
                                                <label>Are you subject to the money purchase annual allowance?</label><br>
                                                <div class="form-check form-check-inline">
                                                   <input class="form-check-input" type="radio" name="annual_allowance" id="allowanceYes" value="Yes" {{ @$editMember->annual_allowance == 'Yes' ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="allowanceYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                   <input class="form-check-input" type="radio" name="annual_allowance" id="allowanceNo" value="No" {{ @$editMember->annual_allowance == 'No' ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="allowanceNo">No</label>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="form-group mb-3">
                                                   <label>If Yes, please confirm the date the first payment occurred</label>
                                                   <input type="date" class="form-control" id="first_payment_date" name="first_payment_date" value="{{ @$editMember->first_payment_date }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                   <label>Have you received any Lump Sum and Death Benefit Allowance? If you have please confirm how much you have received</label>
                                                   <input type="text" class="form-control" id="lump_sum_amount" name="lump_sum_amount" value="{{ @$editMember->lump_sum_amount }}">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev" disabled>
                              <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                              <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                              <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                              <i class="ti ti-arrow-right ti-xs"></i>
                              </button>
                           </div>
                        </div>
                        <div id="personalInfoValidation" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4 class="mb-0">Source of wealth</h4>
                           </div>
                           <div class="row g-6">
                              <div class="container mt-4">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <label>Annual income from employment/self-employment</label>
                                       <input type="number" class="form-control" name="income_employment" value="{{ @$editMember->income_employment }}">
                                    </div>
                                    <div class="col-md-6">
                                       <label>Annual Income from pension</label>
                                       <input type="number" class="form-control" name="income_pension" value="{{ @$editMember->income_pension }}">
                                    </div>
                                    <div class="col-md-6">
                                       <label>Income from savings/investments</label>
                                       <input type="number" class="form-control" name="income_savings" value="{{ @$editMember->income_savings }}">
                                    </div>
                                    <div class="col-md-6">
                                       <label>Gifted funds</label>
                                       <input type="number" class="form-control" name="income_gifted" value="{{ @$editMember->income_gifted }}">
                                    </div>
                                    <div class="col-md-6">
                                       <label>Lottery and/or other winnings</label>
                                       <input type="number" class="form-control" name="income_lottery" value="{{ @$editMember->income_lottery }}">
                                    </div>
                                    <div class="col-md-6">
                                       <label>Property</label>
                                       <input type="text" class="form-control" name="income_property" value="{{ @$editMember->income_property }}">
                                    </div>
                                    <div class="col-md-6">
                                       <label>Inheritance</label>
                                       <input type="number" class="form-control" name="income_inheritance" value="{{ @$editMember->income_inheritance }}">
                                    </div>
                                    <div class="col-md-6">
                                       <label>Divorce Settlements</label>
                                       <input type="number" class="form-control" name="income_divorce" value="{{ @$editMember->income_divorce }}">
                                    </div>
                                    <div class="col-md-12">
                                       <label>Other (Please state)</label>
                                       <input type="text" class="form-control" name="income_other" value="{{ @$editMember->income_other }}">
                                    </div>
                                 </div>
                                 <div class="form-group mb-3">
                                    <label>Are any of your assets located outside of the UK? If yes, please give details.</label><br>
                                    <div class="form-check form-check-inline">
                                       <input type="radio" class="form-check-input" name="assets_outside_uk" id="assetsYes" value="yes" {{ @$editMember->assets_outside_uk == 'yes' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="assetsYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                       <input type="radio" class="form-check-input" name="assets_outside_uk" id="assetsNo" value="no" {{ @$editMember->assets_outside_uk == 'no' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="assetsNo">No</label>
                                    </div>
                                 </div>
                                 <div class="form-group mb-3">
                                    <label>If yes, please give details:</label>
                                    <textarea class="form-control" name="assets_details" rows="3">{{ @$editMember->assets_details }}</textarea>
                                 </div>
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                 <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                 </button>
                                 <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="personalInfoValidation" class="content" style="display: none;">
                           <div class="row g-6">
                              <h4>Entitlement to Tax Relief</h4>
                              <p>Please tick one box only:</p>
                              <div class="form-group">
                                 <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="tax_relief" id="option1" value="option1" {{ @$editMember->tax_relief == 'option1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="option1">
                                    I have relevant UK earnings chargeable to UK income tax, and I have been resident in the UK some time during the current tax year.
                                    </label>
                                 </div>
                                 <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="tax_relief" id="option2" value="option2" {{ @$editMember->tax_relief == 'option2' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="option2">
                                    I have general earnings from overseas Crown employment subject to UK tax in the current tax year.
                                    </label>
                                 </div>
                                 <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="tax_relief" id="option3" value="option3" {{ @$editMember->tax_relief == 'option3' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="option3">
                                    My spouse/civil partner has general earnings from overseas Crown employment subject to UK tax in the current tax year.
                                    </label>
                                 </div>
                                 <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="tax_relief" id="option4" value="option4" {{ @$editMember->tax_relief == 'option4' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="option4">
                                    I am not resident in the UK in the current tax year, but
                                    – I was resident in the UK at some time during the five tax years immediately before the tax year in question,
                                    and
                                    – I was resident in the UK when I joined the pension scheme, and
                                    – I have relevant UK earnings chargeable to UK income tax.
                                    </label>
                                 </div>
                                 <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="tax_relief" id="option5" value="option5" {{ @$editMember->tax_relief == 'option5' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="option5">
                                    I have no relevant UK earnings chargeable to income tax, but I have been resident in the UK some time during the current tax year.
                                    </label>
                                 </div>
                                 <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="tax_relief" id="option6" value="option6" {{ @$editMember->tax_relief == 'option6' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="option6">
                                    I or my spouse/civil partner are in overseas Crown employment but do not have general earnings subject to UK tax in the current tax year.
                                    </label>
                                 </div>
                                 <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="tax_relief" id="option7" value="option7" {{ @$editMember->tax_relief == 'option7' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="option7">
                                    I cannot tick any of the above, but
                                    – I was resident in the UK, or had earnings chargeable to UK income tax, at some time during the five years
                                    immediately before the tax year in question, and
                                    – I was resident in the UK when I joined the pension scheme.
                                    </label>
                                 </div>
                                 <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="tax_relief" id="option8" value="option8" {{ @$editMember->tax_relief == 'option8' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="option8">
                                    I cannot tick any of the above.
                                    </label>
                                 </div>
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                 <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                 </button>
                                 <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="bank_details" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4 class="mb-0">Financial Adviser</h4>
                           </div>
                           <div class="row g-6">
                              <p>Please give details of your financial adviser. Correspondence will normally be sent to your financial adviser.</p>
                              <div class="row">
                                 <div class="form-group col-md-6 mb-3">
                                    <label for="financial_contact_name">Contact Name</label>
                                    <input type="text" class="form-control" id="financial_contact_name" name="financial_contact_name" placeholder="Enter contact name" value="{{ @$editMember->financial_contact_name }}">
                                 </div>
                                 <div class="form-group col-md-6 mb-3">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" id="financial_company_name" name="financial_company_name" placeholder="Enter company name" value="{{ @$editMember->financial_company_name }}">
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="form-group col-6 mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control mb-2" id="street_address" name="street_address" placeholder="Street Address" value="{{ @$editMember->street_address }}">
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="financial_postcode">Postcode</label>
                                    <input type="text" class="form-control" id="financial_postcode" name="financial_postcode" placeholder="Postcode" value="{{ @$editMember->financial_postcode }}">
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="city">Country</label>
                                    <select class="form-control" id="city" name="city">
                                    @php
                                    $countries = [
                                    "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
                                    "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
                                    "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi",
                                    "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia",
                                    "Comoros", "Congo (Brazzaville)", "Congo (Kinshasa)", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic",
                                    "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea",
                                    "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany",
                                    "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary",
                                    "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan",
                                    "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia",
                                    "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali",
                                    "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique",
                                    "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea",
                                    "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru",
                                    "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", 
                                    "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", 
                                    "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa",
                                    "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan",
                                    "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", 
                                    "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay",
                                    "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
                                    ];
                                    @endphp
                                    
                                    @foreach($countries as $country)
                                    <option value="{{ $country }}" {{ old('country', $editMember->city ?? '') == $country ? 'selected' : '' }}>
                                    {{ $country }}
                                    </option>
                                    @endforeach
                                    </select>
                                 </div>
                                 <div class="col-md-6">
                                    <label for="financial_telephone_number">Telephone Number</label>
                                    <input type="text" class="form-control mb-2" id="financial_telephone_number" name="financial_telephone_number" placeholder="Enter telephone number" value="{{ @$editMember->financial_telephone_number }}">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="financial_email_address">Email Address</label>
                                    <input type="email" class="form-control" id="financial_email_address" name="financial_email_address" placeholder="Enter email address" value="{{ @$editMember->financial_email_address }}">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="regulated_by">Regulated By</label>
                                    <input type="text" class="form-control" id="regulated_by" name="regulated_by" placeholder="Enter regulated authority" value="{{ @$editMember->regulated_by }}">
                                 </div>
                                 <div class="form-group col-md-6 mb-3">
                                    <label for="authorisation_number">Authorisation Number</label>
                                    <input type="text" class="form-control" id="authorisation_number" name="authorisation_number" placeholder="Enter authorisation number" value="{{ @$editMember->authorisation_number }}">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="network_name">Name of Network or Principal</label>
                                    <input type="text" class="form-control" id="network_name" name="network_name" placeholder="Enter name of network or principal" value="{{ @$editMember->network_name }}">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="regulated_by_second">Regulated By (Again)</label>
                                    <input type="text" class="form-control" id="regulated_by_second" name="regulated_by_second" placeholder="Enter regulated authority again" value="{{ @$editMember->regulated_by_second }}">
                                 </div>
                                 <div class="col-md-6">
                                    <label for="company_authorisation_number">Company Authorisation Number</label>
                                    <input type="text" class="form-control" id="company_authorisation_number" name="company_authorisation_number" placeholder="Enter company authorisation number" value="{{ @$editMember->company_authorisation_number }}">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="financial_adviser_remuneration">Financial Adviser Remuneration</label>
                                    <input type="text" class="form-control" id="financial_adviser_remuneration" name="financial_adviser_remuneration" value="{{ @$editMember->financial_adviser_remuneration }}">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label>Initial Fees (%/£):</label>
                                    <input type="text" class="form-control" name="initial_fees" value="{{ @$editMember->initial_fees }}">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="ongoing_fees">Ongoing Fees (%/£)</label>
                                    <input type="text" class="form-control" id="ongoing_fees" name="ongoing_fees" value="{{ @$editMember->ongoing_fees }}">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label>Frequency:</label>
                                    <input type="text" class="form-control" name="frequency" value="{{ @$editMember->frequency }}">
                                 </div>
                                 <div class="mb-3">
                                    <input class="form-check-input" type="checkbox" id="scheme_establishment" name="scheme_establishment" 
                                    value="following_establishment" {{ @$editMember->scheme_establishment == 'following_establishment' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="scheme_establishment">
                                    To be paid following scheme establishment
                                    </label>
                                    <div class="row mb-2">
                                       <div class="col-md-4">
                                          <input class="form-check-input" type="checkbox" id="date_option" name="date_option" 
                                          value="specific_date" {{ @$editMember->date_option == 'specific_date' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="date_option">or date</label>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="d-flex">
                                             <input type="date" class="form-control date-input" id="date_input" name="date_day" 
                                                value="{{ @$editMember->date_day }}">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                        const schemeEstablishment = document.getElementById("scheme_establishment");
                                        const dateOption = document.getElementById("date_option");
                                        const dateInput = document.getElementById("date_input");
                                        function toggleDateFields() {
                                            if (schemeEstablishment.checked) {
                                                dateOption.disabled = true;
                                                dateInput.disabled = true;
                                            } else {
                                                dateOption.disabled = false;
                                                dateInput.disabled = false;
                                            }
                                        }
                                        schemeEstablishment.addEventListener("change", toggleDateFields);
                                    });
                                 </script>
                                 <div class="row mb-3">
                                    <label for="annual_fee" class="form-label">Annual Fee: £</label>
                                 </div>
                                 <div class="mb-3">
                                    <div class="mb-2">
                                       <input class="form-check-input" type="checkbox" id="scheme_anniversary"
                                       name="scheme_anniversary" value="on_anniversary" 
                                       {{ @$editMember->scheme_anniversary == 'on_anniversary' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="scheme_anniversary">
                                       To be paid on the scheme anniversary
                                       </label>
                                    </div>
                                    <div class="row mb-2">
                                       <div class="col-md-4">
                                          <input class="form-check-input" type="checkbox" id="date_option2" name="date_option2"
                                          value="specific_date" {{ @$editMember->date_option2 == 'specific_date' ? 'checked' : '' }}>
                                          <label class="form-check-label" for="date_option2">or date</label>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="d-flex">
                                             <input type="date" class="form-control date-input" name="date2_day"
                                                value="{{ @$editMember->date2_day }}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <span>and annually thereafter</span>
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
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="BD_Transfer" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4 class="mb-0"> Beneficiaries </h4>
                           </div>
                           <div class="row g-6">
                              <h5>Nomination of Beneficiaries and Charity</h5>
                              <p>In the event of your death, please confirm the percentage split of any benefits you wish to be paid to your nominated beneficiaries.</p>
                              <hr>
                              <p>If you wish to nominate a charity/charities this should be done now as it cannot be left to the operator’s discretion.</p>
                              <div class="beneficiary-section">
                                 <table class="table table-bordered">
                                    <thead>
                                       <tr>
                                          <th>Name of Dependant/Beneficiary</th>
                                          <th>Relationship</th>
                                          <th>Percentage (%)</th>
                                          <th>Actions</th>
                                       </tr>
                                    </thead>
                                    <tbody id="beneficiary-list">
                                       @php
                                       $beneficiaryNames = json_decode($editMember->beneficiary_name ?? '[]', true);
                                       $relationships = json_decode($editMember->beneficiary_relationship ?? '[]', true);
                                       $percentages = json_decode($editMember->beneficiary_percentage ?? '[]', true);
                                       $maxLength = max(count($beneficiaryNames), count($relationships), count($percentages));
                                       @endphp
                                       @for ($index = 0; $index < $maxLength; $index++)
                                       <tr>
                                          <td><input type="text" class="form-control" name="beneficiary_name[]" value="{{ $beneficiaryNames[$index] ?? '' }}"></td>
                                          <td><input type="text" class="form-control" name="beneficiary_relationship[]" value="{{ $relationships[$index] ?? '' }}"></td>
                                          <td><input type="number" class="form-control" name="beneficiary_percentage[]" value="{{ $percentages[$index] ?? '' }}"></td>
                                          <td><button type="button" class="btn btn-danger remove-beneficiary">Remove</button></td>
                                       </tr>
                                       @endfor
                                    </tbody>
                                 </table>
                                 <button type="button" class="btn btn-primary" id="add-beneficiary">Add Beneficiary</button>
                              </div>
                              <hr>
                              <p>If you wish to nominate a charity/charities this should be done now as it cannot be left to the operator’s discretion.</p>
                              <div class="charity-section">
                                 <table class="table table-bordered">
                                    <thead>
                                       <tr>
                                          <th>Name of Charity</th>
                                          <th>Percentage (%)</th>
                                          <th>Actions</th>
                                       </tr>
                                    </thead>
                                    <tbody id="charity-list">
                                       @php
                                       $charityname = $editMember->charity_name ? json_decode($editMember->charity_name, true) ?? [] : [];
                                       $charitypercentage = $editMember->charity_percentage ? json_decode($editMember->charity_percentage, true) ?? [] : [];
                                       $charityLength = min(count($charityname ?? []), count($charitypercentage ?? []));
                                       @endphp
                                       @for ($index = 0; $index < $charityLength; $index++)
                                       <tr>
                                          <td><input type="text" class="form-control" name="charity_name[]" value="{{ $charityname[$index] ?? '' }}"></td>
                                          <td><input type="number" class="form-control" name="charity_percentage[]" value="{{ $charitypercentage[$index] ?? '' }}"></td>
                                          <td><button type="button" class="btn btn-danger remove-charity">Remove</button></td>
                                       </tr>
                                       @endfor
                                    </tbody>
                                 </table>
                                 <button type="button" class="btn btn-primary" id="add-charity">Add Charity</button>
                              </div>
                              <script>
                                 document.addEventListener('DOMContentLoaded', function () {
                                     const beneficiaryList = document.getElementById('beneficiary-list');
                                     const addBeneficiaryButton = document.getElementById('add-beneficiary');
                                     addBeneficiaryButton.addEventListener('click', function () {
                                         const newRow = document.createElement('tr');
                                         newRow.innerHTML = `
                                             <td><input type="text" class="form-control" name="beneficiary_name[]" value=""></td>
                                             <td><input type="text" class="form-control" name="beneficiary_relationship[]" value=""></td>
                                             <td><input type="number" class="form-control" name="beneficiary_percentage[]" value=""></td>
                                             <td><button type="button" class="btn btn-danger remove-beneficiary">Remove</button></td>
                                         `;
                                         beneficiaryList.appendChild(newRow);
                                         addRemoveEvent(newRow, 'beneficiary');
                                     });
                                     const charityList = document.getElementById('charity-list');
                                     const addCharityButton = document.getElementById('add-charity');
                                     addCharityButton.addEventListener('click', function () {
                                         const newRow = document.createElement('tr');
                                         newRow.innerHTML = `
                                             <td><input type="text" class="form-control" name="charity_name[]" value=""></td>
                                             <td><input type="number" class="form-control" name="charity_percentage[]" value=""></td>
                                             <td><button type="button" class="btn btn-danger remove-charity">Remove</button></td>
                                         `;
                                         charityList.appendChild(newRow);
                                         addRemoveEvent(newRow, 'charity');
                                     });
                                     function addRemoveEvent(row, type) {
                                         const removeButton = row.querySelector(`.remove-${type}`);
                                         removeButton.addEventListener('click', function () {
                                             row.remove();
                                         });
                                     }
                                     const existingBeneficiaryRows = beneficiaryList.querySelectorAll('tr');
                                     existingBeneficiaryRows.forEach(function (row) {
                                         addRemoveEvent(row, 'beneficiary');
                                     });
                                     const existingCharityRows = charityList.querySelectorAll('tr');
                                     existingCharityRows.forEach(function (row) {
                                         addRemoveEvent(row, 'charity');
                                     });
                                 });
                              </script>
                              <div class="col-12 d-flex justify-content-between">
                                 <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                 </button>
                                 <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="polocoesCrime" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4>Personal Contributions</h4>
                           </div>
                           <div class="row g-6">
                              <div class="col-md-6 mb-3">
                                 <label for="contribute_regular_contribution">Regular Contribution</label>
                                 <input type="text" class="form-control" id="contribute_regular_contribution" name="contribute_regular_contribution" placeholder="Enter amount" value="{{ @$editMember->contribute_regular_contribution }}">
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label for="contribute_single_contribution">Single Contribution</label>
                                 <input type="text" class="form-control" id="contribute_single_contribution" name="contribute_single_contribution" placeholder="Enter amount"value="{{ @$editMember->contribute_single_contribution }}">
                              </div>
                              <div class="form-group mb-3">
                                 <label for="source_of_funds">Source of Funds (Remitting bank details, beneficial owner of the funds, and the origin of the funds).</label>
                                 <textarea class="form-control" id="source_of_funds" name="source_of_funds" rows="3" placeholder="Enter remitting bank details, beneficial owner, and origin of funds">{{ @$editMember->source_of_funds }}</textarea>
                              </div>
                              <div class="form-group mb-3">
                                 <label>Regular Contribution Payment Frequency</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_frequency" id="monthly" value="Monthly" {{ @$editMember->payment_frequency == 'Monthly' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="monthly">Monthly</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_frequency" id="quarterly" value="Quarterly" {{ @$editMember->payment_frequency == 'Quarterly' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="quarterly">Quarterly</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_frequency" id="half_yearly" value="Half-yearly" {{ @$editMember->payment_frequency == 'Half-yearly' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="half_yearly">Half-yearly</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_frequency" id="yearly" value="Yearly" {{ @$editMember->payment_frequency == 'Yearly' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="yearly">Yearly</label>
                                 </div>
                              </div>
                              <div class="col-12 form-group mb-3">
                                 <label for="start_date">Start Date for Regular Contributions</label>
                                 <input type="date" class="form-control" id="start_date" name="start_date" value="{{ @$editMember->start_date }}">
                              </div>
                              <div class="form-group mb-3">
                                 <label>Will your employer pay your personal contributions on your behalf?</label><br>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="employer_pay" id="employerYes" value="Yes" {{ @$editMember->employer_pay == 'Yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="employerYes">Yes</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="employer_pay" id="employerNo" value="No" {{ @$editMember->employer_pay == 'No' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="employerNo">No</label>
                                 </div>
                              </div>
                              <div class="alert alert-info mt-3">
                                 If YES, the employer details section of this form must be completed.
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                 <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                 </button>
                                 <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="non_standard_assets" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4 class="mb-0">Employer Details</h4>
                           </div>
                           <div class="row g-6">
                              <p>Please complete this section if your employer will be contributing to your SIPP or paying your personal contributions on your behalf.</p>
                              <div class="row">
                                 <div class="form-group mb-3 col-6">
                                    <label for="employer_name">Name</label>
                                    <input type="text" class="form-control" id="employer_name" name="employer_name" value="{{ @$editMember->employer_name }}" placeholder="Enter employer name">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="reg_address">Registered Address (if applicable)</label>
                                    <input type="text" class="form-control" id="reg_address" name="reg_address" value="{{ @$editMember->reg_address }}">
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="employer_details_country">Country (for Registered Address)</label>
                                    <select class="form-control" id="employer_details_country" name="employer_details_country">
                                    @php
                                    $countries = [
                                    "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
                                    "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
                                    "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi",
                                    "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia",
                                    "Comoros", "Congo (Brazzaville)", "Congo (Kinshasa)", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic",
                                    "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea",
                                    "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany",
                                    "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary",
                                    "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan",
                                    "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia",
                                    "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali",
                                    "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique",
                                    "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea",
                                    "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru",
                                    "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", 
                                    "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", 
                                    "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa",
                                    "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan",
                                    "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", 
                                    "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay",
                                    "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
                                    ];
                                    @endphp
                                    
                                    @foreach($countries as $country)
                                    <option value="{{ $country }}" {{ old('country', $editMember->employer_details_country ?? '') == $country ? 'selected' : '' }}>
                                    {{ $country }}
                                    </option>
                                    @endforeach
                                    </select>
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="employee_postcode">Postcode (for Registered Address)</label>
                                    <input type="text" class="form-control" id="employee_postcode" name="employee_postcode" value="{{ @$editMember->employee_postcode }}" placeholder="Enter postcode">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="telephone_number">Telephone Number (for Registered Address)</label>
                                    <input type="text" class="form-control" id="telephone_number" name="telephone_number" value="{{ @$editMember->telephone_number }}" placeholder="Enter telephone number">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="email_address">Email Address (for Registered Address)</label>
                                    <input type="email" class="form-control" id="email_address" name="email_address" value="{{ @$editMember->email_address }}" placeholder="Enter email address">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="trading_address">Trading Address (if different from above)</label>
                                    <input type="text" class="form-control" id="trading_address" name="trading_address" value="{{ @$editMember->trading_address }}" placeholder="Enter trading address">
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="trading_address_country">Country (for Trading Address)</label>
                                    <select class="form-control" id="trading_address_country" name="trading_address_country">
                                    @php
                                    $countries = [
                                    "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
                                    "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
                                    "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi",
                                    "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia",
                                    "Comoros", "Congo (Brazzaville)", "Congo (Kinshasa)", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic",
                                    "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea",
                                    "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany",
                                    "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary",
                                    "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan",
                                    "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia",
                                    "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali",
                                    "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique",
                                    "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea",
                                    "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru",
                                    "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", 
                                    "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", 
                                    "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa",
                                    "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan",
                                    "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", 
                                    "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay",
                                    "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
                                    ];
                                    @endphp
                                    
                                    @foreach($countries as $country)
                                    <option value="{{ $country }}" {{ old('country', $editMember->trading_address_country ?? '') == $country ? 'selected' : '' }}>
                                    {{ $country }}
                                    </option>
                                    @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group mb-3 col-md-6">
                                    <label for="trading_postcode">Postcode (for Trading Address)</label>
                                    <input type="text" class="form-control" id="trading_postcode" name="trading_postcode" value="{{ @$editMember->trading_postcode }}" placeholder="Enter postcode">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="trading_telephone_number">Telephone Number (for Trading Address)</label>
                                    <input type="text" class="form-control" id="trading_telephone_number" name="trading_telephone_number" value="{{ @$editMember->trading_telephone_number }}" placeholder="Enter telephone number">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="trading_email_address">Email Address (for Trading Address)</label>
                                    <input type="email" class="form-control" id="trading_email_address" name="trading_email_address" value="{{ @$editMember->trading_email_address }}" placeholder="Enter email address">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="employer_status">Employer Status</label>
                                    <input type="text" class="form-control" id="employer_status" name="employer_status" value="{{ @$editMember->employer_status }}">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="business_name">Name of Business</label>
                                    <input type="text" class="form-control" id="business_name" name="business_name" value="{{ @$editMember->business_name }}">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="employer_year_end">Employer Year End</label>
                                    <input type="date" class="form-control" id="employer_year_end" name="employer_year_end" value="{{ @$editMember->employer_year_end }}">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="regist_number">Registration Number (If applicable)</label>
                                    <input type="text" class="form-control" id="regist_number" name="regist_number" value="{{ @$editMember->regist_number }}">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="join_date">Date You Joined Employer</label>
                                    <input type="date" class="form-control" id="join_date" name="join_date" value="{{ @$editMember->join_date }}">
                                 </div>
                                 <div class="form-group mb-3">
                                    <label>Are You a Director?</label><br>
                                    <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="is_director" id="directorYes" value="Yes" {{ @$editMember->is_director == 'Yes' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="directorYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="is_director" id="directorNo" value="No" {{ @$editMember->is_director == 'No' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="directorNo">No</label>
                                    </div>
                                 </div>
                                 <div class="form-group mb-3">
                                    <label for="director_date">Date You Became a Director</label>
                                    <input type="date" class="form-control" id="director_date" name="director_date" value="{{ @$editMember->director_date }}">
                                 </div>
                                 <div class="form-group mb-3">
                                    <label for="shareholdings">Please provide details of your shareholdings in the employer (if applicable)</label>
                                    <textarea class="form-control" id="shareholdings" name="shareholdings" rows="3">{{ @$editMember->shareholdings }}</textarea>
                                 </div>
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                 <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                 </button>
                                 <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="non_standard_assets" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4 class="mb-0">Employer Contributions</h4>
                           </div>
                           <div class="row g-6">
                              <p>This section is to be completed by the employer. Please confirm the level of contributions you propose to pay for this member.</p>
                              <div class="row">
                                 <div class=" col-md-6 form-group mb-3">
                                    <label for="gross_regular_contribution">Employer (Gross) - Regular Contribution</label>
                                    <input type="text" class="form-control" id="gross_regular_contribution" name="gross_regular_contribution" placeholder="Enter amount" value="{{ @$editMember->gross_regular_contribution }}">
                                 </div>
                                 <div class=" col-md-6 form-group mb-3">
                                    <label for="gross_single_contribution">Employer (Gross) - Single Contribution</label>
                                    <input type="text" class="form-control" id="gross_single_contribution" name="gross_single_contribution" placeholder="Enter amount" value="{{ @$editMember->gross_single_contribution }}">
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>Regular Contribution Payment Frequency</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gross_payment_frequency" id="monthly" value="Monthly" {{ @$editMember->gross_payment_frequency == 'Monthly' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="monthly">Monthly</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gross_payment_frequency" id="quarterly" value="Quarterly" {{ @$editMember->gross_payment_frequency == 'Quarterly' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="quarterly">Quarterly</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gross_payment_frequency" id="half_yearly" value="Half-yearly" {{ @$editMember->gross_payment_frequency == 'Half-yearly' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="half_yearly">Half-yearly</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gross_payment_frequency" id="yearly" value="Yearly" {{ @$editMember->gross_payment_frequency == 'Yearly' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="yearly">Yearly</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label for="gross_start_date">Start Date for Regular Contribution</label>
                                 <input type="date" class="form-control" id="gross_start_date" name="gross_start_date" value="{{ @$editMember->gross_start_date }}">
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                 <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                 </button>
                                 <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="non_standard_assets" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4 class="mb-0">Employer Declaration</h4>
                           </div>
                           <div class="row g-6">
                              <p>To be signed by an authorised signatory of the employer other than the member, unless the member is the only authorised signatory or self-employed.</p>
                              <div class="row">
                                 <div class="col-md-12 form-group mb-3">
                                    <label for="signatureAdviser">Signature <i class="ti ti-signature"></i></label>
                                    <br>
                                    @if ($editMember->signature_adviser)
                                    <img src="{{ $editMember->signature_adviser }}" alt="Signature" style="width: 200px; height: auto;">
                                    @endif
                                    <canvas id="signature_pad_1"></canvas>
                                    <br>
                                    <button type="button" class="btn btn-danger mx-2" id="clear_1">Clear</button>
                                    <button type="button" class="btn btn-primary mx-2" id="save_1">Save</button>
                                    <input type="hidden" name="signature_adviser" id="signatureAdviser_1" class="form-control" />
                                    <br>
                                    <label for="signature_file_1"> or Upload File for signature</label>
                                    <input type="file" name="signature_file" id="signature_file_1" class="form-control">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="declaration_print_name">Print Name</label>
                                    <input type="text" class="form-control" id="declaration_print_name" name="declaration_print_name" value="{{ @$editMember->declaration_print_name }}">
                                 </div>
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="declaration_position">Position</label>
                                    <input type="text" class="form-control" id="declaration_position" name="declaration_position" value="{{ @$editMember->declaration_position }}">
                                 </div>
                                 <div class="col-md-12 form-group mb-3">
                                    <label for="declaration_date">Date</label>
                                    <input type="date" class="form-control" id="declaration_date" name="declaration_date" value="{{ @$editMember->declaration_date }}">
                                 </div>
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                 <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                 </button>
                                 <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="non_standard_assets" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4 class="mb-0">Investment</h4>
                           </div>
                           <div class="row g-6">
                              <div class="g-6">
                                 <div class="mb-3">
                                    <div class="form-group col-md-6 mb-5">
                                       <label for="plan_type">Oasis SIPP</label>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="alltrust1" name="alltrust_platform" {{ @$editMember->alltrust_platform ? 'checked' : '' }}>
                                          <label class="form-check-label" for="alltrust1">Alltrust Platform</label>
                                       </div>
                                    </div>
                                    <div class="form-group col-md-12 mb-5">
                                       <label for="plan_type" class="mb-3">Full SIPP</label>
                                       <div class="row">
                                          <div class="col-md-6 d-flex flex-column gap-2">
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="ajBell" name="ajBell" {{ @$editMember->ajBell ? 'checked' : '' }}>
                                                <label class="form-check-label" for="ajBell">AJ Bell Investcentre</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="canaccord" name="canaccord" {{ @$editMember->canaccord ? 'checked' : '' }}>
                                                <label class="form-check-label" for="canaccord">Canaccord</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="kleinwort" name="kleinwort" {{ @$editMember->kleinwort ? 'checked' : '' }}>
                                                <label class="form-check-label" for="kleinwort">Kleinwort Hambros</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="quilter" name="quilter" {{ @$editMember->quilter ? 'checked' : '' }}>
                                                <label class="form-check-label" for="quilter">Quilter</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="rbc" name="rbc" {{ @$editMember->rbc ? 'checked' : '' }}>
                                                <label class="form-check-label" for="rbc">RBC Brewin Dolphin</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="stocktrade" name="stocktrade" {{ @$editMember->stocktrade ? 'checked' : '' }}>
                                                <label class="form-check-label" for="stocktrade">Stocktrade</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="transact" name="transact" {{ @$editMember->transact ? 'checked' : '' }}>
                                                <label class="form-check-label" for="transact">Transact</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="sim" name="sim" {{ @$editMember->sim ? 'checked' : '' }}>
                                                <label class="form-check-label" for="sim">7IM</label>
                                             </div>
                                          </div>
                                          <div class="col-md-6 d-flex flex-column gap-2">
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="brooks" name="brooks" {{ @$editMember->brooks ? 'checked' : '' }}>
                                                <label class="form-check-label" for="brooks">Brooks Macdonald</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="hubwise" name="hubwise" {{ @$editMember->hubwise ? 'checked' : '' }}>
                                                <label class="form-check-label" for="hubwise">Hubwise</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="lgt" name="lgt" {{ @$editMember->lgt ? 'checked' : '' }}>
                                                <label class="form-check-label" for="lgt">LGT Vestra</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="rathbones" name="rathbones" {{ @$editMember->rathbones ? 'checked' : '' }}>
                                                <label class="form-check-label" for="rathbones">Rathbones</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="scottishWidows" name="scottishWidows" {{ @$editMember->scottishWidows ? 'checked' : '' }}>
                                                <label class="form-check-label" for="scottishWidows">Scottish Widows platform</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="telford" name="telford" {{ @$editMember->telford ? 'checked' : '' }}>
                                                <label class="form-check-label" for="telford">Telford Mann</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="commercialProperty" name="commercialProperty" {{ @$editMember->commercialProperty ? 'checked' : '' }}>
                                                <label class="form-check-label" for="commercialProperty">Commercial Property</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="goldBullion" name="goldBullion" {{ @$editMember->goldBullion ? 'checked' : '' }}>
                                                <label class="form-check-label" for="goldBullion">Gold Bullion</label>
                                             </div>
                                          </div>
                                       </div>
                                       <p class="mt-3">Requests for an alternative provider can be considered on a case-by-case basis by submitting your request to 
                                          <a href="mailto:newbusiness@alltrust.co.uk">newbusiness@alltrust.co.uk</a>.
                                       </p>
                                       <div class="row">
                                          <div class="col-md-6 d-flex flex-column gap-2">
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="unlistedShares" name="unlistedShares" {{ @$editMember->unlistedShares ? 'checked' : '' }}>
                                                <label class="form-check-label" for="unlistedShares">Unlisted Shares</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="fixedDeposit" name="fixedDeposit" {{ @$editMember->fixedDeposit ? 'checked' : '' }}>
                                                <label class="form-check-label" for="fixedDeposit">Fixed Term Deposit</label>
                                             </div>
                                          </div>
                                          <div class="col-md-6 d-flex flex-column gap-2">
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="nsI" name="nsI" {{ @$editMember->nsI ? 'checked' : '' }}>
                                                <label class="form-check-label" for="nsI">NS&I Investment</label>
                                             </div>
                                             <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" id="other" name="othername" {{ @$editMember->othername ? 'checked' : '' }}>
                                                <label class="form-check-label" for="other">Other</label>
                                             </div>
                                          </div>
                                       </div>
                                       <textarea class="form-control mt-2" name="checkbox_textarea" placeholder="Please give details..."></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                 <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                 </button>
                                 <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="non_standard_assets" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4 class="mb-0">Taking Benefits</h4>
                           </div>
                           <div class="row g-6">
                              <div class="row g-6">
                                 <p>Please ensure you complete this section if you intend to take retirement benefits from your SIPP in the near future. Failure to complete this section may result in a delay paying your retirement benefits. Please note that pension payments can only be made once your SIPP has received the appropriate funds.</p>
                                 <p>Special terms and conditions apply to scheme pension, as it requires that we establish your SIPP under an individual trust. Further details of the additional fees and services applying to scheme pension are available on request.</p>
                                 <p>You should seek financial advice from a suitably qualified professional before taking benefits.</p>
                                 <div class="form-group mb-3">
                                    <label>Do you wish to take benefits or cash from this pension in the next 12 months?</label><br>
                                    <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="pension_benefits" id="benefitsYes" value="Yes" 
                                       {{ @$editMember->pension_benefits == 'Yes' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="benefitsYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="pension_benefits" id="benefitsNo" value="No" 
                                       {{ @$editMember->pension_benefits == 'No' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="benefitsNo">No</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                 <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                 </button>
                                 <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="non_standard_assets" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4 class="mb-0">Transfers to be made into this plan</h4>
                           </div>
                           <div class="row">
                              <p>Please provide details of the benefits from other arrangements you wish to transfer to your SIPP. Transfers and assignments to your SIPP can only be made once we have confirmed establishment of your SIPP.</p>
                              <div class="col-md-6 form-group mb-3">
                                 <label for="provider_name">Provider's Full Name and Address Name</label>
                                 <input type="text" class="form-control" id="provider_name" name="provider_name" placeholder="Enter provider's full name and address"value="{{ @$editMember->provider_name }}">
                              </div>
                              <div class="col-md-6 form-group mb-3">
                                 <label for="address">Address</label>
                                 <input type="text" class="form-control mb-2" id="address" name="other_benefits_address" placeholder="Enter address" value="{{ @$editMember->other_benefits_address }}">
                              </div>
                              <div class="form-group col-md-6 mb-3">
                                 <label for="other_benefits_country">Country</label>
                                 <select class="form-control" id="other_benefits_country" name="other_benefits_country">
                                 @php
                                 $countries = [
                                 "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
                                 "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
                                 "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi",
                                 "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia",
                                 "Comoros", "Congo (Brazzaville)", "Congo (Kinshasa)", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic",
                                 "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea",
                                 "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany",
                                 "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary",
                                 "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan",
                                 "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia",
                                 "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali",
                                 "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique",
                                 "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea",
                                 "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru",
                                 "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", 
                                 "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", 
                                 "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa",
                                 "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan",
                                 "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", 
                                 "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay",
                                 "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
                                 ];
                                 @endphp
                                 @foreach($countries as $country)
                                 <option value="{{ $country }}" {{ old('country', $editMember->other_benefits_country ?? '') == $country ? 'selected' : '' }}>
                                 {{ $country }}
                                 </option>
                                 @endforeach
                                 </select>
                              </div>
                              <div class="col-md-6 form-group mb-3">
                                 <label for="address">Postcode</label>
                                 <input type="text" class="form-control mb-2" id="other_benefits_postcode" name="other_benefits_postcode" placeholder="Postcode"
                                    value="{{ @$editMember->other_benefits_postcode }}">
                              </div>
                              <div class="form-group col-md-6 mb-3">
                                 <label for="telephone_number">Telephone Number (inc. Area Code)</label>
                                 <input type="text" class="form-control mb-2" id="telephone_number" name="other_telephone_number" placeholder="Enter telephone number"
                                    value="{{ @$editMember->other_telephone_number }}">
                              </div>
                              <div class="form-group col-md-6 mb-3">
                                 <label for="email_address">Email Address</label>
                                 <input type="email" class="form-control" id="email_address" name="other_email_address" placeholder="Enter email address"
                                    value="{{ @$editMember->other_email_address }}">
                              </div>
                              <div class="col-6 mb-3">
                                 <label for="plan_scheme_type">Plan/Scheme Type</label>
                                 <input type="text" class="form-control" id="plan_scheme_type" name="plan_scheme_type" placeholder="Enter plan/scheme type"
                                    value="{{ @$editMember->plan_scheme_type }}">
                              </div>
                              <div class="form-group col-md-6 mb-3">
                                 <label for="plan_scheme_name">Plan/Scheme Name (in full)</label>
                                 <input type="text" class="form-control" id="plan_scheme_name" name="plan_scheme_name" placeholder="Enter plan/scheme name"
                                    value="{{ @$editMember->plan_scheme_name }}">
                              </div>
                              <div class="col-md-6 form-group mb-3">
                                 <label for="planSchemeNumber">Plan / Scheme Number (In full)</label>
                                 <input type="text" class="form-control" id="planSchemeNumber" name="plan_scheme_number"
                                    value="{{ @$editMember->plan_scheme_number }}">
                              </div>
                              <div class="form-group col-md-6 mb-3">
                                 <label for="pension_scheme_tax_reference">Pension Scheme Tax Reference</label>
                                 <input type="text" class="form-control" id="pension_scheme_tax_reference" name="pension_scheme_tax_reference"
                                    placeholder="Enter pension scheme tax reference"
                                    value="{{ @$editMember->pension_scheme_tax_reference }}">
                              </div>
                              <div class="form-group mb-3">
                                 <label>Is this an occupational scheme?</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_occupational_scheme" id="occupational_yes" value="yes"
                                    {{ @$editMember->is_occupational_scheme == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="occupational_yes">YES</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_occupational_scheme" id="occupational_no" value="no"
                                    {{ @$editMember->is_occupational_scheme == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="occupational_no">NO</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>If yes, please confirm whether this is a Defined Benefit scheme</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="defined_benefit" value="yes" id="defined_benefit_yes"
                                    {{ @$editMember->defined_benefit == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="defined_benefit_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="defined_benefit" value="no" id="defined_benefit_no"
                                    {{ @$editMember->defined_benefit == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="defined_benefit_no">No</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>Does this represent the full value of the current plan/scheme?</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="full_value_scheme" id="full_value_yes" value="yes"
                                    {{ @$editMember->full_value_scheme == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="full_value_yes">YES</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="full_value_scheme" id="full_value_no" value="no"
                                    {{ @$editMember->full_value_scheme == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="full_value_no">NO</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>Have any funds been crystallised?</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="funds_crystallised" id="funds_yes" value="yes"
                                    {{ @$editMember->funds_crystallised == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="funds_yes">YES (all funds)</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="funds_crystallised" id="funds_some" value="some"
                                    {{ @$editMember->funds_crystallised == 'some' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="funds_some">YES (some funds)</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="funds_crystallised" id="funds_no" value="no"
                                    {{ @$editMember->funds_crystallised == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="funds_no">NO</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>If YES, please confirm how they were crystallised</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="crystallised_method" id="crystallised_capped" value="Capped Drawdown" {{ @$editMember->crystallised_method == 'Capped Drawdown' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="crystallised_capped">Capped Drawdown</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="crystallised_method" id="crystallised_flexi" value="Flexi-Access Drawdown" {{ @$editMember->crystallised_method == 'Flexi-Access Drawdown' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="crystallised_flexi">Flexi-Access Drawdown</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="crystallised_method" id="crystallised_scheme" value="Scheme Pension" {{ @$editMember->crystallised_method == 'Scheme Pension' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="crystallised_scheme">Scheme Pension</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="crystallised_method" id="crystallised_other" value="Other" {{ @$editMember->crystallised_method == 'Other' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="crystallised_other">Other (please specify)</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>Do you want to transfer assets ‘in specie’?</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transfer_assets" value="yes" id="transfer_assets_yes"
                                    {{ @$editMember->transfer_assets == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="transfer_assets_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transfer_assets" value="no" id="transfer_assets_no"
                                    {{ @$editMember->transfer_assets == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="transfer_assets_no">No</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>Is the current plan/scheme subject to any existing or proposed trustee in bankruptcy orders, or earmarking, or pension sharing orders or other receiving orders?</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bankruptcy_orders" value="yes" id="bankruptcy_orders_yes"
                                    {{ @$editMember->bankruptcy_orders == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="bankruptcy_orders_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bankruptcy_orders" value="no" id="bankruptcy_orders_no"
                                    {{ @$editMember->bankruptcy_orders == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="bankruptcy_orders_no">No</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>Is the pension fund subject to any Scheme Specific Lump Sum or Member Pension Age protection?</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="scheme_protection" value="yes" id="scheme_protection_yes"
                                    {{ @$editMember->scheme_protection == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="scheme_protection_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="scheme_protection" value="no" id="scheme_protection_no"
                                    {{ @$editMember->scheme_protection == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="scheme_protection_no">No</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>Does the plan contain any guaranteed annuity rates or guaranteed minimum pension rights?</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="annuity_guarantee" value="yes" id="annuity_guarantee_yes"
                                    {{ @$editMember->annuity_guarantee == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="annuity_guarantee_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="annuity_guarantee" value="no" id="annuity_guarantee_no"
                                    {{ @$editMember->annuity_guarantee == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="annuity_guarantee_no">No</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>Is the transfer part of a block transfer?</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="block_transfer" value="yes" id="block_transfer_yes" {{ @$editMember->block_transfer == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="block_transfer_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="block_transfer" value="no" id="block_transfer_no" {{ @$editMember->block_transfer == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="block_transfer_no">No</label>
                                 </div>
                              </div>
                              <div class="col-md-6 form-group mb-3">
                                 <label>Pension funded by the transfer of a former pension plan:</label>
                                 <input class="form-control" type="text" name="funded_transfer" value="{{ @$editMember->funded_transfer }}">
                              </div>
                              <div class="col-md-6 form-group mb-3">
                                 <label>Employer Contributions</label>
                                 <input class="form-control" type="text" name="employer_contributions" value="{{ @$editMember->employer_contributions }}">
                              </div>
                              <div class="form-group col-12 mb-3">
                                 <label for="name_of_employer">Name of Employer</label>
                                 <input type="text" class="form-control" id="name_of_employer" name="name_of_employer" value="{{ @$editMember->name_of_employer }}">
                              </div>
                              <div class="form-group mb-3">
                                 <label>Were contributions paid from a personal bank account?</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="personal_bank_payment" value="yes" id="personal_bank_payment_yes" {{ @$editMember->personal_bank_payment == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="personal_bank_payment_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="personal_bank_payment" value="no" id="personal_bank_payment_no" {{ @$editMember->personal_bank_payment == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="personal_bank_payment_no">No</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>Ceding scheme who transferred funds (if applicable):</label>
                                 <input class="form-control" type="text" name="ceding_scheme" value="{{ @$editMember->ceding_scheme }}">
                              </div>
                              <div class="form-group mb-3">
                                 <label>Have any funds been generated outside of the UK?</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="funds_outside_uk" value="yes" id="funds_outside_uk_yes" {{ @$editMember->funds_outside_uk == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="funds_outside_uk_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="funds_outside_uk" value="no" id="funds_outside_uk_no" {{ @$editMember->funds_outside_uk == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="funds_outside_uk_no">No</label>
                                 </div>
                              </div>
                              <div class="form-group col-md-12 mb-3">
                                 <label for="other_please_specify">Other (please specify)</label>
                                 <input type="text" class="form-control mb-2" id="other_please_specify" name="other_please_specify" value="{{ @$editMember->other_please_specify }}">
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                 <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                 </button>
                                 <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="non_standard_assets" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4 class="mb-0">Transfers authority</h4>
                           </div>
                           <div class="row g-2">
                              <p>I authorise, instruct and apply to you to transfer sums and assets from the plan/scheme as listed directly to AlltrustServices Limited and to provide any instructions and/or discharge required by any relevant third party to do so. Where you have asked me to give you any original policy document(s) in return for the transfer of sums and assets and I am unable to do so, I promise that I will be responsible for any losses and/or expenses which are the result, and which a reasonable person would consider to be the probable result, of any untrue, misleading or inaccurate information deliberately or carelessly given by me, or on my behalf, either in this form or with respect to benefits from the plan/scheme.</p>
                              <div class="col-md-12 form-group">
                                 <label for="signatureAlltrust">Signature</label>
                                 <br>
                                 @if ($editMember->signature_alltrust)
                                 <img src="{{ $editMember->signature_alltrust }}" alt="Signature" style="width: 200px; height: auto;">
                                 @endif
                                 <canvas id="signature_pad_2"></canvas>
                                 <br>
                                 <button type="button" class="btn btn-danger mx-2" id="clear_2">Clear</button>
                                 <button type="button" class="btn btn-primary mx-2" id="save_2">Save</button>
                                 <br>
                                 <input type="hidden" name="signature_alltrust" id="signatureAlltrust_2" class="form-control" />
                                 <label for="file_upload_2">or Upload File for signature</label>
                                 <input type="file" name="file_upload" id="file_upload_2" class="form-control">
                              </div>
                              <div class="col-md-6 form-group">
                                 <label for="transfers_authority_print_name">Print Name</label>
                                 <input type="text" class="form-control" id="transfers_authority_print_name" name="transfers_authority_print_name" value="{{ @$editMember->transfers_authority_print_name }}">
                              </div>
                              <div class="col-md-6 form-group">
                                 <label for="transfers_authority_no">Plan/Scheme No</label>
                                 <input type="text" class="form-control" id="transfers_authority_no" name="transfers_authority_no" value="{{ @$editMember->transfers_authority_no }}">
                              </div>
                              <div class="col-md-12 form-group">
                                 <label for="transfers_authority_date">Date</label>
                                 <input type="date" class="form-control" id="transfers_authority_date" name="transfers_authority_date" value="{{ @$editMember->transfers_authority_date }}">
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                 <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                 </button>
                                 <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="non_standard_assets" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4 class="mb-0">Member consent</h4>
                           </div>
                           <div class="row g-2">
                              <p>Alltrust Services Limited may want to contact you occasionally by post or email to let you know about other products and services available from us, or to forward your contact details to another firm associated with Alltrust. Please indicate your preferences by ticking the relevant boxes.</p>
                              <div class="form-group mb-3">
                                 <label>I consent to Alltrust Services Limited contacting me about other products and services.</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="limited_contacting_products" value="yes" id="limited_contacting_products_yes" {{ @$editMember->limited_contacting_products == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="limited_contacting_products_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="limited_contacting_products" value="no" id="limited_contacting_products_no" {{ @$editMember->limited_contacting_products == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="limited_contacting_products_no">No</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>I consent to Alltrust Services Limited passing my contact details to other Alltrust subsidiaries and for them to contact me about their products and services.</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="alltrust_subsidiaries" value="yes" id="alltrust_subsidiaries_yes" {{ @$editMember->alltrust_subsidiaries == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="alltrust_subsidiaries_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="alltrust_subsidiaries" value="no" id="alltrust_subsidiaries_no" {{ @$editMember->alltrust_subsidiaries == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="alltrust_subsidiaries_no">No</label>
                                 </div>
                              </div>
                              <div class="col-md-12 form-group mb-3">
                                 <label for="signature_1" style="font-size: 17px; margin-bottom: 4px;">Signature <i class="ti ti-signature"></i></label>
                                 <br>
                                 @if ($editMember->signature_1)
                                 <img src="{{ $editMember->signature_1 }}" alt="Signature" style="width: 200px; height: auto;">
                                 @endif
                                 <canvas id="signature_pad_3"></canvas>
                                 <br>
                                 <button type="button" class="btn btn-danger mx-2" id="clear_3">Clear</button>
                                 <button type="button" id="save_3" class="btn btn-primary mx-2">Save</button>
                                 <input type="hidden" name="signature_1" id="signature_1_3" class="form-control" />
                                 <br>
                                 <label class="mt-3" for="signature_file_3" style="font-size: 17px;">or Upload File for signature</label>
                                 <input type="file" name="signature_file_1" id="signature_file_3" class="form-control">
                              </div>
                              <div class="col-md-6 form-group mb-3">
                                 <label for="member_consent_print_name">Print Name</label>
                                 <input type="text" class="form-control" id="member_consent_print_name" name="member_consent_print_name" value="{{ @$editMember->member_consent_print_name }}">
                              </div>
                              <div class="col-md-6 form-group mb-3">
                                 <label for="member_consent_date">Date</label>
                                 <input type="date" class="form-control" id="member_consent_date" name="member_consent_date" value="{{ @$editMember->member_consent_date }}">
                              </div>
                              <div class="form-group mb-3">
                                 <label>Are you satisfied that your adviser has matched this pension product to your personal needs and objectives?</label><br>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="personal_needs_objectives" value="yes" id="personal_needs_objectives_yes" {{ @$editMember->personal_needs_objectives == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="personal_needs_objectives_yes">Yes</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="personal_needs_objectives" value="no" id="personal_needs_objectives_no" {{ @$editMember->personal_needs_objectives == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="personal_needs_objectives_no">No</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>Are you aware of and have received information on the fees for the pension and investment advice from your financial adviser, the pension scheme and investment linked costs for the setup and ongoing for your pension scheme?</label><br>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="investment_linked_costs" value="yes" id="investment_linked_costs_yes" {{ @$editMember->investment_linked_costs == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="investment_linked_costs_yes">Yes</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="investment_linked_costs" value="no" id="investment_linked_costs_no" {{ @$editMember->investment_linked_costs == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="investment_linked_costs_no">No</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>Has all the communication that you have received been clear and easy to understand with any questions that you have asked being answered to your satisfaction?</label><br>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="communication_satisfaction" value="yes" id="communication_satisfaction_yes" {{ @$editMember->communication_satisfaction == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="communication_satisfaction_yes">Yes</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="communication_satisfaction" value="no" id="communication_satisfaction_no" {{ @$editMember->communication_satisfaction == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="communication_satisfaction_no">No</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>Have you received the information for each of the products that you are using, pension, investment provider and any investments?</label><br>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="provider_investments" value="yes" id="provider_investments_yes" {{ @$editMember->provider_investments == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="provider_investments_yes">Yes</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="provider_investments" value="no" id="provider_investments_no" {{ @$editMember->provider_investments == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="provider_investments_no">No</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>Are there any personal circumstances that Alltrust need to be aware of to enable us to support you and provide you with services? If you tick yes to this, someone from our team will contact you directly to discuss.</label><br>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="circumstances_alltrust" value="yes" id="circumstances_alltrust_yes" {{ @$editMember->circumstances_alltrust == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="circumstances_alltrust_yes">Yes</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="circumstances_alltrust" value="no" id="circumstances_alltrust_no" {{ @$editMember->circumstances_alltrust == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="circumstances_alltrust_no">No</label>
                                 </div>
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                 <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                 </button>
                                 <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="non_standard_assets" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4 class="mb-0">Our privacy notice</h4>
                           </div>
                           <div class="row g-2">
                              <p>Our Privacy Notice contains information in respect of the personal data that we collect about you. This is available from our website, https://alltrust.co.uk/privacy-notice-and-cookie-policy/ or in hard copy by emailing sipp@alltrust.co.uk.</p>
                              <p>Please read this information carefully before submitting your application to us. By signing the application, you consent to the use of your personal information for the purposes and on the terms set out within our Privacy Notice. You have the right to withdraw consent at any time.</p>
                              <p>Please note that questions, comments and requests regarding our Privacy Notice are welcomed and should be addressed to sipp@alltrust.co.uk.</p>
                              <p>Alternatively, please write to us at Alltrust, Suite 201, Warner House, 123 Castle Street, Salisbury. SP1 3TB.</p>
                              <div class="col-12 d-flex justify-content-between">
                                 <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                 </button>
                                 <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="non_standard_assets" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4 class="mb-0">Member declaration</h4>
                           </div>
                           <div class="row g-2">
                              <p>This is our standard Application Form upon which we intend to rely. For your own benefit and protection you should read this declaration carefully before signing. If you do not understand any point please ask for further information or seek advice from a suitably qualified professional.</p>
                              <div class="form-group mb-3">
                                 <label>I am aware of my cancellation rights as detailed in the Self-Invested Personal Pension Key Features document and agree to waive my cancellation rights for the establishment of my SIPP.</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="establishment_SIPP" value="yes" id="establishment_SIPP_yes" {{ @$editMember->establishment_SIPP == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="establishment_SIPP_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="establishment_SIPP" value="no" id="establishment_SIPP_no" {{ @$editMember->establishment_SIPP == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="establishment_SIPP_no">No</label>
                                 </div>
                              </div>
                              <div class="form-group mb-3">
                                 <label>I have parental responsibility for the child named on this application form.</label><br>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="parental_responsibility" value="yes" id="parental_responsibility_yes" {{ @$editMember->parental_responsibility == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="parental_responsibility_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="parental_responsibility" value="no" id="parental_responsibility_no" {{ @$editMember->parental_responsibility == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="parental_responsibility_no">No</label>
                                 </div>
                              </div>
                              <div class="col-md-12 form-group mb-3">
                                 <label for="signature_2" style="font-size: 17px; margin-bottom: 4px;">Signature <i class="ti ti-signature"></i></label>
                                 <br>
                                 @if ($editMember->signature_2)
                                 <img src="{{ $editMember->signature_2 }}" alt="Signature" style="width: 200px; height: auto;">
                                 @endif
                                 <canvas id="signature_pad_4"></canvas>
                                 <br>
                                 <button type="button" class="btn btn-danger mx-2" id="clear_4">Clear</button>
                                 <button type="button" class="btn btn-primary mx-2" id="save_4">Save</button>
                                 <input type="hidden" name="signature_2" id="signature_2_4" class="form-control" />
                                 <br>
                                 <label class="mt-3" for="file_upload_4" style="font-size: 17px;">or Upload File for signature</label>
                                 <input type="file" name="file_upload_2" id="file_upload_4" class="form-control">
                              </div>
                              <div class="col-md-6 form-group mb-3">
                                 <label for="member_declaration_print_name">Print Name</label>
                                 <input type="text" class="form-control" id="member_declaration_print_name" name="member_declaration_print_name"
                                    value="{{ @$editMember->member_declaration_print_name }}">
                              </div>
                              <div class="col-md-6 form-group mb-3">
                                 <label for="member_declaration_date">Date</label>
                                 <input type="date" class="form-control" id="member_declaration_date" name="member_declaration_date"
                                    value="{{ @$editMember->member_declaration_date }}">
                              </div>
                              <script>
                                 document.addEventListener('DOMContentLoaded', function () {
                                     const nextButtons = document.querySelectorAll('.btn-next-wizard');
                                     const prevButtons = document.querySelectorAll('.btn-prev-wizard');
                                     const steps = document.querySelectorAll('.wizard-step');
                                     let currentStep = 0;
                                     nextButtons.forEach((button) => {
                                         button.addEventListener('click', () => {
                                             if (currentStep < steps.length - 1) {
                                                 steps[currentStep].style.display = 'none';
                                                 currentStep++;
                                                 steps[currentStep].style.display = 'block';
                                             }
                                             togglePrevButton();
                                         });
                                     });
                                     prevButtons.forEach((button) => {
                                         button.addEventListener('click', () => {
                                             if (currentStep > 0) {
                                                 steps[currentStep].style.display = 'none';
                                                 currentStep--;
                                                 steps[currentStep].style.display = 'block';
                                             }
                                             togglePrevButton();
                                         });
                                     });
                                     function togglePrevButton() {
                                         prevButtons.forEach((button) => {
                                             button.disabled = currentStep === 0;
                                         });
                                     }
                                 });
                              </script>
                              <div class="col-12 d-flex justify-content-between">
                                 <button class="btn btn-label-secondary btn-prev">
                                 <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                                 <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                 </button>
                                 <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                                 <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Full Step Next</span>
                                 <i class="ti ti-arrow-right ti-xs"></i>
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div id="finalstep" class="content" style="display: none;">
                           <div class="content-header mb-6">
                              <h4 class="mb-0">Save</h4>
                           </div>
                           <div class="row g-6" id="finalstep">
                              <div class="adviser-form">
                                 <div class="form-group d-flex justify-content-center text-center">
                                    <div class="col-8">
                                       <div class="card-body shadow-sm p-4">
                                          <h4>Submit Confirmation</h4>
                                          <p>Before proceeding, please take a moment to review your decision. Submitting this form means that all the information you've provided is final and will be processed accordingly.</p>
                                          <p><strong><a href="#" style="color: blue;">Are you sure you want to submit?</a></strong></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 d-flex justify-content-between mt-5">
                              <button class="btn btn-label-secondary btn-prev">
                              <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                              <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button type="submit" id="sub" class="btn btn-success btn-submit">
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
</div>
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
   const addAdviserBtn = document.querySelector('.btn-add-adviser');
   const adviserFormsContainer = document.getElementById('adviserFormsContainer');
   addAdviserBtn.addEventListener('click', (event) => {
     event.preventDefault();
     const newAdviserForm = document.createElement('div');
     newAdviserForm.classList.add('adviser-form');
     newAdviserForm.innerHTML = `
         <div class="col-md-12 mb-3">
             <label class="form-label" for="adviserName">Adviser Name</label>
             <input type="text" name="adviser_name[]" class="form-control" >
         </div>
         <div class="col-md-12 mb-3">
             <label class="form-label" for="adviserFCAReference">Adviser FCA Reference</label>
             <input type="text" name="adviser_fca_reference[]" class="form-control">
         </div>
         <div class="col-md-12 mb-3">
             <label>
                 <input type="checkbox" name="approved_for_transfer_db[]" value="yes">
                 Approved for transfer of DB
             </label>
         </div>
         <div class="col-md-12 mb-3">
             <label class="form-label" for="adviserEmail">Adviser Email</label>
             <input type="email" name="adviser_email[]" class="form-control" >
         </div>
         <div class="col-md-12 mb-3">
             <label class="form-label" for="branch">Branch</label>
             <input type="text" name="branch[]" class="form-control" >
         </div>
         <div class="col-md-12 mb-3">
             <label>
                 <input type="checkbox" class="toggle-online-access" name="requires_online_access[]" value="yes">
                 Requires online access
             </label>
         </div>
         <div class="col-12 d-flex justify-content-between">
             <button type="button" class="btn btn-danger btn-remove">Remove</button>
         </div>
     `;
     adviserFormsContainer.appendChild(newAdviserForm);
   });
   adviserFormsContainer.addEventListener('click', (event) => {
     if (event.target.classList.contains('btn-remove')) {
         const adviserForm = event.target.closest('.adviser-form');
         adviserFormsContainer.removeChild(adviserForm);
     }
   });
   });
     document.getElementById('add-beneficiary').addEventListener('click', function() {
         const row = `
         <tr>
             <td><input type="text" class="form-control" name="beneficiary_name[]"></td>
             <td><input type="text" class="form-control" name="beneficiary_relationship[]"></td>
             <td><input type="number" class="form-control" name="beneficiary_percentage[]"></td>
             <td><button type="button" class="btn btn-danger remove-beneficiary">Remove</button></td>
         </tr>
     `;
         document.getElementById('beneficiary-list').insertAdjacentHTML('beforeend', row);
     });
     document.getElementById('add-charity').addEventListener('click', function() {
         const row = `
         <tr>
             <td><input type="text" class="form-control" name="charity_name[]"></td>
             <td><input type="number" class="form-control" name="charity_percentage[]"></td>
             <td><button type="button" class="btn btn-danger remove-charity">Remove</button></td>
         </tr>
     `;
         document.getElementById('charity-list').insertAdjacentHTML('beforeend', row);
     });
     document.addEventListener('click', function(e) {
         if (e.target.classList.contains('remove-beneficiary')) {
             e.target.closest('tr').remove();
         }
     });
     document.addEventListener('click', function(e) {
         if (e.target.classList.contains('remove-charity')) {
             e.target.closest('tr').remove();
         }
     });
</script>
<script>
   document.addEventListener("DOMContentLoaded", function () {
   const formSections = document.querySelectorAll(".content");
   const nextButtons = document.querySelectorAll(".btn-next");
   const prevButtons = document.querySelectorAll(".btn-prev");
   const steps = document.querySelectorAll(".step");
   let currentStep = 0;
   function showStep(step) {
   formSections.forEach((section, index) => {
       section.classList.toggle("active", index === step);
   });
   steps.forEach((stepElem, index) => {
       stepElem.classList.toggle("active", index === step);
   });
   checkNextButtonState();
   }
   function validateForm(step) {
   const inputs = formSections[step].querySelectorAll("input[required], select[required], textarea[required]");
   let allFilled = true;
   inputs.forEach(input => {
       if (!input.value.trim()) {
           allFilled = false;
           input.classList.add("error");
       } else {
           input.classList.remove("error");
       }
   });
   return allFilled;
   }
   function checkNextButtonState() {
   if (validateForm(currentStep)) {
       nextButtons[currentStep].removeAttribute("disabled");
   } else {
       nextButtons[currentStep].setAttribute("disabled", "true");
   }
   }
   nextButtons.forEach((button) => {
   button.addEventListener("click", function () {
       if (validateForm(currentStep)) {
           if (currentStep < formSections.length - 1) {
               currentStep++;
               showStep(currentStep);
           }
       }
   });
   });
   prevButtons.forEach((button) => {
   button.addEventListener("click", function () {
       if (currentStep > 0) {
           currentStep--;
           showStep(currentStep);
       }
   });
   });
   showStep(currentStep);
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
   function saveSignature(signaturePad, inputId) {
       if (!signaturePad.isEmpty()) {
           let signatureData = signaturePad.toDataURL('image/png');
           document.getElementById(inputId).value = signatureData;
           alert("Signature saved successfully!");
       } else {
           alert("Please draw a signature first.");
       }
   }
   let signaturePad1 = new SignaturePad(document.getElementById('signature_pad_1'));
   let signaturePad2 = new SignaturePad(document.getElementById('signature_pad_2'));
   let signaturePad3 = new SignaturePad(document.getElementById('signature_pad_3'));
   let signaturePad4 = new SignaturePad(document.getElementById('signature_pad_4'));
   document.getElementById('clear_1').addEventListener('click', function () {
       signaturePad1.clear();
       document.getElementById('signatureAdviser_1').value = "";
   });
   
   document.getElementById('clear_2').addEventListener('click', function () {
       signaturePad2.clear();
       document.getElementById('signatureAlltrust_2').value = "";
   });
   
   document.getElementById('clear_3').addEventListener('click', function () {
       signaturePad3.clear();
       document.getElementById('signature_1_3').value = "";
   });
   
   document.getElementById('clear_4').addEventListener('click', function () {
       signaturePad4.clear();
       document.getElementById('signature_2_4').value = "";
   });
   
   document.getElementById('save_1').addEventListener('click', function () {
       saveSignature(signaturePad1, 'signatureAdviser_1');
   });
   
   document.getElementById('save_2').addEventListener('click', function () {
       saveSignature(signaturePad2, 'signatureAlltrust_2');
   });
   
   document.getElementById('save_3').addEventListener('click', function () {
       saveSignature(signaturePad3, 'signature_1_3');
   });
   
   document.getElementById('save_4').addEventListener('click', function () {
       saveSignature(signaturePad4, 'signature_2_4');
   });
</script>
@endsection