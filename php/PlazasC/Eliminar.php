<?php
include('../../validar_sesion.php'); //Se incluye validar_sesion
include('../../conexion.php'); // Se incluye la conexion a la db

$id_tbl_control_plazas = base64_decode($_GET['D-F']); //Se obtiene el valor de CT encript 

if (isset($id_tbl_control_plazas)) {
    try {
        $pgs_QRY = pg_delete(
            $connectionDBsPro,
            'tbl_control_plazas',
            array(
                'id_tbl_control_plazas' => $id_tbl_control_plazas
            )
        );
        if ($pgs_QRY) {
            header("Location: ../../view/Plazas/Listar.php"); //Regreso a la tabla
        } else {
            $messageError = base64_encode($messageError = 1);
            header("Location: ../../view/Plazas/Listar.php?MS3=".$messageError); //Regreso a la tabla
        }
    } catch (\Throwable $th) {
        header("Location: error.php" . $th); //Muestra error
    }
}