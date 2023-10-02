<x-guest-layout>
   <div class="bg-black bg-opacity-60 px-16 py-16 self-center mt-2 lg:w-2/5 lg:max-w-md rounded-md w-full">

        <h2 class="text-2xl text-white mb-8 font-semibold">
            Restablecer Contraseña
        </h2>   
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('¿Ha olvidado su contraseña? No se preocupe. Indíquenos su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
       
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex justify-between my-5">
                <x-link
                    :href="route('login')"
                >
                    ¿Ya tienes Cuenta?
                </x-link>
                <x-link
                :href="route('register')"
                >
                    ¿Aún no tienes Cuenta?
                </x-link>
            </div>
            <x-primary-button class="w-full justify-center">
                {{ __('Enviar Email') }}
            </x-primary-button>

        </form>
   </div>
</x-guest-layout>
