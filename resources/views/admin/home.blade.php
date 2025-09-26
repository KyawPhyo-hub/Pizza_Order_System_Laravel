@extends('admin.Layout.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="mb-4">
            <h5>Order Reports</h5>
        </div>

        {{-- Nav Tag for order reports --}}
        <ul class="nav nav-tabs" id="reportTabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#today">Today</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#weekly">Weekly</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#monthly">Monthly</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#overall">Overall</a>
            </li>
        </ul>

        {{-- Tag Contents --}}
        <div class="mt-3 tab-content">
            <div class="tab-pane fade show active" id="today">
                <h4>Today’s Report</h4>
                <!-- Today's Report Row -->
                <div class="row">
                    @php
                        $todayConfirm = $todayOrders->whereNotIn('status', ['pending', 'cancel']);
                        $todayPending = $todayOrders->where('status', 'pending');
                        $todayCancel = $todayOrders->where('status', 'cancel');
                    @endphp
                    {{-- <h5 class="">Today's Report</h5> --}}
                    <div class="mt-2 mb-4 col">
                        <div class="py-2 shadow card border-left-primary h-100">
                            <a href="{{ route('adminTodayOrderList') }}" class="text-decoration-none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="mr-2 ms-2 col">
                                            <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">
                                                Total Order</div>
                                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($todayOrders) }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Confirm Order -->
                    <div class="mt-2 mb-4 col">
                        <div class="py-2 shadow card border-left-success h-100">
                            <a href="{{ route('adminTodayOrderList') }}" class="text-decoration-none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="mr-2 ms-2 col-6">
                                            <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">
                                                Confirm Order</div>
                                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($todayConfirm) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Pending Order -->
                    <div class="mt-2 mb-4 col">
                        <div class="py-2 shadow card border-left-warning h-100">
                            <a href="{{ route('adminTodayOrderList') }}" class="text-decoration-none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="mr-2 ms-2 col">
                                            <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">
                                                Pending Order</div>
                                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($todayPending) }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="text-gray-300 fas fa-comments fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{-- cancel Order --}}
                    <div class="mt-2 mb-4 col">
                        <div class="py-2 shadow card border-left-danger h-100">
                            <a href="{{ route('adminTodayOrderList') }}" class="text-decoration-none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="mr-2 ms-2 col">
                                            <div class="mb-1 text-xs font-weight-bold text-danger text-uppercase">
                                                Cancel Order</div>
                                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($todayCancel) }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            {{-- <i class="text-gray-300 fas fa-calendar fa-2x"></i> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Earnings  -->
                    <div class="mt-2 mb-4 col">
                        <div class="py-2 shadow card border-left-info h-100">
                            <a href="{{ route('adminTodayOrderList') }}" class=" text-decoration-none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="mr-2 ms-2 col">
                                            <div class="mb-1 text-xs font-weight-bold text-info text-uppercase">
                                                Earnings</div>
                                            <div class="mb-0 text-gray-800 h5 font-weight-bold">${{ $todayEarnings }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="text-gray-300 fas fa-comments fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end of today's report --}}

            {{-- Start ot weekly's report --}}
            <div class="tab-pane fade" id="weekly">
                <h4>Weekly Report</h4>
                {{-- Weekly Report Row --}}
                <div class="row">
                    @php
                        $weeklyConfirm = $weeklyOrders->whereNotIn('status', ['pending', 'cancel']);
                        $weeklyPending = $weeklyOrders->where('status', 'pending');
                        $weeklyCancel = $weeklyOrders->where('status', 'cancel');
                    @endphp
                    <!-- Total order -->
                    <div class="mt-2 mb-4 col">
                        <div class="py-2 shadow card border-left-primary h-100">
                            <a href="{{ route('adminWeeklyOrderList') }}" class="text-decoration-none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="mr-2 ms-2 col">
                                            <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">
                                                Total Order</div>
                                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($weeklyOrders) }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            {{-- <i class="text-gray-300 fas fa-calendar fa-2x"></i> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Confirm Order -->
                    <div class="mt-2 mb-4 col">
                        <div class="py-2 shadow card border-left-success h-100">
                            <a href="{{ route('adminWeeklyOrderList') }}" class="text-decoration-none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="mr-2 ms-2 col-6">
                                            <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">
                                                Confirm Order</div>
                                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($weeklyConfirm) }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            {{-- <i class="text-gray-300 fas fa-dollar-sign fa-2x"></i> --}}
                                            {{-- <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">
                                        Weekly Earnings</div>
                                    <div class="mb-0 text-center text-gray-800 h5 font-weight-bold">${{ $weeklyEarnings }}</div> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Pending Order -->
                    <div class="mt-2 mb-4 col">
                        <div class="py-2 shadow card border-left-warning h-100">
                            <a href="{{ route('adminWeeklyOrderList') }}" class="text-decoration-none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="mr-2 ms-2 col">
                                            <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">
                                                Pending Order</div>
                                            <div class="mb-0 text-gray-800 h5 font-weight-bold">
                                                {{ count($weeklyPending) }}
                                            </div>
                                        </div>
                                        {{-- <div class="col-auto">
                                    <i class="text-gray-300 fas fa-comments fa-2x"></i>
                                </div> --}}
                                    </div>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- cancel Order --}}
                <div class="mt-2 mb-4 col">
                    <div class="py-2 shadow card border-left-danger h-100">
                        <a href="{{ route('adminWeeklyOrderList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="mr-2 ms-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-danger text-uppercase">
                                            Cancel Order</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($weeklyCancel) }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        {{-- <i class="text-gray-300 fas fa-calendar fa-2x"></i> --}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Earnings  -->
                <div class="mt-2 mb-4 col">
                    <div class="py-2 shadow card border-left-info h-100">
                        <a href="{{ route('adminWeeklyOrderList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="mr-2 ms-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-info text-uppercase">
                                            Earnings</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">${{ $weeklyEarnings }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-comments fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of weekly's report --}}

        {{-- Start of monthly's report --}}
        <div class="tab-pane fade" id="monthly">
            <h4>Monthly's Report</h4>
            {{-- Weekly Report Row --}}
            <div class="row">
                @php
                    $monthlyConfirm = $monthlyOrders->whereNotIn('status', ['pending', 'cancel']);
                    $monthlyPending = $monthlyOrders->where('status', 'pending');
                    $monthlyCancel = $monthlyOrders->where('status', 'cancel');
                @endphp
                <!-- Total order -->
                <div class="mt-2 mb-4 col">
                    <div class="py-2 shadow card border-left-primary h-100">
                        <a href="{{ route('adminMonthlyOrderList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="mr-2 ms-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">
                                            Total Order</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($monthlyOrders) }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        {{-- <i class="text-gray-300 fas fa-calendar fa-2x"></i> --}}
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                <!-- Confirm Order -->
                <div class="mt-2 mb-4 col">
                    <div class="py-2 shadow card border-left-success h-100">
                        <a href="{{ route('adminMonthlyOrderList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="mr-2 ms-2 col-6">
                                        <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">
                                            Confirm Order</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($monthlyConfirm) }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        {{-- <i class="text-gray-300 fas fa-dollar-sign fa-2x"></i> --}}
                                        {{-- <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">
                                        Weekly Earnings</div>
                                    <div class="mb-0 text-center text-gray-800 h5 font-weight-bold">${{ $weeklyEarnings }}</div> --}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Pending Order -->
                <div class="mt-2 mb-4 col">
                    <div class="py-2 shadow card border-left-warning h-100">
                        <a href="{{ route('adminMonthlyOrderList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="mr-2 ms-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">
                                            Pending Order</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($monthlyPending) }}
                                        </div>
                                    </div>
                                    {{-- <div class="col-auto">
                                    <i class="text-gray-300 fas fa-comments fa-2x"></i>
                                </div> --}}
                                </div>
                        </a>
                    </div>
                </div>
            </div>
            {{-- cancel Order --}}
            <div class="mt-2 mb-4 col">
                <div class="py-2 shadow card border-left-danger h-100">
                    <a href="{{ route('adminMonthlyOrderList') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="mr-2 ms-2 col">
                                    <div class="mb-1 text-xs font-weight-bold text-danger text-uppercase">
                                        Cancel Order</div>
                                    <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($monthlyCancel) }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    {{-- <i class="text-gray-300 fas fa-calendar fa-2x"></i> --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Earnings  -->
            <div class="mt-2 mb-4 col">
                <div class="py-2 shadow card border-left-info h-100">
                    <a href="{{ route('adminMonthlyOrderList') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="mr-2 ms-2 col">
                                    <div class="mb-1 text-xs font-weight-bold text-info text-uppercase">
                                        Earnings</div>
                                    <div class="mb-0 text-gray-800 h5 font-weight-bold">${{ $monthlyEarnings }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="text-gray-300 fas fa-comments fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- end of monthly's report --}}

    {{-- Start of overall's report --}}
    <div class="tab-pane fade" id="overall">
        <h4>Overall Report</h4>
        {{-- Overall Report --}}
        <div class="row">
            @php
                $overallConfirm = $orders->whereNotIn('status', ['pending', 'cancel']);
                $overallPending = $orders->where('status', 'pending');
                $overallCancel = $orders->where('status', 'cancel');
                $overallEarnings = $orders->whereNotIn('status', ['pending', 'cancel'])->sum('total_price');
            @endphp
            <!-- Total order -->
            <div class="mt-2 mb-4 col">
                <div class="py-2 shadow card border-left-primary h-100">
                    <a href="{{ route('adminOverallOrderList') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="mr-2 ms-2 col">
                                    <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">
                                        Total Order</div>
                                    <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($orders) }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    {{-- <i class="text-gray-300 fas fa-calendar fa-2x"></i> --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Confirm Order -->
            <div class="mt-2 mb-4 col">
                <div class="py-2 shadow card border-left-success h-100">
                    <a href="{{ route('adminOverallOrderList') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="mr-2 ms-2 col-6">
                                    <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">
                                        Confirm Order</div>
                                    <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($overallConfirm) }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    {{-- <i class="text-gray-300 fas fa-dollar-sign fa-2x"></i> --}}
                                    {{-- <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">
                                        Weekly Earnings</div>
                                    <div class="mb-0 text-center text-gray-800 h5 font-weight-bold">${{ $weeklyEarnings }}</div> --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Pending Order -->
            <div class="mt-2 mb-4 col">
                <div class="py-2 shadow card border-left-warning h-100">
                    <a href="{{ route('adminOverallOrderList') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="mr-2 ms-2 col">
                                    <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">
                                        Pending Order</div>
                                    <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($overallPending) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="text-gray-300 fas fa-comments fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            {{-- cancel Order --}}
            <div class="mt-2 mb-4 col">
                <div class="py-2 shadow card border-left-danger h-100">
                    <a href="{{ route('adminOverallOrderList') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="mr-2 ms-2 col">
                                    <div class="mb-1 text-xs font-weight-bold text-danger text-uppercase">
                                        Cancel Orders</div>
                                    <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($overallCancel) }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    {{-- <i class="text-gray-300 fas fa-calendar fa-2x"></i> --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Earnings  -->
            <div class="mt-2 mb-4 col">
                <div class="py-2 shadow card border-left-info h-100">
                    <a href="{{ route('adminOverallOrderList') }}" class="text-decoration-none">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="mr-2 ms-2 col">
                                    <div class="mb-1 text-xs font-weight-bold text-info text-uppercase">
                                        Earnings</div>
                                    <div class="mb-0 text-gray-800 h5 font-weight-bold">${{ $overallEarnings }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="text-gray-300 fas fa-comments fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- Your overall report UI -->
    </div>
    </div>



    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="mb-4 shadow card">
                <!-- Card Header - Dropdown -->
                <div class="flex-row py-3 card-header d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    {{-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="text-gray-400 fas fa-ellipsis-v fa-sm fa-fw"></i>
                        </a>
                        <div class="shadow dropdown-menu dropdown-menu-right animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div> --}}
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                        <script>
                            var monthlyData = @json($monthlyEarningsData);
                            var ctx = document.getElementById('myAreaChart').getContext('2d');
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        {{-- <div class="col-xl-4 col-lg-5">
            <div class="mb-4 shadow card">
                <!-- Card Header - Dropdown -->
                <div class="flex-row py-3 card-header d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="text-gray-400 fas fa-ellipsis-v fa-sm fa-fw"></i>
                        </a>
                        <div class="shadow dropdown-menu dropdown-menu-right animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="pt-4 pb-2 chart-pie">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    {{-- Booking section --}}
    <div class="mb-4">
        <h4>Booking Reports</h4>
    </div>

    {{-- Nav Tag for Booking --}}
    <ul class="nav nav-tabs" id="reportTabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#todayBooking">Today</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#weeklyBooking">Weekly</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#monthlyBooking">Monthly</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#overallBooking">Overall</a>
        </li>
    </ul>

    {{-- Content Row --}}
    <div class="mt-3 tab-content">
        <div class="tab-pane fade show active" id="todayBooking">
            <h4>Today's Booking</h4>
            <!-- Today Booking Row -->
            <div class="row">
                <!-- Total -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-primary h-100">
                        <a href="{{ route('adminTodayBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Total Bookings
                                        </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($todayBookings) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-days fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Confirm -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-success h-100">
                        <a href="{{ route('adminTodayBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">Confirm Bookings
                                        </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($todayBookings->where('status','confirm')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-check fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


                {{-- Pending --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-warning h-100">
                        <a href="{{ route('adminTodayBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">Pending </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($todayBookings->where('status','pending')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-minus fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Cencel --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-danger h-100">
                        <a href="{{ route('adminTodayBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-danger text-uppercase">Cencel</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($todayBookings->where('status', 'cencel')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-xmark fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            {{-- end of the row --}}
        </div>

        {{-- Start of the weekly's booking --}}

        <div class="tab-pane fade" id="weeklyBooking">
            <h4>Weekly's Booking</h4>
            <!-- Weekly Booking Row -->
            <div class="row">
                <!-- Total -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-primary h-100">
                        <a href="{{ route('adminWeeklyBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Total Bookings
                                        </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($weeklyBookings) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-days fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Confirm -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-success h-100">
                        <a href="{{ route('adminWeeklyBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">Confirm Bookings
                                        </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($weeklyBookings->where('status', 'confirm')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-check fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- Pending --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-warning h-100">
                        <a href="{{ route('adminWeeklyBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">Pending </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($weeklyBookings->where('status', 'pending')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-minus fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- Cencel --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-danger h-100">
                        <a href="{{ route('adminWeeklyBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-danger text-uppercase">Cencel</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($weeklyBookings->where('status', 'cencel')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-xmark fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- end of the weekly's booking --}}

        {{-- start of the monthly booking --}}

        <div class="tab-pane fade" id="monthlyBooking">
            <h4>Monthly's Booking</h4>
            <!-- Monthly Booking Row -->
            <div class="row">
                <!-- Total -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-primary h-100">
                        <a href="{{ route('adminMonthlyBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Total Bookings
                                        </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($monthlyBookings) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-days fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Confirm -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-success h-100">
                        <a href="{{ route('adminMonthlyBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">Confirm Bookings
                                        </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($monthlyBookings->where('status', 'confirm')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-check fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- Pending --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-warning h-100">
                        <a href="{{ route('adminMonthlyBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">Pending </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($monthlyBookings->where('status', 'pending')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-minus fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- Cencel --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-danger h-100">
                        <a href="{{ route('adminMonthlyBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-danger text-uppercase">Cencel</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($monthlyBookings->where('status', 'cancel')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-xmark fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- end of the monthly booking --}}

        {{-- start of the overall booking --}}

        <div class="tab-pane fade" id="overallBooking">
            <h4>Overall Booking</h4>
            <!-- Overall Booking Row -->
            <div class="row">
                <!-- Total -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-primary h-100">
                        <a href="{{ route('adminOverallBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Total Bookings
                                        </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($bookings) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-days fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Confirm -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-success h-100">
                        <a href="{{ route('adminOverallBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">Confirm Bookings
                                        </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($bookings->where('status','confirm')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-check fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- Pending --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-warning h-100">
                        <a href="{{ route('adminOverallBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div
                                            class="mb-1 text-xs font-weight-bold text-warning text-uppercase">Pending </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($bookings->where('status','pending')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-minus fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- Cencel --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-danger h-100">
                        <a href="{{ route('adminOverallBookingList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-danger text-uppercase">Cencel</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($bookings->where('status','cancel')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-calendar-xmark fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- end of the overall booking --}}

    </div>

    <div class="mb-4">
        <h4>Menu Interface</h4>
    </div>

    {{-- Nav Tag for menu interface --}}
    <ul class="nav nav-tabs" id="reportTabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#pizza">Pizzas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#softdrink">Soft Drinks</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#dessert">Desserts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#combo">Combos</a>
        </li>
    </ul>
    {{-- Content Row --}}
    <div class="mt-3 tab-content">
        <div class="tab-pane fade show active" id="pizza">
            <h4>Pizzas</h4>
            <!-- Pizzas Row -->
            <div class="row">
                @php
                    $totalPizzas = count($pizzas);
                    $availablePizzas = count($pizzas->where('status', 'Available'));
                    $unavailablePizzas = count($pizzas->where('status', 'Unavailable'));
                @endphp
                <!-- Total Pizzas -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-primary h-100">
                        <a href="{{ route('adminPizzaList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Total Pizzas
                                        </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $totalPizzas }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-pizza-slice fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Available -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-success h-100">
                        <a href="{{ route('adminPizzaList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">Available
                                            Pizza
                                        </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $availablePizzas }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-pizza-slice fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


                {{-- Unavailable --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-danger h-100">
                        <a href="{{ route('adminPizzaList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-danager text-uppercase">Unavailable
                                            Pizza</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $unavailablePizzas }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-pizza-slice fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Best Selling --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-warning h-100">
                        <a href="{{ route('adminPizzaList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">Best Selling
                                            Pizza</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold"></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-pizza-slice fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of the Pizzas row --}}

        {{-- Start of the soft drink row --}}
        <div class="tab-pane fade" id="softdrink">
            <h4>Soft Drinks</h4>
            {{-- soft drink --}}
            <div class="row">
                <!-- Total -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-primary h-100">
                        <a href="{{ route('adminSoftDrinkList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Total
                                            Softdrinks
                                        </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($softdrinks) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-cocktail fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Available -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-success h-100">
                        <a href="{{ route('adminSoftDrinkList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">Available
                                            Softdrinks</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">
                                            {{ count($softdrinks->where('status', 'available')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-cocktail fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


                {{-- Unavailable --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-danger h-100">
                        <a href="{{ route('adminSoftDrinkList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-danger text-uppercase">Unavailable
                                            Softdrinks</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">
                                            {{ count($softdrinks->where('status', 'unavailable')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-cocktail fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Best Selling --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-warning h-100">
                        <a href="{{ route('adminSoftDrinkList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">Best Selling
                                            Softdrinks</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold"></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-cocktail fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of the softdrink row --}}

        {{-- Start of the dessert --}}
        <div class="tab-pane fade" id="dessert">
            <h4>Desserts</h4>
            {{-- Desserts Row --}}
            <div class="row">
                <!-- Total Pizzas -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-primary h-100">
                        <a href="{{ route('adminDessertList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Total
                                            Desserts
                                        </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($desserts) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-ice-cream fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Available -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-success h-100">
                        <a href="{{ route('adminDessertList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">Available
                                            Desserts</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">
                                            {{ count($desserts->where('status', 'available')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-ice-cream fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


                {{-- Unavailable --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-danger h-100">
                        <a href="{{ route('adminDessertList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-danger text-uppercase">Unavailable
                                            Desserts</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">
                                            {{ count($desserts->where('status', 'unavailable')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-ice-cream fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Best Selling --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-warning h-100">
                        <a href="{{ route('adminDessertList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">Best Selling
                                            Desserts</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold"></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-ice-cream fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of the dessert row --}}

        {{-- Start of the Combo --}}
        <div class="tab-pane fade" id="combo">
            <h4>Combo-deals</h4>
            {{-- Combo row --}}
            <div class="row">
                <!-- Total -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-primary h-100">
                        <a href="{{ route('adminComboList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Total Combos
                                        </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($combos) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-utensils fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Available -->
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-success h-100">
                        <a href="{{ route('adminComboList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">Available
                                            Combos
                                        </div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">
                                            {{ count($combos->where('status', 'available')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-utensils fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


                {{-- Unavailable --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-danger h-100">
                        <a href="{{ route('adminComboList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-danger text-uppercase">Unavailable
                                            Combos</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold">
                                            {{ count($combos->where('status', 'unavailable')) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-utensils fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Best Selling --}}
                <div class="mb-4 col-xl-3 col-md-4">
                    <div class="py-2 shadow card border-left-warning h-100">
                        <a href="{{ route('adminComboList') }}" class="text-decoration-none">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="mr-2 col">
                                        <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">Best Selling
                                            Combos</div>
                                        <div class="mb-0 text-gray-800 h5 font-weight-bold"></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="text-gray-300 fas fa-utensils fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Row end --}}

    <div class="">
        <h4>User Interface</h4>
    </div>
    <div class="row">
        <!-- Total Users -->
        <div class="mb-4 col-xl-3 col-md-4">
            <div class="py-2 shadow card border-left-primary h-100">
                <a href="" class="text-decoration-none">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Total Users</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ count($users) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="text-gray-300 fas fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Super Admin -->
        <div class="mb-4 col-xl-3 col-md-4">
            <div class="py-2 shadow card border-left-secondary h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-secondary text-uppercase">Super Admin</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">
                                {{ count($users->where('role', 'superadmin')) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-shield fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Admin -->
        <div class="mb-4 col-xl-3 col-md-4">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">Admin</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">
                                {{ count($users->where('role', 'admin')) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-cog fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User -->
        <div class="mb-4 col-xl-3 col-md-4">
            <div class="py-2 shadow card border-left-info h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-info text-uppercase">User</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">
                                {{ count($users->where('role', 'user')) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



        <!-- Content Row -->
        {{-- <div class="row">

        <!-- Content Column -->
        <div class="mb-4 col-lg-6">

            <!-- Project Card Example -->
            <div class="mb-4 shadow card">
                <div class="py-3 card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                    <div class="mb-4 progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                    <div class="mb-4 progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                    <div class="mb-4 progress">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                    <div class="mb-4 progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

            <!-- Color System -->
            <div class="row">
                <div class="mb-4 col-lg-6">
                    <div class="text-white shadow card bg-primary">
                        <div class="card-body">
                            Primary
                            <div class="text-white-50 small">#4e73df</div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-lg-6">
                    <div class="text-white shadow card bg-success">
                        <div class="card-body">
                            Success
                            <div class="text-white-50 small">#1cc88a</div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-lg-6">
                    <div class="text-white shadow card bg-info">
                        <div class="card-body">
                            Info
                            <div class="text-white-50 small">#36b9cc</div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-lg-6">
                    <div class="text-white shadow card bg-warning">
                        <div class="card-body">
                            Warning
                            <div class="text-white-50 small">#f6c23e</div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-lg-6">
                    <div class="text-white shadow card bg-danger">
                        <div class="card-body">
                            Danger
                            <div class="text-white-50 small">#e74a3b</div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-lg-6">
                    <div class="text-white shadow card bg-secondary">
                        <div class="card-body">
                            Secondary
                            <div class="text-white-50 small">#858796</div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-lg-6">
                    <div class="text-black shadow card bg-light">
                        <div class="card-body">
                            Light
                            <div class="text-black-50 small">#f8f9fc</div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-lg-6">
                    <div class="text-white shadow card bg-dark">
                        <div class="card-body">
                            Dark
                            <div class="text-white-50 small">#5a5c69</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mb-4 col-lg-6">

            <!-- Illustrations -->
            <div class="mb-4 shadow card">
                <div class="py-3 card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="px-3 mt-3 mb-4 img-fluid px-sm-4" style="width: 25rem;"
                            src="img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow"
                            href="https://undraw.co/">unDraw</a>, a
                        constantly updated collection of beautiful svg images that you can use
                        completely free and without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                        unDraw &rarr;</a>
                </div>
            </div>

            <!-- Approach -->
            <div class="mb-4 shadow card">
                <div class="py-3 card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                        CSS bloat and poor page performance. Custom CSS classes are used to create
                        custom components and custom utility classes.</p>
                    <p class="mb-0">Before working with this theme, you should become familiar with the
                        Bootstrap framework, especially the utility classes.</p>
                </div>
            </div>

        </div>
    </div> --}}

    </div>
    <!-- /.container-fluid -->
@endsection

