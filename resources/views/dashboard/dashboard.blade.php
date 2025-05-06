<!doctype html>
<html
   lang="en"
   class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
   dir="ltr"
   data-theme="theme-default"
   data-assets-path="https://www.alltrust.co.uk/alltrustonline/public/assets/"
   data-template="vertical-menu-template"
   data-style="light">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
      <title>Dashboard - Alltrust </title>
      <meta name="description" content="" />
      <link rel="icon" type="image/x-icon" href="https://newalltrust.ilcorpdev.com/public/assets/img/avatars/1.png" />
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
      <link rel="stylesheet" href="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/fonts/fontawesome.css" />
      <link rel="stylesheet" href="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/fonts/tabler-icons.css" />
      <link rel="stylesheet" href="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/fonts/flag-icons.css" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
      <link rel="stylesheet" href="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
      <link rel="stylesheet" href="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
      <link rel="stylesheet" href="https://www.alltrust.co.uk/alltrustonline/public/assets/css/demo.css" />
      <link rel="stylesheet" href="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/libs/node-waves/node-waves.css" />
      <link rel="stylesheet" href="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
      <link rel="stylesheet" href="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/libs/typeahead-js/typeahead.css" />
      <link rel="stylesheet" href="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/libs/apex-charts/apex-charts.css" />
      <link rel="stylesheet" href="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/libs/swiper/swiper.css" />
      <link rel="stylesheet" href="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/css/pages/cards-advance.css" />
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/js/helpers.js"></script>
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/js/template-customizer.js"></script>
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/js/config.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <style>
         .app-brand-logo.demo {
         -ms-flex-align: center;
         align-items: center;
         -ms-flex-pack: center;
         justify-content: center;
         display: -ms-flexbox;
         display: flex;
         width: 180px;
         height: 68px;
         }
         .dark-style .menu .app-brand.demo {
         height: 120px;
         }
         .bg-menu-theme{
         background-color: #1a1a1a !important;
         color: #fff;
         }
         ul a {
         color: #fff !important;
         }
         ul a:hover{
         background: #086898 !important;
         }
         .btn-primary{
         color: white !important;
         background-color: #086898 !important;
         border-color: #086898 !important;
         } 
         .btn-primary:hover{
         color: white !important;
         background-color: #086898 !important;
         border-color: #086898 !important;
         }
         body, input, textarea, select, button {
         font-family: "Century Gothic", sans-serif !important;
         }
         input:-webkit-autofill,
         input:-webkit-autofill:hover, 
         input:-webkit-autofill:focus, 
         input:-webkit-autofill:active {
         font-family: "Century Gothic", sans-serif !important;
         -webkit-text-fill-color: black !important;
         -webkit-box-shadow: 0 0 0px 1000px white inset !important;
         }
         thead {
             background: #086898 !important;
         }
         th{
             color: white !important;
         }
         .template-customizer-open-btn {
             display: none !important;
         }
         .page-item.active .page-link, .page-item.active .page-link:hover, .page-item.active .page-link:focus, .pagination li.active > a:not(.page-link), .pagination li.active > a:not(.page-link):hover, .pagination li.active > a:not(.page-link):focus {
             background: #086898 !important;
         }
      </style>
   </head>
   <body>
      <div class="layout-wrapper layout-content-navbar">
         <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
               <div class="position-fixed">
                  <div class="app-brand demo">
                     <a href="{{url('/dashboard')}}" class="app-brand-link">
                     <span class="app-brand-logo demo">
                     <img src="{{url('public/assets/lightlogo.svg')}}" alt="Taxi-Link Logo" width="100%" height="100px" />
                     </span>
                     </a>
                     <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                     <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
                     <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
                     </a>
                  </div>
                  <div class="menu-inner-shadow"></div>
                  <ul class="menu-inner py-1">
                     @if(auth()->user()->adviser_check != null || auth()->user()->offshore_check != null)
                     <li class="menu-item {{ auth()->check() && auth()->user()->role == 'pre_approved_adviser_firm' ? 'open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                           <i class="menu-icon tf-icons ti ti-smart-home"></i>
                           <div data-i18n="Terms Applications">Terms Applications</div>
                        </a>
                        <ul class="menu-sub">
                           @if(auth()->user()->adviser_check != null)
                           <li class="menu-item">
                              <a href="{{ route('startonshore') }}" class="menu-link">
                                 <div data-i18n="UK Registration Form">UK Registration Form</div>
                              </a>
                              @endif
                              @if(auth()->user()->offshore_check != null)
                           <li class="menu-item">
                              <a href="{{ route('startoffshore') }}" class="menu-link">
                                 <div data-i18n="Offshore Registration form">Offshore Registration form</div>
                              </a>
                           </li>
                           @endif
                        </ul>
                     </li>
                     @endif
                     @if(auth()->user()->offshore_pending != null || auth()->user()->offshore_existing != null || auth()->user()->offshore_declined != null)
                     <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                           <i class="menu-icon tf-icons ti ti-clipboard"></i>
                           <div data-i18n="Adviser Terms Status">Adviser Terms Status</div>
                        </a>
                        <ul class="menu-sub">
                           @if(auth()->user()->offshore_pending != null)
                           <li class="menu-item">
                              <a href="{{ route('adviser.pendingList') }}" class="menu-link">
                                 <div data-i18n="Pending">Pending</div>
                              </a>
                           </li>
                           @endif
                           @if(auth()->user()->offshore_existing != null)
                           <li class="menu-item">
                              <a href="{{ route('adviser.existingList') }}" class="menu-link">
                                 <div data-i18n="Existing">Existing</div>
                              </a>
                           </li>
                           @endif
                           @if(auth()->user()->offshore_declined != null)
                           <li class="menu-item">
                              <a href="{{ route('adviser.declinedList') }}" class="menu-link">
                                 <div data-i18n="Declined">Declined</div>
                              </a>
                           </li>
                           @endif
                        </ul>
                     </li>
                     @endif
                     @if(auth()->user()->oasis_sipp__check != null || auth()->user()->sipp_property_check != null || auth()->user()->full_sipp_check != null || auth()->user()->ftp_check != null || auth()->user()->illustration_check != null)
                     <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                           <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                           <div data-i18n="Scheme Applications">Scheme Applications</div>
                        </a>
                        <ul class="menu-sub">
                           @if(auth()->user()->oasis_sipp__check != null)
                           <li class="menu-item">
                              <a href="{{ route('before-create-oasis-sipp') }}" class="menu-link">
                                 <div data-i18n="Oasis SIPP">Oasis SIPP</div>
                              </a>
                           </li>
                           @endif
                           @if(auth()->user()->sipp_property_check != null)
                           <li class="menu-item">
                              <a href="{{ route('before-create-sipp_property') }}" class="menu-link">
                                 <div data-i18n="SIPP Property">SIPP Property</div>
                              </a>
                           </li>
                           @endif
                           @if(auth()->user()->full_sipp_check != null)
                           <li class="menu-item">
                              <a href="{{ route('before-create-full-sipp') }}" class="menu-link">
                                 <div data-i18n="Full SIPP">Full SIPP</div>
                              </a>
                           </li>
                           @endif
                           @if(auth()->user()->ftp_check != null)
                           <li class="menu-item">
                              <a href="{{ route('Fpt-before') }}" class="menu-link">
                                 <div data-i18n="Family Pension Trust">Family Pension Trust</div>
                              </a>
                           </li>
                           @endif
                           @if(auth()->user()->illustration_check != null)
                           <li class="menu-item">
                              <a href="#" class="menu-link">
                                 <div data-i18n="Illustration">Illustration</div>
                              </a>
                           </li>
                           @endif
                        </ul>
                     </li>
                     @endif
                     @if(auth()->user()->pending_applications != null || auth()->user()->existing_applications != null || auth()->user()->decline_applications != null)
                     <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                           <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                           <div data-i18n="Member Admin">Member Admin</div>
                        </a>
                        <ul class="menu-sub">
                           @if(auth()->user()->pending_applications != null)
                           <li class="menu-item">
                              <a href="{{ route('member.application.pending') }}" class="menu-link">
                                 <div data-i18n="Pending Application">Pending Application</div>
                              </a>
                           </li>
                           @endif
                           @if(auth()->user()->existing_applications != null)
                           <li class="menu-item">
                              <a href="{{ route('member.application.existing') }}" class="menu-link">
                                 <div data-i18n="Scheme Members">Scheme Members</div>
                              </a>
                           </li>
                           @endif
                           @if(auth()->user()->decline_applications != null)
                           <li class="menu-item">
                              <a href="{{ route('member.application.declined') }}" class="menu-link">
                                 <div data-i18n="Not Proceeding">Not Proceeding</div>
                              </a>
                           </li>
                           @endif
                        </ul>
                     </li>
                     @endif
                     @if(auth()->user()->member_details_check != null)
                     <li class="menu-item">
                        <a href="{{ route('member-detail') }}" class="menu-link">
                           <i class="menu-icon tf-icons ti ti-files"></i>
                           <div data-i18n="Member Details">Member Details</div>
                        </a>
                     </li>
                     @endif
                     @if(auth()->user()->role == 'live_member')
                     <li class="menu-item">
                        @php
                        $id = auth()->user()->member_refrence;
                        @endphp
                        <a href="{{ route('member-detail-view', ['scheme' => $id]) }}" class="menu-link">
                           <i class="menu-icon tf-icons ti ti-files"></i>
                           <div data-i18n="My Member Information">My Member Information</div>
                        </a>
                     </li>
                     @endif
                     @if(auth()->user()->leads_check != null || auth()->user()->user_management_check != null || auth()->user()->dms_check != null || auth()->user()->reports_check != null || auth()->user()->workflow_check != null)
                     <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                           <i class="menu-icon tf-icons ti ti-folder"></i>
                           <div data-i18n="Management">Management</div>
                        </a>
                        <ul class="menu-sub">
                           @if(auth()->user()->leads_check != null)
                           <li class="menu-item">
                              <a href="{{ route('leads.index') }}" class="menu-link">
                                 <div data-i18n="Leads">Leads</div>
                              </a>
                           </li>
                           @endif
                           @if(auth()->user()->user_management_check != null)
                           <li class="menu-item">
                              <a href="{{ route('user') }}" class="menu-link">
                                 <div data-i18n="User Management">User Management</div>
                              </a>
                           </li>
                           @endif
                           @if(auth()->user()->dms_check != null)
                           <li class="menu-item">
                              <a href="{{ route('dms.index') }}" class="menu-link">
                                 <div data-i18n="DMS">DMS</div>
                              </a>
                           </li>
                           @endif
                           @if(auth()->user()->reports_check != null)
                           <li class="menu-item">
                              <a href="{{ route('report.index') }}" class="menu-link">
                                 <div data-i18n="Reports">Reports</div>
                              </a>
                           </li>
                           @endif
                           @if(auth()->user()->workflow_check != null)
                           <li class="menu-item">
                              <a href="#" class="menu-link">
                                 <div data-i18n="WorkFLow">WorkFLow</div>
                              </a>
                           </li>
                           @endif
                        </ul>
                     </li>
                     @endif
                     @if(auth()->user()->tickets_check != null || auth()->user()->support_check != null)
                     <li class="menu-item {{ auth()->check() && auth()->user()->role == 'pre_approved_adviser_firm' ? 'open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                           <i class="menu-icon tf-icons ti ti-help"></i>
                           <div data-i18n="Support">Support</div>
                        </a>
                        <ul class="menu-sub">
                           @if(auth()->user()->tickets_check != null)
                           <li class="menu-item">
                              <a href="{{ route('ticket') }}" class="menu-link">
                                 <div data-i18n="Contact Us">Contact Us</div>
                              </a>
                           </li>
                           @endif
                           @if(auth()->user()->support_check != null)
                           <li class="menu-item">
                              <a href="{{ route('support') }}" class="menu-link">
                                 <div data-i18n="Portal Support">Portal Support</div>
                              </a>
                           </li>
                           @endif
                        </ul>
                     </li>
                     @endif
                     @if(auth()->user()->communication_check != null)
                     <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                           <i class="menu-icon tf-icons ti ti-briefcase"></i>
                           <div data-i18n="Marketing Management">Marketing Management</div>
                        </a>
                        <ul class="menu-sub">
                           <li class="menu-item">
                              <a href="{{ route('mail.index') }}" class="menu-link">
                                 <div data-i18n="Communications">Communications</div>
                              </a>
                           </li>
                        </ul>
                     </li>
                     @endif
                     @if(auth()->user()->adviser_applications_check != null || auth()->user()->member_applications_check != null)
                     <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                           <i class="menu-icon tf-icons ti ti-archive"></i>
                           <div data-i18n="Archive">Archive</div>
                        </a>
                        <ul class="menu-sub">
                           @if(auth()->user()->adviser_applications_check != null)
                           <li class="menu-item">
                              <a href="{{ route('deletedAdvisers') }}" class="menu-link">
                                 <div data-i18n="Advisor Applications">Advisor Applications</div>
                              </a>
                           </li>
                           @endif
                           @if(auth()->user()->member_applications_check != null)
                           <li class="menu-item">
                              <a href="{{ route('deleted.member') }}" class="menu-link">
                                 <div data-i18n="Member Applications">Member Applications</div>
                              </a>
                           </li>
                           @endif
                        </ul>
                     </li>
                     @endif
                     @if(auth()->user()->role !== 'live_member')
                     <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                           <i class="menu-icon tf-icons ti ti-archive"></i>
                           <div data-i18n="Draft Application">Draft Application</div>
                        </a>
                        <ul class="menu-sub">
                           <li class="menu-item">
                              <a href="{{ route('draftOnshore.index') }}" class="menu-link">
                                 <div data-i18n="Aplication">Aplication</div>
                              </a>
                           </li>
                        </ul>
                     </li>
                     @endif
                     @if(auth()->user()->role == 'admin')
                     <li class="menu-item">
                        <a href="{{ route('messages.index') }}" class="menu-link">
                           <i class="menu-icon tf-icons ti ti-message"></i>
                           <div data-i18n="Notifications">Notifications</div>
                        </a>
                     </li>
                     <li class="menu-item">
                        <a href="{{ route('logs.index') }}" class="menu-link">
                           <i class="menu-icon tf-icons ti ti-message"></i>
                           <div data-i18n="Timeline Logs">Timeline Logs</div>
                        </a>
                     </li>
                     @endif
                  </ul>
               </div>
            </aside>
            <div class="layout-page">
               <nav
                  class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                  id="layout-navbar">
                  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                     <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                     <i class="ti ti-menu-2 ti-md"></i>
                     </a>
                  </div>
                  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                     <div class="navbar-nav align-items-center d-none">
                        <div class="nav-item navbar-search-wrapper mb-0">
                           <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                           <i class="ti ti-search ti-md me-2 me-lg-4 ti-lg"></i>
                           <span class="d-none d-md-inline-block text-muted fw-normal">Search (Ctrl+/)</span>
                           </a>
                        </div>
                     </div>
                     <ul class="navbar-nav flex-row align-items-center ms-auto">
                        @php
                            use App\Models\Message;
                            $userRole = auth()->user()->role;
                            $messageCount = Message::where('status', 'unseen')->whereRaw("FIND_IN_SET(?, role)", [$userRole])->count();
                        @endphp
                        <div class="" style="margin-right: 20px;">
                           <a href="{{ route('messages.show') }}" class="text-dark position-relative">
                              <i class="ti ti-bell fs-4"></i>
                              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                 {{ $messageCount }}
                              </span>
                           </a>
                        </div>
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                           <a
                              class="nav-link dropdown-toggle hide-arrow p-0"
                              href="javascript:void(0);"
                              data-bs-toggle="dropdown">
                              <div class="avatar avatar-online">
                                 <img src="https://newalltrust.ilcorpdev.com/public/assets/img/avatars/1.png" alt class="rounded-circle" />
                              </div>
                           </a>
                           <ul class="dropdown-menu dropdown-menu-end">
                              <li>
                                 <a class="dropdown-item mt-0" href="#">
                                    <div class="d-flex align-items-center">
                                       <div class="flex-shrink-0 me-2">
                                          <div class="avatar avatar-online">
                                             <img src="https://newalltrust.ilcorpdev.com/public/assets/img/avatars/1.png" alt class="rounded-circle" />
                                          </div>
                                       </div>
                                       <div class="flex-grow-1">
                                          <h6 class="mb-0">{{auth()->user()->name}}</h6>
                                          <small class="text-muted">{{auth()->user()->role}}</small>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <div class="d-grid px-2 pt-2 pb-1">
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                 </form>
                                 <li>
                                    <a class="dropdown-item bg-success text-white" href="https://newalltrust.ilcorpdev.com/profile">
                                    <i class="ti ti-user me-3 ti-md"></i><span class="align-middle">My Profile</span>
                                    </a>
                                 </li>
                                 <button class="btn btn-sm btn-danger d-flex my-2" type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 <small class="align-middle">Logout</small>
                                 <i class="ti ti-logout ms-2 ti-14px"></i>
                                 </button>
                              </div>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               </nav>
               <div class="content-wrapper">
                  <div class="container-xxl flex-grow-1 container-p-y">
                     @yield('content')
                  </div>
                  <footer class="content-footer footer bg-footer-theme">
                     <div class="container-xxl">
                        <div
                           class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                        </div>
                     </div>
                  </footer>
                  <div class="content-backdrop fade"></div>
               </div>
            </div>
         </div>
         <div class="layout-overlay layout-menu-toggle"></div>
         <div class="drag-target"></div>
      </div>
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/libs/jquery/jquery.js"></script>
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/libs/popper/popper.js"></script>
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/js/bootstrap.js"></script>
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/libs/node-waves/node-waves.js"></script>
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/libs/hammer/hammer.js"></script>
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/libs/i18n/i18n.js"></script>
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/libs/typeahead-js/typeahead.js"></script>
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/js/menu.js"></script>
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/libs/apex-charts/apexcharts.js"></script>
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/vendor/libs/swiper/swiper.js"></script>
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/js/main.js"></script>
      @yield('script')
      <script src="https://www.alltrust.co.uk/alltrustonline/public/assets/js/dashboards-analytics.js"></script>
      @if(session('success'))
      <script>
         Swal.fire({
             title: "Success!",
             text: "{{ session('success') }}",
             icon: "success"
         });
      </script>
      @endif
      
      <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="public/assets/js/tables-datatables-advanced.js"></script>
<script>
   $(document).ready(function () {
       $('#myTable').DataTable({
           responsive: true,
           autoWidth: false
       });
   });
</script>

      
   </body>
</html>