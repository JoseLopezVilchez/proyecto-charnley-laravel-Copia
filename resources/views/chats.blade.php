<x-app-layout>
    <div class="max-h-[calc(100%-120px)] grid grid-cols-12 justify-center items-center pb-8">
        <div class="col-span-3 h-full">@livewire('chats-atendidos')</div>

        <div class="col-span-6 h-full">@livewire('chat', ['id_sala' => 1])</div>

        <!-- Lista de imágenes por resolver (para añadirlas como nuevos chats) -->
        <div class="col-span-3 h-full">@livewire('chats-por-atender')</div>
    </div>
</x-app-layout>