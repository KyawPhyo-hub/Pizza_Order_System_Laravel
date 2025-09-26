@extends('admin.Layout.master')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mb-2">Add Combo <i class="fa-solid fa-pizza-slice"></i></h4>
            <div class="menu-button ">
                <div class="row">
                    <div class="flex-wrap col-8 offset-2 d-flex justify-content-center align-items-center">
                        <a href="{{ route('adminAddMenu') }}" class="mx-1 btn-sm {{ request()->routeIs('adminAddMenu') ? 'btn-dark' : ' text-black btn btn-outline-dark' }}">Pizza</a>
                        <a href="{{ route('adminCreateSoftDrink') }}" class="mx-1 btn-sm {{ request()->routeIs('adminCreateSoftDrink') ? 'btn-dark' : ' text-black btn btn-outline-dark' }}">SoftDrink</a>
                        <a href="{{ route('adminCreateDessertPage') }}" class="mx-1 btn-sm {{ request()->routeIs('adminCreateDessertPage') ? 'btn-dark' : ' text-black btn btn-outline-dark' }}">Desserts</a>
                        <a href="{{ route('adminCreateCombo') }}" class="mx-1 btn-sm {{ request()->routeIs('adminCreateCombo') ? 'btn-dark' : ' text-black btn btn-outline-dark' }}">Combo Deals</a>
                        {{-- <a href="" class="mx-1 btn-sm {{ request()->routeIs('adminAddMenu') ? 'btn-dark' : ' text-black btn btn-outline-dark' }}">Combo Deals</a> --}}
                    </div>
                </div>
            </div>
        <form action="{{ route('adminStoreCombo') }}" class="p-3 rounded" method="POST" enctype="multipart/form-data">
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
                    <input type="text" name="name" id="" placeholder="Enter combo Name..." class="form-control @error('name') is-invalid @enderror mb-2" value="{{ old('name') }}">
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
                                @if($item->id != 8) disabled @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('categoryId')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <select name="pizza1" id="" class="form-control @error('pizza1') is-invalid @enderror mb-2">
                       <option value="">Select Pizza 1</option>
                        @foreach ($pizzas as $pizza)
                            <option value="{{ $pizza->id }}" {{ old('pizza1') == $pizza->id ? 'selected' : '' }}>{{ $pizza->name }}</option>
                        @endforeach
                    </select>
                    @error('pizza1')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <select name="pizza2" id="" class="form-control @error('pizza2') is-invalid @enderror mb-2">
                        <option value="">Select Pizza 2</option>
                         @foreach ($pizzas as $pizza)
                             <option value="{{ $pizza->id }}" {{ old('pizza2') == $pizza->id ? 'selected' : '' }}>{{ $pizza->name }}</option>
                         @endforeach
                     </select>
                     @error('pizza2')
                         <small class=" invalid-feedback">{{ $message }}</small>
                     @enderror
                     <select name="softDrink" id="" class="form-control @error('softDrink') is-invalid @enderror mb-2">
                        <option value="">Select SoftDrink</option>
                         @foreach ($softdrinks as $softdrink)
                             <option value="{{ $softdrink->id }}" {{ old('softDrink') == $softdrink->id ? 'selected' : '' }}>{{ $softdrink->name }}</option>
                         @endforeach
                     </select>
                     @error('softDrink')
                         <small class=" invalid-feedback">{{ $message }}</small>
                     @enderror
                     <select name="dessert" id="" class="form-control @error('dessert') is-invalid @enderror mb-2">
                        <option value="">Select Dessert</option>
                         @foreach ($desserts as $dessert)
                             <option value="{{ $dessert->id }}" {{ old('dessert') == $dessert->id ? 'selected' : '' }}>{{ $dessert->name }}</option>
                         @endforeach
                     </select>
                     @error('dessert')
                         <small class=" invalid-feedback">{{ $message }}</small>
                     @enderror
                    <input type="number" name="price" step="0.01" id="" class="form-control @error('price') is-invalid @enderror mb-2" placeholder="Enter Price..." value="{{ old('price') }}">
                    @error('price')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <select name="status" id="" class=" form-control mb-2 @error('status') is-invalid @enderror">
                        <option value="">Select Status</option>
                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
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