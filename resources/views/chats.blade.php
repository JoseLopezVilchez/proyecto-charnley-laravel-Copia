<x-app-layout>
    <div class="max-h-full grid grid-cols-12 justify-center items-center">
        <div class="col-span-3">@livewire('chats-atendidos')</div>

        <div class="col-span-6">@livewire('chat', ['id_sala' => 1])</div>

        <!-- Lista de imágenes por resolver (para añadirlas como nuevos chats) -->
        <div class="col-span-3">@livewire('chats-por-atender')</div>
    </div>
</x-app-layout>