<?php

namespace App\Http\Controllers\Customer;

use App\Models\Cart;
use App\Models\Combo;
use App\Models\Pizza;
use App\Models\Dessert;
use App\Models\Topping;
use App\Models\Category;
use App\Models\SoftDrink;
use App\Models\Cart_Topping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartDetails($id, $category_id){
    $menu = null;
    $type = null;

    if (in_array($category_id, [1, 2, 5, 6, 7])) {
        $menu = Pizza::findOrFail($id);
        $type = 'pizza';
    } elseif ($category_id == 3) {
        $menu = SoftDrink::findOrFail($id);
        $type = 'softdrink';
    } elseif ($category_id == 8) {
        $menu = Combo::findOrFail($id);
        $type = 'combo';
    } elseif ($category_id == 9) {
        $menu = Dessert::findOrFail($id);
        $type = 'dessert';
    } else {
        abort(404); // Unknown category
    }

    $category_name = Category::findOrFail($category_id)->name;
    //dd($menu->toArray());
        return view('.customer.addToCart',compact('menu', 'category_name', 'type'));
    }

    //Add to cart
    public function addToCart(Request $request){
    $userId = Auth::id();

    $cartItem = Cart::where('user_id', $userId)
        ->where('menu_id', $request->menu_id)
        ->where('category_id', $request->category_id)
        ->first();

    if ($cartItem) {
        $cartItem->quantity += $request->quantity;
        $cartItem->save();
        $cartId = $cartItem->id;
        $category_id = $cartItem->category_id;
    } else {
        $cart = Cart::create([
            'user_id' => $userId,
            'category_id' => $request->category_id,
            'menu_id' => $request->menu_id,
            'quantity' => $request->quantity
        ]);
        $cartId = $cart->id;
        $category_id = $request->category_id;
    }

    // logger()->info("Cart ID: " . $cartId);

    return response()->json([
        'success' => true,
        'message' => 'Item added to cart',
        'cart_id' => $cartId,
        'category_id' => $category_id
    ]);
}
public function chooseToppings($cartId)
{
    $toppings = Topping::select('*')
        ->orderBy('name', 'asc')
        ->get();
        $cartToppings = Cart_Topping::where('cart_id', $cartId)->get();
    $selectedToppingIds = $cartToppings->pluck('topping_id')->toArray();
        // logger()->info("Toppings: " . $toppings->toJson());
    return view('customer.topping',compact('toppings', 'cartId','selectedToppingIds'));
}
//add Topping

// public function addTopping(Request $request){
//     $cartId = $request->cart_id;
//     $toppingIds = $request->toppings;
//     $toppings = Topping::whereIn('id', $toppingIds)->get();
//     $cartToppings = [];
//     foreach($toppings as $topping){
//         $cartToppings [] = [
//             'cart_id' => $cartId,
//             'user_id' => Auth::id(),
//             'topping_id' => $topping->id,
//             'name' => $topping->name,
//             'price' => $topping->price,
//             'created_at' => now(),
//             'updated_at' => now()

//         ];
//     }
//     if (count($cartToppings) > 0) {
//         Cart_Topping::insert($cartToppings);
//         return response()->json([
//             'success' => true,
//             'message' => 'Toppings added to cart',
//             'cart_id' => $cartId,
//             'toppings' => $toppings
//         ]);
//     } else {
//         return response()->json([
//             'success' => false,
//             'message' => 'No toppings selected',
//         ]);
//     }
// }


public function addTopping(Request $request){
    $cartId = $request->cart_id;
    $toppingIds = $request->toppings;

    $toppings = Topping::whereIn('id', $toppingIds)->get();

    foreach ($toppings as $topping) {
        Cart_Topping::updateOrCreate(
            [
                'cart_id' => $cartId,
                'user_id' => Auth::id(),
                'topping_id' => $topping->id,
            ],
            [
                'name' => $topping->name,
                'price' => $topping->price,
                'updated_at' => now(), // optional, Eloquent usually handles this
            ]
        );
    }

    return response()->json([
        'success' => true,
        'message' => 'Toppings added/updated in cart',
        'cart_id' => $cartId,
    ]);
}
public function removeCartItem(Request $request)
{
    $cartId = $request->cartId;

    // Find the cart item by ID
    $cartItem = Cart::find($cartId);

    if ($cartItem) {
        // First delete associated toppings
        Cart_Topping::where('cart_id', $cartId)->delete();

        // Then delete the cart item
        $cartItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Cart item removed successfully',
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Cart item not found',
        ]);
    }
}

}
