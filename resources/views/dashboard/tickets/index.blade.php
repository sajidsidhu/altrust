@extends('.dashboard.dashboard')
@section('content')
    <div class="modal fade" id="usercreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('ticket-store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-control" style="background-color: #2D324A; color: white;">
                                    <option value="Update Personal Information">Update Personal Information</option>
                                    <option value="Change my Beneficiaries">Change my Beneficiaries</option>
                                    <option value="SIPP Bank Account Query">SIPP Bank Account Query</option>
                                    <option value="Benefits Enquiry or Change">Benefits Enquiry or Change</option>
                                    <option value="General Scheme Enquiry">General Scheme Enquiry</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="details" class="form-label">Details</label>
                                <textarea name="details" id="details" class="form-control" placeholder="Enter Details"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Ticket</button>
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
                        <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#usercreate" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                            <span><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="dt-responsive table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>User name</th>
                            <th>Email</th>
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
                        @foreach($tickets as $index => $ticket)
                            <tr>
                                @php
                                    $user = app\models\User::find($ticket->user_id);
                                @endphp
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <span class="fw-medium">{{ $ticket->title }}</span>
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{ $ticket->category }}</td>
                                <td>{{ $ticket->details }}</td>
                                @if(auth()->user()->role == 'admin')
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle {{ ($ticket->status === 'Pending' || !$ticket->status) ? 'bg-warning text-white' : 
                                            ($ticket->status === 'Open' ? 'bg-success text-white' : 'bg-danger text-white') }}" type="button" id="statusDropdown{{ $ticket->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ ucfirst($ticket->status ?? 'Pending') }}
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="statusDropdown{{ $ticket->id }}">
                                            <li><a class="dropdown-item" href="{{ route('ticketStatus', ['id' => $ticket->id, 'status' => 'Open']) }}" style="background: #919191 !important;">Open</a></li>
                                            <li><a class="dropdown-item" href="{{ route('ticketStatus', ['id' => $ticket->id, 'status' => 'Pending']) }}" style="background: #919191 !important;">Pending</a></li>
                                            <li><a class="dropdown-item" href="{{ route('ticketStatus', ['id' => $ticket->id, 'status' => 'Closed']) }}" style="background: #919191 !important;">Closed</a></li>
                                        </ul>
                                    </div>
                                </td>
                                @else
                                <td>
                                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userreply{{ $ticket->id }}">View Reply</a>
                                </td>
                                @endif
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item waves-effect" data-bs-toggle="modal" data-bs-target="#useredit{{ $ticket->id }}">
                                                <i class="ti ti-pencil me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item waves-effect" data-bs-toggle="modal" data-bs-target="#replyModal{{ $ticket->id }}"><i class="ti ti-message-circle me-1"></i> Reply </a>
                                            <a class="dropdown-item waves-effect" href="{{ route('ticket-delete', ['id' => $ticket->id]) }}" onclick="return confirm('Are you sure you want to delete this ticket?');">
                                                <i class="ti ti-trash me-1"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="useredit{{ $ticket->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Ticket</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('ticket-update', ['id' => $ticket->id]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" name="title" value="{{ $ticket->title }}" id="title" class="form-control" placeholder="Enter Title" />
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <label for="category" class="form-label">Category</label>
                                                        <select name="category" id="category" class="form-control" style="background-color: #2F3349; color: white;">
                                                            <option value="Update Personal Information" {{ $ticket->category == 'Update Personal Information' ? 'selected' : '' }}>Update Personal Information</option>
                                                            <option value="Change my Beneficiaries" {{ $ticket->category == 'Change my Beneficiaries' ? 'selected' : '' }}>Change my Beneficiaries</option>
                                                            <option value="SIPP Bank Account Query" {{ $ticket->category == 'SIPP Bank Account Query' ? 'selected' : '' }}>SIPP Bank Account Query</option>
                                                            <option value="Benefits Enquiry or Change" {{ $ticket->category == 'Benefits Enquiry or Change' ? 'selected' : '' }}>Benefits Enquiry or Change</option>
                                                            <option value="General Scheme Enquiry" {{ $ticket->category == 'General Scheme Enquiry' ? 'selected' : '' }}>General Scheme Enquiry</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <label for="details" class="form-label">Details</label>
                                                        <textarea name="details" id="details" class="form-control" placeholder="Enter Details">{{ $ticket->details }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update Ticket</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="replyModal{{ $ticket->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Reply to Support Ticket</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                       <form action="{{ route('ticket-reply') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $ticket->id }}">
                                            <div class="modal-body">
                                                <div class="mb-4">
                                                    <label for="reply" class="form-label">Your Reply</label>
                                                    <textarea name="reply" id="reply" class="form-control" placeholder="Enter your reply here..." rows="4" required
                                                        @if($ticket->ticket_reply) readonly @endif>{{ $ticket->ticket_reply }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                                @if(!$ticket->ticket_reply)
                                                    <button type="submit" class="btn btn-primary">Send Reply</button>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                             <div class="modal fade" id="userreply{{ $ticket->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Reply of Support Ticket</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-4">
                                                <label for="reply" class="form-label">Your Reply</label>
                                                @if($ticket->ticket_reply)
                                                <textarea name="reply" id="reply" class="form-control" placeholder="Enter your reply here..." rows="4" required readonly >{{ $ticket->ticket_reply }}</textarea>
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