<div class="flex flex-col h-full">
    <h3 class="p-4 pb-2 text-xs opacity-60 tracking-wide">Imágenes por atender</h3>
    <div class="carousel carousel-vertical gap-4 shadow-sm rounded-box overflow-y-auto">
        @foreach ($listado as $sala)
            <div wire:click="atenderSala({{$sala->id}})" class="carousel-item w-full relative rounded-box">
                <img src="{{$sala->imagen->url ?? 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.themgroup.co.uk%2Fwp-content%2Fuploads%2F2020%2F12%2Flandscape-placeholder-e1608289113759.png&f=1&nofb=1&ipt=de32ab4038b7ad1ae09c2f71732a5cabbb45b1965edf71ec5e529970454a89c6'}}" class="w-full h-auto block" />
                <div class="absolute top-0 left-0 w-full h-full p-4 flex flex-col justify-end text-neutral bg-gradient-to-b from-gray-500/20 to-gray-900 transition-opacity duration-500 ease-in-out opacity-0 hover:opacity-100">
                    <h3 class="text-lg font-bold">{{$sala->paciente->name}}</h3>
                    <p>{{$sala->mensajes->sortByDesc('created_at')->last()->content ?? ''}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>