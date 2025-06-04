<?php

namespace App\Livewire;

use App\Models\Sala;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class ChatView extends Component
{
    public Collection $listado;
    public ?Sala $salaSeleccionada;

    public function mount()
    {
        if (Auth::user()->role > 3) {
            $this->listado = Sala::all();
        } else {
            $this->listado = Auth::user()->salasSoporte;
        }
        
        $this->salaSeleccionada = $this->listado->first();
    }

    public function render()
    {
        return view('livewire.chat-view');
    }

    #[On('datachange')]
    public function datachange ()
    {
        $this->mount();
    }
}
