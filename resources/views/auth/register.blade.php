<!doctype html>

<html
    lang="en"
    class="light-style layout-wide customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="public/assets/"
    data-template="vertical-menu-template"
    data-style="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Register Alltrust</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="public/assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
    <link rel="stylesheet" href="public/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="public/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="public/assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="public/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="public/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="public/assets/css/demo.css" />
    <link rel="stylesheet" href="public/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="public/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="public/assets/vendor/libs/@form-validation/form-validation.css" />
    <link rel="stylesheet" href="public/assets/vendor/css/pages/page-auth.css" />
    <script src="public/assets/vendor/js/helpers.js"></script>
    <script src="public/assets/vendor/js/template-customizer.js"></script>
    <script src="public/assets/js/config.js"></script>
    <style>
        .app-brand-logo.demo {
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: center;
            justify-content: center;
            display: -ms-flexbox;
            display: flex;
            width: 200px;
            height: 68px;
        }
        .form-control:focus {
            color: #fff;
        }
        .form-control {
            color: #fff;
        }
             .btn-primary{
            color: white !important;
            background-color: #086898 !important;
            border-color: #086898 !important;
        } 
        .btn-primary:hover{
            color: white !important;
            background-color: #086898 !important;
            border-color: #086898 !important;
        }
        .fa-eye::before {
            color: #fff;
            margin: 10px;
        }
        .fa-eye-slash::before {
            color: #fff;
            margin: 10px;
        }
        
    </style>
</head>
<body>
<!-- Content -->

{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}



<div class="authentication-wrapper authentication-cover">
    <!-- Logo -->
    <a href="index.html" class="app-brand auth-cover-brand">
        <span class="app-brand-logo demo">
            <span class="app-brand-logo demo">
           <img src="{{url('public/assets/lightlogo.svg')}}" alt="Taxi-Link Logo" width="100%" height="115px"/>
        </span>
        </span>
    </a>
    <div class="authentication-inner row m-0">
        <div class="d-none d-lg-flex col-lg-8 p-0"  style="background: #335a7b;">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img src="../../assets/img/illustrations/auth-register-illustration-light.png" alt="auth-register-cover" class="my-5 auth-illustration" data-app-light-img="illustrations/auth-register-illustration-light.png" data-app-dark-img="illustrations/auth-register-illustration-dark.png" />

                <img src="../../assets/img/illustrations/bg-shape-image-light.png" alt="auth-register-cover" class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png" data-app-dark-img="illustrations/bg-shape-image-dark.png" />
            </div>
        </div>
        <div class="d-flex col-12 col-lg-4 align-items-center authentication-bg p-sm-12 p-6" style="background: #000;">
            <div class="w-px-400 mx-auto mt-12 pt-5">
                <h4 class="mb-1" style="color: #fff;">Welcome to Alltrust! 👋</h4>
                <p class="mb-6" style="color: #fff;">Please complete the below details to start the Alltrust Terms of Business application.</p>
                <form id="formAuthentication" class="mb-6" action="{{ route('register') }}" method="POST">
                @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label " style="color: #fff;">{{ __('Name') }}</label>
                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="firm_name" class="col-md-4 col-form-label " style="color: #fff;">{{ __('Firm Name') }}</label>
                        <div class="col-md-12">
                            <input id="firm_name" type="text" class="form-control @error('firm_name') is-invalid @enderror" name="firm_name" value="{{ old('firm_name') }}" required autocomplete="name" autofocus>
                            @error('firm_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label " style="color: #fff;">{{ __('Email Address') }}</label>
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 mb-0 col-form-label" style="color: #fff;">{{ __('Password') }}</label>
                        <small style="color: #ccc;">Password must be at least 8 characters long and include one uppercase letter, one lowercase letter, one number, and one special character (@, $, !, %, *, ?, &).</small>
                        <div class="col-md-12 position-relative">
                            <input id="password" type="password" class="form-control mt-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <i id="togglePassword" class="fas fa-eye position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;"></i>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6 mt-8">
                        <div class="form-check mb-8 ms-2">
                            <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required />
                            <label class="form-check-label" for="terms-conditions" style="color: #fff;">
                                I agree to
                                <a href="javascript:void(0);" style="color: #fff;">privacy policy & terms</a>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-grid w-100">
                        Register your new account?
                    </button>
                </form>
                <p class="text-center">
                    <span style="color: #fff;">Already have an account?</span>
                    <a href="{{ route('login')}} ">
                        <span style="color: #fff;">Login</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

<script src="public/assets/vendor/libs/jquery/jquery.js"></script>
<script src="public/assets/vendor/libs/popper/popper.js"></script>
<script src="public/assets/vendor/js/bootstrap.js"></script>
<script src="public/assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="public/assets/vendor/libs/hammer/hammer.js"></script>
<script src="public/assets/vendor/libs/i18n/i18n.js"></script>
<script src="public/assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="public/assets/vendor/js/menu.js"></script>
<script src="public/assets/js/main.js"></script>
<script src="public/assets/js/pages-auth.js"></script>
<script>
document.getElementById("terms-conditions").addEventListener("change", function() {
    if (this.checked) {
        window.open("https://alltrust.co.uk/wp-content/uploads/2025/03/Terms-of-Use-LS-07.03.2025.pdf", "_blank");
    }
});
</script>
<script>
    document.getElementById('togglePassword').addEventListener('click', function (e) {
        const passwordField = document.getElementById('password');
        const type = passwordField.type === 'password' ? 'text' : 'password';
        passwordField.type = type;

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>
</body>
</html>