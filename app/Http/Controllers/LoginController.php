<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function login($desac = null)
    {   
        // Si la sesión está activada, revisamos si está desactivado.
        if (session('activado') === 0 && $desac == 1) {
            Session::put('activado', null);
            return view('login', ['desac' => 1]);  // Redirigimos con el mensaje de desactivado.
        }

        return view('login', ['desac' => null]);
    }

    public function ajaxlogin(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        // Buscar el usuario en la base de datos según el campo USUARIO
        $user = Usuario::where('USUARIO', $request->input('usuario'))->first();

        // Verificar que el usuario exista y que la contraseña coincida
        if ($user && password_verify($request->input('password'), $user->CONTRASENA)) {
            
            // Autenticar al usuario usando el guard personalizado
            Auth::guard('web')->login($user);
            // if (Auth::check()) {
            //     return response()->json('Usuario autenticado correctamente');
            // } else {
            //     return response()->json('Error al autenticar al usuario', 401);
            // }
            // Guardar los datos en la sesión como en el sistema antiguo
           
            Session::put('activado', $user->ACTIVADO);

            // Redirigir a la ruta /inicio después del login exitoso
            if($user->ACTIVADO == 0){
                Auth::logout();
                session()->flash('desac', 1);
                return response()->json('desac');
            }
            Session::put('timeout', time());
            Session::put('idusuario', $user->ID_USUARIO);
            Session::put('idsesion', $user->ID_SESION);
            Session::put('nombre', $user->NOMBRE);
            Session::put('provincia', $user->PROVINCIA);
            Session::put('rol', $user->rol->ROL);

            $url_imagenes = "/images/users/";
            if (!empty($user->FOTO)) {
                Session::put('foto', $url_imagenes.$user->FOTO);
            } else {
                Session::put('foto', $url_imagenes."user-noimg.png");
            }

            return response()->json('ok');
        }

        // Si la autenticación falla, devolver un error
        return response()->json('Error');
    }

    // Verificar la contraseña, puedes adaptar esto si tus contraseñas están encriptadas
    private function checkPassword($inputPassword, $storedPassword)
    {
        // Si las contraseñas no están encriptadas
        return md5($inputPassword) === $storedPassword;

        // Si usas encriptación como bcrypt:
        // return password_verify($inputPassword, $storedPassword);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush(); // Limpiar todas las variables de sesión
        return redirect('/');     
    }

    public function createTestUser()
    {
        // Datos del nuevo usuario de prueba
        $nombreReal = "Técnico";
        $nombreUsuario = "cafeprime";
        $contrasena = "rat00nES";
        $provincia = "81dadc55efac4a70e9245d0e53c2be21";
        $idSesion = md5("cafeprime" . "_" . $contrasena); // Generar ID_SESION
        
        // Crear el usuario en la base de datos
        Usuario::create([
            'ID_USUARIO' => 1, // Aquí podrías generar un ID diferente si necesitas
            'NOMBRE' => $nombreReal,
            'USUARIO' => $nombreUsuario,
            'CONTRASENA' => password_hash($contrasena, PASSWORD_DEFAULT), // Generar la contraseña usando passwrod_hash
            'PROVINCIA' => $provincia,
            'ID_SESION' => $idSesion,
            'ROL' => 1, // Asignar el rol
        ]);

        return "Usuario de prueba creado exitosamente.";
    }
}
