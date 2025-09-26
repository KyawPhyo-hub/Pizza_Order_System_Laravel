@extends('admin.Layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="mb-3 text-center">
                <h2 class="mb-2">Desserts List</h2>
            </div>
            <form method="GET" action="{{ route('adminDessertList') }}" class="mb-3">
                <div class="row g-2 align-items-center">
                    <div class="col-8">
                        <a href="{{ route('adminCreateDessertPage') }}" class="mb-3 btn btn-primary">Add Desserts</a>
                    </div>
                  <div class="col-auto">
                    <input type="text" name="search" value="{{old( 'search',$search ?? '') }}" class="form-control" style="width: 300px"
                           placeholder="Search desserts…">
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
                        <th>Price</th>
                        <th>Status</th>
                        <th class="col-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($desserts as $dessert)
                    <tr>
                        @if($dessert->image != null)
                        <td><img src="{{ asset('uploads/desserts/' . $dessert->image) }}" alt="{{ $dessert->name }}" class="img-thumbnail" style="width: 100px;"></td>
                        @else
                        <td><img src="{{ asset('admin/img/undraw_rocket.svg') }}" alt="No Image" class="img-thumbnail" style="width: 100px;"></td>
                        @endif
                        <td>{{ $dessert->name }}</td>
                        <td>{{ Str::words($dessert->description, 15, '...')  }}</td>
                        <td>{{ $dessert->category_name }}</td>
                        <td>${{ number_format($dessert->price, 2) }}</td>
                        <td>{{ ucfirst(str_replace('-', ' ', $dessert->status)) }}</td>
                        <td>
                            <a href="{{ route('adminViewDessert',$dessert->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('adminUpdateDessert',$dessert->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ route('adminDeleteDessert',$dessert->id) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3 d-flex justify-content-center">
                {{ $desserts->links('pagination::bootstrap-5') }}

            </div>
        </div>
    </div>
</div>
@endsection