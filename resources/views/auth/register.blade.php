<x-guest-layout>
   <div  class="bg-black bg-opacity-60 px-16 py-16 self-center mt-2 lg:w-2/5 lg:max-w-md rounded-md w-full ">
        <h2 class="text-4xl text-white mb-8 font-semibold"
        >
        Crear Cuenta
        </h2>   
    <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            
            <div class="flex justify-between my-5">
                <x-link
                :href="route('password.request')"
            >
                ¿Ha olvidado su contraseña?
            </x-link>
            <x-link
            :href="route('login')"
            >
                ¿Ya tienes Cuenta?
            </x-link>
        </div>
        <x-primary-button class="w-full justify-center">
                {{ __('Registrarme') }}
            </x-primary-button>
        </form>
    
   </div>
</x-guest-layout>
