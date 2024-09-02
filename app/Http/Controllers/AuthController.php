<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    //

    function signup(): View
    {
        return view('auth.signup');
    }

    function handel_signup(Request $request)
    {
        $request->validate([
            "username" => 'required|string|min:6',
            "useremail" => 'required|email:rfc,dns',
            "userpassword" => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->username,
            'email' => $request->useremail,
            'password' => Hash::make($request->userpassword),
        ]);

        return back()->with('message','user is created successfully!');
    }

    function login() : View {
        return view('auth.login');
    }

    function handel_login(Request $request) {
        $request->validate([
            "useremail" => 'required|email:rfc,dns|exists:users,email',
            "userpassword" => 'required|string|min:6',
        ]);

        if (Auth::attempt(['email'=>$request->useremail,'password'=>$request->userpassword])) {
            # code...
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->with('error','Password is not match');

    }

    function logout() {
        Auth::logout();
        return redirect()->intended('/');
    }

    function github_rediredct() {
        return Socialite::driver('github')->redirect();
    }

    function github_callback() {
        $githubUser = Socialite::driver('github')->user();
        // dd($githubUser);
        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => $githubUser->nickname,
            'email' => $githubUser->email,
            'password'=>$githubUser->token,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);

        Auth::login($user);
 
        return redirect('/dashboard');
    }
}
