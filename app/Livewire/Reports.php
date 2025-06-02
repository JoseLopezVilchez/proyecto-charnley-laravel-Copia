<?php

namespace App\Livewire;

use App\Models\Report;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

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
}
