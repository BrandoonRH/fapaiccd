<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitud</title>
    <style>
        .flex{
           float: left;
        }
        .div{
            background-color: rgb(151, 150, 146); 
            width: 100%;
            height: 28px;
            border-radius: 10px; 
        }
        .box{
            width: 100%;
            height: auto;
            border: 1px solid black;
            padding: 5px; 
        }
        p{
            font-size: .8rem;
        }
        .prueba{
            
        }
        .page-break {
        page-break-after: always;
        }
        .font-bold{
            font-weight: 900; 
        }
       
    </style>
</head>
<body>
        <img class="flex" src="images/agencia_dos.webp" width="250px" height="50px">
        <h4 class="flex">SOLICITUD DE REGISTRO</h4>
        <img class="" src="images/Apoyo_Alto_Impacto_1.webp" width="250px" height="50px">

        <div class="div" >
            <h4 style="color: white; margin-left: 5px">Proyecto</h4>
        </div>
        <p><span class="font-bold">Número de Folio:</span> {{$project->num_folio}}</p>
        <p><span class="font-bold">Fecha Registro:</span> {{$project->fecha_registro}}</p>
        <p><span class="font-bold">Nombre del Proyecto:</span> {{$project->nombre_proyecto}}</p>

        <div class="div">
            <h4 style="color: white; margin-left: 5px">Información de la unidad económica</h4>
        </div>
        @if ($project->areasSeleccionadas)
            <p><span class="font-bold">Áreas:</span>
                @php
                $areas = json_decode($project->areasSeleccionadas);
                echo implode(', ', $areas);
                @endphp
            </p>
        @endif
        <p ><span class="font-bold">¿Pertenece a alguna Cámara o Asociación del sector?</span> {{ $project->pertenece_asc ? 'Si' : 'No' }}</p>
        <p ><span class="font-bold">Nombres:</span> {{ $project->nombres_asc ? $project->nombres_asc : 'Sin Asociaciones' }} </p>
        <p><span class="font-bold">Nombre o Razón Social:</span> {{$project->nombre_rs}}</p>
        <p><span class="font-bold">Registro Patronal:</span> {{$project->regitro_patronal}}</p>
        <p><span class="font-bold">Antigüedad:</span> {{$project->antiguedad}}</p>
        <p><span class="font-bold">Domicilio:</span> {{$project->empresa_domicilio}}</p>
        <p><span class="font-bold">Número de sucursales: </span>{{$project->num_sucursales}}</p>
        <p><span class="font-bold">Teléfono: </span>{{$project->empresa_telefono}}</p>
        <p><span class="font-bold">Página WEB (URL): </span>{{$project->empresa_url}}</p>
        <p><span class="font-bold">Número de empleados directos (IMSS):</span> {{$project->empleados_directos}}</p>
        <p><span class="font-bold">Número de empleados indirectos (freelancer o temporales):</span> {{$project->empleados_indirectos}}</p>
        <p><span class="font-bold">Ventas anuales en USD (para personas morales): </span>${{number_format($project->total_proyecto, 2, '.', ',')}} </p>
        <p><span class="font-bold">Servicios que ofrece: </span>{{$project->empresa_servicios}}</p>    

        <div class="div">
            <h4 style="color: white; margin-left: 5px">Características del incentivo económico solicitado</h4>
        </div>
        <div class="flex">
            <p>Equipamiento</p>
            <p>E.1. Adquisición de equipo especializado: ${{number_format($project->equipamiento_1, 2, '.', ',')}}</p>
            <p>E.2. Herramientas técnicas: ${{number_format($project->equipamiento_2, 2, '.', ',')}}</p>
            <p>E.3. Software: ${{number_format($project->equipamiento_3, 2, '.', ',')}}</p>
        </div>
        <div  style="margin-left: 60px; ">
            <p>Capacitación</p>
            <p>C.1. Especialización de capital humano: ${{number_format($project->capacitacion_1, 2, '.', ',')}}</p>
            <p>C.2. Certificaciones: ${{number_format($project->capacitacion_2, 2, '.', ',')}}</p>
            <p>C.3. Consultoría: ${{number_format($project->capacitacion_3, 2, '.', ',')}}</p>
        </div>

        <p style="clear: both;">P.1 Participación en eventos, concursos, festivales, congresos nacionales e internacionales. ${{number_format($project->capacitacion_3, 2, '.', ',')}}</p>

        <p><span class="font-bold">Valor total del proyecto:</span> ${{number_format($project->total_proyecto, 2, '.', ',')}}</p>
        <p><span class="font-bold">Total de aportación del Fondo:</span> ${{number_format($project->total_fondo, 2, '.', ',')}}</p>
        <p><span class="font-bold">Total de aportación Concurrente:</span> ${{number_format($project->total_empresa, 2, '.', ',')}}</p>

        <div class="page-break"></div>

        <div class="div">
            <h4 style="color: white; margin-left: 5px">Alto Impacto a la Industria Creativa Digital de Jalisco</h4>
        </div>
        <p>Alto Impacto del Proyecto:</p>
        <ul>
            @php
            $opciones = json_decode($project->impacto_opciones);
            foreach ($opciones as $opcion) {
                echo "<li>{$opcion}</li>";
            }
            @endphp
        </ul>

        <div class="div">
            <h4 style="color: white; margin-left: 5px">Referencias Comerciales de clientes</h4>
        </div>
        @foreach (json_decode($project->clientes) as $index => $cliente)
            <h5>Cliente {{ $index + 1 }}</h5>
            <p><span class="font-bold">Nombre completo:</span> {{ $cliente->cliente_nombre }}</p>
            <p><span class="font-bold">Empresa:</span> {{ $cliente->cliente_empresa }}</p>
            <p><span class="font-bold">Teléfono:</span> {{ $cliente->cliente_telefono }}</p>
            <p><span class="font-bold">Correo electrónico:</span> {{ $cliente->cliente_correo }}</p>
            <p><span class="font-bold">Sitio de internet:</span> <a href="{{ $cliente->cliente_url }}" target="_blank">{{ $cliente->cliente_url }}</a></p>
        @endforeach

        <div class="div">
            <h4 style="color: white; margin-left: 5px">Información general de Representante Legal</h4>
        </div>
        <p><span class="font-bold">Tipo de solicitante:</span> </p>
        <p><span class="font-bold">Nombres:</span> {{$project->solicitante_nombres}}</p>
        <p><span class="font-bold">Apellidos:</span> {{$project->solicitante_apellidos}}</p>
        <p><span class="font-bold">Sexo:</span> {{$project->solicitante_sexo}}</p>
        <p><span class="font-bold">Fecha de nacimiento:</span> {{$project->solicitante_nacimiento}}</p>
        <p><span class="font-bold">Nacionalidad: </span>{{$project->solicitante_nacionalidad}}</p>
        <p><span class="font-bold">País de nacimiento: </span>{{$project->solicitante_pais}}</p>
        <p><span class="font-bold">Identificación Oficial: </span>{{$project->solicitante_iden}}</p>
        <p><span class="font-bold">Correo electrónico: </span>{{$project->solicitante_correo}}</p>
        <p><span class="font-bold">¿Pertenece a alguna población indígena? </span>{{ $project->solicitante_preguntauno ? 'Si' : 'No' }}</p>
        @if ($project->solicitante_preguntauno)
            <p><span class="font-bold">¿Cuál?</span> {{$project->solicitante_respuestauno}}</p>
        @endif
        <p><span class="font-bold">¿Vive con alguna discapacidad? </span>{{ $project->solicitante_preguntados ? 'Si' : 'No' }}</p>
        @if ($project->solicitante_preguntados)
            <p><span class="font-bold">¿Cuál?</span> {{$project->solicitante_respuestados}}</p>
        @endif
        <p><span class="font-bold">¿Es usted beneficiario de algún programa económico similar en este momento?</span> {{ $project->solicitante_preguntatres ? 'Si' : 'No' }}</p>
        @if ($project->solicitante_preguntatres)
            <p><span class="font-bold">¿Cuál?</span> {{$project->solicitante_respuestatres}}</p>
        @endif
        <p><span class="font-bold">Domicilio del Solicitante: </span>{{$project->solicitante_domicilio}}</p>
        <p><span class="font-bold">Teléfono:</span> {{$project->solicitante_telefono}}</p>
        
        <div class="page-break"></div>
        <div class="div">
            <h4 style="color: white; margin-left: 5px">Documentos probatorios. La información debe ser clara, legible y sin inconsistencias</h4>
        </div>
        <div class="box">
            <h5>2. Estar legalmente establecidos en Jalisco</h5>
            <div>
                <div class="flex" style="width: 80%">
                    <p >2.1 Comprobante de domicilio vigente (no mayor a 60 días) a
                        nombre del solicitante persona moral o representante legal
                    </p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
        </div>
        <div class="box">
            <h5>3. Acreditar ser Persona Moral o Asociación Civil</h5>
           <div>
               <div>
                    <div class="flex" style="width: 80%">
                        <p >3.1 Identificación oficial del representante legal vigente</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
               </div>
               <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>3.2 Poder del representante legal o apoderado</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
               </div>
               <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>3.3 Constancia de Situación Fiscal</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>3.4 Constancia de opinión positiva de cumplimiento de obligaciones fiscales reciente</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>3.5 Registro patronal en el Instituto Mexicano del Seguro Social (IMSS)</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>3.5 Registro patronal en el Instituto Mexicano del Seguro Social (IMSS)</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>3.6 Cédula de determinación de cuotas obrero patronales ante el IMSS y su pago correspondiente</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>3.7 Acta Constitutiva y sus modificaciones (si hubo) con inscripción en el registro público de la propiedad</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>3.8 Estado de resultados</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
           </div>
        </div>
        <div class="box">
            <h5>4. Entregar cartas firmadas</h5>
           <div>
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>Anexo 1: Postulación</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>Anexo 2: Decir verdad y compriomiso</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>Anexo 3: Curriculum de launidad económica (servicios, ventas anuales, empleados, tipo de clientes)</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
           </div>
        </div>
        <div class="box">
            <h5>5.Proyecto de alto impacto para valoración</h5>
           <div>
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>5.1.0. Índice</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>5.1.1. Antecedentes. Contexto general del sector en Jalisco, México e Internacional.</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>5.1.2. Problema identificado del Estudio Creativo Digital. Necesidad que atiende, identificar las principales</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>5.1.3. Objetivo del proyecto.</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>5.1.4. ¿A quién o a qué se dirige el proyecto?</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>5.1.5. Características del proyecto. Descripción de lo que se hará. Contenido, necesidades para implementarlo</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>5.1.6. Proceso de operación.</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>5.1.7. Comprobación del programa. Entregables.</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>5.1.8 Indicadores de Impacto.</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>5.1.9. Calendario de operación 2023.</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>5.1.10 Presupuesto del programa. Indicando el tipo, destino y monto del apoyo de acuerdo con el punto 9</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
           </div>
        </div>
        
        
        <div class="page-break"></div>
        <div class="div">
            <h4 style="color: white; margin-left: 5px">Al ser sujeto del incentivo</h4>
        </div>
        <div class="box">
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>a. Validación por parte de Comité de Valoración como sujeto de apoyo, viabilidad técnica, pertinencia financiera</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>b. Notificación de aprobación como sujeto de apoyo.</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>c. Constancia del curso virtual "Pro Integridad"</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>d. Convenio de Otorgamiento del Incentivo</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>e. Carátula del estado de cuenta bancario a nombre del solicitante con CLABE</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
                <div style="clear: both;">
                    <div class="flex" style="width: 80%">
                        <p>f.Pagaré firmado por el total del incentivo económico a recibir</p>
                    </div>
                    <div style="margin-left: 85px;">
                        <p>( &nbsp; &nbsp; &nbsp; )</p>
                    </div>
                </div>
        </div>
        <div class="box">
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>g. Comprobación técnica y financiera aprobada por Comité de Valoración;</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>h. Cancelación del proyecto</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
        </div>
        <h5>Declaro bajo protesta decir verdad, que la documentación entregada es verídica y verificable.</h5>
        <div class="box">
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>He leído los lineamientos del Fondo de Apoyo a Proyectos de Alto Impacto a la Industria</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>Conozco el aviso de protección de datos personales</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
            <div style="clear: both;">
                <div class="flex" style="width: 80%">
                    <p>En caso de ser sujeto de apoyo, acepto utilizar el recurso para el objetivo establecido.</p>
                </div>
                <div style="margin-left: 85px;">
                    <p>( &nbsp; &nbsp; &nbsp; )</p>
                </div>
            </div>
        </div>

       <div style="margin-top: 250px;">
        <div class="flex">  
            <p>_____________________________________<br> <br> Firma y Nombre completo del representante legal</p>
        </div>
        <div style="margin-left: 200px;">
            <p >_____________________________ <br> <br> Firma de Servidor Público que recibe</p>
        </div>
       </div>
</body>
</html>