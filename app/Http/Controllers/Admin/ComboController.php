<?php

namespace App\Http\Controllers\Admin;

use App\Models\Combo;
use App\Models\Pizza;
use App\Models\Dessert;
use App\Models\Category;
use App\Models\SoftDrink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComboController extends Controller
{
    //List
    public function comboList(Request $request){
        $search = $request->input('search');
            $combos = Combo::with(['pizza1', 'pizza2', 'softdrink', 'dessert'])
            ->when($search, function($query, $search){
                $query->where(function($q) use ($search){
                    $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%')
                    ->orWhereHas('pizza1', function($q) use ($search){
                        $q->where('name', 'like', '%'.$search.'%');
                    })
                    ->orWhereHas('pizza2', function($q) use ($search){
                        $q->where('name', 'like', '%'.$search.'%');
                    })
                    ->orWhereHas('softdrink', function($q) use ($search){
                        $q->where('name', 'like', '%'.$search.'%');
                    })
                    ->orWhereHas('dessert', function($q) use ($search){
                        $q->where('name', 'like', '%'.$search.'%');
                    });
                });
            })
            ->get();
            //dd($combos->toArray());

            return view('admin.ManageMenu.comboList', compact('combos','search'));
        }

        //create Combo
    public function createCombo(){
        $pizzas = Pizza::all();
        $softdrinks = SoftDrink::all();
        $desserts = Dessert::all();
        $categories = Category::all();
        return view('admin.ManageMenu.createCombo',compact('pizzas', 'softdrinks', 'desserts', 'categories'));
    }

    //Store Combo
    public function storeCombo(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:225|unique:combos,name',
            'description' => 'required|string|max:500',
            'categoryId' => 'required|exists:categories,id',
            'pizza1' => 'required|exists:pizzas,id',
            'pizza2' => 'nullable|exists:pizzas,id',
            'softDrink' => 'required|exists:soft_drinks,id',
            'dessert' => 'required|exists:desserts,id',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);
        // dd($request->all());
        $combo = [
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->categoryId,
            'pizza_id_1' => $request->pizza1,
            'pizza_id_2' => $request->pizza2,
            'soft_drink_id' => $request->softDrink,
            'dessert_id' => $request->dessert,
            'price' => $request->price,
            'status' => $request->status,
        ];

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/combos'), $imageName);
            $combo['image'] = $imageName;
        }

        //dd($combo);
        Combo::create($combo);
        return redirect()->route('adminComboList')->with('success', 'Combo created successfully!');
    }

    //View Combo
    public function viewCombo($id){
        $combo = Combo::with(['pizza1', 'pizza2', 'softdrink', 'dessert','category'])->findOrFail($id);
        // dd($combo->toArray());
        return view('admin.ManageMenu.viewCombo', compact('combo'));
    }

    //Update Combo
    public function updateCombo($id){
        $combo = Combo::with(['pizza1', 'pizza2', 'softdrink', 'dessert'])->findOrFail($id);
        $pizzas = Pizza::all();
        $softdrinks = SoftDrink::all();
        $desserts = Dessert::all();
        $categories = Category::all();
        // dd($combo->toArray());
        return view('admin.ManageMenu.updateCombo', compact('combo', 'pizzas', 'softdrinks', 'desserts', 'categories'));
    }

    //Store Updated Combo
    public function storeUpdateCombo(Request $request){

        $request->validate([
            'name' => 'required|string|max:225|unique:combos,name,' . $request->id,
            'description' => 'required|string|max:500',
            'categoryId' => 'required|exists:categories,id',
            'pizza1' => 'required|exists:pizzas,id',
            'pizza2' => 'nullable|exists:pizzas,id',
            'softDrink' => 'required|exists:soft_drinks,id',
            'dessert' => 'required|exists:desserts,id',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);
        $dbCombo = Combo::findOrFail($request->id);
        $combo = [
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->categoryId,
            'pizza_id_1' => $request->pizza1,
            'pizza_id_2' => $request->pizza2,
            'soft_drink_id' => $request->softDrink,
            'dessert_id' => $request->dessert,
            'price' => $request->price,
            'status' => $request->status,
        ];
        if($request->hasFile('image')){
            if($dbCombo->image != null){
                unlink(public_path('uploads/combos/' . $dbCombo->image));

                $image = $request->file('image');
                $imageName = time(). '.'. $image->getClientOriginalExtension();
                $image->move(public_path('uploads/combos'), $imageName);
                $combo['image'] = $imageName;
            }else{
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/combos'), $imageName);
                $combo['image'] = $imageName;
            }
        }
        // dd($combo);
        $dbCombo->update($combo);
        return redirect()->route('adminComboList')->with('success', 'Combo updated successfully!');
    }

    //Delete Combo
    public function deleteCombo($id){
        $combo = Combo::findOrFail($id);
        if($combo->image != null){
            unlink(public_path('uploads/combos/' . $combo->image));
        }
        $combo->delete();
        return redirect()->route('adminComboList')->with('success', 'Combo deleted successfully!');
    }

}
