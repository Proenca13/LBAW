<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('Profile');
    }

    public function edit()
    {
        return view('Editprofile');
    }

    public function update(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'username' => 'required|string|max:50|unique:User,username,' . Auth::id(),
            'email' => 'required|string|email|max:75|unique:User,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed|regex:/[A-Z]/|regex:/[0-9]/',
            //ainda precisa do aviso de senha incorreta
            //ainda nao testei se sobrepoe usernames mas em principio nao
        ]);

        // Update the user's information
        $user = Auth::user();
        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];

        // Update the password only if a new one is provided
        if (!empty($request->password)) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect('/profile')->with('success', 'Profile updated successfully!');
    }
}
