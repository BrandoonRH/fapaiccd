<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SolicitudController extends Controller
{

    public  function index()
    {
        return view('dashboard');
    }
    public  function create()
    {
        $user = auth()->user();

        if ($user->projects) {
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
        $this->authorize('update', $project);
        return view('proyectos.edit', [
            'project' => $project
        ]);
    }
    
    public  function generatePDF(Project $project)
    {
        //policy que no funciono 
        $this->authorize('downloadPDF', $project);
        $pdf = Pdf::loadView('proyectos.pdf', compact('project'));
        return $pdf->stream();
        /*return view('proyectos.pdf',[
            'project' => $project
        ] );*/
    }


}
