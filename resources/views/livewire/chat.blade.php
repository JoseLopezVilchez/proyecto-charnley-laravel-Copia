<div class="flex flex-col h-full p-4 border rounded-box border-base-300 bg-base-200"> <!-- Chat abierto -->
    <div class="flex flex-row mb-4"> <!-- Imagen que se envió para el inicio del chat, nombre de paciente, y opciones (concluir chat, reportar, blah blah) -->
        {{-- <div class="" style="background-image: url('{{$sala->imagen()->imagenOriginal()}}')"> --}} <!-- Imagen por la que se abrió el chat, podría cambiarla por un img o lo que sea -->
        <div class="h-48 w-48 bg-no-repeat bg-center bg-cover rounded-box" style="background-image: url('{{ !empty($sala?->imagen?->url) ? $sala?->imagen?->url : 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.vectorstock.com%2Fi%2F500p%2F77%2F30%2Fdefault-avatar-profile-icon-grey-photo-placeholder-vector-17317730.jpg&f=1&nofb=1&ipt=fc9287830db7da060a522537c7eb571256c985b0466858831a17eabd3af95060'}}')"></div>
        <div class="flex flex-col space-between pl-4">
            <div> <!-- Nombre de usuario y edad -->
                <h2 class="text-lg"><span class="font-bold">Nombre:</span> <span>{{$sala?->paciente?->name ?? ''}}</span></h2>
                <h3><span class="font-bold">Edad:</span> <span>{{ (new DateTime($sala?->paciente?->birthdate))->diff(new DateTime())->y }}</span></h3>
            </div>
            <div> <!-- Botones - debería tener concluír chat y reportar, pero qué más? -->

            </div>
        </div>
    </div>
    <hr class="border-t border-base-300 my-4" />
    <div class="flex flex-col flex-1 overflow-hidden">
        <div class="flex flex-col-reverse flex-1 p-4 overflow-y-auto border rounded-box border-base-300 bg-base-100">
            @if (count($sala?->mensajes ?? []) > 0)
                @foreach ($sala->mensajes as $mensaje)
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
</div>