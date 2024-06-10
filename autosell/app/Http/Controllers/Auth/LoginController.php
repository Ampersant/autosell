<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $existingUser = User::where('email', $user->getEmail())->first();

        if($existingUser){
            Auth::login($existingUser);
        } else {
            $isPersonal = strpos($user->getEmail(), '@gmail.com') !== false;

            $newUser = User::create([
                'username' => $user->getName(),
                'email' => $user->getEmail(),
                'id' => $user->getId(),
                'avatar' => $user->getAvatar(),
                'role_id' => $isPersonal ? 23 : 22,
            ]);
            Auth::login($newUser);
        }

        return redirect()->intended('/profile');
    }
    public function handleGitHubCallback()
    {
        $user = Socialite::driver('github')->user();
        $existingUser = User::where('email', $user->getEmail())->first();

        if($existingUser){
            Auth::login($existingUser);
        } else {
            $isPersonal = strpos($user->getEmail(), '@gmail.com') !== false;

            $newUser = User::create([
                'username' => $user->getName(),
                'email' => $user->getEmail(),
                'id' => $user->getId(),
                'avatar' => $user->getAvatar(),
                'role_id' => $isPersonal ? 23 : 22,
            ]);
            Auth::login($newUser);
        }

        return redirect()->intended('/profile');
    }
}
