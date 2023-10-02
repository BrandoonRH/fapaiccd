<div>
    <h2 class="text-white text-xl font-bold text-center">Alto Impacto a la Industria Creativa Digital de Jalisco</h2>
    <div>
        <x-input-label for="areas" :value="__(' Para que se considere un proyecto de alto impacto deberá garantizar al menos uno:')"/>
        <div class="">
            @foreach ($opcionesImpacto as $opcion)
                <label class="">
                    <input type="checkbox" wire:model="form.impacto_opciones" value="{{ $opcion->descripcion }}" class="mr-2 rounded-full">
                    {{ $opcion->descripcion }}
                </label><br>
            @endforeach
        </div>
        @error('form.impacto_opciones')
            <x-input-error :messages="'Seleccione al menos una opción'" class="mt-1" />
        @enderror
    </div>
</div>
