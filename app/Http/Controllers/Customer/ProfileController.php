<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(){
        return view('customer.Profile.updateProfile');
    }

    //update profile
    public function updateProfile(Request $request){

        //validation
        $rules=[
            'phone'=>'required|numeric|unique:users,phone,'.Auth::user()->id,
            'address'=>'required',
            'image'=>'mimes:png,jpg,jpeg,webp',
        ];
        Auth::user()->provider == 'simple' ? $rules['email'] = 'required|unique:users,email,'.Auth::user()->id : '';
        Auth::user()->provider == 'simple' ? $rules['name'] = 'required' : '';
        $validator = $request->validate($rules);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        //image upload
        if($request->hasFile('image')){
            if($request->oldImage != null){
                unlink(public_path('uploads/profileImg/').Auth::user()->profile);

                $file = $request->file('image');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/profileImg'), $fileName);
                $data['profile'] = $fileName;
            }else{
                $file = $request->file('image');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/profileImg'), $fileName);
                $data['profile'] = $fileName;
            }

        }else{
            $data['profile'] = Auth::user()->profile;

        }
        Auth::user()->where('id',Auth::user()->id)
                    ->update($data);
        // Alert::success('Profile Updated Successfully')->autoClose(2000);
        return back();

    }
    //change Password page
    public function changePasswordPage(){
        return view('customer.Profile.changePassword');
    }

    public function changePassword(Request $request)
{
    $request->validate([
        'oldPassword'    => 'required',
        'newPassword'    => 'required|min:8',
        'confirmPassword'=> 'required|same:newPassword',
    ]);

    $user = auth()->user();

    if (!Hash::check($request->oldPassword, $user->password)) {
        return back()->withErrors(['oldPassword' => 'Your current password is incorrect.']);
    }else{
        $user->update([
            'password' => Hash::make($request->newPassword),
        ]);
    }
    return back()->with('success', 'Password changed successfully.');
}


}
