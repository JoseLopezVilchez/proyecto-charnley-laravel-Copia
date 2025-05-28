<x-app-layout>
    <div class="flex w-full h-full overflow-hidden">
        <div class="flex flex-col w-1/2 h-full">
            <div class="flex flex-row">
                <img src="https://img.daisyui.com/images/profile/demo/kenobee@192.webp" alt="" class="h-48 w-48">
                <div class="flex flex-col space-between pl-4">
                    <div>
                        <h2 class="text-lg"><span class="font-bold">Nombre:</span> <span>Nombre Apellido</span></h2>
                        <h3><span class="font-bold">Edad:</span> <span>00</span></h3>
                    </div>
                    <div> <!-- Botones - debería tener 'dar de baja', pero qué más? -->

                    </div>
                </div>
            </div>
            <hr class="border-t border-gray-300 my-4" />
            
        </div>
        <div class="w-1/2 h-full overflow-y-auto">
            <div class="w-full h-fit flex flex-wrap justify-around gap-y-4">
                <div class="card">
                    <div class="avatar">
                        <div class="w-48 rounded-full">
                            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F000%2F550%2F731%2Foriginal%2Fuser-icon-vector.jpg&f=1&nofb=1&ipt=6ff6c60830f1e2a7a7f28bb7a7e0c31651307083ecb10339c44c2b8496ef8f7d" />
                        </div>
                    </div>
                    <div class="card-body items-center">
                        <h3 class="card-title text-center">Nuevo</h3>
                    </div>
                </div>
                <!-- Inicio de placeholders -->
                <div class="card">
                    <div class="avatar">
                        <div class="w-48 rounded-full">
                            <img src="https://img.daisyui.com/images/profile/demo/batperson@192.webp" />
                        </div>
                    </div>
                    <div class="card-body items-center">
                        <h3 class="card-title text-center">Nombre Apellido</h3>
                        <sub class="font-light text-center">correoelectronico@correo.com</sub>
                    </div>
                </div>
                <!-- Fin de placeholders -->
            </div>
        </div>
    </div>
</x-app-layout>