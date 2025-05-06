@extends('.dashboard.dashboard')
@section('content')
<div class="modal fade" id="usercreate" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{ route('user-store') }}" method="POST">
            @csrf
            <div class="modal-body">
               <div class="row">
                  <div class="col mb-4">
                     <label for="nameBasic" class="form-label">Name</label>
                     <input type="text" name="name" id="nameBasic" class="form-control" placeholder="Enter Name" required />
                  </div>
               </div>
               <div class="row g-4">
                  <div class="col mb-0">
                     <label for="emailBasic" class="form-label">Email</label>
                     <input type="email" name="email" id="emailBasic" class="form-control" placeholder="xxxx@xxx.xx" required />
                  </div>
                  <div class="col mb-0">
                     <label for="role" class="form-label">Role</label>
                     <select name="role" id="role" class="form-control" style="background-color: #2F3349; color: white;" required>
                        @if(auth()->user()->role !== 'advisor_firm')
                        <option value="admin">Admin</option>
                        <option value="it_admin">IT Admin</option>
                        <option value="employee">Employee</option>
                        <option value="pre_approved_adviser_firm">Pre-approved Adviser Firm</option>
                        <option value="advisor_firm">Adviser Firm</option>
                        @endif
                     </select>
                  </div>
               </div>
               <div class="row my-2">
                  <div class="col">
                     <label for="emailBasic" class="form-label">Firm Name</label>
                     <input type="text" name="firm_name" id="firm_name" class="form-control" />
                  </div>
               </div>
               <div class="col">
                  <label for="dob" class="form-label">Date of Birth</label>
                  <input type="date" name="dob" id="dob" class="form-control" />
               </div>
               <div class="col">
                  <label for="dob" class="form-label">Nationality</label>
                  <select name="nationality" id="dob" class="form-control">
                     <option value="">Select Country</option>
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
               <div class="col">
                  <label for="dob" class="form-label">Country of residency</label>
                  <select name="country_residency" id="dob" class="form-control" >
                     <option value="">Select Country</option>
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
               <div class="">
                  <label for="email_notification" class="form-label">Email Notification</label>
                  <div class="form-check">
                     <input class="form-check-input" type="radio" name="email_notification" id="email_notification_yes" checked value="yes">
                     <label class="form-check-label" for="email_notification_yes">Yes</label>
                  </div>
                  <div class="form-check">
                     <input class="form-check-input" type="radio" name="email_notification" id="email_notification_no" value="no">
                     <label class="form-check-label" for="email_notification_no">No</label>
                  </div>
               </div>
               <div class="row">
               <div class="col">
                  <label for="password" class="form-label">Password</label>
                  <small style="color: #ccc;">
                     (Password must be at least 8 characters long and include one uppercase letter, one lowercase letter, one number, and one special character) (@, $, !, %, *, ?, &).
                  </small>
            
                  <input type="password" name="password" id="password" class="form-control" placeholder="Enter 8 digit password" required />
                  <div id="passwordError" style="color: red; margin-top: 5px;"></div>
               </div>
            </div>
            
            <script>
            document.getElementById('password').addEventListener('input', function () {
                const password = this.value;
                const errorDiv = document.getElementById('passwordError');
                const errors = [];
            
                // Clear previous border and error message
                this.style.border = '';
                errorDiv.innerHTML = '';
            
                // Apply validation only if the password field is not empty
                if (password !== '') {
                    if (password.length < 8) {
                        errors.push("At least 8 characters required.");
                    }
                    if (!/[A-Z]/.test(password)) {
                        errors.push("Include at least one uppercase letter.");
                    }
                    if (!/[a-z]/.test(password)) {
                        errors.push("Include at least one lowercase letter.");
                    }
                    if (!/[0-9]/.test(password)) {
                        errors.push("Include at least one number.");
                    }
                    if (!/[@$!%*?&]/.test(password)) {
                        errors.push("Include at least one special character (@, $, !, %, *, ?, &).");
                    }
            
                    // Show errors if validation fails
                    if (errors.length > 0) {
                        this.style.border = '1px solid red';
                        errorDiv.innerHTML = errors.join('<br>');
                    } else {
                        this.style.border = '1px solid green';
                    }
                }
            });
            </script>
            
               @if(auth()->user()->role !== 'advisor_firm')
               <p class="mt-2">Adviser Applications Permissions</p>
               <div class="row mt-3">
                  <div class="col-md-6">
                     <label for="adviser_check" class="form-label">
                     <input type="checkbox" name="adviser_check" value="adviser_check" id="adviser_check" class="" placeholder=""  />
                     Onshore Adviser Registration From
                     </label>
                  </div>
                  <div class="col-md-6">
                     <label for="offshore_check" class="form-label">
                     <input type="checkbox" name="offshore_check" value="offshore_check" id="offshore_check" class="" placeholder=""  />
                     Offshore Adviser Registration From
                     </label>
                  </div>
                  <br>
                  <br>
                  <p class="mt-2">Adviser Terms Status Permissions</p>
                  <div class="col-md-6">
                     <label for="offshore_pending" class="form-label">
                     <input type="checkbox" name="offshore_pending" value="offshore_pending" id="offshore_pending" class="" placeholder=""  />
                     Pending
                     </label>
                  </div>
                  <div class="col-md-6">
                     <label for="offshore_existing" class="form-label">
                     <input type="checkbox" name="offshore_existing" value="offshore_existing" id="offshore_existing" class="" placeholder=""  />
                     Existing
                     </label>
                  </div>
                  <div class="col-md-6">
                     <label for="offshore_declined" class="form-label">
                     <input type="checkbox" name="offshore_declined" value="offshore_declined" id="offshore_declined" class="" placeholder=""  />
                     Declined
                     </label>
                  </div>
                  <br>
                  <br>
                  @endif
                  <p class="mt-2">Member Application Permissions</p>
                  <div class="col-md-6">
                     <label for="oasis_sipp__check" class="form-label">
                     <input type="checkbox" name="oasis_sipp__check" value="oasis_sipp__check" id="oasis_sipp__check" class="" placeholder=""  />
                     Oasis SIPP
                     </label>
                  </div>
                  <div class="col-md-6">
                     <label for="sipp_property_check" class="form-label">
                     <input type="checkbox" name="sipp_property_check" value="sipp_property_check" id="sipp_property_check" class="" placeholder=""  />
                     SIPP Property
                     </label>
                  </div>
                  <div class="col-md-6">
                     <label for="full_sipp_check" class="form-label">
                     <input type="checkbox" name="full_sipp_check" value="full_sipp_check" id="full_sipp_check" class="" placeholder=""  />
                     Full SIPP Property
                     </label>
                  </div>
                  <div class="col-md-6">
                     <label for="ftp_check" class="form-label">
                     <input type="checkbox" name="ftp_check" id="ftp_check" value="ftp_check" class="" placeholder=""  />
                     FTP
                     </label>
                  </div>
                  @if(auth()->user()->role !== 'advisor_firm')
                  <div class="col-md-6">
                     <label for="pending_applications" class="form-label">
                     <input type="checkbox" name="pending_applications" id="pending_applications" value="pending_applications" class="" placeholder=""  />
                     Pending Applications
                     </label>
                  </div>
                  <div class="col-md-6">
                     <label for="existing_applications" class="form-label">
                     <input type="checkbox" name="existing_applications" id="existing_applications" value="existing_applications" class="" placeholder=""  />
                     Existing Applications
                     </label>
                  </div>
                  <div class="col-md-6">
                     <label for="decline_applications" class="form-label">
                     <input type="checkbox" name="decline_applications" id="decline_applications" value="decline_applications" class="" placeholder=""  />
                     Declined Applications
                     </label>
                  </div>
                  <br>
                  <br>
                  <p class="mt-2">Members Permissions</p>
                  <div class="col-md-6">
                     <label for="illustration_check" class="form-label">
                     <input type="checkbox" name="illustration_check" value="illustration_check" id="illustration_check" class="" placeholder=""  />
                     Illustration
                     </label>
                  </div>
                  @endif
                  <div class="col-md-6">
                     <label for="member_details_check" class="form-label">
                     <input type="checkbox" name="member_details_check" value="member_details_check" id="member_details_check" class="" placeholder=""  />
                     Member Details
                     </label>
                  </div>
                  @if(auth()->user()->role !== 'advisor_firm')
                  <br>
                  <br>
                  <p class="mt-2">Management Permissions</p>
                  <div class="col-md-6">
                     <label for="leads_check" class="form-label">
                     <input type="checkbox" name="leads_check" value="leads_check" id="leads_check" class="" placeholder=""  />
                     Leads
                     </label>
                  </div>
                  <div class="col-md-6">
                     <label for="user_management_check" class="form-label">
                     <input type="checkbox" name="user_management_check" value="user_management_check" id="user_management_check" class="" placeholder=""  />
                     User Management
                     </label>
                  </div>
                  <div class="col-md-6">
                     <label for="dms_check" class="form-label">
                     <input type="checkbox" name="dms_check" id="dms_check" value="dms_check" class="" placeholder=""  />
                     DMS
                     </label>
                  </div>
                  <div class="col-md-6">
                     <label for="reports_check" class="form-label">
                     <input type="checkbox" name="reports_check" value="reports_check" id="reports_check" class="" placeholder=""  />
                     Reports
                     </label>
                  </div>
                  <div class="col-md-12">
                     <label for="workflow_check" class="form-label">
                     <input type="checkbox" name="workflow_check" value="workflow_check" id="workflow_check" class="" placeholder=""  />
                     WorkFLow
                     </label>
                  </div>
                  <br>
                  <br>
                  @endif
                  <p class="mt-2">Support Permissions</p>
                  <div class="col-md-6">
                     <label for="tickets_check" class="form-label">
                     <input type="checkbox" name="tickets_check" value="tickets_check" id="tickets_check" class="" placeholder=""  />
                     Tickets 
                     </label>
                  </div>
                  <div class="col-md-6">
                     <label for="support_check" class="form-label">
                     <input type="checkbox" name="support_check" value="support_check" id="support_check" class="" placeholder=""  />
                     Supports
                     </label>
                  </div>
                  <div class="col-md-12">
                     <label for="faq_check" class="form-label">
                     <input type="checkbox" name="faq_check" value="faq_check" id="faq_check" class="" placeholder=""  />
                     FAQ
                     </label>
                  </div>
                  @if(auth()->user()->role !== 'advisor_firm')
                  <br>
                  <br>
                  <p class="mt-2">Marketing Management Permissions</p>
                  <div class="col-md-12">
                     <label for="communication_check" class="form-label">
                     <input type="checkbox" name="communication_check" value="communication_check" id="communication_check" class="" placeholder=""  />
                     Comunications
                     </label>
                  </div>
                  <br>
                  <br>
                  <p class="mt-2">Archive Permissions</p>
                  <div class="col-md-6">
                     <label for="adviser_applications_check" class="form-label">
                     <input type="checkbox" name="adviser_applications_check"  value="adviser_applications_check"  id="adviser_applications_check" class="" placeholder=""  />
                     Adviser Applications
                     </label>
                  </div>
                  <div class="col-md-6">
                     <label for="member_applications_check" class="form-label">
                     <input type="checkbox" name="member_applications_check"  value="member_applications_check"  id="member_applications_check" class="" placeholder=""  />
                     Member Applications
                     </label>
                  </div>
               </div>
               @endif
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Create User</button>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="row">
   <div class="card">
      <div class="card-header flex-column flex-md-row">
         <div class="dt-action-buttons text-end pt-6 pt-md-0">
            <div class="dt-buttons btn-group">
               <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" data-bs-toggle="modal"
                  data-bs-target="#usercreate" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span></button>
            </div>
         </div>
      </div>
      <div class="card-datatable table-responsive">
         <table class="dt-responsive table" id="myTable">
            <thead>
               <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Role</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($users as $index => $user)
               <tr>
                  <td>{{$index+1}}</td>
                  <td><i class="ti ti-user ti-md text-danger me-4"></i><span class="fw-medium">{{$user->name}}</span></td>
                  <td>{{$user->email}}</td>
                  <td>{{ $user->created_at->format('M d, Y') }}</td>
                  <td><span class="badge bg-label-primary me-1">{{$user->role}}</span></td>
                  <td>
                     <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item waves-effect" data-bs-toggle="modal"
                              data-bs-target="#useredit{{$user->id}}"><i class="ti ti-pencil me-1"></i> Edit</a>
                           <a class="dropdown-item waves-effect" href="{{ route('user-delete', ['id' => $user->id]) }}"><i class="ti ti-trash me-1"></i> Delete</a>
                        </div>
                     </div>
                  </td>
               </tr>
               <div class="modal fade" id="useredit{{ $user->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title">Edit User</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('user-update', ['id' => $user->id]) }}" method="POST">
                           @csrf
                           <div class="modal-body">
                              <div class="row">
                                 <div class="col mb-4">
                                    <label for="nameBasic" class="form-label">Name</label>
                                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="Enter Name" required />
                                 </div>
                              </div>
                              <div class="row g-4">
                                 <div class="col mb-0">
                                    <label for="emailBasic" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="xxxx@xxx.xx" required />
                                 </div>
                                 <div class="col mb-0">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" class="form-control" style="background-color: #2F3349; color: white;" required>
                                    @if(auth()->user()->role !== 'advisor_firm')
                                    <option value="admin"{{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="it_admin" {{ $user->role == 'it_admin' ? 'selected' : '' }}>IT Admin</option>
                                    <option value="pre_approved_adviser_firm" {{ $user->role == 'pre_approved_adviser_firm' ? 'selected' : '' }}>Pre-approved Adviser Firm</option>
                                    <option value="advisor_firm" {{ $user->role == 'advisor_firm' ? 'selected' : '' }}>Adviser Firm</option>
                                    @endif
                                    </select>
                                 </div>
                              </div>
                              <div class="row">
                                   <div class="col">
                                      <label for="password" class="form-label">Password</label>
                                      <input type="password" name="password" class="form-control editPassword" placeholder="Leave empty to keep current password" />
                                      <div class="editPasswordError" style="color: red; margin-top: 5px;"></div>
                                   </div>
                                </div>
                              <div class="row my-2">
                                 <div class="col">
                                    <label for="emailBasic" class="form-label">Firm Name</label>
                                    <input type="text" name="firm_name" value="{{$user->firm_name}}" id="firm_name" class="form-control" />
                                 </div>
                              </div>
                              <div class="col">
                                 <label for="dob" class="form-label">Date of Birth</label>
                                 <input type="date" name="dob" id="dob" class="form-control" value="{{$user->dob}}" />
                              </div>
                              <div class="col">
                                 <label for="dob" class="form-label">Nationality</label>
                                 <select name="nationality" id="dob" class="form-control">
                                    <option value="" disabled>Select Country</option>
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
                                    <option value="{{ $country }}" {{ old('country', $user->nationality ?? '') == $country ? 'selected' : '' }}>
                                    {{ $country }}
                                    </option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="col">
                                 <label for="dob" class="form-label">Country of residency</label>
                                 <select name="country_residency" id="dob" class="form-control" >
                                    value="{{$user->dob}}"
                                    <option value="" disabled>Select Country</option>
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
                                    <option value="{{ $country }}" {{ old('country', $user->country_residency ?? '') == $country ? 'selected' : '' }}>
                                    {{ $country }}
                                    </option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="">
                                 <label for="email_notification" class="form-label">Email Notification</label>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="email_notification" id="email_notification_yes" value="yes" {{ $user->email_notification == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="email_notification_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="email_notification" id="email_notification_no" value="no" {{ $user->email_notification == 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="email_notification_no">No</label>
                                 </div>
                              </div>
                              @if(auth()->user()->role !== 'advisor_firm')
                              <p class="mt-4">Adviser Applications Permissions</p>
                              <div class="row mt-3">
                                 <div class="col-md-6">
                                    <label for="adviser_check" class="form-label">
                                    <input type="checkbox" name="adviser_check" value="adviser_check" {{ $user->adviser_check ? 'checked' : '' }} id="adviser_check" class="" placeholder=""  />
                                    Onshore Registration From
                                    </label>
                                 </div>
                                 <div class="col-md-6">
                                    <label for="adviser_check" class="form-label">
                                    <input type="checkbox" name="offshore_check" value="offshore_check" {{ $user->offshore_check ? 'checked' : '' }} id="offshore_check" class="" placeholder=""  />
                                    Offshore Registration From
                                    </label>
                                 </div>
                                 <br>
                                 <br>
                                 <p class="mt-4">Adviser Terms Status Permissions</p>
                                 <div class="col-md-6">
                                    <label for="adviser_check" class="form-label">
                                    <input type="checkbox" name="offshore_pending" value="offshore_pending" {{ $user->offshore_pending ? 'checked' : '' }} id="offshore_pending" class="" placeholder=""  />
                                    Pending
                                    </label>
                                 </div>
                                 <div class="col-md-12">
                                    <label for="adviser_check" class="form-label">
                                    <input type="checkbox" name="offshore_existing" value="offshore_existing" {{ $user->offshore_existing ? 'checked' : '' }} id="offshore_existing" class="" placeholder=""  />
                                    Existing
                                    </label>
                                 </div>
                                 <div class="col-md-12">
                                    <label for="adviser_check" class="form-label">
                                    <input type="checkbox" name="offshore_declined" value="offshore_declined" {{ $user->offshore_declined ? 'checked' : '' }} id="offshore_declined" class="" placeholder=""  />
                                    Declined
                                    </label>
                                 </div>
                                 <br>
                                 <br>
                                 @endif
                                 <p class="mt-2">Member Application Permissions</p>
                                 <div class="col-md-6">
                                    <label for="oasis_sipp__check" class="form-label">
                                    <input type="checkbox" name="oasis_sipp__check" value="oasis_sipp__check" {{ $user->oasis_sipp__check ? 'checked' : '' }} id="oasis_sipp__check" class="" placeholder=""  />
                                    Oasis SIPP
                                    </label>
                                 </div>
                                 <div class="col-md-6">
                                    <label for="sipp_property_check" class="form-label">
                                    <input type="checkbox" name="sipp_property_check" value="sipp_property_check" {{ $user->sipp_property_check ? 'checked' : '' }} id="sipp_property_check" class="" placeholder=""  />
                                    SIPP Property
                                    </label>
                                 </div>
                                 <div class="col-md-6">
                                    <label for="full_sipp_check" class="form-label">
                                    <input type="checkbox" name="full_sipp_check" value="full_sipp_check" {{ $user->full_sipp_check ? 'checked' : '' }} id="full_sipp_check" class="" placeholder=""  />
                                    Full SIPP Property
                                    </label>
                                 </div>
                                 <div class="col-md-6">
                                    <label for="ftp_check" class="form-label">
                                    <input type="checkbox" name="ftp_check" id="ftp_check" value="ftp_check" {{ $user->ftp_check ? 'checked' : '' }} class="" placeholder=""  />
                                    FTP
                                    </label>
                                 </div>
                                 @if(auth()->user()->role !== 'advisor_firm')
                                 <div class="col-md-6">
                                    <label for="ftp_check" class="form-label">
                                    <input type="checkbox" name="pending_applications" id="pending_applications" value="pending_applications" {{ $user->pending_applications ? 'checked' : '' }} class="" placeholder=""  />
                                    Pending Applications
                                    </label>
                                 </div>
                                 <div class="col-md-6">
                                    <label for="ftp_check" class="form-label">
                                    <input type="checkbox" name="existing_applications" id="existing_applications" value="existing_applications" {{ $user->existing_applications ? 'checked' : '' }} class="" placeholder=""  />
                                    Existing Applications
                                    </label>
                                 </div>
                                 <div class="col-md-6">
                                    <label for="ftp_check" class="form-label">
                                    <input type="checkbox" name="decline_applications" id="decline_applications" value="decline_applications" {{ $user->decline_applications ? 'checked' : '' }} class="" placeholder=""  />
                                    Decline Applications
                                    </label>
                                 </div>
                                 <br>
                                 <br>
                                 <p class="mt-2">Members Permissions</p>
                                 <div class="col-md-6">
                                    <label for="illustration_check" class="form-label">
                                    <input type="checkbox" name="illustration_check" value="illustration_check" {{ $user->illustration_check ? 'checked' : '' }} id="illustration_check" class="" placeholder=""  />
                                    Illustration
                                    </label>
                                 </div>
                                 @endif
                                 <div class="col-md-6">
                                    <label for="member_details_check" class="form-label">
                                    <input type="checkbox" name="member_details_check" value="member_details_check" {{ $user->member_details_check ? 'checked' : '' }} id="member_details_check" class="" placeholder=""  />
                                    Member Details
                                    </label>
                                 </div>
                                 @if(auth()->user()->role !== 'advisor_firm')
                                 <br>
                                 <br>
                                 <p class="mt-2">Management Permissions</p>
                                 <div class="col-md-6">
                                    <label for="leads_check" class="form-label">
                                    <input type="checkbox" name="leads_check" value="leads_check" {{ $user->leads_check ? 'checked' : '' }} id="leads_check" class="" placeholder=""  />
                                    Leads
                                    </label>
                                 </div>
                                 <div class="col-md-6">
                                    <label for="user_management_check" class="form-label">
                                    <input type="checkbox" name="user_management_check" value="user_management_check" {{ $user->user_management_check ? 'checked' : '' }} id="user_management_check" class="" placeholder=""  />
                                    User Management
                                    </label>
                                 </div>
                                 <div class="col-md-6">
                                    <label for="dms_check" class="form-label">
                                    <input type="checkbox" name="dms_check" id="dms_check" value="dms_check" {{ $user->dms_check ? 'checked' : '' }} class="" placeholder=""  />
                                    DMS
                                    </label>
                                 </div>
                                 <div class="col-md-6">
                                    <label for="reports_check" class="form-label">
                                    <input type="checkbox" name="reports_check" value="reports_check" {{ $user->reports_check ? 'checked' : '' }} id="reports_check" class="" placeholder=""  />
                                    Reports
                                    </label>
                                 </div>
                                 <div class="col-md-12">
                                    <label for="workflow_check" class="form-label">
                                    <input type="checkbox" name="workflow_check" value="workflow_check" {{ $user->workflow_check ? 'checked' : '' }} id="workflow_check" class="" placeholder=""  />
                                    WorkFLow
                                    </label>
                                 </div>
                                 <br>
                                 <br>
                                 @endif
                                 <p class="mt-2">Support Permissions</p>
                                 <div class="col-md-6">
                                    <label for="tickets_check" class="form-label">
                                    <input type="checkbox" name="tickets_check" value="tickets_check" {{ $user->tickets_check ? 'checked' : '' }} id="tickets_check" class="" placeholder=""  />
                                    Tickets 
                                    </label>
                                 </div>
                                 <div class="col-md-6">
                                    <label for="support_check" class="form-label">
                                    <input type="checkbox" name="support_check" value="support_check" {{ $user->support_check ? 'checked' : '' }} id="support_check" class="" placeholder=""  />
                                    Supports
                                    </label>
                                 </div>
                                 <div class="col-md-12">
                                    <label for="faq_check" class="form-label">
                                    <input type="checkbox" name="faq_check" value="faq_check" {{ $user->faq_check ? 'checked' : '' }} id="faq_check" class="" placeholder=""  />
                                    FAQ
                                    </label>
                                 </div>
                                 <br>
                                 <br>
                                 @if(auth()->user()->role !== 'advisor_firm')
                                 <p class="mt-2">Marketing Management Permissions</p>
                                 <div class="col-md-12">
                                    <label for="communication_check" class="form-label">
                                    <input type="checkbox" name="communication_check" value="communication_check" {{ $user->communication_check ? 'checked' : '' }} id="communication_check" class="" placeholder=""  />
                                    Comunications
                                    </label>
                                 </div>
                                 <br>
                                 <br>
                                 <p class="mt-2">Archive Permissions</p>
                                 <div class="col-md-6">
                                    <label for="adviser_applications_check" class="form-label">
                                    <input type="checkbox" name="adviser_applications_check"  value="adviser_applications_check" {{ $user->adviser_applications_check ? 'checked' : '' }}  id="adviser_applications_check" class="" placeholder=""  />
                                    Adviser Applications
                                    </label>
                                 </div>
                                 <div class="col-md-6">
                                    <label for="member_applications_check" class="form-label">
                                    <input type="checkbox" name="member_applications_check"  value="member_applications_check" {{ $user->member_applications_check ? 'checked' : '' }}  id="member_applications_check" class="" placeholder=""  />
                                    Member Applications
                                    </label>
                                 </div>
                                 @endif
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Update User</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
<script>
   document.addEventListener("DOMContentLoaded", function () {
       const roleSelect = document.getElementById("role");
       const checkboxes = document.querySelectorAll("input[type='checkbox']");
       roleSelect.addEventListener("change", function () {
           if (this.value === "admin") {
               checkboxes.forEach(checkbox => {
                   checkbox.checked = true;
               });
           } else if (this.value === "pre_approved_adviser_firm") {
               checkboxes.forEach(checkbox => {
                   checkbox.checked = false;
               });
               document.getElementById("adviser_check").checked = true;
               document.getElementById("offshore_check").checked = true;
               document.getElementById("tickets_check").checked = true;
               document.getElementById("support_check").checked = true;
               document.getElementById("faq_check").checked = true;
           } else if (this.value === "advisor_firm") {
               checkboxes.forEach(checkbox => {
                   checkbox.checked = false;
               });
               document.getElementById("oasis_sipp__check").checked = true;
               document.getElementById("sipp_property_check").checked = true;
               document.getElementById("full_sipp_check").checked = true;
               document.getElementById("ftp_check").checked = true;
               document.getElementById("member_details_check").checked = true;
               document.getElementById("tickets_check").checked = true;
               document.getElementById("support_check").checked = true;
               document.getElementById("faq_check").checked = true;
           } else if (this.value === "onshore_adviser" || this.value === "offshore_adviser") {
               checkboxes.forEach(checkbox => {
                   checkbox.checked = false;
               });
               document.getElementById("oasis_sipp__check").checked = true;
               document.getElementById("sipp_property_check").checked = true;
               document.getElementById("full_sipp_check").checked = true;
               document.getElementById("ftp_check").checked = true;
               document.getElementById("member_details_check").checked = true;
               document.getElementById("tickets_check").checked = true;
               document.getElementById("support_check").checked = true;
               document.getElementById("faq_check").checked = true;
           } else if (this.value === "oasis_sipp" || this.value === "sipp_property" || this.value === "full_sipp_property" || this.value === "fpt") {
               checkboxes.forEach(checkbox => {
                   checkbox.checked = false;
               });
               document.getElementById("member_details_check").checked = true;
               document.getElementById("tickets_check").checked = true;
               document.getElementById("support_check").checked = true;
               document.getElementById("faq_check").checked = true;
           }
           else if (this.value === "employee") {
               checkboxes.forEach(checkbox => {
                   checkbox.checked = false;
               });
               document.getElementById("offshore_declined").checked = true;
               document.getElementById("offshore_existing").checked = true;
               document.getElementById("offshore_pending").checked = true;
               document.getElementById("support_check").checked = true;
               document.getElementById("tickets_check").checked = true;
           }
           else {
               checkboxes.forEach(checkbox => {
                   checkbox.checked = false;
               });
           }
       });
   });
</script>
@section('script')
<script src="public/assets/js/tables-datatables-advanced.js"></script>
<script>
    // Get all elements with class 'editPassword'
    const passwordFields = document.querySelectorAll('.editPassword');
    
    passwordFields.forEach(function (passwordField) {
        passwordField.addEventListener('input', function () {
            const password = this.value;
            const errorDiv = this.nextElementSibling;  // Get the next div (error message)
            const errors = [];

            // Clear previous border
            this.style.border = '';

            // Validation rules (only if password is provided, not if empty)
            if (password && password.length < 8) {
                errors.push("At least 8 characters required.");
            }
            if (password && !/[A-Z]/.test(password)) {
                errors.push("Include at least one uppercase letter.");
            }
            if (password && !/[a-z]/.test(password)) {
                errors.push("Include at least one lowercase letter.");
            }
            if (password && !/[0-9]/.test(password)) {
                errors.push("Include at least one number.");
            }
            if (password && !/[@$!%*?&]/.test(password)) {
                errors.push("Include at least one special character (@, $, !, %, *, ?, &).");
            }

            // Show errors
            if (errors.length > 0) {
                this.style.border = '1px solid red';
                errorDiv.innerHTML = errors.join('<br>');
            } else {
                errorDiv.innerHTML = '';
                this.style.border = '1px solid green';
            }
        });
    });
</script>
@endsection