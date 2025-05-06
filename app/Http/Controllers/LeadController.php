<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index() {
        
        $leads = Lead::all();
        return view('dashboard.leads.index', compact('leads'));
    }

    public function store(Request $request) {
        
        $lead = new Lead();
        $lead->company_name = $request->company_name;
        $lead->trading_name = $request->trading_name;
        $lead->address = $request->address;
        $lead->country = $request->country;
        $lead->post_code = $request->post_code;
        $lead->share_holder_details = $request->share_holder_details;
        $lead->regulated_adviser = $request->regulated_adviser;
        $lead->contact_email = $request->contact_email;
        $lead->website = $request->website;
        $lead->telephone = $request->telephone;
        $lead->fca_firms_reference = $request->fca_firms_reference;
        $lead->directly_authorised_checked = $request->directly_authorised_checked;
        $lead->principal_company_name = $request->principal_comapny_name;
        $lead->their_frn = $request->their_frn;
        $lead->advice = $request->advice;
        $lead->provide_countries = $request->provide_countries;
        $lead->hear_about_us = $request->hear_about_us;
        $lead->word_of_referrals_checked = $request->word_of_referrals_checked;
        $lead->lead_generation_checked = $request->lead_generation_checked;
        $lead->marketing_checked = $request->marketing_checked;
        $lead->other_specify_checked = $request->other_specify_checked;
        $lead->restrictions_yes_permission = $request->restrictions_yes_permission;
        $lead->restrictions_yes_permission_answer = $request->restrictions_yes_permission_answer;
        $lead->sanctions = $request->sanctions;
        $lead->sanctions_yes_answer = $request->sanctions_yes_answer;
        $lead->connection_connection = $request->connection_connection;
        $lead->connection_connection_yes_answer = $request->connection_connection_yes_answer;
        $lead->professional_indemnity_insurance = $request->professional_indemnity_insurance;
        $lead->policy_excess_DB = $request->policy_excess_DB;
        $lead->separate_cyber_security = $request->separate_cyber_security;
        $lead->permissions_for_advising = $request->permissions_for_advising;
        $lead->save();
        
        return redirect()->back()->with('success', 'Advisor details saved successfully!');
    }
    public function update(Request $request, $id) {
        
        $advisor = Lead::findOrFail($id);
        $advisor->update($validated);
        return redirect()->back()->with('success', 'Leads updated successfully.');
    }
    
    public function destroy($id) {
        
        $advisor = Lead::findOrFail($id);
        $advisor->delete();
        return redirect()->back()->with('success', 'Leads deleted successfully.');
    }
}