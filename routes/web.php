<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckAdviser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DmsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FptController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DraftfptController;
use App\Http\Controllers\OffShoreController;
use App\Http\Controllers\DraftMemberController;
use App\Http\Controllers\DraftOffshoreController;
use App\Http\Controllers\UkRegistrationController;
use App\Http\Controllers\MarketManagementController;

use App\Http\Controllers\TwoStepVerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|two-step.verify
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/test', function () {
    return 'Working!';
});

Auth::routes(['verify' => true]);


Route::get('/waiting', function () {
    return view('auth.verifyemail');
})->name('waiting')->middleware('auth');


Route::get('/profile', function () {
    return view('dashboard.profile');
});



// Routs AdminController
Route::middleware(['auth', 'verified_or_waiting'])->group(function () {

Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

});


Route::middleware(['auth'])->group(function () {
// Routes TicketController
Route::middleware(['auth', 'check.tickets'])->group(function () {
    Route::get('/ticket', [TicketController::class, 'index'])->name('ticket');
});

Route::post('/ticket-store', [TicketController::class, 'store'])->name('ticket-store');
Route::put('/ticket-update/{id}', [TicketController::class, 'update'])->name('ticket-update');
Route::get('/ticket-delete/{id}', [TicketController::class, 'delete'])->name('ticket-delete');
Route::post('/ticket-reply-store', [TicketController::class, 'replyStore'])->name('ticket-reply');
Route::get('/ticketStatus/{id}/{status}', [TicketController::class, 'ticketStatus'])->name('ticketStatus');


// Routes SupportControllers
Route::middleware(['auth', 'check.support'])->group(function () {
    Route::get('/support', [SupportController::class, 'index'])->name('support');
});

Route::post('/support-store', [SupportController::class, 'store'])->name('support-store');
Route::put('/support-update/{id}', [SupportController::class, 'update'])->name('support-update');
Route::get('/support-delete/{id}', [SupportController::class, 'delete'])->name('support-delete');
Route::post('/support-reply-store', [SupportController::class, 'replyStore'])->name('support-reply');
Route::get('/supportStatus/{id}/{status}', [SupportController::class, 'supportStatus'])->name('supportStatus');


// Routes FaqController
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/faq-view', [FaqController::class, 'indexView'])->name('faq.view');
Route::post('/faq-store', [FaqController::class, 'store'])->name('faq-store');
Route::post('/faq-update/{id}', [FaqController::class, 'update'])->name('faq-update');
Route::get('/faq-delete/{id}', [FaqController::class, 'destroy'])->name('faq-delete');


// Routes LeadController
Route::middleware(['auth', 'check.leads'])->group(function () {
    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
});
Route::post('/leads/store', [LeadController::class, 'store'])->name('leads.store');
Route::any('/leads/{id}/update', [LeadController::class, 'update'])->name('leads.update');
Route::get('leads-delete/{id}', [LeadController::class, 'destroy'])->name('leads.destroy');


// Routes Uk Registration
Route::middleware(['auth', 'check.adviser'])->group(function () {
    Route::get('/start-uk-registration', [UkRegistrationController::class, 'startonshore'])->name('startonshore');
    Route::get('/uk-registration-application', [UkRegistrationController::class, 'create'])->name('onshoreCreate');
});
Route::post('/uk-registration-store', [UkRegistrationController::class, 'store'])->name('onshoreCreate-store');
Route::get('/uk-registration-edit/{id}', [UkRegistrationController::class, 'editOnshore'])->name('onshoreedit');
Route::post('/uk-registration-update/{id}', [UkRegistrationController::class, 'updateOnshore'])->name('onshoreupdate');
Route::any('/uk-registration-delete/{id}', [UkRegistrationController::class, 'onshoredelete'])->name('onshoredelete');
Route::get('/uk-registration-view/{id}', [UkRegistrationController::class, 'onshoreview'])->name('onshore-view');
Route::middleware(['auth', 'check.pending'])->group(function () {
    Route::get('/pending-adviser-applications',[UkRegistrationController::class, 'pendingList'])->name('adviser.pendingList');
});
Route::middleware(['auth', 'check.existing'])->group(function () {
    Route::get('existing-adviser-applications',[UkRegistrationController::class, 'existingList'])->name('adviser.existingList');
});
Route::middleware(['auth', 'check.declined'])->group(function () {
    Route::get('declined-adviser-applications',[UkRegistrationController::class, 'declinedList'])->name('adviser.declinedList');
});
Route::get('/change-status-uk-registration/{id}/{status}', [UkRegistrationController::class, 'onshoreStatusChange'])->name('onshoreStatusChange');
Route::get('/uk-registration-flag/{id}', [UkRegistrationController::class, 'onshoreflag'])->name('onshore.flag');
Route::post('/adviser-restore/{id}', [UkRegistrationController::class, 'restore'])->name('adviser-restore');
Route::get('/deletedAdvisers', [\App\Http\Controllers\UkRegistrationController::class, 'deleted'])->name('deletedAdvisers');
Route::middleware(['auth', 'check.adviser_applications'])->group(function () {
    Route::get('/deleted-Advisers', [UkRegistrationController::class, 'deleted'])->name('deletedAdvisers');
});


// Routes Offshore
Route::middleware(['auth', 'check.offshore'])->group(function () {
    Route::get('/offshore-application', [OffShoreController::class, 'create'])->name('offshoreCreate');
    Route::get('/start-offshore-application', [OffShoreController::class, 'startoffshore'])->name('startoffshore');
});
Route::post('/offshore-store', [OffShoreController::class, 'store'])->name('offshoreCreate-store');
Route::get('/offshore-edit/{id}', [OffShoreController::class, 'editoffshore'])->name('offshoreedit');
Route::post('/offshore-update/{id}', [OffShoreController::class, 'updateoffshore'])->name('offshoreupdate');
Route::any('/offshore-delete/{id}', [OffShoreController::class, 'offshoredelete'])->name('offshoredelete');
Route::get('/offshore-show/{id}', [OffShoreController::class, 'offshoreview'])->name('offshore-view');
Route::post('/draft-offshore', [DraftOffshoreController::class, 'draftOffshore'])->name('draft-offshore');
Route::get('/draftOffshore-continue/{id}', [\App\Http\Controllers\DraftOffshoreController::class, 'draftOffshore_continue'])->name('draftOffshore-continue');
Route::DELETE('/draftOffshore-delete/{id}', [\App\Http\Controllers\DraftOffshoreController::class, 'draftOffshore_destroy'])->name('draftOffshore-delete');

Route::get('/change-status-offshore/{id}/{status}', [OffShoreController::class, 'offshoreStatusChange'])->name('offshoreStatusChange');
Route::post('offsore-country-store',[OffShoreController::class, 'country_store'])->name('offshore.countryStore');
Route::get('/offsore-flagoffshore/{id}', [OffShoreController::class, 'flagoffshore'])->name('records.flagoffshore');
Route::post('/offshore-restore/{id}', [OffShoreController::class, 'restore'])->name('offshore-restore');
Route::get('/deleted-offshore', [OffShoreController::class, 'deleted'])->name('deletedoffshore');


// Routes Member
Route::middleware(['auth', 'check.oasis'])->group(function () {
    Route::get('/before-create-oasis-sipp', [MemberController::class, 'membersBefore'])->name('before-create-oasis-sipp');
    Route::get('/create-oasis-sipp', [MemberController::class, 'member'])->name('create-oasis-sipp');
});
Route::middleware(['auth', 'check.sipp_property'])->group(function () {
    Route::get('/before-create-sipp_property', [MemberController::class, 'membersBefore1'])->name('before-create-sipp_property');
});
Route::middleware(['auth', 'check.full_sipp'])->group(function () {
    Route::get('/before-create-full-sipp', [MemberController::class, 'membersBefore1'])->name('before-create-full-sipp');
});
Route::get('/create-sipp_property', [MemberController::class, 'memberSipp'])->name('create-sipp_property');
Route::get('/member-application-edit/{id}', [MemberController::class, 'memberedit'])->name('member-application-edit');
Route::get('/member-application-view/{id}', [MemberController::class, 'memberViewSpecific'])->name('member-application-view');
Route::post('/create-member-store', [MemberController::class, 'memberStore'])->name('member-form-store');
Route::middleware(['auth', 'check.pending.application'])->group(function () {
    Route::get('/pending-member', [MemberController::class, 'membersPending'])->name('member.application.pending');
});
Route::middleware(['auth', 'check.existing.application'])->group(function () {
    Route::get('/existing-member', [MemberController::class, 'memberExisting'])->name('member.application.existing');
});
Route::middleware(['auth', 'check.declined.application'])->group(function () {
    Route::get('declined-member',[MemberController::class, 'declinedList'])->name('member.application.declined');
});
Route::post('/create-member-update', [MemberController::class, 'memberUpdate'])->name('member-form-update');
Route::delete('/member/delete/{id}', [MemberController::class, 'destroy'])->name('member-delete');
Route::get('/change-member-status/{id}/{status}', [MemberController::class, 'pendingamember'])->name('change-member-status');
Route::post('/member-view-signature/{id}', [MemberController::class, 'memberviewsignature'])->name('member-view-signature');
Route::middleware(['auth', 'check.member.details'])->group(function () {
    Route::get('/member-detail', [MemberController::class, 'membersDetail'])->name('member-detail');
});
Route::get('/member-detail-view/{scheme}', [MemberController::class, 'viewMember'])->name('member-detail-view');
Route::middleware(['auth', 'check.member_applications'])->group(function () {
    Route::get('/deleted-member', [MemberController::class, 'deleted'])->name('deleted.member');
});
Route::put('/member-restore/{id}', [MemberController::class, 'restoreMember'])->name('member-restore');
Route::delete('/members/{id}', [MemberController::class, 'destroy'])->name('members.delete');
Route::post('/draft/member', [DraftMemberController::class, 'draftMember'])->name('draft-member');


// Routes FPT
Route::middleware(['auth', 'check.ftp'])->group(function () {
    Route::get('/Fpt-before', [FptController::class, 'FptBefore'])->name('Fpt-before');
    Route::get('/create-fpt', [FptController::class, 'fptCreate'])->name('fpt-create');
});
Route::get('/deleted-fpt', [FptController::class, 'deleted'])->name('deletedfpt');
Route::get('/edit-fpt/{id}', [FptController::class, 'editFpt'])->name('fpt-edit');
Route::post('/admin/update-fpt/{id}', [FptController::class, 'fptUpdate']);
Route::get('/view-fpt/{id}', [FptController::class, 'viewFpt'])->name('fpt-view');
Route::any('/delete-fpt/{id}', [FptController::class, 'destroy'])->name('delete-fpt');
Route::any('/fpt-store', [FptController::class, 'fptStore'])->name('fpt-store');
Route::put('/fpt-restore/{id}', [FptController::class, 'restoreFpt'])->name('fpt-restore');
Route::post('/fpt-sign/{id}', [FptController::class, 'fptsign'])->name('fpt-signature');
Route::post('/draft-fpt', [DraftfptController::class, 'draftfpt'])->name('draft-fpt');
Route::get('/show-record', [FptController::class, 'showrecord'])->name('Show-fpt');
Route::get('/view-status-change/{id}/{status}', [FptController::class, 'viewstatuschange'])->name('view-status-change');
Route::get('/change-fpt-status/{id}/{status}', [FptController::class, 'changefptstatus'])->name('change-fpt-status');

// user Routes
Route::middleware(['auth', 'check.user_management'])->group(function () {
    Route::get('/user',[UserController::class,'index'])->name('user');
});
Route::post('/user-store',[UserController::class,'userstore'])->name('user-store');
Route::get('/user-delete/{id}', [UserController::class, 'userdelete'])->name('user-delete');
Route::post('/user-update/{id}', [UserController::class, 'userupdate'])->name('user-update');
Route::get('/self-investor', [UserController::class, 'selfinvestor'])->name('selfinvestor');
Route::post('/update-profile/{id}', [UserController::class, 'updateProfile'])->name('update-profile');
Route::get('/email-notification', [UserController::class, 'toggleEmailNotification'])->name('email-notification');

// ============ DMS ===

Route::middleware(['auth', 'check.dms'])->group(function () {
    Route::get('/dms', [DmsController::class, 'index'])->name('dms.index');
});
    Route::get('/dms/create', [DmsController::class, 'create'])->name('dms.create');
    Route::post('/dms/store', [DmsController::class, 'store'])->name('dms.store');
    Route::get('/dms/edit/{id}', [DmsController::class, 'edit'])->name('dms.edit');
    Route::post('/dms/update/{id}', [DmsController::class, 'update'])->name('dms.update');
    Route::get('/dms/delete/{id}', [DmsController::class, 'delete'])->name('dms.delete');


// Routes DocumentController
Route::get('documents/{id}', [DocumentController::class, 'index'])->name('documents.index');
Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
Route::POST('documents/update', [DocumentController::class, 'update'])->name('documents.update');
Route::delete('/documents/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy');


// Routes CommentController
Route::get('/comment/{id}', [CommentController::class, 'index'])->name('comment.index');
Route::post('/comment-store', [CommentController::class, 'store'])->name('comment.store');
Route::post('/comment-update', [CommentController::class, 'update'])->name('comment.update');
Route::any('/comment-delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');
});


// Routes TwoStepVerificationController
Route::get('/two-step-verify', [TwoStepVerificationController::class, 'showVerifyForm'])->name('two-step.verify');
Route::post('/two-step-verify', [TwoStepVerificationController::class, 'verify']);
Route::get('/two-step-verify', [TwoStepVerificationController::class, 'showVerifyForm'])->name('two-step.verify');
Route::post('/two-step-verify', [TwoStepVerificationController::class, 'verify'])->name('verify-step');
Route::get('/resend-code', [TwoStepVerificationController::class, 'resendCode'])->name('resend-code');


// Routes DraftController
Route::post('/draft/store', [DraftController::class, 'store'])->name('draft-store');
Route::middleware(['auth', 'check.draft'])->group(function () {
    Route::get('/draftOnshore', [DraftController::class, 'draftOnshore'])->name('draftOnshore.index');
});
Route::get('/draftOnshore-continue/{id}', [DraftController::class, 'draftOnshore_continue'])->name('draftOnshore-continue');
Route::DELETE('/draftOnshore-delete/{id}', [DraftController::class, 'draftOnshore_destroy'])->name('draftOnshore-delete');
Route::get('/draftOffshore', [DraftController::class, 'draftofshore'])->name('draftOffshore.index');


// Routes MessageController
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/show', [MessageController::class, 'show'])->name('messages.show');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::put('/messages/{id}', [MessageController::class, 'update'])->name('messages.update');
Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
Route::get('/notifications', [MessageController::class, 'notifications'])->name('notifications');
Route::get('/timeline-logs', [MessageController::class, 'logs'])->name('logs.index');
Route::get('/change-message-status/{id}/{status}', [MessageController::class, 'statuschange'])->name('change-message-status');



Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Routes ReportController
Route::middleware(['auth', 'check.reports'])->group(function () {
    Route::get('/reports', [ReportController::class, 'index'])->name('report.index');
});

// Routes MarketManagementControllerffd
Route::middleware(['auth', 'check.communication'])->group(function () {
    Route::get('/mail', [MarketManagementController::class, 'mailIndex'])->name('mail.index');
});
