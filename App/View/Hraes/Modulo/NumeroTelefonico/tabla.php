<?php
include '../../../../../conexion.php';
include '../../../../Model/Hraes/TelefonoM/TelefonoM.php';

$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$paginador = $_POST['paginador'];
$modelTelefonoM = new ModelTelefonoM();

$listado = $modelTelefonoM ->listarById($id_tbl_empleados_hraes,$paginador);
if(isset($_POST['busqueda'])){
    $listado = $modelTelefonoM->listarByBusqueda($id_tbl_empleados_hraes,$_POST['busqueda'],$paginador);
}

$data =
    '<table class="table table-sm" id="modulo_telefono" style="width:100%">
    <thead>
        <tr>
            <th style="background:#e5e7e8">Acciones</th>
            <th style="background:#e5e7e8">N&uacutem. telefonico</th>
            <!--
            <th style="background:#e5e7e8">Tel&eacutefono fijo</th>
            -->
            <th style="background:#e5e7e8">Estatus</th>
        </tr>
    </thead>';

if (pg_num_rows($listado) > 0) {
    while ($row = pg_fetch_row($listado)) {
        $data .=
            '<tbody>
                        <tr>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sucess dropdown-toggle table-button-style" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i></button>
                            <div class="dropdown-menu">
                                <button onclick="agregarEditarTelefono(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="fas fa-edit"></i> Modificar</button>
                                <button onclick="eliminarTelefono(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="far fa-trash-alt button-table-on-delete"></i> Eliminar</button>   
                            </div>
                          </div>
                                </td>
                            <td>
                                ' . $row[1] . '
                            </td>
                            <!--
                            <td>
                                ' . $row[2] . '
                            </td>
                            -->
                            <td>
                                ' . $row[3] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
} else {
    $data .= '<h6>Sin resultados</h6>';
}

echo $data;
