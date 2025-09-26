<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Combo;
use App\Models\Order;
use App\Models\Pizza;
use App\Models\Booking;
use App\Models\Dessert;
use App\Models\SoftDrink;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function home()
    {
        //get all orders
        $orders = Order::latest()->get();

        //today orders
        $todayOrders = Order::whereDate('created_at', Carbon::today())->get();

        //today earnings
        $todayEarnings = Order::whereDate('created_at', Carbon::today())
                                ->whereNotIn('status', ['pending','cancel'])
                                ->sum('total_price');

        //weekly orders
        $weeklyOrders = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();

        //weekly earnings
        $weeklyEarnings = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                ->whereNotIn('status', ['pending','cancel'])
                                ->sum('total_price');
                                // dd($weeklyEarnings);

        //monthly orders
        $monthlyOrders = Order::whereMonth('created_at', Carbon::now()->month)
                                ->whereYear('created_at', Carbon::now()->year)
                                ->get();
        //monthly earnings
        $monthlyEarnings = Order::whereMonth('created_at', Carbon::now()->month)
                                ->whereYear('created_at', Carbon::now()->year)
                                ->whereNotIn('status', ['pending','cancel'])
                                ->sum('total_price');
         $pizzas = Pizza::all();
         $softdrinks = SoftDrink::all();
         $desserts = Dessert::all();
         $combos = Combo::all();

         $users = User::all();

         //for Area chart

         $monthlyEarningsQuery = Order::selectRaw('MONTH(created_at) as month, SUM(total_price) as total')
         ->whereYear('created_at', Carbon::now()->year)
         ->whereNotIn('status', ['pending','cancel'])
         ->groupBy('month')
         ->pluck('total', 'month');  // returns like [1 => 1000, 2 => 2000]

     // build array for all 12 months
        $monthlyEarningsData = [];
            for ($m = 1; $m <= 12; $m++) {
            $monthlyEarningsData[] = isset($monthlyEarningsQuery[$m])
            ? (float) $monthlyEarningsQuery[$m]  // 👈 force number
            : 0;
}

        //Booking
        $todayBookings = Booking::whereDate('created_at', Carbon::today())->get();
        $weeklyBookings = Booking::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $monthlyBookings = Booking::whereMonth('created_at', Carbon::now()->month)
                                ->whereYear('created_at', Carbon::now()->year)
                                ->get();
        $bookings = Booking::all();

        return view('admin.home',compact('orders','todayOrders','weeklyOrders','monthlyOrders',
                                        'todayEarnings','weeklyEarnings','monthlyEarnings','pizzas','softdrinks','desserts','combos'
                                    ,'users','monthlyEarningsData','bookings','monthlyBookings','weeklyBookings','todayBookings'));
    }
}
