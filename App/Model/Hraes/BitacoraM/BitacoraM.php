<?php

$timestamp = date('Y-m-d H:i:s');
class BitacoraM
{
    function agregarByArray1($conexion, $datos,$nombre)
    {
        $pg_add = pg_insert($conexion, $nombre, $datos);
        return $pg_add;
    }
}
