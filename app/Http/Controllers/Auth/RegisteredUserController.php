<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'role' => 'required|in:passenger,driver',
        ]);

        // Store the profile photo
        $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_photo' => $profilePhotoPath,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        // Assign the selected role
        $role = Role::where('name', $request->role)->first();
        if ($role) {
            $user->assignRole($role);
        } else {
            return redirect()->back()->withErrors(['role' => 'The selected role does not exist.']);
        }

        // Trigger the Registered event
        event(new Registered($user));

        // Log in the user
        Auth::login($user);

        // Redirect to the home page
        return redirect(RouteServiceProvider::HOME);
    }
}