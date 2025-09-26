<?php

namespace App\Http\Controllers\Customer;

use App\Models\Cart;
use App\Models\Combo;
use App\Models\Pizza;
use App\Models\Booking;
use App\Models\Dessert;
use App\Models\Topping;
use App\Models\SoftDrink;
use App\Models\Cart_Topping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerDashboard extends Controller
{
    //home direct
    public function home(){
        return view('customer.home');
    }
    //about direct
    // Removed duplicate method
    //menu direct
    public function menu(){
        $pizzas = Pizza::select('pizzas.id', 'pizzas.name', 'pizzas.description', 'pizzas.price', 'pizzas.image','pizzas.size',
                 'pizzas.category_id', 'pizzas.status','categories.name as category_name')
                 ->where('status', 'available')
                 ->leftJoin('categories', 'pizzas.category_id', '=', 'categories.id')
                ->get();
                // dd($pizzas->toArray());
        $combos = Combo::with('pizza1', 'pizza2', 'softDrink', 'dessert', 'category')
                ->where('status', 'available')
                ->get();
                //dd($combos->toArray());
        $softDrinks = SoftDrink::select('soft_drinks.id', 'soft_drinks.name', 'soft_drinks.description', 'soft_drinks.price', 'soft_drinks.image',
                 'soft_drinks.category_id', 'soft_drinks.status','categories.name as category_name')
                 ->where('status', 'available')
                 ->leftJoin('categories', 'soft_drinks.category_id', '=', 'categories.id')
                ->get();
        $desserts = Dessert::select('desserts.id', 'desserts.name', 'desserts.description', 'desserts.price', 'desserts.image',
                 'desserts.category_id', 'desserts.status','categories.name as category_name')
                 ->where('status', 'available')
                 ->leftJoin('categories', 'desserts.category_id', '=', 'categories.id')
                ->get();
        return view('customer.menu',compact('pizzas', 'combos', 'softDrinks', 'desserts'));
    }
    //Reservation direct
    public function reservation(){
        return view('customer.reservation');
    }
    //Store Reservation
    public function storeReservation(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i|after_or_equal:11:00|before_or_equal:22:00',
            'people' => 'required|integer|min:1',
            'message' => 'nullable|string|max:500',
        ]);

        $bookingData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'booking_id' => uniqid('PB_'), // Generate a unique booking ID
            'booking_date' => $request->date,
            'booking_time' => $request->time,
            'guests' => $request->people,
            'special_request' => $request->message,
            'status' => 'pending',
            'user_id' => auth()->id(), // Assuming the user is authenticated
        ];

        Booking::create($bookingData);
        return redirect()->route('customerReservation')->with('success', 'Reservation request submitted successfully.');
    }
    //Booking List
    public function bookingList(){
        $bookings = Booking::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('customer.bookingList', compact('bookings'));
    }
    //Cart direct
    public function cart(){
        $dbcarts = Cart::
            leftJoin('pizzas', function ($join) {
                $join->on('carts.menu_id', '=', 'pizzas.id')
                 ->whereIn('carts.category_id', [1, 2, 5, 6, 7]);
            })
            ->leftJoin('soft_drinks', function ($join) {
                $join->on('carts.menu_id', '=', 'soft_drinks.id')
                    ->where('carts.category_id', '=', 3);
            })
            ->leftJoin('desserts', function ($join) {
                $join->on('carts.menu_id', '=', 'desserts.id')
                    ->where('carts.category_id', '=', 9);
            })
            ->leftJoin('combos', function ($join) {
                $join->on('carts.menu_id', '=', 'combos.id')
                    ->where('carts.category_id', '=', 8);
            })
            ->leftJoin('categories', 'carts.category_id','categories.id')
            ->select('carts.*',
                'pizzas.name as pizza_name','pizzas.image as pizza_image', 'pizzas.price as pizza_price',
                'soft_drinks.name as softdrink_name','soft_drinks.image as softdrink_image', 'soft_drinks.price as softdrink_price',
                'desserts.name as dessert_name','desserts.image as dessert_image', 'desserts.price as dessert_price',
                'combos.name as combo_name','combos.image as combo_image', 'combos.price as combo_price',
                'categories.name as category_name'

            )
            ->where('carts.user_id', auth()->id())
            ->get();
            $toppingGroup = Cart_Topping::whereIn('cart_id',$dbcarts->pluck('id')->toArray())
                                            ->get()
                                            ->groupBy('cart_id');

        // dd($dbcarts->toArray());
        $carts = [];

        foreach ($dbcarts as $cart) {
            $image = $cart->pizza_image ?? $cart->softdrink_image ?? $cart->dessert_image ?? $cart->combo_image;

            switch ($cart->category_id) {
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

            $carts[] = [
                'id' => $cart->id,
                'category_id' => $cart->category_id,
                'menu_id' => $cart->menu_id,
                'quantity' => $cart->quantity,
                'category_name' => $cart->category_name,
                'name' => $cart->pizza_name ?? $cart->softdrink_name ?? $cart->dessert_name ?? $cart->combo_name,
                'image' => $image,
                'price' => $cart->pizza_price ?? $cart->softdrink_price ?? $cart->dessert_price ?? $cart->combo_price,
                'imagePath' => $imagePath,
                'toppings' => $toppingGroup[$cart->id] ?? []
            ];
        }

        // dd($carts);

        return view('customer.cart',compact('carts'));
    }
    //Chefs direct
    public function chefs(){
        return view('customer.customer');
    }
    //about direct
    public function cusAbout(){
        return view('customer.about');
    }
    //contact direct
    public function contact(){
        return view('customer.contact');
    }
    //location direct
    public function location(){
        return view('customer.location');
    }

}
