<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function login_view(){
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = User::find(Auth::user()->id);
            $role = Role::firstOrCreate(['name' => 'admin']);
            
            if($user->assignRole($role)) {

                return redirect()->route('admin.dashboard')->with('success', 'Login successful!');

            }else{

                Auth::logout();
                return back()->with('error', 'Oops! Only web Admin can Login.');

            }

        }

        return back()->with('error', 'Invalid credentials!');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }



}
