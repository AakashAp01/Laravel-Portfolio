<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'userName' => 'required|string|max:255',
            'userEmail' => 'required|email|max:255',
            'profileImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail(Auth::user()->id);

        if ($user) {
            // Update user information
            $user->name = $request->userName;
            $user->email = $request->userEmail;

            // Handle profile image upload
            if ($request->hasFile('profileImage')) {
                $imagePath = $request->file('profileImage')->store('admin_profile', 'public');
                $user->profile = $imagePath;
            }

            $user->save();

            return redirect()->back()->with('success', 'Profile updated successfully!');
        } else {
            return redirect()->back()->with('error', 'User not authenticated.');
        }
    }
    public function changePassword(Request $request)
    {

        // Validate the request
        $validator = Validator::make($request->all(), [
            'newPassword' => 'required|min:5|confirmed',
            'newPassword_confirmation' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail(Auth::user()->id);

        if ($user) {
            $user->password = Hash::make($request->newPassword);
            $user->save();

            return redirect()->back()->with('success', 'Password updated successfully!');
        } else {
            return redirect()->back()->with('error', 'User not authenticated.');
        }
    }


    public function users()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('admin.user.users',compact('users'));
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    public function chat($id){
        $user = User::find($id);
        return view('admin.chat',compact('user'));
    }


}
