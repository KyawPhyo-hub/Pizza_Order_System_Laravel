@extends('admin.Layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h3 class="mb-3">Add Topping</h3>
                <form action="{{ route('adminStoreUpdateTopping',$topping->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $topping->id }}">
                    <label for="name" class=" form-label">Topping Name</label>
                    <input type="text" name="name" value="{{ old('name',$topping->name) }}" id="name" class="mb-2 form-control" @error('name') is-invalid @enderror placeholder="Topping Name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="price" class=" form-label">Topping Price</label>
                    <input type="number" step="0.01" value="{{ old('price',$topping->price) }}" name="price" id="price" class="mb-3 form-control" @error('price') is-invalid @enderror placeholder="Topping Price">
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <select name="status" id="" class=" form-control mb-2 @error('status') is-invalid @enderror">
                        <option value="">Select Status</option>
                        <option value="available" {{ old('status', $topping->status ) == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="unavailable" {{ old('status',$topping->status) == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                        <option value="coming-soon" {{ old('status',$topping->status) == 'coming-soon' ? 'selected' : '' }}>Coming Soon</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <button type="submit" class="mt-3 btn btn-outline-primary">Update Topping</button>
                </form>
            </div>
        </div>
    </div>
@endsection