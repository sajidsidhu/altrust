@extends('.dashboard.dashboard')
@section('content')
<div class="modal fade" id="usercreate" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Enquiry Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{ route('support-store') }}" method="post">
            @csrf
            <div class="modal-body">
               <div class="row mb-4">
                  <div class="col">
                     <label for="title" class="form-label">Subject Title</label>
                     <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required />
                  </div>
               </div>
               <div class="row mb-4">
                  <div class="col">
                     <label for="category" class="form-label">Category</label>
                     <select name="category" id="category" class="form-control" required>
                        <option value="">Select Category</option>
                        <option value="General technical support">General technical support</option>
                     </select>
                  </div>
               </div>
               <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
               <div class="row mb-4">
                  <div class="col">
                     <label for="details" class="form-label">Details</label>
                     <textarea name="details" id="details" class="form-control" placeholder="Enter Details" rows="5" cols="50" required></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Create Support</button>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="row">
   <div class="card">
      <div class="card-header flex-column flex-md-row">
         <div class="dt-action-buttons text-end pt-6 pt-md-0">
            <div class="dt-buttons btn-group">
               <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#usercreate" type="button">
               <span><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Create New Query</span></span>
               </button>
            </div>
         </div>
      </div>
      <div class="card-datatable table-responsive">
         <table class="dt-responsive table">
            <thead>
               <tr>
                  <th>id</th>
                  <th>User name</th>
                  <th>Email</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Details</th>
                  @if(auth()->user()->role == 'admin')
                  <th>Status</th>
                  @else
                  <th>Reply</th>
                  @endif
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($supports as $index => $support)
               <tr>
                  @php
                  $user = app\models\User::find($support->user_id);                          
                  @endphp
                  <td>{{ $index + 1 }}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td><span class="fw-medium">{{ $support->title }}</span></td>
                  <td>{{ $support->category }}</td>
                  <td>{{ $support->details }}</td>
                  @if(auth()->user()->role == 'admin')
                  <td>
                     <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle 
                           {{ ($support->status === 'Pending' || !$support->status) ? 'bg-warning text-white' : ($support->status === 'Open' ? 'bg-success text-white' : 'bg-danger text-white') }}" type="button" id="statusDropdown{{ $support->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ ucfirst($support->status ?? 'Pending') }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="statusDropdown{{ $support->id }}">
                           <li>
                              <a class="dropdown-item" href="{{ route('supportStatus', ['id' => $support->id, 'status' => 'Open']) }}" style="background: #919191 !important;">
                              Open
                              </a>
                           </li>
                           <li>
                              <a class="dropdown-item" href="{{ route('supportStatus', ['id' => $support->id, 'status' => 'Pending']) }}" style="background: #919191 !important;">
                              Pending
                              </a>
                           </li>
                           <li>
                              <a class="dropdown-item" href="{{ route('supportStatus', ['id' => $support->id, 'status' => 'Closed']) }}" style="background: #919191 !important;">
                              Closed
                              </a>
                           </li>
                        </ul>
                     </div>
                  </td>
                  @else
                  <td>
                     <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userreply{{ $support->id }}">View Reply</a>
                  </td>
                  @endif
                  <td>
                     <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item waves-effect" data-bs-toggle="modal" data-bs-target="#useredit{{ $support->id }}"><i class="ti ti-pencil me-1"></i> Edit</a>
                           <a class="dropdown-item waves-effect" data-bs-toggle="modal" data-bs-target="#replyModal{{ $support->id }}"><i class="ti ti-message-circle me-1"></i> Reply </a>
                           <a class="dropdown-item waves-effect" href="{{ route('support-delete', ['id' => $support->id]) }}"><i class="ti ti-trash me-1"></i> Delete</a>
                        </div>
                     </div>
                  </td>
               </tr>
               <div class="modal fade" id="useredit{{ $support->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel1">Edit Support</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('support-update', ['id' => $support->id]) }}" method="post">
                           @csrf
                           <input type="hidden" name="_method" value="PUT">
                           <div class="modal-body">
                              <div class="row mb-4">
                                 <div class="col">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" value="{{ $support->title }}" id="title" class="form-control" placeholder="Enter Title" required />
                                 </div>
                              </div>
                              <div class="row mb-4">
                                 <div class="col">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category" id="category" class="form-control" required>
                                    <option value="General technical support" {{ $support->category == 'General technical support' ? 'selected' : '' }}>General technical support</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="row mb-4">
                                 <div class="col">
                                    <label for="details" class="form-label">Details</label>
                                    <textarea name="details" id="details" class="form-control" placeholder="Enter Details" rows="5" cols="50" required>{{ $support->details }}</textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Update Support</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="modal fade" id="replyModal{{ $support->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title">Reply to Support Ticket</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('support-reply') }}" method="post">
                           @csrf
                           <input type="hidden" name="id" value="{{ $support->id }}"> <!-- Parent ID -->
                           <div class="modal-body">
                              <div class="mb-4">
                                 <label for="reply" class="form-label">Your Reply</label>
                                 <textarea name="reply" id="reply" class="form-control" placeholder="Enter your reply here..." rows="4" required
                                 @if($support->support_reply) readonly @endif>{{ $support->support_reply }}</textarea>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                              @if(!$support->support_reply)
                              <button type="submit" class="btn btn-primary">Send Reply</button>
                              @endif
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="modal fade" id="userreply{{ $support->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title">Reply of Support Ticket</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <div class="mb-4">
                              <label for="reply" class="form-label">Your Reply</label>
                              @if($support->support_reply)
                              <textarea name="reply" id="reply" class="form-control" placeholder="Enter your reply here..." rows="4" required readonly >{{ $support->support_reply }}</textarea>
                              @else
                              <p>No Reply Yet</p>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
@section('script')
<script src="public/assets/js/tables-datatables-advanced.js"></script>
@endsection