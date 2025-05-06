<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Log;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::latest()->get();
        return view('dashboard.messages.index', compact('messages'));
    }
    
    public function logs() {
        $logs = Log::all();
        return view('dashboard.messages.log',compact('logs'));
    }

    public function show() {
        $userRole = auth()->user()->role;
        if ($userRole === 'admin') {
            $notifications = Message::latest()->get();
        } else {
            $notifications = Message::whereRaw("FIND_IN_SET(?, role)", [$userRole])->latest()->get();
        }
        return view('dashboard.messages.show', compact('notifications'));
    }

    public function store(Request $request)
{
    $request->validate([
        'message' => 'required',
        'roles' => 'required|array',
    ]);

    $rolesString = implode(', ', $request->roles);

    Message::create([
        'sender_id' => auth()->user()->id,
        'role' => $rolesString,
        'message' => $request->message,
        'status' => 'unseen'
    ]);

    $log = new Log;
    $log->user_id = auth()->user()->id;
    $log->text = auth()->user()->name . ' sent the notification';
    $log->save();

    return redirect()->back()->with('success', 'Message added successfully!');
}


    public function update(Request $request, $id) {
        $message = Message::findOrFail($id);
        $rolesString = implode(',', $request->roles);
        $message->update([
            'message' => $request->message,
            'role' => $rolesString,
        ]);
        return redirect()->back()->with('success', 'Message updated successfully!');
    }

    public function destroy($id) {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Message deleted successfully!');
    }

    public function notifications() {
        $messages = Message::latest()->take(5)->get();
        $messageCount = Message::count();
        return view('dashboard.notifications', compact('messages', 'messageCount'));
    }
    
    public function statuschange($id, $status) {
        $offmember = Message::find($id);
        if (!$offmember) {
            return redirect()->back()->with('error', 'Member not found.');
        }
        if (!in_array($status, ['seen', 'unseen'])) {
            return redirect()->back()->with('error', 'Invalid status.');
        }
        $offmember->status = $status;
        $offmember->save();
        
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . " changed message status to $status.";
        $log->save();
    
        return redirect()->back()->with('success', 'Message status updated.');
    }

}