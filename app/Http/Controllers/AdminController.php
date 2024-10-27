<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Muestra la vista de configuración.
     *
     * @return \Illuminate\View\View
     */
    public function configuracion()
    {
        return view('admin.configuracion');
    }

    /**
     * Muestra la vista de gestión de usuarios.
     *
     * @return \Illuminate\View\View
     */
    public function usuarios()
    {
        return view('admin.usuarios');
    }
}
