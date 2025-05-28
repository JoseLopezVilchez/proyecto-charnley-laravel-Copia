<div class="flex flex-col h-full">
    <h3 class="p-4 pb-2 text-xs opacity-60 tracking-wide">Imágenes por atender</h3>
    <div class="carousel carousel-vertical rounded-box overflow-y-auto"> <!-- Tengo que ver exactamente qué clases pintan -->
        
        <!-- Inicio de placeholders -->
        <div class="carousel-item w-full relative">
            <img src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp" class="w-full h-auto block" /> <!-- Placeholder hasta que tengamos imagenes en la BDD -->
            <div class="absolute top-0 left-0 w-full h-full p-4 flex flex-col justify-end bg-gradient-to-b from-gray-500/20 to-gray-900 opacity-100 transition-opacity duration-500 ease-in-out hover:opacity-0">
                <h3 class="text-lg font-bold">Nombre Apellidos</h3>
                <p>Aquí hay un tío haciendo twerking, me da yuyu</p>
            </div>
        </div>
        <div class="carousel-item w-full relative">
            <img src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp" class="w-full h-auto block" /> <!-- Placeholder hasta que tengamos imagenes en la BDD -->
            <div class="absolute top-0 left-0 w-full h-full p-4 flex flex-col justify-end bg-gradient-to-b from-gray-500/20 to-gray-900 opacity-100 transition-opacity duration-500 ease-in-out hover:opacity-0">
                <h3 class="text-lg font-bold">Nombre Apellidos</h3>
                <p>Aquí hay un tío haciendo twerking, me da yuyu</p>
            </div>
        </div>
        <!-- Fin de placeholders -->

        @foreach ($por_atender as $item)
        <div class="carousel-item">
            <!-- <img src="{{$item->imagen()->imagenOriginal()}}" class="rounded-box" /> --> <!-- verdadero codigo a usar una vez tengamos imagenes -->
            <img src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp" class="rounded-box" /> <!-- Placeholder hasta que tengamos imagenes en la BDD -->
        </div>
        @endforeach
    </div>
</div>