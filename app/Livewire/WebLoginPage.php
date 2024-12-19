<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class WebLoginPage extends Component
{
    public $name, $email, $password, $password_confirmation;
    public $isLogin = true;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:5',
    ];

    protected $registerRules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:5',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->isLogin ? $this->rules : $this->registerRules);
    }

    public function login()
    {
        $this->validate($this->rules);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = User::find(Auth::user()->id);
            if ($user->hasRole('web-user')) {
                return redirect()->route('web.index')->with('success', 'Welcome back...❤️');

            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'Oops! Only web-user can Login.');
            }
        }

        return redirect()->back()->with('error', 'Invalid credentials!');
    }
    public function register()
    {
        $this->validate($this->registerRules);

        try {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            $role = Role::firstOrCreate(['name' => 'web-user']);
            $user->assignRole($role);
            Auth::login($user);

            return redirect()->route('web.index')->with('success', 'Registration successful...❤️');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Opps something went wrong!');
        }
    }


    public function toggle()
    {
        $this->isLogin = !$this->isLogin;
        $this->reset(['name', 'email', 'password']);
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.web-login-page');
    }
}
