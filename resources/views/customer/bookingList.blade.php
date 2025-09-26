@extends('customer.Layouts.master');
@section('contents')
    <section id="booking-list" class="booking-list section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="section-title">
                <h2>Booking List</h2>
                <p>Your Reservations</p>
            </div>

            <div class="row">
                @if($bookings->isEmpty())
                    <div class="text-center col-12">
                        <p>No bookings found.</p>
                    </div>
                @else
                <div class="table-container">
                    <div class="">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col">Booking ID</th>
                                    <th class="col">Customer Name</th>
                                    <th class="col">Phone Number</th>
                                    <th class="col">Reservation Date</th>
                                    <th class="col">Reservation Time</th>
                                    <th class="col">Number of Guests</th>
                                    <th class="col">Status</th>
                                </tr>
                            </thead>
                            @foreach ($bookings as $booking)
                                <tbody>
                                    <tr>
                                        <th>{{ $booking->booking_id }}</th>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->phone }}</td>
                                        <td>{{ $booking->booking_date }}</td>
                                        <td>{{ $booking->booking_time }}</td>
                                        <td>{{ $booking->guests }}</td>
                                        <td>
                                            @if($booking->status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($booking->status == 'confirmed')
                                                <span class="badge bg-success">Confirmed</span>
                                            @elseif($booking->status == 'cancelled')
                                                <span class="badge bg-danger">Cancelled</span>
                                            @endif
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>

                </div>

                @endif
            </div>
        </div>

    </section>
@endsection