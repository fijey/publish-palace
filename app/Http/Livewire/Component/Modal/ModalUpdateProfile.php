<?php

namespace App\Http\Livewire\Component\Modal;

use Livewire\Component;
use App\Models\User;
use App\Http\Livewire\Helper\ToastHelper;
use Auth;
class ModalUpdateProfile extends Component
{
    public $name;
    public $email;
    public $password;
    public $description;
    public $role_user;

    //props like slot
    public $modalBody;
    public $title;

    public $is_show = false;
    protected $listeners = ['open-modal' => 'modal_toggle'];

    public function mount(){
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->password = Auth::user()->password;
        $this->description = Auth::user()->description;
        $this->role_user = Auth::user()->role_user;
    }
    public function render()
    {
        return view('livewire.component.modal.modal-update-profile');
    }

    public function modal_toggle($is_show){
        $this->is_show = $is_show;

        if($this->is_show == false){
            $this->emit('close-modal', $this->is_show);
        }
    }

    public function modal_save($type){
        if($type == "profile"){
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . auth()->user()->id,
                'password' => 'required|min:8',
            ]);
    
            // Get the authenticated user
            $user = auth()->user();
    
            // Update the user's information
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'description' => $this->description,
                'role_user' => $this->role_user,
            ]);
    
            // Reset the form fields after successful update
            $this->modal_toggle(false);
    
            // Show a toast message indicating the successful update
            $toast = ToastHelper::makeToast("Account Has Been Updated");
            $this->dispatchBrowserEvent('show-toast', $toast);
        }
    }
    
    private function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
}
