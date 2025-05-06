@extends('dashboard.dashboard')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="">
            <div class="card-body text-center p-5">
               <h3 class="">Thank You for Choosing Alltrust!</h3>
               <p class="my-5">
                  It will take you approximately <strong>20 minutes</strong> to complete this application. All sections are required to be completed, if the field box is not relevant to you, please state “NA” in order to progress. You will need the following documents available to upload as part of your application:
               </p>
               <ul class="list-unstyled mt-3">
                  <li>🔹 <strong>Company structure chart</strong></li>
                  <li>🔹 <strong>Director and Shareholder registers</strong></li>
                  <li>🔹 <strong>Authorised signatory list</strong></li>
                  <li>🔹 <strong>Adviser professional membership CPD</strong></li>
                  <li>🔹 <strong>Level 4 and above certificates for advisers</strong></li>
                  <li>🔹 <strong>Most recent accounts (Offshore applicants only)</strong></li>
               </ul>
               <p class="my-5">
                  Upon submission, your application will be reviewed by the New Business team, and someone will be in contact with you. We collect KYC documents from key people within your organisation including advisers and a link to the <strong>Alltrust ID Pal</strong> will be issued in the email that is sent.
               </p>
               <p class="my-5">
                  If you have any questions, please contact us at
                  <a href="mailto:newbusiness@alltrust.co.uk" class="text-primary font-weight-bold">
                  newbusiness@alltrust.co.uk
                  </a>
               </p>
               <a href="{{ route('onshoreCreate') }}" class="btn btn-primary mt-4 px-4 py-2">
                  Start Application 🚀
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection