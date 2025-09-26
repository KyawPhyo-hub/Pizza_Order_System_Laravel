@extends('admin.Layout.master')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mb-2">Add Soft Drink <i class="fa-solid fa-martini-glass"></i></h4>
            <div class="menu-button ">
                <div class="row">
                    <div class="flex-wrap col-8 offset-2 d-flex justify-content-center align-items-center">
                        <a href="{{ route('adminAddMenu') }}" class="mx-1 btn-sm {{ request()->routeIs('adminAddMenu') ? 'btn-dark' : ' text-black btn btn-outline-dark' }}">Pizza</a>
                        <a href="{{ route('adminCreateSoftDrink') }}" class="mx-1 btn-sm {{ request()->routeIs('adminCreateSoftDrink') ? 'btn-dark' : ' text-black btn btn-outline-dark' }}">Soft Drink</a>
                        <a href="{{ route('adminCreateDessertPage') }}" class="mx-1 btn-sm {{ request()->routeIs('adminCreateDessertPage') ? 'btn-dark' : ' text-black btn btn-outline-dark' }}">Desserts</a>
                        <a href="{{ route('adminCreateCombo') }}" class="mx-1 btn-sm {{ request()->routeIs('adminCreateCombo') ? 'btn-dark' : ' text-black btn btn-outline-dark' }}">Combo Deals</a>
                        {{-- <a href="" class="mx-1 btn-sm {{ request()->routeIs('adminAddMenu') ? 'btn-dark' : ' text-black btn btn-outline-dark' }}">Combo Deals</a> --}}
                    </div>
                </div>
            </div>
        <form action="{{ route('adminStoreSoftDrink') }}" class="p-3 rounded" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-2 row">
                <div class="col-4">
                    <img id="output" src="{{ asset('admin/img/undraw_rocket.svg') }}" alt="" class="shadow-sm img-thumbnail">
                    <input type="file" name="image" id="" class="mt-2 form-control @error('image') is-invalid @enderror" onchange="loadFile(event)">
                    @error('image')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6 offset-1">
                    <input type="text" name="name" id="" placeholder="Enter Name..." class="form-control @error('name') is-invalid @enderror mb-2" value="{{ old('name') }}">
                    @error('name')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <textarea name="description" id="" cols="30" rows="6" class=" form-control @error('description')is-invalid @enderror mb-2"
                    placeholder="Enter description...">{{ old('description') }}</textarea>
                    @error('description')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror

                    <select name="categoryId" id="" class="form-control @error('categoryId') is-invalid @enderror mb-2">
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ old('categoryId') == $item->id ? 'selected' : '' }}
                            @if($item->id != 3) disabled @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('categoryId')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <select name="size" id="" class="form-control @error('size') is-invalid @enderror mb-2">
                        <option value="">Select Size</option>
                        <option value="250ml" {{ old('size') == '250ml' ? 'selected' : '' }}>250ml</option>
                        <option value="330ml" {{ old('size') == '330ml' ? 'selected' : '' }}>330ml</option>
                        <option value="400ml" {{ old('size') == '400ml' ? 'selected' : '' }}>400ml</option>
                        <option value="500ml" {{ old('size') == '500ml' ? 'selected' : '' }}>550ml</option>
                        <option value="1L" {{ old('size') == '1L' ? 'selected' : '' }}>1L</option>
                    </select>
                    @error('size')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <input type="number" name="price" id="" class="form-control @error('price') is-invalid @enderror mb-2" placeholder="Enter Price..." value="{{ old('price') }}">
                    @error('price')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <select name="status" id="" class=" form-control mb-2 @error('status') is-invalid @enderror">
                        <option value="">Select Status</option>
                        <option value="Available" {{ old('status') == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Unavailable" {{ old('status') == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
                        <option value="Coming-Soon" {{ old('status') == 'Coming-Soon' ? 'selected' : '' }}>Coming Soon</option>
                    </select>
                    @error('status')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror

                    <input type="submit" value="Create" class="mt-3 btn btn-outline-primary">
                </div>
            </div>
        </form>
        </div>
    </div>
 </div>
@endsection