@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control editPassword @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Leave empty to keep current password">
                                <div class="editPasswordError" style="color: red; margin-top: 5px;"></div>
                        
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control editPassword" name="password_confirmation" required autocomplete="new-password" placeholder="Leave empty to keep current password">
                                <div class="editPasswordError" style="color: red; margin-top: 5px;"></div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
