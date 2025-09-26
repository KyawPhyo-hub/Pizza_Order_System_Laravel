@extends('admin.Layout.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="mb-4 d-flex align-items-center justify-content-center">
        <h1 class="mb-0 text-gray-800 h3">Change Password</h1>

    </div>
        <div class="">
            <div class="row">
                <div class="col-4 offset-4">
                    <div class="card">
                        <div class="shadow card-body">
                            <form action="{{ route('adminChangePassword') }}" method="post" class="p-3 rounded">
                                @csrf
                                <label for="oldPassword">Old Password</label>
                                <input type="password" name="oldPassword" value="{{ old('oldPassword') }}" class=" form-control @error('oldPassword')is-invalid @enderror mb-2"
                                    placeholder="">
                                @error('oldPassword')
                                    <small class=" invalid-feedback">{{ $message }}</small>
                                @enderror

                                <label for="">New Password</label>
                                <input type="password" name="newPassword" value="{{ old('newPassword') }}" class=" form-control @error('newPassword')is-invalid @enderror mb-2"
                                    placeholder="">
                                @error('newPassword')
                                    <small class=" invalid-feedback">{{ $message }}</small>
                                @enderror

                                <label for="">Confirm Password</label>
                                <input type="password" name="confirmPassword" value="{{ old('confirmPassword') }}" class=" form-control @error('confirmPassword')is-invalid @enderror mb-2"
                                    placeholder="">
                                @error('confirmPassword')
                                    <small class=" invalid-feedback">{{ $message }}</small>
                                @enderror
                                <input type="submit" value="Change" class="mt-3 btn btn-outline-primary">
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>


</div>
@endsection