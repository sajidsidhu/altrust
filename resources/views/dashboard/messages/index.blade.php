@extends('dashboard.dashboard')
@section('content')
<style>
   .dropdown-container {
   position: relative;
   width: 100%;
   }
   .dropdown-checkboxes {
   display: none;
   position: absolute;
   width: 100%;
   background: white;
   border: 1px solid #ccc;
   max-height: 200px;
   overflow-y: auto;
   z-index: 1000;
   }
   .dropdown-checkboxes label {
   display: block;
   padding: 5px;
   cursor: pointer;
   }
   .dropdown-checkboxes input {
   margin-right: 5px;
   }
</style>
<div class="card">
   <div class="card-header border-bottom d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Notifications</h5>
      <button class="btn btn-primary px-4 py-2" data-bs-toggle="modal" data-bs-target="#addMessageModal">
         + Add New Notification
      </button>
   </div>
   <div class="container mt-4">
      <table class="table mt-3">
         <thead>
            <tr>
               <th>ID</th>
               <th>Notification</th>
               <th>Role</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach($messages as $index => $msg)
            <tr>
               <td>{{ $index + 1 }}</td>
               <td>{{ $msg->message }}</td>
               <td>{{ str_replace(',', ', ', $msg->role) }}</td>
               <td>
                  <div class="dropdown">
                     <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                     </button>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editMessageModal{{ $msg->id }}">
                           <i class="ti ti-pencil me-1"></i> Edit
                        </a>
                        <a class="dropdown-item" href="#" onclick="confirmDelete(event, {{$msg->id}})">
                           <i class="ti ti-trash me-1"></i> Delete
                        </a>
                        <form id="delete-message-form-{{ $msg->id }}" action="{{ route('messages.destroy', $msg->id) }}" method="POST" style="display: none;">
                           @csrf
                           @method('DELETE')
                        </form>
                     </div>
                  </div>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
      @foreach($messages as $msg)
      <div class="modal fade" id="editMessageModal{{ $msg->id }}" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Edit Notification</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>
               <div class="modal-body">
                  <form action="{{ route('messages.update', $msg->id) }}" method="POST">
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                        <label for="message">Notification:</label>
                        <textarea name="message" class="form-control" required>{{ $msg->message }}</textarea>
                     </div>
                     <div class="form-group mt-3">
                        <label>Select Roles:</label>
                        <div class="dropdown-container" style="position: relative;">
                           <input type="text" id="roleInput{{ $msg->id }}" class="form-control" placeholder="Select roles" readonly>
                           <div class="dropdown-checkboxes" id="roleDropdown{{ $msg->id }}" 
                              style="display: none; position: absolute; background: white; border: 1px solid #ccc; padding: 10px; width: 100%; max-height: 200px; overflow-y: auto;">
                              @php
                              $selectedRoles = explode(',', $msg->role);
                              $roles = ['Admin', 'IT Admin', 'Employee', 'Pre-approved Adviser Firm', 'Adviser Firm', 'Onshore Adviser', 'Offshore Adviser', 'Oasis SIPP', 'SIPP Property', 'Full SIPP Properly', 'FPT'];
                              @endphp
                              @foreach($roles as $role)
                              <label>
                              <input type="checkbox" name="roles[]" value="{{ $role }}" 
                              {{ in_array($role, $selectedRoles) ? 'checked' : '' }} 
                              onchange="updateRoleInput('{{ $msg->id }}')"> {{ $role }}
                              </label><br>
                              @endforeach
                           </div>
                        </div>
                     </div>
                     <script>
                        document.addEventListener("DOMContentLoaded", function () {
                           var roleInput = document.getElementById("roleInput{{ $msg->id }}");
                           var roleDropdown = document.getElementById("roleDropdown{{ $msg->id }}");
                           roleInput.addEventListener("click", function () {
                              roleDropdown.style.display = (roleDropdown.style.display === "block") ? "none" : "block";
                           });
                           document.addEventListener("click", function (event) {
                              if (!roleInput.contains(event.target) && !roleDropdown.contains(event.target)) {
                                 roleDropdown.style.display = "none";
                              }
                           });
                           updateRoleInput('{{ $msg->id }}');
                        });

                        function updateRoleInput(id) {
                           var checkboxes = document.querySelectorAll(`#roleDropdown${id} input[type="checkbox"]`);
                           var selected = [];

                           checkboxes.forEach(checkbox => {
                              if (checkbox.checked) {
                                 selected.push(checkbox.value);
                              }
                           });
                           document.getElementById(`roleInput${id}`).value = selected.join(", ");
                        }
                     </script>
                     <button type="submit" class="btn btn-primary mt-3">Update Notification</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </div>
</div>
<div class="modal fade" id="addMessageModal" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add New Notification</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
         </div>
         <div class="modal-body">
            <form action="{{ route('messages.store') }}" method="POST">
               @csrf
               <div class="form-group">
                  <label for="message">Notification:</label>
                  <textarea name="message" class="form-control" required></textarea>
               </div>
               <div class="form-group mt-3">
                  <label for="roleInput">Select Roles:</label>
                  <div class="dropdown-container">
                     <input type="text" id="roleInput" class="form-control" placeholder="Select roles" readonly>
                     <div class="dropdown-checkboxes" id="roleDropdown">
                        <label><input type="checkbox" name="roles[]" value="Admin"> Admin</label>
                        <label><input type="checkbox" name="roles[]" value="IT Admin"> IT Admin</label>
                        <label><input type="checkbox" name="roles[]" value="Employee"> Employee</label>
                        <label><input type="checkbox" name="roles[]" value="Pre-approved Adviser Firm"> Pre-approved Adviser Firm</label>
                        <label><input type="checkbox" name="roles[]" value="Adviser Firm"> Adviser Firm</label>
                        <label><input type="checkbox" name="roles[]" value="Onshore Adviser"> Onshore Adviser</label>
                        <label><input type="checkbox" name="roles[]" value="Offshore Adviser"> Offshore Adviser</label>
                        <label><input type="checkbox" name="roles[]" value="Oasis SIPP"> Oasis SIPP</label>
                        <label><input type="checkbox" name="roles[]" value="SIPP Property"> SIPP Property</label>
                        <label><input type="checkbox" name="roles[]" value="Full SIPP Properly"> Full SIPP Properly</label>
                        <label><input type="checkbox" name="roles[]" value="FPT"> FPT</label>
                     </div>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary mt-3">Send Notification</button>
            </form>
         </div>
      </div>
   </div>
</div>
<script>document.addEventListener("DOMContentLoaded", function () {
   const roleInput = document.getElementById("roleInput");
   const roleDropdown = document.getElementById("roleDropdown");
   const checkboxes = roleDropdown.querySelectorAll("input[type='checkbox']");
   roleInput.addEventListener("click", function () {
       roleDropdown.style.display = roleDropdown.style.display === "block" ? "none" : "block";
   });
   checkboxes.forEach(checkbox => {
       checkbox.addEventListener("change", function () {
           let selectedRoles = [];
           checkboxes.forEach(cb => {
               if (cb.checked) {
                   selectedRoles.push(cb.value);
               }
           });
           roleInput.value = selectedRoles.join(", ");
       });
   });
   document.addEventListener("click", function (event) {
       if (!roleInput.contains(event.target) && !roleDropdown.contains(event.target)) {
           roleDropdown.style.display = "none";
       }
   });
   });
</script>
<script>
   function confirmDelete(event, id) {
       event.preventDefault();
       if (confirm("Are you sure you want to delete this message?")) {
           document.getElementById('delete-message-form-' + id).submit();
       }
   }
</script>
@endsection