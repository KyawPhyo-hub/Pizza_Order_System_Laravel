@extends('customer.Layouts.master');
@section('styles')
<style>
.processCheckout {
    background-color: #f6c23e; /* pizza-orange */
    color: #fff;
    border: 2px solid #f6c23e;
    font-weight: bold;
    transition: all 0.3s ease;
}

.processCheckout:hover:not(:disabled) {
    background-color: #fff;          /* invert colors on hover */
    color: #f6c23e;                  /* text becomes orange */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    transform: translateY(-3px);     /* subtle lift */
}

.processCheckout:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    background-color: #f6c23e;
    color: #fff;
    box-shadow: none;
    transform: none;
}
</style>
@endsection
@section('contents')
    <section class="py-5 container-fluid section" data-aos="fade-up">
        <div class="container py-5">
            <div class="container section-title" data-aos="fade-up">
                <h2>Cart Details</h2>
                <p>Your cart details</p>
            </div>
            <div class="table-responsive">
                @if(empty($carts))
                    <div class="text-center col-12">
                        <p>No carts found.</p>
                    </div>
                @else
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
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $item)
                            <tr>
                                <input type="hidden" name="cartId" class="cartId" value="{{ $item['id'] }}">
                                <input type="hidden" name="menuId" class="menuId" value="{{ $item['menu_id'] }}">
                                <input type="hidden" name="categoryId" class="categoryId"
                                    value="{{ $item['category_id'] }}">
                                <input type="hidden" name="userId" class="userId" value="{{ auth()->user()->id }}">
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
                                        <span class="text-muted">No toppings</span>
                                    @endif
                                </td>
                                @php
                                    $toppingTotal = collect($item['toppings'])->sum('price');

                                @endphp
                                <td class="toppingTotal" data-unittopping="{{ $toppingTotal }}">
                                    <span
                                        class="toppingAmount">${{ number_format($toppingTotal * $item['quantity'], 2) }}</span>
                                </td>


                                <td>
                                    <div class="mt-4 input-group quantity" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button type="button"
                                                class="border btn btn-sm btn-minus rounded-circle bg-light">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text"
                                            class="text-center border-0 form-control form-control-sm qty-input"
                                            value="{{ $item['quantity'] }}" min="1" max="100" name="quantity">
                                        <div class="input-group-btn">
                                            <button type="button"
                                                class="border btn btn-sm btn-plus rounded-circle bg-light">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <p class="mt-4 mb-0 unitTotal" id="">
                                        ${{ ($item['price'] + $toppingTotal) * $item['quantity'] }}.00</p>
                                </td>
                                <td>
                                    <button class="mt-4 border btn btn-md rounded-circle bg-light btn-remove">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                    @if (
                                        $item['category_id'] == 1 ||
                                            $item['category_id'] == 2 ||
                                            $item['category_id'] == 5 ||
                                            $item['category_id'] == 6 ||
                                            $item['category_id'] == 7)
                                        <a href="{{ route('toppingPage', $item['id']) }}"
                                            class="mt-4 border btn btn-md rounded-3 bg-light btn-addtopping">
                                            <i class="fa-solid fa-plus"></i> Toppings
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                @php
                    $subtotal = 0;
                    foreach ($carts as $item) {
                        $toppingTotal = collect($item['toppings'])->sum('price');
                        $subtotal += ($item['price'] + $toppingTotal) * $item['quantity'];
                    }
                @endphp
            </div>
            <div class="row g-4 justify-content-end ">
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
                            {{-- <p class="mb-0 text-end">Shipping to Ukraine.</p> --}}
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
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function updateTotal() {
            let totalPrice = 0;
            $("#cart-table tbody tr").each(function() {
                let unitText = $(this).find(".unitTotal").text().trim();
                let numeric = parseFloat(unitText.replace(/[^\d.]/g, '')); // Remove $ and any non-digit except dot
                if (!isNaN(numeric)) {
                    totalPrice += numeric;
                }
            });

            $("#subTotal").html('$' + totalPrice.toFixed(2));
            $("#grandTotal").html('$' + (totalPrice + 3).toFixed(2));
        }

        $(document).ready(function() {
            $('.btn-plus').click(function() {
                let $parentRow = $(this).closest('tr');
                let qty = parseInt($parentRow.find('.qty-input').val()) || 1;
                let price = parseFloat($parentRow.find('.price').data('price')) || 0;
                let unitTopping = parseFloat($parentRow.find('.toppingTotal').data('unittopping')) || 0;

                qty++;
                $parentRow.find(".qty-input").val(qty);
                $parentRow.find(".toppingAmount").text('$' + (unitTopping * qty).toFixed(2));
                $parentRow.find(".unitTotal").text('$' + ((price + unitTopping) * qty).toFixed(2));

                updateTotal();
            });

            $('.btn-minus').click(function() {
                let $parentRow = $(this).closest('tr');
                let qty = parseInt($parentRow.find('.qty-input').val()) || 1;
                let price = parseFloat($parentRow.find('.price').data('price')) || 0;
                let unitTopping = parseFloat($parentRow.find('.toppingTotal').data('unittopping')) || 0;

                if (qty > 1) {
                    qty--;
                    $parentRow.find(".qty-input").val(qty);
                    $parentRow.find(".toppingAmount").text('$' + (unitTopping * qty).toFixed(2));
                    $parentRow.find(".unitTotal").text('$' + ((price + unitTopping) * qty).toFixed(2));

                    updateTotal();
                }
            });

            $('.btn-remove').click(function() {
                let $parentRow = $(this).closest('tr');
                let cartId = $parentRow.find('.cartId').val();
                let userId = $('.userId').val();
                $.ajax({
                    url: "{{ route('cartRemove') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        cartId: cartId,
                        userId: userId
                    },
                    success: function(response) {
                        $parentRow.remove();
                        updateTotal();
                    },
                    error: function(xhr) {
                        console.error(xhr);
                    }
                });
            })
            //Process checkout
            $('.processCheckout').click(function() {
                const orderCode = 'ORD' + Math.floor(Math.random() * 1000000);
                const userId = parseInt($(".userId").val());
                const orderData = [];

                $("#cart-table tbody tr").each(function() {
                    let cartId = parseInt($(this).find(".cartId").val());
                    orderData.push({
                        cartId: cartId,
                        menuId: parseInt($(this).find(".menuId").val()),
                        categoryId: parseInt($(this).find(".categoryId").val()),
                        qty: parseInt($(this).find(".qty-input").val()),
                        unitPrice: parseFloat($(this).find(".price").data("price")),
                        userId: userId,
                        subTotal: parseFloat($(this).find(".unitTotal").text().replace('$',
                            '')),
                        orderCode: orderCode,
                    });
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('customerStoreOrder') }}",
                    data: {
                        data: JSON.stringify(orderData),
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.message === 'success') {
                            location.href = "{{ route('customerChooseDelivery', ['orderId' => ':orderId']) }}"
                            .replace(':orderId', response.orderId);
                        }
                    }
                });
            });
        })
    </script>
@endsection
