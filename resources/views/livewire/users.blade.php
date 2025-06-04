<div class="flex w-full h-full overflow-hidden gap-4">
    <div class="flex flex-col w-1/2 h-fit max-h-full">
        <div class="w-full px-4 pb-4">
            <button wire:click="limpiarSeleccion()" class="btn btn-neutral">Nuevo</button>
        </div>
        <div class="flex flex-col w-full h-fit max-h-full p-4 border rounded-box border-base-300 bg-base-200">
            <div class="flex flex-row">
                <img src="{{ !empty($usuarioSeleccionado?->profile_photo_path) ? $usuarioSeleccionado->profile_photo_path : 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.vectorstock.com%2Fi%2F500p%2F77%2F30%2Fdefault-avatar-profile-icon-grey-photo-placeholder-vector-17317730.jpg&f=1&nofb=1&ipt=fc9287830db7da060a522537c7eb571256c985b0466858831a17eabd3af95060'}}" alt="" class="h-48 w-48 rounded-box">
                <div class="flex flex-col justify-between pl-4 w-full text-base-content">
                    <div>
                        <h2 class="text-lg"><span class="font-bold">Nombre:</span> <span>{{ $usuarioSeleccionado->name ?? '' }}</span></h2>
                        <h3><span class="font-bold">Edad:</span> <span>{{ (new DateTime($usuarioSeleccionado?->birthdate))->diff(new DateTime())->y }}</span></h3>
                        <h3><span class="font-bold">Email:</span> <span>{{ $usuarioSeleccionado->email ?? '' }}</span></h3>
                        <h3><span class="font-bold">Rol:</span> <span>{{ !empty($usuarioSeleccionado?->role) ? $ROLES[$usuarioSeleccionado->role -1] : '' }}</span></h3>
                    </div>
                    <div class="join w-full justify-end">
                        <button onclick="baja.showModal()" class="btn btn-soft btn-error join-item {{empty($usuarioSeleccionado) ? 'btn-disabled' : ''}}">Dar de baja</button>
                    </div>
                </div>
            </div>
            <hr class="border-t my-4 border-base-300" />
            <form wire:submit.prevent="procesarFormulario()">
                <fieldset class="fieldset border-base-300 rounded-box border p-4 bg-base-100">
                    <label class="input validator w-full">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </g>
                        </svg>
                        <input wire:model="nombre" type="text" required placeholder="Nombre y apellidos" pattern="[A-Za-z][A-Za-z\s]*" minlength="2" maxlength="80" title="Solo letras"/>
                    </label>
                    <label class="input validator w-full">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </g>
                        </svg>
                        <input wire:model="email" type="email" placeholder="email@sitio.es" required />
                    </label>
                    <label class="select w-full">
                        <span class="label">Rol</span>
                        <select wire:model="rol" class="select" required>
                            <option disabled selected>Seleccione un rol</option>
                            @foreach ($ROLES as $key => $rol)
                                <option value="{{($key + 1)}}">{{$rol}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="input w-full">
                        <span class="label">Fecha de nacimiento</span>
                        <input wire:model="fecha_nacimiento" type="date" required/>
                    </label>
                    <button wire:click="" class="btn btn-neutral mt-4">{{empty($usuarioSeleccionado) ? 'Añadir' : 'Actualizar'}}</button>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="w-1/2 h-fit max-h-full overflow-y-auto border rounded-box border-base-300">
        <table class="table table-zebra">
            <thead class="sticky top-0 z-10 bg-neutral">
                <tr class="text-neutral-content">
                    <th class="border-e border-neutral-content">Nombre</th>
                    <th class="border-e border-neutral-content">Edad</th>
                    <th class="border-e border-neutral-content">Rol</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listado as $item)
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div wire:click="seleccionarUsuario({{ $item->id }})" class="avatar mr-2 cursor-pointer">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>{{ $item->name }}</h3>
                        </td>
                        <td class="border-e border-base-300">{{ (new DateTime($item?->birthdate))->diff(new DateTime())->y }}</td>
                        <td class="border-e border-base-300">{{ $ROLES[$item->role -1] }}</td>
                        <td>{{ $item->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <dialog id="baja" class="modal"> <!-- Para dar de baja a usuario -->
        <div class="modal-box">
            <h3 class="text-lg font-bold">Dar de baja</h3>
            <p class="py-4">¿Está seguro de que desea dar de baja a este usuario?</p>
            <div class="modal-action justify-center p-4">
                <form method="dialog" class="w-full flex flex-col gap-4">
                    <div class="w-full flex gap-4 justify-end">
                        <button class="btn btn-soft">Cancelar</button>
                        <button wire:click="bajaUsuario({{ $usuarioSeleccionado?->id }})" class="btn btn-soft btn-error">Sí, estoy seguro</button>
                    </div>
                </form>
            </div>
        </div>
        
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog> <!-- ----------------------------------------------------------- -->
</div>