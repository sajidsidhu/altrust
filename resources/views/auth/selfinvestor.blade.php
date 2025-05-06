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
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Self Investor</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="public/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="public/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="public/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="public/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="public/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="public/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="public/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="public/assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="public/assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="public/assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="public/assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="public/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="public/assets/vendor/js/template-customizer.js"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="public/assets/js/config.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        body {
            color: #fff;
        }
    </style>
</head>
<body>
<!-- Content -->

<div class="authentication-wrapper authentication-cover">
    <!-- Logo -->
    <a  class="app-brand auth-cover-brand">
        <span class="app-brand-logo demo">
           <img src="{{url('public/assets/lightlogo.svg')}}" alt="Taxi-Link Logo" width="100%" height="115px"/>
        </span>
{{--        <span class="app-brand-text demo text-heading fw-bold">Vuexy</span>--}}
    </a>
    <!-- /Logo -->
    <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-8 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img
                    src="../../assets/img/illustrations/auth-login-illustration-light.png"
                    alt="auth-login-cover"
                    class="my-5 auth-illustration"
                    data-app-light-img="illustrations/auth-login-illustration-light.png"
                    data-app-dark-img="illustrations/auth-login-illustration-dark.png" />

                <img
                    src="../../assets/img/illustrations/bg-shape-image-light.png"
                    alt="auth-login-cover"
                    class="platform-bg"
                    data-app-light-img="illustrations/bg-shape-image-light.png"
                    data-app-dark-img="illustrations/bg-shape-image-dark.png" />
            </div>
        </div>
        <!-- /Left Text -->
        <!-- Login -->
        <div class="d-flex col-12 col-lg-4 align-items-center authentication-bg p-sm-12 p-6" style="background: #000;">
    <div class="w-px-400 mx-auto mt-12 pt-5">
        <h4 class="mb-10" style="color: #fff; font-size: 25px;">Welcome to Alltrust! 👋</h4>
        <div class="text-center">
            <div id="step2" class="fade-in">
                <p class="text-lg">Are you a Knowledgeable or an Opted-up Investor?</p>
                <button class="mt-4 bg-blue-500 px-6 py-2 rounded-lg text-white font-medium shadow-md hover:bg-blue-600 transition-all" onclick="nextStep(3)">Yes</button>
                <button class="mt-4 bg-red-500 px-6 py-2 rounded-lg text-white font-medium shadow-md hover:bg-red-600 transition-all" onclick="nextStep(9)">No</button>
            </div>
            <div id="step3" class="hidden fade-in">
                <p class="text-lg">Will you be investing in unquoted shares?</p>
                <button class="mt-4 bg-blue-500 px-6 py-2 rounded-lg text-white font-medium shadow-md hover:bg-blue-600 transition-all" onclick="nextStep(4)">Yes</button>
                <button class="mt-4 bg-green-500 px-6 py-2 rounded-lg text-white font-medium shadow-md hover:bg-green-600 transition-all" onclick="nextStep(5)">No</button>
            </div>
            <div id="step4" class="hidden fade-in">
                <p class="text-lg">Please complete the Unquoted Shares Form and the Knowledgeable Investor Form and submit them.</p>
                <p class="text-sm text-gray-300">Submit to: investmentcontrols@alltrust.co.uk, CC: newbusiness@alltrust.co.uk</p>
                <a href="#" target="_blank" class="block mt-4 text-blue-300 underline">📄 Download Unquoted Shares Form</a>
                <p class="text-sm text-gray-300 mt-4">Submit to: compliance@alltrust.co.uk, CC: newbusiness@alltrust.co.uk</p>
                <a href="#" target="_blank" class="block mt-4 text-blue-300 underline">📄 Download Knowledgeable Investor Form</a>
                <button class="mt-4 bg-yellow-500 px-6 py-2 rounded-lg text-white font-medium shadow-md hover:bg-yellow-600 transition-all" onclick="nextStep(7)">Done</button>
            </div>
            <div id="step5" class="hidden fade-in">
                <p class="text-lg">Please complete the Knowledgeable Investor Form and submit it.</p>
                <p class="text-sm text-gray-300">Submit to: compliance@alltrust.co.uk, CC: newbusiness@alltrust.co.uk</p>
                <a href="#" target="_blank" class="block mt-4 text-blue-300 underline">📄 Download Knowledgeable Investor Form</a>
                <button class="mt-4 bg-yellow-500 px-6 py-2 rounded-lg text-white font-medium shadow-md hover:bg-yellow-600 transition-all" onclick="nextStep(7)">Done</button>
            </div>
            <div id="step7" class="hidden fade-in">
                <p class="text-xl font-semibold">Thank you 🎉</p>
                <a href="{{ route('login') }}" class="mt-4 bg-blue-500 px-6 py-2 rounded-lg text-white font-medium shadow-md hover:bg-blue-600 transition-all inline-block">Return to Alltrust</a>
            </div>
            <div id="step9" class="hidden fade-in">
                <p class="text-lg">Please ask your adviser to submit your application.</p>
                <a href="{{ route('login') }}" class="mt-4 bg-blue-500 px-6 py-2 rounded-lg text-white font-medium shadow-md hover:bg-blue-600 transition-all inline-block">Return to Alltrust</a>
            </div>
        </div>
        <script>
            function nextStep(step) {
                document.querySelectorAll(".fade-in").forEach((div) => div.classList.add("hidden"));
                document.getElementById(`step${step}`).classList.remove("hidden");
            }
        </script>
    </div>
</div>

        <!-- /Login -->
    </div>
</div>
<!-- / Content -->
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="public/assets/vendor/libs/jquery/jquery.js"></script>
<script src="public/assets/vendor/libs/popper/popper.js"></script>
<script src="public/assets/vendor/js/bootstrap.js"></script>
<script src="public/assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="public/assets/vendor/libs/hammer/hammer.js"></script>
<script src="public/assets/vendor/libs/i18n/i18n.js"></script>
<script src="public/assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="public/assets/vendor/js/menu.js"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<script src="public/assets/vendor/libs/@form-validation/popular.js"></script>
<script src="public/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
<script src="public/assets/vendor/libs/@form-validation/auto-focus.js"></script>
<!-- Main JS -->
<script src="public/assets/js/main.js"></script>
<!-- Page JS -->
<script src="public/assets/js/pages-auth.js"></script>
</body>
</html>