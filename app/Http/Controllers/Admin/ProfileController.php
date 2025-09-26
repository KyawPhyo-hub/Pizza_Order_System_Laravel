<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    //view Profile
    public function viewProfile()
    {
        return view('admin.ManageProfile.updateProfile');
    }

    //update Profile
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
        $data = $this->requestAdminData($request);
        //image upload
        if($request->hasFile('image')){
            if($request->oldImage != null){
                unlink(public_path('uploads/adminprofile/').Auth::user()->profile);

                $file = $request->file('image');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/adminprofile'), $fileName);
                $data['profile'] = $fileName;
            }else{
                $file = $request->file('image');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/adminprofile'), $fileName);
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
        return view('admin.ManageProfile.changePassword');
    }
    //change Password
    public function changePassword(Request $request){
        $validator = $request->validate([
            'oldPassword'=>'required',
            'newPassword'=>'required',
            'confirmPassword'=>'required|same:newPassword',
        ]);

       // $dbOldPassword = auth()->user()->password;
        $dbOldPassword = User::select('password')->where('id',auth()->user()->id)->first();
        $userOldPassword = $request->oldPassword;
        $userNewPassword = $request->newPassword;
        $userConfirmPassword = $request->confirmPassword;
        if(Hash::check($userOldPassword, $dbOldPassword->password)){
            if($userNewPassword == $userConfirmPassword){
                User::where('id',auth()->user()->id)->update([
                    'password'=>Hash::make($userNewPassword)
                ]);
                return back();
            }

        }
                return back();

    }



    private function requestAdminData($request){
        $adminData =[];
        if(Auth::user()->provider == 'simple'){
            Auth::user()->name == null ? $adminData['nickname']= $request->nickname : $adminData['name']= $request->name;
        }else{
            Auth::user()->name == null ? $adminData['nickname']= Auth::user()->nickname : $adminData['name']= Auth::user()->name;
        }
        Auth::user()->provider == 'simple' ? $adminData['email'] = $request->email : $adminData['email'] = Auth::user()->email;
        $adminData['phone'] = $request->phone;
        $adminData['address'] = $request->address;

        return $adminData;
    }

}
