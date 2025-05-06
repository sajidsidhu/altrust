<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MarketManagementController extends Controller
{
    /**
     * Show the form for sending emails.
     */
    public function mailIndex() {
        $roles = [
            'advisor',
            'oasis_sipp',
            'sipp_property',
            'full_sipp_property',
            'fpt'
        ];
        $users = User::whereIn('role', $roles)->get();
        return view('dashboard.mail.index', compact('users'));
    }
}
