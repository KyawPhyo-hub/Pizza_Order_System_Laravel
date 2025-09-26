@extends('customer.Layouts.theme')

@section('contents')
<section class="py-5 container-fluid section" data-aos="fade-up">
    <div class="container py-3">
        <div class="container section-title" data-aos="fade-up">
            <h2>Order Details</h2>
            <p>Your order details</p>
            @switch($orders->status)
                @case('pending')
                    <p class="text-warning">🕒 “Your order is pending and waiting for confirmation.”</p>
                    @break
                @case('confirm')
                    <p class="text-info">✅ “Your order has been confirmed and is being prepared.”</p>
                    @break
                @case('ready')
                    <p class="" style="color: orange">🍽️ “Your order is ready for pickup or delivery.”</p>
                    @break
                @case('delivered')
                    <p class="text-success">🚚 “Your order has been delivered. Enjoy your meal!”</p>
                    @break
                @case('picked')
                    <p class="text-success">🏃‍♂️ “Your order has been picked up. Enjoy your meal!”</p>
                    @break
                @case('cancel')
                    <p class="text-danger">❌ “Your order has been canceled. If you have any questions, please contact support.”</p>
                    @break
                @default

            @endswitch
        </div>
        <div class="mb-3 row g-4 justify-content-end " data-aos="fade-up" data-aos="delay="100>
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="text-black bg-white border border-black rounded">
                    <div class="p-4">
                        <div class="mb-3 d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Name:</h5>
                            <p class="mb-0" id="subTotal">{{ auth()->user()->name }}</p>
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Order Code</h5>
                            <div class="">
                                <p class="mb-0">{{ $order['0']['order_code'] }}</p>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Delivery Type</h5>
                            <div class="">
                                @if($orders->delivery_type == 'home_delivery')
                                <p class="mb-0">Home Delivery</p>
                                @elseif($orders->delivery_type == 'pickup')
                                <p class="mb-0">Pickup</p>
                                @else
                                <p class="mb-0">Unknown</p>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Total</h5>
                            <div class="">
                                <p class="mb-0">${{ $orders->total_price }}</p>
                                {{-- <small class="text-danger">(Total includes $3 delivery fee.)</small> --}}
                            </div>
                        </div>
                        @if($orders->delivery_type == 'home_delivery')
                        <small class="mb-0 text-end text-danger">(Total includes $3 delivery fee)</small>
                        @endif
                    </div>
                    <a href="{{ route('customerOrderList') }}"
                        class="px-3 py-2 mb-4 border-2 btn btn-sm rounded-pill text-uppercase ms-4 processCheckout"
                        type="button" style="border-color: #ceaf7f; coler: #ceaf7f">
                        Back
                    </a>

                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table" id="cart-table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Toppings</th>
                        <th scope="col">Topping total price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    @if ($item['imagePath'])
                                        <img src="{{ asset($item['imagePath']) }}" class="img-fluid me-5 rounded-circle"
                                            style="width: 80px; height: 80px;" alt="">
                                    @else
                                        <img src="{{ asset('uploads/menudef/question mark.jpg') }}"
                                            class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;"
                                            alt="">
                                    @endif
                                </div>
                            </th>
                            <td>
                                <p class="mt-4 mb-0">{{ $item['name'] }}</p>
                            </td>
                            <td>
                                <p class="mt-4 mb-0 price" data-price="{{ $item['price'] }}">${{ $item['price'] }}</p>
                            </td>
                            <td>
                                @if (count($item['toppings']) > 0)
                                    <ul class="mb-0 topping-list'">
                                        @foreach ($item['toppings'] as $top)
                                            <li data-topping-id="{{ $top->id }}"
                                                data-price = "{{ $top->price }}">
                                                <span class="topping_name">{{ $top->name }}</span>
                                                <span class="topping_price">(${{ $top->price }})</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="mt-4 mb-0 text-muted">No toppings</p>
                                @endif
                            </td>
                            @php
                                $toppingTotal = collect($item['toppings'])->sum('price');

                            @endphp
                            <td class="toppingTotal" data-unittopping="{{ $toppingTotal }}">
                                <p
                                    class="mt-4 mb-0 toppingAmount">${{ number_format($toppingTotal * $item['quantity'], 2) }}</p>
                            </td>


                            <td>
                                <p class="mt-4 mb-0">{{ $item['quantity'] }}</p>
                            </td>
                            <td>
                                <p class="mt-4 mb-0 unitTotal" id="">
                                    ${{ ($item['price'] + $toppingTotal) * $item['quantity'] }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- @php
                $subtotal = 0;
                foreach ($carts as $item) {
                    $toppingTotal = collect($item['toppings'])->sum('price');
                    $subtotal += ($item['price'] + $toppingTotal) * $item['quantity'];
                }
            @endphp --}}
        </div>
        {{-- <div class="row g-4 justify-content-end ">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="text-black bg-white border border-black rounded">
                    <div class="p-4">
                        <h3 class="mb-4 display-6">Cart <span class="fw-normal">Total</span></h3>
                        <div class="mb-4 d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Subtotal:</h5>
                            <p class="mb-0" id="subTotal">${{ $subtotal }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Discount</h5>
                            <div class="">
                                <p class="mb-0">$0.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Total</h5>
                        <p class="mb-0 pe-4" id="grandTotal">${{ $subtotal }}</p>
                    </div>
                    <button
                        class="px-4 py-3 mb-4 border-2 btn rounded-pill text-uppercase ms-4 processCheckout"
                        {{ count($carts) == 0 ? 'disabled' : '' }} type="button" style="border-color: #ceaf7f; coler: #ceaf7f">
                        Proceed Checkout
                    </button>

                </div>
            </div>
        </div> --}}
    </div>
</section>
@endsection

