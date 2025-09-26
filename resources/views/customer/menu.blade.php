@extends('customer.Layouts.master');
@section('contents')
    <!-- Menu Section -->
    <section id="menu" class="menu section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Menu</h2>
            {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <div class="mb-5 menu-filters isotope-filters">
                    <ul>
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-starters">Pizzas</li>
                        {{-- <li data-filter=".filter-main">Main Courses</li> --}}
                        <li data-filter=".filter-dessert">Desserts</li>
                        <li data-filter=".filter-drinks">Drinks</li>
                    </ul>
                </div>

                <div class="menu-container isotope-container row gy-4">

                    <!-- Regular Menu Items -->
                    {{-- Pizzas Menu --}}
                    @foreach ($pizzas as $pizza)
                        <div class="col-lg-6 isotope-item filter-starters">
                            <div class="gap-4 menu-item d-flex align-items-center">
                                <a href="{{ route('customerCartDetails', [$pizza->id, $pizza->category_id]) }}">
                                    @if ($pizza->image == null)
                                        <img src="{{ asset('uploads/menudef/question mark.jpg') }}" alt="Starter"
                                            class="menu-img img-fluid rounded-3">
                                    @else
                                        <img src="{{ asset('uploads/pizzas/' . $pizza->image) }}" alt="Starter"
                                            class="menu-img img-fluid rounded-3">
                                    @endif
                                </a>
                                <div class="menu-content">
                                    <h5 class="name">{{ $pizza->name }} <span
                                            class="menu-tag">{{ $pizza->category_name }}</span></h5>
                                    <p class="description">{{ Str::words($pizza->description, 10, '...') }}</p>
                                    <div class="price">{{ $pizza->price }}</div>
                                    <div class="mt-2 me-2">
                                        {{-- <a href="" class="btn btn-sm btn-outline-light">Order Now</a> --}}
                                        <a href="{{ route('customerCartDetails', [$pizza->id, $pizza->category_id]) }}"
                                            class="btn btn-sm btn-outline-warning pizza_cart">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- SoftDrink --}}
                    @foreach ($softDrinks as $softdrink)
                        <div class="col-lg-6 isotope-item filter-drinks">
                            <div class="gap-4 d-flex menu-item align-items-center">
                                <a href="{{ route('customerCartDetails', [$softdrink->id, $softdrink->category_id]) }}">
                                    @if ($softdrink->image != null)
                                        <img src="{{ asset('uploads/softdrinks/' . $softdrink->image) }}" alt="Drink"
                                            class="menu-img img-fluid rounded-3">
                                    @else
                                        <img src="{{ asset('uploads/menudef/question mark.jpg') }}" alt="Drink"
                                            class="menu-img img-fluid rounded-3">
                                    @endif
                                </a>
                                <div class="menu-content">
                                    <h5>{{ $softdrink->name }} <span
                                            class="menu-tag">{{ $softdrink->category_name }}</span></h5>
                                    <p>{{ Str::words($softdrink->description, 10, '...') }}</p>
                                    <div class="price">{{ $softdrink->price }}</div>
                                    <div class="mt-2 me-2">
                                        {{-- <a href="" class="btn btn-sm btn-outline-light">Order Now</a> --}}
                                        <a href="{{ route('customerCartDetails', [$softdrink->id, $softdrink->category_id]) }}"
                                            class="btn btn-sm btn-outline-warning">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- Dessert --}}

                    @foreach ($desserts as $dessert)
                        <div class="col-lg-6 isotope-item filter-dessert">
                            <div class="gap-4 d-flex menu-item align-items-center">
                                <a href="{{ route('customerCartDetails', [$dessert->id, $dessert->category_id]) }}">
                                    @if ($dessert->image != null)
                                        <img src="{{ asset('uploads/desserts/' . $dessert->image) }}" alt="Drink"
                                            class="menu-img img-fluid rounded-3">
                                    @else
                                        <img src="{{ asset('uploads/menudef/question mark.jpg') }}" alt="Drink"
                                            class="menu-img img-fluid rounded-3">
                                    @endif
                                </a>
                                <div class="menu-content">
                                    <h5>{{ $dessert->name }} <span class="menu-tag">{{ $dessert->category_name }}</span>
                                    </h5>
                                    <p>{{ Str::words($dessert->description, 10, '...') }}</p>
                                    <div class="price">{{ $dessert->price }}</div>
                                    <div class="mt-2 me-2">
                                        {{-- <a href="" class="btn btn-sm btn-outline-light">Order Now</a> --}}
                                        <a href="{{ route('customerCartDetails', [$dessert->id, $dessert->category_id]) }}"
                                            class="btn btn-sm btn-outline-warning">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Combo deals -->
            <div class="mt-5 col-12" data-aos="fade-up">
                <div class="specials-badge">
                    <span><i class="bi bi-award"></i>Combo Deals</span>
                </div>
                <div class="specials-container">
                    <div class="row g-4">
                        @foreach ($combos as $combo)
                            <div class="col-md-6">
                                <div class="menu-item special-item">
                                    <div class="menu-item-img">
                                        <a href="{{ route('customerCartDetails', [$combo->id, $combo->category_id]) }}">
                                            @if ($combo->image == null)
                                                <img src="{{ asset('uploads/menudef/question mark.jpg') }}"
                                                    alt="Special Dish" class="img-fluid">
                                            @else
                                                <img src="{{ asset('uploads/combos/' . $combo->image) }}"
                                                    alt="Special Dish" class="img-fluid">
                                            @endif
                                        </a>
                                        <div class="menu-item-badges">
                                            <span class="badge-special">{{ $combo->category_name }}</span>

                                        </div>
                                    </div>
                                    <div class="menu-item-content">
                                        <h4>{{ $combo->name }}</h4>
                                        <p>{{ $combo->description }}</p>
                                        <div class="menu-item-price">{{ $combo->price }}</div>
                                        <div class="mt-2 me-2">
                                            {{-- <a href="" class="btn btn-sm btn-outline-light">Order Now</a> --}}
                                            <a href="{{ route('customerCartDetails', [$combo->id, $combo->category_id]) }}"
                                                class="btn btn-sm btn-outline-warning">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Menu Section -->
@endsection
