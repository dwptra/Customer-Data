<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  Login
    public function login()
    {
        if (Auth::user()) {
            return redirect('/dashboard');
        }
        return view('login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:3',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('/dashboard');
        }
        return redirect('/')->with('fail', 'Periksa Email atau Password!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        if (Auth::user()) {
            return redirect('/dashboard');
        }
        return view('register');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:3'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/')->with('success', 'Berhasil membuat akun, silahkan login!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
