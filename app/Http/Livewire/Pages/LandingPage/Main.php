<?php

namespace App\Http\Livewire\Pages\LandingPage;

use Livewire\Component;

class Main extends Component
{
    public function render()
    {
        return view('livewire.pages.landing-page.main');
    }

    public function redirectLogin(){
        return redirect()->to('/login');
    }
}
