<?php

namespace App\Http\Livewire\Pages\Authenticate;

use Livewire\Component;
use App\Models\User;
use App\Http\Livewire\Helper\ToastHelper;
use Auth;
class Login extends Component
{
    public $is_login = true;

    public $name;
    public $email;
    public $password;

    
    
    public function render()
    {
        return view('livewire.pages.authenticate.login');
    }

    public function is_login(){
        $this->is_login = !$this->is_login;
    }

    public function login()
    {
        // Validasi input
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        
        // Lakukan otentikasi dengan Auth di Laravel
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Jika otentikasi berhasil
            $toast = ToastHelper::makeToast("Success Login, redirecting to dashboard please wait");
            $this->dispatchBrowserEvent('show-toast',$toast);
            
            return redirect()->route('dashboard');
            // Lakukan sesuatu setelah berhasil login
        } else {
            // Jika otentikasi gagal
            $toast = ToastHelper::makeToast("Failed Credential");
            $this->dispatchBrowserEvent('show-toast',$toast);
        }
    }

    public function storeRegister(){
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        // Reset the form fields after successful registration
        $this->resetFields();

        $toast = ToastHelper::makeToast("Account Has Been Created, Please Login");
        $this->is_login=true;
        $this->dispatchBrowserEvent('show-toast',$toast);
    }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    private function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
}
