@extends('customer.Layouts.master');
@section('contents')
    <section id="booking-list" class="booking-list section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="section-title">
                <h2>Order List</h2>
                <p class="" style="color: #ceaf7f">Click the order code to view your order details</p>
            </div>

            <div class="row">
                @if ($orders->isEmpty())
                    <div class="text-center col-12">
                        <p>No order found.</p>
                    </div>
                @else
                    <div class="table-container">
                        <div class="">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="col">Date</th>
                                        <th class="col">Name</th>
                                        <th class="col">Order Code</th>
                                        <th class="col">Total</th>
                                        <th class="col">Payment Type</th>
                                        <th class="col">Payment Status</th>
                                        <th class="col">Delivery Type</th>
                                        <th class="col">Address</th>
                                        <th class="col">Phone</th>
                                        <th class="col">Status</th>
                                        {{-- <th class="col">Handle</th> --}}
                                    </tr>
                                </thead>
                                @foreach ($orders as $index => $order)
                                    <tbody>
                                        <tr>
                                            {{-- <th>{{ $index + 1 }}</th> --}}
                                            <th>{{ $order->created_at->format('d-m-y') }}</th>
                                            <td>{{ auth()->user()->name }}</td>
                                            <td><a href="{{ route('customerOrderDetails', $order->id) }}"
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
                                                @if ($order->status == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($order->status == 'confirm')
                                                    <span class="badge bg-info">Confirmed</span>
                                                @elseif($order->status == 'ready')
                                                    <span class="badge" style="background-color: orange">Ready</span>
                                                @elseif($order->status == 'delivered')
                                                    <span class="badge bg-success">Delivered</span>
                                                @elseif($order->status =='pickedup')
                                                    <span class="badge bg-success">Picked Up</span>
                                                @elseif($order->status == 'cancel')
                                                    <span class="badge bg-danger">Cancelled</span>
                                                @endif
                                            </td>
                                            {{-- <td>
                                            <button class="mt-4 border btn btn-md rounded-circle bg-light">
                                                <i class="fa-solid fa-eye"></i></i>
                                            </button>
                                        </td> --}}
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
