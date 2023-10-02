<!DOCTYPE html>
<x-guest-layout>
   <div class="bg-black bg-opacity-60 px-16 py-16 self-center mt-2 lg:w-2/5 lg:max-w-md rounded-md w-full ">
     <!-- Session Status -->
     <x-auth-session-status class="mb-4" :status="session('status')" />
     <h2 class="text-4xl text-white mb-8 font-semibold"
     >
        Iniciar Sesión
     </h2>
     <form method="POST" action="{{ route('login') }}" novalidate  >
         @csrf
 
         <!-- Email Address -->
         <div>
             <x-input-label for="email" :value="__('Email')" />
             <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
             <x-input-error :messages="$errors->get('email')" class="mt-2" />
         </div>
 
         <!-- Password -->
         <div class="mt-4">
             <x-input-label for="password" :value="__('Password')" />
 
             <x-text-input id="password" class="block mt-1 w-full"
                             type="password"
                             name="password"
                             required autocomplete="current-password" />
 
             <x-input-error :messages="$errors->get('password')" class="mt-2" />
         </div>
 
         <!-- Remember Me -->
         <div class="block mt-4">
             <label for="remember_me" class="inline-flex items-center">
                 <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                 <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordarme') }}</span>
             </label>
         </div>
 
         <div class="flex justify-between my-5">
             <x-link
             wire:navigate
                 :href="route('password.request')"
             >
                 ¿Ha olvidado su contraseña?
             </x-link>
             <x-link
             wire:navigate
             :href="route('register')"
             >
                 ¿Aún no tienes Cuenta?
             </x-link>
         </div>
         <x-primary-button class="w-full justify-center">
             {{ __('Entrar') }}
         </x-primary-button>
     </form>
   </div>

</x-guest-layout>

