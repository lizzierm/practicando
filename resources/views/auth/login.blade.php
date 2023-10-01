<x-guest-layout>

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-900">
        {{ session('status') }}
    </div>
    @endif

    <section class="flex flex-col md:flex-row h-screen items-center">

        <div class="bg-pink-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
            <img src="{{asset('/imagen/rojos.jpg')}}" alt="" class="w-full h-full object-cover">
        </div>
        {{-- color de fondo de inicio de sesion --}}
        <div class="bg-pink-200 w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
          flex items-center justify-center">

            <div class="w-full h-100">

                <h1 class="text-center text-black md:text-2xl font-bold leading-tight mt-12 mx-auto w-max">Inicio de
                    Sesión</h1>

                <form class="mt-6" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label class="block text-gray-900">{{ __('Correo Electronico') }}</label>
                        <input type="email" name="email" id="email" placeholder="Introdusca su correo electronico"
                            class="w-full px-4 py-3 rounded-lg bg-gray-100 text-gray-950 mt-2 border focus:border-pink-500
                             focus:bg-pink-200 focus:outline-none" autofocus autocomplete required>
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-900">{{ __('Contraseña') }}</label>
                        <input type="password" name="password" id="password" placeholder="Introdusca su contraseña"
                            minlength="6" class="w-full px-4 py-3 rounded-lg
                         bg-gray-100 text-gray-950 mt-2 border focus:border-pink-500
                        focus:bg-pink-200 focus:outline-none" required>
                    </div>

                    <div class="text-right mt-2">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-sm font-semibold text-gray-900 hover:text-red-700 focus:text-red-700">
                            {{ __('¿ OLvidaste tu contraseña ?') }}</a>
                        @endif

                        {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-900 hover:text-red-700 focus:text-red-700 ">REGISTRARSE</a>
                        @endif --}}
                    </div>


                    <button type="submit" class="w-full block bg-pink-600 hover:bg-pink-800 focus:bg-pink-400 text-white font-semibold 
                        px-4 py-3 mt-6">
                        {{ __('Iniciar') }}
                    </button>

                </form>

                <hr class="my-6 border-gray-300 w-full">
                @if (Route::has('register'))
                <p class="mt-8">¿ Necesito una cuenta ?<a href="{{ route('register') }}"
                        class="text-blue-600 hover:text-blue-600 font-semibold">
                        Crear nueva cuenta</a></p>
                @endif




            </div>
        </div>

    </section>

</x-guest-layout>