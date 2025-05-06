<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;  
use App\Models\Comment;  
use App\Models\User; 

class CommentController extends Controller
{
    public function index(Request $request) {
        
        $comment_user_id = $request->id;
        $comments = Comment::where('comment_user_id', $comment_user_id)->get();
        return view('dashboard.comments.comment', compact('comments', 'comment_user_id'));
    }

    public function store(Request $request) {
        
        $sender_id = auth()->id();
        Comment::create([
            'comment_user_id' => $request->comment_user_id,
            'sender_id' => $sender_id,
            'comment' => $request->comment,
        ]);
        
        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function update(Request $request, $id) {
        
        $comment = Comment::findOrFail($id);
        $comment->update([
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comment updated successfully.');
    }
    
    public function delete($id) {
        
        $comment = Comment::findOrFail($id); 
        if (auth()->id() !== $comment->sender_id) {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}