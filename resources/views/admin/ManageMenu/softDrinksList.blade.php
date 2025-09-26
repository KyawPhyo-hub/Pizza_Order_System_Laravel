@extends('admin.Layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="mb-3 text-center">
                <h2 class="mb-2">Soft Drinks List</h2>
            </div>
            <form method="GET" action="{{ route('adminSoftDrinkList') }}" class="mb-3">
                <div class="row g-2 align-items-center">
                    <div class="col-8">
                        <a href="{{ route('adminCreateSoftDrink') }}" class="mb-3 btn btn-primary">Add Soft Drinks</a>
                    </div>
                  <div class="col-auto">
                    <input type="text" name="search" value="{{ old('search', $search ?? '') }}" class="form-control" style="width: 300px"
                           placeholder="Search soft drinks…">
                  </div>
                  <div class="col-auto">
                    <button class="btn btn-primary" type="submit">Search</button>
                    {{-- <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">Clear</a> --}}
                  </div>
                </div>
              </form>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th class="col-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($softDrinkList as $item)
                    <tr>
                        @if($item->image != null)
                        <td><img src="{{ asset('uploads/softdrinks/' . $item->image) }}" alt="{{ $item->name }}" class="img-thumbnail" style="width: 100px;"></td>
                        @else
                        <td><img src="{{ asset('admin/img/undraw_rocket.svg') }}" alt="No Image" class="img-thumbnail" style="width: 100px;"></td>
                        @endif
                        <td>{{ $item->name }}</td>
                        <td>{{ Str::words($item->description, 15, '...')  }}</td>
                        <td>{{ $category_name->category_name }}</td>
                        <td>{{ ucfirst($item->size) }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>{{ ucfirst(str_replace('-', ' ', $item->status)) }}</td>
                        <td>
                            <a href="{{ route('adminViewSoftDrink',$item->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('adminUpdateSoftDrink',$item->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ route('adminDeleteSoftDrink',$item->id) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $softDrinkList->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection