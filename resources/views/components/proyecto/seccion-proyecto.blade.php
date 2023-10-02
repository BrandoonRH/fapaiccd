<div >
    <h2 class="text-white text-xl font-bold text-center">Proyecto</h2>
    <div>
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="">Folio: {{$form->folio}}</label>
        @error('form.folio')
        <x-input-error :messages="$message" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="fecha_registro" :value="__('Fecha de Registro:')"/>
        <input type="date" wire:model="form.fecha_registro"  id="fecha_registro" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        @error('form.fecha_registro')
             <x-input-error :messages="'La fecha es requerida'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="nombre_proyecto" :value="__('Nombre del Proyecto:')" />
        <x-text-input 
            id="nombre_proyecto"  
            class="block mt-1 w-full" 
            type="text" 
            wire:model="form.nombre_proyecto"
            :value="old('form.nombre_proyecto')" 
            placeholder="Ejem: Animación 3D para Stop Motion"
        />
        @error('form.nombre_proyecto')
           <x-input-error :messages="$message" class="mt-1" />
        @enderror
    </div>
</div>

