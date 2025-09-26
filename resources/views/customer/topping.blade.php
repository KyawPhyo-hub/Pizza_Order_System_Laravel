@extends('customer.Layouts.theme')
@section('contents')
<section class="section" data-aos="fade-up">

        <div class="row">
            <div class="col-6 offset-4">
                <form id="toppingForm" action="toppingForm" method="POST">
                    @csrf
                    <input type="hidden" name="cart_id" value="{{ $cartId }}">
                    <h4 class="mb-4">Choose Toppings (Optional)</h4>
                    <div class="mb-4">
                        @foreach($toppings as $topping)
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="toppings[]"
                                    value="{{ $topping->id }}"
                                    id="topping{{ $topping->id }}"
                                    {{ in_array($topping->id, $selectedToppingIds) ? 'checked' : '' }}

                                >
                                <label class="text-white form-check-label" for="topping{{ $topping->id }}">
                                    {{ $topping->name }} (+{{ number_format($topping->price, 2) }} ฿)
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                    <a href="{{ route('customerCart') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
</section>
<!-- Success Modal -->
<div class="modal fade" id="successToppingModal" tabindex="-1" aria-labelledby="successToppingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="rounded shadow-lg modal-content">
        <div class="text-white modal-header bg-success">
          <h5 class="modal-title" id="successToppingModalLabel">Toppings Added</h5>
          <button type="button" class="text-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="text-center modal-body">
          <p>Your toppings have been successfully added to the cart!</p>
        </div>
        <div class="modal-footer justify-content-center">
          <a href="{{ route('customerCart') }}" class="btn btn-primary">Go to Cart</a>
          <a href="{{ route('customerMenu') }}" class="btn btn-secondary">Back to Menu</a>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#toppingForm').on('submit', function(e) {
            e.preventDefault(); // Stop default form submission

            $.ajax({
                url: "{{ route('customerAddTopping') }}", // your topping route
                method: "POST",
                data: $(this).serialize(), // serialize form data
                success: function(response) {
                    if (response.success) {
                        $('#successToppingModal').modal('show');
                    }
                },
                error: function(xhr) {
                    alert('Something went wrong. Please try again.');
                    console.log(xhr.responseText);
                }
            });
        });
    });
    </script>

@endsection
