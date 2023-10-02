<div class="space-y-3">
    <h2 class="text-white text-xl font-bold text-center">Características del Incentivo Económico Solicitado</h2>

    <div class="md:grid md:grid-cols-3  md:gap-1 mt-5">
        <div>
            <x-input-label class="text-center" for="equipamiento_1" :value="__('Equipo Especializado:')"/>
            <x-text-input 
                id="equipamiento_1"  
                class="block mt-1 w-full" 
                type="number" 
                wire:model="form.equipamiento_1" 
                @blur="$wire.sumaTotalProyecto"
                placeholder="$"
            />
        </div>
        <div>
            <x-input-label  class="text-center" for="equipamiento_2" :value="__('Herramientas Técnicas:')"/>
            <x-text-input 
                id="equipamiento_2"  
                class="block mt-1 w-full" 
                type="number" 
                wire:model="form.equipamiento_2" 
                @blur="$wire.sumaTotalProyecto"
                placeholder="$"
            />
        </div>
        <div>
            <x-input-label  class="text-center" for="equipamiento_3" :value="__('Software:')"/>
            <x-text-input 
                id="equipamiento_1"  
                class="block mt-1 w-full" 
                type="number" 
                wire:model="form.equipamiento_3" 
                @blur="$wire.sumaTotalProyecto"
                placeholder="$"
            />
        </div>
    </div>


    
    <div class="md:grid md:grid-cols-3 md:gap-1 mt-5">
        <div>
            <x-input-label class="text-center" for="capacitacion_1" :value="__('Especialización:')"/>
            <x-text-input 
                id="capacitacion_1"  
                class="block mt-1 w-full" 
                type="number" 
                wire:model="form.capacitacion_1" 
                @blur="$wire.sumaTotalProyecto"
                placeholder="$"
            />
        </div>
        <div>
            <x-input-label  class="text-center" for="capacitacion_2" :value="__('Certificaciones:')"/>
            <x-text-input 
                id="capacitacion_2"  
                class="block mt-1 w-full" 
                type="number" 
                wire:model="form.capacitacion_2" 
                @blur="$wire.sumaTotalProyecto"
                placeholder="$"
            />
        </div>
        <div>
            <x-input-label  class="text-center" for="capacitacion_3" :value="__('Consultoría:')"/>
            <x-text-input 
                id="capacitacion_3"  
                class="block mt-1 w-full" 
                type="number" 
                wire:model="form.capacitacion_3" 
                @blur="$wire.sumaTotalProyecto"
                placeholder="$"
            />
        </div>
    </div>

    <div class="">
        <x-input-label class="text-center" for="participacion_1" :value="__('Participación en eventos, concursos, festivales,
        congresos nacionales e internacionales:')"/>
        <x-text-input 
                id="participacion_1"  
                class="block mt-1 w-2/5 mx-auto" 
                type="number" 
                wire:model="form.participacion_1" 
                @blur="$wire.sumaTotalProyecto"
                placeholder="$"
            />
    </div>
    
    @error('form.incentivos')
     <x-input-error :messages="'Agregue al menos una cantidad para incentivo'" class="mt-1" />
    @enderror

    <div class="">
        <x-input-label  class="text-center" for="total_proyecto" :value="__('Valor total de su Proyecto:')"/>
        <p class="text-center p-1  bg-slate-600 rounded-md">$ {{ number_format($form->total_proyecto, 2, '.', ',') }}</p>
    </div>
    <div class="md:grid md:grid-cols-2 gap-1 items-center">
        <div>
            <x-input-label  class="text-center" for="porcentaje" :value="__('Porcentaje de la Agencia:')"/>
            <select  wire:model="form.porcentaje_fondo" id="porcentaje" class="w-full text-center border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option @click="$wire.porcentajeFondo" value="">--seleccione--</option>
                <option @click="$wire.porcentajeFondo" value="10">10%</option>
                <option @click="$wire.porcentajeFondo" value="20">20%</option>
                <option @click="$wire.porcentajeFondo" value="30">30%</option>
                <option @click="$wire.porcentajeFondo" value="40">40%</option>
                <option @click="$wire.porcentajeFondo" value="50">50%</option>
                <option @click="$wire.porcentajeFondo" value="60">60%</option>
                <option @click="$wire.porcentajeFondo" value="70">70%</option>
                <option @click="$wire.porcentajeFondo" value="80">80%</option>
            </select>
            @error('form.porcentaje_fondo')
            <x-input-error :messages="'Seleccione un Porcentaje'" class="mt-1" />
            @enderror
        </div>
        <div class=" md:mx-auto">
            <x-input-label  class="text-center" for="total_fondo" :value="__('Monto aportado por la Agencia:')"/>
            <p class="text-center p-1  bg-slate-600 rounded-md">$ {{ number_format($form->total_fondo, 2, '.', ',') }}</p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-2 gap-1 items-center">
        <x-input-label  class="text-center" for="concurrente" :value="__('Monto aportado por la Empresa:')"/>
        <p class=" md:mx-auto text-center p-1 md:w-60 w-full bg-slate-600 rounded-md">$ {{ number_format($form->total_empresa, 2, '.', ',') }}</p>
    </div>
</div>


