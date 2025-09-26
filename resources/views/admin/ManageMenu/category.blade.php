@extends('admin.Layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h3 class="mb-3">Add Menu Category</h3>
                <form action="{{ route('adminCategoryStore') }}" method="POST">
                    @csrf
                    <label for="name" class="mb-3">Category Name</label>
                    <input type="text" name="name" id="name" class=" form-control" @error('name') is-invalid @enderror placeholder="Category Name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <br>
                    <button type="submit" class="mt-3 btn btn-outline-primary">Add</button>
                </form>
            </div>
            <div class="col-6 offset-1">
                <h3 class="mb-3">Category List</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Category Name</th>
                            <th scope="col" class="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach ($categories as $item)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $item->name }}</td>
                                <td>
                                   <a href="{{ route('adminCategoryDelete', $item->id) }}" class="btn btn-outline-danger btn-sm"><i class=" fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection