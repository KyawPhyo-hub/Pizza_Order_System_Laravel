@extends('admin.Layout.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="mb-4 d-sm-flex align-items-center justify-content-between">
        <form action="">
            <div class="mb-3 input-group">
                <input type="text" name="searchKey" value="{{ request('searchKey') }}" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button type="submit" class="input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
              </div>
        </form>
        <h3 class="mb-0 text-gray-800 h3">Admin List <span class="badge text-bg-secondary h5">{{ $admins->total() }}</span></h3>
        <a href="{{ route('viewUserList') }}" class="btn btn-outline-primary"><i class="fa-solid fa-user"></i> User List</a>
    </div>

    <div class="">
        <div class="row">


            <div class="col ">
                <table class="table shadow-sm table-hover ">
                    <thead class="text-white bg-primary">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                  @foreach ($admins as $item)
                  <tr>
                    <td>
                        @if ($item->name != null)
                            {{ $item->name }}

                        @else
                            {{ $item->nickname }}
                        @endif
                    </td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->role }}</td>
                    <td>
                        @if(auth()->user()->role == 'superadmin')
                            @if(auth()->user()->id != $item->id)
                            <a href="{{ route('roleChange',$item->id) }}">
                                <button type="button"  class="btn btn-sm btn-outline-dark">
                                    <i class="fa-solid fa-arrow-down"></i> Change to user role
                                </button>
                            </a>
                                <a href="{{ route('deleteAdmin',$item->id) }}">
                                    <button type="button"  class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </a>
                            @endif
                        @endif
                    </td>
                </tr>
                  @endforeach
                </tbody>
                </table>
                <div class="mt-3 d-flex justify-content-center">
                    {{ $admins->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>

</div>
@endsection