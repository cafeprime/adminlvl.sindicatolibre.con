<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    public function listar(){
        return view('alumnos.listar');
    }

}