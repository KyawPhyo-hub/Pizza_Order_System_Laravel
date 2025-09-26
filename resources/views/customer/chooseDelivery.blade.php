@extends('customer.Layouts.theme')

@section('contents')
<section class="section" data-aos="fade-up">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Card -->
            <div class="border-0 shadow-lg card rounded-4">
                <div class="text-center text-white card-header rounded-top-4" style="background-color: #ceaf7f ">
                    <h4 class="mb-0">Choose Delivery Type</h4>
                </div>
                <div class="p-4 card-body">

                    <!-- Delivery Options -->
                    <form action="{{ route('customerStoreDeliveryType') }}" method="POST">
                        <input type="hidden" name="orderId" value="{{ $orderId }}">
                        @csrf
                        <div class="row g-4">
                            <!-- Home Delivery -->
                            <div class="col-md-6">
                                <div class="border-black card h-100 delivery-option" style="cursor: pointer;">
                                    <div class="text-center card-body">
                                        <i class="bi bi-truck fs-1 text-primary"></i>
                                        <h5 class="mt-3">Home Delivery</h5>
                                        <p class="text-muted small">
                                            Get your order delivered to your doorstep.
                                        </p>
                                        <input type="radio" class="mt-2 form-check-input @error('delivery_type') is-invalid @enderror" name="delivery_type" value="home_delivery"
                                        {{ old('delivery_type') == 'home_delivery' ? 'checked' : '' }}>
                                        @error('delivery_type')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Pick Up -->
                            <div class="col-md-6">
                                <div class="border-black card h-100 delivery-option" style="cursor: pointer;">
                                    <div class="text-center card-body">
                                        <i class="bi bi-shop fs-1 text-success"></i>
                                        <h5 class="mt-3">Pick Up</h5>
                                        <p class="text-muted small">
                                            Collect your order from our store.
                                        </p>
                                        <input type="radio" class="mt-2 form-check-input @error('delivery_type') is-invalid @enderror" name="delivery_type" value="pickup"
                                        {{ old('delivery_type') == 'pickup' ? 'checked' : '' }}>
                                        @error('delivery_type')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 row g-4">
                            <div class="col-md-6">
                                <label class=" form-label" for="address">Address</label>
                                <input type="text" name="address" id="address" placeholder="Enter your address" value="{{ old('address') }}" class="form-control address @error('address') is-invalid @enderror" disabled >
                                @error('address')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" id="" placeholder="Enter your phone number" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Continue Button -->
                        <div class="mt-4 text-center">
                            <button type="submit" class="px-5 py-2 btn rounded-pill" style="background-color: #ceaf7f; color: white;">
                                Continue
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>
</div>
</section>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.delivery-option').on('click', function(){
           let $radio = $(this).find('input[type=radio]');
                $radio.prop('checked', true);

            if($radio.val() === 'home_delivery'){
                $('.address').prop('disabled', false);
            }else{
                $('.address').prop('disabled', true);
                $('.address').val(''); // Clear the address input if not home delivery}
            }
        })

    })
</script>
@endsection
