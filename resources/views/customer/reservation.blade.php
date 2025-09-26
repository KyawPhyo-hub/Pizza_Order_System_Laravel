@extends('customer.Layouts.master')
@section('contents')
    <!-- Book A Table Section -->
    <section id="book-a-table" class="book-a-table section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="mb-5 row gy-5">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="reservation-info">
                        <div class="text-content">
                            <h3>Book Your Table</h3>
                            <p>Guarantee your spot for an unforgettable dining experience. Reserve now to enjoy our
                                authentic pizzas and warm atmosphere.</p>
                            <p class="small-text text-danger">We recommend making reservations at least 48 hours in advance
                            </p>

                            <div class="mt-4 reservation-details">
                                <div class="detail-item">
                                    <i class="bi bi-clock"></i>
                                    <div>
                                        <h5>Opening Hours</h5>
                                        <p>Monday - Friday: 11:00 AM - 11:00 PM<br>
                                            Saturday - Sunday: 10:00 AM - 12:00 AM</p>
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>
                                        <h5>Location</h5>
                                        <p>29 Dibuk Rd, Talad Yai, Mueang Phuket District, Phuket 83000</p>
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <i class="bi bi-telephone"></i>
                                    <div>
                                        <h5>Call Us</h5>
                                        <p>+66 (9) 9504-5447</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="reservation-image">
                        <img src="assets/img/restaurant/showcase-7.webp" alt="Restaurant interior"
                            class="rounded img-fluid">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="reservation-form-wrapper">
                        <div class="form-header">
                            <h3>Book A Table</h3>
                            <p>Please fill the form below to make a reservation</p>
                        </div>

                        <form id="bookingForm" action="{{ route('customerStoreReservation') }}" method="post"
                            role="form" class="mt-4 php-email-form">
                            @csrf
                            {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
                            <div class="row gy-4">
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Your Name"
                                        required>
                                    @error('name')
                                        <div class=" invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 form-group">
                                    <input type="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="Your Email" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 form-group">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') }}" placeholder="Your Phone" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 form-group">
                                    <select name="people" class="form-select @error('people') is-invalid @enderror"
                                        required>
                                        <option value="">Number of guests</option>
                                        <option value="1" {{ old('people') == 1 ? 'selected' : '' }}>1 Person</option>
                                        <option value="2" {{ old('people') == 2 ? 'selected' : '' }}>2 People</option>
                                        <option value="3" {{ old('people') == 3 ? 'selected' : '' }}>3 People</option>
                                        <option value="4" {{ old('people') == 4 ? 'selected' : '' }}>4 People</option>
                                        <option value="5" {{ old('people') == 5 ? 'selected' : '' }}>5 People</option>
                                        <option value="6" {{ old('people') == 6 ? 'selected' : '' }}>6+ People
                                        </option>
                                    </select>
                                    @error('people')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 form-group">
                                    <input type="date" name="date" value="{{ old('date') }}"
                                        class="form-control @error('date') is-invalid @enderror" placeholder="Date"
                                        required>
                                    @error('date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 form-group">
                                    <input type="time" class="form-control @error('time') is-invalid @enderror"
                                        name="time" value="{{ old('time') }}" id="time" placeholder="Time"
                                        required>
                                    @error('time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-4 form-group">
                                    <textarea class="form-control" name="message" rows="3" placeholder="Special Requests (Optional)">{{ old('message') }}</textarea>
                                </div>
                            </div>

                            {{-- <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
                  </div> --}}
                            <div class="mt-4 text-center">
                                <button type="button" id="submitBtn" class="btn btn-book-table">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Book A Table Section -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#submitBtn').on('click', function() {
                // let name = $('#name').val().trim();
                // let email = $('#email').val().trim();
                // let phone = $('#phone').val().trim();
                // let date = $('#date').val().trim();
                // let time = $('#time').val().trim();
                // let people = $('#people').val().trim();

                // // Simple client-side validation
                // if (!name || !email || !phone || !date || !time || !people) {
                //     Swal.fire({
                //         icon: 'error',
                //         title: 'Missing Fields',
                //         text: 'Please fill in all required fields.'
                //     });
                //     return;
                // }

                // If valid, show confirmation SweetAlert
                Swal.fire({
                    title: 'Confirm Booking?',
                    text: "Are you sure all details are correct?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, book it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#bookingForm').submit();
                    }
                });
            });
        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Booking Successful!',
                text: '{{ session('success') }}',
                timer: 3000,
                confirmButtonColor: '#3085d6',
            });
        </script>
    @endif
@endsection
