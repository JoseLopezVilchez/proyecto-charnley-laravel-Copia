<?php

namespace App\Livewire;

use App\Models\Report;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class Reports extends Component
{
    public Collection $listado;
    public ?Report $reporteSeleccionado;

    public function mount()
    {
        $this->listado = Report::all()->except(Auth::id());
        $this->reporteSeleccionado = $this->listado->first();
    }

    public function render()
    {
        return view('livewire.reports');
    }

    public function selectReporte (int $id)
    {
        $this->reporteSeleccionado = $this->listado->firstWhere('id', $id);
        $this->dispatch('reporte-seleccionado', id: $this->reporteSeleccionado?->sala?->id);
    }
}
