@extends('admin.Layout.master')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mb-2">View Pizza Details</h3>

            <div class="mt-2 row">
                <div class="col-4">
                    @if($pizza->image != null)
                        <img id="output" src="{{ asset('uploads/pizzas/' . $pizza->image) }}" alt="{{ $pizza->name }}" class="shadow-sm img-thumbnail">
                    @else
                    <img id="output" src="{{ asset('admin/img/undraw_rocket.svg') }}" alt="" class="shadow-sm img-thumbnail">
                    @endif
                </div>
                <div class="col-6 offset-1">
                    <div class="mb-3 row">
                        <div class="col-4 h5">Name :</div>
                        <div class="col-6">{{ $pizza->name }}</div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-4">Description :</div>
                        <div class="col-6">{{ $pizza->description }}</div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-4">Category Name :</div>
                        <div class="col-6">{{ $pizza->category_name }}</div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-4">Size :</div>
                        <div class="col-6">{{ $pizza->size }}</div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-4">Price :</div>
                        <div class="col-6">${{ $pizza->price }}</div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-4">Status :</div>
                        <div class="col-6">{{ $pizza->status }}</div>
                    </div>


                    <input type="button" value="Back to List" class="mt-3 btn btn-outline-primary" onclick="window.location.href='{{ route('adminPizzaList') }}'">
                </div>
            </div>

        </div>
    </div>
 </div>
@endsection