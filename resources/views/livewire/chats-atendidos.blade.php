<div>
    <ul class="list bg-base-100 rounded-box shadow-md">
  
        <li class="p-4 pb-2 text-xs opacity-60 tracking-wide">Chats activos</li>
    
        @foreach ($salas as $sala)
            <li class="list-row">
                <div><img class="size-10 rounded-box" src="https://img.daisyui.com/images/profile/demo/1@94.webp"/></div>
                <div>
                    <div>
                        <div>
                            <div>{{$sala['sala']->paciente()->name}}</div>
                            <div class="text-xs uppercase font-semibold opacity-60">{{$sala['sala']->created_at}}</div>
                        </div>
                        <button class="btn btn-square btn-ghost">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor">
                                    <path d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </g>  
                            </svg>
                        </button>
                    </div>
                    <div>
                        <p class="list-col-wrap text-xs">{{$sala['ultimo_mensaje']}}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
