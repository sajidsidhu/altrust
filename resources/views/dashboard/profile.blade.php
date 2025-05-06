@extends('dashboard.dashboard')
@section('content')
@php
$user = \App\Models\User::find(auth()->id());
@endphp
<div class="content-wrapper">
   <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
         <div class="col-12">
            <div class="card mb-6">
               <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-5">
                  <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                     <img src="public/assets/profileimage.png" alt="user image" class="d-block h-auto ms-0 ms-sm-6 rounded user-profile-img" style="width: 100px;"/>
                  </div>
                  <div class="flex-grow-1 mt-3 mt-lg-5">
                     <div
                        class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                           <h4 class="mb-2 mt-lg-6">{{$user->name}}</h4>
                           <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 my-2">
                              <li class="list-inline-item d-flex gap-2 align-items-center">
                                 <i class="ti ti-palette ti-lg"></i>
                                 <span class="fw-medium">{{$user->role}}</span>
                              </li>
                              <li class="list-inline-item d-flex gap-2 align-items-center">
                                 <i class="ti ti-calendar ti-lg"></i>
                                 <span class="fw-medium">{{$user->created_at}}</span>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-xl-12 col-lg-5 col-md-5">
      <div class="card mb-6">
         <div class="card-body position-relative">
            <button class="btn btn-sm position-absolute top-0 end-0 m-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
            <i class="ti ti-edit ti-lg"></i>
            </button>
            <small style="font-size: 20px;" class="card-text text-uppercase text-muted small">About</small>
            <ul class="list-unstyled my-3 py-1">
               <li class="d-flex align-items-center mb-4">
                  <i class="ti ti-user ti-lg"></i><span style="font-size: 18px;" class="fw-medium mx-2">Full Name:</span>
                  <span>{{$user->name}}</span>
               </li>
               <li class="d-flex align-items-center mb-4">
                  <i class="ti ti-mail ti-lg"></i><span style="font-size: 18px;" class="fw-medium mx-2">Email:</span>
                  <span>{{$user->email}}</span>
               </li>
               <li class="d-flex align-items-center mb-4">
                  <i class="ti ti-crown ti-lg"></i><span style="font-size: 18px;" class="fw-medium mx-2">Role:</span>
                  <span class="fw-medium">{{$user->role}}</span>
               </li>
               <li class="d-flex align-items-center mb-4">
                  <i class="ti ti-crown ti-lg"></i><span style="font-size: 18px;" class="fw-medium mx-2">Notification:</span>
                  <span class="fw-medium">{{$user->email_notification}}</span>
               </li>
               <li class="d-flex align-items-center mb-4">
                  <i class="ti ti-crown ti-lg"></i><span style="font-size: 18px;" class="fw-medium mx-2">Firm Name:</span>
                  <span class="fw-medium">{{$user->firm_name}}</span>
               </li>
               <li class="d-flex align-items-center mb-4">
                  <i class="ti ti-crown ti-lg"></i><span style="font-size: 18px;" class="fw-medium mx-2">Date of Birth:</span>
                  <span class="fw-medium">{{ \Carbon\Carbon::parse($user->dob)->format('d-m-Y') }}</span>
               </li>
               <li class="d-flex align-items-center mb-4">
                  <i class="ti ti-crown ti-lg"></i><span style="font-size: 18px;" class="fw-medium mx-2">Nationality:</span>
                  <span class="fw-medium">{{$user->nationality}}</span>
               </li>
               <li class="d-flex align-items-center mb-4">
                  <i class="ti ti-crown ti-lg"></i><span style="font-size: 18px;" class="fw-medium mx-2">Country Residency:</span>
                  <span class="fw-medium">{{$user->country_residency}}</span>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="{{ route('update-profile', ['id' => $user->id]) }}" method="POST">
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
                  <div class="col">
                     <label for="dob" class="form-label">Date of Birth</label>
                     <input type="date" name="dob" id="dob" class="form-control" value="{{$user->dob}}" />
                  </div>
                  <div class="col">
                     <label for="dob" class="form-label">Nationality</label>
                     <select name="nationality" id="dob" class="form-control">
                        <option value="" disabled {{ empty(old('country', $user->nationality ?? '')) ? 'selected' : '' }}>Select Country</option>
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
                        <option value="" disabled {{ empty(old('country', $user->nationality ?? '')) ? 'selected' : '' }}>Select Country</option>
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
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update Details</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
</div>
<div class="content-backdrop fade"></div>
</div>
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