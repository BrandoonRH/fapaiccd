<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadFilesController extends Controller
{
    public function downloadConvocatoria()
    {
        //return Storage::download('convocatoria.pdf');
        $archivo = storage_path('app/public/downloads/convocatoria.pdf');

        return response()->download($archivo, 'convocatoria.pdf');
    }

    public function downloadAnexoUno()
    {
        $archivo = storage_path('app/public/downloads/anexo1.pdf');

        return response()->download($archivo, 'anexo1.pdf');
    }

    public function downloadAnexoDos()
    {
        $archivo = storage_path('app/public/downloads/anexo2.pdf');

        return response()->download($archivo, 'anexo2.pdf');
    }
    
    public function downloadAnexoTres()
    {
        $archivo = storage_path('app/public/downloads/anexo3.pdf');

        return response()->download($archivo, 'anexo3.pdf');
    }

    public function downloadLineamientos()
    {
        $archivo = storage_path('app/public/downloads/lineamientos.pdf');

        return response()->download($archivo, 'lineamientos.pdf');
    }
}
