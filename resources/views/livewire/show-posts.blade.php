<div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    
    <x-responsive-table>

        {{-- Buscador --}}
        <div class="px-6 py-3 flex items-center justify-between">
            
            <div>
                <span class="text-gray-700 text-sm">Mostar</span>

                <select class="form-control mx-2" wire:model="cantidad">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>

                <span class="text-gray-700 text-sm">entradas</span>

            </div>

            <x-jet-input type="text" class="w-2/5" placeholder="Ingrese una palabra para empezar a filtar" wire:model="search" />

            <div>
                @livewire('create-posts')
            </div>
        </div>

        {{-- Tabla --}}
        @if ($posts->count())
        
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            wire:click="order('title')"
                            class="w-1/4 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title


                            @if ($orderBy == 'title')
                                
                                @if ($order == "asc")
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif

                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif

                        </th>
                        <th scope="col"
                            wire:click="order('content')"
                            class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Content
                            
                            @if ($orderBy == 'content')
                                
                                @if ($order == "asc")
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif

                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif

                        </th>

                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $post)
                    
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    
                                    <div class="text-sm font-medium text-gray-900">
                                        {{$post->title}}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$post->content}}</div>
                            </td>
                            
                            <td class="px-6 py-4 text-sm font-medium">
                                <div class="flex items-center">
                                    <a class="btn btn-blue">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @livewire('edit-posts', ['post' => $post], key('edit-posts' . $post->id))
                                    @livewire('delete-posts', ['post' => $post], key('delete-posts' .$post->id))
                                </div>
                            </td>
                        </tr>

                    @endforeach

                    <!-- More items... -->
                </tbody>
            </table>
        @else

            <div class="px-6 py-4 bg-white">
                No hay ningún registro coincidente 
            </div>

        @endif

        {{-- Paginacion --}}
        @if ($posts->hasPages())
        
            <div class="px-6 py-3">
                {{$posts->links()}}
            </div>

        @endif

    </x-responsive-table>

</div>
