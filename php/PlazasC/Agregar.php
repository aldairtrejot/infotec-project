<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$id_tbl_centro_trabajo = base64_decode($_POST["id_tbl_centro_trabajo"]); 
$num_plaza = $_POST["num_plaza"]; 
$id_cat_plazas = $_POST["id_cat_plazas"]; 
$id_cat_tipo_contratacion = $_POST["id_cat_tipo_contratacion"]; 
$id_cat_unidad_responsable = $_POST["id_cat_unidad_responsable"]; 
$id_cat_puesto = $_POST["id_cat_puesto"]; 
$id_cat_zonas_tabuladores = $_POST["id_cat_zonas_tabuladores"]; 
$id_cat_niveles = $_POST["id_cat_niveles"]; 
$zona_pagadora = $_POST["zona_pagadora"]; 
$fecha_ini_contrato = $_POST["fecha_ini_contrato"]; 
$fecha_modificacion = $_POST["fecha_modificacion"]; 
$fecha_fin_contrato = $_POST["fecha_fin_contrato"]; 
$id_cat_situacion_plaza = $_POST["id_cat_situacion_plaza"]; 
$id_tbl_centro_trabajoCryp = base64_encode($id_tbl_centro_trabajo);

try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'tbl_control_plazas', array(
    'num_plaza' => $num_plaza,
    'id_cat_plazas' => $id_cat_plazas,
    'id_cat_tipo_contratacion' => $id_cat_tipo_contratacion,
    'id_cat_unidad_reponsable' => $id_cat_unidad_responsable,
    'id_cat_puesto' => $id_cat_puesto,
    'id_cat_zonas_tabuladores' => $id_cat_zonas_tabuladores,
    'id_cat_niveles' => $id_cat_niveles,
    'id_tbl_centro_trabajo' => $id_tbl_centro_trabajo,
    'zona_pagadora' => $zona_pagadora,
    'fecha_ini_contrato' => $fecha_ini_contrato,
    'fecha_modificacion' => $fecha_modificacion,
    'fecha_fin_contrato' => $fecha_fin_contrato,
    'id_cat_situacion_plaza' => $id_cat_situacion_plaza,
));

if ($pgs_QRY ) {
    header("Location: ../../view/Plazas/Listar.php?RP=".$id_tbl_centro_trabajoCryp); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}