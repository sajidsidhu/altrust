@extends('dashboard.dashboard')
@section('content')
<style>
   .progress-container {
   display: flex;
   flex-wrap: wrap;
   justify-content: center;
   align-items: center;
   gap: 10px;
   margin-bottom: 20px;
   }
   .step {
   text-align: center;
   padding: 10px;
   opacity: 0.5;
   transition: all 0.3s ease-in-out;
   }
   .step.active {
   opacity: 1;
   font-weight: bold;
   color: #000;
   }
   .step.active .step-icon i {
   color: green;
   }
   .step-icon i {
   display: block;
   margin-bottom: 5px;
   }
   .arrow {
   font-size: 20px;
   color: #999;
   }
   .step-subtitle {
   font-size: 10px;
   }
   select option {
   background: #000;
   color: #fff;
   }
   canvas {
   border: 2px solid black;
   width: 100%;
   height: 200px;
   }
   @media (max-width: 768px) {
   .step {
   flex: 1 1 calc(100% / 3 - 15px);
   }
   }
   @media (max-width: 480px) {
   .step {
   flex: 1 1 calc(100% / 2 - 15px); /* 2 steps per row on mobile */
   }
   }
   canvas {
   border: 2px solid black;
   width: 100%;
   height: 200px;
   }
</style>
<div class="authentication-wrapper authentication-cover authentication-bg">
   <div class="authentication-inner row">
      <div class="progress-container">
         <div class="step active" data-step="0">
            <div class="step-icon"><i class="fas fa-file-alt"></i></div>
            <div class="step-subtitle">Personal Details</div>
         </div>
         <div class="arrow">→</div>
         <div class="step disabled" data-step="1">
            <div class="step-icon"><i class="fas fa-user"></i></div>
            <div class="step-subtitle">Corporate</div>
         </div>
         <div class="arrow">→</div>
         <div class="step disabled" data-step="2">
            <div class="step-icon"><i class="fas fa-university"></i></div>
            <div class="step-subtitle">Identity</div>
         </div>
         <div class="arrow">→</div>
         <div class="step disabled" data-step="3">
            <div class="step-icon"><i class="fas fa-sync-alt"></i></div>
            <div class="step-subtitle">Agreement</div>
         </div>
         <div class="arrow">→</div>
         <div class="step disabled" data-step="4">
            <div class="step-icon"><i class="fas fa-balance-scale"></i></div>
            <div class="step-subtitle">Declaration</div>
         </div>
         <div class="arrow">→</div>
         <div class="step disabled" data-step="5">
            <div class="step-icon"><i class="fas fa-credit-card"></i></div>
            <div class="step-subtitle">Bank Account</div>
         </div>
         <div class="arrow">→</div>
         <div class="step disabled" data-step="2">
            <div class="step-icon"><i class="fas fa-university"></i></div>
            <div class="step-subtitle">Self-Certification Form</div>
         </div>
         <div class="arrow">→</div>
         <div class="step disabled" data-step="4">
            <div class="step-icon"><i class="fas fa-balance-scale"></i></div>
            <div class="step-subtitle">User Policies</div>
         </div>
         <div class="arrow">→</div>
         <div class="step disabled" data-step="11">
            <div class="step-icon"><i class="fas fa-check"></i></div>
            <div class="step-subtitle">Final Confirmation</div>
         </div>
      </div>
      <div class="d-flex col-12 align-items-center justify-content-center authentication-bg p-5">
         <div class="col-12">
            <div id="multiStepsValidation" class="bs-stepper border-none shadow-none mt-5">
               <form id="multiStepsForm" method="POST" enctype="multipart/form-data" action="{{ route('member-form-store') }}">
                  @csrf
                  <button type="submit" class="btn btn-success btn-draft-member mb-5">Save as Draft</button>
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
                                       <!-- title -->
                                       <div class="col-md-6 form-group mb-3">
                                          <label for="title">Title</label>
                                          <select class="form-control" id="title" name="title">
                                             <option value="">Select Title</option>
                                             <option value="Mr">Mr</option>
                                             <option value="Mrs">Mrs</option>
                                             <option value="Miss">Miss</option>
                                             <option value="Other">Other</option>
                                          </select>
                                       </div>
                                       <div class=" col-md-6 form-group mb-3">
                                          <label for="forename">Forename</label>
                                          <input type="text" class="form-control" id="forename" name="forename" placeholder="Forename">
                                       </div>
                                       <div class="col-md-6 form-group mb-3">
                                          <label for="surname">Surname</label>
                                          <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname">
                                       </div>
                                       <div class="col-md-6 form-group mb-3">
                                          <label for="dob">Date of Birth</label>
                                          <input type="date" class="form-control" id="dob" name="dob">
                                       </div>
                                       <div class=" col-md-6 form-group mb-3">
                                          <label for="previous_name">Previous name(s) (including maiden name):</label>
                                          <input type="text" class="form-control" id="previous_name" name="previous_name" placeholder="Previous name(s) (e.g., maiden name)">
                                       </div>
                                       <div class="col-md-6 mb-3">
                                          <label for="address">Permanent Residential Address</label>
                                          <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                                       </div>
                                       <div class="col-md-6 mb-3">
                                          <label for="postcode">Postcode</label>
                                          <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode">
                                       </div>
                                       <div class="col-md-6 mb-3">
                                          <label for="country">Country</label>
                                          <select class="form-control" id="country" name="country">
                                             <option value="" selected disabled>Select Country</option>
                                             <option value="Afghanistan">Afghanistan</option>
                                             <option value="Albania">Albania</option>
                                             <option value="Algeria">Algeria</option>
                                             <option value="Andorra">Andorra</option>
                                             <option value="Angola">Angola</option>
                                             <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                             <option value="Argentina">Argentina</option>
                                             <option value="Armenia">Armenia</option>
                                             <option value="Australia">Australia</option>
                                             <option value="Austria">Austria</option>
                                             <option value="Azerbaijan">Azerbaijan</option>
                                             <option value="Bahamas">Bahamas</option>
                                             <option value="Bahrain">Bahrain</option>
                                             <option value="Bangladesh">Bangladesh</option>
                                             <option value="Barbados">Barbados</option>
                                             <option value="Belarus">Belarus</option>
                                             <option value="Belgium">Belgium</option>
                                             <option value="Belize">Belize</option>
                                             <option value="Benin">Benin</option>
                                             <option value="Bhutan">Bhutan</option>
                                             <option value="Bolivia">Bolivia</option>
                                             <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                             <option value="Botswana">Botswana</option>
                                             <option value="Brazil">Brazil</option>
                                             <option value="Brunei">Brunei</option>
                                             <option value="Bulgaria">Bulgaria</option>
                                             <option value="Burkina Faso">Burkina Faso</option>
                                             <option value="Burundi">Burundi</option>
                                             <option value="Cambodia">Cambodia</option>
                                             <option value="Cameroon">Cameroon</option>
                                             <option value="Canada">Canada</option>
                                             <option value="Cape Verde">Cape Verde</option>
                                             <option value="Central African Republic">Central African Republic</option>
                                             <option value="Chad">Chad</option>
                                             <option value="Chile">Chile</option>
                                             <option value="China">China</option>
                                             <option value="Colombia">Colombia</option>
                                             <option value="Comoros">Comoros</option>
                                             <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                                             <option value="Congo, Republic of the">Congo, Republic of the</option>
                                             <option value="Costa Rica">Costa Rica</option>
                                             <option value="Croatia">Croatia</option>
                                             <option value="Cuba">Cuba</option>
                                             <option value="Cyprus">Cyprus</option>
                                             <option value="Czech Republic">Czech Republic</option>
                                             <option value="Denmark">Denmark</option>
                                             <option value="Djibouti">Djibouti</option>
                                             <option value="Dominica">Dominica</option>
                                             <option value="Dominican Republic">Dominican Republic</option>
                                             <option value="East Timor (Timor-Leste)">East Timor (Timor-Leste)</option>
                                             <option value="Ecuador">Ecuador</option>
                                             <option value="Egypt">Egypt</option>
                                             <option value="El Salvador">El Salvador</option>
                                             <option value="Equatorial Guinea">Equatorial Guinea</option>
                                             <option value="Eritrea">Eritrea</option>
                                             <option value="Estonia">Estonia</option>
                                             <option value="Eswatini">Eswatini</option>
                                             <option value="Ethiopia">Ethiopia</option>
                                             <option value="Fiji">Fiji</option>
                                             <option value="Finland">Finland</option>
                                             <option value="France">France</option>
                                             <option value="Gabon">Gabon</option>
                                             <option value="Gambia">Gambia</option>
                                             <option value="Georgia">Georgia</option>
                                             <option value="Germany">Germany</option>
                                             <option value="Ghana">Ghana</option>
                                             <option value="Greece">Greece</option>
                                             <option value="Grenada">Grenada</option>
                                             <option value="Guatemala">Guatemala</option>
                                             <option value="Guinea">Guinea</option>
                                             <option value="Guinea-Bissau">Guinea-Bissau</option>
                                             <option value="Guyana">Guyana</option>
                                             <option value="Haiti">Haiti</option>
                                             <option value="Honduras">Honduras</option>
                                             <option value="Hungary">Hungary</option>
                                             <option value="Iceland">Iceland</option>
                                             <option value="India">India</option>
                                             <option value="Indonesia">Indonesia</option>
                                             <option value="Iran">Iran</option>
                                             <option value="Iraq">Iraq</option>
                                             <option value="Ireland">Ireland</option>
                                             <option value="Israel">Israel</option>
                                             <option value="Italy">Italy</option>
                                             <option value="Ivory Coast (Côte d'Ivoire)">Ivory Coast (Côte d'Ivoire)</option>
                                             <option value="Jamaica">Jamaica</option>
                                             <option value="Japan">Japan</option>
                                             <option value="Jordan">Jordan</option>
                                             <option value="Kazakhstan">Kazakhstan</option>
                                             <option value="Kenya">Kenya</option>
                                             <option value="Kiribati">Kiribati</option>
                                             <option value="Korea, North">Korea, North</option>
                                             <option value="Korea, South">Korea, South</option>
                                             <option value="Kuwait">Kuwait</option>
                                             <option value="Kyrgyzstan">Kyrgyzstan</option>
                                             <option value="Laos">Laos</option>
                                             <option value="Latvia">Latvia</option>
                                             <option value="Lebanon">Lebanon</option>
                                             <option value="Lesotho">Lesotho</option>
                                             <option value="Liberia">Liberia</option>
                                             <option value="Libya">Libya</option>
                                             <option value="Liechtenstein">Liechtenstein</option>
                                             <option value="Lithuania">Lithuania</option>
                                             <option value="Luxembourg">Luxembourg</option>
                                             <option value="Madagascar">Madagascar</option>
                                             <option value="Malawi">Malawi</option>
                                             <option value="Malaysia">Malaysia</option>
                                             <option value="Maldives">Maldives</option>
                                             <option value="Mali">Mali</option>
                                             <option value="Malta">Malta</option>
                                             <option value="Marshall Islands">Marshall Islands</option>
                                             <option value="Mauritania">Mauritania</option>
                                             <option value="Mauritius">Mauritius</option>
                                             <option value="Mexico">Mexico</option>
                                             <option value="Micronesia">Micronesia</option>
                                             <option value="Moldova">Moldova</option>
                                             <option value="Monaco">Monaco</option>
                                             <option value="Mongolia">Mongolia</option>
                                             <option value="Montenegro">Montenegro</option>
                                             <option value="Morocco">Morocco</option>
                                             <option value="Mozambique">Mozambique</option>
                                             <option value="Myanmar">Myanmar</option>
                                             <option value="Namibia">Namibia</option>
                                             <option value="Nauru">Nauru</option>
                                             <option value="Nepal">Nepal</option>
                                             <option value="Netherlands">Netherlands</option>
                                             <option value="New Zealand">New Zealand</option>
                                             <option value="Nicaragua">Nicaragua</option>
                                             <option value="Niger">Niger</option>
                                             <option value="Nigeria">Nigeria</option>
                                             <option value="North Macedonia">North Macedonia</option>
                                             <option value="Norway">Norway</option>
                                             <option value="Oman">Oman</option>
                                             <option value="Pakistan">Pakistan</option>
                                             <option value="Palau">Palau</option>
                                             <option value="Panama">Panama</option>
                                             <option value="Papua New Guinea">Papua New Guinea</option>
                                             <option value="Paraguay">Paraguay</option>
                                             <option value="Peru">Peru</option>
                                             <option value="Philippines">Philippines</option>
                                             <option value="Poland">Poland</option>
                                             <option value="Portugal">Portugal</option>
                                             <option value="Qatar">Qatar</option>
                                             <option value="Romania">Romania</option>
                                             <option value="Russia">Russia</option>
                                             <option value="Rwanda">Rwanda</option>
                                             <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                             <option value="Saint Lucia">Saint Lucia</option>
                                             <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                             <option value="Samoa">Samoa</option>
                                             <option value="San Marino">San Marino</option>
                                             <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                             <option value="Saudi Arabia">Saudi Arabia</option>
                                             <option value="Senegal">Senegal</option>
                                             <option value="Serbia">Serbia</option>
                                             <option value="Seychelles">Seychelles</option>
                                             <option value="Sierra Leone">Sierra Leone</option>
                                             <option value="Singapore">Singapore</option>
                                             <option value="Slovakia">Slovakia</option>
                                             <option value="Slovenia">Slovenia</option>
                                             <option value="Solomon Islands">Solomon Islands</option>
                                             <option value="Somalia">Somalia</option>
                                             <option value="South Africa">South Africa</option>
                                             <option value="South Sudan">South Sudan</option>
                                             <option value="Spain">Spain</option>
                                             <option value="Sri Lanka">Sri Lanka</option>
                                             <option value="Sudan">Sudan</option>
                                             <option value="Suriname">Suriname</option>
                                             <option value="Sweden">Sweden</option>
                                             <option value="Switzerland">Switzerland</option>
                                             <option value="Syria">Syria</option>
                                             <option value="Taiwan (recognized by some as a separate entity)">Taiwan (recognized by some as a separate entity)</option>
                                             <option value="Tajikistan">Tajikistan</option>
                                             <option value="Tanzania">Tanzania</option>
                                             <option value="Thailand">Thailand</option>
                                             <option value="Togo">Togo</option>
                                             <option value="Tonga">Tonga</option>
                                             <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                             <option value="Tunisia">Tunisia</option>
                                             <option value="Turkey">Turkey</option>
                                             <option value="Turkmenistan">Turkmenistan</option>
                                             <option value="Tuvalu">Tuvalu</option>
                                             <option value="Uganda">Uganda</option>
                                             <option value="Ukraine">Ukraine</option>
                                             <option value="United Arab Emirates">United Arab Emirates</option>
                                             <option value="United Kingdom">United Kingdom</option>
                                             <option value="United States">United States</option>
                                             <option value="Uruguay">Uruguay</option>
                                             <option value="Uzbekistan">Uzbekistan</option>
                                             <option value="Vanuatu">Vanuatu</option>
                                             <option value="Vatican City (Holy See)">Vatican City (Holy See)</option>
                                             <option value="Venezuela">Venezuela</option>
                                             <option value="Vietnam">Vietnam</option>
                                             <option value="Yemen">Yemen</option>
                                             <option value="Zambia">Zambia</option>
                                             <option value="Zimbabwe">Zimbabwe</option>
                                          </select>
                                       </div>
                                       <div class="col-md-6 form-group mb-3">
                                          <label for="time_spent_address">Time spent at address</label>
                                          <input type="text" class="form-control" id="time_spent_address" name="time_spent_address">
                                       </div>
                                       <div class="col-md-6 mb-3">
                                          <label for="previous_address">Previous Residential Address:</label>
                                          <input type="text" class="form-control" id="previous_address" name="previous_address" placeholder="Previous Residential Address">
                                       </div>
                                       <div class="col-md-6 mb-3">
                                          <label for="previous_residential_postcode">Postcode</label>
                                          <input type="text" class="form-control" id="previous_residential_postcode" name="previous_residential_postcode" placeholder="Postcode">
                                       </div>
                                       <div class="col-md-6 mb-3">
                                          <label for="previous_residential_country">Country</label>
                                          <select class="form-control" id="previous_residential_country" name="previous_residential_country">
                                             <option value="" selected disabled>Select Country</option>
                                             <option value="Afghanistan">Afghanistan</option>
                                             <option value="Albania">Albania</option>
                                             <option value="Algeria">Algeria</option>
                                             <option value="Andorra">Andorra</option>
                                             <option value="Angola">Angola</option>
                                             <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                             <option value="Argentina">Argentina</option>
                                             <option value="Armenia">Armenia</option>
                                             <option value="Australia">Australia</option>
                                             <option value="Austria">Austria</option>
                                             <option value="Azerbaijan">Azerbaijan</option>
                                             <option value="Bahamas">Bahamas</option>
                                             <option value="Bahrain">Bahrain</option>
                                             <option value="Bangladesh">Bangladesh</option>
                                             <option value="Barbados">Barbados</option>
                                             <option value="Belarus">Belarus</option>
                                             <option value="Belgium">Belgium</option>
                                             <option value="Belize">Belize</option>
                                             <option value="Benin">Benin</option>
                                             <option value="Bhutan">Bhutan</option>
                                             <option value="Bolivia">Bolivia</option>
                                             <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                             <option value="Botswana">Botswana</option>
                                             <option value="Brazil">Brazil</option>
                                             <option value="Brunei">Brunei</option>
                                             <option value="Bulgaria">Bulgaria</option>
                                             <option value="Burkina Faso">Burkina Faso</option>
                                             <option value="Burundi">Burundi</option>
                                             <option value="Cambodia">Cambodia</option>
                                             <option value="Cameroon">Cameroon</option>
                                             <option value="Canada">Canada</option>
                                             <option value="Cape Verde">Cape Verde</option>
                                             <option value="Central African Republic">Central African Republic</option>
                                             <option value="Chad">Chad</option>
                                             <option value="Chile">Chile</option>
                                             <option value="China">China</option>
                                             <option value="Colombia">Colombia</option>
                                             <option value="Comoros">Comoros</option>
                                             <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                                             <option value="Congo, Republic of the">Congo, Republic of the</option>
                                             <option value="Costa Rica">Costa Rica</option>
                                             <option value="Croatia">Croatia</option>
                                             <option value="Cuba">Cuba</option>
                                             <option value="Cyprus">Cyprus</option>
                                             <option value="Czech Republic">Czech Republic</option>
                                             <option value="Denmark">Denmark</option>
                                             <option value="Djibouti">Djibouti</option>
                                             <option value="Dominica">Dominica</option>
                                             <option value="Dominican Republic">Dominican Republic</option>
                                             <option value="East Timor (Timor-Leste)">East Timor (Timor-Leste)</option>
                                             <option value="Ecuador">Ecuador</option>
                                             <option value="Egypt">Egypt</option>
                                             <option value="El Salvador">El Salvador</option>
                                             <option value="Equatorial Guinea">Equatorial Guinea</option>
                                             <option value="Eritrea">Eritrea</option>
                                             <option value="Estonia">Estonia</option>
                                             <option value="Eswatini">Eswatini</option>
                                             <option value="Ethiopia">Ethiopia</option>
                                             <option value="Fiji">Fiji</option>
                                             <option value="Finland">Finland</option>
                                             <option value="France">France</option>
                                             <option value="Gabon">Gabon</option>
                                             <option value="Gambia">Gambia</option>
                                             <option value="Georgia">Georgia</option>
                                             <option value="Germany">Germany</option>
                                             <option value="Ghana">Ghana</option>
                                             <option value="Greece">Greece</option>
                                             <option value="Grenada">Grenada</option>
                                             <option value="Guatemala">Guatemala</option>
                                             <option value="Guinea">Guinea</option>
                                             <option value="Guinea-Bissau">Guinea-Bissau</option>
                                             <option value="Guyana">Guyana</option>
                                             <option value="Haiti">Haiti</option>
                                             <option value="Honduras">Honduras</option>
                                             <option value="Hungary">Hungary</option>
                                             <option value="Iceland">Iceland</option>
                                             <option value="India">India</option>
                                             <option value="Indonesia">Indonesia</option>
                                             <option value="Iran">Iran</option>
                                             <option value="Iraq">Iraq</option>
                                             <option value="Ireland">Ireland</option>
                                             <option value="Israel">Israel</option>
                                             <option value="Italy">Italy</option>
                                             <option value="Ivory Coast (Côte d'Ivoire)">Ivory Coast (Côte d'Ivoire)</option>
                                             <option value="Jamaica">Jamaica</option>
                                             <option value="Japan">Japan</option>
                                             <option value="Jordan">Jordan</option>
                                             <option value="Kazakhstan">Kazakhstan</option>
                                             <option value="Kenya">Kenya</option>
                                             <option value="Kiribati">Kiribati</option>
                                             <option value="Korea, North">Korea, North</option>
                                             <option value="Korea, South">Korea, South</option>
                                             <option value="Kuwait">Kuwait</option>
                                             <option value="Kyrgyzstan">Kyrgyzstan</option>
                                             <option value="Laos">Laos</option>
                                             <option value="Latvia">Latvia</option>
                                             <option value="Lebanon">Lebanon</option>
                                             <option value="Lesotho">Lesotho</option>
                                             <option value="Liberia">Liberia</option>
                                             <option value="Libya">Libya</option>
                                             <option value="Liechtenstein">Liechtenstein</option>
                                             <option value="Lithuania">Lithuania</option>
                                             <option value="Luxembourg">Luxembourg</option>
                                             <option value="Madagascar">Madagascar</option>
                                             <option value="Malawi">Malawi</option>
                                             <option value="Malaysia">Malaysia</option>
                                             <option value="Maldives">Maldives</option>
                                             <option value="Mali">Mali</option>
                                             <option value="Malta">Malta</option>
                                             <option value="Marshall Islands">Marshall Islands</option>
                                             <option value="Mauritania">Mauritania</option>
                                             <option value="Mauritius">Mauritius</option>
                                             <option value="Mexico">Mexico</option>
                                             <option value="Micronesia">Micronesia</option>
                                             <option value="Moldova">Moldova</option>
                                             <option value="Monaco">Monaco</option>
                                             <option value="Mongolia">Mongolia</option>
                                             <option value="Montenegro">Montenegro</option>
                                             <option value="Morocco">Morocco</option>
                                             <option value="Mozambique">Mozambique</option>
                                             <option value="Myanmar">Myanmar</option>
                                             <option value="Namibia">Namibia</option>
                                             <option value="Nauru">Nauru</option>
                                             <option value="Nepal">Nepal</option>
                                             <option value="Netherlands">Netherlands</option>
                                             <option value="New Zealand">New Zealand</option>
                                             <option value="Nicaragua">Nicaragua</option>
                                             <option value="Niger">Niger</option>
                                             <option value="Nigeria">Nigeria</option>
                                             <option value="North Macedonia">North Macedonia</option>
                                             <option value="Norway">Norway</option>
                                             <option value="Oman">Oman</option>
                                             <option value="Pakistan">Pakistan</option>
                                             <option value="Palau">Palau</option>
                                             <option value="Panama">Panama</option>
                                             <option value="Papua New Guinea">Papua New Guinea</option>
                                             <option value="Paraguay">Paraguay</option>
                                             <option value="Peru">Peru</option>
                                             <option value="Philippines">Philippines</option>
                                             <option value="Poland">Poland</option>
                                             <option value="Portugal">Portugal</option>
                                             <option value="Qatar">Qatar</option>
                                             <option value="Romania">Romania</option>
                                             <option value="Russia">Russia</option>
                                             <option value="Rwanda">Rwanda</option>
                                             <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                             <option value="Saint Lucia">Saint Lucia</option>
                                             <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                             <option value="Samoa">Samoa</option>
                                             <option value="San Marino">San Marino</option>
                                             <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                             <option value="Saudi Arabia">Saudi Arabia</option>
                                             <option value="Senegal">Senegal</option>
                                             <option value="Serbia">Serbia</option>
                                             <option value="Seychelles">Seychelles</option>
                                             <option value="Sierra Leone">Sierra Leone</option>
                                             <option value="Singapore">Singapore</option>
                                             <option value="Slovakia">Slovakia</option>
                                             <option value="Slovenia">Slovenia</option>
                                             <option value="Solomon Islands">Solomon Islands</option>
                                             <option value="Somalia">Somalia</option>
                                             <option value="South Africa">South Africa</option>
                                             <option value="South Sudan">South Sudan</option>
                                             <option value="Spain">Spain</option>
                                             <option value="Sri Lanka">Sri Lanka</option>
                                             <option value="Sudan">Sudan</option>
                                             <option value="Suriname">Suriname</option>
                                             <option value="Sweden">Sweden</option>
                                             <option value="Switzerland">Switzerland</option>
                                             <option value="Syria">Syria</option>
                                             <option value="Taiwan (recognized by some as a separate entity)">Taiwan (recognized by some as a separate entity)</option>
                                             <option value="Tajikistan">Tajikistan</option>
                                             <option value="Tanzania">Tanzania</option>
                                             <option value="Thailand">Thailand</option>
                                             <option value="Togo">Togo</option>
                                             <option value="Tonga">Tonga</option>
                                             <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                             <option value="Tunisia">Tunisia</option>
                                             <option value="Turkey">Turkey</option>
                                             <option value="Turkmenistan">Turkmenistan</option>
                                             <option value="Tuvalu">Tuvalu</option>
                                             <option value="Uganda">Uganda</option>
                                             <option value="Ukraine">Ukraine</option>
                                             <option value="United Arab Emirates">United Arab Emirates</option>
                                             <option value="United Kingdom">United Kingdom</option>
                                             <option value="United States">United States</option>
                                             <option value="Uruguay">Uruguay</option>
                                             <option value="Uzbekistan">Uzbekistan</option>
                                             <option value="Vanuatu">Vanuatu</option>
                                             <option value="Vatican City (Holy See)">Vatican City (Holy See)</option>
                                             <option value="Venezuela">Venezuela</option>
                                             <option value="Vietnam">Vietnam</option>
                                             <option value="Yemen">Yemen</option>
                                             <option value="Zambia">Zambia</option>
                                             <option value="Zimbabwe">Zimbabwe</option>
                                          </select>
                                       </div>
                                       <div class="col-md-6 mb-3">
                                          <label for="telephone">Telephone Number</label>
                                          <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Enter Telephone Number">
                                       </div>
                                       <div class="col-md-6 mb-3">
                                          <label for="telephone">Email Address</label>
                                          <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                       </div>
                                       <div class="col-md-6 mb-3">
                                          <label for="ni_number">National Insurance Number:</label>
                                          <input type="text" class="form-control" id="ni_number" name="ni_number" placeholder="National Insurance Number">
                                       </div>
                                       <div class="col-md-6 form-group mb-3">
                                          <label for="utr">Unique Tax Payer Reference (Tax Identification Number (TIN))</label>
                                          <input type="number" class="form-control" id="utr" name="utr">
                                       </div>
                                       <div class="col-md-6 form-group mb-3">
                                          <label for="nationality">Nationality/Citizenship</label>
                                          <select class="form-control" id="nationality" name="nationality">
                                             <option value="" selected disabled>Select Nationality/Citizenship</option>
                                             <option value="Afghanistan">Afghanistan</option>
                                             <option value="Albania">Albania</option>
                                             <option value="Algeria">Algeria</option>
                                             <option value="Andorra">Andorra</option>
                                             <option value="Angola">Angola</option>
                                             <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                             <option value="Argentina">Argentina</option>
                                             <option value="Armenia">Armenia</option>
                                             <option value="Australia">Australia</option>
                                             <option value="Austria">Austria</option>
                                             <option value="Azerbaijan">Azerbaijan</option>
                                             <option value="Bahamas">Bahamas</option>
                                             <option value="Bahrain">Bahrain</option>
                                             <option value="Bangladesh">Bangladesh</option>
                                             <option value="Barbados">Barbados</option>
                                             <option value="Belarus">Belarus</option>
                                             <option value="Belgium">Belgium</option>
                                             <option value="Belize">Belize</option>
                                             <option value="Benin">Benin</option>
                                             <option value="Bhutan">Bhutan</option>
                                             <option value="Bolivia">Bolivia</option>
                                             <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                             <option value="Botswana">Botswana</option>
                                             <option value="Brazil">Brazil</option>
                                             <option value="Brunei">Brunei</option>
                                             <option value="Bulgaria">Bulgaria</option>
                                             <option value="Burkina Faso">Burkina Faso</option>
                                             <option value="Burundi">Burundi</option>
                                             <option value="Cambodia">Cambodia</option>
                                             <option value="Cameroon">Cameroon</option>
                                             <option value="Canada">Canada</option>
                                             <option value="Cape Verde">Cape Verde</option>
                                             <option value="Central African Republic">Central African Republic</option>
                                             <option value="Chad">Chad</option>
                                             <option value="Chile">Chile</option>
                                             <option value="China">China</option>
                                             <option value="Colombia">Colombia</option>
                                             <option value="Comoros">Comoros</option>
                                             <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                                             <option value="Congo, Republic of the">Congo, Republic of the</option>
                                             <option value="Costa Rica">Costa Rica</option>
                                             <option value="Croatia">Croatia</option>
                                             <option value="Cuba">Cuba</option>
                                             <option value="Cyprus">Cyprus</option>
                                             <option value="Czech Republic">Czech Republic</option>
                                             <option value="Denmark">Denmark</option>
                                             <option value="Djibouti">Djibouti</option>
                                             <option value="Dominica">Dominica</option>
                                             <option value="Dominican Republic">Dominican Republic</option>
                                             <option value="East Timor (Timor-Leste)">East Timor (Timor-Leste)</option>
                                             <option value="Ecuador">Ecuador</option>
                                             <option value="Egypt">Egypt</option>
                                             <option value="El Salvador">El Salvador</option>
                                             <option value="Equatorial Guinea">Equatorial Guinea</option>
                                             <option value="Eritrea">Eritrea</option>
                                             <option value="Estonia">Estonia</option>
                                             <option value="Eswatini">Eswatini</option>
                                             <option value="Ethiopia">Ethiopia</option>
                                             <option value="Fiji">Fiji</option>
                                             <option value="Finland">Finland</option>
                                             <option value="France">France</option>
                                             <option value="Gabon">Gabon</option>
                                             <option value="Gambia">Gambia</option>
                                             <option value="Georgia">Georgia</option>
                                             <option value="Germany">Germany</option>
                                             <option value="Ghana">Ghana</option>
                                             <option value="Greece">Greece</option>
                                             <option value="Grenada">Grenada</option>
                                             <option value="Guatemala">Guatemala</option>
                                             <option value="Guinea">Guinea</option>
                                             <option value="Guinea-Bissau">Guinea-Bissau</option>
                                             <option value="Guyana">Guyana</option>
                                             <option value="Haiti">Haiti</option>
                                             <option value="Honduras">Honduras</option>
                                             <option value="Hungary">Hungary</option>
                                             <option value="Iceland">Iceland</option>
                                             <option value="India">India</option>
                                             <option value="Indonesia">Indonesia</option>
                                             <option value="Iran">Iran</option>
                                             <option value="Iraq">Iraq</option>
                                             <option value="Ireland">Ireland</option>
                                             <option value="Israel">Israel</option>
                                             <option value="Italy">Italy</option>
                                             <option value="Ivory Coast (Côte d'Ivoire)">Ivory Coast (Côte d'Ivoire)</option>
                                             <option value="Jamaica">Jamaica</option>
                                             <option value="Japan">Japan</option>
                                             <option value="Jordan">Jordan</option>
                                             <option value="Kazakhstan">Kazakhstan</option>
                                             <option value="Kenya">Kenya</option>
                                             <option value="Kiribati">Kiribati</option>
                                             <option value="Korea, North">Korea, North</option>
                                             <option value="Korea, South">Korea, South</option>
                                             <option value="Kuwait">Kuwait</option>
                                             <option value="Kyrgyzstan">Kyrgyzstan</option>
                                             <option value="Laos">Laos</option>
                                             <option value="Latvia">Latvia</option>
                                             <option value="Lebanon">Lebanon</option>
                                             <option value="Lesotho">Lesotho</option>
                                             <option value="Liberia">Liberia</option>
                                             <option value="Libya">Libya</option>
                                             <option value="Liechtenstein">Liechtenstein</option>
                                             <option value="Lithuania">Lithuania</option>
                                             <option value="Luxembourg">Luxembourg</option>
                                             <option value="Madagascar">Madagascar</option>
                                             <option value="Malawi">Malawi</option>
                                             <option value="Malaysia">Malaysia</option>
                                             <option value="Maldives">Maldives</option>
                                             <option value="Mali">Mali</option>
                                             <option value="Malta">Malta</option>
                                             <option value="Marshall Islands">Marshall Islands</option>
                                             <option value="Mauritania">Mauritania</option>
                                             <option value="Mauritius">Mauritius</option>
                                             <option value="Mexico">Mexico</option>
                                             <option value="Micronesia">Micronesia</option>
                                             <option value="Moldova">Moldova</option>
                                             <option value="Monaco">Monaco</option>
                                             <option value="Mongolia">Mongolia</option>
                                             <option value="Montenegro">Montenegro</option>
                                             <option value="Morocco">Morocco</option>
                                             <option value="Mozambique">Mozambique</option>
                                             <option value="Myanmar">Myanmar</option>
                                             <option value="Namibia">Namibia</option>
                                             <option value="Nauru">Nauru</option>
                                             <option value="Nepal">Nepal</option>
                                             <option value="Netherlands">Netherlands</option>
                                             <option value="New Zealand">New Zealand</option>
                                             <option value="Nicaragua">Nicaragua</option>
                                             <option value="Niger">Niger</option>
                                             <option value="Nigeria">Nigeria</option>
                                             <option value="North Macedonia">North Macedonia</option>
                                             <option value="Norway">Norway</option>
                                             <option value="Oman">Oman</option>
                                             <option value="Pakistan">Pakistan</option>
                                             <option value="Palau">Palau</option>
                                             <option value="Panama">Panama</option>
                                             <option value="Papua New Guinea">Papua New Guinea</option>
                                             <option value="Paraguay">Paraguay</option>
                                             <option value="Peru">Peru</option>
                                             <option value="Philippines">Philippines</option>
                                             <option value="Poland">Poland</option>
                                             <option value="Portugal">Portugal</option>
                                             <option value="Qatar">Qatar</option>
                                             <option value="Romania">Romania</option>
                                             <option value="Russia">Russia</option>
                                             <option value="Rwanda">Rwanda</option>
                                             <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                             <option value="Saint Lucia">Saint Lucia</option>
                                             <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                             <option value="Samoa">Samoa</option>
                                             <option value="San Marino">San Marino</option>
                                             <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                             <option value="Saudi Arabia">Saudi Arabia</option>
                                             <option value="Senegal">Senegal</option>
                                             <option value="Serbia">Serbia</option>
                                             <option value="Seychelles">Seychelles</option>
                                             <option value="Sierra Leone">Sierra Leone</option>
                                             <option value="Singapore">Singapore</option>
                                             <option value="Slovakia">Slovakia</option>
                                             <option value="Slovenia">Slovenia</option>
                                             <option value="Solomon Islands">Solomon Islands</option>
                                             <option value="Somalia">Somalia</option>
                                             <option value="South Africa">South Africa</option>
                                             <option value="South Sudan">South Sudan</option>
                                             <option value="Spain">Spain</option>
                                             <option value="Sri Lanka">Sri Lanka</option>
                                             <option value="Sudan">Sudan</option>
                                             <option value="Suriname">Suriname</option>
                                             <option value="Sweden">Sweden</option>
                                             <option value="Switzerland">Switzerland</option>
                                             <option value="Syria">Syria</option>
                                             <option value="Taiwan (recognized by some as a separate entity)">Taiwan (recognized by some as a separate entity)</option>
                                             <option value="Tajikistan">Tajikistan</option>
                                             <option value="Tanzania">Tanzania</option>
                                             <option value="Thailand">Thailand</option>
                                             <option value="Togo">Togo</option>
                                             <option value="Tonga">Tonga</option>
                                             <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                             <option value="Tunisia">Tunisia</option>
                                             <option value="Turkey">Turkey</option>
                                             <option value="Turkmenistan">Turkmenistan</option>
                                             <option value="Tuvalu">Tuvalu</option>
                                             <option value="Uganda">Uganda</option>
                                             <option value="Ukraine">Ukraine</option>
                                             <option value="United Arab Emirates">United Arab Emirates</option>
                                             <option value="United Kingdom">United Kingdom</option>
                                             <option value="United States">United States</option>
                                             <option value="Uruguay">Uruguay</option>
                                             <option value="Uzbekistan">Uzbekistan</option>
                                             <option value="Vanuatu">Vanuatu</option>
                                             <option value="Vatican City (Holy See)">Vatican City (Holy See)</option>
                                             <option value="Venezuela">Venezuela</option>
                                             <option value="Vietnam">Vietnam</option>
                                             <option value="Yemen">Yemen</option>
                                             <option value="Zambia">Zambia</option>
                                             <option value="Zimbabwe">Zimbabwe</option>
                                          </select>
                                       </div>
                                       <div class="col-md-6 form-group mb-3">
                                          <label for="marital_status">Marital Status</label>
                                          <select class="form-control" id="marital_status" name="marital_status">
                                             <option value="married">Married</option>
                                             <option value="divorced">Divorced</option>
                                             <option value="widowed">Widowed</option>
                                             <option value="separated">Separated</option>
                                             <option value="single">Single</option>
                                          </select>
                                       </div>
                                       <div class="col-md-6 form-group mb-3">
                                          <label>What is your employment status?</label><br>
                                          <select class="form-control" name="employment_status">
                                             <option value="" selected disabled>Select employment status</option>
                                             <option value="employed">Employed</option>
                                             <option value="dependent">Caring for child under 16 or dependent</option>
                                             <option value="unemployed">Unemployed</option>
                                             <option value="education">In full time education</option>
                                             <option value="professional">Professional</option>
                                             <option value="pensioner">Pensioner (please state previous occupation below)</option>
                                             <option value="self_employed">Self employed (Director/Partner is not self-employed unless a sole trader contractor please confirm in what industry).</option>
                                             <option value="other">Other, please state below current or previous occupation.</option>
                                          </select>
                                       </div>
                                       <div class="col-md-6 form-group mb-3">
                                          <label for="emp_name">Employer Name</label>
                                          <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Enter employer name">
                                       </div>
                                       <div class="col-md-6 form-group mb-3">
                                          <label for="j_title">Job Title</label>
                                          <input type="text" class="form-control" id="j_title" name="j_title" placeholder="Enter your job title">
                                       </div>
                                       <div class=" col-md-6 form-group mb-3">
                                          <label for="occupation">Occupation</label>
                                          <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter your occupation">
                                       </div>
                                       <div class="form-group mb-3">
                                          <label>Have you opted out of any occupational or employer-sponsored, pension arrangement in favour of this pension arrangement?</label><br>
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="opt_out" id="optOutYes" value="Yes">
                                             <label class="form-check-label" for="optOutYes">Yes</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="opt_out" id="optOutNo" value="No">
                                             <label class="form-check-label" for="optOutNo">No</label>
                                          </div>
                                       </div>
                                       <div class="form-group mb-3">
                                          <label>Do you have protection of existing pension rights with HMRC?</label><br>
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="pension_protection" id="protectionYes" value="Yes">
                                             <label class="form-check-label" for="protectionYes">Yes</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="pension_protection" id="protectionNo" value="No">
                                             <label class="form-check-label" for="protectionNo">No</label>
                                          </div>
                                       </div>
                                       <div class="form-group mb-3">
                                          <label>If ‘YES’ please confirm which of the following are applicable:</label><br>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" id="primary_protection" name="applicable_protection1" value="Primary Protection">
                                             <label class="form-check-label" for="primary_protection">Primary Protection</label>
                                          </div>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" id="enhanced_lifetime" name="applicable_protection2" value="Enhanced Lifetime Allowance">
                                             <label class="form-check-label" for="enhanced_lifetime">Enhanced Lifetime Allowance</label>
                                          </div>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" id="individual_2014" name="applicable_protection3" value="Individual Protection 2014">
                                             <label class="form-check-label" for="individual_2014">Individual Protection 2014</label>
                                          </div>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" id="primary_lump" name="applicable_protection4" value="Primary Protection with Lump Sum Protection">
                                             <label class="form-check-label" for="primary_lump">Primary Protection with Lump Sum Protection</label>
                                          </div>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" id="fixed_2012" name="applicable_protection5" value="Fixed Protection 2012">
                                             <label class="form-check-label" for="fixed_2012">Fixed Protection 2012</label>
                                          </div>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" id="individual_2016" name="applicable_protection6" value="Individual Protection 2016">
                                             <label class="form-check-label" for="individual_2016">Individual Protection 2016</label>
                                          </div>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" id="enhanced_protection" name="applicable_protection7" value="Enhanced Protection">
                                             <label class="form-check-label" for="enhanced_protection">Enhanced Protection</label>
                                          </div>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" id="fixed_2014" name="applicable_protection8" value="Fixed Protection 2014">
                                             <label class="form-check-label" for="fixed_2014">Fixed Protection 2014</label>
                                          </div>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" id="enhanced_lump" name="applicable_protection9" value="Enhanced Protection with Lump Sum Protection">
                                             <label class="form-check-label" for="enhanced_lump">Enhanced Protection with Lump Sum Protection</label>
                                          </div>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" id="fixed_2016" name="applicable_protection10" value="Fixed Protection 2016">
                                             <label class="form-check-label" for="fixed_2016">Fixed Protection 2016</label>
                                          </div>
                                       </div>
                                       <div class="form-group mb-3">
                                          <label>Are you subject to the money purchase annual allowance?</label><br>
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="annual_allowance" id="allowanceYes" value="Yes">
                                             <label class="form-check-label" for="allowanceYes">Yes</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="annual_allowance" id="allowanceNo" value="No">
                                             <label class="form-check-label" for="allowanceNo">No</label>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="form-group mb-3">
                                             <label>If Yes, please confirm the date the first payment occurred</label>
                                             <input type="date" class="form-control" id="first_payment_date" name="first_payment_date">
                                          </div>
                                          <div class="form-group mb-3">
                                             <label>Have you received any Lump Sum and Death Benefit Allowance? If you have please confirm how much you have received</label>
                                             <input type="text" class="form-control" id="lump_sum_amount" name="lump_sum_amount">
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
                                 <input type="number" class="form-control" name="income_employment">
                              </div>
                              <div class="col-md-6">
                                 <label>Annual Income from pension</label>
                                 <input type="number" class="form-control" name="income_pension">
                              </div>
                              <div class="col-md-6">
                                 <label>Income from savings/investments</label>
                                 <input type="number" class="form-control" name="income_savings">
                              </div>
                              <div class="col-md-6">
                                 <label>Gifted funds</label>
                                 <input type="number" class="form-control" name="income_gifted">
                              </div>
                              <div class="col-md-6">
                                 <label>Lottery and/or other winnings</label>
                                 <input type="number" class="form-control" name="income_lottery">
                              </div>
                              <div class="col-md-6">
                                 <label>Property</label>
                                 <input type="text" class="form-control" name="income_property">
                              </div>
                              <div class="col-md-6">
                                 <label>Inheritance</label>
                                 <input type="number" class="form-control" name="income_inheritance">
                              </div>
                              <div class="col-md-6">
                                 <label>Divorce Settlements</label>
                                 <input type="number" class="form-control" name="income_divorce">
                              </div>
                              <div class="col-md-12">
                                 <label>Other (Please state)</label>
                                 <input type="text" class="form-control" name="income_other">
                              </div>
                           </div>
                           <div class="form-group mb-3">
                              <label>Are any of your assets located outside of the UK? If yes, please give details.</label><br>
                              <div class="form-check form-check-inline">
                                 <input type="radio" class="form-check-input" name="assets_outside_uk" id="assetsYes" value="yes">
                                 <label class="form-check-label" for="assetsYes">Yes</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input type="radio" class="form-check-input" name="assets_outside_uk" id="assetsNo" value="no">
                                 <label class="form-check-label" for="assetsNo">No</label>
                              </div>
                           </div>
                           <div class="form-group mb-3">
                              <label>If yes, please give details:</label>
                              <textarea class="form-control" name="assets_details" rows="3"></textarea>
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
                              <input class="form-check-input" type="radio" name="tax_relief" id="option1" value="option1">
                              <label class="form-check-label" for="option1">
                              I have relevant UK earnings chargeable to UK income tax, and I have been resident in the UK some time during the current tax year.
                              </label>
                           </div>
                           <div class="form-check mb-2">
                              <input class="form-check-input" type="radio" name="tax_relief" id="option2" value="option2">
                              <label class="form-check-label" for="option2">
                              I have general earnings from overseas Crown employment subject to UK tax in the current tax year.
                              </label>
                           </div>
                           <div class="form-check mb-2">
                              <input class="form-check-input" type="radio" name="tax_relief" id="option3" value="option3">
                              <label class="form-check-label" for="option3">
                              My spouse/civil partner has general earnings from overseas Crown employment subject to UK tax in the current tax year.
                              </label>
                           </div>
                           <div class="form-check mb-2">
                              <input class="form-check-input" type="radio" name="tax_relief" id="option4" value="option4">
                              <label class="form-check-label" for="option4">
                              I am not resident in the UK in the current tax year, but
                              – I was resident in the UK at some time during the five tax years immediately before the tax year in question,
                              and
                              – I was resident in the UK when I joined the pension scheme, and
                              – I have relevant UK earnings chargeable to UK income tax.
                              </label>
                           </div>
                           <div class="form-check mb-2">
                              <input class="form-check-input" type="radio" name="tax_relief" id="option5" value="option5">
                              <label class="form-check-label" for="option5">
                              I have no relevant UK earnings chargeable to income tax, but I have been resident in the UK some time during the current tax year.
                              </label>
                           </div>
                           <div class="form-check mb-2">
                              <input class="form-check-input" type="radio" name="tax_relief" id="option6" value="option6">
                              <label class="form-check-label" for="option6">
                              I or my spouse/civil partner are in overseas Crown employment but do not have general earnings subject to UK tax in the current tax year.
                              </label>
                           </div>
                           <div class="form-check mb-2">
                              <input class="form-check-input" type="radio" name="tax_relief" id="option7" value="option7">
                              <label class="form-check-label" for="option7">
                              I cannot tick any of the above, but
                              – I was resident in the UK, or had earnings chargeable to UK income tax, at some time during the five years
                              immediately before the tax year in question, and
                              – I was resident in the UK when I joined the pension scheme.
                              </label>
                           </div>
                           <div class="form-check mb-2">
                              <input class="form-check-input" type="radio" name="tax_relief" id="option8" value="option8">
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
                              <input type="text" class="form-control" id="financial_contact_name" name="financial_contact_name" placeholder="Enter contact name">
                           </div>
                           <div class="form-group col-md-6 mb-3">
                              <label for="company_name">Company Name</label>
                              <input type="text" class="form-control" id="financial_company_name" name="financial_company_name" placeholder="Enter company name">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group  col-6 mb-3">
                              <label for="address">Address</label>
                              <input type="text" class="form-control mb-2" id="street_address" name="street_address" placeholder="Street Address">
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="financial_postcode">Postcode</label>
                              <input type="text" class="form-control" id="financial_postcode" name="financial_postcode" placeholder="Postcode">
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="city">Country</label>
                              <select class="form-control" id="city" name="city">
                                 <option value="" selected disabled>Select Country</option>
                                 <option value="Afghanistan">Afghanistan</option>
                                 <option value="Albania">Albania</option>
                                 <option value="Algeria">Algeria</option>
                                 <option value="Andorra">Andorra</option>
                                 <option value="Angola">Angola</option>
                                 <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                 <option value="Argentina">Argentina</option>
                                 <option value="Armenia">Armenia</option>
                                 <option value="Australia">Australia</option>
                                 <option value="Austria">Austria</option>
                                 <option value="Azerbaijan">Azerbaijan</option>
                                 <option value="Bahamas">Bahamas</option>
                                 <option value="Bahrain">Bahrain</option>
                                 <option value="Bangladesh">Bangladesh</option>
                                 <option value="Barbados">Barbados</option>
                                 <option value="Belarus">Belarus</option>
                                 <option value="Belgium">Belgium</option>
                                 <option value="Belize">Belize</option>
                                 <option value="Benin">Benin</option>
                                 <option value="Bhutan">Bhutan</option>
                                 <option value="Bolivia">Bolivia</option>
                                 <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                 <option value="Botswana">Botswana</option>
                                 <option value="Brazil">Brazil</option>
                                 <option value="Brunei">Brunei</option>
                                 <option value="Bulgaria">Bulgaria</option>
                                 <option value="Burkina Faso">Burkina Faso</option>
                                 <option value="Burundi">Burundi</option>
                                 <option value="Cambodia">Cambodia</option>
                                 <option value="Cameroon">Cameroon</option>
                                 <option value="Canada">Canada</option>
                                 <option value="Cape Verde">Cape Verde</option>
                                 <option value="Central African Republic">Central African Republic</option>
                                 <option value="Chad">Chad</option>
                                 <option value="Chile">Chile</option>
                                 <option value="China">China</option>
                                 <option value="Colombia">Colombia</option>
                                 <option value="Comoros">Comoros</option>
                                 <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                                 <option value="Congo, Republic of the">Congo, Republic of the</option>
                                 <option value="Costa Rica">Costa Rica</option>
                                 <option value="Croatia">Croatia</option>
                                 <option value="Cuba">Cuba</option>
                                 <option value="Cyprus">Cyprus</option>
                                 <option value="Czech Republic">Czech Republic</option>
                                 <option value="Denmark">Denmark</option>
                                 <option value="Djibouti">Djibouti</option>
                                 <option value="Dominica">Dominica</option>
                                 <option value="Dominican Republic">Dominican Republic</option>
                                 <option value="East Timor (Timor-Leste)">East Timor (Timor-Leste)</option>
                                 <option value="Ecuador">Ecuador</option>
                                 <option value="Egypt">Egypt</option>
                                 <option value="El Salvador">El Salvador</option>
                                 <option value="Equatorial Guinea">Equatorial Guinea</option>
                                 <option value="Eritrea">Eritrea</option>
                                 <option value="Estonia">Estonia</option>
                                 <option value="Eswatini">Eswatini</option>
                                 <option value="Ethiopia">Ethiopia</option>
                                 <option value="Fiji">Fiji</option>
                                 <option value="Finland">Finland</option>
                                 <option value="France">France</option>
                                 <option value="Gabon">Gabon</option>
                                 <option value="Gambia">Gambia</option>
                                 <option value="Georgia">Georgia</option>
                                 <option value="Germany">Germany</option>
                                 <option value="Ghana">Ghana</option>
                                 <option value="Greece">Greece</option>
                                 <option value="Grenada">Grenada</option>
                                 <option value="Guatemala">Guatemala</option>
                                 <option value="Guinea">Guinea</option>
                                 <option value="Guinea-Bissau">Guinea-Bissau</option>
                                 <option value="Guyana">Guyana</option>
                                 <option value="Haiti">Haiti</option>
                                 <option value="Honduras">Honduras</option>
                                 <option value="Hungary">Hungary</option>
                                 <option value="Iceland">Iceland</option>
                                 <option value="India">India</option>
                                 <option value="Indonesia">Indonesia</option>
                                 <option value="Iran">Iran</option>
                                 <option value="Iraq">Iraq</option>
                                 <option value="Ireland">Ireland</option>
                                 <option value="Israel">Israel</option>
                                 <option value="Italy">Italy</option>
                                 <option value="Ivory Coast (Côte d'Ivoire)">Ivory Coast (Côte d'Ivoire)</option>
                                 <option value="Jamaica">Jamaica</option>
                                 <option value="Japan">Japan</option>
                                 <option value="Jordan">Jordan</option>
                                 <option value="Kazakhstan">Kazakhstan</option>
                                 <option value="Kenya">Kenya</option>
                                 <option value="Kiribati">Kiribati</option>
                                 <option value="Korea, North">Korea, North</option>
                                 <option value="Korea, South">Korea, South</option>
                                 <option value="Kuwait">Kuwait</option>
                                 <option value="Kyrgyzstan">Kyrgyzstan</option>
                                 <option value="Laos">Laos</option>
                                 <option value="Latvia">Latvia</option>
                                 <option value="Lebanon">Lebanon</option>
                                 <option value="Lesotho">Lesotho</option>
                                 <option value="Liberia">Liberia</option>
                                 <option value="Libya">Libya</option>
                                 <option value="Liechtenstein">Liechtenstein</option>
                                 <option value="Lithuania">Lithuania</option>
                                 <option value="Luxembourg">Luxembourg</option>
                                 <option value="Madagascar">Madagascar</option>
                                 <option value="Malawi">Malawi</option>
                                 <option value="Malaysia">Malaysia</option>
                                 <option value="Maldives">Maldives</option>
                                 <option value="Mali">Mali</option>
                                 <option value="Malta">Malta</option>
                                 <option value="Marshall Islands">Marshall Islands</option>
                                 <option value="Mauritania">Mauritania</option>
                                 <option value="Mauritius">Mauritius</option>
                                 <option value="Mexico">Mexico</option>
                                 <option value="Micronesia">Micronesia</option>
                                 <option value="Moldova">Moldova</option>
                                 <option value="Monaco">Monaco</option>
                                 <option value="Mongolia">Mongolia</option>
                                 <option value="Montenegro">Montenegro</option>
                                 <option value="Morocco">Morocco</option>
                                 <option value="Mozambique">Mozambique</option>
                                 <option value="Myanmar">Myanmar</option>
                                 <option value="Namibia">Namibia</option>
                                 <option value="Nauru">Nauru</option>
                                 <option value="Nepal">Nepal</option>
                                 <option value="Netherlands">Netherlands</option>
                                 <option value="New Zealand">New Zealand</option>
                                 <option value="Nicaragua">Nicaragua</option>
                                 <option value="Niger">Niger</option>
                                 <option value="Nigeria">Nigeria</option>
                                 <option value="North Macedonia">North Macedonia</option>
                                 <option value="Norway">Norway</option>
                                 <option value="Oman">Oman</option>
                                 <option value="Pakistan">Pakistan</option>
                                 <option value="Palau">Palau</option>
                                 <option value="Panama">Panama</option>
                                 <option value="Papua New Guinea">Papua New Guinea</option>
                                 <option value="Paraguay">Paraguay</option>
                                 <option value="Peru">Peru</option>
                                 <option value="Philippines">Philippines</option>
                                 <option value="Poland">Poland</option>
                                 <option value="Portugal">Portugal</option>
                                 <option value="Qatar">Qatar</option>
                                 <option value="Romania">Romania</option>
                                 <option value="Russia">Russia</option>
                                 <option value="Rwanda">Rwanda</option>
                                 <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                 <option value="Saint Lucia">Saint Lucia</option>
                                 <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                 <option value="Samoa">Samoa</option>
                                 <option value="San Marino">San Marino</option>
                                 <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                 <option value="Saudi Arabia">Saudi Arabia</option>
                                 <option value="Senegal">Senegal</option>
                                 <option value="Serbia">Serbia</option>
                                 <option value="Seychelles">Seychelles</option>
                                 <option value="Sierra Leone">Sierra Leone</option>
                                 <option value="Singapore">Singapore</option>
                                 <option value="Slovakia">Slovakia</option>
                                 <option value="Slovenia">Slovenia</option>
                                 <option value="Solomon Islands">Solomon Islands</option>
                                 <option value="Somalia">Somalia</option>
                                 <option value="South Africa">South Africa</option>
                                 <option value="South Sudan">South Sudan</option>
                                 <option value="Spain">Spain</option>
                                 <option value="Sri Lanka">Sri Lanka</option>
                                 <option value="Sudan">Sudan</option>
                                 <option value="Suriname">Suriname</option>
                                 <option value="Sweden">Sweden</option>
                                 <option value="Switzerland">Switzerland</option>
                                 <option value="Syria">Syria</option>
                                 <option value="Taiwan (recognized by some as a separate entity)">Taiwan (recognized by some as a separate entity)</option>
                                 <option value="Tajikistan">Tajikistan</option>
                                 <option value="Tanzania">Tanzania</option>
                                 <option value="Thailand">Thailand</option>
                                 <option value="Togo">Togo</option>
                                 <option value="Tonga">Tonga</option>
                                 <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                 <option value="Tunisia">Tunisia</option>
                                 <option value="Turkey">Turkey</option>
                                 <option value="Turkmenistan">Turkmenistan</option>
                                 <option value="Tuvalu">Tuvalu</option>
                                 <option value="Uganda">Uganda</option>
                                 <option value="Ukraine">Ukraine</option>
                                 <option value="United Arab Emirates">United Arab Emirates</option>
                                 <option value="United Kingdom">United Kingdom</option>
                                 <option value="United States">United States</option>
                                 <option value="Uruguay">Uruguay</option>
                                 <option value="Uzbekistan">Uzbekistan</option>
                                 <option value="Vanuatu">Vanuatu</option>
                                 <option value="Vatican City (Holy See)">Vatican City (Holy See)</option>
                                 <option value="Venezuela">Venezuela</option>
                                 <option value="Vietnam">Vietnam</option>
                                 <option value="Yemen">Yemen</option>
                                 <option value="Zambia">Zambia</option>
                                 <option value="Zimbabwe">Zimbabwe</option>
                              </select>
                           </div>
                           <div class=" col-md-6 ">
                              <label for="financial_telephone_number">Telephone Number</label>
                              <input type="text" class="form-control mb-2" id="financial_telephone_number" name="financial_telephone_number" placeholder="Enter telephone number">
                           </div>
                           <div class="form-group col-md-6 ">
                              <label for="financial_email_address">Email Address</label>
                              <input type="email" class="form-control" id="financial_email_address" name="financial_email_address" placeholder="Enter email address">
                           </div>
                           <div class="form-group col-md-6 ">
                              <label for="regulated_by">Regulated By</label>
                              <input type="text" class="form-control" id="regulated_by" name="regulated_by" placeholder="Enter regulated authority">
                           </div>
                           <div class="form-group col-md-6 mb-3">
                              <label for="authorisation_number">Authorisation Number</label>
                              <input type="text" class="form-control" id="authorisation_number" name="authorisation_number" placeholder="Enter authorisation number">
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label for="network_name">Name of Network or Principal</label>
                              <input type="text" class="form-control" id="network_name" name="network_name" placeholder="Enter name of network or principal">
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label for="regulated_by_second">Regulated By (Again)</label>
                              <input type="text" class="form-control" id="regulated_by_second" name="regulated_by_second" placeholder="Enter regulated authority again">
                           </div>
                           <div class="col-md-6">
                              <label for="company_authorisation_number">Company Authorisation Number</label>
                              <input type="text" class="form-control" id="company_authorisation_number" name="company_authorisation_number" placeholder="Enter company authorisation number">
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label for="financial_adviser_remuneration">Financial Adviser Remuneration</label>
                              <input type="text" class="form-control" id="financial_adviser_remuneration" name="financial_adviser_remuneration">
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label>Initial Fees (%/£):</label>
                              <input type="text" class="form-control" name="initial_fees">
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label for="ongoing_fees">Ongoing Fees (%/£)</label>
                              <input type="text" class="form-control" id="ongoing_fees" name="ongoing_fees">
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label>Frequency:</label>
                              <input type="text" class="form-control" name="frequency">
                           </div>
                           <div class="mb-3">
                              <input class="form-check-input" type="checkbox" id="scheme_establishment" name="scheme_establishment" value="following_establishment">
                              <label class="form-check-label" for="scheme_establishment">
                              To be paid following scheme establishment
                              </label>
                              <div class="row mb-2">
                                 <div class="col-md-4">
                                    <input class="form-check-input" type="checkbox" id="date_option" name="date_option" value="specific_date">
                                    <label class="form-check-label" for="date_option">or date</label>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="d-flex">
                                       <input type="date" class="form-control date-input" id="date_input" name="date_day" placeholder="Date" value="">
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
                                    name="scheme_anniversary" value="on_anniversary">
                                 <label class="form-check-label" for="scheme_anniversary">
                                 To be paid on the scheme anniversary
                                 </label>
                              </div>
                              <div class="row mb-2">
                                 <div class="col-md-4">
                                    <input class="form-check-input" type="checkbox" id="date_option2" name="date_option2"
                                       value="specific_date">
                                    <label class="form-check-label" for="date_option2">or date</label>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="d-flex">
                                       <input type="date" class="form-control date-input" name="date2_day" placeholder="Date" value="">
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
                                 <tr>
                                    <td><input type="text" class="form-control" name="beneficiary_name[]"></td>
                                    <td><input type="text" class="form-control" name="beneficiary_relationship[]"></td>
                                    <td><input type="number" class="form-control" name="beneficiary_percentage[]"></td>
                                    <td><button type="button" class="btn btn-danger remove-beneficiary">Remove</button></td>
                                 </tr>
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
                                 <tr>
                                    <td><input type="text" class="form-control" name="charity_name[]"></td>
                                    <td><input type="number" class="form-control" name="charity_percentage[]"></td>
                                    <td><button type="button" class="btn btn-danger remove-charity">Remove</button></td>
                                 </tr>
                              </tbody>
                           </table>
                           <button type="button" class="btn btn-primary" id="add-charity">Add Charity</button>
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
                  <div id="polocoesCrime" class="content" style="display: none;">
                     <div class="content-header mb-6">
                        <h4>Personal Contributions</h4>
                     </div>
                     <div class="row g-6">
                        <div class="col-md-6 mb-3">
                           <label for="contribute_regular_contribution">Regular Contribution</label>
                           <input type="text" class="form-control" id="contribute_regular_contribution" name="contribute_regular_contribution" placeholder="Enter amount">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="contribute_single_contribution">Single Contribution</label>
                           <input type="text" class="form-control" id="contribute_single_contribution" name="contribute_single_contribution" placeholder="Enter amount">
                        </div>
                        <div class="form-group mb-3">
                           <label for="source_of_funds">Source of Funds (Remitting bank details, beneficial owner of the funds and the origin of the funds).</label>
                           <textarea class="form-control" id="source_of_funds" name="source_of_funds" rows="3" placeholder="Enter remitting bank details, beneficial owner, and origin of funds"></textarea>
                        </div>
                        <div class="form-group mb-3">
                           <label>Regular Contribution Payment Frequency</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="payment_frequency" id="monthly" value="Monthly">
                              <label class="form-check-label" for="monthly">Monthly</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="payment_frequency" id="quarterly" value="Quarterly">
                              <label class="form-check-label" for="quarterly">Quarterly</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="payment_frequency" id="half_yearly" value="Half-yearly">
                              <label class="form-check-label" for="half_yearly">Half-yearly</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="payment_frequency" id="yearly" value="Yearly">
                              <label class="form-check-label" for="yearly">Yearly</label>
                           </div>
                        </div>
                        <div class=" col-12 form-group mb-3">
                           <label for="start_date">Start Date for Regular Contributions</label>
                           <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
                        <div class="form-group mb-3">
                           <label>Will your employer pay your personal contributions on your behalf?</label><br>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="employer_pay" id="employerYes" value="Yes">
                              <label class="form-check-label" for="employerYes">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="employer_pay" id="employerNo" value="No">
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
                              <input type="text" class="form-control" id="employer_name" name="employer_name" placeholder="Enter employer name">
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label for="reg_address">Registered Address (if applicable)</label>
                              <input type="text" class="form-control" id="reg_address" name="reg_address" >
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="employer_details_country">Country (for Registered Address)</label>
                              <select class="form-control" id="employer_details_country" name="employer_details_country">
                                 <option value="" selected disabled>Select Country</option>
                                 <option value="Afghanistan">Afghanistan</option>
                                 <option value="Albania">Albania</option>
                                 <option value="Algeria">Algeria</option>
                                 <option value="Andorra">Andorra</option>
                                 <option value="Angola">Angola</option>
                                 <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                 <option value="Argentina">Argentina</option>
                                 <option value="Armenia">Armenia</option>
                                 <option value="Australia">Australia</option>
                                 <option value="Austria">Austria</option>
                                 <option value="Azerbaijan">Azerbaijan</option>
                                 <option value="Bahamas">Bahamas</option>
                                 <option value="Bahrain">Bahrain</option>
                                 <option value="Bangladesh">Bangladesh</option>
                                 <option value="Barbados">Barbados</option>
                                 <option value="Belarus">Belarus</option>
                                 <option value="Belgium">Belgium</option>
                                 <option value="Belize">Belize</option>
                                 <option value="Benin">Benin</option>
                                 <option value="Bhutan">Bhutan</option>
                                 <option value="Bolivia">Bolivia</option>
                                 <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                 <option value="Botswana">Botswana</option>
                                 <option value="Brazil">Brazil</option>
                                 <option value="Brunei">Brunei</option>
                                 <option value="Bulgaria">Bulgaria</option>
                                 <option value="Burkina Faso">Burkina Faso</option>
                                 <option value="Burundi">Burundi</option>
                                 <option value="Cambodia">Cambodia</option>
                                 <option value="Cameroon">Cameroon</option>
                                 <option value="Canada">Canada</option>
                                 <option value="Cape Verde">Cape Verde</option>
                                 <option value="Central African Republic">Central African Republic</option>
                                 <option value="Chad">Chad</option>
                                 <option value="Chile">Chile</option>
                                 <option value="China">China</option>
                                 <option value="Colombia">Colombia</option>
                                 <option value="Comoros">Comoros</option>
                                 <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                                 <option value="Congo, Republic of the">Congo, Republic of the</option>
                                 <option value="Costa Rica">Costa Rica</option>
                                 <option value="Croatia">Croatia</option>
                                 <option value="Cuba">Cuba</option>
                                 <option value="Cyprus">Cyprus</option>
                                 <option value="Czech Republic">Czech Republic</option>
                                 <option value="Denmark">Denmark</option>
                                 <option value="Djibouti">Djibouti</option>
                                 <option value="Dominica">Dominica</option>
                                 <option value="Dominican Republic">Dominican Republic</option>
                                 <option value="East Timor (Timor-Leste)">East Timor (Timor-Leste)</option>
                                 <option value="Ecuador">Ecuador</option>
                                 <option value="Egypt">Egypt</option>
                                 <option value="El Salvador">El Salvador</option>
                                 <option value="Equatorial Guinea">Equatorial Guinea</option>
                                 <option value="Eritrea">Eritrea</option>
                                 <option value="Estonia">Estonia</option>
                                 <option value="Eswatini">Eswatini</option>
                                 <option value="Ethiopia">Ethiopia</option>
                                 <option value="Fiji">Fiji</option>
                                 <option value="Finland">Finland</option>
                                 <option value="France">France</option>
                                 <option value="Gabon">Gabon</option>
                                 <option value="Gambia">Gambia</option>
                                 <option value="Georgia">Georgia</option>
                                 <option value="Germany">Germany</option>
                                 <option value="Ghana">Ghana</option>
                                 <option value="Greece">Greece</option>
                                 <option value="Grenada">Grenada</option>
                                 <option value="Guatemala">Guatemala</option>
                                 <option value="Guinea">Guinea</option>
                                 <option value="Guinea-Bissau">Guinea-Bissau</option>
                                 <option value="Guyana">Guyana</option>
                                 <option value="Haiti">Haiti</option>
                                 <option value="Honduras">Honduras</option>
                                 <option value="Hungary">Hungary</option>
                                 <option value="Iceland">Iceland</option>
                                 <option value="India">India</option>
                                 <option value="Indonesia">Indonesia</option>
                                 <option value="Iran">Iran</option>
                                 <option value="Iraq">Iraq</option>
                                 <option value="Ireland">Ireland</option>
                                 <option value="Israel">Israel</option>
                                 <option value="Italy">Italy</option>
                                 <option value="Ivory Coast (Côte d'Ivoire)">Ivory Coast (Côte d'Ivoire)</option>
                                 <option value="Jamaica">Jamaica</option>
                                 <option value="Japan">Japan</option>
                                 <option value="Jordan">Jordan</option>
                                 <option value="Kazakhstan">Kazakhstan</option>
                                 <option value="Kenya">Kenya</option>
                                 <option value="Kiribati">Kiribati</option>
                                 <option value="Korea, North">Korea, North</option>
                                 <option value="Korea, South">Korea, South</option>
                                 <option value="Kuwait">Kuwait</option>
                                 <option value="Kyrgyzstan">Kyrgyzstan</option>
                                 <option value="Laos">Laos</option>
                                 <option value="Latvia">Latvia</option>
                                 <option value="Lebanon">Lebanon</option>
                                 <option value="Lesotho">Lesotho</option>
                                 <option value="Liberia">Liberia</option>
                                 <option value="Libya">Libya</option>
                                 <option value="Liechtenstein">Liechtenstein</option>
                                 <option value="Lithuania">Lithuania</option>
                                 <option value="Luxembourg">Luxembourg</option>
                                 <option value="Madagascar">Madagascar</option>
                                 <option value="Malawi">Malawi</option>
                                 <option value="Malaysia">Malaysia</option>
                                 <option value="Maldives">Maldives</option>
                                 <option value="Mali">Mali</option>
                                 <option value="Malta">Malta</option>
                                 <option value="Marshall Islands">Marshall Islands</option>
                                 <option value="Mauritania">Mauritania</option>
                                 <option value="Mauritius">Mauritius</option>
                                 <option value="Mexico">Mexico</option>
                                 <option value="Micronesia">Micronesia</option>
                                 <option value="Moldova">Moldova</option>
                                 <option value="Monaco">Monaco</option>
                                 <option value="Mongolia">Mongolia</option>
                                 <option value="Montenegro">Montenegro</option>
                                 <option value="Morocco">Morocco</option>
                                 <option value="Mozambique">Mozambique</option>
                                 <option value="Myanmar">Myanmar</option>
                                 <option value="Namibia">Namibia</option>
                                 <option value="Nauru">Nauru</option>
                                 <option value="Nepal">Nepal</option>
                                 <option value="Netherlands">Netherlands</option>
                                 <option value="New Zealand">New Zealand</option>
                                 <option value="Nicaragua">Nicaragua</option>
                                 <option value="Niger">Niger</option>
                                 <option value="Nigeria">Nigeria</option>
                                 <option value="North Macedonia">North Macedonia</option>
                                 <option value="Norway">Norway</option>
                                 <option value="Oman">Oman</option>
                                 <option value="Pakistan">Pakistan</option>
                                 <option value="Palau">Palau</option>
                                 <option value="Panama">Panama</option>
                                 <option value="Papua New Guinea">Papua New Guinea</option>
                                 <option value="Paraguay">Paraguay</option>
                                 <option value="Peru">Peru</option>
                                 <option value="Philippines">Philippines</option>
                                 <option value="Poland">Poland</option>
                                 <option value="Portugal">Portugal</option>
                                 <option value="Qatar">Qatar</option>
                                 <option value="Romania">Romania</option>
                                 <option value="Russia">Russia</option>
                                 <option value="Rwanda">Rwanda</option>
                                 <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                 <option value="Saint Lucia">Saint Lucia</option>
                                 <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                 <option value="Samoa">Samoa</option>
                                 <option value="San Marino">San Marino</option>
                                 <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                 <option value="Saudi Arabia">Saudi Arabia</option>
                                 <option value="Senegal">Senegal</option>
                                 <option value="Serbia">Serbia</option>
                                 <option value="Seychelles">Seychelles</option>
                                 <option value="Sierra Leone">Sierra Leone</option>
                                 <option value="Singapore">Singapore</option>
                                 <option value="Slovakia">Slovakia</option>
                                 <option value="Slovenia">Slovenia</option>
                                 <option value="Solomon Islands">Solomon Islands</option>
                                 <option value="Somalia">Somalia</option>
                                 <option value="South Africa">South Africa</option>
                                 <option value="South Sudan">South Sudan</option>
                                 <option value="Spain">Spain</option>
                                 <option value="Sri Lanka">Sri Lanka</option>
                                 <option value="Sudan">Sudan</option>
                                 <option value="Suriname">Suriname</option>
                                 <option value="Sweden">Sweden</option>
                                 <option value="Switzerland">Switzerland</option>
                                 <option value="Syria">Syria</option>
                                 <option value="Taiwan (recognized by some as a separate entity)">Taiwan (recognized by some as a separate entity)</option>
                                 <option value="Tajikistan">Tajikistan</option>
                                 <option value="Tanzania">Tanzania</option>
                                 <option value="Thailand">Thailand</option>
                                 <option value="Togo">Togo</option>
                                 <option value="Tonga">Tonga</option>
                                 <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                 <option value="Tunisia">Tunisia</option>
                                 <option value="Turkey">Turkey</option>
                                 <option value="Turkmenistan">Turkmenistan</option>
                                 <option value="Tuvalu">Tuvalu</option>
                                 <option value="Uganda">Uganda</option>
                                 <option value="Ukraine">Ukraine</option>
                                 <option value="United Arab Emirates">United Arab Emirates</option>
                                 <option value="United Kingdom">United Kingdom</option>
                                 <option value="United States">United States</option>
                                 <option value="Uruguay">Uruguay</option>
                                 <option value="Uzbekistan">Uzbekistan</option>
                                 <option value="Vanuatu">Vanuatu</option>
                                 <option value="Vatican City (Holy See)">Vatican City (Holy See)</option>
                                 <option value="Venezuela">Venezuela</option>
                                 <option value="Vietnam">Vietnam</option>
                                 <option value="Yemen">Yemen</option>
                                 <option value="Zambia">Zambia</option>
                                 <option value="Zimbabwe">Zimbabwe</option>
                              </select>
                           </div>
                           <div class=" col-md-6 form-group mb-3">
                              <label for="employee_postcode">Postcode (for Registered Address)</label>
                              <input type="text" class="form-control" id="employee_postcode" name="employee_postcode" placeholder="Enter postcode">
                           </div>
                           <div class=" col-md-6 form-group mb-3">
                              <label for="telephone_number">Telephone Number (for Registered Address)</label>
                              <input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="Enter telephone number">
                           </div>
                           <div class=" col-md-6 form-group mb-3">
                              <label for="email_address">Email Address (for Registered Address)</label>
                              <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Enter email address">
                           </div>
                           <div class="form-group mb-3 col-md-6">
                              <label for="trading_address">Trading Address (if different from above)</label>
                              <input type="text" class="form-control" id="trading_address" name="trading_address" placeholder="Enter trading address">
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="trading_address_country">Country (for Trading Address)</label>
                              <select class="form-control" id="trading_address_country" name="trading_address_country">
                                 <option value="" selected disabled>Select Country</option>
                                 <option value="Afghanistan">Afghanistan</option>
                                 <option value="Albania">Albania</option>
                                 <option value="Algeria">Algeria</option>
                                 <option value="Andorra">Andorra</option>
                                 <option value="Angola">Angola</option>
                                 <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                 <option value="Argentina">Argentina</option>
                                 <option value="Armenia">Armenia</option>
                                 <option value="Australia">Australia</option>
                                 <option value="Austria">Austria</option>
                                 <option value="Azerbaijan">Azerbaijan</option>
                                 <option value="Bahamas">Bahamas</option>
                                 <option value="Bahrain">Bahrain</option>
                                 <option value="Bangladesh">Bangladesh</option>
                                 <option value="Barbados">Barbados</option>
                                 <option value="Belarus">Belarus</option>
                                 <option value="Belgium">Belgium</option>
                                 <option value="Belize">Belize</option>
                                 <option value="Benin">Benin</option>
                                 <option value="Bhutan">Bhutan</option>
                                 <option value="Bolivia">Bolivia</option>
                                 <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                 <option value="Botswana">Botswana</option>
                                 <option value="Brazil">Brazil</option>
                                 <option value="Brunei">Brunei</option>
                                 <option value="Bulgaria">Bulgaria</option>
                                 <option value="Burkina Faso">Burkina Faso</option>
                                 <option value="Burundi">Burundi</option>
                                 <option value="Cambodia">Cambodia</option>
                                 <option value="Cameroon">Cameroon</option>
                                 <option value="Canada">Canada</option>
                                 <option value="Cape Verde">Cape Verde</option>
                                 <option value="Central African Republic">Central African Republic</option>
                                 <option value="Chad">Chad</option>
                                 <option value="Chile">Chile</option>
                                 <option value="China">China</option>
                                 <option value="Colombia">Colombia</option>
                                 <option value="Comoros">Comoros</option>
                                 <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                                 <option value="Congo, Republic of the">Congo, Republic of the</option>
                                 <option value="Costa Rica">Costa Rica</option>
                                 <option value="Croatia">Croatia</option>
                                 <option value="Cuba">Cuba</option>
                                 <option value="Cyprus">Cyprus</option>
                                 <option value="Czech Republic">Czech Republic</option>
                                 <option value="Denmark">Denmark</option>
                                 <option value="Djibouti">Djibouti</option>
                                 <option value="Dominica">Dominica</option>
                                 <option value="Dominican Republic">Dominican Republic</option>
                                 <option value="East Timor (Timor-Leste)">East Timor (Timor-Leste)</option>
                                 <option value="Ecuador">Ecuador</option>
                                 <option value="Egypt">Egypt</option>
                                 <option value="El Salvador">El Salvador</option>
                                 <option value="Equatorial Guinea">Equatorial Guinea</option>
                                 <option value="Eritrea">Eritrea</option>
                                 <option value="Estonia">Estonia</option>
                                 <option value="Eswatini">Eswatini</option>
                                 <option value="Ethiopia">Ethiopia</option>
                                 <option value="Fiji">Fiji</option>
                                 <option value="Finland">Finland</option>
                                 <option value="France">France</option>
                                 <option value="Gabon">Gabon</option>
                                 <option value="Gambia">Gambia</option>
                                 <option value="Georgia">Georgia</option>
                                 <option value="Germany">Germany</option>
                                 <option value="Ghana">Ghana</option>
                                 <option value="Greece">Greece</option>
                                 <option value="Grenada">Grenada</option>
                                 <option value="Guatemala">Guatemala</option>
                                 <option value="Guinea">Guinea</option>
                                 <option value="Guinea-Bissau">Guinea-Bissau</option>
                                 <option value="Guyana">Guyana</option>
                                 <option value="Haiti">Haiti</option>
                                 <option value="Honduras">Honduras</option>
                                 <option value="Hungary">Hungary</option>
                                 <option value="Iceland">Iceland</option>
                                 <option value="India">India</option>
                                 <option value="Indonesia">Indonesia</option>
                                 <option value="Iran">Iran</option>
                                 <option value="Iraq">Iraq</option>
                                 <option value="Ireland">Ireland</option>
                                 <option value="Israel">Israel</option>
                                 <option value="Italy">Italy</option>
                                 <option value="Ivory Coast (Côte d'Ivoire)">Ivory Coast (Côte d'Ivoire)</option>
                                 <option value="Jamaica">Jamaica</option>
                                 <option value="Japan">Japan</option>
                                 <option value="Jordan">Jordan</option>
                                 <option value="Kazakhstan">Kazakhstan</option>
                                 <option value="Kenya">Kenya</option>
                                 <option value="Kiribati">Kiribati</option>
                                 <option value="Korea, North">Korea, North</option>
                                 <option value="Korea, South">Korea, South</option>
                                 <option value="Kuwait">Kuwait</option>
                                 <option value="Kyrgyzstan">Kyrgyzstan</option>
                                 <option value="Laos">Laos</option>
                                 <option value="Latvia">Latvia</option>
                                 <option value="Lebanon">Lebanon</option>
                                 <option value="Lesotho">Lesotho</option>
                                 <option value="Liberia">Liberia</option>
                                 <option value="Libya">Libya</option>
                                 <option value="Liechtenstein">Liechtenstein</option>
                                 <option value="Lithuania">Lithuania</option>
                                 <option value="Luxembourg">Luxembourg</option>
                                 <option value="Madagascar">Madagascar</option>
                                 <option value="Malawi">Malawi</option>
                                 <option value="Malaysia">Malaysia</option>
                                 <option value="Maldives">Maldives</option>
                                 <option value="Mali">Mali</option>
                                 <option value="Malta">Malta</option>
                                 <option value="Marshall Islands">Marshall Islands</option>
                                 <option value="Mauritania">Mauritania</option>
                                 <option value="Mauritius">Mauritius</option>
                                 <option value="Mexico">Mexico</option>
                                 <option value="Micronesia">Micronesia</option>
                                 <option value="Moldova">Moldova</option>
                                 <option value="Monaco">Monaco</option>
                                 <option value="Mongolia">Mongolia</option>
                                 <option value="Montenegro">Montenegro</option>
                                 <option value="Morocco">Morocco</option>
                                 <option value="Mozambique">Mozambique</option>
                                 <option value="Myanmar">Myanmar</option>
                                 <option value="Namibia">Namibia</option>
                                 <option value="Nauru">Nauru</option>
                                 <option value="Nepal">Nepal</option>
                                 <option value="Netherlands">Netherlands</option>
                                 <option value="New Zealand">New Zealand</option>
                                 <option value="Nicaragua">Nicaragua</option>
                                 <option value="Niger">Niger</option>
                                 <option value="Nigeria">Nigeria</option>
                                 <option value="North Macedonia">North Macedonia</option>
                                 <option value="Norway">Norway</option>
                                 <option value="Oman">Oman</option>
                                 <option value="Pakistan">Pakistan</option>
                                 <option value="Palau">Palau</option>
                                 <option value="Panama">Panama</option>
                                 <option value="Papua New Guinea">Papua New Guinea</option>
                                 <option value="Paraguay">Paraguay</option>
                                 <option value="Peru">Peru</option>
                                 <option value="Philippines">Philippines</option>
                                 <option value="Poland">Poland</option>
                                 <option value="Portugal">Portugal</option>
                                 <option value="Qatar">Qatar</option>
                                 <option value="Romania">Romania</option>
                                 <option value="Russia">Russia</option>
                                 <option value="Rwanda">Rwanda</option>
                                 <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                 <option value="Saint Lucia">Saint Lucia</option>
                                 <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                 <option value="Samoa">Samoa</option>
                                 <option value="San Marino">San Marino</option>
                                 <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                 <option value="Saudi Arabia">Saudi Arabia</option>
                                 <option value="Senegal">Senegal</option>
                                 <option value="Serbia">Serbia</option>
                                 <option value="Seychelles">Seychelles</option>
                                 <option value="Sierra Leone">Sierra Leone</option>
                                 <option value="Singapore">Singapore</option>
                                 <option value="Slovakia">Slovakia</option>
                                 <option value="Slovenia">Slovenia</option>
                                 <option value="Solomon Islands">Solomon Islands</option>
                                 <option value="Somalia">Somalia</option>
                                 <option value="South Africa">South Africa</option>
                                 <option value="South Sudan">South Sudan</option>
                                 <option value="Spain">Spain</option>
                                 <option value="Sri Lanka">Sri Lanka</option>
                                 <option value="Sudan">Sudan</option>
                                 <option value="Suriname">Suriname</option>
                                 <option value="Sweden">Sweden</option>
                                 <option value="Switzerland">Switzerland</option>
                                 <option value="Syria">Syria</option>
                                 <option value="Taiwan (recognized by some as a separate entity)">Taiwan (recognized by some as a separate entity)</option>
                                 <option value="Tajikistan">Tajikistan</option>
                                 <option value="Tanzania">Tanzania</option>
                                 <option value="Thailand">Thailand</option>
                                 <option value="Togo">Togo</option>
                                 <option value="Tonga">Tonga</option>
                                 <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                 <option value="Tunisia">Tunisia</option>
                                 <option value="Turkey">Turkey</option>
                                 <option value="Turkmenistan">Turkmenistan</option>
                                 <option value="Tuvalu">Tuvalu</option>
                                 <option value="Uganda">Uganda</option>
                                 <option value="Ukraine">Ukraine</option>
                                 <option value="United Arab Emirates">United Arab Emirates</option>
                                 <option value="United Kingdom">United Kingdom</option>
                                 <option value="United States">United States</option>
                                 <option value="Uruguay">Uruguay</option>
                                 <option value="Uzbekistan">Uzbekistan</option>
                                 <option value="Vanuatu">Vanuatu</option>
                                 <option value="Vatican City (Holy See)">Vatican City (Holy See)</option>
                                 <option value="Venezuela">Venezuela</option>
                                 <option value="Vietnam">Vietnam</option>
                                 <option value="Yemen">Yemen</option>
                                 <option value="Zambia">Zambia</option>
                                 <option value="Zimbabwe">Zimbabwe</option>
                              </select>
                           </div>
                           <div class="form-group mb-3 col-md-6">
                              <label for="trading_postcode">Postcode (for Trading Address)</label>
                              <input type="text" class="form-control" id="trading_postcode" name="trading_postcode" placeholder="Enter postcode">
                           </div>
                           <div class=" col-md-6 form-group mb-3">
                              <label for="trading_telephone_number">Telephone Number (for Trading Address)</label>
                              <input type="text" class="form-control" id="trading_telephone_number" name="trading_telephone_number" placeholder="Enter telephone number">
                           </div>
                           <div class=" col-md-6 form-group mb-3">
                              <label for="trading_email_address">Email Address (for Trading Address)</label>
                              <input type="email" class="form-control" id="trading_email_address" name="trading_email_address" placeholder="Enter email address">
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label for="employer_status">Employer Status</label>
                              <input type="text" class="form-control" id="employer_status" name="employer_status">
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label for="business_name">Name of Business</label>
                              <input type="text" class="form-control" id="business_name" name="business_name">
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label for="employer_year_end">Employer Year End</label>
                              <input type="date" class="form-control" id="employer_year_end" name="employer_year_end">
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label for="regist_number">Registration Number (If applicable)</label>
                              <input type="text" class="form-control" id="regist_number" name="regist_number">
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label for="join_date">Date You Joined Employer</label>
                              <input type="date" class="form-control" id="join_date" name="join_date">
                           </div>
                           <div class="form-group mb-3">
                              <label>Are You a Director?</label><br>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="is_director" id="directorYes" value="Yes">
                                 <label class="form-check-label" for="directorYes">Yes</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="is_director" id="directorNo" value="No">
                                 <label class="form-check-label" for="directorNo">No</label>
                              </div>
                           </div>
                           <div class="form-group mb-3">
                              <label for="director_date">Date You Became a Director</label>
                              <input type="date" class="form-control" id="director_date" name="director_date">
                           </div>
                           <div class="form-group mb-3">
                              <label for="shareholdings">Please provide details of your shareholdings in the employer (if applicable)</label>
                              <textarea class="form-control" id="shareholdings" name="shareholdings" rows="3"></textarea>
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
                              <input type="text" class="form-control" id="gross_regular_contribution" name="gross_regular_contribution" placeholder="Enter amount">
                           </div>
                           <div class=" col-md-6 form-group mb-3">
                              <label for="gross_single_contribution">Employer (Gross) - Single Contribution</label>
                              <input type="text" class="form-control" id="gross_single_contribution" name="gross_single_contribution" placeholder="Enter amount">
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>Regular Contribution Payment Frequency</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="gross_payment_frequency" id="monthly" value="Monthly">
                              <label class="form-check-label" for="monthly">Monthly</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="gross_payment_frequency" id="quarterly" value="Quarterly">
                              <label class="form-check-label" for="quarterly">Quarterly</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="gross_payment_frequency" id="half_yearly" value="Half-yearly">
                              <label class="form-check-label" for="half_yearly">Half-yearly</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="gross_payment_frequency" id="yearly" value="Yearly">
                              <label class="form-check-label" for="yearly">Yearly</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label for="gross_start_date">Start Date for Regular Contribution</label>
                           <input type="date" class="form-control" id="gross_start_date" name="gross_start_date">
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
                              <input type="text" class="form-control" id="declaration_print_name" name="declaration_print_name">
                           </div>
                           <div class="col-md-6 form-group mb-3">
                              <label for="declaration_position">Position</label>
                              <input type="text" class="form-control" id="declaration_position" name="declaration_position">
                           </div>
                           <div class="col-md-12 form-group mb-3">
                              <label for="declaration_date">Date</label>
                              <input type="date" class="form-control" id="declaration_date" name="declaration_date">
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
                                    <input class="form-check-input" type="checkbox" id="alltrust1" name="alltrust_platform">
                                    <label class="form-check-label" for="alltrust1">Alltrust Platform</label>
                                 </div>
                              </div>
                              <div class="form-group col-md-12 mb-5">
                                 <label for="plan_type" class="mb-3">Full SIPP</label>
                                 <div class="row">
                                    <div class="col-md-6 d-flex flex-column gap-2">
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="ajBell" name="ajBell">
                                          <label class="form-check-label" for="ajBell">AJ Bell Investcentre</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="canaccord" name="canaccord">
                                          <label class="form-check-label" for="canaccord">Canaccord</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="kleinwort" name="kleinwort">
                                          <label class="form-check-label" for="kleinwort">Kleinwort Hambros</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="quilter" name="quilter">
                                          <label class="form-check-label" for="quilter">Quilter</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="rbc" name="rbc">
                                          <label class="form-check-label" for="rbc">RBC Brewin Dolphin</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="stocktrade" name="stocktrade">
                                          <label class="form-check-label" for="stocktrade">Stocktrade</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="transact" name="transact">
                                          <label class="form-check-label" for="transact">Transact</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="sim" name="sim">
                                          <label class="form-check-label" for="sim">7IM</label>
                                       </div>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column gap-2">
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="brooks" name="brooks">
                                          <label class="form-check-label" for="brooks">Brooks Macdonald</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="hubwise" name="hubwise">
                                          <label class="form-check-label" for="hubwise">Hubwise</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="lgt" name="lgt">
                                          <label class="form-check-label" for="lgt">LGT Vestra</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="rathbones" name="rathbones">
                                          <label class="form-check-label" for="rathbones">Rathbones</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="scottishWidows" name="scottishWidows">
                                          <label class="form-check-label" for="scottishWidows">Scottish Widows platform</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="telford" name="telford">
                                          <label class="form-check-label" for="telford">Telford Mann</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="commercialProperty" name="commercialProperty">
                                          <label class="form-check-label" for="commercialProperty">Commercial Property</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="goldBullion" name="goldBullion">
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
                                          <input class="form-check-input" type="checkbox" id="unlistedShares" name="unlistedShares">
                                          <label class="form-check-label" for="unlistedShares">Unlisted Shares</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="fixedDeposit" name="fixedDeposit">
                                          <label class="form-check-label" for="fixedDeposit">Fixed Term Deposit</label>
                                       </div>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column gap-2">
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="nsI" name="nsI">
                                          <label class="form-check-label" for="nsI">NS&I Investment</label>
                                       </div>
                                       <div class="form-check d-flex align-items-center gap-2">
                                          <input class="form-check-input" type="checkbox" id="other" name="othername">
                                          <label class="form-check-label" for="other">Other</label>
                                       </div>
                                    </div>
                                 </div>
                                 <textarea class="form-control mt-2" placeholder="Please give details..."></textarea>
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
                                 <input class="form-check-input" type="radio" name="pension_benefits" id="benefitsYes" value="Yes">
                                 <label class="form-check-label" for="benefitsYes">Yes</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="pension_benefits" id="benefitsNo" value="No">
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
                           <input type="text" class="form-control" id="provider_name" name="provider_name" placeholder="Enter provider's full name and address">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                           <label for="address">Address</label>
                           <input type="text" class="form-control mb-2" id="address" name="other_benefits_address" placeholder="Enter address">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                           <label for="other_benefits_country">Country</label>
                           <select class="form-control" id="other_benefits_country" name="other_benefits_country">
                              <option value="" selected disabled>Select Country</option>
                              <option value="Afghanistan">Afghanistan</option>
                              <option value="Albania">Albania</option>
                              <option value="Algeria">Algeria</option>
                              <option value="Andorra">Andorra</option>
                              <option value="Angola">Angola</option>
                              <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                              <option value="Argentina">Argentina</option>
                              <option value="Armenia">Armenia</option>
                              <option value="Australia">Australia</option>
                              <option value="Austria">Austria</option>
                              <option value="Azerbaijan">Azerbaijan</option>
                              <option value="Bahamas">Bahamas</option>
                              <option value="Bahrain">Bahrain</option>
                              <option value="Bangladesh">Bangladesh</option>
                              <option value="Barbados">Barbados</option>
                              <option value="Belarus">Belarus</option>
                              <option value="Belgium">Belgium</option>
                              <option value="Belize">Belize</option>
                              <option value="Benin">Benin</option>
                              <option value="Bhutan">Bhutan</option>
                              <option value="Bolivia">Bolivia</option>
                              <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                              <option value="Botswana">Botswana</option>
                              <option value="Brazil">Brazil</option>
                              <option value="Brunei">Brunei</option>
                              <option value="Bulgaria">Bulgaria</option>
                              <option value="Burkina Faso">Burkina Faso</option>
                              <option value="Burundi">Burundi</option>
                              <option value="Cambodia">Cambodia</option>
                              <option value="Cameroon">Cameroon</option>
                              <option value="Canada">Canada</option>
                              <option value="Cape Verde">Cape Verde</option>
                              <option value="Central African Republic">Central African Republic</option>
                              <option value="Chad">Chad</option>
                              <option value="Chile">Chile</option>
                              <option value="China">China</option>
                              <option value="Colombia">Colombia</option>
                              <option value="Comoros">Comoros</option>
                              <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                              <option value="Congo, Republic of the">Congo, Republic of the</option>
                              <option value="Costa Rica">Costa Rica</option>
                              <option value="Croatia">Croatia</option>
                              <option value="Cuba">Cuba</option>
                              <option value="Cyprus">Cyprus</option>
                              <option value="Czech Republic">Czech Republic</option>
                              <option value="Denmark">Denmark</option>
                              <option value="Djibouti">Djibouti</option>
                              <option value="Dominica">Dominica</option>
                              <option value="Dominican Republic">Dominican Republic</option>
                              <option value="East Timor (Timor-Leste)">East Timor (Timor-Leste)</option>
                              <option value="Ecuador">Ecuador</option>
                              <option value="Egypt">Egypt</option>
                              <option value="El Salvador">El Salvador</option>
                              <option value="Equatorial Guinea">Equatorial Guinea</option>
                              <option value="Eritrea">Eritrea</option>
                              <option value="Estonia">Estonia</option>
                              <option value="Eswatini">Eswatini</option>
                              <option value="Ethiopia">Ethiopia</option>
                              <option value="Fiji">Fiji</option>
                              <option value="Finland">Finland</option>
                              <option value="France">France</option>
                              <option value="Gabon">Gabon</option>
                              <option value="Gambia">Gambia</option>
                              <option value="Georgia">Georgia</option>
                              <option value="Germany">Germany</option>
                              <option value="Ghana">Ghana</option>
                              <option value="Greece">Greece</option>
                              <option value="Grenada">Grenada</option>
                              <option value="Guatemala">Guatemala</option>
                              <option value="Guinea">Guinea</option>
                              <option value="Guinea-Bissau">Guinea-Bissau</option>
                              <option value="Guyana">Guyana</option>
                              <option value="Haiti">Haiti</option>
                              <option value="Honduras">Honduras</option>
                              <option value="Hungary">Hungary</option>
                              <option value="Iceland">Iceland</option>
                              <option value="India">India</option>
                              <option value="Indonesia">Indonesia</option>
                              <option value="Iran">Iran</option>
                              <option value="Iraq">Iraq</option>
                              <option value="Ireland">Ireland</option>
                              <option value="Israel">Israel</option>
                              <option value="Italy">Italy</option>
                              <option value="Ivory Coast (Côte d'Ivoire)">Ivory Coast (Côte d'Ivoire)</option>
                              <option value="Jamaica">Jamaica</option>
                              <option value="Japan">Japan</option>
                              <option value="Jordan">Jordan</option>
                              <option value="Kazakhstan">Kazakhstan</option>
                              <option value="Kenya">Kenya</option>
                              <option value="Kiribati">Kiribati</option>
                              <option value="Korea, North">Korea, North</option>
                              <option value="Korea, South">Korea, South</option>
                              <option value="Kuwait">Kuwait</option>
                              <option value="Kyrgyzstan">Kyrgyzstan</option>
                              <option value="Laos">Laos</option>
                              <option value="Latvia">Latvia</option>
                              <option value="Lebanon">Lebanon</option>
                              <option value="Lesotho">Lesotho</option>
                              <option value="Liberia">Liberia</option>
                              <option value="Libya">Libya</option>
                              <option value="Liechtenstein">Liechtenstein</option>
                              <option value="Lithuania">Lithuania</option>
                              <option value="Luxembourg">Luxembourg</option>
                              <option value="Madagascar">Madagascar</option>
                              <option value="Malawi">Malawi</option>
                              <option value="Malaysia">Malaysia</option>
                              <option value="Maldives">Maldives</option>
                              <option value="Mali">Mali</option>
                              <option value="Malta">Malta</option>
                              <option value="Marshall Islands">Marshall Islands</option>
                              <option value="Mauritania">Mauritania</option>
                              <option value="Mauritius">Mauritius</option>
                              <option value="Mexico">Mexico</option>
                              <option value="Micronesia">Micronesia</option>
                              <option value="Moldova">Moldova</option>
                              <option value="Monaco">Monaco</option>
                              <option value="Mongolia">Mongolia</option>
                              <option value="Montenegro">Montenegro</option>
                              <option value="Morocco">Morocco</option>
                              <option value="Mozambique">Mozambique</option>
                              <option value="Myanmar">Myanmar</option>
                              <option value="Namibia">Namibia</option>
                              <option value="Nauru">Nauru</option>
                              <option value="Nepal">Nepal</option>
                              <option value="Netherlands">Netherlands</option>
                              <option value="New Zealand">New Zealand</option>
                              <option value="Nicaragua">Nicaragua</option>
                              <option value="Niger">Niger</option>
                              <option value="Nigeria">Nigeria</option>
                              <option value="North Macedonia">North Macedonia</option>
                              <option value="Norway">Norway</option>
                              <option value="Oman">Oman</option>
                              <option value="Pakistan">Pakistan</option>
                              <option value="Palau">Palau</option>
                              <option value="Panama">Panama</option>
                              <option value="Papua New Guinea">Papua New Guinea</option>
                              <option value="Paraguay">Paraguay</option>
                              <option value="Peru">Peru</option>
                              <option value="Philippines">Philippines</option>
                              <option value="Poland">Poland</option>
                              <option value="Portugal">Portugal</option>
                              <option value="Qatar">Qatar</option>
                              <option value="Romania">Romania</option>
                              <option value="Russia">Russia</option>
                              <option value="Rwanda">Rwanda</option>
                              <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                              <option value="Saint Lucia">Saint Lucia</option>
                              <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                              <option value="Samoa">Samoa</option>
                              <option value="San Marino">San Marino</option>
                              <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                              <option value="Saudi Arabia">Saudi Arabia</option>
                              <option value="Senegal">Senegal</option>
                              <option value="Serbia">Serbia</option>
                              <option value="Seychelles">Seychelles</option>
                              <option value="Sierra Leone">Sierra Leone</option>
                              <option value="Singapore">Singapore</option>
                              <option value="Slovakia">Slovakia</option>
                              <option value="Slovenia">Slovenia</option>
                              <option value="Solomon Islands">Solomon Islands</option>
                              <option value="Somalia">Somalia</option>
                              <option value="South Africa">South Africa</option>
                              <option value="South Sudan">South Sudan</option>
                              <option value="Spain">Spain</option>
                              <option value="Sri Lanka">Sri Lanka</option>
                              <option value="Sudan">Sudan</option>
                              <option value="Suriname">Suriname</option>
                              <option value="Sweden">Sweden</option>
                              <option value="Switzerland">Switzerland</option>
                              <option value="Syria">Syria</option>
                              <option value="Taiwan (recognized by some as a separate entity)">Taiwan (recognized by some as a separate entity)</option>
                              <option value="Tajikistan">Tajikistan</option>
                              <option value="Tanzania">Tanzania</option>
                              <option value="Thailand">Thailand</option>
                              <option value="Togo">Togo</option>
                              <option value="Tonga">Tonga</option>
                              <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                              <option value="Tunisia">Tunisia</option>
                              <option value="Turkey">Turkey</option>
                              <option value="Turkmenistan">Turkmenistan</option>
                              <option value="Tuvalu">Tuvalu</option>
                              <option value="Uganda">Uganda</option>
                              <option value="Ukraine">Ukraine</option>
                              <option value="United Arab Emirates">United Arab Emirates</option>
                              <option value="United Kingdom">United Kingdom</option>
                              <option value="United States">United States</option>
                              <option value="Uruguay">Uruguay</option>
                              <option value="Uzbekistan">Uzbekistan</option>
                              <option value="Vanuatu">Vanuatu</option>
                              <option value="Vatican City (Holy See)">Vatican City (Holy See)</option>
                              <option value="Venezuela">Venezuela</option>
                              <option value="Vietnam">Vietnam</option>
                              <option value="Yemen">Yemen</option>
                              <option value="Zambia">Zambia</option>
                              <option value="Zimbabwe">Zimbabwe</option>
                           </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                           <label for="address">Postcode</label>
                           <input type="text" class="form-control mb-2" id="other_benefits_postcode" name="other_benefits_postcode" placeholder="Postcode">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                           <label for="telephone_number">Telephone Number (inc. Area Code)</label>
                           <input type="text" class="form-control mb-2" id="telephone_number" name="other_telephone_number" placeholder="Enter telephone number">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                           <label for="email_address">Email Address</label>
                           <input type="email" class="form-control" id="email_address" name="other_email_address" placeholder="Enter email address">
                        </div>
                        <div class="col-6 mb-3">
                           <label for="plan_scheme_type">Plan/Scheme Type</label>
                           <input type="text" class="form-control" id="plan_scheme_type" name="plan_scheme_type" placeholder="Enter plan/scheme type">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                           <label for="plan_scheme_name">Plan/Scheme Name (in full)</label>
                           <input type="text" class="form-control" id="plan_scheme_name" name="plan_scheme_name" placeholder="Enter plan/scheme name">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                           <label for="planSchemeNumber">Plan / Scheme Number (In full)</label>
                           <input type="text" class="form-control" id="planSchemeNumber" name="plan_scheme_number">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                           <label for="pension_scheme_tax_reference">Pension Scheme Tax Reference</label>
                           <input type="text" class="form-control" id="pension_scheme_tax_reference" name="pension_scheme_tax_reference" placeholder="Enter pension scheme tax reference">
                        </div>
                        <div class="form-group mb-3">
                           <label>Is this an occupational scheme?</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="is_occupational_scheme" id="occupational_yes" value="yes">
                              <label class="form-check-label" for="occupational_yes">YES</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="is_occupational_scheme" id="occupational_no" value="no">
                              <label class="form-check-label" for="occupational_no">NO</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>If yes, please confirm whether this is a Defined Benefit scheme</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="defined_benefit" value="yes" id="defined_benefit_yes">
                              <label class="form-check-label" for="defined_benefit_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="defined_benefit" value="no" id="defined_benefit_no">
                              <label class="form-check-label" for="defined_benefit_no">No</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>Does this represent the full value of the current plan/scheme?</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="full_value_scheme" id="full_value_yes" value="yes">
                              <label class="form-check-label" for="full_value_yes">YES</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="full_value_scheme" id="full_value_no" value="no">
                              <label class="form-check-label" for="full_value_no">NO</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>Have any funds been crystallised?</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="funds_crystallised" id="funds_yes" value="yes">
                              <label class="form-check-label" for="funds_yes">YES (all funds)</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="funds_crystallised" id="funds_some" value="some">
                              <label class="form-check-label" for="funds_some">YES (some funds)</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="funds_crystallised" id="funds_no" value="no">
                              <label class="form-check-label" for="funds_no">NO</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>If YES, please confirm how they were crystallised</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="crystallised_method" id="crystallised_capped" value="Capped Drawdown">
                              <label class="form-check-label" for="crystallised_capped">Capped Drawdown</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="crystallised_method" id="crystallised_flexi" value="Flexi-Access Drawdown">
                              <label class="form-check-label" for="crystallised_flexi">Flexi-Access Drawdown</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="crystallised_method" id="crystallised_scheme" value="Scheme Pension">
                              <label class="form-check-label" for="crystallised_scheme">Scheme Pension</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="crystallised_method" id="crystallised_other" value="Other">
                              <label class="form-check-label" for="crystallised_other">Other (please specify)</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>Do you want to transfer assets ‘in specie’?</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="transfer_assets" value="yes" id="transfer_assets_yes">
                              <label class="form-check-label" for="transfer_assets_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="transfer_assets" value="no" id="transfer_assets_no">
                              <label class="form-check-label" for="transfer_assets_no">No</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>Is the current plan/scheme subject to any existing or proposed trustee in bankruptcy orders, or earmarking, or pension sharing orders or other receiving orders?</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="bankruptcy_orders" value="yes" id="bankruptcy_orders_yes">
                              <label class="form-check-label" for="bankruptcy_orders_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="bankruptcy_orders" value="no" id="bankruptcy_orders_no">
                              <label class="form-check-label" for="bankruptcy_orders_no">No</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>Is the pension fund subject to any Scheme Specific Lump Sum or Member Pension Age protection?</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="scheme_protection" value="yes" id="scheme_protection_yes">
                              <label class="form-check-label" for="scheme_protection_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="scheme_protection" value="no" id="scheme_protection_no">
                              <label class="form-check-label" for="scheme_protection_no">No</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>Does the plan contain any guaranteed annuity rates or guaranteed minimum pension rights?</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="annuity_guarantee" value="yes" id="annuity_guarantee_yes">
                              <label class="form-check-label" for="annuity_guarantee_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="annuity_guarantee" value="no" id="annuity_guarantee_no">
                              <label class="form-check-label" for="annuity_guarantee_no">No</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>Is the transfer part of a block transfer?</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="block_transfer" value="yes" id="block_transfer_yes">
                              <label class="form-check-label" for="block_transfer_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="block_transfer" value="no" id="block_transfer_no">
                              <label class="form-check-label" for="block_transfer_no">No</label>
                           </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                           <label>Pension funded by the transfer of a former pension plan:</label>
                           <input class="form-control" type="text" name="funded_transfer">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                           <label>Employer Contributions</label>
                           <input class="form-control" type="text" name="employer_contributions">
                        </div>
                        <div class="form-group col-12 mb-3">
                           <label for="name_of_employer">Name of Employer</label>
                           <input type="text" class="form-control" id="name_of_employer" name="name_of_employer">
                        </div>
                        <div class="form-group mb-3">
                           <label>Were contributions paid from a personal bank account?</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="personal_bank_payment" value="yes" id="personal_bank_payment_yes">
                              <label class="form-check-label" for="personal_bank_payment_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="personal_bank_payment" value="no" id="personal_bank_payment_no">
                              <label class="form-check-label" for="personal_bank_payment_no">No</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>Ceding scheme who transferred funds (if applicable):</label>
                           <input class="form-control" type="text" name="ceding_scheme">
                        </div>
                        <div class="form-group mb-3">
                           <label>Have any funds been generated outside of the UK?</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="funds_outside_uk" value="yes" id="funds_outside_uk_yes">
                              <label class="form-check-label" for="funds_outside_uk_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="funds_outside_uk" value="no" id="funds_outside_uk_no">
                              <label class="form-check-label" for="funds_outside_uk_no">No</label>
                           </div>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                           <label for="other_please_specify">Other (please specify)</label>
                           <input type="text" class="form-control mb-2" id="other_please_specify" name="other_please_specify">
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
                           <input type="text" class="form-control" id="transfers_authority_print_name" name="transfers_authority_print_name">
                        </div>
                        <div class="col-md-6 form-group">
                           <label for="transfers_authority_no">Plan/Scheme No</label>
                           <input type="text" class="form-control" id="transfers_authority_no" name="transfers_authority_no">
                        </div>
                        <div class="col-md-12 form-group">
                           <label for="transfers_authority_date">Date</label>
                           <input type="date" class="form-control" id="transfers_authority_date" name="transfers_authority_date">
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
                              <input class="form-check-input" type="radio" name="limited_contacting_products" value="yes" id="limited_contacting_products_yes">
                              <label class="form-check-label" for="limited_contacting_products_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="limited_contacting_products" value="no" id="limited_contacting_products_no">
                              <label class="form-check-label" for="limited_contacting_products_no">No</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>I consent to Alltrust Services Limited passing my contact details to other Alltrust subsidiaries and for them to contact me about their products and services.</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="alltrust_subsidiaries" value="yes" id="alltrust_subsidiaries_yes">
                              <label class="form-check-label" for="alltrust_subsidiaries_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="alltrust_subsidiaries" value="no" id="alltrust_subsidiaries_no">
                              <label class="form-check-label" for="alltrust_subsidiaries_no">No</label>
                           </div>
                        </div>
                        <div class="col-md-12 form-group mb-3">
                           <label for="signature_1" style="font-size: 17px; margin-bottom: 4px;">Financial Adviser's Signature <i class="ti ti-signature"></i></label>
                           <br>
                           <canvas id="signature_pad_3"></canvas>
                           <br>
                           <button type="button" class="btn btn-danger mx-2" id="clear_3">Clear</button>
                           <button type="button" id="save_3" class="btn btn-primary mx-2">Save</button>
                           <input type="hidden" name="signature_1" id="signature_1_3" class="form-control" />
                           <br>
                           <label class="mt-3" for="signature_file_3" style="font-size: 17px;">or Upload File for signature</label>
                           <input type="file" name="signature_file_3" id="signature_file_3" class="form-control">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                           <label for="member_consent_print_name">Print Name</label>
                           <input type="text" class="form-control" id="member_consent_print_name" name="member_consent_print_name">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                           <label for="member_consent_date">Date</label>
                           <input type="date" class="form-control" id="member_consent_date" name="member_consent_date">
                        </div>
                        <div class="form-group mb-3">
                           <label>Are you satisfied that your adviser has matched this pension product to your personal needs and objectives?</label><br>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="personal_needs_objectives" value="yes" id="personal_needs_objectives_yes">
                              <label class="form-check-label" for="personal_needs_objectives_yes">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="personal_needs_objectives" value="no" id="personal_needs_objectives_no">
                              <label class="form-check-label" for="personal_needs_objectives_no">No</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>Are you aware of and have received information on the fees for the pension and investment advice from your financial adviser, the pension scheme and investment linked costs for the setup and ongoing for your pension scheme?</label><br>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="investment_linked_costs" value="yes" id="investment_linked_costs_yes">
                              <label class="form-check-label" for="investment_linked_costs_yes">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="investment_linked_costs" value="no" id="investment_linked_costs_no">
                              <label class="form-check-label" for="investment_linked_costs_no">No</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>Has all the communication that you have received been clear and easy to understand with any questions that you have asked being answered to your satisfaction?</label><br>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="communication_satisfaction" value="yes" id="communication_satisfaction_yes">
                              <label class="form-check-label" for="communication_satisfaction_yes">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="communication_satisfaction" value="no" id="communication_satisfaction_no">
                              <label class="form-check-label" for="communication_satisfaction_no">No</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>Have you received the information for each of the products that you are using, pension, investment provider and any investments?</label><br>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="provider_investments" value="yes" id="provider_investments_yes">
                              <label class="form-check-label" for="provider_investments_yes">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="provider_investments" value="no" id="provider_investments_no">
                              <label class="form-check-label" for="provider_investments_no">No</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>Are there any personal circumstances that Alltrust need to be aware of to enable us to support you and provide you with services? If you tick yes to this, someone from our team will contact you directly to discuss.</label><br>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="circumstances_alltrust" value="yes" id="circumstances_alltrust_yes">
                              <label class="form-check-label" for="circumstances_alltrust_yes">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="circumstances_alltrust" value="no" id="circumstances_alltrust_no">
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
                              <input class="form-check-input" type="radio" name="establishment_SIPP" value="yes" id="establishment_SIPP_yes">
                              <label class="form-check-label" for="establishment_SIPP_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="establishment_SIPP" value="no" id="establishment_SIPP_no">
                              <label class="form-check-label" for="establishment_SIPP_no">No</label>
                           </div>
                        </div>
                        <div class="form-group mb-3">
                           <label>I have parental responsibility for the child named on this application form.</label><br>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="parental_responsibility" value="yes" id="parental_responsibility_yes">
                              <label class="form-check-label" for="parental_responsibility_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="parental_responsibility" value="no" id="parental_responsibility_no">
                              <label class="form-check-label" for="parental_responsibility_no">No</label>
                           </div>
                        </div>
                        <div class="col-md-12 form-group mb-3">
                           <label for="signature_2" style="font-size: 17px; margin-bottom: 4px;">Financial Adviser's Signature <i class="ti ti-signature"></i></label>
                           <br>
                           <canvas id="signature_pad_4"></canvas>
                           <br>
                           <button type="button" class="btn btn-danger mx-2" id="clear_4">Clear</button>
                           <button type="button" class="btn btn-primary mx-2" id="save_4">Save</button>
                           <input type="hidden" name="signature_2" id="signature_2_4" class="form-control" />
                           <br>
                           <label class="mt-3" for="file_upload_4" style="font-size: 17px;">or Upload File for signature</label>
                           <input type="file" name="file_upload_4" id="file_upload_4" class="form-control">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                           <label for="member_declaration_print_name">Print Name</label>
                           <input type="text" class="form-control" id="member_declaration_print_name" name="member_declaration_print_name">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                           <label for="member_declaration_date">Date</label>
                           <input type="date" class="form-control" id="member_declaration_date" name="member_declaration_date">
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
                        <h4 class="mb-0">User </h4>
                     </div>
                     <div class="row g-6">
                        <div class="registration-container registration-overlay bg-pattern">
                           <div class="registration-content row">
                              <div class="row g-6">
                                 <div class="row mt-3">
                                    <div class="col-md-6">
                                       <label for="print_name">Name</label>
                                       <input type="text" class="form-control" name="user_name" id="print_name" placeholder="Enter Print Name" >
                                       @error('user_name')
                                       <div class="text-danger">{{ $message }}</div>
                                       @enderror()
                                    </div>
                                    <div class="col-md-6">
                                       <label for="print_name">Email</label>
                                       <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Enter Print Name" >
                                       <span class="text-danger" id="user_email_error"></span>
                                    </div>
                                 </div>
                                 <div class="row mt-3">
                                    <div class="col-md-6">
                                       <input type="hidden" class="form-control" value="{{ $role_member }}" name="role_member" id="print_name" placeholder="Enter Print Name" >
                                    </div>
                                 </div>
                              </div>
                           </div>
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
<script>
   document.addEventListener("DOMContentLoaded", function () {
   const existingEmails = {!! json_encode(\App\Models\User::pluck('email')->toArray()) !!};
   const userEmailInput = document.getElementById('user_email');
   const submitButton = document.getElementById('sub');
   const errorSpan = document.getElementById('user_email_error'); 
   submitButton.disabled = true;
   userEmailInput.addEventListener('input', function () {
       const email = this.value.trim(); 
       if (userEmailInput.length === 0) {
           userEmailInput.classList.add('input-error');  
           errorSpan.textContent = "Email is required.";
           submitButton.disabled = true;  
       } else {
           userEmailInput.classList.remove('input-error'); 
           errorSpan.textContent = ""; 
           if (existingEmails.includes(email)) {
               errorSpan.textContent = "This email is already registered.";
               submitButton.disabled = true;  
           } else {
               submitButton.disabled = false;  
           }
       }
   });
   });
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
       nextButtons[currentStep].removeAttribute("disabled"); // Enable button
   } else {
       nextButtons[currentStep].setAttribute("disabled", "true"); // Disable button
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
   document.querySelectorAll("input[required], select[required], textarea[required]").forEach(input => {
   input.addEventListener("input", checkNextButtonState);
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
           let signatureData = signaturePad.toDataURL('image/png'); // Convert to Base64
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