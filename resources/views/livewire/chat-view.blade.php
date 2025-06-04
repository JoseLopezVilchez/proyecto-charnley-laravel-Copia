<div class="grid grid-cols-12 justify-center items-center h-full w-full gap-4">
    <div class="col-span-3 h-full max-h-full overflow-hidden">@livewire('chats-atendidos')</div>
    <div class="col-span-6 h-full max-h-full overflow-hidden">@livewire('chat', ['id_sala' => $salaSeleccionada->id, 'activo' => true])</div>
    <div class="col-span-3 h-full max-h-full overflow-hidden">@livewire('chats-por-atender')</div>
</div>