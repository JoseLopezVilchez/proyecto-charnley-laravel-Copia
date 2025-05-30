<x-app-layout>
    <div class="grid grid-cols-12 justify-center items-center h-full gap-4">
        <div class="col-span-3 h-full max-h-full overflow-hidden">@livewire('chats-atendidos')</div>

        <div class="col-span-6 h-full max-h-full overflow-hidden">@livewire('chat', ['id_sala' => 1])</div>

        <!-- Lista de imágenes por resolver (para añadirlas como nuevos chats) -->
        <div class="col-span-3 h-full max-h-full overflow-hidden">@livewire('chats-por-atender')</div>
    </div>
</x-app-layout>