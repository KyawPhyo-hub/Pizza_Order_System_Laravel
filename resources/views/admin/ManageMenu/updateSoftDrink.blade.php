@extends('admin.Layout.master')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mb-2">Update Soft Drink</h3>
        <form action="{{ route('adminStoreUpdateSoftDrink',$softDrink->id) }}" class="p-3 rounded" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $softDrink->id }}">
            <input type="hidden" name="oldImage" value="{{ $softDrink->image }}">
            <div class="mt-2 row">
                <div class="col-4">
                    @if($softDrink->image != null)
                        <img id="output" src="{{ asset('uploads/softdrinks/' . $softDrink->image) }}" alt="{{ $softDrink->name }}" class="shadow-sm img-thumbnail">
                    @else
                    <img id="output" src="{{ asset('admin/img/undraw_rocket.svg') }}" alt="" class="shadow-sm img-thumbnail">
                    @endif
                    <input type="file" name="image" id=""  class="mt-2 form-control @error('image') is-invalid @enderror" onchange="loadFile(event)">
                    @error('image')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6 offset-1">
                    <input type="text" name="name" id="" placeholder="Enter Pizza Name..." class="form-control @error('name') is-invalid @enderror mb-2" value="{{ old('name',$softDrink->name) }}">
                    @error('name')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <textarea name="description" id="" cols="30" rows="6" class=" form-control @error('description')is-invalid @enderror mb-2"
                    placeholder="Enter description...">{{ old('description',$softDrink->description ) }}</textarea>
                    @error('description')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror

                    <select name="categoryId" id="" class="form-control @error('categoryId') is-invalid @enderror mb-2">
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ old('categoryId',$softDrink->category_id) == $item->id ? 'selected' : '' }} @if($item->id != 3) disabled @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('categoryId')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    @php
                        $sizes = ['250ml', '330ml','400ml', '500ml', '1L'];
                    @endphp

                    <select name="size" class="form-control @error('size') is-invalid @enderror mb-2">
                        <option value="">Select Size</option>
                        @foreach ($sizes as $size)
                            <option value="{{ $size }}" {{ old('size', $softDrink->size) == $size ? 'selected' : '' }}>{{ $size }}</option>
                        @endforeach
                    </select>
                    @error('size')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror

                    <input type="number" step="0.01" min="0" name="price" id="" class="form-control @error('price') is-invalid @enderror mb-2" placeholder="Enter Price..." value="{{ old('price',$softDrink->price) }}">
                    @error('price')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <select name="status" id="" class=" form-control mb-2 @error('status') is-invalid @enderror">
                        <option value="">Select Status</option>
                        <option value="available" {{ old('status',$softDrink->status ) == 'available' ? 'selected' : '' }}>available</option>
                        <option value="unavailable" {{ old('status',$softDrink->status ) == 'unavailable' ? 'selected' : '' }}>unavailable</option>
                        <option value="coming-Soon" {{ old('status',$softDrink->status ) == 'coming-Soon' ? 'selected' : '' }}>coming Soon</option>
                    </select>
                    @error('status')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror

                    <input type="submit" value="Update" class="mt-3 btn btn-outline-primary">
                </div>
            </div>
        </form>
        </div>
    </div>
 </div>
@endsection