<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public $password;
    public $email;

    protected $rules = [
        'password' => 'required',
        'email' => 'required|email',
    ];

    public function submit()
    {
        $this->validate();
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
