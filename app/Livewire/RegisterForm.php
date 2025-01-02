<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class RegisterForm extends Component
{   
    public $fiscalcode;
    public $name;
    public $email;
    public $password;

    public $successMessage = '';

    protected $rules = [ 
        'fiscalcode' => 'required|size:16|', 
        'name' => 'required|string', 
        'email' => 'required|email', 
        'password' => 'required'];

    public function render()
    {
        return view('livewire.register-form');
    }

    public function clearForm()
    {
        $this->fiscalcode = '';
        $this->email = '';
        $this->name = '';
        $this->password = '';
        
    }

    public function register()
    {
        $this->validate();
        User::create([
            'fiscalcode' => $this->fiscalcode,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
        
        $this->clearForm();

        $this->successMessage = 'Registrazione avvenuta con successo!';
    }
}
