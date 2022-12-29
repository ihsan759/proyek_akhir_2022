<?php

namespace App\Http\Livewire\Cards;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $password;
    public $email;

    protected $rules = [
        'password' => 'required',
        'email' => 'required|email',
    ];

    protected $messages = [
        'email.required' => 'Email tidak boleh kosong',
        'email.email' => 'Harus sesuai dengan format email',
        'password' => 'Password tidak boleh kosong'
    ];

    public function login()
    {
        $validateData = $this->validate();

        if (Auth::attempt($validateData)) {
            session()->regenerate();

            return redirect()->route('home');
        } else {
            session()->flash('error', 'Email atau password salah.');
        }
    }
    public function render()
    {
        return view('livewire.cards.login');
    }
}
