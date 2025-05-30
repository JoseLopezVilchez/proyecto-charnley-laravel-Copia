<div class="flex flex-col h-full">
    <h3 class="p-4 pb-2 text-xs opacity-60 tracking-wide">Chats activos</h3>
    <ul class="list rounded-box shadow-sm max-h-full overflow-y-auto">

        <!-- Inicio de placeholders -->
        <li class="list-row">
            <img class="size-10 rounded-box" src="https://img.daisyui.com/images/profile/demo/1@94.webp"/>
            <div>
                <div class="flex flex-col mb-2">
                    <strong>Nombre de pacienticus 8000</strong>
                    <sub class="text-xs uppercase opacity-60">07-07-1997</sub>
                </div>
                <div>
                    <p class="list-col-wrap text-xs line-clamp-3">Último mensaje, uno muy largo, uyuyuyuy, mamma mía lo largo que es oyy dios mío esto es demasiado tocho no me va a caber ay madre jolín</p>
                </div>
            </div>
        </li>
        <li class="list-row">
            <img class="size-10 rounded-box" src="https://img.daisyui.com/images/profile/demo/1@94.webp"/>
            <div>
                <div class="flex flex-col mb-2">
                    <strong>Nombre de pacienticus 8000</strong>
                    <sub class="text-xs uppercase opacity-60">07-07-1997</sub>
                </div>
                <div>
                    <p class="list-col-wrap text-xs line-clamp-3">Último mensaje, uno muy largo, uyuyuyuy, mamma mía lo largo que es oyy dios mío esto es demasiado tocho no me va a caber ay madre jolín</p>
                </div>
            </div>
        </li>
        <!-- Fin de placeholders -->
    
        @foreach ($salas as $sala)
        <li class="list-row">
            <img class="size-10 rounded-box" src="https://img.daisyui.com/images/profile/demo/1@94.webp"/>
            <div>
                <div class="mb-2">
                    <strong>{{$sala['sala']->paciente()->name}}</strong>
                    <sub class="text-xs uppercase opacity-60">{{$sala['sala']->created_at}}</sub>
                </div>
                <div>
                    <p class="list-col-wrap text-xs">{{$sala['ultimo_mensaje']}}</p>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
