<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        if ( Auth::check() ) {
            return redirect('/dashboard');
        }
        
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi
        $request->validate([
            'username' => 'required|string|max:15',
            'email' => 'required|email|unique:user',
            'password' => 'required|string|confirmed|min:4',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'admin',
        ]);

        return redirect()->route('login')->with('registered', 'Akun berhasil didaftarkan!');
    }
}
