<div>
    <center>
        <div class="flex flex-wrap justify-center mt-3">
            {{-- Detecta los cambios de livewire/productos.php --}}
            <input class="rounded-lg mr-2" type="text" name="buscar" id="buscar" wire:model="buscar">
            <button wire:click="$set('modalCrear', true)" class="bg-indigo-700 px-3 py-2 text-white font-bold 
            rounded-lg hover:bg-indigo-400 mt-3">CREAR PRODUCTO</button>
            {{-- El botón "Crear" tendrá un color indigo y cambiará de color al hacer hover, 
            la clase "rounded-lg" hará que el botón sea redondo --}}
        </div>
    </center>

    <div class="sm:px-6 lg:px-3 mt-3">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
        @if ($productos->count()) 
            
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCION</th>
                    <th>PRECIO</th>
                    <th>IMAGEN</th>
                    <th>ACCIONES</th>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td data-label="Id">{{ $producto->id }}</td>
                            <td data-label="Nombre">{{ $producto->nombre }}</td>
                            <td data-label="Descripcion">{{ $producto->descripcion }}</td>
                            <td data-label="Precio">{{ $producto->precio }}</td>
                            <td data-label="Imagen" class="text-center">
                                <img class="w-28 h-28 mx-auto" src="{{ asset($producto->ruta_imagen) }}" alt="">
                            </td>
                            <td data-label="Acciones">
                                <div class="button-group">
                                        <button wire:click="editarProductos ({{$producto->id}})"
                                        class="bg-green-400 text-white font-bold rounded-lg px-3 py-2 ml-5">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button wire:click="eliminarProductos ({{$producto->id}})"
                                        class="bg-pink-400 text-white font-bold rounded-lg px-3 py-2 ml-3">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                                
                                
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </th>
                
            </table>
        @else
            <div class="mt-8 border-gray-800 p-5">
                <strong class="text-primary-dark dark:text-light">NO HAY REGISTROS </strong>
            </div>
        @endif
        </div>
    </div>
    




    <x-dialog-modal wire:model="modalCrear">
        <x-slot name="title">
            <h3 class="font-bold mb-3 text-center">PUEDE CREAR UN NUEVO PRODUCTO</h3>
        </x-slot>
    
        <x-slot name="content">
            <div class="text-left mb-3">
                <label class="font-bold" for="nombre">Nombre</label>
                <input autocomplete="off" id="nombre" name="nombre" wire:model="nombre" type="text"
                    class="px-3 py-2 border-black rounded-lg w-full" placeholder="Nombre del producto">
            </div>
            
            <div class="text-left mb-3">
                <label class="font-bold" for="descripcion">Descripción</label>
                <textarea rows="4" id="descripcion" name="descripcion" wire:model="descripcion" type="text"
                    class="px-3 py-2 border-black rounded-lg w-full" placeholder="Descripción del producto"></textarea>
            </div>
    
            <div class="text-left mb-3">
                <label class="font-bold" for="precio">Precio</label>
                <input autocomplete="off" id="precio" name="precio" wire:model="precio" type="text"
                    class="px-3 py-2 border-black rounded-lg w-full" placeholder="Precio del producto">
            </div>
    
            <div class="text-left mb-3">
                <label class="font-bold" for="ruta_imagen">Imagen</label>
                <input type="file" name="ruta_imagen" wire:model="ruta_imagen" class="px-3 py-2 border-black rounded-lg">
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('modalCrear', false)" class="mr-2">
                Cancelar
            </x-secondary-button>
    
            <x-danger-button wire:click="crearProducto">
                Crear
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
    
    
          
</div>
