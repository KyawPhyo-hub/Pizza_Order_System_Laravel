@extends('admin.Layout.master')
@section('content')
<div class="todaybookingsection">
    <div class="container">
        <div class="mb-3 text-center section-title">
            <h2>Weekly Bookings</h2>
            <p style="color: #ceaf7f">Click the booking id to view order details</p>
        </div>

        <form method="GET" action="" class="mb-3">
            <div class="row g-2 align-items-center">
                <div class="col-8"></div>
                <div class="col-auto">
                    <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control" style="width: 300px" placeholder="Search bookings…">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>

        <div class="row">
            @if ($bookings->isEmpty())
                <div class="text-center col-12">
                    <p>No booking found.</p>
                </div>
            @else
                <div class="table-container table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>BookingID</th>
                                <th>Phone</th>
                                <th>No of Guest</th>
                                <th>Booking Date</th>
                                <th>Booking Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    {{-- <th>{{ $loop->iteration }}</th> --}}
                                    <th>{{ $booking->created_at->format('d-M-y') }}</th>
                                    <td>{{ $booking->name }}</td>
                                    <td>
                                        <a href="{{ route('adminBookingDetails', $booking->id) }}" class="text-decoration-none bookingId" data-id="{{ $booking->booking_id }}">
                                            {{ $booking->booking_id }}
                                        </a>
                                    </td>
                                    <td>{{ $booking->phone }}</td>
                                    <td>{{ $booking->guests }}</td>
                                    <td>{{ $booking->booking_date }}</td>
                                    <td>{{ $booking->booking_time }}</td>
                                    <td>
                                        <select class="form-select status">
                                            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirm" {{ $booking->status == 'confirm' ? 'selected' : '' }}>Confirm</option>
                                            <option value="cancel" {{ $booking->status == 'cancel' ? 'selected' : '' }}>Cancel</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {

    // Update select colors based on value
    function updateSelectColor($select) {
        const value = $select.val();
        switch(value) {
            case 'pending':
                $select.css({'background-color':'#f8d7da','color':'#721c24'});
                break;
            case 'confirm':
                $select.css({'background-color':'#d1ecf1','color':'#0c5460'});
                break;
            case 'cancel':
                $select.css({'background-color':'#f5c6cb','color':'#721c24'});
                break;
            default:
                $select.css({'background-color':'','color':''});
        }
    }

    // Initialize colors
    $('.status').each(function() {
        updateSelectColor($(this));
    });

    // Handle change event
    $('.status').change(function() {
        const $select = $(this);
        const status = $select.val();
        const bookingId = $select.closest('tr').find('.bookingId').data('id');

        updateSelectColor($select);

        $.ajax({
            url: "{{ route('adminUpdateBookingStatus') }}",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify({
                _token: '{{ csrf_token() }}',
                status: status,
                bookingId: bookingId
            }),
            success: function(response) {
                if(response.success){
                    Swal.fire({
                        icon: 'success',
                        title: 'Status Updated',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                } else {
                    alert(response.message || 'Failed to update status.');
                }
            },
            error: function(xhr){
                console.error(xhr.responseText);
                alert('Server error. Check console for details.');
            }
        });
    });
});
</script>
@endsection
