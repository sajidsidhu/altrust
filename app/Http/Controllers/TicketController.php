<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tickets;
use Illuminate\Support\Facades\Mail;
use App\Mail\SimpleMail;
use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\User;

class TicketController extends Controller
{
    public function index() {
        
        if(auth()->user()->role=='admin'){
            $tickets = Tickets::all();
        }else{
            $tickets = Tickets::where('user_id',auth()->user()->id)->get();
        }
        
        return view('dashboard.tickets.index', compact('tickets'));
    }

    public function store(Request $request) {
        
        $tickets = new Tickets();
        $tickets->title = $request->title;
        $tickets->user_id = auth()->user()->id;
        $tickets->category = $request->category;
        $tickets->details = $request->details;
        $tickets->save();
        
        $username = 'Alltrust Business Team';
        $userEmail = 'us921708@gmail.com';
        $title = auth()->user()->name;
        
        $messageContent = "
            <div style='font-family: Arial, sans-serif; line-height: 1.6; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px;'>
                <h2 style='color: #333;'>Support Ticket Submitted</h2>
                <p>Dear {$title},</p>
                <p>Thank you for submitting your support ticket. Your request regarding <strong>{$tickets->title}</strong> has been received.</p>
                <p>Our support team is currently reviewing your request and will get back to you as soon as possible.</p>
                <p>If you have any further questions, feel free to reply to this email.</p>
                <p>Best regards,<br>The Alltrust Support Team</p>
            </div>
        ";
        
        Mail::to($userEmail)->send(new SimpleMail($messageContent));
        
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . ' saved the support ticket';
        $log->save();

        return redirect()->back()->with('success', 'Ticket Added Successfully...');
    }

    public function update(Request $request, $id) {
        
        $ticket = Tickets::findOrFail($id);
        $ticket->title = $request->title;
        $ticket->category = $request->category;
        $ticket->details = $request->details;
        $ticket->save();
        
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . ' updated the support ticket';
        $log->save();
        
        return redirect()->back()->with('success', 'Ticket Updated Successfully...');
    }

    public function delete($id) {
        
        $ticket = Tickets::findOrFail($id);
        $ticket->delete();
        
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . ' deleted the support ticket';
        $log->save();
        
        return redirect()->back()->with('success', 'Ticket Deleted Successfully...');
    }
    
    public function ticketStatus($id, $status) {
        
        $ticket = Tickets::find($id);
        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket not found.');
        }
        if (!$ticket->status) {
            $ticket->status = 'Pending';
        }
        $allowedStatuses = ['Open', 'Pending', 'Closed'];
        if (!in_array($status, $allowedStatuses)) {
            return redirect()->back()->with('error', 'Invalid status.');
        }
        $ticket->status = $status;
        $ticket->save();
        
        return redirect()->back()->with('success', 'Ticket status updated successfully.');
    }
    
    public function replyStore(Request $request){
        $id = $request->id;
        $ticket = Tickets::find($id);
        $ticket->ticket_reply = $request->reply;
        $ticket->save();
        
        return redirect()->back()->with('success', 'Ticket reply added successfully.');
    }
}