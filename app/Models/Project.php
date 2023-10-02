<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $dates = ['fecha_registro'];


    protected $fillable = [
        'num_folio',
        'fecha_registro',
        'nombre_proyecto',
        'areasSeleccionadas',
        'pertenece_asc',
        'nombres_asc',
        'nombre_rs',
        'regitro_patronal',
        'antiguedad',
        'empresa_domicilio',
        'num_sucursales',
        'empresa_telefono',
        'empresa_url',
        'empleados_directos',
        'empleados_indirectos',
        'empresa_ventas',
        'empresa_servicios',
        'equipamiento_1',
        'equipamiento_2',
        'equipamiento_3',
        'capacitacion_1',
        'capacitacion_2',
        'capacitacion_3',
        'participacion_1',
        'total_proyecto',
        'total_fondo',
        'total_empresa',
        'impacto_opciones',
        'clientes',
        'applicant_id',
        'solicitante_nombres',
        'solicitante_apellidos',
        'solicitante_sexo',
        'solicitante_nacimiento',
        'solicitante_nacionalidad',
        'solicitante_pais',
        'solicitante_iden',
        'solicitante_correo',
        'solicitante_preguntauno',
        'solicitante_respuestauno',
        'solicitante_preguntados',
        'solicitante_respuestados',
        'solicitante_preguntatres',
        'solicitante_respuestatres',
        'solicitante_domicilio',
        'solicitante_telefono',
        'anexo_1',
        'anexo_2',
        'anexo_3',
        'presentacion_proyecto',
        'user_id'
    ]; 
}
