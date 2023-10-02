<div class="space-y-3">
    <h2 class="text-white text-xl font-bold text-center">Información Representante Legal</h2>

    <div>
        <x-input-label for="solicitante_tipo" :value="__('Tipo de solicitante')" />
        <select wire:model="form.solicitante_tipo" id="solicitante_tipo" class="w-full text-center border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="" cla>--Seleccione--</option>
            @foreach ($tipos as $tipo)
                    <option value={{$tipo->id}}>{{$tipo->tipo}}</option>
            @endforeach
        </select>
        @error('form.solicitante_tipo')
        <x-input-error :messages="'Selecciona una Opción'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="solicitante_nombres" :value="__('Nombre(s)')" />
        <x-text-input 
            id="solicitante_nombres"  
            class="block mt-1 w-full" 
            type="text" 
            wire:model="form.solicitante_nombres" 
            :value="old('solicitante_nombres')" 
            placeholder="Nombres del Representante lega"
        />
        @error('form.solicitante_nombres')
          <x-input-error :messages="'El Campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="solicitante_apellidos" :value="__('Apellidos')" />
        <x-text-input 
            id="solicitante_apellidos"  
            class="block mt-1 w-full" 
            type="text" 
            wire:model="form.solicitante_apellidos" 
            :value="old('solicitante_apellidos')" 
            placeholder="Apellidos del Representante legal"
        />
        @error('form.solicitante_apellidos')
             <x-input-error :messages="'El Campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="solicitante_sexo" :value="__('SEXO')" />
        <select wire:model="form.solicitante_sexo" id="solicitante_sexo" class="w-full text-center border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="" selected>-- Seleccione --</option>
            <option value="M">Mujer</option>
            <option value="H">Hombre</option>
            <option value="OTRO">Otro</option>
        </select>
        @error('form.solicitante_sexo')
             <x-input-error :messages="'El Campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="solicitante_nacimiento" :value="__('Fecha de Nacimiento')" />
        <input type="date" wire:model="form.solicitante_nacimiento" id="solicitante_nacimiento" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        @error('form.solicitante_nacimiento')
             <x-input-error :messages="'El Campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="solicitante_nacionalidad" :value="__('Nacionalidad')" />
        <x-text-input 
            id="solicitante_nacionalidad"  
            type="text" 
            class="w-full"
            wire:model="form.solicitante_nacionalidad" 
            :value="old('solicitante_nacionalidad')" 
            placeholder="Mexicano, Colombiano, Estadounidense"
        />
        @error('form.solicitante_nacionalidad')
             <x-input-error :messages="'El Campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="solicitante_pais" :value="__('País de Nacimiento')" />
        <x-text-input 
            id="solicitante_pais"  
            type="text" 
            class="w-full"
            wire:model="form.solicitante_pais" 
            :value="old('solicitante_pais')" 
            placeholder="Mexico, Colombia, USA, Argentina"
        />
        @error('form.solicitante_pais')
             <x-input-error :messages="'El Campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="solicitante_iden" :value="__('Identificación Oficial ')" />
        <x-text-input 
            id="solicitante_iden"  
            type="text" 
            class="w-full"
            wire:model="form.solicitante_iden" 
            :value="old('solicitante_iden')" 
            placeholder="Número de Identificación Oficial"
        />
        @error('form.solicitante_iden')
             <x-input-error class="block" :messages="'El Campo es requerido'" class="mt-1" />
        @enderror
    </div>
    <div >
        <x-input-label for="solicitante_correo" :value="__('Correo electrónico')" />
        <x-text-input 
            id="solicitante_correo"  
            type="email" 
            class="w-full"
            wire:model="form.solicitante_correo" 
            :value="old('solicitante_correo')" 
            placeholder="correo@gmail.com"
        />
        @error('form.solicitante_correo')
            <x-input-error class="" :messages="'El Campo es requerido'" class="mt-1" />
        @enderror
    </div>

    <div>
        <x-input-label for="pertenece" :value="__('¿Pertenece a alguna población indígena?')" />
        <div class="flex justify-around">
            <div>
                <input type="radio" @if($modoEdicion) {{ $form->solicitante_preguntauno ? 'checked' : '' }} @endif value="si" wire:click="togglePreguntaUno(true)" name="option_preguntauno" id="si_preguntauno" >
                <label for="si">Sí</label>
            </div>
    
            <div>
                <input type="radio" @if($modoEdicion) {{ !$form->solicitante_preguntauno ? 'checked' : '' }} @endif value="no" wire:click="togglePreguntaUno"  name="option_preguntauno" id="no_preguntauno" >
                <label for="no">No</label>
            </div>
        </div>
        <div class="mt-5 {{ $form->solicitante_preguntauno ? '' : 'hidden' }}" id="container_preguntauno">
            <x-input-label for="solicitante_respuestauno" :value="__('¿Cuál?')" />
            <textarea wire:model="form.solicitante_respuestauno" 
                      placeholder="Nombre de la población indígena"
                      class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-20 {{ $form->solicitante_preguntauno ? '' : 'hidden' }}"
            ></textarea>
            @error('form.solicitante_respuestauno')
                 <x-input-error :messages="'Si la respuesta fue Si, responda'" class="mt-1" />
            @enderror
        </div>  
        @error('form.solicitante_preguntauno')
             <x-input-error :messages="'Seleccione Si o No'" class="mt-1" />
        @enderror
    </div>

    <div >
        <x-input-label for="pertenece" :value="__('¿Vive con alguna discapacidad?')" />
        <div class="flex justify-around">
            <div>
                <input type="radio" @if($modoEdicion) {{ $form->solicitante_preguntados ? 'checked' : '' }} @endif value="si" wire:click="togglePreguntaDos(true)" name="option_preguntados" id="si_preguntados"  >
                <label for="si">Sí</label>
            </div>
    
            <div>
                <input type="radio" @if($modoEdicion) {{ !$form->solicitante_preguntados ? 'checked' : '' }} @endif value="no" wire:click="togglePreguntaDos"  name="option_preguntados" id="no_preguntados"   >
                <label for="no">No</label>
            </div>
        </div>
        <div class="mt-5 {{ $form->solicitante_preguntados ? '' : 'hidden' }}" id="container_preguntados">
            <x-input-label for="solicitante_respuestados" :value="__('¿Cuál?')" />
            <textarea wire:model="form.solicitante_respuestados" 
                      placeholder="Describa su discapacidad"
                      class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-20"
            ></textarea>
            @error('form.solicitante_respuestados')
                <x-input-error :messages="'Si la respuesta fue Si, responda'" class="mt-1" />
             @enderror
        </div>  
        @error('form.solicitante_preguntados')
            <x-input-error :messages="'Seleccione Si o No'" class="mt-1" />
        @enderror
    </div>

    <div >
        <x-input-label for="pertenece" :value="__('¿Es usted beneficiario de algún programa económico similar en este momento?')" />
        <div class="flex justify-around">
            <div>
                <input type="radio" @if($modoEdicion) {{ $form->solicitante_preguntatres ? 'checked' : '' }} @endif value="si" wire:click="togglePreguntaTres(true)" name="option_preguntatres" id="si_preguntatres"  >
                <label for="si">Sí</label>
            </div>
    
            <div>
                <input type="radio" @if($modoEdicion) {{ !$form->solicitante_preguntatres ? 'checked' : '' }} @endif value="no" wire:click="togglePreguntaTres"  name="option_preguntatres" id="no_preguntatres"  >
                <label for="no">No</label>
            </div>
        </div>
        <div   class="mt-5 {{ $form->solicitante_preguntatres ? '' : 'hidden' }}" id="container_preguntatres">
            <x-input-label for="solicitante_respuestatres" :value="__('¿Cuál?')" />
            <textarea wire:model="form.solicitante_respuestatres" 
                      placeholder="Nombre del Programa"
                      class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-20"
            ></textarea>
            @error('form.solicitante_respuestatres')
                 <x-input-error :messages="'Si la respuesta fue Si, responda'" class="mt-1" />
            @enderror
        </div>  
        @error('form.solicitante_preguntatres')
             <x-input-error :messages="'Seleccione Si o No'" class="mt-1" />
        @enderror
    </div>
    
    <div >
        <x-input-label for="solicitante_domicilio" :value="__('Domicilio del Solicitante')" />
        <textarea 
                  id="solicitante_domicilio"  
                  wire:model="form.solicitante_domicilio"
                  placeholder="Calle, número, Código Postal, Colonia, Municipio, Estado."
                  class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-20"
        ></textarea>
        @error('form.solicitante_domicilio')
          <x-input-error :messages="'El campo es requerido'" class="mt-1" />
         @enderror
    </div>

    <div>
        <x-input-label for="form.solicitante_telefono" :value="__('Número de Teléfono:')" />
        <x-text-input 
            id="solicitante_telefono"  
            class="w-full"
            type="text" 
            wire:model="form.solicitante_telefono"
            :value="old('form.solicitante_telefono')" 
            placeholder="Ingresa un número de teléfono de 10 dígitos"
        />
        @error('form.solicitante_telefono')
        <x-input-error :messages="'El campo es requerido'" class="mt-1" />
       @enderror
    </div>
</div>
@push('scripts')
<script>
  (() => {
  // Obtener referencias a los elementos HTML
    const siPreguntauno = document.getElementById('si_preguntauno');
    const noPreguntauno = document.getElementById('no_preguntauno');
    const containerPreguntaUno = document.getElementById('container_preguntauno');

    const siPreguntados = document.getElementById('si_preguntados');
    const noPreguntados = document.getElementById('no_preguntados');
    const containerPreguntaDos = document.getElementById('container_preguntados');

    const siPreguntatres = document.getElementById('si_preguntatres');
    const noPreguntatres = document.getElementById('no_preguntatres');
    const containerPreguntaTres = document.getElementById('container_preguntatres');

    // Pregunta 1
    siPreguntauno.addEventListener('change', function() {
        if (this.checked) {
            containerPreguntaUno.classList.remove('hidden');
        }
    });
    noPreguntauno.addEventListener('change', function() {
        if (this.checked) {
            containerPreguntaUno.classList.add('hidden');
        }
    });

    // Pregunta 2
    siPreguntados.addEventListener('change', function() {
        if (this.checked) {
            containerPreguntaDos.classList.remove('hidden');
        }
    });
    noPreguntados.addEventListener('change', function() {
        if (this.checked) {
            containerPreguntaDos.classList.add('hidden');
        }
    });

    // Pregunta 3
    siPreguntatres.addEventListener('change', function() {
        if (this.checked) {
            containerPreguntaTres.classList.remove('hidden');
        }
    });
    noPreguntatres.addEventListener('change', function() {
        if (this.checked) {
            containerPreguntaTres.classList.add('hidden');
        }
    });

  })()
</script>
@endpush