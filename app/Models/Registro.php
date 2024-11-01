<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    public function scopeFiltrarRegistros($query, $roleId, $provinciaId, $tipo)
    {
        // Join y select básico
        $query->select(
                  'provincias.ID_PROVINCIA',
                  'provincias.PROVINCIA',
                  'registros.IDREGISTRO',
                  'registros.NOMBRE',
                  'registros.APELLIDO1',
                  'registros.APELLIDO2',
                  'registros.DNI',
                  'registros.DNI_LETRA',
                  'registros.EMAIL',
                  'registros.TELEFONO',
                  'registros.FECHA_INSCRIPCION',
                  'registros.FECHA_MODIFICACION',
                  'registros.FECHA_ELIMINACION',
                  'roles.ROL as rol_nombre',
                  'registros.ELIMINADO_POR'
              )
              ->leftJoin('provincias', 'registros.PROVINCIA', '=', 'provincias.ID_PROVINCIA')
              ->leftJoin('usuarios', 'registros.ELIMINADO_POR', '=', 'usuarios.ID_USUARIO')
              ->leftJoin('roles', 'usuarios.ROL', '=', 'roles.ID_ROL');

        // Condiciones basadas en el rol del usuario
        switch ($roleId) {
            case 'Superadmin':
                if ($provinciaId) {
                    $query->where('provincias.ID_PROVINCIA', $provinciaId);
                }
                break;

            case 'Admincursos':
                $query->leftJoin('relaciones_registros_cursos', 'registros.IDREGISTRO', '=', 'relaciones_registros_cursos.ID_REGISTRO')
                      ->addSelect('relaciones_registros_cursos.ID_CURSO as curso_id')
                      ->groupBy('registros.IDREGISTRO');
                if ($provinciaId) {
                    $query->where('provincias.ID_PROVINCIA', $provinciaId);
                }
                break;

            case 'Adminplan2':
                $query->leftJoin('fppf', 'registros.IDREGISTRO', '=', 'fppf.IDREGISTRO')
                      ->addSelect(
                          'registros.PLAN2',
                          'fppf.FASJ_PRODUCTOS',
                          'fppf.FASJ_DISTRIBUCION',
                          'fppf.FASJ_CENTROS',
                          'fppf.FAJE_PRODUCTOS',
                          'fppf.FAJE_DISTRIBUCION',
                          'fppf.FAJE_CENTROS'
                      )
                      ->groupBy('registros.IDREGISTRO')
                      ->where(function ($query) {
                          $query->where('registros.PLAN2', 1)
                                ->orWhere('fppf.FASJ_PRODUCTOS', 1)
                                ->orWhere('fppf.FASJ_DISTRIBUCION', 1)
                                ->orWhere('fppf.FASJ_CENTROS', 1)
                                ->orWhere('fppf.FAJE_PRODUCTOS', 1)
                                ->orWhere('fppf.FAJE_DISTRIBUCION', 1)
                                ->orWhere('fppf.FAJE_CENTROS', 1);
                      });
                if ($provinciaId) {
                    $query->where('provincias.ID_PROVINCIA', $provinciaId);
                }
                break;

            default: // Administrador y otros roles
                $query->where('registros.PROVINCIA', $provinciaId)
                      ->whereNull('registros.FECHA_ELIMINACION');
                break;
        }

        // Filtrar por tipo de registro (activo, eliminado, todos)
        if ($tipo == 1) {
            $query->whereNull('registros.FECHA_ELIMINACION'); // Solo activos
        } elseif ($tipo == 2) {
            $query->whereNotNull('registros.FECHA_ELIMINACION'); // Solo eliminados
        }
        $query->orderBy('registros.FECHA_INSCRIPCION', 'desc')
                     ->orderBy('registros.IDREGISTRO', 'desc');
        return $query;

        //LA QUERY ANTERIOR VIENE DE ESTE PROCEDIMIENTO ALMACENADO DE LA ANTIGUA APP
        // CREATE DEFINER=`adminuser01`@`%` PROCEDURE `sp_listar_registros`(
        //     IN p INT,
        //     IN f INT,
        //     IN id_re INT,
        //     IN sp_prov INT,
        //     IN sp_tip INT
        // )
        // BEGIN
        
        //       -- zona del Superadmin
        //     IF id_re = 0 THEN
        //         IF sp_prov > 0 THEN        
        //             SELECT
        //                 provincias.ID_PROVINCIA, 
        //                 provincias.PROVINCIA, 
        //                 registros.IDREGISTRO, 
        //                 registros.NOMBRE, 
        //                 registros.APELLIDO1, 
        //                 registros.APELLIDO2, 
        //                 registros.DNI, 
        //                 registros.DNI_LETRA, 
        //                 registros.EMAIL, 
        //                 registros.TELEFONO, 
        //                 registros.FECHA_INSCRIPCION, 
        //                 registros.FECHA_MODIFICACION, 
        //                 registros.FECHA_ELIMINACION, 
        //                 roles.ROL, 
        //                 registros.ELIMINADO_POR
        //             FROM
        //                 registros
        //                 LEFT JOIN provincias ON registros.PROVINCIA = provincias.ID_PROVINCIA
        //                 LEFT JOIN usuarios ON registros.ELIMINADO_POR = usuarios.ID_USUARIO
        //                 LEFT JOIN roles ON usuarios.ROL = roles.ID_ROL
        //             WHERE provincias.ID_PROVINCIA = sp_prov 
        //             AND ((sp_tip = 1 AND registros.FECHA_ELIMINACION IS NULL) OR 
        //                  (sp_tip = 2 AND registros.FECHA_ELIMINACION IS NOT NULL) OR 
        //                  sp_tip = 0)
        //             ORDER BY registros.FECHA_INSCRIPCION DESC, registros.IDREGISTRO DESC
        //             LIMIT p, f;
        //         ELSE
        //             SELECT
        //                 provincias.ID_PROVINCIA, 
        //                 provincias.PROVINCIA, 
        //                 registros.IDREGISTRO, 
        //                 registros.NOMBRE, 
        //                 registros.APELLIDO1, 
        //                 registros.APELLIDO2, 
        //                 registros.DNI, 
        //                 registros.DNI_LETRA, 
        //                 registros.EMAIL, 
        //                 registros.TELEFONO, 
        //                 registros.FECHA_INSCRIPCION, 
        //                 registros.FECHA_MODIFICACION, 
        //                 registros.FECHA_ELIMINACION, 
        //                 roles.ROL, 
        //                 registros.ELIMINADO_POR
        //             FROM
        //                 registros
        //                 LEFT JOIN provincias ON registros.PROVINCIA = provincias.ID_PROVINCIA
        //                 LEFT JOIN usuarios ON registros.ELIMINADO_POR = usuarios.ID_USUARIO
        //                 LEFT JOIN roles ON usuarios.ROL = roles.ID_ROL
        //             WHERE ((sp_tip = 1 AND registros.FECHA_ELIMINACION IS NULL) OR 
        //                    (sp_tip = 2 AND registros.FECHA_ELIMINACION IS NOT NULL) OR 
        //                    sp_tip = 0)
        //             ORDER BY registros.FECHA_INSCRIPCION DESC, registros.IDREGISTRO DESC
        //             LIMIT p, f;
        //         END IF;
            
        //     -- zona del Admincursos
        //     ELSEIF id_re = 1 THEN
        //         IF sp_prov > 0 THEN    
        //             SELECT
        //                 provincias.ID_PROVINCIA, 
        //                 provincias.PROVINCIA, 
        //                 registros.IDREGISTRO, 
        //                 registros.NOMBRE, 
        //                 registros.APELLIDO1, 
        //                 registros.APELLIDO2, 
        //                 registros.DNI, 
        //                 registros.DNI_LETRA, 
        //                 registros.EMAIL, 
        //                 registros.TELEFONO, 
        //                 registros.FECHA_INSCRIPCION, 
        //                                 registros.FECHA_ELIMINACION, 
        //                 MAX(relaciones_registros_cursos.ID_CURSO) AS ID_CURSO
        //             FROM
        //                 registros
        //                 LEFT JOIN provincias ON registros.PROVINCIA = provincias.ID_PROVINCIA
        //                 LEFT JOIN relaciones_registros_cursos ON registros.IDREGISTRO = relaciones_registros_cursos.ID_REGISTRO
        //             WHERE provincias.ID_PROVINCIA = sp_prov 
        //             AND ((sp_tip = 1 AND registros.FECHA_ELIMINACION IS NULL) OR 
        //                  (sp_tip = 2 AND registros.FECHA_ELIMINACION IS NOT NULL) OR 
        //                  sp_tip = 0)
        //             GROUP BY registros.IDREGISTRO
        //             ORDER BY registros.FECHA_INSCRIPCION DESC, registros.IDREGISTRO DESC
        //             LIMIT p, f;
        //         ELSE
        //             SELECT
        //                 provincias.ID_PROVINCIA, 
        //                 provincias.PROVINCIA, 
        //                 registros.IDREGISTRO, 
        //                 registros.NOMBRE, 
        //                 registros.APELLIDO1, 
        //                 registros.APELLIDO2, 
        //                 registros.DNI, 
        //                 registros.DNI_LETRA, 
        //                 registros.EMAIL, 
        //                 registros.TELEFONO, 
        //                 registros.FECHA_INSCRIPCION, 
        //                                 registros.FECHA_ELIMINACION, 
        //                 MAX(relaciones_registros_cursos.ID_CURSO) AS ID_CURSO
        //             FROM
        //                 registros
        //                 LEFT JOIN provincias ON registros.PROVINCIA = provincias.ID_PROVINCIA
        //                 LEFT JOIN relaciones_registros_cursos ON registros.IDREGISTRO = relaciones_registros_cursos.ID_REGISTRO
        //             WHERE ((sp_tip = 1 AND registros.FECHA_ELIMINACION IS NULL) OR 
        //                    (sp_tip = 2 AND registros.FECHA_ELIMINACION IS NOT NULL) OR 
        //                    sp_tip = 0)
        //             GROUP BY registros.IDREGISTRO
        //             ORDER BY registros.FECHA_INSCRIPCION DESC, registros.IDREGISTRO DESC
        //             LIMIT p, f;
        //         END IF;
            
        //     -- zona del Adminplan2
        //     ELSEIF id_re = 2 THEN
        //         IF sp_prov > 0 THEN    
        //             SELECT
        //                 provincias.ID_PROVINCIA,
        //                 provincias.PROVINCIA,
        //                 registros.IDREGISTRO,
        //                 registros.NOMBRE,
        //                 registros.APELLIDO1,
        //                 registros.APELLIDO2,
        //                 registros.DNI,
        //                 registros.DNI_LETRA,
        //                 registros.EMAIL,
        //                 registros.TELEFONO,
        //                 registros.FECHA_INSCRIPCION,
        //                                 registros.FECHA_ELIMINACION, 
        //                 registros.PLAN2,
        //                 fppf.FASJ_PRODUCTOS,
        //                 fppf.FASJ_DISTRIBUCION,
        //                 fppf.FASJ_CENTROS,
        //                 fppf.FAJE_PRODUCTOS,
        //                 fppf.FAJE_DISTRIBUCION,
        //                 fppf.FAJE_CENTROS 
        //             FROM
        //                 registros
        //                 LEFT JOIN provincias ON registros.PROVINCIA = provincias.ID_PROVINCIA
        //                 LEFT JOIN fppf ON registros.IDREGISTRO = fppf.IDREGISTRO 
        //             WHERE provincias.ID_PROVINCIA = sp_prov 
        //             AND ((sp_tip = 1 AND registros.FECHA_ELIMINACION IS NULL) OR 
        //                  (sp_tip = 2 AND registros.FECHA_ELIMINACION IS NOT NULL) OR 
        //                  sp_tip = 0)
        //             AND (registros.PLAN2 = 1 
        //                  OR fppf.FASJ_PRODUCTOS = 1 
        //                  OR fppf.FASJ_DISTRIBUCION = 1 
        //                  OR fppf.FASJ_CENTROS = 1 
        //                  OR fppf.FAJE_PRODUCTOS = 1 
        //                  OR fppf.FAJE_DISTRIBUCION = 1 
        //                  OR fppf.FAJE_CENTROS = 1) 
        //             GROUP BY registros.IDREGISTRO 
        //             ORDER BY registros.FECHA_INSCRIPCION DESC, registros.IDREGISTRO DESC
        //             LIMIT p, f;
        //         ELSE
        //             SELECT
        //                 provincias.ID_PROVINCIA,
        //                 provincias.PROVINCIA,
        //                 registros.IDREGISTRO,
        //                 registros.NOMBRE,
        //                 registros.APELLIDO1,
        //                 registros.APELLIDO2,
        //                 registros.DNI,
        //                 registros.DNI_LETRA,
        //                 registros.EMAIL,
        //                 registros.TELEFONO,
        //                 registros.FECHA_INSCRIPCION,
        //                                 registros.FECHA_ELIMINACION, 
        //                 registros.PLAN2,
        //                 fppf.FASJ_PRODUCTOS,
        //                 fppf.FASJ_DISTRIBUCION,
        //                 fppf.FASJ_CENTROS,
        //                 fppf.FAJE_PRODUCTOS,
        //                 fppf.FAJE_DISTRIBUCION,
        //                 fppf.FAJE_CENTROS 
        //             FROM
        //                 registros
        //                 LEFT JOIN provincias ON registros.PROVINCIA = provincias.ID_PROVINCIA
        //                 LEFT JOIN fppf ON registros.IDREGISTRO = fppf.IDREGISTRO 
        //             WHERE ((sp_tip = 1 AND registros.FECHA_ELIMINACION IS NULL) OR 
        //                    (sp_tip = 2 AND registros.FECHA_ELIMINACION IS NOT NULL) OR 
        //                    sp_tip = 0)
        //             AND (registros.PLAN2 = 1 
        //                  OR fppf.FASJ_PRODUCTOS = 1 
        //                  OR fppf.FASJ_DISTRIBUCION = 1 
        //                  OR fppf.FASJ_CENTROS = 1 
        //                  OR fppf.FAJE_PRODUCTOS = 1 
        //                  OR fppf.FAJE_DISTRIBUCION = 1 
        //                  OR fppf.FAJE_CENTROS = 1) 
        //             GROUP BY registros.IDREGISTRO 
        //             ORDER BY registros.FECHA_INSCRIPCION DESC, registros.IDREGISTRO DESC
        //             LIMIT p, f;
        //         END IF;
        //     -- zona del Administrador
        //     ELSE
        //         SELECT
        //             provincias.PROVINCIA, 
        //             registros.IDREGISTRO, 
        //             registros.NOMBRE, 
        //             registros.APELLIDO1, 
        //             registros.APELLIDO2, 
        //             registros.DNI, 
        //             registros.DNI_LETRA, 
        //             registros.EMAIL, 
        //             registros.TELEFONO, 
        //             registros.FECHA_INSCRIPCION
        //         FROM
        //             registros      
        //         INNER JOIN provincias ON registros.PROVINCIA = provincias.ID_PROVINCIA
        //         WHERE registros.PROVINCIA = sp_prov AND FECHA_ELIMINACION IS NULL
        //         ORDER BY registros.FECHA_INSCRIPCION DESC, registros.IDREGISTRO DESC
        //         LIMIT p, f;
        //     END IF;    
        // END
    }
}
