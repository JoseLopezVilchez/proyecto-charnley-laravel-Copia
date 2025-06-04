<div class="flex flex-col h-full">
    <h3 class="p-4 pb-2 text-xs opacity-60 tracking-wide">Chats activos</h3>
    <ul class="list rounded-box shadow-sm max-h-full overflow-y-auto">
        @foreach ($listado as $sala)
            <li wire:click="selectSala({{$sala->id}})" class="list-row">
                <img class="size-10 rounded-box" src="{{$sala->imagen->url ?? 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.themgroup.co.uk%2Fwp-content%2Fuploads%2F2020%2F12%2Flandscape-placeholder-e1608289113759.png&f=1&nofb=1&ipt=de32ab4038b7ad1ae09c2f71732a5cabbb45b1965edf71ec5e529970454a89c6'}}"/>
                <div>
                    <div class="flex flex-col mb-2">
                        <strong>{{$sala->paciente->name}}</strong>
                        <sub class="text-xs uppercase opacity-60">{{$sala->created_at->format('H:i d-m-Y')}}</sub>
                    </div>
                    <div>
                        <p class="list-col-wrap text-xs line-clamp-3">{{$sala->mensajes->sortByDesc('created_at')->first()->content}}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
