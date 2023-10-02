<x-app-layout>
    @if (session()->has('message'))
        <p class="w-4/12 mx-auto rounded-md text-center uppercase border text-sm border-green-600 bg-green-200 text-green-800 font-bold p-2 my-3">
            {{session('message')}}
        </p>
    @endif
    @if(session('showSweetAlert'))
        <script>
            Swal.fire(@json(session('sweetAlertOptions')));
        </script>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">
            <div class="dark:bg-gray-800 rounded-2xl ">
                <h2 class="text-white font-bold text-3xl p-3 text-center">Proyecto Registrado</h2>
                <livewire:show-projects>
            </div>

            <div class="dark:bg-gray-800 rounded-2xl h-96">
                <h2 class="text-white font-bold text-3xl p-3 text-center">Otro Asunto</h2>
              
            </div>
        
        </div>
    </div>
</x-app-layout>