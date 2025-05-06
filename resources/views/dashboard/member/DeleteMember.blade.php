@extends('.dashboard.dashboard')
@section('content')
    <div class="row">
        <h3>Deleted Members</h3>
        <div class="card mb-4">
            <div class="card-datatable table-responsive">
                <table class="dt-responsive table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Country</th>
                            <th>Status</th>
                            <th>Deleted At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deletedMembers as $index => $member)
                            @php
                                $user = \App\Models\User::find($member->role);
                            @endphp
                            <tr>
                                <td>{{ $index + 1 }} </td>
                                <td><span class="fw-medium">{{ $member->surname }}</span></td>
                                <td>{{ $user->role ?? 'No Role Assigned' }}</td>
                                <td>{{ $member->country }}</td>
                                <td><span class="badge bg-danger">Deleted</span></td>
                                <td>{{ $member->deleted_at->format('Y-m-d H:i:s') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('member-restore', $member->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to restore this member?');">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="dropdown-item waves-effect"><i class="ti ti-restore me-1"></i> Restore</button>
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
        <h4>FPT Deleted Members</h4>
        <div class="card mb-4">
            <div class="card-datatable table-responsive">
                <table class="dt-responsive table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deletedFpt as $index => $Fpt)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><span class="fw-medium">{{ $Fpt->scheme_name }}</span></td>
                                <td>{{ $Fpt->email }}</td>
                                <td>{{ $Fpt->country }} </td>
                                <td>{{ $Fpt->created_at }}</td>
                                <td>
                                    <span class="badge bg-danger">Deleted</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('fpt-restore', $Fpt->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="dropdown-item waves-effect">
                                                    <i class="ti ti-restore me-1"></i> Restore
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