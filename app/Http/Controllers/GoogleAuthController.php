<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            Auth::login($user);
            return redirect()->intended('/');
        } else {
            $newUser = new User();
            $newUser->name = $googleUser->getName();
            $newUser->email = $googleUser->getEmail();

            $newUser->role = 'User';

            $newUser->save();

            Auth::login($newUser);
            return redirect()->intended('/');
        }
    }

}
