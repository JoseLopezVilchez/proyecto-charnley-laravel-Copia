<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Helpers\JoseHelper;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On; 

/**
 * @author Jose Lopez Vilchez
 * Chat en su conjunto, incluyendo la imagen asociada a la sala,
 * nombre de paciente, opciones (de haberlas para el usuario actual),
 * bocadillos de mensajes, y envío de nuevos mensajes
 */
class Chat extends Component
{
    public $id_sala;
    public $sala;
    public $activo;
    public $id_visor;

    public function mount(int $id_sala = 0, bool $activo = true)
    {
        $this->id_sala = $id_sala;
        if ($this->id_sala > 0) {
            $this->sala = JoseHelper::sala($this->id_sala);
        }

        $this->activo = $activo;

        $this->id_visor = Auth::id();
    }

    public function render()
    {
        return view('livewire.chat', [
            'id_sala' => $this->id_sala
        ]);
    }

    #[On('reporte-seleccionado')]
    #[On('sala-seleccionada')]
    public function updatedIdSala($id)
    {
        $this->mount($id, false);
    }

    #[On('mensaje-enviado')]
    public function mensajeEnviado ()
    {
        $this->mount($this->id_sala, true);
    }
}
