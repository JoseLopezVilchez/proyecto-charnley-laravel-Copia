<?php

namespace App\Livewire;

use App\Models\Report;
use Livewire\Component;
use App\Models\Sala;
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
    public $mensajeReporte = '';

    public function mount(int $id_sala = 0, bool $activo = true)
    {
        $this->id_sala = $id_sala;
        if ($this->id_sala > 0) {
            $this->sala = Sala::withTrashed()->where('id', $this->id_sala)->first();
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
        $this->mount($id, $this->activo);
    }

    #[On('mensaje-enviado')]
    public function mensajeEnviado ()
    {
        $this->mount($this->id_sala, $this->activo);
    }

    public function reportar ()
    {
        if (!empty($this->sala)) {
            Report::create([
                'id_emisor' => Auth::user()->id,
                'id_usuario' => $this->sala->paciente->id,
                'descripcion' => $this->mensajeReporte ?? '',
                'id_imagen' => $this->sala->imagen->id,
                'id_sala' => $this->sala->id
            ]);

            $this->dispatch('datachange');
        }
    }

    public function terminar ()
    {
        $this->sala?->delete();
        $this->dispatch('datachange');
    }

    public function descartar ()
    {
        $this->sala?->restore();
        $this->sala?->reportes()->delete();
        $this->dispatch('datachange');
    }

    public function expulsar ()
    {
        $this->sala?->paciente?->chatrooms()->delete();
        $this->sala?->paciente?->delete();
        $this->sala?->reportes()->delete();
        $this->dispatch('datachange');
    }

    #[On('datachange')]
    public function datachange ()
    {
        $this->mount(0, $this->activo);
    }
}
