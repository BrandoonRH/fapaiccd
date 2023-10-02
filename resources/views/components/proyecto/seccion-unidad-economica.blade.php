<div class="space-y-2">
    
    <h2 class="text-white text-xl font-bold text-center">Información de la Unidad Económica</h2>
    
    <div>
        <x-input-label for="" :value="__('Seleccione las áreas a las que pertenece su proyecto:')" />
        <div class="grid grid-cols-2 gap-1 overflow-y-auto h-96">
            @foreach ($areas as $area)
                <p
                    wire:key="{{ $area->id }}"
                    wire:click="addAreaSelected('{{ $area->area }}')"
                    class=" hover:-translate-y-2 hover:scale-110 duration-150 hover:bg-white cursor-pointer transition ease-in-out delay-150 hover:text-black p-2 font-bold text-center m-2 rounded-md text-sm {{ in_array($area->area, $areasSeleccionadas) ? 'bg-white text-black' : 'bg-indigo-600 text-white' }}"
                >
                     {{ $area->area }}
                 </p>
            @endforeach
        </div>
    
        <div class= "mt-3">
            <x-input-label :value="__('Áreas Seleccionadas:')" />
            <div>
                @if(count($areasSeleccionadas) > 0)
                    <ul class="">
                        @foreach($areasSeleccionadas as $area)
                            <li   class="text-center font-bold list-decimal">{{ $area }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No se han seleccionado áreas</p>
                @endif
                @error('form.areasSeleccionadas')
                 <x-input-error :messages="'Selecciona almenos una área'" class="mt-1" />
                @enderror
            </div>
        </div>
    </div>

    <div>
        <x-input-label for="pertenece" :value="__('¿Pertenece a alguna Cámara o Asociación del sector?')" />
        <div class="flex justify-around">
            <div>
                <label>
                    <input type="radio" @if($modoEdicion) {{ $form->pertenece_asc ? 'checked' : '' }} @endif wire:click="toggleEstadoPertenece(true)" value="si" name="pertenece_option" id="radio_si">
                    Sí
                </label>
            </div>
    
            <div>
                <label>
                    <input type="radio" @if($modoEdicion) {{ !$form->pertenece_asc ? 'checked' : '' }} @endif wire:click="toggleEstadoPertenece" value="no" name="pertenece_option" id="radio_no">
                    No
                </label>
            </div>
        </div>
        <div class="mt-5 {{ $form->pertenece_asc ? '' : 'hidden' }}" id="nombres_asc_container">
            <x-input-label for="nombres_asc" :value="__('Nombre de la Cámara o Asociación')" />
            <textarea wire:model="form.nombres_asc" 
                      placeholder="Nombr(s) de las cámaras o asociaciones a la que pertenecen"
                      class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-20 "
            ></textarea>
            @error('form.nombres_asc')
                <x-input-error :messages="'Si seleccionó Sí, ingrese los nombres'" class="mt-1" />
            @enderror
        </div>
        @error('form.pertenece_asc')
            <x-input-error :messages="'Seleccione una Opción'" class="mt-1" />
        @enderror
    </div>
    

    <div>
        <x-input-label for="nombre_rs" :value="__('Nombre o Razón Social:')" />
        <x-text-input 
            id="nombre_rs"  
            class="block mt-1 w-full" 
            type="text" 
            wire:model="form.nombre_rs" 
            :value="old('nombre_rs')" 
            placeholder="Nombre o Razón Social de tu Empresa"
        />
        @error('form.nombre_rs')
             <x-input-error :messages="'El campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="regitro_patronal" :value="__('Registro Patronal:')" />
        <x-text-input 
            id="regitro_patronal"  
            class="block mt-1 w-full" 
            type="text" 
            wire:model="form.regitro_patronal" 
            :value="old('form.regitro_patronal')" 
            placeholder="Registro Patronal de tu Empresa"
        />
        @error('form.regitro_patronal')
            <x-input-error :messages="'El campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="antiguedad" :value="__('Antiguedad de la Empresa:')" />
        <x-text-input 
            id="antiguedad"  
            class="block mt-1 w-full" 
            type="date" 
            wire:model="form.antiguedad" 
            :value="old('form.antiguedad')" 
            placeholder="Registro Patronal de tu Empresa"
        />
        @error('form.antiguedad')
            <x-input-error :messages="'El campo es requerido'" class="mt-1" />
        @enderror
    </div>

    <p class="text-md font-bold text-white my-3">Domicilio de la Empresa</p>

    <div >
        <x-input-label for="empresa_domicilio" :value="__('Ingrese el domicilio como se solicita:')" />
        <textarea wire:model="form.empresa_domicilio" 
                  placeholder="Calle, número, Código Postal, Colonia, Municipio, Estado."
                  class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-20"
        ></textarea>
        @error('form.empresa_domicilio')
             <x-input-error :messages="'El campo es requerido'" class="mt-1" />
        @enderror
    </div>

   

    <div>
        <x-input-label for="num_sucursales"  :value="__('Número de Sucursales:')" />
        <x-text-input 
            id="num_sucursales"  
            class="block mt-1 w-full" 
            type="number" 
            min="1"
            wire:model="form.num_sucursales" 
            :value="old('form.num_sucursales')" 
            placeholder="Número de sucursales que tiene la empresa"
        />
        @error('form.num_sucursales')
            <x-input-error :messages="'El campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="empresa_telefono" :value="__('Número de Teléfono:')" />
        <x-text-input 
            id="empresa_telefono"  
            class="block mt-1 w-full" 
            type="text" 
            pattern="[0-9]{10}"
            wire:model="form.empresa_telefono" 
            :value="old('form.empresa_telefono')" 
            placeholder="Ingresa un número de teléfono válido de 10 dígitos"
        />
        @error('form.empresa_telefono')
            <x-input-error :messages="'El campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="empresa_url" :value="__('Página WEB:')" />
        <x-text-input 
            id="empresa_url"  
            class="block mt-1 w-full" 
            type="text" 
            wire:model="form.empresa_url" 
            :value="old('form.empresa_url')" 
            placeholder="Ejemplo: https://ciudadcreativadigital.mx/"
        />
        @error('form.empresa_url')
            <x-input-error :messages="'El campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="empleados_directos" :value="__('Número de empleados directos (IMSS):')" />
        <x-text-input 
            id="empleados_directos"  
            class="block mt-1 w-full" 
            type="number" 
            wire:model="form.empleados_directos" 
            :value="old('form.empleados_directos')" 
            placeholder="Empleados registrados en el IMSS"
        />
        @error('form.empleados_directos')
            <x-input-error :messages="'El campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="empleados_indirectos" :value="__('Número de empleados indirectos (freelancer o temporales):')" />
        <x-text-input 
            id="empleados_indirectos"  
            class="block mt-1 w-full" 
            type="number" 
            wire:model="form.empleados_indirectos" 
            :value="old('form.empleados_indirectos')" 
            placeholder="Empleados contratados temporalmente"
        />
        @error('form.empleados_indirectos')
             <x-input-error :messages="'El campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="empresa_ventas" :value="__('Ventas anuales en USD:')" />
        <x-text-input 
            id="empresa_ventas"  
            class="block mt-1 w-full" 
            type="number" 
            wire:model="form.empresa_ventas" 
            :value="old('form.empresa_ventas')" 
            placeholder="Para personas morales"
        />
        @error('form.empresa_ventas')
            <x-input-error :messages="'El campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="empresa_servicios" :value="__('Servicios que ofrece:')" />
        <x-text-input 
            id="empresa_servicios"  
            class="block mt-1 w-full" 
            type="text" 
            wire:model="form.empresa_servicios" 
            :value="old('form.empresa_servicios')" 
            placeholder="Ejemplo: Capacitación, Producción, Diseño de Contenido etc. "
        />
         @error('form.empresa_servicios')
             <x-input-error :messages="'El campo es requerido'" class="mt-1" />
        @enderror
    </div>
</div>
@push('scripts')
<script>
  (() => {
    // Obtener referencias a los elementos HTML
    const radioSi = document.getElementById('radio_si');
        const radioNo = document.getElementById('radio_no');
        const nombresAscContainer = document.getElementById('nombres_asc_container');

        // Agregar un evento de cambio a los radio buttons
        radioSi.addEventListener('change', function() {
            if (this.checked) {
                nombresAscContainer.classList.remove('hidden');
            }
        });
        radioNo.addEventListener('change', function() {
            if (this.checked) {
                nombresAscContainer.classList.add('hidden');
            }
        });
  })()
</script>
@endpush