<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Sala;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

/**
 * @author Jose Lopez Vilchez
 * Carrusel con imágenes de las salas que no tienen a nadie
 * de soporte asociado, para poder añadir esas salas a la lista
 * de chats que se están manejando.
 */
class ChatsPorAtender extends Component
{
    public Collection $listado;

    public function mount()
    {
        $this->listado = Sala::all()->filter(function (Sala $sala) {
            return $sala->usersSoporte->isEmpty();
        });
    }

    public function render()
    {
        return view('livewire.chats-por-atender');
    }

    public function atenderSala ($id)
    {
        Sala::find($id)->usersSoporte()->attach(Auth::user());
        $this->dispatch('nueva-sala');
    }

    #[On('datachange')]
    public function datachange ()
    {
        $this->mount();
    }
}
