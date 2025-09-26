<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Order_Item;
use Illuminate\Http\Request;
use App\Models\Order_Toppings;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OrderManageController extends Controller
{
    //today Order list
    public function todayOrder(Request $request){
        $search = $request->input('search');
        $orders = Order::select('orders.*','users.name as user_name')
        ->leftjoin('users','orders.user_id','users.id')
        ->when($search, function($query , $search){
            $query->where(function($q) use ($search){
                $q->where('orders.order_code','like','%'.$search.'%')
                  ->orWhere('users.name','like','%'.$search.'%')
                  ->orWhere('orders.total_price','like','%'.$search.'%')
                  ->orWhere('orders.status','like','%'.$search.'%')
                  ->orWhere('orders.delivery_type','like','%'.$search.'%')
                  ->orWhere('orders.delivery_address','like','%'.$search.'%')
                  ->orWhere('orders.phone_number','like','%'.$search.'%');
            });
        })
        ->whereDate('orders.created_at', Carbon::today())
        ->orderBy('created_at','desc')
        ->get();
        return view('admin.manageOrder.todayOrderList',compact('orders','search'));
    }

    //weekly Order List
    public function weeklyOrder(Request $request){
        $search = $request->input('search');
        $orders = Order::select('orders.*','users.name as user_name')
        ->leftjoin('users','orders.user_id','users.id')
        ->when($search, function($query , $search){
            $query->where(function($q) use ($search){
                $q->where('orders.order_code','like','%'.$search.'%')
                    ->orWhere('users.name','like'.'%'.$search.'%')
                    ->orWhere('orders.total_price','like','%'.$search.'%')
                    ->orWhere('orders.status','like','%'.$search.'%')
                    ->orWhere('orders.delivery_type','like','%'.$search.'%')
                    ->orWhere('orders.delivery_address','like','%'.$search.'%')
                    ->orWhere('orders.phone_number','like','%'.$search.'%');
            });
        })
        ->whereBetween('orders.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->orderBy('created_at','desc')
        ->get();
        return view('admin.manageOrder.weeklyOrder',compact('orders','search'));

    }

    //monthly Order List
    public function monthlyOrder(Request $request){
        $search = $request->input('search');

        $orders = Order::select('orders.*','users.name as user_name')
        ->leftjoin('users','orders.user_id','users.id')
        ->when($search, function($query , $search){
            $query->where(function($q) use ($search){
                $q->where('orders.order_code','like','%'.$search.'%')
                  ->orWhere('users.name','like','%'.$search.'%')
                  ->orWhere('orders.total_price','like','%'.$search.'%')
                  ->orWhere('orders.status','like','%'.$search.'%')
                  ->orWhere('orders.delivery_type','like','%'.$search.'%')
                  ->orWhere('orders.delivery_address','like','%'.$search.'%')
                  ->orWhere('orders.phone_number','like','%'.$search.'%');
            });
        })
        ->whereMonth('orders.created_at', Carbon::now()->month)
        ->orderBy('created_at','desc')
        ->get();
        return view('admin.manageOrder.monthlyOrder',compact('orders','search'));
    }

    //Overall Order List
    public function overallOrder(Request $request){
        $search = $request->input('search');

        $orders = Order::select('orders.*','users.name as user_name')
        ->leftjoin('users','orders.user_id','users.id')
        ->when($search, function($query , $search){
            $query->where('orders.order_code','like','%'.$search.'%')
                  ->orWhere('users.name','like','%'.$search.'%')
                  ->orWhere('orders.total_price','like','%'.$search.'%')
                  ->orWhere('orders.status','like','%'.$search.'%')
                  ->orWhere('orders.delivery_type','like','%'.$search.'%')
                  ->orWhere('orders.delivery_address','like','%'.$search.'%')
                  ->orWhere('orders.phone_number','like','%'.$search.'%');
        })
        ->orderBy('created_at','desc')
        ->get();
        return view('admin.manageOrder.overallOrderList',compact('orders','search'));
    }

    //order details
    public function orderDetails($orderId){
        //dd($orderId);
        $orderItems = Order_Item::
        leftJoin('pizzas', function ($join) {
            $join->on('order__items.menu_id', '=', 'pizzas.id')
             ->whereIn('order__items.category_id', [1, 2, 5, 6, 7]);
        })
        ->leftJoin('soft_drinks', function ($join) {
            $join->on('order__items.menu_id', '=', 'soft_drinks.id')
                ->where('order__items.category_id', '=', 3);
        })
        ->leftJoin('desserts', function ($join) {
            $join->on('order__items.menu_id', '=', 'desserts.id')
                ->where('order__items.category_id', '=', 9);
        })
        ->leftJoin('combos', function ($join) {
            $join->on('order__items.menu_id', '=', 'combos.id')
                ->where('order__items.category_id', '=', 8);
        })
        ->leftJoin('categories', 'order__items.category_id','categories.id')
        ->select('order__items.*',
            'pizzas.name as pizza_name','pizzas.image as pizza_image', 'pizzas.price as pizza_price',
            'soft_drinks.name as softdrink_name','soft_drinks.image as softdrink_image', 'soft_drinks.price as softdrink_price',
            'desserts.name as dessert_name','desserts.image as dessert_image', 'desserts.price as dessert_price',
            'combos.name as combo_name','combos.image as combo_image', 'combos.price as combo_price',
            'categories.name as category_name'

        )
        ->where('order_id', $orderId)
        ->get();
        //dd($orderItems->toArray());
        $orders = Order::where('id', $orderId)
            ->first();
        $user = User::where('id', $orders->user_id)->first();
        // dd($orderItems->toArray());
        $order = [];
        foreach($orderItems as $item){
            $item->toppings = Order_Toppings::where('order_item_id', $item->id)->get();


                $image = $item->pizza_image ?? $item->softdrink_image ?? $item->dessert_image ?? $item->combo_image;
                switch ($item->category_id) {
                    case 1:
                    case 2:
                    case 5:
                    case 6:
                    case 7:
                        $imagePath = $image ? asset('uploads/pizzas/' . $image) : null;
                        break;
                    case 3:
                        $imagePath = $image ? asset('uploads/softdrinks/' . $image) : null;
                        break;
                    case 8:
                        $imagePath = $image ? asset('uploads/combos/' . $image) : null;
                        break;
                    case 9:
                        $imagePath = $image ? asset('uploads/desserts/' . $image) : null;
                        break;
                    default:
                        $imagePath = null;
                }

                $order[]= [
                    'id' => $item->id,
                    'username' => $user->name,
                    'order_id' => $orderId,
                    'order_code' => $orders->order_code,
                    'category_id' => $item->category_id,
                    'menu_id' => $item->menu_id,
                    'quantity' => $item->quantity,
                    'category_name' => $item->category_name,
                    'name' => $item->pizza_name ?? $item->softdrink_name ?? $item->dessert_name ?? $item->combo_name,
                    'image' => $image,
                    'price' => $item->pizza_price ?? $item->softdrink_price ?? $item->dessert_price ?? $item->combo_price,
                    'imagePath' => $imagePath,
                    'toppings' => $item->toppings ?? [],
                ];

        }
        //dd($order);
        return view('admin.manageOrder.orderDetails',compact('order','orders'));
    }

    //update order status
    public function updateStatus(Request $request){
        // logger()->info($request->all());
        $updateData = [
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ];

        if(!empty($request->payment_status)){
            $updateData['payment_status'] = $request->payment_status;
        }

        Order::where('order_code',$request->orderCode)->update($updateData);
        return response()->json([
            'success' => true,
            'message' => 'Order status updated successfully',
        ]);

    }
}
