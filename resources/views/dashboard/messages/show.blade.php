@extends('dashboard.dashboard')
@section('content')
<div class="container mt-4">
    <h4 class="mb-4 text-primary fw-bold">📢 Notifications</h4>
    @if($notifications->isEmpty())
        <div class="alert alert-warning text-center">
            <i class="bi bi-info-circle"></i> No notifications found.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-3">
                <ul class="list-group list-group-flush">
                    @foreach($notifications as $notification)
                        @if($notification->status == 'unseen')
                            @php
                                $createdAt = \Carbon\Carbon::parse($notification->created_at);
                                $isNew = $createdAt->diffInHours(now()) < 24;
                            @endphp
                            <li class="list-group-item py-3">  {{-- Added padding for spacing --}}
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="fw-bold text-dark">
                                            {{ $notification->message }}
                                        </h6>
                                        <p class="mb-2 text-muted">
                                            {{ $notification->body }}
                                        </p>
                                        <small class="text-secondary">
                                            📅 {{ $createdAt->format('d-m-Y') }} ⏰ {{ $createdAt->format('h:i A') }}
                                        </small>
                                    </div>
                                    <div class="text-end ms-3">
                                        <div class="text-end ms-3">
                                            @if($isNew)
                                                <span class="badge bg-danger mb-2">New</span><br>
                                            @endif
                                            <a href="{{ route('change-message-status', ['id' => $notification->id, 'status' => 'seen']) }}" class="btn btn-sm btn-secondary"> Mark as Seen</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <hr class="my-3">
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
@endsection