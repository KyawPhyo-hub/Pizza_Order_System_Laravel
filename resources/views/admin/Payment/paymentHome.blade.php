@extends('admin.Layout.master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h5>Payment</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('adminStorePayment') }}" method="POST">
                        @csrf
                        <label for="paymentMethod" class=" form-lable">Payment Method</label>
                        <input type="text" name="paymentMethod" class="mb-3 form-control @error('paymentMethod') is-invalid @enderror" id="" >
                        @error('paymentMethod')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label for="name">Name</label>
                        <input type="text" name="name" class="mb-3 form-control @error('name') is-invalid @enderror" id="">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label for="account">Payment Account</label>
                        <input type="number" name="account" class="mb-3 form-control @error('account') is-invalid @enderror" id="">
                        @error('account')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <input type="submit" value="Create Payment" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="t-body">
                <table class="table table-bordered table-striped">
                    <thead class="text-white bg-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Name</th>
                            <th scope="col">Payment Account</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center ">

                        @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->payment_method }}</td>
                            <td>{{ $payment->name }}</td>
                            <td>{{ $payment->account }}</td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection