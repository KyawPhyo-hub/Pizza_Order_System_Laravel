@extends('admin.Layout.master')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mb-2">Update Dessert</h3>
        <form action="{{ route('adminStoreUpdateDessert',$dessert->id) }}" class="p-3 rounded" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $dessert->id }}">
            <input type="hidden" name="oldImage" value="{{ $dessert->image }}">
            <div class="mt-2 row">
                <div class="col-4">
                    @if($dessert->image != null)
                        <img id="output" src="{{ asset('uploads/desserts/' . $dessert->image) }}" alt="{{ $dessert->name }}" class="shadow-sm img-thumbnail">
                    @else
                    <img id="output" src="{{ asset('admin/img/undraw_rocket.svg') }}" alt="" class="shadow-sm img-thumbnail">
                    @endif
                    <input type="file" name="image" id=""  class="mt-2 form-control @error('image') is-invalid @enderror" onchange="loadFile(event)">
                    @error('image')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6 offset-1">
                    <input type="text" name="name" id="" placeholder="Enter Pizza Name..." class="form-control @error('name') is-invalid @enderror mb-2" value="{{ old('name',$dessert->name) }}">
                    @error('name')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <textarea name="description" id="" cols="30" rows="6" class=" form-control @error('description')is-invalid @enderror mb-2"
                    placeholder="Enter description...">{{ old('description',$dessert->description ) }}</textarea>
                    @error('description')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror

                    <select name="categoryId" id="" class="form-control @error('categoryId') is-invalid @enderror mb-2">
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ old('categoryId',$dessert->category_id) == $item->id ? 'selected' : '' }} @if($item->id != 9) disabled @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('categoryId')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <input type="number" name="price" step="0.01" min="0" id="" class="form-control @error('price') is-invalid @enderror mb-2" placeholder="Enter Price..." value="{{ old('price',$dessert->price) }}">
                    @error('price')
                        <small class=" invalid-feedback">{{ $message }}</small>
                    @enderror
                    <select name="status" id="" class=" form-control mb-2 @error('status') is-invalid @enderror">
                        <option value="">Select Status</option>
                        <option value="available" {{ old('status',$dessert->status ) == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="unavailable" {{ old('status',$dessert->status ) == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                        <option value="coming-soon" {{ old('status',$dessert->status ) == 'coming-soon' ? 'selected' : '' }}>Coming Soon</option>
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