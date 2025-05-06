<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SimpleMail;
use App\Models\Fpt;
use App\Models\Member;
use App\Models\User;
use App\Models\Draftfpt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DraftfptController extends Controller
{
    public function fptCreate() {
        $fpts = User::where('role','fpt')->get();
        $role_member = 'fpt';
        return view('dashboard.fpt.createFpt',compact('fpts','role_member'));
    }

    public function showFpt() {
        if(auth()->user()->role == 'admin'){
            $fptView = Fpt::all();
        }else{
            $fptView = Fpt::where('creater_id', auth()->user()->id)->get();
        }
        return view('dashboard.fpt.viewFpt',compact('fptView'));
    }

    public function fptView() {
        if(auth()->user()->role == 'admin'){
            $fptShow = Fpt::all();
        }else{
            $fptShow = Fpt::where('creater_id', auth()->user()->id)->get();
        }
        return view('dashboard.fpt.showFpt',compact('fptShow'));
    }

    public function draftfpt(Request $request) {
        $userMember = new Draftfpt();
        $userMember->save();
        $data = $request->except(['user_name', 'user_email', 'role_member']);
        $data['creater_id'] = auth()->user()->id;
        
        if ($request->hasFile('signature_file')) {
           $file = $request->file('signature_file');
           $request->validate([
               'signature_file' => 'mimes:jpg,jpeg,png,pdf|max:2048'
           ]);
           $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
           $filePath = $file->storeAs('signatures', $fileName, 'public');
           $data['signature_left1'] = '/storage/app/public/' . $filePath;
         
        }
    
        elseif($request->signature_left1)  {
           $signatureData = $request->signature_left1;
           if (strpos($signatureData, 'data:image/png;base64,') === 0) {
               $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
           }
           $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
           if ($signatureImage === false) {
               return back()->with('error', 'Invalid signature image format.');
           }
           $fileName = 'signature_' . uniqid() . '.png';
           Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_left1'] = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file1')) {
            $file = $request->file('signature_file1');
            $request->validate([
                'signature_file1' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $data['signature_right1'] = '/storage/app/public/' . $filePath;
        }
    
        elseif($request->signature_right1)  {
            $signatureData = $request->signature_right1;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_right1'] = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file2')) {
            $file = $request->file('signature_file2');
            $request->validate([
                'signature_file2' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $data['signature_left2'] = '/storage/app/public/' . $filePath;
        }
        
        elseif($request->signature_left2)  {
            $signatureData = $request->signature_left2;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_left2'] = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file3')) {
            $file = $request->file('signature_file3');
            $request->validate([
                'signature_file3' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $data['signature_right2'] = '/storage/app/public/' . $filePath;
        }
    
        elseif($request->signature_right2)  {
            $signatureData = $request->signature_right2;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
           $data['signature_right2'] = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file4')) {
            $file = $request->file('signature_file4');
            $request->validate([
                'signature_file4' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $data['signature_left_additional']= '/storage/app/public/' . $filePath;
        }
        
        elseif($request->signature_left_additional)  {
            $signatureData = $request->signature_left_additional;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_left_additional'] = '/storage/app/public/signatures/' . $fileName;
        }
         
        if ($request->hasFile('signature_file5')) {
            $file = $request->file('signature_file5');
            $request->validate([
                'signature_file5' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $data['signature_1']= '/storage/app/public/' . $filePath;
        }
        
        elseif($request->signature_1)  {
            $signatureData = $request->signature_1;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_1'] = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file6')) {
            $file = $request->file('signature_file6');
            $request->validate([
                'signature_file6' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $data['signature_2']= '/storage/app/public/' . $filePath;
        }
         
        elseif($request->signature_2)  {
            $signatureData = $request->signature_2;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_2'] = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file7')) {
            $file = $request->file('signature_file7');
            $request->validate([
                'signature_file7' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $data['signature_left']= '/storage/app/public/' . $filePath;
        }
     
        elseif($request->signature_left)  {
            $signatureData = $request->signature_left;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_left'] = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file8')) {
            $file = $request->file('signature_file8');
            $request->validate([
                'signature_file8' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $data['signature_right']= '/storage/app/public/' . $filePath;
          
        }
        
        elseif($request->signature_right) {
            $signatureData = $request->signature_right;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature_right'] = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file9')) {
            $file = $request->file('signature_file9');
            $request->validate([
                'signature_file9' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $data['signature']= '/storage/app/public/' . $filePath;
        }
         
        elseif($request->signature)  {
            $signatureData = $request->signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['signature'] = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file10')) {
            $file = $request->file('signature_file10');
            $request->validate([
                'signature_file10' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $data['empl_dec_signature']= '/storage/app/public/' . $filePath;
          
        }
        
        elseif($request->empl_dec_signature)  {
            $signatureData = $request->empl_dec_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['empl_dec_signature'] = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file11')) {
            $file = $request->file('signature_file11');
            $request->validate([
                'signature_file11' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $data['transf_auth_signature']= '/storage/app/public/' . $filePath;
        }
        
        elseif($request->transf_auth_signature)  {
            $signatureData = $request->transf_auth_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['transf_auth_signature'] = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file12')) {
            $file = $request->file('signature_file12');
            $request->validate([
                'signature_file12' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $data['member_consent_signature']= '/storage/app/public/' . $filePath;
        }
        
        elseif($request->member_consent_signature)  {
            $signatureData = $request->member_consent_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['member_consent_signature'] = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file13')) {
            $file = $request->file('signature_file13');
            $request->validate([
                'signature_file13' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $data['member_declra_signature'] = '/storage/app/public/' . $filePath;
        }
         
        elseif($request->member_declra_signature)  {
            $signatureData = $request->member_declra_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $data['member_declra_signature'] = '/storage/app/public/signatures/' . $fileName;
        }
                 
        return redirect()->back();
    }

    public function getFptList(Request $request) {
        $data = Fpt::select('id', 'scheme_name', 'contact_name', 'company_name', 'country', 'post_code')->get();
        return view('dashboard.fpt.fpt_list', compact('data'));
    }
    
    public function deleteFPT($id) {
        $fpt = Fpt::findOrFail($id);
        $fpt->delete();
        return redirect()->back()->with('success', 'FPT deleted successfully');
    }
    
    public function viewFPT($id) {
        $fpt = Fpt::findOrFail($id);
        $fptUser=User::where('role','fpt')->get();
        return view('dashboard.fpt.show_fpt', compact('fpt','fptUser'));
    }
    
    public function editFPT($id) {
        $fpt = Fpt::findOrFail($id);
        $fptUser=User::where('role','fpt')->get();
        $editFpt = Fpt::with('user')->find($id);
        $user = User::find($editFpt->user_id);
        $role_member = 'fpt';
        return view('dashboard.fpt.edit_fpt', compact('fpt','fptUser','user','role_member'));
    }

     public function fptUpdate(Request $request, $id) {
        $fpt = Fpt::find($id);
        
        if ($request->hasFile('signature_file')) {
            $file = $request->file('signature_file');
            $request->validate([
                'signature_file' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_left1) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_left1))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_left1));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_left1 = '/storage/app/public/' . $filePath;
        }

        elseif ($request->signature_left1) {
            $signatureData = $request->signature_left1;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_left1) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_left1))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_left1));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_left1 = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file1')) {
            $file = $request->file('signature_file1');
            $request->validate([
                'signature_file1' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_right1) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_right1))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_right1));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_right1 = '/storage/app/public/' . $filePath;
        }
        
        elseif ($request->signature_right1) {
            $signatureData = $request->signature_right1;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_right1) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_right1))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_right1));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_right1 = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file2')) {
            $file = $request->file('signature_file2');
            $request->validate([
                'signature_file2' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_left2) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_left2))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_left2));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_left2 = '/storage/app/public/' . $filePath;
        }

        elseif ($request->signature_left2) {
            $signatureData = $request->signature_left2;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_left2) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_left2))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_left2));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_left2 = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file3')) {
            $file = $request->file('signature_file3');
            $request->validate([
                'signature_file3' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_right2) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_right2))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_right2));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_right2 = '/storage/app/public/' . $filePath;
        }
  
        elseif ($request->signature_right2) {
            $signatureData = $request->signature_right2;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_right2) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_right2))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_right2));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_right2 = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file4')) {
            $file = $request->file('signature_file4');
            $request->validate([
                'signature_file4' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_left_additional) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_left_additional))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_left_additional));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_left_additional = '/storage/app/public/' . $filePath;
        }
        
        elseif ($request->signature_left_additional) {
            $signatureData = $request->signature_left_additional;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_left_additional) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_left_additional))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_left_additional));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_left_additional = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file5')) {
            $file = $request->file('signature_file5');
            $request->validate([
                'signature_file5' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_1) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_1))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_1));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_1 = '/storage/app/public/' . $filePath;
        }
  
        elseif ($request->signature_1) {
            $signatureData = $request->signature_1;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_1) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_1))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_1));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_1 = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file6')) {
            $file = $request->file('signature_file6');
            $request->validate([
                'signature_file6' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature_2) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_2))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_2));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature_2 = '/storage/app/public/' . $filePath;
        }

        elseif ($request->signature_2) {
            $signatureData = $request->signature_2;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature_2) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature_2))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature_2));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature_2 = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file9')) {
            $file = $request->file('signature_file9');
            $request->validate([
                'signature_file9' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->signature = '/storage/app/public/' . $filePath;
        }
      
        elseif ($request->signature) {
            $signatureData = $request->signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->signature));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->signature = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file10')) {
            $file = $request->file('signature_file10');
            $request->validate([
                'signature_file10' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->empl_dec_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->empl_dec_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->empl_dec_signature));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->empl_dec_signature = '/storage/app/public/' . $filePath;
        }
        
        elseif ($request->empl_dec_signature) {
            $signatureData = $request->empl_dec_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->empl_dec_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->empl_dec_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->empl_dec_signature));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->empl_dec_signature = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file11')) {
            $file = $request->file('signature_file11');
            $request->validate([
                'signature_file11' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->transf_auth_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->transf_auth_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->transf_auth_signature));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->transf_auth_signature = '/storage/app/public/' . $filePath;
        }
        
        elseif ($request->transf_auth_signature) {
            $signatureData = $request->transf_auth_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->transf_auth_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->transf_auth_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->transf_auth_signature));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->transf_auth_signature = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file12')) {
            $file = $request->file('signature_file12');
            $request->validate([
                'signature_file12' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->member_consent_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->member_consent_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->member_consent_signature));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->member_consent_signature = '/storage/app/public/' . $filePath;
        }
        
        elseif ($request->member_consent_signature) {
            $signatureData = $request->member_consent_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->member_consent_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->member_consent_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->member_consent_signature));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->member_consent_signature = '/storage/app/public/signatures/' . $fileName;
        }
        
        if ($request->hasFile('signature_file13')) {
            $file = $request->file('signature_file13');
            $request->validate([
            'signature_file13' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            if (!empty($fpt->member_declra_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->member_declra_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->member_declra_signature));
            }
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $fpt->member_declra_signature = '/storage/app/public/' . $filePath;
        }
        
        elseif ($request->member_declra_signature) {
            $signatureData = $request->member_declra_signature;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            if (!empty($fpt->member_declra_signature) && Storage::disk('public')->exists(str_replace('/storage/app/public/', '', $fpt->member_declra_signature))) {
                Storage::disk('public')->delete(str_replace('/storage/app/public/', '', $fpt->member_declra_signature));
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $fpt->member_declra_signature = '/storage/app/public/signatures/' . $fileName;
        }
        
        $fpt->update($request->except(['user_name', 'user_email', 'user_id']));
        $user = User::find($request->user_id);
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->save();
        return redirect('/pending-members')->with('success', 'FTP updated successfully!');
    }
    
    public function destroy($id) {
        $fpt = Fpt::find($id);
        if ($fpt) {
            $fpt->delete();
            return redirect()->back()->with('success', 'Fpt deleted successfully.');
        }
        return redirect()->back()->with('error', 'Fpt not found.');
    }

    public function deleted() {
        $deletedFpt = Fpt::onlyTrashed()->get();
        return view('dashboard.fpt.deletedfpt', compact('deletedFpt'));
    }

    public function pendingftp($id,$status) {
        $offfpt = Fpt::find($id);
        $offfpt->status = $status;
        $offfpt->save();
        return redirect()->back();
    }

    public function restoreFpt($id) {
        $fpt = Fpt::withTrashed()->find($id);
        if ($fpt) {
            $fpt->restore();
            return redirect()->back()->with('success', 'FPT member restored successfully');
        }
        return redirect()->back()->with('error', 'FPT member not found');
    }

    public function changestatus($id, $status) {
        $offfpt = Fpt::find($id);
        if ($offfpt) {
            $offfpt->status = $status;
            $offfpt->save();
            if($offfpt->status == 'active'){
                $user = User::find($offfpt->user_id);
                $user->role = 'member';
                $user->oasis_sipp__check = Null;
                $user->sipp_property_check = Null;
                $user->full_sipp_check = Null;
                $user->ftp_check = Null;
                $user->member_details_check = 'member_details_check';
                $user->save();
            }
            return redirect()->back()->with('success', "FPT status updated to {$status} successfully!");
        }
        return redirect()->back()->with('error', 'FPT status update failed!');
    }

    public function fptsign(Request $request, $id) {
        $member = Fpt::find($id);
        
        if ($request->hasFile('signature_file')) {
            $file = $request->file('signature_file');
            $request->validate([
                'signature_file' => 'mimes:jpg,jpeg,png,pdf|max:2048'
            ]);
            $fileName = 'uploaded_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('signatures', $fileName, 'public');
            $member->fpt_signature = '/storage/app/public/' . $filePath;
            $member->save();
        }
        
        elseif($request->signature_1) {
            $signatureData = $request->signature_1;
            if (strpos($signatureData, 'data:image/png;base64,') === 0) {
                $signatureData = substr($signatureData, strlen('data:image/png;base64,'));
            }
            $signatureImage = base64_decode(str_replace(' ', '+', $signatureData));
            if ($signatureImage === false) {
                return back()->with('error', 'Invalid signature image format.');
            }
            $fileName = 'signature_' . uniqid() . '.png';
            Storage::disk('public')->put('signatures/' . $fileName, $signatureImage);
            $member->fpt_signature = '/storage/app/public/signatures/' . $fileName;
            $member->save();
        }
        
        $username = 'Alltrust Business Team';
        $userEmail = 'testnewbiz@ilcorpdev.com';
       
        $messageContent = "
            <div style='font-family: Arial, sans-serif; line-height: 1.6; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px;'>
                <h2 style='color: #333;'>Member Application Submission Alert</h2>
                <p>Dear New Business Team,</p>
                <p>We have received a new application submission via the online portal. Please review the details at your earliest convenience.</p>
                <p>To access the application, click the link below:</p>
                <p><a href='https://newalltrust.ilcorpdev.com/view-fpt/{$member->id}' target='_blank' style='color: #007bff; text-decoration: none;'>View Application</a></p>
                <p>Please liaise with the adviser and/or member directly with any questions or clarity required to complete the review process.</p>
                <p>Best regards,<br>The Alltrust Team</p>
            </div>
        ";
            
        Mail::to($userEmail)->send(new SimpleMail($messageContent));
        return redirect()->back();
    }
}