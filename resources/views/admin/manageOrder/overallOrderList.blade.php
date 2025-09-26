@extends('admin.Layout.master')
@section('content')
    <section id="booking-list" class="section">
        <div class="container">
            <div class="mb-3 text-center section-title">
                <h2>Overall Order List</h2>
                <p class="" style="color: #ceaf7f">Click the order code to view order details</p>
            </div>
            {{-- Search bar start --}}
            <form method="GET" action="{{ route('adminOverallOrderList') }}" class="mb-3">
                <div class="row g-2 align-items-center">
                    <div class="col-8"></div>
                  <div class="col-auto">
                    <input type="text" name="search" value="{{old( $search ?? '') }}" class="form-control" style="width: 300px"
                           placeholder="Search orders…">
                  </div>
                  <div class="col-auto">
                    <button class="btn btn-primary" type="submit">Search</button>
                    {{-- <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">Clear</a> --}}
                  </div>
                </div>
              </form>



            {{-- Search bar end --}}
            <div class="row">
                @if ($orders->isEmpty())
                    <div class="text-center col-12">
                        <p>No order found.</p>
                    </div>
                @else
                    <div class="table-container table-responsive">
                        <table class="table table-bordered table-striped ">
                            <thead>
                                <tr class="">
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Order Code</th>
                                    <th>Total</th>
                                    <th>Payment Type</th>
                                    <th>Payment Status</th>
                                    <th>Delivery Type</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    {{-- <th class="col">Handle</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <th>{{ $order->created_at->format('d-M-Y') }}</th>
                                        <td>{{ $order->user_name }}</td>
                                        <td><a href="{{ route('adminOrderDetails', $order->id) }}"
                                                class=" text-decoration-none">{{ $order->order_code }}</a></td>
                                        <td>${{ $order->total_price }}</td>
                                        <td>
                                            @if ($order->payment_method == 'cod')
                                                <span>Cash On delivery</span>
                                            @elseif($order->payment_method == 'cop')
                                                <span>Cash on Pickup</span>
                                            @elseif($order->payment == 'paypal')
                                                <span>PayPal</span>
                                            @elseif($order->payment == 'credit_card')
                                                <span>Credit Card</span>
                                            @elseif($order->payment == 'mobile_banking')
                                                <span>Mobile Banking</span>
                                            @else
                                                <span>Unknown</span>
                                            @endif

                                        </td>
                                        <td>
                                            @if ($order->payment_status == 'paid')
                                                <span class="badge bg-success">Paid</span>
                                            @elseif($order->payment_status == 'unpaid')
                                                <span class="badge bg-danger">Unpaid</span>
                                            @elseif($order->payment_status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @else
                                                <span class="badge bg-secondary">Unknown</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->delivery_type == 'pickup')
                                                <span class="">Pickup</span>
                                            @elseif($order->delivery_type == 'home_delivery')
                                                <span class="">Home Delivery</span>
                                            @else
                                                <span class="">Unknown</span>
                                            @endif
                                        </td>
                                        <td>{{ $order->delivery_address ?? 'N/A' }}</td>
                                        <td>{{ $order->phone_number }}</td>
                                        <td>
                                            @if($order->delivery_type == 'home_delivery')
                                            <select name="" class=" form-select status" id="">
                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="confirm" {{ $order->status == 'confirm' ? 'selected' : '' }}>
                                                    Confirm</option>
                                                <option value="ready" {{ $order->status == 'ready' ? 'selected' : '' }}>
                                                    Ready</option>
                                                <option value="delivered"
                                                    {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered
                                                </option>
                                                <option value="cancel" {{ $order->status == 'cancel' ? 'selected' : '' }}>
                                                    Cancel</option>
                                            </select>
                                            @elseif($order->delivery_type == 'pickup')
                                            <select name="" class=" form-select status" id="">
                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="confirm" {{ $order->status == 'confirm' ? 'selected' : '' }}>
                                                    Confirm</option>
                                                <option value="ready" {{ $order->status == 'ready' ? 'selected' : '' }}>
                                                    Ready</option>
                                                <option value="pickedup"
                                                    {{ $order->status == 'pickedup' ? 'selected' : '' }}>Picked Up
                                                </option>
                                                <option value="cancel" {{ $order->status == 'cancel' ? 'selected' : '' }}>
                                                    Cancel</option>
                                            </select>
                                            @endif
                                        </td>
                                        {{-- <td>
                                        <button class="mt-4 border btn btn-md rounded-circle bg-light">
                                            <i class="fa-solid fa-eye"></i></i>
                                        </button>
                                    </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
    </section>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        function updateSelectColor($select) {
            const value = $select.val();
            switch (value) {
                case 'pending':
                    $select.css({
                        'background-color': '#f8d7da',
                        'color': '#721c24'
                    });
                    break;
                case 'confirm':
                    $select.css({
                        'background-color': '#d1ecf1',
                        'color': '#0c5460'
                    });
                    break;
                case 'ready':
                    $select.css({
                        'background-color': '#fff3cd',
                        'color': '#856404'
                    });
                    break;
                case 'delivered':
                case 'pickedup':
                    $select.css({
                        'background-color': '#d4edda',
                        'color': '#155724'
                    });
                    break;
                case 'cancel':
                    $select.css({
                        'background-color': '#f5c6cb',
                        'color': '#721c24'
                    });
                    break;
                default:
                    $select.css({
                        'background-color': '',
                        'color': ''
                    });
            }
        }

        // Initial color for all selects
        $('.status').each(function() {
            updateSelectColor($(this));
        });

        // Handle change for AJAX and color update
        $('.status').change(function() {
            var $this = $(this);
            var status = $this.val();
            var $row = $this.closest('tr');
            var orderCode = $row.find('td:nth-child(3) a').text();

            // Update color immediately
            updateSelectColor($this);

            // Determine payment_status
            var paymentStatus = '';
            if (status === 'delivered' || status === 'pickedup') {
                paymentStatus = 'paid';
            }

            // Prepare data
            let data = {
                _token: '{{ csrf_token() }}',
                orderCode: orderCode,
                status: status
            };
            if (paymentStatus) {
                data.payment_status = paymentStatus;
            }

            // Send AJAX request
            $.ajax({
                url: '{{ route('adminUpdateOrderStatus') }}',
                method: 'POST',
                data: data,
                success: function(response) {
                    if (response.success) {
                        // Update payment_status cell in the table dynamically
                        // if(paymentStatus) {
                        //     // Assuming payment_status is in column 4 (adjust if needed)
                        //     $row.find('td:nth-child(6)').text(paymentStatus.charAt(0).toUpperCase() + paymentStatus.slice(1));
                        // }
                        // Reload the page to reflect changes

                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        location.reload();
                    }
                }
            });
        });

    });
</script>
@endsection
