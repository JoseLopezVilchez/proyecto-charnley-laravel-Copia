<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Users extends Component
{
    public Collection $listado;
    public ?User $usuarioSeleccionado;
    public const ROLES = ['Usuario', 'Cuidador', 'Soporte', 'Admin', 'Superadministrador', 'Father'];

    public ?string $nombre;
    public ?string $email;
    public ?int $rol;
    public ?string $fecha_nacimiento;

    public function mount()
    {
        $this->listado = User::all()->except(Auth::id());
        $this->usuarioSeleccionado = $this->listado->first();
        $this->nombre = $this->usuarioSeleccionado->name;
        $this->email = $this->usuarioSeleccionado->email;
        $this->rol = $this->usuarioSeleccionado->role;
        $this->fecha_nacimiento = $this->usuarioSeleccionado->birthdate;
    }

    public function render()
    {
        return view('livewire.users', [
            'ROLES' => self::ROLES
        ]);
    }

    public function seleccionarUsuario ($id)
    {
        $this->limpiarSeleccion();
        $this->usuarioSeleccionado = $this->listado->firstWhere('id', $id);
        $this->nombre = $this->usuarioSeleccionado->name;
        $this->email = $this->usuarioSeleccionado->email;
        $this->rol = $this->usuarioSeleccionado->role;
        $this->fecha_nacimiento = $this->usuarioSeleccionado->birthdate;
    }

    public function bajaUsuario ($id)
    {
        $this->listado->firstWhere('id', $id)->delete();
        $this->limpiarSeleccion();
        $this->mount();
    }

    public function limpiarSeleccion ()
    {
        $this->usuarioSeleccionado = null;
        $this->nombre = null;
        $this->email = null;
        $this->rol = null;
        $this->fecha_nacimiento = null;
    }

    public function procesarFormulario ()
    {
        $this->validate([
            'nombre' => 'required|string|max:80',
            'email' => 'required|email',
            'rol' => 'required|integer|min:1|max:' . (count($this::ROLES)),
            'fecha_nacimiento' => 'required|date',
        ]);

        if (!empty($this->usuarioSeleccionado)) {
            $this->usuarioSeleccionado->update([
                'name' => $this->nombre,
                'email' => $this->email,
                'role' => $this->rol,
                'birthdate' => $this->fecha_nacimiento,
            ]);
        } else {
            User::create([
                'name' => $this->nombre,
                'email' => $this->email,
                'role' => $this->rol,
                'birthdate' => $this->fecha_nacimiento,
            ]);
        }

        $this->limpiarSeleccion();
        $this->mount();
    }
}
