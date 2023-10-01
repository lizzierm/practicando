<x-app-layout>
        <x-slot name="header">
                {{-- llamamos a loque esta dentro de index css --> link para la tabla--}}
                <link rel="stylesheet" href="{{asset('css/tabla.css') }}">
                <h2 class="font-semibold text-xl text-gray-700 dark:text-gray-900 leading-tight">
                    {{ __('PRODUCTOS') }}
                </h2>
        
            </x-slot>
        @livewire('producto.producto-index')
</x-app-layout>
