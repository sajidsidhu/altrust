<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Support\Facades\Mail;
use App\Mail\SimpleMail;
use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\User;

class SupportController extends Controller
{
    public function index() {
        
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'it_admin'){
            $supports = Support::all();
        }else{
            $supports = Support::where('user_id',auth()->user()->id)->get();
        }
        
        return view('dashboard.support.index', compact('supports'));
    }

    public function store(Request $request) {
        
        $supports = new Support();
        $supports->title = $request->title;
        $supports->user_id = auth()->user()->id;
        $supports->category = $request->category;
        $supports->details = $request->details;
        $supports->support_reply = $request->support_reply;
        $supports->save();
        
        $username = 'Alltrust Business Team';
        $userEmail = 'testnewbiz@ilcorpdev.com';
        $title = auth()->user()->name;
        
        $messageContent = "
            <div style='font-family: Arial, sans-serif; line-height: 1.6; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px;'>
                <h2 style='color: #333;'>Support Request Submitted</h2>
                <p>Dear {$title},</p>
                <p>Thank you for reaching out to our support team. We have received your support request regarding <strong>{$supports->title}</strong>.</p>
                <p>Our team is reviewing your request and will get back to you as soon as possible.</p>
                <p>If you have any further questions, feel free to reply to this email.</p>
                <p>Best regards,<br>The Alltrust Support Team</p>
            </div>
        ";
        
        Mail::to($userEmail)->send(new SimpleMail($messageContent));
        
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . ' saved the support ticket';
        $log->save();
        
        return redirect()->back()->with('success', 'Thanks for contacting us, one of the team will be in contact with you shortly.');
    }

    public function update(Request $request, $id) {
        
        $support = Support::findOrFail($id);
        $support->update($request->all());
        
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . ' updated the support ticket';
        $log->save();
        
        return redirect()->back()->with('success', 'Thank you for contacting us , one of the team will be in contact with you shortly');
    }

    public function delete($id) {
        
        $support = Support::findOrFail($id);
        $support->delete();
        
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . ' deleted the support ticket';
        $log->save();

        return redirect()->back()->with('success', 'Support Deleted Successfully...');
    }
    
    public function supportStatus($id, $status) {
        
        $support = Support::find($id);
        if (!$support) {
            return redirect()->back()->with('error', 'Ticket not found.');
        }
        if (!$support->status) {
            $support->status = 'Pending';
        }
        $allowedStatuses = ['Open', 'Pending', 'Closed'];
        if (!in_array($status, $allowedStatuses)) {
            return redirect()->back()->with('error', 'Invalid status.');
        }
        $support->status = $status;
        $support->save();
        
        return redirect()->back()->with('success', 'Ticket status updated successfully.');
    }

    public function replyStore(Request $request) {
        
        $id = $request->id;
        $support = Support::find($id);
        $support->support_reply = $request->reply;
        $support->save();
        return redirect()->back()->with('success', 'Ticket reply added successfully.');
    }
}