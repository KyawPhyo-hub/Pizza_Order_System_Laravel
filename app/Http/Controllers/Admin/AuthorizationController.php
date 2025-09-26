<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorizationController extends Controller
{
    //Create Admin Page
    public function createAdminPage(){
        return view('admin.Authorization.createAdmin');
    }

    //Store Admin
    public function storeAdmin(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'confirmPassword' => 'required|string|same:password',
        ]);

        $admindata = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
            'provider' => 'simple',
        ];

        User::create($admindata);
        return to_route('createAdminPage')->with('success', 'Admin created successfully');
    }

    //Admin List
    public function adminList()
    {
        $admins = User::where('role','admin')->orWhere('role','superadmin')
        ->paginate(5);
        return view('admin.Authorization.adminList', compact('admins'));
    }

    //delete admin
    public function deleteAdmin($id){
        User::where('id', $id)->delete();
        return to_route('viewAdminList')->with('success', 'Admin deleted successfully');

    }

    //Admin Role Change
    public function roleChange($id){
        $user = User::find($id);
        if($user){
            $user->role = $user->role == 'admin' ? 'user' : 'admin';
        }
        User::where('id', $id)->update(['role' => $user->role]);
        if($user->role == 'admin'){
            return to_route('viewAdminList')->with('success', 'User role changed successfully');
        }else{
            return to_route('viewUserList')->with('success', 'Admin role changed successfully');
        }


    }


    //User List
    public function userList()
    {
        $users = User::where('role', 'user')->paginate(10);
        return view('admin.Authorization.userList', compact('users'));
    }
}
