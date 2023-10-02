<div>
   <div class="flex justify-between mb-4">
    <p class="text-white font-bold text-md">Clientes Agregados: <span>{{count($form->clientes)}}</span> </p>
    <x-primary-button type="button" wire:click="eliminarClientes"  class="p-1">
        {{ __('Eliminar Clientes') }}
    </x-primary-button>
   </div>
    <h2 class="text-white text-xl font-bold text-center">Referencias Comerciales de clientes</h2>
    <div class="md:grid md:grid-cols-2 md:gap-1 mt-3">
        <div class="mb-4">
            <x-input-label for="cliente_nombre" :value="__('Nombre del Cliente')" />
            <x-text-input 
            id="cliente_nombre" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="form.nuevoCliente.cliente_nombre"
            placeholder="Nombre completo"
           
            />
          
        </div>
        <div class="mb-4">
            <x-input-label for="cliente_empresa" :value="__('Empresa')" />
            <x-text-input 
            id="cliente_empresa"  
            class="block mt-1 w-full" 
            type="text" 
            wire:model="form.nuevoCliente.cliente_empresa"
            placeholder="Nombre de la empresa"
            />
          
        </div>
        <div class="mb-4">
            <x-input-label for="cliente_telefono" :value="__('Teléfono')" />
            <x-text-input 
            id="cliente_telefono"  
            class="block mt-1 w-full" 
            type="text" 
            wire:model="form.nuevoCliente.cliente_telefono"
            placeholder="Teléfono de la empresa"
            />
          
        </div>
        <div class="mb-4">
            <x-input-label for="cliente_correo" :value="__('Correo')" />
            <x-text-input 
            id="cliente_correo"  
            class="block mt-1 w-full" 
            type="text" 
            wire:model="form.nuevoCliente.cliente_correo"
            placeholder="Correo electrónico"
            />
          
        </div>
        <div class="mb-4">
            <x-input-label for="cliente_url" :value="__('Página web:')" />
            <x-text-input 
            id="cliente_url"  
            class="block mt-1 w-full" 
            type="text" 
            wire:model="form.nuevoCliente.cliente_url"
            placeholder="url de la página web"
            />
          
        </div>
        @error('form.nuevoCliente')
            <x-input-error :messages="'Campos Faltantes para Agregar Cliente'" class="mt-1" />
        @enderror
    </div>
    <x-primary-button type="button" wire:click="agregarCliente" class="p-1 rounded-full" title="Agregar Cliente">
        Agregar
    </x-primary-button>
    @error('form.clientes')
        <x-input-error :messages="'Agregue al menos un cliente'" class="mt-1" />
    @enderror
</div>

@push('scripts')
   
  
    <script>
       (() => {
        document.getElementById('cliente_nombre').value = '';
        document.getElementById('cliente_empresa').value = '';
        document.getElementById('cliente_telefono').value = '';
        document.getElementById('cliente_correo').value = '';
        document.getElementById('cliente_url').value = '';

        document.addEventListener('livewire:initialized', () => {

            @this.on('clienteAgregado', (event) => {   
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Se agrego el cliente',
                    showConfirmButton: false,
                    timer: 1500
                });
            });
            @this.on('clientesVacios', (event) => {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'No hay clientes que eliminar',
                    showConfirmButton: false,
                    timer: 1500
                });
               
            });
            @this.on('clientesEliminados', (event) => {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Se Eliminaron los Clientes',
                    showConfirmButton: false,
                    timer: 1500
                });
               
            });
            @this.on('faltanCampos', (event) => {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Faltan Campos por Llenar',
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        });
        
       })()
    </script>
@endpush

