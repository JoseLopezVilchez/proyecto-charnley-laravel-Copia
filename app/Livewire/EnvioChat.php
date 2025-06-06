<?php

namespace App\Livewire;

use App\Models\Mensaje;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On; 

/**
 * @author Jose Lopez Vilchez
 * El cuadrito de los chats para escribir y mandar mensajes
 */
class EnvioChat extends Component
{
    public $id_sala = 0;
    public $mensaje = '';

    public function enviar()
    {
        Mensaje::create([
            'id_sala' => $this->id_sala,
            'id_sender' => Auth::user()->id,
            'content' => $this->mensaje,
            'state' => 0
        ]);

        $this->mensaje = '';
        $this->dispatch('mensaje-enviado');
    }

    public function render()
    {
        return view('livewire.envio-chat');
    }

    #[On('sala-seleccionada')]
    public function updatedIdSala($id)
    {
        $this->id_sala = $id;
    }
}
