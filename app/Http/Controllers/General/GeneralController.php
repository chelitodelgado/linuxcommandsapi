<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages))
            $response['data'] = $errorMessages;


        return response()->json($response, $code);
    }

    public function validarUsuario($id) {

        try {
            User::findOrFail([
                'id' => $id
            ]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }

    }

}

// $query = "
// 		SELECT
// 			u.clave AS folio, CONCAT(u.nombre, '', u.apellido) AS nombre_becario, u.telefono AS tel_contacto, u.email AS correo,
// 			IF(u.estatus, 'Aceptado', 'Declinado') AS status_becario, u.fecha AS fecha_alta, u.tutor_asignado AS tutor,
// 			CONCAT(u.escolaridad, ' en ', u.carrera) AS escolaridad_becario, TIMESTAMPDIFF(YEAR, u.fecha_nacimiento ,CURDATE()) AS edad,
// 			CONCAT(t.nombre,'', t.apellido) as tutor, t.id AS num_empleado_tutor, t.email AS correo_tutor,
// 			IF(u.sexo, u.sexo, '') AS genero,
// 			c.nombre as  centro_trabajo, c.id AS consecutivo_stps,
// 			s.nombre as posicion_stps,
// 			p.id_usuario AS usuario_postulado
// 		from postulaciones as p
// 		join usuarios as u on u.id = p.id_usuario
// 		join usuarios as t ON u.tutor_asignado = t.id
// 		join centros_trabajo as c on c.id = u.id_centro_trabajo
// 		join subpuestos_claves as s on s.id = u.id_puesto_clave
// 		WHERE date_format(u.fecha,'%Y-%m-%d') >= '$fecha_inicio' && date_format(u.fecha,'%Y-%m-%d') <= '$fecha_fin'
// 		GROUP BY u.id ORDER BY consecutivo_stps asc ";
