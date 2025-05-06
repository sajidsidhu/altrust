<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Email Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            max-width: 450px;
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .text-highlight {
            color: #6e8efb;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="mb-4">
            <img src="https://cdn-icons-png.flaticon.com/512/5610/5610944.png" width="80" alt="Email Icon">
        </div>
        <h2 class="text-dark fw-bold">Verify Your Email Address</h2>
        <p class="mt-3 text-secondary">
            Thank you for signing up! To access your account, please check your inbox and click the 
            <span class="text-highlight">verification link</span>.
        </p>
        <p class="text-muted">If you don’t see the email, check your spam or junk folder.</p>
        <div class="d-grid px-2 pt-2 pb-1" style="text-align: center; justify-content: center; align-items: center;">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <button class="btn btn-danger d-flex my-2" type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <small class="align-middle">Logout</small>
            <i class="ti ti-logout ms-2 ti-14px"></i>
            </button>
        </div>
    </div>
</body>
</html>
