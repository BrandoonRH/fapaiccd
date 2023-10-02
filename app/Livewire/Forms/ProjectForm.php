<?php

namespace App\Livewire\Forms;

use App\Models\Project;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ProjectForm extends Form
{
    
    
   
    //Sección Proyecto
    #[Rule('required')]
    public $folio; 

   #[Rule('required')]
    public $fecha_registro;

    #[Rule('required')]
    public $nombre_proyecto; 

    //Sección Información de la unidad económica
    #[Rule('required|array|min:1')]
    public $areasSeleccionadas = []; 

    #[Rule('required|boolean')]
    public $pertenece_asc; 

    #[Rule('required_if:pertenece_asc,true')]
    public $nombres_asc;

    #[Rule('required')]
    public $nombre_rs;

    #[Rule('required')]
    public $regitro_patronal; 

    #[Rule('required')]
    public $antiguedad;

    #[Rule('required')]
    public $empresa_domicilio; 

    #[Rule('required|numeric')]
    public $num_sucursales;

    #[Rule('required|size:10')]
    public $empresa_telefono; 

    #[Rule('required')]
    public $empresa_url;

    #[Rule('required|numeric')]
    public $empleados_directos; 

    #[Rule('required|numeric')]
    public $empleados_indirectos; 

    #[Rule('required|numeric|min:0')]
    public $empresa_ventas; 

    #[Rule('required')]
    public $empresa_servicios; 

    //Sección Características del incentivo económico solicitado (Moneda Nacional)
    #[Rule('nullable|numeric')]
    public $equipamiento_1;

    #[Rule('nullable|numeric')]
    public $equipamiento_2;

    #[Rule('nullable|numeric')]
    public $equipamiento_3;

    #[Rule('nullable|numeric')]
    public $capacitacion_1; 

    #[Rule('nullable|numeric')]
    public $capacitacion_2;

    #[Rule('nullable|numeric')]
    public $capacitacion_3;

    #[Rule('nullable|numeric')]
    public $participacion_1; 

    #[Rule('required|array|min:1')]
    public $incentivos = [];

    //Desglose el valor total del proyecto
    #[Rule('required|numeric')]
    public $porcentaje_fondo; 

    #[Rule('required|numeric')]
    public $total_proyecto; 

    #[Rule('required|numeric')]
    public $total_fondo; 

    #[Rule('required|numeric')]
    public $total_empresa; 

    //sección Alto Impacto a la Industria Creativa Digital de Jalisco
    #[Rule('required|array|min:1')]
    public $impacto_opciones = []; 

     //Sección Referencias Comerciales de clientes
    #[Rule('required|array|min:1')]
     public $clientes = [];

     //#[Rule('required|array|min:5')]
     public $nuevoCliente = [
         'cliente_nombre' => '',
         'cliente_empresa' => '',
         'cliente_telefono' => '',
         'cliente_correo' => '',
         'cliente_url' => '',
     ];

    //Sección Información general de Representante Legal
    #[Rule('required|in:1,2')]  
    public $solicitante_tipo; 

    #[Rule('required')]
    public $solicitante_nombres; 

    #[Rule('required')]
    public $solicitante_apellidos; 

    #[Rule('required|in:M,H,OTRO')]
    public $solicitante_sexo; 

    #[Rule('required')]
    public $solicitante_nacimiento; 

    #[Rule('required')]
    public $solicitante_nacionalidad; 

    #[Rule('required')]
    public $solicitante_pais;
    
    #[Rule('required')]
    public $solicitante_iden;
    
    #[Rule('required')] 
    public $solicitante_correo; 

    #[Rule('required|boolean')]
    public $solicitante_preguntauno; 

    #[Rule('nullable')] 
    public $solicitante_respuestauno; 

    #[Rule('required|boolean')]
    public $solicitante_preguntados;

   // #[Rule('required_if:solicitante_preguntados,true')] 
   #[Rule('nullable')] 
    public $solicitante_respuestados; 

    #[Rule('required|boolean')]
    public $solicitante_preguntatres;

    //#[Rule('required_if:solicitante_preguntatres,true')] 
    #[Rule('nullable')] 
    public $solicitante_respuestatres; 

    #[Rule('required')] 
    public $solicitante_domicilio; 

    #[Rule('required|size:10')] 
    public $solicitante_telefono;


    //Archvios Anexos 
    //#[Rule('file|mimes:pdf')] 
    public $anexo_uno; 

    //#[Rule('file|mimes:pdf')] 
    public $anexo_dos; 

    // #[Rule('file|mimes:pdf')] 
    public $anexo_tres; 

    //#[Rule('file|mimes:pdf')] 
    public $presentacion_proyecto; 


}
