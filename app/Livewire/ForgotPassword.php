<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function sendResetLink()
    {
        $this->validate();

        $response = Password::sendResetLink($this->only('email'));

        if ($response === Password::RESET_LINK_SENT) {
            session()->flash('success', 'Link de redefinição enviado com sucesso!');
            $this->reset('email');
        } else {
            $this->addError('email', 'Nenhum usuário encontrado com esse e-mail.');
        }
    }

    public function render()
    {
        return view('livewire.forgot-password.forgot-password');
    }
}