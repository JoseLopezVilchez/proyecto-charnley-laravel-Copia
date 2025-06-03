<div class="flex w-full h-full overflow-hidden gap-4">
    <div class="flex flex-col w-1/2 h-full">
        @livewire(Chat::class, ['id_sala' => $reporteSeleccionado?->sala?->id ?? 0, 'activo' => false])
    </div>
    <div class="w-1/2 h-full overflow-y-auto">
        <ul class="list shadow-sm rounded-box">
            @foreach ($listado as $item)
                <li wire:click="selectReporte ({{ $item->id }})" class="list-row card p-4 gap-4 border rounded-box border-base-300 bg-base-200">
                    <div class="flex justify-between">
                        <div class="flex gap-4">
                            <img class="w-24 rounded-full" src="{{$item->emisor?->profile_photo_path ?? 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.vectorstock.com%2Fi%2F500p%2F77%2F30%2Fdefault-avatar-profile-icon-grey-photo-placeholder-vector-17317730.jpg&f=1&nofb=1&ipt=fc9287830db7da060a522537c7eb571256c985b0466858831a17eabd3af95060'}}">
                            <img class="w-24 rounded-full" src="{{$item->usuario?->profile_photo_path ?? 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.vectorstock.com%2Fi%2F500p%2F77%2F30%2Fdefault-avatar-profile-icon-grey-photo-placeholder-vector-17317730.jpg&f=1&nofb=1&ipt=fc9287830db7da060a522537c7eb571256c985b0466858831a17eabd3af95060'}}">
                        </div>
                        <img class="w-24 rounded-box object-contain" src="{{$item->imagen->url ?? 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.themgroup.co.uk%2Fwp-content%2Fuploads%2F2020%2F12%2Flandscape-placeholder-e1608289113759.png&f=1&nofb=1&ipt=de32ab4038b7ad1ae09c2f71732a5cabbb45b1965edf71ec5e529970454a89c6'}}">
                    </div>
                    <div class="p-4 border rounded-box border-base-300 bg-base-100">
                        <p>{{$item->descripcion}}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>