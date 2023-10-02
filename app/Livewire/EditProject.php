<?php

namespace App\Livewire;

use App\Livewire\Forms\ProjectForm;
use App\Models\Applicant;
use App\Models\Area;
use App\Models\Opcion;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProject extends Component
{
    

    use WithFileUploads;
    public ProjectForm $form; 
    public $projectId; 
    public $alMenosUnoLleno = false; 
    public $folioGenerado;
    public $modoEdicion = true;
    public $anexouno_nuevo;
    public $anexodos_nuevo;
    public $anexotres_nuevo;
    public $presentacion_proyecto_nuevo; 


    public function rules()
    {
        return [
            'form.anexo_uno' => ['nullable'],
            'form.anexo_dos' => [ 'nullable'],
            'form.anexo_tres' => [ 'nullable'],
            'form.presentacion_proyecto' => [ 'nullable'],
            // Otras reglas de validación para $form
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
        $this->form->clientes[] = $this->form->nuevoCliente;
        $this->form->nuevoCliente = [
            'cliente_nombre' => '',
            'cliente_empresa' => '',
            'cliente_telefono' => '',
            'cliente_correo' => '',
            'cliente_url' => '',
        ];
       
         // Emitir un evento Livewire para volver a renderizar la vista
        $this->dispatch('clienteAgregado');
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
    
    public function mount(Project $project)
    {
       $this->projectId = $project->id;  
       $this->form->folio = $project->num_folio; 
       $this->form->fecha_registro = $project->fecha_registro; 
       $this->form->nombre_proyecto = $project->nombre_proyecto; 
       // Verifica si $project->areasSeleccionadas no es nulo y es un array JSON válido
        if (!empty($project->areasSeleccionadas)) {
            // Decodifica el JSON para obtener el array de áreas
            $areasArray = json_decode($project->areasSeleccionadas, true);

            // Verifica si la decodificación fue exitosa y $areasArray es un array
            if (is_array($areasArray)) {
                // Agrega cada área como elemento individual en $this->form->areasSeleccionadas[]
                foreach ($areasArray as $area) {
                    $this->form->areasSeleccionadas[] = $area;
                }
            }
        }
       $this->form->pertenece_asc = $project->pertenece_asc ? true : false;  
       $this->form->nombres_asc = $project->nombres_asc; 
       $this->form->nombre_rs = $project->nombre_rs; 
       $this->form->regitro_patronal = $project->regitro_patronal; 
       $this->form->antiguedad = $project->antiguedad; 
       $this->form->empresa_domicilio = $project->empresa_domicilio; 
       $this->form->num_sucursales = $project->num_sucursales; 
       $this->form->empresa_telefono = $project->empresa_telefono; 
       $this->form->empresa_url = $project->empresa_url; 
       $this->form->empleados_directos = $project->empleados_directos; 
       $this->form->empleados_indirectos = $project->empleados_indirectos; 
       $this->form->empresa_ventas = $project->empresa_ventas; 
       $this->form->empresa_servicios = $project->empresa_servicios; 

       $this->form->equipamiento_1 = $project->equipamiento_1;
       $this->form->equipamiento_2 = $project->equipamiento_2;
       $this->form->equipamiento_3 = $project->equipamiento_3;

       $this->form->capacitacion_1 = $project->capacitacion_1;
       $this->form->capacitacion_2 = $project->capacitacion_2;
       $this->form->capacitacion_3 = $project->capacitacion_3;

       $this->form->participacion_1 = $project->participacion_1;

       $incentivos = [];

        if (!empty($this->form->equipamiento_1)) {
            $incentivos[] = $this->form->equipamiento_1;
        }

        if (!empty($this->form->equipamiento_2)) {
            $incentivos[] = $this->form->equipamiento_2;
        }

        if (!empty($this->form->equipamiento_3)) {
            $incentivos[] = $this->form->equipamiento_3;
        }

        if (!empty($this->form->capacitacion_1)) {
            $incentivos[] = $this->form->capacitacion_1;
        }

        if (!empty($this->form->capacitacion_2)) {
            $incentivos[] = $this->form->capacitacion_2;
        }

        if (!empty($this->form->capacitacion_3)) {
            $incentivos[] = $this->form->capacitacion_3;
        }

        if (!empty($this->form->participacion_1)) {
            $incentivos[] = $this->form->participacion_1;
        }

       $this->form->incentivos = $incentivos;
       $this->form->porcentaje_fondo = $project->porcentaje_fapai; 
       $this->form->total_proyecto = $project->total_proyecto; 
       $this->form->total_fondo = $project->total_fondo; 
       $this->form->total_empresa = $project->total_empresa; 

        if (!empty($project->impacto_opciones)) {
            
            $opcionesArray = json_decode($project->impacto_opciones, true);
            if (is_array($opcionesArray)) {
                foreach ($opcionesArray as $opcion) {
                    $this->form->impacto_opciones[] = $opcion;
                }
            }
        }
        if (!empty($project->clientes)) {
            
            $clientesArray = json_decode( $project->clientes, true);
            if (is_array($clientesArray)) {
                foreach ($clientesArray as $cliente) {
                    $this->form->clientes[] = $cliente;
                }
            }
        }
    
       $this->form->solicitante_tipo = $project->applicant_id; 
       $this->form->solicitante_nombres = $project->solicitante_nombres; 
       $this->form->solicitante_apellidos = $project->solicitante_apellidos; 
       $this->form->solicitante_sexo = $project->solicitante_sexo; 
       $this->form->solicitante_nacimiento = $project->solicitante_nacimiento; 
       $this->form->solicitante_nacionalidad = $project->solicitante_nacionalidad; 
       $this->form->solicitante_pais = $project->solicitante_pais; 
       $this->form->solicitante_iden = $project->solicitante_iden; 
       $this->form->solicitante_correo = $project->solicitante_correo; 
       $this->form->solicitante_preguntauno = $project->solicitante_preguntauno ? true : false;  
       $this->form->solicitante_respuestauno = $project->solicitante_respuestauno; 
       $this->form->solicitante_preguntados = $project->solicitante_preguntados ? true : false;  
       $this->form->solicitante_respuestados = $project->solicitante_respuestados; 
       $this->form->solicitante_preguntatres = $project->solicitante_preguntatres ? true : false;  
       $this->form->solicitante_respuestatres = $project->solicitante_respuestatres; 
       $this->form->solicitante_domicilio = $project->solicitante_domicilio; 
       $this->form->solicitante_telefono = $project->solicitante_telefono; 

       $this->form->anexo_uno = $project->anexo_1; 
       $this->form->anexo_dos = $project->anexo_2;
       $this->form->anexo_tres = $project->anexo_3;
       $this->form->presentacion_proyecto= $project->presentacion_proyecto;

    }//mount


    public function saveChanges()
    {
        
        //dd($validateion); 
        /*if($this->getErrorBag()->any()){
            $this->dispatch('faltanCampos');
        }*/
        $validated= $this->form->validate();
        //dd($validated); 

        //revisar si hay nuevos documentos que subir 
        if($this->anexouno_nuevo){
            unlink(storage_path('app/proyects/anexos/' . $this->form->anexo_uno));
            $anexo_uno = $this->anexouno_nuevo->store('proyects/anexos');
            $name_anexo_uno = str_replace('proyects/anexos/', '', $anexo_uno);
        }
        if($this->anexodos_nuevo){
            unlink(storage_path('app/proyects/anexos/' . $this->form->anexo_dos));
            $anexo_dos = $this->anexodos_nuevo->store('proyects/anexos');
            $name_anexo_dos = str_replace('proyects/anexos/', '', $anexo_dos);
        }
        if($this->anexotres_nuevo){
            unlink(storage_path('app/proyects/anexos/' . $this->form->anexo_tres));
            $anexo_tres = $this->anexotres_nuevo->store('proyects/anexos');
            $name_anexo_tres = str_replace('proyects/anexos/', '', $anexo_tres);
        }
        if($this->presentacion_proyecto_nuevo){
            unlink(storage_path('app/proyects/presentaciones/' . $this->form->presentacion_proyecto));
            $presentacion_proyecto = $this->presentacion_proyecto_nuevo->store('proyects/presentaciones');
            $name_presentacion_proyecto = str_replace('proyects/anexos/', '', $presentacion_proyecto);
        }
       
        //Encontrar el Proyecto a editar 
        $projectEdit = Project::find($this->projectId); 
       // dd($projectEdit); 
         //Asignar Valores 
        $projectEdit->num_folio = $validated['folio']; 
        $projectEdit->fecha_registro = $validated['fecha_registro'];
        $projectEdit->nombre_proyecto = $validated['nombre_proyecto'];
        $projectEdit->areasSeleccionadas = json_encode($validated['areasSeleccionadas']);
        $projectEdit->pertenece_asc = $validated['pertenece_asc'];
        $projectEdit->nombres_asc = $validated['nombres_asc'];
        $projectEdit->nombre_rs = $validated['nombre_rs'];
        $projectEdit->regitro_patronal = $validated['regitro_patronal'];
        $projectEdit->antiguedad = $validated['antiguedad'];
        $projectEdit->empresa_domicilio = $validated['empresa_domicilio'];
        $projectEdit->num_sucursales = $validated['num_sucursales'];
        $projectEdit->empresa_telefono = $validated['empresa_telefono'];
        $projectEdit->empresa_url = $validated['empresa_url'];
        $projectEdit->empleados_directos = $validated['empleados_directos'];
        $projectEdit->empleados_indirectos = $validated['empleados_indirectos'];
        $projectEdit->empresa_ventas = $validated['empresa_ventas'];
        $projectEdit->empresa_servicios = $validated['empresa_servicios'];
        $projectEdit->equipamiento_1 = $validated['equipamiento_1'];
        $projectEdit->equipamiento_2 = $validated['equipamiento_2'];
        $projectEdit->equipamiento_3 = $validated['equipamiento_3'];
        $projectEdit->capacitacion_1 = $validated['capacitacion_1'];
        $projectEdit->capacitacion_2 = $validated['capacitacion_2'];
        $projectEdit->capacitacion_3 = $validated['capacitacion_3'];
        $projectEdit->participacion_1 = $validated['participacion_1'];
        $projectEdit->porcentaje_fapai = $validated['porcentaje_fondo']; 
        $projectEdit->total_proyecto = $validated['total_proyecto'];
        $projectEdit->total_fondo = $validated['total_fondo'];
        $projectEdit->total_empresa = $validated['total_empresa'];
        $projectEdit->impacto_opciones = json_encode($validated['impacto_opciones']);
        $projectEdit->clientes = json_encode( $validated['clientes']);
        $projectEdit->applicant_id = $validated['solicitante_tipo'];
        $projectEdit->solicitante_nombres = $validated['solicitante_nombres'];
        $projectEdit->solicitante_apellidos = $validated['solicitante_apellidos'];
        $projectEdit->solicitante_sexo = $validated['solicitante_sexo'];
        $projectEdit->solicitante_nacimiento = $validated['solicitante_nacimiento'];
        $projectEdit->solicitante_nacionalidad = $validated['solicitante_nacionalidad'];
        $projectEdit->solicitante_pais = $validated['solicitante_pais'];
        $projectEdit->solicitante_iden = $validated['solicitante_iden'];
        $projectEdit->solicitante_correo = $validated['solicitante_correo'];
        $projectEdit->solicitante_preguntauno = $validated['solicitante_preguntauno'];
        $projectEdit->solicitante_respuestauno = $validated['solicitante_respuestauno'];
        $projectEdit->solicitante_preguntados = $validated['solicitante_preguntados'];
        $projectEdit->solicitante_respuestados = $validated['solicitante_respuestados'];
        $projectEdit->solicitante_preguntatres = $validated['solicitante_preguntatres'];
        $projectEdit->solicitante_respuestatres = $validated['solicitante_respuestatres'];
        $projectEdit->solicitante_domicilio = $validated['solicitante_domicilio'];
        $projectEdit->solicitante_telefono = $validated['solicitante_telefono'];
        $projectEdit->anexo_1 = $name_anexo_uno ?? $projectEdit->anexo_1; 
        $projectEdit->anexo_2 = $name_anexo_dos ?? $projectEdit->anexo_2; 
        $projectEdit->anexo_3 = $name_anexo_tres ?? $projectEdit->anexo_3;
        $projectEdit->presentacion_proyecto = $name_presentacion_proyecto ?? $projectEdit->presentacion_proyecto; 
        
        //Guaradr el project 
        $projectEdit->save(); 

        //redireccionar 
        session()->flash('message', 'Se Actualizo el Proyecto');
        return redirect()->route('dashboard'); 

    }
    
    public function render()
    {
        $areas = Area::all(); 
        $opcionesImpacto = Opcion::all(); 
        $tipos = Applicant::all(); 

        return view('livewire.edit-project', [
            'areas' => $areas, 
            'areasSeleccionadas' => $this->form->areasSeleccionadas,
            'opcionesImpacto' => $opcionesImpacto,
            'tipos' => $tipos,
            'alMenosUnoLleno' => $this->alMenosUnoLleno,
        ]);
    }
}
