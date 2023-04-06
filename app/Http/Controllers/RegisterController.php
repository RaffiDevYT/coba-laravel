<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'unique:users', 'max:255'],
            'email' => 'required|email:dns|unique:users|max:255',
            'password' => 'required|min:6|max:255',
        ]);
        // dd('success');

        // Pilih salah satu bcrypt atau Hash::make
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);

        return redirect('/login')->with('success', 'Your account has been created.');
    }
}
