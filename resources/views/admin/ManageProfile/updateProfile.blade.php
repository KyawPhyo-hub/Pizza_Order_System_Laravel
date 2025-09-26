@extends('admin.Layout.master')
@section('content')
 <div class="container">
    <div class="row">
        {{-- image --}}

        {{-- input fields --}}
        <div class="col">
            <div class="card">
                <div class="shadow card-body">
                    <form action="{{ route('adminUpdateProfile') }}" method="post" class="p-3 rounded" enctype="multipart/form-data">
                        @csrf
                        <h3 class="mb-3">Update Profile</h3>
                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="oldImage" value="{{ auth()->user()->profile }}">
                        <div class="row">
                            <div class="col-3">
                                <label for="image" class="form-label">Profile Picture</label>
                               @if(auth()->user()->profile == null)
                                <img id="output" src="{{ asset('uploads/userdef/default-user-icon-33.jpg') }}" alt="" class="shadow-sm img-thumbnail">

                               @else
                                 <img id="output" src="{{ asset('uploads/adminprofile/'.auth()->user()->profile) }}" alt="" class="shadow-sm img-thumbnail">
                               @endif
                                <input type="file" name="image" id="" class="mt-2 form-control @error('image') is-invalid @enderror" onchange="loadFile(event)">
                                @error('image')
                                    <small class=" invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" {{ auth()->user()->provider == 'simple' ? '' : 'disabled' }} value="{{ old('name',auth()->user()->name == null ? auth()->user()->nickname:auth()->user()->name) }}" class=" form-control @error('name')is-invalid @enderror mb-2"
                                    placeholder="Enter name...">
                                        @error('name')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email" value="{{ old('email',auth()->user()->email) }}" {{ auth()->user()->provider == 'simple' ? '' : 'disabled' }} class=" form-control @error('email')is-invalid @enderror mb-2"
                                    placeholder="Enter email...">
                                        @error('email')
                                            <small class=" invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" value="{{ old('phone',auth()->user()->phone) }}" class=" form-control @error('phone')is-invalid @enderror mb-2"
                                    placeholder="+66xxxxx...">
                                        @error('phone')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" value="{{ old('address',auth()->user()->address) }}" class=" form-control @error('address')is-invalid @enderror mb-2"
                                    placeholder="Enter address...">
                                        @error('address')
                                            <small class=" invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                               <div class="mt-2 mb-2">
                                @if(auth()->user()->provider == 'simple')
                                <a class="" href="{{ route('adminChangePasswordPage') }}">Change Password</a>
                                @endif
                               </div>

                                <input type="submit" value="Update" class="mt-3 btn btn-outline-primary">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>
 </div>
@endsection