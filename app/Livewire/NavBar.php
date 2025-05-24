<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NavBar extends Component
{
    public $links = [];

    public function mount()
    {
        if (Auth::user()->role > 3) {
            $this->links = ['chats', 'usuarios', 'reportes', 'bugs'];
            
        } elseif (Auth::user()->role > 2) {
            $this->links = ['chats'];
        } else {
            return view('denegado');
        }
    }

    public function render()
    {
        return view('livewire.nav-bar');
    }
}
