<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

 //Se obtiene el valor de clave_centro_trabajo
$sbe = $_POST['sbe']; 
$cg = $_POST['cg'];
$sb = $_POST['sb'];
$cs = $_POST['cs'];
$cp = $_POST['cp'];
$ab = $_POST['ab'];
$aga = $_POST['aga'];
$bmr = $_POST['bmr'];
$cbmr = $_POST['cbmr'];
$ad = $_POST['ad'];
$adm = $_POST['adm'];
$psm = $_POST['psm'];
$asx = $_POST['asx'];
$sh = $_POST['sh'];
$fecha_ini = $_POST['fecha_ini'];
$fecha_fin = $_POST['fecha_fin'];
$id_cat_niveles = $_POST['id_cat_niveles'];
$id_cat_tipo_contratacion = $_POST['id_cat_tipo_contratacion'];
$id_cat_puesto = $_POST['id_cat_puesto'];
$id_cat_zona_tabuladores = $_POST['id_cat_zona_tabuladores'];



try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'tbl_tabuladores', array(
    'sbe' => $sbe,
    'cg' => $cg,   
    'sb' => $sb,
    'cs' => $cs,
    'cp' => $cp,
    'ab' => $ab,
    'aga' => $aga,
    'bmr' => $bmr,
    'cbmr' => $cbmr,
    'ad' => $ad,
    'adm' => $adm,
    'psm' => $psm,
    'asx' => $asx,
    'sh' => $sh,
    'fecha_ini' => $fecha_ini,
    'fecha_fin' => $fecha_fin,
    'id_cat_niveles' => $id_cat_niveles,
    'id_cat_tipo_contratacion' => $id_cat_tipo_contratacion,
    'id_cat_puesto' => $id_cat_puesto,
    'id_cat_zona_tabuladores' => $id_cat_zona_tabuladores
));

if ($pgs_QRY ) {
    header("Location: ../../view/Tabuladores/Listar.php"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}