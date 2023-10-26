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
    </div>
</div>