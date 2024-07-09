<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;



class GoogleController extends Controller
{

    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() {
        $user = Socialite::driver('google')->user();


        $finduser = User::where('google_id', $user->getId())->first();
        $findemail = User::where('email', $user->email)->first();



        if($finduser){
            Auth::login($finduser);
            return redirect('/dashboard');
        }else if ($findemail){
            return redirect()->route('login')->with(['error' => 'Email Sudah Terdaftar silahkan login dengan akun yang lain !']);

        }else {
            $newuser = User::Create([
                'google_id' => $user->getId(),
                'name' => $user->name,
                'email' => $user->email,
                'password' => Str::random(100),
            ]);

            $newuser->assignRole('User');

            Auth::login($newuser);

            return redirect('/dashboard');
        }


    }
}