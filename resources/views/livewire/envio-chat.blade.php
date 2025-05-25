<form wire:submit="enviar" class="flex flex-col max-w-full">
    <textarea wire:model.live="mensaje" wire:keydown.enter.prevent="enviar"></textarea>
</form>