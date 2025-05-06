@extends('dashboard.dashboard')
@section('content')
<style>
   .lg-backdrop {
   z-index: 1000000;
   }
   .lg-outer {
   z-index: 010000000000000;
   }
</style>
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
   @media (max-width: 768px) {
   .step {
   flex: 1 1 calc(100% / 3 - 15px);
   }
   }
   @media (max-width: 480px) {
   .step {
   flex: 1 1 calc(100% / 2 - 15px);
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
         <div class="step-subtitle">Adviser Details</div>
      </div>
      <div class="arrow">→</div>
      <div class="step disabled" data-step="1">
         <div class="step-icon"><i class="fas fa-user"></i></div>
         <div class="step-subtitle">Fee & Commission</div>
      </div>
      <div class="arrow">→</div>
      <div class="step disabled" data-step="2">
         <div class="step-icon"><i class="fas fa-university"></i></div>
         <div class="step-subtitle">Investment Strategy</div>
      </div>
      <div class="arrow">→</div>
      <div class="step disabled" data-step="3">
         <div class="step-icon"><i class="fas fa-sync-alt"></i></div>
         <div class="step-subtitle">Bank Details</div>
      </div>
      <div class="arrow">→</div>
      <div class="step disabled" data-step="4">
         <div class="step-icon"><i class="fas fa-balance-scale"></i></div>
         <div class="step-subtitle">Benefit (DB) Transfer</div>
      </div>
      <div class="arrow">→</div>
      <div class="step disabled" data-step="5">
         <div class="step-icon"><i class="fas fa-scroll"></i></div>
         <div class="step-subtitle">Policies & Financial Crime</div>
      </div>
      <div class="arrow">→</div>
      <div class="step disabled" data-step="6">
         <div class="step-icon"><i class="fas fa-credit-card"></i></div>
         <div class="step-subtitle">Non Standard Assets</div>
      </div>
      <div class="arrow">→</div>
      <div class="step disabled" data-step="7">
         <div class="step-icon"><i class="fas fa-file-upload"></i></div>
         <div class="step-subtitle">Consumer Duty</div>
      </div>
      <div class="arrow">→</div>
      <div class="step disabled" data-step="8">
         <div class="step-icon"><i class="fas fa-phone"></i></div>
         <div class="step-subtitle">CDD Uploads</div>
      </div>
      <div class="arrow">→</div>
      <div class="step disabled" data-step="9">
         <div class="step-icon"><i class="fas fa-envelope"></i></div>
         <div class="step-subtitle">Agreement</div>
      </div>
      <div class="arrow">→</div>
      <div class="step disabled" data-step="10">
         <div class="step-icon"><i class="fas fa-shield-alt"></i></div>
         <div class="step-subtitle">Register Adviser</div>
      </div>
      <div class="d-flex col-12 align-items-center justify-content-center authentication-bg p-5">
         <div class="col-12">
            <div id="multiStepsValidation" class="bs-stepper border-none shadow-none mt-5">
               <div class="bs-stepper-content px-0">
                  <form id="multiStepsForm" method="POST" action="{{ route('onshoreCreate-store') }}" enctype="multipart/form-data">
                     @csrf
                     <button type="submit" class="btn btn-success btn-draft mb-5">Save as Draft</button>
                     <div id="adviserDetails" class="content" style="display: block;">
                        <div class="content-header mb-6">
                           <h4 class="mb-0">Adviser Details</h4>
                        </div>
                        <div class="row g-2">
                           <div class="col-md-6">
                              <label for="company_name">Company Name</label>
                              <input type="text" name="company_name" id="company_name" class="form-control" required />
                           </div>
                           <div class="col-md-6">
                              <label  for="trading_names">Trading Name</label>
                              <input type="text" name="trading_name" id="trading_name" class="form-control"  />
                           </div>
                           <div class="col-md-12">
                              <label  for="address">Address</label>
                              <textarea name="address" id="address"  class="form-control" rows="3"></textarea>
                           </div>
                           <div class="col-sm-6">
                              <label for="country">Country</label>
                              <select name="country" id="country" class="form-control">
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
                           <div class="col-sm-6">
                              <label for="postCode">Post Code</label>
                              <input type="text" name="post_code" id="postCode"class="form-control" />
                           </div>
                           <div class="col-md-6">
                              <label  for="shareholderDetails">Details of Primary Shareholder/Owner</label>
                              <input type="text" name="share_holder_details" id="shareholderDetails" class="form-control" />
                           </div>
                           <div class="col-md-6">
                              <label  for="regulated_adviser">Number of Regulated Advisers</label>
                              <input type="number" name="regulated_adviser"  id="regulated_adviser" class="form-control" />
                           </div>
                           <div class="col-md-6">
                              <label  for="contactEmail">Company Contact Email Address</label>
                              <input type="email" name="contact_email"  id="contactEmail" class="form-control" required/>
                           </div>
                           <div class="col-md-6">
                              <label  for="website">Website</label>
                              <input type="text" name="website"  id="website" class="form-control" />
                           </div>
                           <div class="col-md-12">
                              <label  for="telephone">Telephone Number</label>
                              <input type="tel" name="telephone"  id="telephone" class="form-control" required/>
                           </div>
                           <div class="col-md-12">
                              <p>We will use the above email address to send you notifications about our online system, as well as literature changes and other important company announcements.</p>
                           </div>
                           <div class="col-md-12">
                              <label  for="fca_firms_reference">FCA Firms Reference Number:</label>
                              <input type="tel" name="fca_firms_reference"  id="fca_firms_reference" class="form-control" />
                           </div>
                           <div class="col-md-12">
                              <div class="col-md-6">
                                 <label  for="directly_Authorised">
                                 <input type="radio" name="directly_authorised_checked"  id="directly_Authorised" value="directly_authorised"  />
                                 Directly Authorised
                                 </label>
                              </div>
                              <div class="col-md-6">
                                 <label  for="appointed_representative">
                                 <input type="radio" name="directly_authorised_checked" value="appointed_representative"  id="appointed_representative" />
                                 Appointed Representative
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <p>If you are an appointed representative of another firm, please provide the name of your principal company and their FRN:</p>
                           </div>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-6">
                                    <label  for="principal_company_name">Principal Company Name</label>
                                    <input type="text" name="principal_company_name"  id="principal_company_name" class="form-control" />
                                 </div>
                                 <div class="col-md-6">
                                    <label  for="their_frn">Their FRN</label>
                                    <input type="text" name="their_frn" id="their_frn"  class="form-control" />
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <p>Do you advise clients that have overseas connections?</p>
                              <label>
                              <input type="radio" value="yes" name="advice"  id="yes" class=""   />
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="advice"  id="no" class=""  />
                              No
                              </label>
                           </div>
                           <div class="col-md-12">
                              <label  for="provide_countries">If yes, please provide countries:</label>
                              <textarea name="provide_countries" id="provide_countries"  class="form-control"></textarea>
                           </div>
                           <div class="col-md-12">
                              <label  for="hear_about_us">Where did you hear about us?</label>
                              <input type="text" name="hear_about_us" id="hear_about_us"  class="form-control" />
                           </div>
                           <p>How do you generate new business? (Please feel free to tick more than one)</p>
                           <div class="col-md-12">
                              <label  for="word_of_referrals">
                              <input type="checkbox" name="word_of_referrals_checked"  >
                              Word of mouth / referrals
                              </label>
                              <div class="col-md-12">
                                 <label  for="lead_generation">
                                 <input type="checkbox" name="lead_generation_checked" >
                                 Lead generation company, if yes, please specify
                                 </label>
                              </div>
                              <div class="col-md-12">
                                 <label  for="marketing">
                                 <input type="checkbox" name="marketing_checked" >
                                 Marketing
                                 </label>
                              </div>
                              <div class="col-md-12">
                                 <label  for="other_specify">
                                 <input type="checkbox" name="other_specify_checked" >
                                 Other, if yes, please specify
                                 </label>
                                 <input type="text" name="other_specify" id="other_specify" class="form-control" />
                              </div>
                           </div>
                           <div class="col-md-12">
                              <p>Do you have restrictions on your permission?</p>
                              <label>
                              <input type="radio" value="yes" name="restrictions_yes_permission" id="yes" class=""  />
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="restrictions_yes_permission" id="no" class=""  />
                              No
                              </label>
                              <p>If yes, please provide details:</p>
                              <input type="text" name="restrictions_yes_permission_answer" id="hear_about_us" class="form-control" />
                           </div>
                           <div class="col-md-12">
                              <p>Have any sanctions been made against the company historically by any regulatory or official body e.g., HMRC/FCA?</p>
                              <label>
                              <input type="radio" value="yes" name="sanctions" id="yes" class="" />
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="sanctions" id="no" class="" />
                              No
                              </label>
                              <p>If yes, please provide details:</p>
                              <input type="text" name="sanctions_yes_answer" id="hear_about_us" class="form-control"  />
                           </div>
                           <div class="col-md-12">
                              <p>Do you have any connection via people, corporate structures, or premises to any investment firm, product/fund provider, or introducer of business?</p>
                              <label>
                              <input type="radio" value="yes" name="connection_connection" id="yes" required />
                              Yes
                              </label>
                              <label>
                              <input type="radio" value="no" name="connection_connection" id="no" required />
                              No
                              </label>
                              <p>If yes, please provide details:</p>
                              <input type="text" name="connection_connection_yes_answer" id="hear_about_us" class="form-control"/>
                           </div>
                           <div class="col-md-12">
                              <label >What level of professional indemnity insurance do you hold?</label>
                              <input type="text" name="professional_indemnity_insurance"  id="professional_indemnity_insurance" class="form-control" />
                           </div>
                           <div class="col-md-6">
                              <labelfor="policy_excess_DB">Policy excess DB transfer £</label> 
                              <input type="text" name="policy_excess_DB" id="policy_excess_DB"  class="form-control" />
                           </div>
                           <div class="col-md-6">
                              <label for="other_money">Other £</label>
                              <input type="text" name="other_money" id="other_money"  class="form-control" />
                           </div>
                           <div class="col-md-6">
                              <p>Do you have separate Cyber Security insurance?</p>
                              <label>
                              <input type="radio" value="yes" name="separate_cyber_security" id="yes"  />
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="separate_cyber_security" id="no"  />
                              No
                              </label>
                           </div>
                           <div class="col-md-6">
                              <p>Do you hold permissions for advising on defined benefit (DB) transfers?</p>
                              <label>
                              <input type="radio" value="yes" name="permissions_for_advising" id="yes"  />
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="permissions_for_advising" id="no"  />
                              No
                              </label>
                           </div>
                           <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev" type="button">
                              <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                              <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button type="button" class="btn btn-primary btn-next"  id="nextButton" disabled onclick="scrollToTop()">
                              <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
                              <i class="ti ti-arrow-right ti-xs"></i>
                              </button>
                           </div>
                        </div>
                     </div>
                     <div id="personalInfoValidation1" class="content" style="display: none;">
                        <div class="content-header mb-6">
                           <h4 class="mb-0">Fee & Commission</h4>
                        </div>
                        <div class="row g-2">
                           <div class="col-md-6">
                              <label  for="initial_advice_fee">Initial Advice Fee</label>
                              <input type="text" name="initial_advice_fee" id="initial_advice_fee" class="form-control" />
                           </div>
                           <div class="col-md-6">
                              <labelfor="going_Annual_fee">Ongoing Annual Management Fee</label>
                              <input type="text" name="going_annual_fee" id="going_Annual_fee" class="form-control" />
                           </div>
                           <div class="col-md-6">
                              <label for="house_portfolio_solutions">In-House Model Portfolio Solutions</label>
                              <input type="text" name="house_portfolio_solutions" id="house_portfolio_solutions" class="form-control" />
                           </div>
                           <div class="col-md-6">
                              <label  for="receive_provider_commission">Do you receive any provider commissions?</label>
                              <input type="text" name="receive_provider_commission" id="receive_provider_commission" class="form-control"  />
                           </div>
                           <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev" type="button">
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
                     <div id="personalInfoValidation2" class="content" style="display: none;">
                        <div class="content-header mb-6">
                           <h4 class="mb-0">Investment Strategy</h4>
                        </div>
                        <div class="row g-2">
                           <p class="mb-1">Please Click the boxes below to confirm which investments you will be selecting in respect of your clients</p>
                           <div class="col-md-12">
                              <div>
                                 <label for="platformWrap">Platform / WRAP</label>
                              </div>
                              <div>
                                 <input type="checkbox" id="advisoryStockbroker" name="investmentStrategy[]" value="Advisory Stockbroker" />
                                 <label for="advisoryStockbroker">Advisory Stockbroker</label>
                              </div>
                              <div>
                                 <input type="checkbox" id="commercialProperty" name="investmentStrategy[]" value="Commercial Property" />
                                 <label for="commercialProperty">Commercial Property</label>
                              </div>
                              <div>
                                 <input type="checkbox" id="depositAccounts" name="investmentStrategy[]" value="Deposit Accounts" />
                                 <label for="depositAccounts">Deposit Accounts</label>
                              </div>
                              <div>
                                 <input type="checkbox" id="fundsDirectViaPlatform" name="investmentStrategy[]" value="Funds (direct via a Platform)"  />
                                 <label for="fundsDirectViaPlatform">Funds (direct not via a Platform)</label>
                              </div>
                              <div>
                                 <input type="checkbox" id="dmvModelPortfolios" name="investmentStrategy[]" value="DMV / Model Portfolios"  />
                                 <label for="dmvModelPortfolios">DFM / Model Portfolios</label>
                              </div>
                              <div>
                                 <input type="checkbox" id="nonMassMarketInvestments" name="investmentStrategy[]" value="Non Mass Market Investments"  />
                                 <label for="nonMassMarketInvestments">Non Mass Market Investments</label>
                              </div>
                              <div>
                                 <input type="checkbox" id="highRiskInvestments" name="investmentStrategy[]" value="High Risk Investments as defined by FCA"  />
                                 <label for="highRiskInvestments">High Risk Investments as defined by FCA</label>
                              </div>
                              <div>
                                 <input type="checkbox" id="restrictedMassMarket" name="investmentStrategy[]" value="Restricted Mass Market Investments"  />
                                 <label for="restrictedMassMarket">Restricted Mass Market Investments</label>
                              </div>
                              <div>
                                 <input type="checkbox" id="structuredeposit" name="investmentStrategy[]" value="Structure Deposit"  />
                                 <label for="structuredeposit">Structured Deposit</label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <label class="mb-2">Will you be running / managing the portfolios on behalf of any Clients?</label>
                              <div>
                                 <input type="radio" name="running_managing_portfolios" id="yesPortfolios" value="Yes"  />
                                 <label for="yesPortfolios">Yes</label>
                              </div>
                              <div>
                                 <input type="radio" name="running_managing_portfolios" id="noPortfolios" value="No"  />
                                 <label for="noPortfolios">No</label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <label class="mb-2">If “Yes” this will be on an:</label>
                              <div>
                                 <input type="radio" name="basis" id="advisoryBasis" value="Advisory basis"  />
                                 <label for="advisoryBasis">Advisory basis</label>
                              </div>
                              <div>
                                 <input type="radio" name="basis" id="discretionaryBasis" value="Discretionary basis"  />
                                 <label for="discretionaryBasis">Discretionary basis</label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <p class="mt-3">If you are running / managing portfolios, please send an example portfolio alongside our Adviser Registration form.</p>
                           </div>
                           <div class="col-md-12">
                              <label >We appreciate financial advisers work with multiple investment providers, however, please can you detail the top 4 companies your firm uses:</label>
                           </div>
                           <div class="col-md-6">
                              <label for="principalCompanyName1">Principal Company Name</label>
                              <input type="text" name="principal_company_name1" id="principalCompanyName1" class="form-control" />
                           </div>
                           <div class="col-md-6">
                              <label   for="principalCompanyName2">Principal Company Name</label>
                              <input type="text" name="principal_company_name2" id="principalCompanyName2" class="form-control" />
                           </div>
                           <div class="col-md-6">
                              <label   for="principalCompanyName3">Principal Company Name</label>
                              <input type="text" name="principal_company_name3" id="principalCompanyName3" class="form-control" />
                           </div>
                           <div class="col-md-6">
                              <labelfor="principalCompanyName4">Principal Company Name</label>
                              <input type="text" name="principal_company_name4" id="principalCompanyName4" class="form-control" />
                           </div>
                           <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev" type="button">
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
                     <div id="bank_details" class="content" style="display: none;">
                        <div class="content-header mb-6">
                           <h4 class="mb-0">Bank Details</h4>
                        </div>
                        <div class="row g-2">
                           <div class="row g-2">
                              <div class="col-md-6">
                                 <label for="accountName">Account Name</label>
                                 <input type="text" name="account_name" id="accountName" class="form-control" />
                              </div>
                              <div class="col-md-6">
                                 <label for="bankName">Bank Name</label>
                                 <input type="text" name="bank_name" id="bankName" class="form-control" />
                              </div>
                              <div class="col-md-6">
                                 <label for="accountNumber">Account Number</label>
                                 <input type="text" name="account_number" id="accountNumber" class="form-control" />
                              </div>
                              <div class="col-md-6">
                                 <label for="sort_code">Sort Code</label>
                                 <input type="text" name="sort_code" id="sort_code" class="form-control" />
                              </div>
                           </div>
                           <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev" type="button">
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
                     <div id="BD_Transfer" class="content" style="display: none;">
                        <div class="content-header mb-6">
                           <h4 class="mb-0">Defined Benefit (DB) Transfer</h4>
                        </div>
                        <div class="row g-2">
                           <div class="col-md-12">
                              <label>
                              <input type="checkbox" name="not_applicable" id="agreeCheckbox">
                              Not Applicable
                              </label>
                           </div>
                           <div class="col-md-12">
                              <p>How many advisers within your business are permitted to advise on DB transfers?</p>
                              <input type="text" name="advisers_permitted" class="form-control">
                           </div>
                           <div class="col-md-12">
                              <p>How many members of staff provide a supervisory position in relation to DB transfers?</p>
                              <input type="text" name="staff_supervisory_position" class="form-control">
                           </div>
                           <div class="col-md-12">
                              <p>Are you a member of the Pension Transfer Gold Standard?</p>
                              <label>
                              <input type="radio" value="yes" name="gold_standard" id="gold_standard_yes" >
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="gold_standard" id="gold_standard_no" >
                              No
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="in_progress" name="gold_standard" id="gold_standard_progress" >
                              In Progress
                              </label>
                           </div>
                           <h5>Please confirm the number of DB transfers your firm has made in the previous 12, 24, and 36-month periods:</h5>
                           <div class=col-md-4>
                              <label>Number in previous 12 months:</label>
                              <input type="text" name="db_transfers_12_months" class="form-control">
                           </div>
                           <div class=col-md-4>
                              <label>Total value £:</label>
                              <input type="text" name="total_value_12_months" class="form-control">
                           </div>
                           <div class=col-md-4>
                              <label>DB transfers as a % of all transfers:</label>
                              <input type="text" name="percentage_db_transfers_12_months" class="form-control">
                           </div>
                           <div class=col-md-4>
                              <label>Number in previous 24 months:</label>
                              <input type="text" name="db_transfers_24_months" class="form-control">
                           </div>
                           <div class="col-md-4">
                              <label>Total value £:</label>
                              <input type="text" name="total_value_24_months" class="form-control">
                           </div>
                           <div class="col-md-4">
                              <label>DB transfers as a % of all transfers:</label>
                              <input type="text" name="percentage_db_transfers_24_months" class="form-control">
                           </div>
                           <div class="col-md-4">
                              <label>Number in previous 36 months:</label>
                              <input type="text" name="db_transfers_36_months" class="form-control">
                           </div>
                           <div class="col-md-4">
                              <label>Total value £:</label>
                              <input type="text" name="total_value_36_months" class="form-control">
                           </div>
                           <div class="col-md-4">
                              <label>DB transfers as a % of all transfers:</label>
                              <input type="text" name="percentage_db_transfers_36_months" class="form-control">
                           </div>
                           <h5>Number of complaints in relation to the DB transfer advice in the previous 12, 24, and 36-month periods:</h5>
                           <div class="col-md-6">
                              <label>Number in previous 12 months:</label>
                              <input type="text" name="complaints_12_months" class="form-control">
                           </div>
                           <div class="col-md-6">
                              <label>Number of cases on which redress was offered:</label>
                              <input type="text" name="redress_cases_12_months" class="form-control">
                           </div>
                           <div class="col-md-6">
                              <label>Number in previous 24 months:</label>
                              <input type="text" name="complaints_24_months" class="form-control">
                           </div>
                           <div class="col-md-6">
                              <label>Number of cases on which redress was offered:</label>
                              <input type="text" name="redress_cases_24_months" class="form-control">
                           </div>
                           <div class="col-md-6">
                              <label>Number in previous 36 months:</label>
                              <input type="text" name="complaints_36_months" class="form-control">
                           </div>
                           <div class="col-md-6">
                              <label>Number of cases on which redress was offered:</label>
                              <input type="text" name="redress_cases_36_months" class="form-control">
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>What percentage of your DB transfers over the last 12 months were to allow members to immediately access their pension benefits via pension freedoms?</p>
                              <input type="text" name="percentage_db_transfers" class="form-control">
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>Is your Pension Transfer Specialist internal or external?</p>
                              <label>
                              <input type="radio" value="internal" name="pension_specialist" id="pension_specialist_internal" >
                              Internal
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="external" name="pension_specialist" id="pension_specialist_external" >
                              External
                              </label>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>If internal, do you act as "Pension Transfer Specialist" for other FCA regulated firms?</p>
                              <label>
                              <input type="radio" value="yes" name="act_as_specialist" id="act_as_specialist_yes" >
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="act_as_specialist" id="act_as_specialist_no" >
                              No
                              </label>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>If yes, please provide details of firms:</p>
                              <textarea name="details_of_firms" class="form-control"></textarea>
                           </div>
                           <p>If external, please provide contact details for your Pension Transfer Specialist:</p>
                           <div class="col-md-6">
                              <label>Contact Name:</label>
                              <input type="text" name="contact_name" class="form-control">
                           </div>
                           <div class="col-md-6">
                              <label>Email Address:</label>
                              <input type="email" name="email_address" class="form-control">
                           </div>
                           <div class=col-md-6>
                              <label>Phone Number:</label>
                              <input type="text" name="phone_number" class="form-control">
                           </div>
                           <div class=col-md-6>
                              <label>Dial Code:</label>
                              <input type="text" name="dial_code" class="form-control">
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>What is a typical investment strategy for a DB transfer i.e. DFM / Platform and with whom?</p>
                              <textarea name="typical_investment_strategy" class="form-control"></textarea>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>What is the minimum CETV you would normally consider appropriate for a transfer into a Pension Scheme?</p>
                              <input type="text" name="minimum_cetv" class="form-control">
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>Do you conduct DB transfers for self-invested clients making their own investment decisions?</p>
                              <label>
                              <input type="radio" value="yes" name="conduct_db_transfers" id="conduct_db_transfers_yes" >
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="conduct_db_transfers" id="conduct_db_transfers_no" >
                              No
                              </label>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>Do you accept insistent clients on DB transfers?</p>
                              <label>
                              <input type="radio" value="yes" name="accept_insistent_clients" id="accept_insistent_clients_yes" >
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="accept_insistent_clients" id="accept_insistent_clients_no" >
                              No
                              </label>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>Do you work with unregulated lead generation firms / websites for DB transfers?</p>
                              <label>
                              <input type="radio" value="yes" name="work_with_unregulated_firms" id="work_with_unregulated_firms_yes" >
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="work_with_unregulated_firms" id="work_with_unregulated_firms_no" >
                              No
                              </label>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>Do you receive referrals from other FCA regulated adviser firms that do not have permissions to advise on DB transfers?</p>
                              <label>
                              <input type="radio" value="yes" name="receive_referrals" id="receive_referrals_yes" >
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="receive_referrals" id="receive_referrals_no" >
                              No
                              </label>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>If yes, please provide details:</p>
                              <textarea name="referral_details" class="form-control"></textarea>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>What percentage of your DB transfer business does this make up?</p>
                              <input type="text" name="db_transfer_percentage" class="form-control">
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>How do you source your DB clients?</p>
                              <textarea name="db_client_source" class="form-control"></textarea>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>Do you have any relationships with final salary scheme trustees / sponsoring employers?</p>
                              <label>
                              <input type="radio" value="yes" name="relationships_with_trustees" id="relationships_with_trustees_yes" >
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="relationships_with_trustees" id="relationships_with_trustees_no" >
                              No
                              </label>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>If yes, please provide details:</p>
                              <textarea name="trustee_relationship_details" class="form-control"></textarea>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>Do you work on a contingent charging basis?</p>
                              <label>
                              <input type="radio" value="yes" name="contingent_charging" id="contingent_charging_yes" >
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="contingent_charging" id="contingent_charging_no" >
                              No
                              </label>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>If yes, please specify what contingent charging is used:</p>
                              <textarea name="contingent_charging_details" class="form-control"></textarea>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>Do you offer a triage service?</p>
                              <label>
                              <input type="radio" value="yes" name="triage_service" id="triage_service_yes" >
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="triage_service" id="triage_service_no" >
                              No
                              </label>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>Do you have an advice fee and implementation fee?</p>
                              <label>
                              <input type="radio" value="yes" name="advice_fee" id="advice_fee_yes" >
                              Yes
                              </label>
                              <br>
                              <label>
                              <input type="radio" value="no" name="advice_fee" id="advice_fee_no" >
                              No
                              </label>
                           </div>
                           <div class="col-md-12 mt-4">
                              <p>Please provide a breakdown of the typical charging structure of a personal recommendation to transfer out a DB Pension to either a SIPP or a SSAS (including the investment costs once transferred):</p>
                              <textarea name="charging_structure_breakdown" class="form-control"></textarea>
                           </div>
                           <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev" type="button">
                              <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                              <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()" id="nextButton">
                              <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
                              <i class="ti ti-arrow-right ti-xs"></i>
                              </button>
                           </div>
                        </div>
                     </div>
                     <div id="polocoesCrime" class="content" style="display: none;">
                        <div class="content-header mb-6">
                           <h4 class="mb-0">Policies & Financial Crime</h4>
                        </div>
                        <div class="row">
                           <p>Do you have a suite of policies covering all regulatory requirements? Do these policies include Client Risk, PEPs, Non-Face-to-face Advice, Financial Crime, Anti Bribery, Anti Money Laundering and Countering Terrorist Financing, High Risk Transactions / Investments, Conflict of Interest, GDPR and the DPA 2018?</p>
                           <div class="col-md-12">
                              <div class="mb-4">
                                 <label for="yesPolicies">
                                 <input type="radio" name="policies_coverage" id="yesPolicies" value="Yes"  />
                                 Yes</label>
                                 <br>
                                 <label for="noPolicies">
                                 <input type="radio" name="policies_coverage" id="noPolicies" value="No"  />
                                 No</label>
                              </div>
                           </div>
                           <div class="col-md-12 my-2">
                              <label for="notCoveredDetails">Please provide details of what is not covered by your policies:</label>
                              <textarea name="not_covered_details" id="notCoveredDetails" class="form-control" rows="3"></textarea>
                           </div>
                           <div class="col-md-12 mt-3">
                              <label >Client Risk Category Percentage</label>
                              <div class="my-2 d-flex">
                                 <div class="col-md-4 me-2">
                                    <label for="highRisk">High %</label>
                                    <input type="number" name="high_risk" id="highRisk" class="form-control" />
                                 </div>
                                 <div class="col-md-4 me-2">
                                    <label for="standardRisk">Standard %</label>
                                    <input type="number" name="standard_risk" id="standardRisk" class="form-control" />
                                 </div>
                                 <div class="col-md-4">
                                    <label for="lowRisk">Low %</label>
                                    <input type="number" id="low_risk" class="form-control"  name="low_risk" />
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 my-2">
                              <label >Do you have a relationship with any sanctioned or sensitive jurisdictions?</label>
                              <div class="my-2">
                                 <input type="radio" name="sensitive_jurisdictions" id="yesJurisdictions" value="Yes"  />
                                 <label for="yesJurisdictions">Yes</label>
                                 <br>
                                 <input type="radio" name="sensitive_jurisdictions" id="noJurisdictions" value="No"  />
                                 <label for="noJurisdictions">No</label>
                              </div>
                           </div>
                           <div class="col-md-12 my-2">
                              <label >Do you accept clients classified as PEPs in any form?</label>
                              <div class="my-2">
                                 <input type="radio" name="accept_PEPs" id="yesPEPs" value="Yes"  />
                                 <label for="yesPEPs">Yes</label>
                                 <br>
                                 <input type="radio" name="accept_PEPs" id="noPEPs" value="No"  />
                                 <label for="noPEPs">No</label>
                              </div>
                           </div>
                           <div class="col-md-12 my-2">
                              <label>Is enhanced due diligence (EDD) requested for all high risk and/or PEP relationships?</label>
                              <div class="my-2">
                                 <input type="radio" name="enhanced_due_diligence" id="yesEDD" value="Yes" onclick="toggleRequired(true)" />
                                 <label for="yesEDD">Yes</label>
                                 <br>
                                 <input type="radio" name="enhanced_due_diligence" id="noEDD" value="No" onclick="toggleRequired(false)" />
                                 <label for="noEDD">No</label>
                              </div>
                           </div>
                           <div class="col-md-12 my-2">
                              <label>If yes, please provide details of what is collected:</label>
                              <textarea name="add_details_text" id="add_details_text" class="form-control" rows="3"></textarea>
                           </div>
                           <div class="col-md-12">
                              <label >Do you collect source of funds & wealth?</label>
                              <div class="my-2">
                                 <input type="radio" name="collect_source" id="yesSource" value="Yes"  />
                                 <label for="yesSource">Yes</label>
                                 <br>
                                 <input type="radio" name="collect_source" id="noSource" value="No"  />
                                 <label for="noSource">No</label>
                              </div>
                           </div>
                           <div class="col-md-12 my-5">
                              <label  for="reviewFrequency">How often are these policies revisited and reviewed?</label>
                              <input type="text" name="review_frequency" id="reviewFrequency" class="form-control" />
                           </div>
                           <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev" type="button">
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
                     <div id="non_standard_assets" class="content" style="display: none;">
                        <div class="content-header mb-6">
                           <h4 class="mb-0">Non Standard Assets</h4>
                        </div>
                        <div class="row g-2">
                           <p>If you are recommending or plan to recommend an investment into a non-mass market investment, restricted mass market investment or high risk investment please answer the following questions:</p>
                           <div class="col-md-12">
                              <label >Do you work with unregulated firms / websites for these type of investment?</label>
                              <div>
                                 <input type="radio" name="unregulated_firms" id="yesUnregulated" value="Yes"  />
                                 <label for="yesUnregulated">Yes</label>
                                 <br>
                                 <input type="radio" name="unregulated_firms" id="noUnregulated" value="No"  />
                                 <label for="noUnregulated">No</label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <label  for="firmsDetails">If yes, please provide details of the firms:</label>
                              <textarea name="firms_details" id="firms_details" class="form-control" rows="3"></textarea>
                           </div>
                           <div class="col-md-12">
                              <label  for="totalBusinessPercentage">What % of your total business is through unregulated firms?</label>
                              <input type="text" name="total_business_percentage" id="totalBusinessPercentage" class="form-control" />
                           </div>
                           <div class="col-md-12">
                              <label  for="investmentsIntroduced">What investments are introduced this way (please include name, type, geographical location and whether the local tax authority/regulator is investigating):</label>
                              <textarea name="investments_introduced" id="investmentsIntroduced" class="form-control" rows="3"></textarea>
                           </div>
                           <div class="col-md-12">
                              <label >Have you or will you meet the client face-to-face or over a video link?</label>
                              <div>
                                 <input type="radio" name="meet_client" id="yesMeetClient" value="Yes"  />
                                 <label for="yesMeetClient">Yes</label>
                                 <br>
                                 <input type="radio" name="meet_client" id="noMeetClient" value="No"  />
                                 <label for="noMeetClient">No</label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <label  for="businessConducted">If not, how has or will the business be conducted (i.e., through a 3rd party, over distance marketing, etc.)?</label>
                              <textarea name="business_conducted" id="businessConducted" class="form-control" rows="3"></textarea>
                           </div>
                           <div class="col-md-12">
                              <label >Will you only offer non-standard investments to knowledgeable investors which include high net wealth individuals, sophisticated investors or elective professional clients?</label>
                              <div>
                                 <input type="radio" name="knowledgeable_investors" id="yesKnowledgeable" value="Yes"  />
                                 <label for="yesKnowledgeable">Yes</label>
                                 <br>
                                 <input type="radio" name="knowledgeable_investors" id="noKnowledgeable" value="No"  />
                                 <label for="noKnowledgeable">No</label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <label  for="criteriaDetails">If yes, how will you ensure that the client fits the criteria?</label>
                              <textarea name="criteria_details" id="criteriaDetails" class="form-control" rows="3"></textarea>
                           </div>
                           <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev" type="button">
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
                     <div id="consumer_duty1" class="content" style="display: none;">
                        <h4 class="mb-4">Consumer Duty</h4>
                        <p>Has your firm satisfied itself that its products and services are well designed to meet the needs and objectives of consumers in your target market both now and in the future, and that they perform as expected?</p>
                        <div class="mb-3">
                           <input type="radio" name="products_design" id="yesProductsDesign" value="Yes"  />
                           <label for="yesProductsDesign">Yes</label>
                           <br>
                           <input type="radio" name="products_design" id="noProductsDesign" value="No"   />
                           <label for="noProductsDesign">No</label>
                        </div>
                        <p class="mt-5">If requested, can you demonstrate that your products and services are fair value for different groups of consumers and that the price charged correctly reflects the associated qualities and benefits?</p>
                        <div class="mb-3">
                           <input type="radio" name="fair_value" id="yesFairValue" value="Yes"  />
                           <label for="yesFairValue">Yes</label>
                           <br>
                           <input type="radio" name="fair_value" id="noFairValue" value="No" />
                           <label for="noFairValue">No</label>
                        </div>
                        <p class="mt-5">Has your firm ensured that all communications with your customers (including vulnerable) are clear, understandable, and sufficiently informative to enable your customers to achieve good outcomes?</p>
                        <div class="mb-3">
                           <input type="radio" name="clear_communications" id="yesClearCommunications" value="Yes"  />
                           <label for="yesClearCommunications">Yes</label>
                           <br>
                           <input type="radio" name="clear_communications" id="noClearCommunications" value="No"  />
                           <label for="noClearCommunications">No</label>
                        </div>
                        <p class="mt-5">Again, if requested, can you evidence that your firm gives appropriate attention to the ongoing needs of your customers and are you satisfied that the quality of post-sales support is as good as pre-sales support?</p>
                        <div class="mb-3">
                           <input type="radio" name="post_sales_support" id="yesPostSalesSupport" value="Yes"  />
                           <label for="yesPostSalesSupport">Yes</label>
                           <br>
                           <input type="radio" name="post_sales_support" id="noPostSalesSupport" value="No"  />
                           <label for="noPostSalesSupport">No</label>
                        </div>
                        <p class="mt-5">Can you evidence that your customers understand the products and services offered by your firm?</p>
                        <div class="mb-3">
                           <input type="radio" name="customer_understanding" id="yesCustomerUnderstanding" value="Yes"   />
                           <label for="yesCustomerUnderstanding">Yes</label>
                           <br>
                           <input type="radio" name="customer_understanding" id="noCustomerUnderstanding" value="No"    />
                           <label for="noCustomerUnderstanding">No</label>
                        </div>
                        <div class="col-md-12 mb-3">
                           <label class="my-3" for="appointed_text">Do you, your firm or network have agreements in place with any individuals linked to advisory firms that have caused harm in the marketplace, have been investigated, stuck off or had licences revoked in any jurisdiction?
                           If yes, please provide details
                           </label>
                           <textarea name="customer_had_licences" id="appointed_text" placeholder="..." rows="10" class="form-control" ></textarea>
                        </div>
                        <p class="mt-5">Do you have adequate controls and checks in place to identify these individuals?</p>
                        <div class="mb-3">
                           <input type="radio" name="adequate_controls" id="yesCustomerUnderstanding" value="Yes" required />
                           <label for="yesCustomerUnderstanding">Yes</label>
                           <br>
                           <input type="radio" name="adequate_controls" id="noCustomerUnderstanding" value="No" required />
                           <label for="noCustomerUnderstanding">No</label>
                        </div>
                        <div class="d-flex justify-content-between">
                           <button class="btn btn-label-secondary btn-prev" type="button">Previous</button>
                           <button type="button" class="btn btn-primary btn-next" onclick="scrollToTop()">
                           <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
                           <i class="ti ti-arrow-right ti-xs"></i>
                           </button>
                        </div>
                     </div>
                     <div id="consumer_duty2" class="content" style="display: none;">
                        <h4 class="mb-4">CDD Uploads</h4>
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-12 mb-3">
                                 <label  for="company_structure_chart">Company structure chart</label>
                                 <input type="file" name="company_structure_chart" id="company_structure_chart" class="form-control" />
                              </div>
                              <div class="col-md-12 mb-3">
                                 <label  for="company_register_shareholder">Register of directors and shareholders</label>
                                 <input type="file" name="company_register_shareholder" id="company_register_shareholder" class="form-control" />
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-12 mb-3">
                                 <label  for="company_authorised_signatory">Authorised signatory list</label>
                                 <input type="file" name="company_authorised_signatory" id="company_authorised_signatory" class="form-control" />
                              </div>
                              <div class="col-md-12 mb-3">
                                 <label  for="appointed_text">If you are an appointed representative of another firm, we also require the following:</label>
                                 <input type="text" name="appointed_text" id="appointed_text" placeholder="Contact email address for directors and shareholders over 25%" class="form-control" />
                              </div>
                              <div class="col-md-12 mb-3">
                                 <label  for="">Multiple File Uplode</label>
                                 <input type="file" multiple  name="adviser_multifiles[]" id="" class="form-control" />
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
                     <div id="agreement_section" class="content" style="display: none;">
                        <div class="content-header mb-6">
                           <h4 class="mb-0">Agreement</h4>
                           <p>Alltrust agrees that where appropriate instructions have been received from the scheme member(s) and until notification by the scheme member(s) to the contrary, any agreed fees to the above Financial Adviser will be paid electronically from the Scheme to the bank account detailed above. Initial fees will be paid once sufficient funds are available in the scheme member’s bank account and annual fees will be paid on or around the anniversary that the scheme member was admitted to the scheme. Unless VAT is payable, an invoice will not need to be received by us prior to the payment being made.</p>
                           <p>The following are parties to this agreement:</p>
                        </div>
                        <div class="row g-2">
                           <h5>Signed on behalf of Financial Adviser firm</h5>
                           <div class="row g-2">
                              <div class="col-md-12">
                                 <label  for="signatureAdviser">Signature <i class="ti ti-signature"></i></label>
                                 <br>
                                 <canvas id="signature_pad"></canvas>
                                 <br>
                                 <button type="button" class="btn btn-danger mx-2" id="clear">Clear</button>
                                 <button type="button" class="btn btn-primary mx-2" id="save1">Save</button>
                                 <input type="hidden" name="signature_adviser" id="signatureAdviser" class="form-control" />
                                 <br>
                                 <label for="signature_file" class="mt-5"> or Upload File for signature</label>
                                 <input type="file" name="signature_file" id="signature_file" class="form-control">
                              </div>
                              <div class="col-md-6">
                                 <label  for="managementFunction">Senior Management Function Held</label>
                                 <input type="text" name="management_function" id="managementFunction" class="form-control" />
                              </div>
                              <div class="col-md-6">
                                 <label  for="positionAdviser">Position</label>
                                 <input type="text" name="position_adviser" id="positionAdviser" class="form-control" />
                              </div>
                              <div class="col-md-6">
                                 <label  for="financialAdviserNumber">Financial Adviser Number</label>
                                 <input type="text" name="financial_adviser_number" id="financialAdviserNumber" class="form-control" />
                              </div>
                              <div class="col-md-6">
                                 <label >Date</label>
                                 <div class="d-flex">
                                    <input type="date" placeholder="Date" name="day" class="form-control me-2" />
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev" type="button">
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
                     <div id="billingLinksValidation1" class="content" style="display: none;">
                        <div class="content-header mb-6">
                           <h4 class="mb-0">Register Adviser</h4>
                        </div>
                        <div class="row g-2" id="adviserFormsContainer">
                           <div class="col-md-12 mb-3">
                              <label  for="adviserName">Adviser Name</label>
                              <input type="text" name="adviser[1][adviser_name]" class="form-control" >
                           </div>
                           <div class="col-md-12 mb-3">
                              <label  for="adviserFCAReference">Adviser FCA Reference</label>
                              <input type="text" name="adviser[1][adviser_fca_reference]" class="form-control" >
                           </div>
                           <div class="col-md-12 mb-3">
                              <label  for="adviserEmail">Adviser Email</label>
                              <input type="email" name="adviser[1][adviser_email]" class="form-control" >
                           </div>
                           <div class="col-md-12 mb-3">
                              <label>
                              <input type="checkbox" class="toggle-online-access" name="adviser[1][requires_online_access]" value="yes" >
                              Requires online access
                              </label>
                           </div>
                           <div class="col-md-12 mb-3">
                              <label  for="branch">Branch</label>
                              <input type="text" name="adviser[1][branch]" class="form-control" >
                           </div>
                           <div class="col-md-12 mb-3">
                              <label  for="address">Address</label>
                              <textarea name="adviser[1][address]" id="address"  class="form-control" rows="3"></textarea>
                           </div>
                           <div class="col-md-12 mb-3">
                              <label for="dob">Date of Birth</label>
                              <input type="date" id="dob" name="adviser[1][date_of_birth]" class="form-control">
                           </div>
                           <div class="col-md-12 mb-3">
                              <label>
                              <input type="checkbox" name="adviser[1][approved_for_transfer_db]" value="yes" >
                              Approved for transfer of DB
                              </label>
                           </div>
                           <div class="col-12 d-flex justify-content-between justify-content-between mb-2">
                              <button type="button" class="btn btn-danger btn-remove">Remove</button>
                           </div>
                        </div>
                        <div class="row mt-3">
                           <div class="col-md-12">
                              <button type="button" class="btn btn-primary btn-add-adviser">Add Adviser</button>
                           </div>
                           <div class="col-md-12 mt-5 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev" type="button">
                              <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                              <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button type="submit" class="btn btn-success btn-submit">
                              <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Submit</span>
                              <i class="ti ti-arrow-right ti-xs"></i>
                              </button>
                           </div>
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
       const addAdviserBtn = document.querySelector('.btn-add-adviser');
       const adviserFormsContainer = document.getElementById('adviserFormsContainer');
       let adviserCount = 1;
       addAdviserBtn.addEventListener('click', () => {
           adviserCount++;
           const newAdviserForm = document.createElement('div');
           newAdviserForm.classList.add('adviser-form');
           newAdviserForm.innerHTML = `
               <div class="row">
               <div class="col-md-12 mb-3">
                   <label  for="adviserName${adviserCount}">Adviser Name</label>
                   <input type="text" name="adviser[${adviserCount}][adviser_name]" class="form-control"   required>
               </div>
               <div class="col-md-12 mb-3">
                   <label  for="adviserFCAReference${adviserCount}">Adviser FCA Reference</label>
                   <input type="text" name="adviser[${adviserCount}][adviser_fca_reference]" class="form-control"   required>
               </div>
               <div class="col-md-12 mb-3">
                   <label  for="adviserEmail${adviserCount}">Adviser Email</label>
                   <input type="email" name="adviser[${adviserCount}][adviser_email]" class="form-control"   required>
               </div>
               <div class="col-md-12 mb-3">
                   <label>
                       <input type="checkbox" name="adviser[${adviserCount}][approved_for_transfer_db]" value="yes">
                       Approved for transfer of DB
                   </label>
               </div>
               <div class="col-md-12 mb-3">
                   <label  for="branch${adviserCount}">Branch</label>
                   <input type="text" name="adviser[${adviserCount}][branch]" class="form-control"   required>
               </div>
               <div class="col-md-12 mb-3">
                   <label for="dob${adviserCount}">Date of Birth</label>
                   <input type="date" id="dob${adviserCount}" name="adviser[${adviserCount}][date_of_birth]" class="form-control" required>
               </div>
               <div class="col-md-12 mb-3">
                   <label for="address${adviserCount}">Address</label>
                   <textarea name="adviser[${adviserCount}][address]" id="address${adviserCount}" class="form-control" rows="3"></textarea>
               </div>
               <div class="col-md-12 mb-3">
                   <label>
                       <input type="checkbox" class="toggle-online-access" name="adviser[${adviserCount}][requires_online_access]" value="yes">
                       Requires online access
                   </label>
               </div>
               <div class="col-12 d-flex justify-content-between">
                   <button type="button" class="btn btn-danger btn-remove">Remove</button>
               </div>
               </div>
               
           `;
           adviserFormsContainer.appendChild(newAdviserForm);
           newAdviserForm.querySelector('.btn-remove').addEventListener('click', () => {
               adviserFormsContainer.removeChild(newAdviserForm);
           });
       });
       adviserFormsContainer.addEventListener('click', (event) => {
           if (event.target.classList.contains('btn-remove')) {
               const adviserForm = event.target.closest('.adviser-form');
               adviserFormsContainer.removeChild(adviserForm);
           }
       });
   });
   document.addEventListener("DOMContentLoaded", function () {
   const submitButton = document.getElementById("submitForm");
   submitButton.addEventListener("click", function (e) {
       e.preventDefault();  
       document.querySelectorAll('.text-danger').forEach((el) => el.textContent = '');
       const formData = {
           user_name: document.getElementById("user_name").value,
           user_email: document.getElementById("user_email").value,
           role_member: document.getElementById("role_member").value,
       };
   });
   });
   document.addEventListener('DOMContentLoaded', function () {
       const nextBtns = document.querySelectorAll('.btn-next');
       const prevBtns = document.querySelectorAll('.btn-prev');
       const contents = document.querySelectorAll('.content');
       const alertContainer = document.querySelector('.alert-container');
       const requiredFields = [ 
       ];
       let currentStep = 0;
       function showAlert(message, type = 'danger') {
           const alertHTML = `
               <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                   ${message}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
           `;
           alertContainer.innerHTML = alertHTML;
           setTimeout(() => {
               const alert = alertContainer.querySelector('.alert');
               if (alert) {
                   alert.classList.remove('show');
                   setTimeout(() => alert.remove(), 200);
               }
           }, 6000);
       }
       function validateStep(step) {
   let isValid = true;
   const stepFields = contents[step].querySelectorAll('input[required], select[required], textarea[required]');
   stepFields.forEach(input => {
       if (input.type === 'radio') {
           const radioGroup = contents[step].querySelectorAll(`input[name="${input.name}"]`);
           const isChecked = Array.from(radioGroup).some(radio => radio.checked);
           if (!isChecked) {
               isValid = false;
               showAlert(`Please select an option for ${input.name.replace('_', ' ')}!`);
               return;  
           }
       } else if (!input.value.trim()) {
           isValid = false;
           showAlert(`${input.name.replace('_', ' ')} is required!`);
           input.focus();
           return;  
       }
   });
   return isValid;
   }
       nextBtns.forEach((btn) => {
           btn.addEventListener('click', () => {
               if (currentStep < contents.length - 1) {
                   if (validateStep(currentStep)) {
                       contents[currentStep].style.display = 'none';  
                       currentStep++; 
                       contents[currentStep].style.display = 'block'; 
                   }
               }
               toggleButtonState();
           });
       });
       prevBtns.forEach((btn) => {
           btn.addEventListener('click', () => {
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
       document.getElementById('myForm').addEventListener('submit', function (e) {
           let isValid = true;
           requiredFields.forEach(field => {
               const input = document.getElementById(field);
               if (input && !input.value.trim()) {
                   isValid = false;
                   showAlert(`${field.replace('_', ' ')} is required!`);
                   input.focus();
                   return; 
               }
           });
           if (!isValid) {
               e.preventDefault(); 
           }
       });
       contents.forEach((content, index) => {
           content.style.display = index === 0 ? 'block' : 'none';
       });
       toggleButtonState();
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
       nextButtons[currentStep].textContent = "Next";
       
   } else {
       nextButtons[currentStep].setAttribute("disabled", "true");
       nextButtons[currentStep].textContent = "Fill required fields first";
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
   let canvas1 = document.getElementById('signature_pad');
   let signaturePad1 = new SignaturePad(canvas1);
   
   document.getElementById('clear').addEventListener('click', function () {
       signaturePad1.clear();
       document.getElementById('signatureAdviser').value = "";
   });
   document.getElementById('save1').addEventListener('click', function () {
       saveSignature(signaturePad1, 'signatureAdviser');
       
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
<script>
   document.getElementById("agreeCheckbox").addEventListener("change", function() {
       if (this.checked) {
           document.getElementById("nextButton").click();
       }
   });
</script>
<script>
   document.addEventListener("DOMContentLoaded", function () {
   let appointedRepRadio = document.getElementById("appointed_representative");
   let directlyAuthRadio = document.getElementById("directly_Authorised");
   let principalCompanyName = document.getElementById("principal_company_name");
   let theirFrn = document.getElementById("their_frn");
   function toggleRequiredFields() {
       if (appointedRepRadio.checked) {
           principalCompanyName.setAttribute("required", "required");
           theirFrn.setAttribute("required", "required");
       } else {
           principalCompanyName.removeAttribute("required");
           theirFrn.removeAttribute("required");
       }
       validateForm();
   }
   
   appointedRepRadio.addEventListener("change", toggleRequiredFields);
   directlyAuthRadio.addEventListener("change", toggleRequiredFields);
   const nextButtons = document.querySelectorAll(".btn-next");
   
   function validateForm() {
       const formSections = document.querySelectorAll(".content");
       const currentSection = document.querySelector(".content.active");
       const inputs = currentSection.querySelectorAll("input[required], select[required], textarea[required]");
       let allFilled = true;
   
       inputs.forEach(input => {
           let errorSpan = input.nextElementSibling;
           if (!errorSpan || !errorSpan.classList.contains("error-message")) {
               errorSpan = document.createElement("span");
               errorSpan.classList.add("error-message");
               input.parentNode.appendChild(errorSpan);
           }
   
           if (!input.value.trim()) {
               allFilled = false;
               input.classList.add("error");
           } else {
               input.classList.remove("error");
               errorSpan.textContent = "";
           }
       });
       nextButtons.forEach(button => {
           if (currentSection.contains(button)) {
               button.disabled = !allFilled;
               button.style.opacity = allFilled ? "1" : "0.5";
           }
       });
   
       return allFilled;
   }
   nextButtons.forEach(button => {
       button.disabled = true;
       button.style.opacity = "0.5";
   
       button.addEventListener("click", function (event) {
           if (!validateForm()) {
               event.preventDefault();
           }
       });
   });

   document.querySelectorAll("input, select, textarea").forEach(input => {
       input.addEventListener("input", validateForm);
   });
   });
</script>
<script>
   document.addEventListener("DOMContentLoaded", function () {
       const form = document.getElementById("multiStepsForm");
       const draftBtn = document.querySelector(".btn-draft");
       const submitBtn = document.querySelector(".btn-submit");
   
       draftBtn.addEventListener("click", function (event) {
           event.preventDefault();
           form.action = "{{ route('draft-store') }}";
           form.submit();
       });
   
       submitBtn.addEventListener("click", function (event) {
           event.preventDefault();
           form.action = "{{ route('onshoreCreate-store') }}";
           form.submit();
       });
   });
</script>
@endsection