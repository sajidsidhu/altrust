<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index() {
        $faqs = Faq::all();
        return view('dashboard.faq.index', compact('faqs'));
    }
    
    public function indexView() {
        $faqs = Faq::all();
        return view('dashboard.faq.view', compact('faqs'));
    }

    public function store(Request $request) {
        
        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect()->back()->with('success', 'FAQ Added Successfully...');
    }

    public function update(Request $request, $id) {
        
        $faq = Faq::findOrFail($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect()->back()->with('success', 'FAQ Updated Successfully...');
    }

    public function destroy($id) {
        
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->back()->with('success', 'FAQ Deleted Successfully...');
    }
}