<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the user's information
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        // Update the profile photo if a new one is uploaded
        if ($request->hasFile('profile_photo')) {
            // Delete the old profile photo if it exists
            if ($user->profile_photo) {
                \Storage::disk('public')->delete($user->profile_photo);
            }

            // Store the new profile photo
            $user->profile_photo = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        // Save the updated user information
        $user->save();

        // Redirect back to the profile edit page with a success message
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }

    /**
     * Delete the user's profile
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        $user = Auth::user();

        // Delete the user's profile photo if it existss
        if ($user->profile_photo) {
            \Storage::disk('public')->delete($user->profile_photo);
        }

        // Delete the user
        $user->delete();

        // Redirect to the home page after deletion
        return redirect('/')->with('success', 'Your profile has been deleted successfully.');
    }
}