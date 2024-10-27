<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable
{
    use AuthenticableTrait; // Implementa los métodos que requiere Laravel para la autenticación

    protected $table = 'usuarios'; // Nombre de la tabla personalizada
    protected $primaryKey = 'ID_USUARIO'; // Definir la clave primaria

    // Laravel por defecto espera que la clave primaria sea un entero autoincremental
    // Si tu clave no es autoincremental ni un entero, desactiva esta opción
    public $incrementing = false;
    protected $keyType = 'string';

    // Definir los campos que se pueden asignar en masa (para seguridad)
    protected $fillable = [
        'ID_USUARIO', 'NOMBRE', 'USUARIO', 'CONTRASENA', 'PROVINCIA', 
        'ID_SESION', 'ROL', 'FOTO', 'ACTIVADO'
    ];

    // Deshabilitar timestamps si no estás usando las columnas created_at/updated_at
    public $timestamps = false;

    // Laravel usa la columna 'password' por defecto, renombra la columna aquí
    public function getAuthPassword()
    {
        return $this->CONTRASENA;
    }

    // Relación con la tabla roles
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'ROL', 'ID_ROL');
    }
}
