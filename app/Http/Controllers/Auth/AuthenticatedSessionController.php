<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(){
        return to_route('userLogin');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        // Check if the user is already authenticated
        $request->authenticate();

        $request->session()->regenerate();

        if($request->user()->role == 'admin' || $request->user()->role == 'superadmin'){
            return redirect()->intended(route('adminHome', absolute: false));
        }else{
            return redirect()->intended(route('customerHome', absolute: false));
        }


    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
