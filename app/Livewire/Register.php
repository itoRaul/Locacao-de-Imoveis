<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Register extends Component
{
    public $name, $email, $password;

    public function render()
    {
        return view('livewire.register.register');
    }

    public function register()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|min:8|max:100',
        ]);

        $user = User::create($data);

        Auth::login($user);

        return redirect()->intended('form');
    }

    public function logout()
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('users.login.form');
    }
}
