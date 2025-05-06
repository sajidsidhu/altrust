<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\VerificationCodeMail;
use App\Mail\SimpleMail;

class RegisterController extends Controller {
    
    use RegistersUsers;
    protected $redirectTo = '/home';   
    public function __construct() {
        $this->middleware('guest');
    }
    
    protected function validator(array $data) {
        
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8', // Minimum 8 characters
                'regex:/[A-Z]/', // At least one uppercase letter
                'regex:/[a-z]/', // At least one lowercase letter
                'regex:/[0-9]/', // At least one number
                'regex:/[@$!%*?&]/', // At least one special character
            ],
        ]);
    }
    protected function create(array $data) {
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'adviser_check' => 'adviser_check',
            'offshore_check' => 'offshore_check',
            'tickets_check' => 'tickets_check',
            'support_check' => 'support_check',
            'faq_check' => 'faq_check',
            'password' => Hash::make($data['password']),
        ]);

       
        return $user;
    }
}