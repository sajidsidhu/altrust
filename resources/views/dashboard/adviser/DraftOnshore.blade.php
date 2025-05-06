@extends('dashboard.dashboard')

@section('content')


    <div class="row">
        <div class="card">
            <h5 class="card-header">Onshore Draft</h5>
            <div class="card-datatable table-responsive">
                <table class="dt-responsive table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Company Name</th>
                            <th>Trading Names</th>
                            <th>Country</th>
                 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        
                        @foreach($draftAdviser as $adviser2)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="fw-medium">{{ $adviser2->company_name }}</span></td>
                                <td>{{ $adviser2->trading_name }}</td>
                                <td>{{ $adviser2->country }}</td>
                            
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item waves-effect" href="{{ route('draftOnshore-continue', ['id' => $adviser2->id]) }}"><i class="ti ti-pencil me-1"></i> Continue</a>
                        

                                            @if (!$adviser2->deleted_at)
                                                <form action="{{ route('draftOnshore-delete', ['id' => $adviser2->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this adviser?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item waves-effect"><i class="ti ti-trash me-1"></i> Delete</button>
                                                </form>
                                            @else
                                                <span class="dropdown-item disabled"><i class="ti ti-trash me-1"></i> Deleted</span>
                                            @endif
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
    <div class="row my-5">
        <div class="card">
            <h5 class="card-header">Offshore Draft</h5>
            <div class="card-datatable table-responsive">
                <table class="dt-responsive table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Company Name</th>
                            <th>Trading as</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offshore as $adviser)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="fw-medium">{{ $adviser->company_name }}</span></td>
                                <td>{{ $adviser->trading_as }}</td>
                                <td>{{ $adviser->type }}</td>
                            
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item waves-effect" href="{{ route('draftOffshore-continue', ['id' => $adviser->id]) }}"><i class="ti ti-pencil me-1"></i> Continue</a>
                        

                                            @if (!$adviser->deleted_at)
                                                <form action="{{ route('draftOffshore-delete', ['id' => $adviser->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this adviser?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item waves-effect"><i class="ti ti-trash me-1"></i> Delete</button>
                                                </form>
                                            @else
                                                <span class="dropdown-item disabled"><i class="ti ti-trash me-1"></i> Deleted</span>
                                            @endif
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

@section('script')
    <script src="{{ asset('assets/js/tables-datatables-advanced.js') }}"></script>
@endsection
