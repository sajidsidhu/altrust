@extends('.dashboard.dashboard')
@section('content')
<div class="modal fade" id="usercreate" tabindex="-1" aria-hidden="true">
</div>
<div class="row px-2">
   <h3>Pending Members</h3>
   <div class="card mb-4">
      <div class="card-datatable table-responsive">
         <table class="dt-responsive table">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Scheme Name</th>
                  <th>Role</th>
                  <th>Country</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($pendingMembers as $index => $member)
               @php
               $user = \App\Models\User::find($member->role);
               @endphp
               <tr>
                  <td>{{ $index + 1 }}</td>
                  <td><span class="fw-medium">{{ $member->surname }}</span></td>
                  <td>{{ $user->role ?? 'No Role Assigned'  ?? 'No Role Assigned' }}</td>
                  <td>{{ $member->country }}</td>
                  <td>
                     <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle {{ $member->status === 'active' ? 'bg-success text-white' : 'bg-warning text-white' }}" type="button" id="statusDropdown{{ $member->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ ucfirst($member->status) }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="statusDropdown{{ $member->id }}">
                           <li>
                              <a class="dropdown-item" href="{{ route('change-member-status', ['id' => $member->id, 'status' => 'pending']) }}" style="background: #919191 !important;">
                              Pending
                              </a>
                           </li>
                           <li>
                              <a class="dropdown-item" href="{{ route('change-member-status', ['id' => $member->id, 'status' => 'active']) }}" style="background: #919191 !important;">
                              Active
                              </a>
                           </li>
                           <li>
                              <a class="dropdown-item" href="{{ route('change-member-status', ['id' => $member->id, 'status' => 'decline']) }}" style="background: #919191 !important;">
                              Decline
                              </a>
                           </li>
                        </ul>
                     </div>
                  </td>
                  <td>
                     <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item waves-effect" href="{{ route('member-application-edit', ['id' => $member->id]) }}">
                           <i class="ti ti-pencil me-1"></i> Edit
                           </a>
                           <a class="dropdown-item waves-effect" href="{{ route('member-application-view', ['id' => $member->id]) }}">
                           <i class="ti ti-eye me-1"></i> Show
                           </a>
                           <a class="dropdown-item waves-effect" href="{{ route('comment.index', ['id' => $member->id]) }}"><i class="ti ti-message-2"></i> Note</a>
                           <form action="{{ route('member-delete', $member->id) }}" method="POST" style="display: inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="dropdown-item waves-effect" onclick="return confirm('Are you sure you want to delete this member?');">
                              <i class="ti ti-trash me-1"></i> Delete
                              </button>
                           </form>
                        </div>
                     </div>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
   <div class="card my-5">
      <h5 class="py-4">FPT Table</h5>
      <div class="card-datatable table-responsive">
         <table class="dt-responsive table">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Scheme Name</th>
                  <th>Role</th>
                  <th>Country</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($fptPendingMembers as $index => $member)
               @php
               $user = \App\Models\User::find($member->name);
               @endphp
               <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $member->scheme_name }}</td>
                  <td>{{ $member->user->role_member ?? 'No Role Assigned' }}</td>
                  <td>{{ $member->country }}</td>
                  <td>
                     <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle {{ $member->status === 'active' ? 'bg-success text-white' : 'bg-warning text-white' }}" type="button" id="statusDropdown{{ $member->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ ucfirst($member->status) }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="statusDropdown{{ $member->id }}">
                           <li>
                              <a class="dropdown-item" href="{{ route('change-fpt-status', ['id' => $member->id, 'status' => 'pending']) }}" style="background: #919191 !important;">
                              Pending
                              </a>
                           </li>
                           <li>
                              <a class="dropdown-item" href="{{ route('change-fpt-status', ['id' => $member->id, 'status' => 'active']) }}" style="background: #919191 !important;">
                              Active
                              </a>
                           </li>
                           <li>
                              <a class="dropdown-item" href="{{ route('change-fpt-status', ['id' => $member->id, 'status' => 'decline']) }}" style="background: #919191 !important;">
                              Decline
                              </a>
                           </li>
                        </ul>
                     </div>
                  </td>
                  <td>
                     <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item waves-effect" href="{{ route('fpt-edit', ['id' => $member->id]) }}">
                           <i class="ti ti-pencil me-1"></i> Edit
                           </a>
                           <a class="dropdown-item waves-effect" href="{{ route('fpt-view', ['id' => $member->id]) }}">
                           <i class="ti ti-eye me-1"></i> Show
                           </a>
                           <a class="dropdown-item waves-effect" href="{{ route('comment.index', ['id' => $member->id]) }}"><i class="ti ti-message-2"></i> Note</a>
                           <form action="{{ route('delete-fpt', $member->id) }}" method="POST" style="display: inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="dropdown-item waves-effect" onclick="return confirm('Are you sure you want to delete this member?');">
                              <i class="ti ti-trash me-1"></i> Delete
                              </button>
                           </form>
                        </div>
                     </div>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection