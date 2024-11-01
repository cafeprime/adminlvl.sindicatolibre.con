<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Curso;
use App\Models\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrosController extends Controller
{
    public function index(Request $request)
    {

        // Este IF cambia la variable page por p para seleccionar página en la URL como en mi antigua App
        if ($request->has('p')) {
            $page = $request->query('p');
            $request->query->remove('page'); // Elimina el parámetro `page`
            $request->merge(['page' => $page]); // Fusiona `p` como `page`
        }
        
        // Consulta de provincias y cursos
        $provincias = Provincia::orderBy('PROVINCIA', 'asc')->get();
        $cursos = Curso::all(); // Obtiene todos los cursos

        // Resto de lógica y paginación. AQUI se accede a las variables de la url
        $limit = $request->input('f', 50);
        $provinciaId = $request->input('v', null); // ID de provincia desde el parámetro `v`
        $tipo = $request->input('t', 0);
        $roleId = Auth::user()->role_name;

        // Consulta de registros usando el método en el modelo
        $registros = Registro::filtrarRegistros($roleId, $provinciaId, $tipo)->paginate($limit);

        return view('registros.listar', [
            'registros' => $registros,
            'totalRegistros' => Registro::filtrarRegistros($roleId, $provinciaId, $tipo)->count(),
            'provincias' => $provincias, // Pasar las provincias a la vista
            'provinciaId' => $provinciaId, // Provincia seleccionada
            'cursos' => $cursos
        ]);
    }
    
    public function modificar($reg){
        $registro = Registro::where('IDREGISTRO', $reg)->firstOrFail();
        return view('registros.modificar', ['registro'=> $registro]);
    }

    public function obtenerCursos(){

    }

}
