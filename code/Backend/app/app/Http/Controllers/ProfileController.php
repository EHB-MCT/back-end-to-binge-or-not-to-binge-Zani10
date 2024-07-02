<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profile.show', compact('user'));
    }
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bio' => 'nullable|string',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->hasFile('profile_photo')) {
            $imageName = time() . '.' . $request->profile_photo->extension();
            $request->profile_photo->move(public_path('images'), $imageName);
            $user->profile_photo = 'images/' . $imageName;
        }
        $user->bio = $request->bio;
        $user->save();

        return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully.');
    }
}

