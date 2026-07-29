<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class ResetPassword extends Component
{
    public $email;
    public $password;
    public $password_confirmation;
    public $token;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ];

    public function mount($token)
    {
        $this->token = $token;
        $this->email = request()->query('email');
    }

    public function resetPassword()
    {
        $this->validate();

        $response = Password::reset($this->only('email', 'password', 'token'), function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        });

        if ($response === Password::PASSWORD_RESET) {
            session()->flash('success', 'Senha redefinida com sucesso! Você será redirecionado para a página de login automaticamente.');
            $this->reset(['password', 'password_confirmation']);
            $this->js('setTimeout(() => window.location.href = "'.route('login').'", 3000)');
        } else {
            $this->addError('email', 'Nenhum usuário encontrado com esse e-mail.');
        }

    }

    public function render()
    {
        return view('livewire.forgot-password.reset-password');
    }
}