<?php

namespace App\Http\Controllers\Customer;

use Exception;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Cart_Topping;
use Illuminate\Http\Request;
use App\Models\Order_Toppings;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function storeOrder(Request $request){
        // logger()->info($request->all());
        try{
            $items = json_decode($request->input('data'),true);
            $order = null; // Declare $order outside the transaction
        DB::transaction(function () use ($items, &$order) { // Pass $order by reference
            $totalPrice = array_sum(array_column($items, 'subTotal'));
            $order = Order::create([
                'user_id' => auth()->id(),
                'order_code' => $items[0]['orderCode'],
                'total_price' => $totalPrice,
                'status' => 'pending',
                'delivery_type' => null,
                'delivery_address' => null,
                'payment_status' => 'unpaid',
            ]);

            foreach ($items as $item){
                $order_item = Order_Item::create([
                    'order_id' => $order->id,
                    'menu_id' => $item['menuId'],
                    'category_id' => $item['categoryId'],
                    'quantity' => $item['qty'],
                    'unit_price' =>$item['unitPrice'],
                    'subtotal' => $item['subTotal']
                ]);

                $OrderToppings = Cart_Topping::where('cart_id', $item['cartId'])->get();
                if($OrderToppings->isNotEmpty()){
                    foreach($OrderToppings as $toppings){
                        $order_toppings = Order_Toppings::create([
                            'order_item_id' => $order_item->id,
                            'topping_id' => $toppings->topping_id,
                            'name' => $toppings->name,
                            'price' => $toppings->price,
                        ]);
                    }
                }
            }
        });
        $userId = auth()->id(); // current user

        // Get cart IDs for this user
        $cartIds = Cart::where('user_id', $userId)->pluck('id');

        // Delete related cart toppings
        Cart_Topping::whereIn('cart_id', $cartIds)->delete();

        // Delete the carts themselves
        Cart::where('user_id', $userId)->delete();

        return response()->json(['message' => 'success', 'orderId' => $order->id], 200);

        }catch (Exception $e) {
            Log::error('Order storing failed:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['message' => 'error', 'error' => $e->getMessage()], 500);
        }
    }

    //Choose delivery direct page
    public function chooseDeliveryPage($orderId){
        return view('customer.chooseDelivery',compact('orderId'));
    }
    public function storeDeliveryType(Request $request){
        $request->validate([
            'delivery_type' => 'required|string',
            'address' => 'required_if:delivery_type,home_delivery|string|max:255',
            'phone' => 'required|numeric',
        ]);
        //dd($request->all());
        try{
            $order = Order::findOrFail($request->input('orderId'));
            if($order){
                $total = $order->total_price;
                if($request->delivery_type == 'home_delivery'){
                    $total += 3;
                }
                Order::where('id', $request->orderId)
                ->update([
                    'delivery_type' => $request->delivery_type,
                    'delivery_address' => $request->address,
                    'phone_number' => $request->phone,
                    'total_price' => $total,
                ]);
            }
            $orderId = $request->orderId;

            return to_route('customerPaymentPage',compact('orderId'));
        }catch (Exception $e) {
            Log::error('Delivery type storing failed:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['message' => 'error', 'error' => $e->getMessage()], 500);
        }
    }
    // Payment page
    public function paymentPage($orderId){
        $order = Order::select('delivery_type')->where('id',$orderId)->first();
        return view('customer.payment',compact('orderId','order'));
    }
    //store payment
    public function storePayment(Request $request){
        $request->validate([
            'payment_method' => 'required|string',
        ]);
        try{
            $order = Order::findOrFail($request->input('orderId'));
            if($order){
                Order::where('id', $request->orderId)
                ->update([
                    'payment_method' => $request->payment_method,
                ]);
            }
            return to_route('customerOrderList');
        }catch (Exception $e) {
            Log::error('Payment storing failed:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['message' => 'error', 'error' => $e->getMessage()], 500);
        }
    }
    //Order List
    public function orderList(){
        $orders = Order::where('user_id', auth()->id())
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customer.orders', compact('orders'));
    }

    //Order Details
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
            ->where('user_id', auth()->id())
            ->first();
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
                    'status' => $orders->status,
                ];

        }
        //dd($order);
        return view('customer.orderDetails',compact('order','orders'));
    }
}
