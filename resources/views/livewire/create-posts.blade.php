<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Crear nuevo post
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear un nuevo post
        </x-slot>

        <x-slot name="content">

           

            <div class="mb-4">
                <x-jet-label value="Título del post" />
                <x-jet-input wire:model="post.title" type="text" class="w-full" />
                <x-jet-input-error for="post.title" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Título del post" />
                <textarea wire:model="post.content" rows="6" class="w-full form-control"></textarea>
                <x-jet-input-error for="post.content" />
            </div>

            @if ($photo)
                <hr class="mb-4">
                <x-jet-label class="mb-2 font-bold text-base" value="Imagen del post" />
                <img class="rounded h-64 w-full object-cover object-center mb-4" src="{{ $photo->temporaryUrl() }}">
            @endif

            <div>
                <input type="file" wire:model="photo"  />
                <x-jet-input-error for="photo" />
                {{-- <div class="text-sm text-gray-700 -mt-2" wire:loading wire:target="photo">Uploading...</div> --}}
                
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

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="photo, save" class="disabled:opacity-25" >
                Crear post
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
