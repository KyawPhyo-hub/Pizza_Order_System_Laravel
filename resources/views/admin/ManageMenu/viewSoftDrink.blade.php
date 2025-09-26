@extends('admin.Layout.master')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mb-2">View Soft Drink Details</h3>

            <div class="mt-2 row">
                <div class="col-4">
                    @if($softDrink->image != null)
                        <img id="output" src="{{ asset('uploads/softdrinks/' . $softDrink->image) }}" alt="{{ $softDrink->name }}" class="shadow-sm img-thumbnail">
                    @else
                    <img id="output" src="{{ asset('admin/img/undraw_rocket.svg') }}" alt="" class="shadow-sm img-thumbnail">
                    @endif
                </div>
                <div class="col-6 offset-1">
                    <div class="mb-3 row">
                        <div class="col-4 h5">Name :</div>
                        <div class="col-6">{{ $softDrink->name }}</div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-4">Description :</div>
                        <div class="col-6">{{ $softDrink->description }}</div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-4">Category Name :</div>
                        <div class="col-6">{{ $softDrink->category_name }}</div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-4">Size :</div>
                        <div class="col-6">{{ $softDrink->size }}</div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-4">Price :</div>
                        <div class="col-6">${{ $softDrink->price }}</div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-4">Status :</div>
                        <div class="col-6">{{ $softDrink->status }}</div>
                    </div>


                    <input type="button" value="Back to List" class="mt-3 btn btn-outline-primary" onclick="window.location.href='{{ route('adminSoftDrinkList') }}'">
                </div>
            </div>

        </div>
    </div>
 </div>
@endsection