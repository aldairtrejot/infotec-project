<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$id_tbl_datos_empleado = $_POST['id_tbl_datos_empleado']; 
$pais_nacimiento = $_POST['pais_nacimiento']; 
$id_cat_genero = $_POST['id_cat_genero']; 
$id_cat_estado_civil = $_POST['id_cat_estado_civil']; 
$id_cat_nivel_estudios = $_POST['id_cat_nivel_estudios']; 
$crypt = base64_encode($id_tbl_empleados);

try {
//El array trae la condicion
$arrayCondition = array(
    'id_tbl_datos_empleado' => $id_tbl_datos_empleado
);

$arrayUpdate = array(
    'pais_nacimiento' => $pais_nacimiento,
    'id_cat_genero' => $id_cat_genero,  
    'id_cat_estado_civil' => $id_cat_estado_civil,   
    'id_cat_nivel_estudios' => $id_cat_nivel_estudios
);
$pgs_QRY = pg_update($connectionDBsPro, 'tbl_datos_empleado', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/DatosEmpleado/Listar.php?D-F=".$crypt); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}