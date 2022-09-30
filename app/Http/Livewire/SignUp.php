<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Action;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Hash;

class SignUp extends Component
{
    public $name;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;
    public $condition;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'password' => 'required|min:6',
        'password_confirmation' => 'required|same:password',
        'condition' => 'accepted',
    ];

    public function updated(){
        $this->emit('show-register');
    }

    public function submit(CreatesNewUsers $creator)
    {
        $this->emit('show-register');

        $this->validate();

        event(new Registered($user = $creator->create([
            'name' => $this->name,
            'phone' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ])));

        Auth::guard()->login($user);

        return redirect()->route('home');
    } 

    public function render()
    {
        return view('livewire.sign-up');
    }
}
