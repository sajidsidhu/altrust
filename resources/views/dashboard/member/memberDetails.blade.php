@extends('.dashboard.dashboard')
@section('content')
<style>
   .page-link {
   border-radius: 10px !important;
   }
   #myTable1_filter {
   display: flex !important;
   justify-content: end !important;
   }
   #myTable2_filter {
   display: flex !important;
   justify-content: end !important;
   }
   #myTable3_filter {
   display: flex !important;
   justify-content: end !important;
   }
   .card{
   padding: 20px !important;
   }
</style>
<div class="modal fade" id="usercreate" tabindex="-1" aria-hidden="true">
</div>
<div class="row mt-5">
   <div class="card">
      <div class="card-datatable table-responsive">
         <table class="dt-responsive table" id="myTable3">
            <thead>
               <tr>
                  <th>Member Name</th>
                  <th>Scheme Reference</th>
                  <th>NI Number</th>
                  <th>Date of Birth</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($newmemberDetails as $index => $member)
               <tr>
                  <td>{{ $member['MemberName'] ?? 'N/A' }}</td>
                  <td>{{ $member['SchemeName'] ?? 'N/A' }}</td>
                  <td>{{ $member['NationalInsuranceNumber'] ?? 'N/A' }}</td>
                  <td>{{ isset($member['DATEOFBIRTH']) ? date('d-m-Y', strtotime($member['DATEOFBIRTH'])) : 'N/A' }}</td>
                  <td>
                     <a href="{{ route('member-detail-view', ['scheme' => $member['SchemeName']]) }}" class="btn btn-primary">
                     View
                     </a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="public/assets/js/tables-datatables-advanced.js"></script>
<script>
   $(document).ready(function () {
       $('#myTable2, #myTable3, #myTable4, #myTable5, #myTable6, #myTable7, #myTable8').DataTable({
           responsive: true,
           autoWidth: false
       });
   });
</script>
@endsection