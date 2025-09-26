<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pizza;
use App\Models\Dessert;
use App\Models\Topping;
use App\Models\Category;
use App\Models\SoftDrink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function categoryHome(){
        $categories = Category::all();
        return view('admin.ManageMenu.category',compact('categories'));
    }
    public function categoryStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('adminCategoryHome')->with('success', 'Category created successfully.');
    }
    public function categoryDelete(Request $request){
        // dd($request->id);
       Category::findOrFail($request->id)
                ->delete();

       return redirect()->route('adminCategoryHome')->with('success', 'Category deleted successfully.');
    }

    //Add Pizza Page
    public function addmenu(){
        $categories = Category::all();
        return view('admin.ManageMenu.createPizza',compact('categories'));
    }

    //Store Pizza
    public function storePizza(Request $request){


        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'categoryId' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size' => 'required',
            'status' => 'required',
        ]);

        $pizzaData = $request->all();
        // dd($pizzaData);
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/pizzas'), $imageName);
            $pizzaData['image'] = $imageName;
        }
        Pizza::create([
            'name' => $pizzaData['name'],
            'description' => $pizzaData['description'],
            'price' => $pizzaData['price'],
            'category_id' => $pizzaData['categoryId'],
            'image' => $pizzaData['image'] ?? null,
            'size' => $pizzaData['size'],
            'status' => $pizzaData['status'],
        ]);
        return redirect()->route('adminAddMenu')->with('success', 'Pizza added successfully.');
    }
    public function pizzaList(Request $request){
        $search = $request->input('search');

        $pizzas = Pizza::select(
            'pizzas.id',
            'pizzas.name',
            'pizzas.description',
            'pizzas.price',
            'pizzas.image',
            'pizzas.size',
            'pizzas.status',
            'categories.name as category_name'
        )->leftJoin('categories', 'pizzas.category_id', '=', 'categories.id')
        ->when($search, function($query, $search){
            $query->where(function($q) use ($search){
                $q->where('pizzas.name','like','%'.$search.'%')
                  ->orWhere('pizzas.description','like','%'.$search.'%')
                  ->orWhere('pizzas.price','like','%'.$search.'%')
                  ->orWhere('pizzas.size','like','%'.$search.'%')
                  ->orWhere('pizzas.status','like','%'.$search.'%')
                  ->orWhere('categories.name','like','%'.$search.'%');
            });
        })
        ->paginate(10);
        // dd($pizzas->toArray());
        return view('admin.ManageMenu.pizzaList',compact('pizzas','search'));
    }

    //View Pizza Details
    public function viewPizza($id){
        $pizza = Pizza::select(
            'pizzas.id',
            'pizzas.name',
            'pizzas.description',
            'pizzas.price',
            'pizzas.image',
            'pizzas.size',
            'pizzas.status',
            'categories.name as category_name'
        )->leftJoin('categories', 'pizzas.category_id', '=', 'categories.id')
        ->where('pizzas.id', $id)
        ->firstOrFail();
            // dd($pizza->toArray());
        return view('admin.ManageMenu.viewPizza', compact('pizza'));
    }

    //Update Pizza
    public function updatePizza($id){

        $pizza = Pizza::select(
            'pizzas.id',
            'pizzas.name',
            'pizzas.description',
            'pizzas.price',
            'pizzas.image',
            'pizzas.size',
            'pizzas.status',
            'categories.id as category_id',
            'categories.name as category_name'
        )->leftJoin('categories', 'pizzas.category_id', '=', 'categories.id')
        ->where('pizzas.id', $id)
        ->firstOrFail();
        // dd($pizza->toArray());
        $categories = Category::all();
        return view('admin.ManageMenu.updatePizza',compact('pizza','categories'));

    }
    //updatePizzaStore
    public function updatePizzaStore(Request $request, $id){
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:pizzas,name,'.$id,
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'categoryId' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size' => 'required',
            'status' => 'required',
        ]);

        $pizzaData = $request->all();
        $pizza = Pizza::findOrFail($id);

            if ($request->hasFile('image')) {
                if ($pizza->image) {
                    unlink(public_path('uploads/pizzas/' . $pizza->image));
                }
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/pizzas'), $imageName);
                $pizzaData['image'] = $imageName;
            } else {
                $pizzaData['image'] = $pizza->image; // Keep the old image if no new one is uploaded
            }


        $pizza->update([
            'name' => $pizzaData['name'],
            'description' => $pizzaData['description'],
            'price' => $pizzaData['price'],
            'category_id' => $pizzaData['categoryId'],
            'image' => $pizzaData['image'],
            'size' => $pizzaData['size'],
            'status' => $pizzaData['status'],
        ]);

        return redirect()->route('adminPizzaList')->with('success', 'Pizza updated successfully.');
    }
    //Delete Pizza
    public function deletePizza($id){
        $pizza = Pizza::findOrFail($id);
        if ($pizza->image) {
            unlink(public_path('uploads/pizzas/' . $pizza->image));
        }
        $pizza->delete();
        return redirect()->route('adminPizzaList')->with('success', 'Pizza deleted successfully.');
    }
    //create Wine display
    public function createsoftdrink(){
        // Logic to create wine
        $categories = Category::all();
        return view('admin.ManageMenu.createSoftDrink',compact('categories'));
    }

    //Store Soft Drink
    public function storeSoftDrink(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'categoryId' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size' => 'required',
            'status' => 'required',
        ]);

        $softDrinkData = $request->all();
        // dd($softDrinkData);
        if ($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/softdrinks'), $imageName);
            $softDrinkData['image'] = $imageName;
        }

        // dd($softDrinkData['image']);

        // Store the soft drink data in the database
        SoftDrink::create([
            'name' => $softDrinkData['name'],
            'description' => $softDrinkData['description'],
            'price' => $softDrinkData['price'],
            'category_id' => $softDrinkData['categoryId'],
            'image' => $softDrinkData['image'] ?? null,
            'size' => $softDrinkData['size'],
            'status' => $softDrinkData['status'],
        ]);

        return redirect()->route('adminCreateSoftDrink')->with('success', 'Soft drink added successfully.');
    }

    //softDrink list
    public function softDrinkList(Request $request){
        $search = $request->input('search');

        $softDrinkList = SoftDrink::select(
            'soft_drinks.id',
            'soft_drinks.name',
            'soft_drinks.description',
            'soft_drinks.price',
            'soft_drinks.image',
            'soft_drinks.size',
            'soft_drinks.status',
            'soft_drinks.category_id',
        )
        ->when($search, function($query, $search){
            $query->where(function($q) use ($search){
                $q->where('soft_drinks.name','like','%'.$search.'%')
                    ->orWhere('soft_drinks.description','like','%'.$search.'%')
                    ->orWhere('soft_drinks.price','like','%'.$search.'%')
                    ->orWhere('soft_drinks.size','like','%'.$search.'%')
                    ->orWhere('soft_drinks.status','like','%'.$search.'%');
            });
        })
        ->paginate(10);
        // dd($softDrinkList->toArray());
        $category_name = Category::select('categories.name as category_name')
                     ->where('id',3)->first();
                    //  dd($category_name->toArray());
            return view('admin.ManageMenu.softDrinksList', compact('softDrinkList','category_name','search'));

    }

    //View Soft Drink Details
    public function viewSoftDrink($id){
        $softDrink = SoftDrink::select(
            'soft_drinks.id',
            'soft_drinks.name',
            'soft_drinks.description',
            'soft_drinks.price',
            'soft_drinks.image',
            'soft_drinks.size',
            'soft_drinks.status',
            'categories.name as category_name'
        )->leftJoin('categories','soft_drinks.category_id', '=', 'categories.id')
        ->where('soft_drinks.id', $id)
        ->firstOrFail();
        // dd($softDrink->toArray());
        return view('admin.ManageMenu.viewSoftDrink', compact('softDrink'));

    }

    //Update Soft Drink
    public function updateSoftDrink($id){
        $softDrink = SoftDrink::select(
            'soft_drinks.id',
            'soft_drinks.name',
            'soft_drinks.description',
            'soft_drinks.price',
            'soft_drinks.image',
            'soft_drinks.size',
            'soft_drinks.status',
            'soft_drinks.category_id',
            'categories.name as category_name',
        )->leftJoin('categories', 'soft_drinks.category_id', 'categories.id')
        ->where('soft_drinks.id',$id)
        ->firstOrFail();
        // dd($softDrink->toArray());
        $categories = Category::all();
        return view('admin.ManageMenu.updateSoftDrink',compact('softDrink','categories'));
    }

    //Store Update Soft Drink
    public function storeUpdateSoftDrink(Request $request){

        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'categoryId' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size' => 'required',
            'status' => 'required',
        ]);
        $softDrink = SoftDrink::findOrFail($request->id);

        if ($request->hasFile('image')) {
            if ($softDrink->image) {
                unlink(public_path('uploads/softdrinks/' . $softDrink->oldImage));
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/softdrinks'), $imageName);
            $softDrink->image = $imageName;
        } else {
            $softDrink['image'] = $softDrink->oldImage; // Keep the old image if no new one is uploaded
        }

        $softDrink->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->categoryId,
            'size' => $request->size,
            'status' => $request->status,
        ]);
        return redirect()->route('adminSoftDrinkList')->with('success', 'Soft drink updated successfully.');

    }

    //Delete Soft Drink
    public function deleteSoftDrink($id){
        $softDrink = SoftDrink::findOrFail($id);
        if ($softDrink->image) {
            unlink(public_path('uploads/softdrinks/' . $softDrink->image));
        }
        $softDrink->delete();
        return redirect()->route('adminSoftDrinkList')->with('success', 'Soft drink deleted successfully.');
    }

    //Create Dessert Page
    public function createDessertPage(){
        $categories = Category::all();
        return view('admin.ManageMenu.createDesserts',compact('categories'));
    }

    //Store Dessert
    public function storeDessert(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'categoryId' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        $dessertData = $request->all();
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/desserts'), $imageName);
            $dessertData['image'] = $imageName;
        }

        // Store the dessert data in the database
        Dessert::create([
            'name' => $dessertData['name'],
            'description' => $dessertData['description'],
            'price' => $dessertData['price'],
            'category_id' => $dessertData['categoryId'],
            'image' => $dessertData['image'] ?? null,
            'status' => $dessertData['status'],
        ]);

        return redirect()->route('adminCreateDessertPage')->with('success', 'Dessert added successfully.');
    }

    //dessert list
    public function dessertList(Request $request){
        $search = $request->input('search');
        $desserts = Dessert::select(
            'desserts.id',
            'desserts.name',
            'desserts.description',
            'desserts.price',
            'desserts.image',
            'desserts.status',
            'desserts.category_id',
        )
        ->when($search, function($query, $search){
            $query->where(function($q) use ($search){
                $q->where('desserts.name','like','%'.$search.'%')
                  ->orWhere('desserts.description','like','%'.$search.'%')
                  ->orWhere('desserts.price','like','%'.$search.'%')
                  ->orWhere('desserts.status','like','%'.$search.'%');
            });
        })
        ->paginate(10);
        $category_name = Category::select('categories.name as category_name')
                     ->where('id',9)->first();
        // dd($desserts->toArray());
        return view('admin.ManageMenu.dessertsList',compact('desserts','category_name','search'));
    }

    //View Dessert Details
    public function viewDessert($id){
        $dessert = Dessert::select(
            'desserts.id',
            'desserts.name',
            'desserts.description',
            'desserts.price',
            'desserts.image',
            'desserts.status',
            'categories.name as category_name'
        )->leftJoin('categories', 'desserts.category_id', '=', 'categories.id')
        ->where('desserts.id', $id)
        ->firstOrFail();
        // dd($dessert->toArray());
        return view('admin.ManageMenu.viewDessert', compact('dessert'));
    }

    //Update Dessert
    public function updateDessert($id){
        $dessert = Dessert::select(
            'desserts.id',
            'desserts.name',
            'desserts.description',
            'desserts.price',
            'desserts.image',
            'desserts.status',
            'desserts.category_id',
            'categories.name as category_name'
        )->leftJoin('categories', 'desserts.category_id', '=', 'categories.id')
        ->where('desserts.id', $id)
        ->firstOrFail();
        // dd($dessert->toArray());
        $categories = Category::all();
        return view('admin.ManageMenu.updateDessert',compact('dessert','categories'));
    }

    //Store Update Dessert
    public function storeUpdateDessert(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'categoryId' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        $dessert = Dessert::findOrFail($request->id);

        if ($request->hasFile('image')) {
            if ($dessert->image) {
                unlink(public_path('uploads/desserts/' . $dessert->image));
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/desserts'), $imageName);
            $dessert->image = $imageName;
        } else {
            $dessert['image'] = $dessert->image; // Keep the old image if no new one is uploaded
        }

        $dessert->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->categoryId,
            'status' => $request->status,
        ]);
        return redirect()->route('adminDessertList')->with('success', 'Dessert updated successfully.');
    }

    //Delete Dessert
    public function deleteDessert($id){
        $dessert = Dessert::findOrFail($id);
        if ($dessert->image) {
            unlink(public_path('uploads/desserts/' . $dessert->image));
        }
        $dessert->delete();
        return redirect()->route('adminDessertList')->with('success', 'Dessert deleted successfully.');
    }

    //Create Topping Page
    public function createTopping(){
        $toppings = Topping::all();
        return view('admin.ManageMenu.createToppings',compact('toppings'));
    }

    //store topping
    public function storeTopping(Request $request){
        $request->validate([
            'name' => 'required|string|max:225|unique:toppings,name,'.$request->id,
            'price' => 'required|numeric|min:0',
            'status' => 'required',
        ]);

        $toppingData = [
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
        ];

        Topping::create($toppingData);
        return redirect()->route('adminCreateTopping')->with('success', 'Topping added successfully.');
    }

   //update topping
   public function updateTopping($id){
        $topping = Topping::findOrFail($id);
        return view('admin.ManageMenu.updateTopping',compact('topping'));
   }

   //Store Update Topping
   public function storeUpdateTopping(Request $request){
        $request->validate([
            'name' => 'required|string|max:225|unique:toppings,name,'.$request->id,
            'price' => 'required|numeric|min:0',
            'status' => 'required',
        ]);

        // $topping = Topping::findOrFail($request->id);
        // $topping->update([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'status' => $request->status,
        // ]);

        Topping::where('id',$request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
        ]);
        return redirect()->route('adminCreateTopping')->with('success', 'Topping updated successfully.');
   }

   //Delete Topping
   public function deleteTopping($id){
        $topping = Topping::findOrFail($id);
        $topping->delete();
        return redirect()->route('adminCreateTopping')->with('success', 'Topping deleted successfully.');
   }



}
