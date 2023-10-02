<form wire:submit="save"  class="md:w-1/2 space-y-5 ">
   
    @include('components.proyecto.seccion-proyecto')
    @include('components.proyecto.seccion-unidad-economica')
    @include('components.proyecto.seccion-incentivo-economico')
    @include('components.proyecto.seccion-impacto-industria')
    @include('components.proyecto.seccion-referencias')
    @include('components.proyecto.seccion-representante-legal')
    @include('components.proyecto.seccion-subir-anexos')

       
    <x-primary-button type="submit"  class="w-full justify-center">
        {{ __('Registrar') }}
    </x-primary-button>
    
</form> 
