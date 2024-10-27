<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Curso;
use Illuminate\Http\Request;
use App\Models\Provincia;

class RegistrosController extends Controller
{
    public function index(Request $request){

        // Este IF cambia la variable page por p para seleccionar página en la URL como en mi antigua App
        if ($request->has('p')) {
            $page = $request->query('p');
            $request->query->remove('page'); // Elimina el parámetro `page`
            $request->merge(['page' => $page]); // Fusiona `p` como `page`
        }

        $registros = Registro::orderBy('FECHA_INSCRIPCION', 'desc')->paginate(50);
        $totalRegistros = Registro::count();
        $cursos = Curso::all(); // Obtiene todos los cursos
        $provincias = Provincia::orderBy('PROVINCIA', 'asc')->get(); // Obtiene provincias ordenadas

        return view('alumnos.listar', [
            'registros' => $registros,
            'totalRegistros' => $totalRegistros,
            'cursos' => $cursos,
            'provincias' => $provincias,
        ]);
    }
    
    public function modificar($reg){
        $registro = Registro::where('IDREGISTRO', $reg)->firstOrFail();
        return view('alumnos.modificar', ['registro'=> $registro]);
    }

    public function obtenerCursos(){

    }

}
