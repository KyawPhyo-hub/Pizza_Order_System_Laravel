@extends('admin.Layout.master')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mb-2">View Dessert Details</h3>

            <div class="mt-2 row">
                <div class="col-4">
                    @if($dessert->image != null)
                        <img id="output" src="{{ asset('uploads/desserts/' . $dessert->image) }}" alt="{{ $dessert->name }}" class="shadow-sm img-thumbnail">
                    @else
                    <img id="output" src="{{ asset('admin/img/undraw_rocket.svg') }}" alt="" class="shadow-sm img-thumbnail">
                    @endif
                </div>
                <div class="col-6 offset-1">
                    <div class="mb-3 row">
                        <div class="col-4 h5">Name :</div>
                        <div class="col-6">{{ $dessert->name }}</div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-4">Description :</div>
                        <div class="col-6">{{ $dessert->description }}</div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-4">Category Name :</div>
                        <div class="col-6">{{ $dessert->category_name }}</div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-4">Price :</div>
                        <div class="col-6">${{ $dessert->price }}</div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-4">Status :</div>
                        <div class="col-6">{{ $dessert->status }}</div>
                    </div>


                    <input type="button" value="Back to List" class="mt-3 btn btn-outline-primary" onclick="window.location.href='{{ route('adminDessertList') }}'">
                </div>
            </div>

        </div>
    </div>
 </div>
@endsection