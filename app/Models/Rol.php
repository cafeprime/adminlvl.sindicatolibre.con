<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'ID_ROL';
    
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['ID_ROL', 'ROL'];

    public $timestamps = false;
}

