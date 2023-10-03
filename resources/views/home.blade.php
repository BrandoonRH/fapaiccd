<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
        @push('styles')
             <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        @endpush
    </head>
    <body class="">
        <div class="relative h-full w-full bg-no-repeat bg-center bg-fixed bg-cover" style="background-image: url('/images/pcc-inicio.webp');">
            <div class="bg-black w-full h-full lg:bg-opacity-75 overflow-auto">

                <nav class="px-12 py-5 md:flex md:justify-between md:items-center md:space-y-0 space-y-10">
                    <div class="flex justify-start">
                        <img src={{"/images/CCD-LogoV3.svg"}}  alt="Logo" class="h-12"/>
                        <img src={{"/images/Apoyo_Alto_Impacto_1.webp"}} alt="Logo fondo" class="h-12"/>
                    </div>
                    @if (Route::has('login'))
                        <div class="flex justify-center">
                            @auth
                                <a wire:navigate href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Panel</a>
                            @else
                                <a wire:navigate href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar Sesión</a>

                                @if (Route::has('register'))
                                    <a wire:navigate href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrarse</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </nav>

                    <div class="flex justify-center">
                        <div class="px-16 py-10 self-center mt-2 rounded-md w-full ">
                            <h2 class="text-4xl text-white mb-8 font-semibold">¿Que es el Fondo de Apoyo a Proyectos de Alto Impacto a la Industria Creativa Digital (FAPAI)?</h2>
                            
                            <div class="md:flex md:justify-between md:items-center md:gap-5 space-y-5">
                    
                                    <img class="w-60 mx-auto" src={{"/images/Pagina_web_Circle.webp"}} alt="">

                                <p class="text-white">
                                    ¿Tienes una empresa creativa digital en Jalisco y quieres llevarla al siguiente nivel? ¡Entonces esta convocatoria es para ti! Participa en el FAPAI y obtén hasta 1 millón de pesos para equipar, capacitar o promocionar tu proyecto. <br>
                                    El objetivo del Fondo de Apoyo a Proyectos de Alto Impacto a la Industria Creativa Digital de Jalisco (FAPAI) es impulsar el crecimiento y la competitividad de este sector en el estado, apoyando iniciativas innovadoras que aporten valor al ecosistema.
                                </p>
                            </div>

                            <div class="mt-10 md:grid md:grid-cols-3 md:gap-4 text-white">
                                <div class=" p-3 text-center rounded-md hover:bg-white hover:text-black transition-all hover:-translate-y-5">
                                    <p class="text-2xl font-bold">Equipamiento</p>
                                    <p>E.1. Adquisición de equipo especializado</p>
                                    <p>E.2. Herramientas técnicas</p>
                                    <p>E.3. Software</p>
                                </div>
                                <div class=" p-3 text-center rounded-md hover:bg-white hover:text-black transition-all hover:-translate-y-5">
                                    <p class="text-2xl font-bold">Capacitación</p>
                                    <p>C.1. Especialización de capital humano</p>
                                    <p>C.2. Certificaciones</p>
                                    <p>C.3. Consultoría</p>
                                </div>
                                <div class=" p-3 text-center rounded-md hover:bg-white hover:text-black transition-all hover:-translate-y-5">
                                    <p class="text-2xl font-bold">Promoción</p>
                                    <p>P.1 Participación de unidades económicas del sector creativo de Jalisco , legalmente constituidas, en eventos, concursos, festivales, congresos nacionales e internacionales del sector Creativo Digital </p>
                                </div>                               
                            </div>

                            <div class="mt-3 p-5">
                                <h3 class="text-center text-white text-3xl font-extrabold ">Descargar los archivos necesarios</h3>
                                <div class="flex flex-col  lg:flex-row lg:justify-between w-full mt-5 lg:items-baseline space-y-3 text-center">

                                    <a  href="{{ route('downloadConvocatoria') }}"  class="p-2 bg-white rounded-md font-bold hover:bg-black hover:text-white transition-all hover:-translate-y-1 duration-300 cursor-pointer">Convocatoria</a>
                                    <a  href="{{ route('downloadAnexoUno') }}"  class="p-2 bg-white rounded-md font-bold hover:bg-black hover:text-white transition-all hover:-translate-y-1 duration-300 cursor-pointer">Anexo 1 - Postulación</a>
                                    <a  href="{{ route('downloadAnexoDos') }}"  class="p-2 bg-white rounded-md font-bold hover:bg-black hover:text-white transition-all hover:-translate-y-1 duration-300 cursor-pointer">Anexo 2 - Compromiso</a>
                                    <a  href="{{ route('downloadAnexoTres') }}" class="p-2 bg-white rounded-md font-bold hover:bg-black hover:text-white transition-all hover:-translate-y-1 duration-300 cursor-pointer">Anexo 3 - Currículo</a>
                                    <a  href="{{ route('downloadLineamientos') }}" class="p-2 bg-white rounded-md font-bold hover:bg-black hover:text-white transition-all hover:-translate-y-1 duration-300 cursor-pointer">Lineamientos</a>

                                </div>
                            </div>
                          </div>
                    </div>

            </div>
        </div>
    </body>
</html>
