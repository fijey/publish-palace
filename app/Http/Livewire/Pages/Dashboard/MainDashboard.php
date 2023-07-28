<?php

namespace App\Http\Livewire\Pages\Dashboard;

use Livewire\Component;
use App\Models\User;
use Auth;

class MainDashboard extends Component
{
    public $is_show = false;
    public $user;

    protected $listeners = [
        'close-modal' => 'modal_toggle',
        // 'render' => 'render'
    ];

    public function mount(){
        $this->user = Auth::user();
    }
    public function render()
    {
        return view('livewire.pages.dashboard.main-dashboard');
    }

    public function modal_toggle(){
        $this->is_show = !$this->is_show;

        if($this->is_show == true){
            $this->emit('open-modal', $this->is_show);
        }
    }
}
