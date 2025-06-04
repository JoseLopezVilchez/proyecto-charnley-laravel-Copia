<div class="flex flex-col h-full p-4 border rounded-box border-base-300 bg-base-200"> <!-- Chat abierto -->
    <div class="flex flex-row mb-4"> <!-- Imagen que se envió para el inicio del chat, nombre de paciente, y opciones (concluir chat, reportar, blah blah) -->
        {{-- <div class="" style="background-image: url('{{$sala->imagen()->imagenOriginal()}}')"> --}} <!-- Imagen por la que se abrió el chat, podría cambiarla por un img o lo que sea -->
        <div class="h-48 w-48 bg-no-repeat bg-center bg-cover rounded-box" style="background-image: url('{{ !empty($sala?->imagen?->url) ? $sala?->imagen?->url : 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.vectorstock.com%2Fi%2F500p%2F77%2F30%2Fdefault-avatar-profile-icon-grey-photo-placeholder-vector-17317730.jpg&f=1&nofb=1&ipt=fc9287830db7da060a522537c7eb571256c985b0466858831a17eabd3af95060'}}')"></div>
        <div class="flex flex-col flex-1 justify-between pl-4">
            <div> <!-- Nombre de usuario y edad -->
                <h2 class="text-lg"><span class="font-bold">Nombre:</span> <span>{{$sala?->paciente?->name ?? ''}}</span></h2>
                <h3><span class="font-bold">Edad:</span> <span>{{ (new DateTime($sala?->paciente?->birthdate))->diff(new DateTime())->y }}</span></h3>
            </div>
            <div class="inline-flex w-full gap-4 justify-end">
                @if ($activo)
                    <button onclick="reportar.showModal()" class="btn btn-soft btn-warning">Reportar</button>
                    <button onclick="terminar.showModal()" class="btn btn-soft btn-success">Terminar</button>
                @else
                    <button onclick="descartar.showModal()" class="btn btn-soft">Descartar</button>
                    <button onclick="expulsar.showModal()" class="btn btn-soft btn-error">Expulsar</button>
                @endif
            </div>
        </div>
    </div>
    <hr class="border-t border-base-300 my-4" />
    <div class="flex flex-col flex-1 overflow-hidden">
        <div class="flex flex-col-reverse flex-1 p-4 overflow-y-auto border rounded-box border-base-300 bg-base-100">
            @if (count($sala?->mensajes ?? []) > 0)
                @foreach ($sala->mensajes->reverse() as $mensaje)
                    <div class="chat {{$mensaje->id_sender == $id_visor ? 'chat-end' : 'chat-start'}}">
                        <div class="chat-image avatar">
                            <div class="w-10 rounded-full">
                                <img alt="Tailwind CSS chat bubble component" src="{{$mensaje->sender->profile_photo_path ?? 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.vectorstock.com%2Fi%2F500p%2F77%2F30%2Fdefault-avatar-profile-icon-grey-photo-placeholder-vector-17317730.jpg&f=1&nofb=1&ipt=fc9287830db7da060a522537c7eb571256c985b0466858831a17eabd3af95060'}}"/>
                            </div>
                        </div>
                        <div class="chat-header">
                            {{--{{$mensaje->sender->name}}--}}
                            <time class="text-xs opacity-50">{{$mensaje->created_at}}</time>
                        </div>
                        <div class="chat-bubble">{{$mensaje->content}}</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    @if ($activo)
        @livewire('envio-chat', ['id_sala' => "$id_sala"])
    @endif
    <dialog id="reportar" class="modal"> <!-- Para reportar -->
        <div class="modal-box">
            <h3 class="text-lg font-bold">Reporte</h3>
            <p class="py-4">Introduzca las razones del reporte</p>
            <div class="modal-action justify-center p-4">
                <form method="dialog" class="w-full flex flex-col gap-4">
                    <textarea wire:model="mensajeReporte" class="textarea w-full" placeholder="Razones"></textarea>
                    <div class="w-full flex gap-4 justify-end">
                        <button class="btn btn-soft">Cancelar</button>
                        <button wire:click="reportar()" class="btn btn-soft btn-error">Reportar</button>
                    </div>
                </form>
            </div>
        </div>
        
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog> <!-- -------------------------------------------------------- -->
    <dialog id="terminar" class="modal"> <!-- Para terminar chat -->
        <div class="modal-box">
            <h3 class="text-lg font-bold">Terminar chat</h3>
            <p class="py-4">¿Quiere terminar el chat? ¿Cree que el usuario no tiene más preocupaciones que necesiten ser aclaradas?</p>
            <div class="modal-action justify-center p-4">
                <form method="dialog" class="w-full flex flex-col gap-4">
                    <div class="w-full flex gap-4 justify-end">
                        <button class="btn btn-soft">Cancelar</button>
                        <button wire:click="terminar()" class="btn btn-soft btn-success">Terminar</button>
                    </div>
                </form>
            </div>
        </div>
        
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog> <!-- -------------------------------------------- -->
    <dialog id="descartar" class="modal"> <!-- Para descartar reporte -->
        <div class="modal-box">
            <h3 class="text-lg font-bold">Descartar reporte</h3>
            <p class="py-4">¿Quiere descartar el reporte? El chat asociado será recuperado</p>
            <div class="modal-action justify-center p-4">
                <form method="dialog" class="w-full flex flex-col gap-4">
                    <div class="w-full flex gap-4 justify-end">
                        <button class="btn btn-soft">Cancelar</button>
                        <button wire:click="descartar()" class="btn btn-soft btn-success">Descartar</button>
                    </div>
                </form>
            </div>
        </div>
        
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog> <!-- -------------------------------------------- -->
    <dialog id="expulsar" class="modal"> <!-- Para expulsar usuario -->
        <div class="modal-box">
            <h3 class="text-lg font-bold">Expulsar</h3>
            <p class="py-4">¿Está seguro de que desea expulsar a este usuario? Tenga en cuenta que lidia con gente de un colectivo vulnerable. Debe tener una buena razón para tomar esta decisión</p>
            <div class="modal-action justify-center p-4">
                <form method="dialog" class="w-full flex flex-col gap-4">
                    <div class="w-full flex gap-4 justify-end">
                        <button class="btn btn-soft">Cancelar</button>
                        <button wire:click="expulsar()" class="btn btn-soft btn-error">Sí, estoy seguro</button>
                    </div>
                </form>
            </div>
        </div>
        
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog> <!-- ----------------------------------------------------------- -->

    <script>
        window.addEventListener('datachange', () => {
            window.location.reload();
        });
    </script>
</div>