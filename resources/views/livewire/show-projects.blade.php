@php
    use Carbon\Carbon;
    Carbon::setLocale('es');
@endphp
<div class="overflow-y-auto h-96 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($projects as $project)
        <div class="p-6 text-gray-900 dark:text-gray-100 border-white border m-2 rounded-md md:flex md:justify-between md:items-center">
            <div class="space-y-2">
            <h3 class="text-2xl text-white font-extrabold">{{$project->nombre_proyecto}}</h3>
            <p class="text-sm font-extrabold">Fecha de registro: {{ Carbon::parse($project->fecha_registro)->isoFormat('dddd D [de] MMMM [del] YYYY') }}</p>
            <p class="text-sm font-extrabold">Valor del Proyecto: ${{number_format($project->total_proyecto, 2, '.', ',')}}</p>
            </div>
            <div class="flex flex-col md:flex-row items-stretch gap-3  mt-5 md:mt-0 ">
            <a href="{{ route('pdf', ['project' => $project->id]) }}"
                class="bg-yellow-500 hover:bg-yellow-700 cursor-pointer py-2 px-4 rounded-lg text-center text-white text-xs font-extrabold uppercase"
            >PDF</a>
            <a href="{{ route('proyecto.edit', $project->id) }}"
                class="bg-sky-500 hover:bg-sky-700 cursor-pointer py-2 px-4 rounded-lg text-center text-white text-xs font-extrabold uppercase"
            >Editar</a>
            <a href="#"
                class="bg-red-500 hover:bg-red-700 cursor-pointer py-2 px-4 rounded-lg text-center text-white text-xs font-extrabold uppercase"
            >Eliminar</a>
            </div>    
        </div>
    @empty
        <p class="text-white text-center font-bold text-sm">No tienes proyectos Registrados</p>
    @endforelse 
    <div class="px-5  mt-10">
        {{$projects->links()}}
    </div>
</div>

