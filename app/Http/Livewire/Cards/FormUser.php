<?php

namespace App\Http\Livewire\Cards;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormUser extends Component
{
    public $nama;
    public $no_hp;
    public $rt;
    public $rw;
    public $role;
    public $email;
    public $password;
    public $status;

    protected $rules = [
        'email' => 'required|email',
        'no_hp' => 'required|min:10',
        'nama' => 'required'
    ];

    protected $messages = [
        'email.required' => 'Email tidak boleh kosong',
        'email.email' => 'Harus sesuai dengan format email',
        'no_hp.required' => 'No HP tidak boleh kosong',
        'no_hp.min' => 'No HP minimal 10 karakter',
        'nama' => 'Nama tidak boleh kosong',
    ];

    public function mount()
    {
        if ($this->role == 1) {
            $this->role = 'Admin';
        } elseif ($this->role == 2) {
            $this->role = 'Petugas';
        } elseif ($this->role == 3) {
            $this->role = 'Warga';
        }
    }

    public function update()
    {
        $this->validate();

        $user = User::query()->where('id', Auth::user()->id)->first();
        $user->fill([
            'nama' => $this->nama,
            'no_hp' => $this->no_hp,
            'email' => $this->email,
            'password' => $this->password
        ]);

        $user->save();

        return redirect()->with('message', 'Berhasil update profile')->route('home');
    }


    public function render()
    {
        return view('livewire.cards.form-user');
    }
}
