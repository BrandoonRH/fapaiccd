<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('num_folio'); 
            $table->date('fecha_registro'); 
            $table->string('nombre_proyecto'); 
            $table->json('areasSeleccionadas'); 
            $table->boolean('pertenece_asc'); 
            $table->text('nombres_asc')->nullable(); 
            $table->string('nombre_rs');
            $table->string('regitro_patronal');
            $table->date('antiguedad');
            $table->text('empresa_domicilio'); 
            $table->integer('num_sucursales'); 
            $table->char('empresa_telefono', 10);
            $table->string('empresa_url');
            $table->integer('empleados_directos'); 
            $table->integer('empleados_indirectos'); 
            $table->float('empresa_ventas')->nullable(); ; 
            $table->text('empresa_servicios'); 
            $table->float('equipamiento_1')->nullable(); 
            $table->float('equipamiento_2')->nullable();  
            $table->float('equipamiento_3')->nullable(); 
            $table->float('capacitacion_1')->nullable(); 
            $table->float('capacitacion_2')->nullable(); 
            $table->float('capacitacion_3')->nullable(); 
            $table->float('participacion_1')->nullable(); 
            $table->float('total_proyecto');
            $table->float('total_fondo'); 
            $table->float('total_empresa'); 
            $table->json('impacto_opciones'); 
            $table->jsonb('clientes');
            $table->foreignId('applicant_id')->constrained()->onDelete('cascade'); 
            $table->string('solicitante_nombres');
            $table->string('solicitante_apellidos');
            $table->char('solicitante_sexo', 4);
            $table->date('solicitante_nacimiento');
            $table->string('solicitante_nacionalidad');
            $table->string('solicitante_pais'); 
            $table->string('solicitante_iden'); 
            $table->string('solicitante_correo'); 
            $table->boolean('solicitante_preguntauno'); 
            $table->text('solicitante_respuestauno')->nullable(); ;
            $table->boolean('solicitante_preguntados'); 
            $table->text('solicitante_respuestados')->nullable(); ;
            $table->boolean('solicitante_preguntatres'); 
            $table->text('solicitante_respuestatres')->nullable(); ;
            $table->text('solicitante_domicilio'); 
            $table->char('solicitante_telefono', 10);
            $table->string('anexo_1');
            $table->string('anexo_2');
            $table->string('anexo_3');
            $table->string('presentacion_proyecto');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_user_id_foreign'); 
            $table->dropForeign('projects_applicant_id_foreign');
            $table->dropColumn([
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
            ]);
        });
    }
};
