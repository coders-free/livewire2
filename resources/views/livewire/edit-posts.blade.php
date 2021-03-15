<div>
   
    <a class="btn btn-green mx-2" wire:click="$set('open', true)">
        <i class="fas fa-edit"></i>
    </a>

    {{-- Modal --}}
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar post
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Título del post" />
                <x-jet-input wire:model="post.title" type="text" class="w-full" />
            </div>

            <div>
                <x-jet-label value="Título del post" />
                <textarea wire:model="post.content" rows="6" class="w-full form-control"></textarea>
            </div>
        </x-slot>

        <x-slot name="footer">

            <x-jet-action-message class="mr-3 inline-block" on="saved">
                El post se creó con éxito
            </x-jet-action-message>

            {{-- <div class="inline-block">Hola</div> --}}

            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25" >
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>