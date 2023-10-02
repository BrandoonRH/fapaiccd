<x-app-layout>
    
    <div class="py-12 h-screen overflow-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white  dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" text-gray-900 dark:text-gray-100">
                    
                    <h1 class="text-4xl mt-4 font-bold text-center mb-10">
                        Editar Proyecto: {{$project->nombre_proyecto}}
                    </h1>

                  <div class="md:flex md:justify-center p-5">
                    <livewire:edit-project
                        :project="$project"
                    />
                  </div>
                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>