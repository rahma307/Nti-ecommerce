<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  //
    
    // public function registerForm()
    // {
    //     return view('auth.register');
    // }

    public function register(Request $request)
    {
       $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
    ]);

    // $data['password'] = Hash::make($data['password']); 

    $user= User::create($data);
       Auth::login($user); 

        return redirect()->route('home.index');
    }

    // public function loginForm()
    // {
    //     return view('auth.login');
    // }


    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($data)) {
            $user = User::where('email', $data['email'])->first();
            Auth::login($user);

            return redirect()->route('home.index');
        }

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home.index');
    }
}
