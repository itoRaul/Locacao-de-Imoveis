<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Event;
use App\Models\User;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function authenticate()
    {
        $this->validate();

        $request = app(Request::class);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            $request->session()->regenerate();

            return redirect()->to('/form');
        }

        $this->addError('email', 'As credenciais fornecidas não coincidem com nossos registros.');
    }

    public function render()
    {
        return view('livewire.login.login');
    }
}
