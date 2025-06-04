<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\Sala;
use Livewire\Attributes\On;

class ChatsAtendidos extends Component
{
    public Collection $listado;

    public function mount()
    {
        if (Auth::user()->role > 3) {
            $this->listado = Sala::all();
        } else {
            $this->listado = Auth::user()->salasSoporte()->with('ultimoMensaje')->get()->sortByDesc(function ($sala) {
                return optional($sala->ultimoMensaje)->created_at;
            });
        }
    }

    public function render()
    {
        return view('livewire.chats-atendidos');
    }

    public function selectSala ($id) {
        $this->dispatch('sala-seleccionada', id: $id);
    }

    #[On('nueva-sala')]
    #[On('datachange')]
    public function datachange ()
    {
        $this->mount();
    }
}
