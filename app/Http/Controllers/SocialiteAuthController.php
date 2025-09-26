<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function callback($provider)
    {
        //dd($provider);
        try {
            $socialUser = Socialite::driver($provider)->user();

            Log::info('Social User Data: ', (array) $socialUser);

            dd($socialUser);

            // Check if user already exists
            $user = User::where('provider', $provider)
                ->where('provider_id', $socialUser->getId())
                ->first();

            if (!$user) {
                // Create new user
                $user = User::create([
                    'name'           => $socialUser->getName() ?? $socialUser->getNickname() ?? 'Unknown',
                    'nickname'       => $socialUser->getNickname() ?? '',
                    'email'          => $socialUser->getEmail() ?? '',
                    'provider_token' => $socialUser->token ?? '',
                    'role'           => 'user',
                    'provider'       => $provider,
                    'provider_id'    => $socialUser->getId(),
                ]);
            }

            // Log the user in
            Auth::login($user, true);

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect()->route('adminHome'); // ✅ check your route name
            } else {
                return redirect()->route('customerHome'); // ✅ remove compact('cart')
            }

        } catch (\Exception $e) {
            Log::error('Social login error: ', ['error' => $e->getMessage()]);
            return redirect('/login')->withErrors(['msg' => 'Login failed for ' . $provider]);
        }
    }
}
