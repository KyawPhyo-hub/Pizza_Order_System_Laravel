@extends('admin.Layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h3 class="mb-3">Add Topping</h3>
                <form action="{{ route('adminStoreTopping') }}" method="POST">
                    @csrf
                    <label for="name" class=" form-label">Topping Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" id="name" class="mb-2 form-control" @error('name') is-invalid @enderror placeholder="Topping Name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="price" class=" form-label">Topping Price</label>
                    <input type="number" step="0.01" name="price" value="{{ 'price' }}" id="price" class="mb-3 form-control" @error('price') is-invalid @enderror placeholder="Topping Price">
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <select name="status" id="" class=" form-control mb-2 @error('status') is-invalid @enderror">
                        <option value="">Select Status</option>
                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                        <option value="coming-soon" {{ old('status') == 'coming-soon' ? 'selected' : '' }}>Coming Soon</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <button type="submit" class="mt-3 btn btn-outline-primary">Add Topping</button>
                </form>
            </div>
            <div class="col-6 offset-1">
                <h3 class="mb-3">Toppings List</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Topping Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach ($toppings as $item)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    @if ($item->status == 'available')
                                        <span class="badge bg-success">{{ $item->status }}</span>
                                    @elseif($item->status == 'unavailable')
                                        <span class="badge bg-danger">{{ $item->status }}</span>
                                    @else
                                        <span class="badge bg-warning">{{ $item->status }}</span>
                                    @endif
                                <td>
                                    <a href="{{ route('adminUpdateTopping',$item->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('adminDeleteTopping',$item->id) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection