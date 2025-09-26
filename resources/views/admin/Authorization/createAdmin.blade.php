@extends('admin.Layout.master')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="mb-4 d-flex align-items-center justify-content-center">
            <h1 class="mb-0 text-gray-800 h3">Create New Admin Account</h1>

        </div>
        <div class="">
            <div class="row">
                <div class="col-4 offset-4">
                    <div class="card">
                        <div class="shadow card-body">
                            <form action="{{ route('storeAdmin') }}" method="post" class="p-3 rounded">
                                @csrf
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class=" form-control @error('name')is-invalid @enderror mb-2">
                                @error('name')
                                    <small class=" invalid-feedback">{{ $message }}</small>
                                @enderror
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{ old('email') }}"
                                    class=" form-control @error('email')is-invalid @enderror mb-2">
                                @error('email')
                                    <small class=" invalid-feedback">{{ $message }}</small>
                                @enderror
                                <label for="password">Password</label>
                                <input type="password" name="password"
                                    class=" form-control @error('password')is-invalid @enderror mb-2">
                                @error('password')
                                    <small class=" invalid-feedback">{{ $message }}</small>
                                @enderror
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" name="confirmPassword"
                                    class=" form-control @error('confirmPassword')is-invalid @enderror mb-2">
                                @error('confirmPassword')
                                    <small class=" invalid-feedback">{{ $message }}</small>
                                @enderror
                                <input type="submit" value="Create" class="mt-3 btn btn-outline-primary">
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection
