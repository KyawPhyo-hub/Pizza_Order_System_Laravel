@extends('admin.Layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="mb-3 text-center">
                <h2 class="mb-2">Combo-deals List</h2>
            </div>
            <form method="GET" action="{{ route('adminComboList') }}" class="mb-3">
                <div class="row g-2 align-items-center">
                    <div class="col-8">
                        <a href="{{ route('adminAddMenu') }}" class="mb-3 btn btn-primary">Create Combo</a>
                    </div>
                  <div class="col-auto">
                    <input type="text" name="search" value="{{old( 'search',$search ?? '') }}" class="form-control" style="width: 300px"
                           placeholder="Search combos…">
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
                        <th class="col-2">Image</th>
                        <th class="col">Name</th>
                        <th class="col">Description</th>
                        <th class="col">Category</th>
                        <th class="col">Pizza_1</th>
                        <th class="col">Pizza_2</th>
                        <th class="col">Soft Drink</th>
                        <th class="col">Dessert</th>
                        <th class="col">Price</th>
                        <th class="col">Status</th>
                        <th class="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($combos as $item)
                    <tr>
                        @if($item->image != null)
                        <td><img src="{{ asset('uploads/combos/' . $item->image) }}" alt="{{ $item->name }}" class="img-thumbnail" style="width: 100px;"></td>
                        @else
                        <td><img src="{{ asset('admin/img/undraw_rocket.svg') }}" alt="No Image" class="img-thumbnail" style="width: 100px;"></td>
                        @endif
                        <td>{{ $item->name }}</td>
                        <td>{{ Str::words($item->description, 7, '...')  }}</td>
                        <td>{{ $item->category_name }}</td>
                        <td>{{ $item->pizza1->name ?? 'N/A'}}</td>
                        <td>{{ $item->pizza2->name ?? 'N/A'}}</td>
                        <td>{{ $item->softdrink->name ?? 'N/A' }}</td>
                        <td>{{ $item->dessert->name ?? 'N/A' }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>{{ ucfirst(str_replace('-', ' ', $item->status)) }}</td>
                        <td>
                            <a href="{{ route('adminViewCombo',$item->id) }}" class="mb-2 btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('adminUpdateCombo',$item->id) }}" class="mb-2 btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ route('adminDeleteCombo',$item->id) }}" class="mb-2 btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- {{ $pizzas->links() }} --}}
        </div>
    </div>
</div>
@endsection