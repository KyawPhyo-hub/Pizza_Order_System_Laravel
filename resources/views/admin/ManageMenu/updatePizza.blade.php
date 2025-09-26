@extends('admin.Layout.master')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mb-2">Update Pizza</h3>
        <form action="{{ route('adminUpdatePizzaStore',$pizza->id) }}" class="p-3 rounded" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-2 row">
                <div class="col-4">
                    @if($pizza->image != null)
                        <img id="output" src="{{ asset('uploads/pizzas/' . $pizza->image) }}" alt="{{ $pizza->name }}" class="shadow-sm img-thumbnail">
                    @else
                    <img id="output" src="{{ asset('admin/img/undraw_rocket.svg') }}" alt="" class="shadow-sm img-thumbnail">
                    @endif
                    <input type="file" name="image" id=""  class="mt-2 form-control @error('image') is-invalid @enderror" onchange="loadFile(event)">
                    @error('image')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6 offset-1">
                    <input type="text" name="name" id="" placeholder="Enter Pizza Name..." class="form-control @error('name') is-invalid @enderror mb-2" value="{{ old('name',$pizza->name) }}">
                    @error('name')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <textarea name="description" id="" cols="30" rows="6" class=" form-control @error('description')is-invalid @enderror mb-2"
                    placeholder="Enter description...">{{ old('description',$pizza->description ) }}</textarea>
                    @error('description')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror

                    <select name="categoryId" id="" class="form-control @error('categoryId') is-invalid @enderror mb-2">
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                            <option @if($item->id == 3 || $item->id == 9) disabled @endif value="{{ $item->id }}" {{ old('categoryId',$pizza->category_id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('categoryId')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <select name="size" id="" class="form-control @error('size') is-invalid @enderror mb-2">
                        <option value="">Select Size</option>
                        <option value="Small" {{ old('size',$pizza->size ) == 'Small' ? 'selected' : '' }}>Small</option>
                        <option value="Medium" {{ old('size',$pizza->size) == 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="Large" {{ old('size',$pizza->size) == 'Large' ? 'selected' : '' }}>Large</option>
                        <option value="Extra-Large" {{ old('size',$pizza->size) == 'Extra-Large' ? 'selected' : '' }}>Extra Large</option>
                    </select>
                    @error('size')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <input type="number" name="price" step="0.01" min="0" id="" class="form-control @error('price') is-invalid @enderror mb-2" placeholder="Enter Price..." value="{{ old('price',$pizza->price) }}">
                    @error('price')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <select name="status" id="" class=" form-control mb-2 @error('status') is-invalid @enderror">
                        <option value="">Select Status</option>
                        <option value="Available" {{ old('status',$pizza->status ) == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Unavailable" {{ old('status',$pizza->status ) == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
                        <option value="Coming-Soon" {{ old('status',$pizza->status ) == 'Coming-Soon' ? 'selected' : '' }}>Coming Soon</option>
                        <option value="Out-Of-Stock" {{ old('status',$pizza->status ) == 'Out-Of-Stock' ? 'selected' : '' }}>Out of Stock</option>
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