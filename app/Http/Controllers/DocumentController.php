<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Member;
use App\Models\Log;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    
    public function index($id) {
        $memberDetailsView = Member::find($id);
        $documents = Document::all();
        return view('dashboard.member.memberDetailsView', compact('memberDetailsView', 'documents'));
    }

    public function store(Request $request) {
        $path = $request->file('file')->store('documents', 'public');
        
        $document = Document::create([
            'file_path' => $path,
            'reference' => $request->reference,
            'status' => $request->status,
            'member_id' => $request->input('member_id'),
        ]);
    
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . ' saved the documents';
        $log->save();
        return redirect()->back()->with('success', 'Document created successfully.');
    }
    
    public function update(Request $request){
        $document = Document::findOrFail($request->document_id);
        $document->reference = $request->reference;
        $document->status = $request->status;

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('documents');
            $document->file_path = $path;
        }else{
            $document->file_path = $request->old_path;
        }
        $document->save();
        
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . ' updated the documents';
        $log->save();
        return redirect()->back()->with('success', 'Document updated successfully.');
    }

    public function destroy($id) {
        $document = Document::findOrFail($id);
        $document->delete();
        
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->text = auth()->user()->name . ' deleted the documents';
        $log->save();
        return redirect()->back()->with('success', 'Document deleted successfully.');
    }
}