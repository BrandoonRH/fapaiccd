<div class="space-y-2">
    <div>
        <x-input-label for="anexo_uno" :value="__('Anexo 1:')" />
        <input 
            type="file" 
            wire:model="anexouno_nuevo" 
            id="anexo_uno"
            class="block w-full mt-1  border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'"
            accept="application/pdf"
        >
        @error('form.anexo_uno')
           <x-input-error :messages="'El Archivo Anexo 1 es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="anexo_dos" :value="__('Anexo 2:')" />
        <input 
            type="file" 
            wire:model="anexodos_nuevo" 
            id="anexo_dos"
            class="block w-full mt-1  border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'"
            accept="application/pdf"
        >
        @error('form.anexo_dos')
           <x-input-error :messages="'El Archivo Anexo 2 es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="anexo_tres" :value="__('Anexo 3:')" />
        <input 
            type="file" 
            wire:model="anexotres_nuevo" 
            id="anexo_tres"
            class="block w-full mt-1  border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'"
            accept="application/pdf"
        >
        @error('form.anexo_tres')
           <x-input-error :messages="'El Archivo Anexo 3 es requerido'" class="mt-1" />
        @enderror
    </div>
    <div>
        <x-input-label for="presentacion_proyecto_nuevo" :value="__('Presentación Proyecto:')" />
        <input 
            type="file" 
            wire:model="presentacion_proyecto_nuevo" 
            id="presentacion_proyecto_nuevo"
            class="block w-full mt-1  border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            accept="application/pdf"
        >
        @error('presentacion_proyecto_nuevo')
           <x-input-error :messages="'El Archivo del Proyecto es requerido'" class="mt-1" />
        @enderror
    </div>
</div>