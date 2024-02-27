<?php
include('../../validar_sesion.php'); //Se incluye validar_sesion
include('../../conexion.php'); // Se incluye la conexion a la db

$id_tbl_empleados = base64_decode($_GET['D-F']);
$id_ctrl_contacto_emergencia = base64_decode($_GET['D-F2']); 
$crypt = base64_encode ($id_tbl_empleados);

try {
$pgs_QRY = pg_delete(
    $connectionDBsPro,
    'ctrl_contacto_emergencia',
    array(
        'id_ctrl_contacto_emergencia' => $id_ctrl_contacto_emergencia
    )
);
if ($pgs_QRY ) {
    header("Location: ../../view/ContactoEmergencia/Listar.php?D-F=".$crypt); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}

