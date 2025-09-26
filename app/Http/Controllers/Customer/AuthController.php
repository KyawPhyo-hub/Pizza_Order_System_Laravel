<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function userLogin(){
        return view('Authorization.login');
    }
    public function userRegister(){
        return view('Authorization.register');
    }
}
