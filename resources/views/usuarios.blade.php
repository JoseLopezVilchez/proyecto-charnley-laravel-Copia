<x-app-layout>
    <div class="flex w-full h-full overflow-hidden gap-4">
        <div class="flex flex-col w-1/2 h-fit max-h-full p-4 border rounded-box border-base-300 bg-base-200">
            <div class="flex flex-row">
                <img src="https://img.daisyui.com/images/profile/demo/kenobee@192.webp" alt="" class="h-48 w-48 rounded-box">
                <div class="flex flex-col justify-between pl-4 h-full w-full text-base-content">
                    <div>
                        <h2 class="text-lg"><span class="font-bold">Nombre:</span> <span>Nombre Apellido</span></h2>
                        <h3><span class="font-bold">Edad:</span> <span>00</span></h3>
                        <h3><span class="font-bold">Email:</span> <span>correoelectronico@correo.com</span></h3>
                        <h3><span class="font-bold">Rol:</span> <span>Administradoroalgoasi</span></h3>
                    </div>
                    <div class="join w-full justify-end"> <!-- Botones - debería tener 'dar de baja', pero qué más? -->
                        <button class="btn btn-soft btn-error join-item">Dar de baja</button>
                    </div>
                </div>
            </div>
            <hr class="border-t my-4 border-base-300" />
            <form action="">
                <fieldset class="fieldset border-base-300 rounded-box border p-4 bg-base-100">
                    <label class="input validator w-full">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </g>
                        </svg>
                        <input type="text" required placeholder="Nombre y apellidos" pattern="[A-Za-z][A-Za-z]*" minlength="2" maxlength="80" title="Solo letras"/>
                    </label>
                    <label class="input validator w-full">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </g>
                        </svg>
                        <input type="email" placeholder="email@sitio.es" required />
                    </label>
                    <label class="select w-full">
                        <span class="label">Rol</span>
                        <select class="select">
                            <option disabled selected>Seleccione un rol</option>
                            <option>Usuario</option>
                            <option>Cuidador</option>
                            <option>Soporte</option>
                            <option>Técnico</option>
                            <option>Administrador</option>
                            <option>Superadministrador</option>
                        </select>
                    </label>
                    <label class="input w-full">
                        <span class="label">Fecha de nacimiento</span>
                        <input type="date"/>
                    </label>
                    <button class="btn btn-neutral mt-4">Actualizar</button>
                </fieldset>
            </form>
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
                    <!-- Inicio de placeholders -->
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <tr>
                        <td class="flex items-center border-e border-base-300">
                            <div class="avatar mr-2">
                                <div class="w-8 rounded-full">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                                </div>
                            </div>
                            <h3>Nombre Apellido</h3>
                        </td>
                        <td class="border-e border-base-300">333</td>
                        <td class="border-e border-base-300">Administradoroalgoasi</td>
                        <td>correoelectronico@correo.com</td>
                    </tr>
                    <!-- Fin de placeholders -->
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>