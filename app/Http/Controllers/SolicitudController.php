<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SolicitudController extends Controller
{

    public static function index()
    {
        return view('dashboard');
    }
    public static function create()
    {
        $user = auth()->user();

        if ($user->projects) {
            // El usuario ya tiene un proyecto registrado, redirige o muestra un mensaje de error.
            /* return redirect()->route('dashboard')->with([
                'showSweetAlert' => true,
                'sweetAlertOptions' => [
                    'position' => 'center',
                    'icon' => 'warning',
                    'title' => '¡Ya tienes un Proyecto Registrado!',
                    'showConfirmButton' => false,
                    'timer' => 1500,
                ],
            ]);*/
            // Crear un Mensaje de confirmación 
            session()->flash('message', '¡Ya tienes un Proyecto Registrado!');
            //Redireccionar 
            return redirect()->route('dashboard'); 
        }

        return view('proyectos.create');
    }

    public  function edit(Project $project)
    {
        //policy que no funciono 
        //$this->authorize('update', $project);

        if(auth()->user()->id !== $project->user_id){
             // El usuario ya tiene un proyecto registrado, redirige o muestra un mensaje de error.
             /*return redirect()->route('dashboard')->with([
                'showSweetAlert' => true,
                'sweetAlertOptions' => [
                    'position' => 'center',
                    'icon' => 'warning',
                    'title' => '¡No tienes Permisos para editar este proyecto!',
                    'showConfirmButton' => false,
                    'timer' => 1500,
                ],
            ]);*/
            // Crear un Mensaje de confirmación 
            session()->flash('message', '¡No tienes Permisos para editar este proyecto!');
            //Redireccionar 
            return redirect()->route('dashboard'); 
        }

        return view('proyectos.edit', [
            'project' => $project
        ]);
    }
    public static function generatePDF(Project $project)
    {

        $pdf = Pdf::loadView('proyectos.pdf', compact('project'));
        return $pdf->stream();
        /*return view('proyectos.pdf',[
            'project' => $project
        ] );*/
    }


}
