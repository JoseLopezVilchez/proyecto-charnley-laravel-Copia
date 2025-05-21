<div class="flex w-full overflow-hidden">
    <div class="carousel carousel-vertical bg-neutral rounded-box"> <!-- Tengo que ver exactamente qué clases pintan -->
        
        <!-- Inicio de placeholders -->
        <div class="carousel-item">
            <img src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp" class="rounded-box" /> <!-- Placeholder hasta que tengamos imagenes en la BDD -->
        </div>
        <div class="carousel-item">
            <img src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp" class="rounded-box" /> <!-- Placeholder hasta que tengamos imagenes en la BDD -->
        </div>
        <div class="carousel-item">
            <img src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp" class="rounded-box" /> <!-- Placeholder hasta que tengamos imagenes en la BDD -->
        </div>
        <div class="carousel-item">
            <img src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp" class="rounded-box" /> <!-- Placeholder hasta que tengamos imagenes en la BDD -->
        </div>
        <div class="carousel-item">
            <img src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp" class="rounded-box" /> <!-- Placeholder hasta que tengamos imagenes en la BDD -->
        </div>
        <div class="carousel-item">
            <img src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp" class="rounded-box" /> <!-- Placeholder hasta que tengamos imagenes en la BDD -->
        </div>
        <div class="carousel-item">
            <img src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp" class="rounded-box" /> <!-- Placeholder hasta que tengamos imagenes en la BDD -->
        </div>
        <div class="carousel-item">
            <img src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp" class="rounded-box" /> <!-- Placeholder hasta que tengamos imagenes en la BDD -->
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