<?php

namespace App\Livewire;

use App\Livewire\Forms\ProjectForm;
use App\Models\Applicant;
use App\Models\Area;
use App\Models\Opcion;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProject extends Component 
{
    use WithFileUploads;
    public ProjectForm $form; 
    public $alMenosUnoLleno = false; 
    public $folioGenerado;
    public $modoEdicion = false;

   
    public function rules()
    {
        return [
            'form.anexo_uno' => ['required', 'file', 'mimes:pdf'],
            'form.anexo_dos' => ['required', 'file', 'mimes:pdf'],
            'form.anexo_tres' => ['required', 'file', 'mimes:pdf'],
            'form.presentacion_proyecto' => ['required', 'file', 'mimes:pdf'],
        ];
    }

    public function toggleEstadoPertenece($value = false)
    {
        $this->form->pertenece_asc = $value;
    }
    public function togglePreguntaUno($value = false)
    {
        $this->form->solicitante_preguntauno = $value;
    }
    public function togglePreguntaDos($value = false)
    {
        $this->form->solicitante_preguntados = $value;
    }
    public function togglePreguntaTres($value = false)
    {
        $this->form->solicitante_preguntatres = $value;
    }

    public function addAreaSelected($area)
    {
        // Verificar si el área ya está seleccionada
        if (in_array($area, $this->form->areasSeleccionadas)) {
            // Eliminar el área del array si ya está seleccionada
            $this->form->areasSeleccionadas = array_diff($this->form->areasSeleccionadas, [$area]);
        } else {
            // Agregar el área al array si no está seleccionada
            $this->form->areasSeleccionadas[] = $area;
        }
    }

    public function isAreaSelected($area)
    {
        return in_array($area, $this->areasSeleccionadas);
    }

    public function mount()
    {
        // Obtén el último ID de proyecto en la base de datos
        $ultimoID = Project::max('id') ?? 0;
        
        // Genera el número de folio
        $this->folioGenerado = "FAPAI-24" . ($ultimoID + 1);
        
        // Asigna el número de folio al campo folio del formulario
        $this->form->folio = $this->folioGenerado;
        // Obtén la fecha actual y guárdala en la propiedad fecha_registro
        $this->form->fecha_registro = now()->format('Y-m-d');
    }


   //#[On('input')] 
    public function sumaTotalProyecto()
    {

        $incentivosSuma = [
            intval($this->form->equipamiento_1),
            intval($this->form->equipamiento_2),
            intval($this->form->equipamiento_3),
            intval($this->form->capacitacion_1),
            intval($this->form->capacitacion_2),
            intval($this->form->capacitacion_3),
            intval($this->form->participacion_1)
        ];
    
        // Agrega los valores al array $this->form->incentivos
        $this->form->incentivos = $incentivosSuma;
    
        // Calcula la suma total y guárdala en $this->form->total_proyecto
        $this->form->total_proyecto = array_sum($incentivosSuma);                      

    }

    public function porcentajeFondo()
    {
        $this->form->total_fondo = ($this->form->total_proyecto * $this->form->porcentaje_fondo) / 100; 
        $this->form->total_empresa = $this->form->total_proyecto - $this->form->total_fondo; 
    }

    public function agregarCliente()
    {
        // Validar los campos
        if (empty($this->form->nuevoCliente['cliente_nombre']) || empty($this->form->nuevoCliente['cliente_empresa']) || empty($this->form->nuevoCliente['cliente_telefono']) || empty($this->form->nuevoCliente['cliente_correo']) || empty($this->form->nuevoCliente['cliente_url'])) {
            // Al menos un campo está vacío, dispara el evento "faltanCampos"
            $this->dispatch('faltanCampos');
        } else {
            // los campos están llenos, agregar el nuevo cliente
            $this->form->clientes[] = $this->form->nuevoCliente;
            $this->form->nuevoCliente = [
                'cliente_nombre' => '',
                'cliente_empresa' => '',
                'cliente_telefono' => '',
                'cliente_correo' => '',
                'cliente_url' => '',
            ];

            // Disparar evento 'clienteAgregado'
            $this->dispatch('clienteAgregado');
        }
         
    }
    public function eliminarClientes(){
        if (empty($this->form->clientes)) {
            // El arreglo ya está vacío, dispara el evento "clientesVacios"
            $this->dispatch('clientesVacios');
        } else {
            // El arreglo no está vacío, vacíalo y luego dispara "clientesEliminados"
            $this->form->clientes = [];
            $this->dispatch('clientesEliminados');
        }
    }
   
    public function save()
    {
        
        //dd($validateion); 
        /*if($this->getErrorBag()->any()){
            $this->dispatch('faltanCampos');
        }*/
        $data = $this->form->validate(); 
    
        // Almacenar los archivos PDF en subcarpetas por folio
        $folioSubcarpeta = 'proyectos/anexos/' . $this->form->folio;

        $anexo_uno = $this->form->anexo_uno->store($folioSubcarpeta);
        $name_anexo_uno = str_replace("$folioSubcarpeta/", '', $anexo_uno);

        $anexo_dos = $this->form->anexo_dos->store($folioSubcarpeta);
        $name_anexo_dos = str_replace("$folioSubcarpeta/", '', $anexo_dos);

        $anexo_tres = $this->form->anexo_tres->store($folioSubcarpeta);
        $name_anexo_tres = str_replace("$folioSubcarpeta/", '', $anexo_tres);

        $presentacion_proyecto = $this->form->presentacion_proyecto->store('proyectos/presentaciones/' . $this->form->folio);
        $name_presentacion_proyecto = str_replace('proyectos/presentaciones/' . $this->form->folio . '/', '', $presentacion_proyecto);


      
       //Crear el registro de Proyecto 
       Project::create([
        'num_folio' => $this->form->folio,
        'fecha_registro' => $this->form->fecha_registro,
        'nombre_proyecto' => $this->form->nombre_proyecto,
        'areasSeleccionadas' => json_encode($this->form->areasSeleccionadas),
        'pertenece_asc' => $this->form->pertenece_asc,
        'nombres_asc' => $this->form->nombres_asc,
        'nombre_rs' => $this->form->nombre_rs,
        'regitro_patronal' => $this->form->regitro_patronal,
        'antiguedad' => $this->form->antiguedad,
        'empresa_domicilio' => $this->form->empresa_domicilio,
        'num_sucursales' => $this->form->num_sucursales,
        'empresa_telefono' => $this->form->empresa_telefono,
        'empresa_url' => $this->form->empresa_url,
        'empleados_directos' => $this->form->empleados_directos,
        'empleados_indirectos' => $this->form->empleados_indirectos,
        'empresa_ventas' => $this->form->empresa_ventas,
        'empresa_servicios' => $this->form->empresa_servicios,
        'equipamiento_1' => $this->form->equipamiento_1,
        'equipamiento_2' => $this->form->equipamiento_2,
        'equipamiento_3' => $this->form->equipamiento_3,
        'capacitacion_1' => $this->form->capacitacion_1,
        'capacitacion_2' => $this->form->capacitacion_2,
        'capacitacion_3' => $this->form->capacitacion_3,
        'participacion_1' => $this->form->participacion_1,
        'total_proyecto' => $this->form->total_proyecto,
        'total_fondo' => $this->form->total_fondo,
        'total_empresa' => $this->form->total_empresa,
        'impacto_opciones' => json_encode($this->form->impacto_opciones),
        'clientes' => json_encode($this->form->clientes),
        'applicant_id' => $this->form->solicitante_tipo,
        'solicitante_nombres' => $this->form->solicitante_nombres,
        'solicitante_apellidos' => $this->form->solicitante_apellidos,
        'solicitante_sexo' => $this->form->solicitante_sexo,
        'solicitante_nacimiento' => $this->form->solicitante_nacimiento,
        'solicitante_nacionalidad' => $this->form->solicitante_nacionalidad,
        'solicitante_pais' => $this->form->solicitante_pais,
        'solicitante_iden' => $this->form->solicitante_iden,
        'solicitante_correo' => $this->form->solicitante_correo,
        'solicitante_preguntauno' => $this->form->solicitante_preguntauno,
        'solicitante_respuestauno' => $this->form->solicitante_respuestauno,
        'solicitante_preguntados' => $this->form->solicitante_preguntados,
        'solicitante_respuestados' => $this->form->solicitante_respuestados,
        'solicitante_preguntatres' => $this->form->solicitante_preguntatres,
        'solicitante_respuestatres' => $this->form->solicitante_respuestatres,
        'solicitante_domicilio' => $this->form->solicitante_domicilio,
        'solicitante_telefono' => $this->form->solicitante_telefono,
        'anexo_1' => $name_anexo_uno,
        'anexo_2' => $name_anexo_dos,
        'anexo_3' => $name_anexo_tres,
        'presentacion_proyecto' => $name_presentacion_proyecto,
        'user_id' => auth()->user()->id,
        'porcentaje_fapai' => floatval($this->form->porcentaje_fondo),
       ]);

       // Crear un Mensaje de confirmación 
        session()->flash('message', 'Se Registro el Proyecto Corrctamente');
       //Redireccionar 
       return redirect()->route('dashboard'); 
    }

    public function render()
    {
        $areas = Area::all(); 
        $opcionesImpacto = Opcion::all(); 
        $tipos = Applicant::all(); 

        return view('livewire.create-project', [
            'areas' => $areas, 
            'areasSeleccionadas' => $this->form->areasSeleccionadas,
            'opcionesImpacto' => $opcionesImpacto,
            'tipos' => $tipos,
            'alMenosUnoLleno' => $this->alMenosUnoLleno,
        ]);
    }
}
