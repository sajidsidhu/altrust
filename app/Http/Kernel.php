<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's middleware aliases.
     *
     * Aliases may be used to conveniently assign middleware to routes and groups.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \App\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'check.adviser' => \App\Http\Middleware\CheckAdviser::class,
        'check.offshore' => \App\Http\Middleware\CheckOffshore::class,
        'check.pending' => \App\Http\Middleware\CheckPendingAccess::class,
        'check.existing' => \App\Http\Middleware\CheckExistingAccess::class,
        'check.declined' => \App\Http\Middleware\CheckDeclinedAccess::class,
        'check.oasis' => \App\Http\Middleware\CheckOasisSippAccess::class,
        'check.sipp_property' => \App\Http\Middleware\CheckSippPropertyAccess::class,
        'check.full_sipp' => \App\Http\Middleware\CheckFullSippAccess::class,
        'check.ftp' => \App\Http\Middleware\CheckFtpAccess::class,
        'check.pending.application' => \App\Http\Middleware\CheckPendingApplicationAccess::class,
        'check.existing.application' => \App\Http\Middleware\CheckExistingApplicationAccess::class,
        'check.declined.application' => \App\Http\Middleware\CheckDeclinedApplicationAccess::class,
        'check.member.details' => \App\Http\Middleware\CheckMemberDetailsAccess::class,
        'check.leads' => \App\Http\Middleware\CheckLeadsAccess::class,
        'check.user_management' => \App\Http\Middleware\CheckUserManagementAccess::class,
        'check.reports' => \App\Http\Middleware\CheckReportsAccess::class,
        'check.tickets' => \App\Http\Middleware\CheckTicketsAccess::class,
        'check.support' => \App\Http\Middleware\CheckSupportAccess::class,
        'check.communication' => \App\Http\Middleware\CheckCommunicationAccess::class,
        'check.adviser_applications' => \App\Http\Middleware\CheckAdviserApplicationsAccess::class,
        'check.member_applications' => \App\Http\Middleware\CheckMemberApplicationsAccess::class,
        'check.draft' => \App\Http\Middleware\CheckDraftAccess::class,
        'check.dms' => \App\Http\Middleware\CheckDmsAccess::class,
        'verified_or_waiting' => \App\Http\Middleware\EnsureEmailIsVerifiedOrRedirect::class,


    ];
}
