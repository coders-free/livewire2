<div>
    <a class="btn btn-red" wire:click="$set('open', true)">
        <i class="fas fa-trash"></i>
    </a>

    {{-- Modal --}}
    <div>
        <x-jet-confirmation-modal wire:model="open" maxWidth="xl">
            <x-slot name="title">
                ¿Estás seguro que quieres eliminar?
            </x-slot>

            <x-slot name="content">
                Se eliminará el articulo "{{$post->title}}" Esta información no podra recuperarse
            </x-slot>

            <x-slot name="footer">

                <x-jet-secondary-button wire:click="$set('open', false)">
                    Cancelar
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="delete" wire:loading.attr="disabled" class="disabled:opacity-25">
                    Eliminar
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
    </div>
</div>
