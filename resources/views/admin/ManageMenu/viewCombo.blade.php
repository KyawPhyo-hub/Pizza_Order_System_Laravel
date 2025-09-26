@extends('admin.Layout.master')
@section('content')
<div class="container p-3">
    <div class="shadow-sm card">
        <div class="card">
            <div class="text-white card-header bg-primary">
                <h5>Combo-Deals Details</h5>
            </div>
            <div class="card-body">
                <div class="mt-2 row">
                    <div class="col-4">
                        @if($combo->image != null)
                            <img id="output" src="{{ asset('uploads/combos/' . $combo->image) }}" alt="{{ $combo->name }}" class="shadow-sm img-thumbnail">
                        @else
                        <img id="output" src="{{ asset('admin/img/undraw_rocket.svg') }}" alt="" class="shadow-sm img-thumbnail">
                        @endif
                    </div>
                    <div class="col-6 offset-1">
                        <div class="mb-3 row">
                            <div class="col-4 ">Name :</div>
                            <div class="col-6">{{ $combo->name }}</div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-4">Description :</div>
                            <div class="col-6">{{ $combo->description }}</div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-4">Category Name :</div>
                            <div class="col-6">{{ $combo->category->name }}</div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-4">Pizza 1 :</div>
                            <div class="col-6">{{ $combo->pizza1->name }}</div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-4">Pizza 2 :</div>
                            <div class="col-6">{{ $combo->pizza2->name ?? 'N/A' }}</div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-4">SoftDrink :</div>
                            <div class="col-6">{{ $combo->softdrink->name }}</div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-4">Dessert :</div>
                            <div class="col-6">{{ $combo->dessert->name }}</div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-4">Price :</div>
                            <div class="col-6">${{ $combo->price }}</div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-4">Status :</div>
                            <div class="col-6">{{ $combo->status }}</div>
                        </div>

                        <input type="button" value="Back to List" class="mt-3 btn btn-outline-primary" onclick="window.location.href='{{ route('adminComboList') }}'">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection