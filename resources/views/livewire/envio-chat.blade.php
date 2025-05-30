<form wire:submit="enviar" class="flex flex-col max-w-full mt-4 bg-base-100 border rounded-box border-base-300">
    <textarea wire:model.live="mensaje" wire:keydown.enter.prevent="enviar"></textarea>
</form>