@extends('admin.Layout.theme')

@section('content')
<div class="py-4 booking-details-section">
    <div class="container">
        <div class="mb-4 text-center section-title">
            <h2>Booking Details</h2>
            <p style="color: #ceaf7f">All information related to this booking</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="border-0 shadow-sm card">
                    <div class="text-white card-header bg-primary">
                        <h5 class="mb-0"><i class="fas fa-ticket-alt me-2"></i>Booking ID: {{ $booking->booking_id }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-6 fw-bold"><i class="fas fa-user me-2"></i>Name:</div>
                            <div class="col-6">{{ $booking->name }}</div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-6 fw-bold"><i class="fas fa-user-tag me-2"></i>User ID:</div>
                            <div class="col-6">{{ $booking->user_id }}</div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-6 fw-bold"><i class="fas fa-envelope me-2"></i>Email:</div>
                            <div class="col-6">{{ $booking->email }}</div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-6 fw-bold"><i class="fas fa-phone me-2"></i>Phone:</div>
                            <div class="col-6">{{ $booking->phone }}</div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-6 fw-bold"><i class="fas fa-users me-2"></i>Guests:</div>
                            <div class="col-6">{{ $booking->guests }}</div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-6 fw-bold"><i class="fas fa-calendar-alt me-2"></i>Booking Date:</div>
                            <div class="col-6">{{ $booking->booking_date }}</div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-6 fw-bold"><i class="fas fa-clock me-2"></i>Booking Time:</div>
                            <div class="col-6">{{ $booking->booking_time }}</div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-6 fw-bold"><i class="fas fa-comment-alt me-2"></i>Special Request:</div>
                            <div class="col-6">{{ $booking->special_request ?? '-' }}</div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-6 fw-bold"><i class="fas fa-info-circle me-2"></i>Status:</div>
                            <div class="col-6">
                                <span class="badge
                                    @if($booking->status == 'pending') bg-warning
                                    @elseif($booking->status == 'confirm') bg-success
                                    @elseif($booking->status == 'cancel') bg-danger
                                    @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                        </div>


                        {{-- <div class="mb-3 row">
                            <div class="col-6 fw-bold"><i class="fas fa-calendar-check me-2"></i>Created At:</div>
                            <div class="col-6">{{ $booking->created_at->format('d M Y, h:i A') }}</div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-6 fw-bold"><i class="fas fa-sync-alt me-2"></i>Updated At:</div>
                            <div class="col-6">{{ $booking->updated_at->format('d M Y, h:i A') }}</div>
                        </div> --}}

                        <div class="mt-4 text-center">
                            <a href="{{ route('adminOverallBookingList') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Bookings
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
