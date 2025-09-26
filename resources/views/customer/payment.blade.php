@extends('customer.layouts.theme')
@section('contents')
<section class="section" data-aos="fade-up">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Notice -->
                <div class="text-center shadow-sm alert alert-warning">
                    <strong>Notice:</strong> We’re very sorry 😔. Currently, only <b>Cash on Delivery</b> is available.
                </div>

                <!-- Card -->
                <div class="shadow-lg card rounded-3">
                    <div class="text-center text-white card-header rounded-top-3" style="background-color: #ceaf7f;">
                        <h4>Choose Payment Method</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('customerStorePayment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="orderId" value="{{ $orderId }}">
                            <!-- Cash on Delivery Option -->
                            @if($order->delivery_type == 'home_delivery')
                            <div class="p-3 mb-3 border-black form-check rounded-3">
                                <input class="form-check-input" type="radio"
                                       name="payment_method" id="cod" value="cod" checked>
                                <label class="form-check-label fw-bold" for="cod">
                                    Cash on Delivery
                                </label>
                                <p class="mb-0 small text-muted">Pay with cash when your order arrives at your address.</p>
                            </div>
                            @else
                            {{-- Cash on Pickup --}}
                            <div class="p-3 mb-3 border-black form-check rounded-3">
                                <input class="form-check-input" type="radio"
                                       name="payment_method" id="cop" value="cop" checked>
                                <label class="form-check-label fw-bold" for="cop">
                                    Cash on Pickup
                                </label>
                                <p class="mb-0 small text-muted">Pay with cash when you pickup your order.</p>
                            </div>
                            @endif

                            <!-- Disabled Options (future gateways) -->
                            <div class="p-3 mb-3 border opacity-50 form-check rounded-3">
                                <input class="form-check-input" type="radio"
                                       name="payment_method" id="paypal" value="paypal" disabled>
                                <label class="form-check-label fw-bold" for="paypal">
                                    PayPal (Coming Soon)
                                </label>
                            </div>

                            <div class="p-3 mb-3 border opacity-50 form-check rounded-3">
                                <input class="form-check-input" type="radio"
                                       name="payment_method" id="credit_card" value="credit_card" disabled>
                                <label class="form-check-label fw-bold" for="credit_card">
                                    Credit / Debit Card (Coming Soon)
                                </label>
                            </div>

                            {{-- Mobile Banking --}}
                            <div class="p-3 mb-3 border opacity-50 form-check rounded-3">
                                <input class="form-check-input" type="radio"
                                       name="payment_method" id="mobile_banking" value="mobile_banking" disabled>
                                <label class="form-check-label fw-bold" for="mobile_banking">
                                    Mobile Banking (Coming Soon)
                                </label>
                            </div>

                            <!-- Continue Button -->
                            <div class="mt-4 text-center">
                                <button type="submit" class="px-4 btn" style="background-color: #ceaf7f; color: white;">
                                    Continue
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection