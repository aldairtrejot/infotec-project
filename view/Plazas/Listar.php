<?php
include("../../php/RegimenFiscalC/listar.php");
include("../../php/CentroTrabajoC/Listar.php"); 
$id_tbl_centro_trabajo = ($_GET['RP']);
$rowx = catcentroTrabajo(base64_decode($id_tbl_centro_trabajo));
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    <style>
        a.dropdown-item:hover {
            background-color: #fbf4e8;
            ;
        }
    </style>
    <?php include("libHeader.php"); ?>

</head>

<body onload="messageInfo();">
    <?php include("../../conexion.php") ?>
    <?php include('../nav-menu.php') ?>
    <?php include("../../php/PlazasC/Listar.php") ?>
    <?php include("../../php/CatPlazasC/listar.php"); ?>
    <?php include("../../php/CatTipoContratacionC/listar.php"); ?>
    <?php include("../../php/CatUnidadResponsableC/listar.php"); ?>
    <?php include("../../php/CatPuestoC/Listar.php"); ?>
    <?php include("../../php/CatSituacionPlazaC/listar.php"); ?>
    <?php include("../../php/CatZonaTabuladoresC/Listar.php"); ?>
    <?php include("../../php/CatNivelesC1/Listar.php"); ?>
    <?php include("../../php/EmpleadosC/Listar.php"); ?>



    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Control de Plazas</h2>
                        <div class="d-flex align-items-center">
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../../index.php" style="color:#cb9f52;">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Control de Plazas</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">
            <p>Informaci&oacuten de centro de trabajo seleccionado.</p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">Clave de centro de trabajo:
                    <?php echo $rowx['clave_centro_trabajo']?>
                </p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">C&oacutedigo postal:
                    <?php echo $rowx['codigo_postal_origen']?>
                </p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">Nombre:
                    <?php echo $rowx['nombre']?>
                </p>
                <br>
                <div class=" btn-group">
                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" style="background-color: white; border:none; outline:none; color: white;">
                        <i class="fa fa-cog" style="font-size: 1.4rem; color:#9f2241;"></i>
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item"
                            href="<?php echo 'Agregar.php?RP=' . $id_tbl_centro_trabajo ?>">Agregar</a>
                        <a class="dropdown-item" href="<?php echo '../CentroTrabajo/Listar.php' ?>">Regresar</a>
                    </div>
                </div>

                <table class="table table-striped" id="t-usuarios">
                    <thead>
                        <tr style="background-color: #5c5c5c;">
                            <th style="color: white;">Acciones</th>
                            <th style="color: white;">Codigo de Empleado</th>
                            <th style="color: white;">Nombre Empleado</th>
                            <th style="color: white;">RFC</th>
                            <th style="color: white;">Numero plaza</th>
                            <th style="color: white;">Plaza</th>
                            <th style="color: white;">Tipo contratacion</th>
                            <th style="color: white;">Situacion plaza</th>
                            <th style="color: white;">Unidad Responsable</th>
                            <th style="color: white;">Puesto</th>
                            <th style="color: white;">Zonas tabuladores</th>
                            <th style="color: white;">Niveles</th>
                            <th style="color: white;">Zona pagadora</th>
                            <th style="color: white;">Fecha Inicio</th>
                            <th style="color: white;">Fecha Fin</th>
                            <th style="color: white;">Fecha modificacion</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (isset($_GET['CP3'])) {
                            $listado = listadoPlazasCPk(base64_decode($_GET['CP3']));
                        } else {
                            $listado = listadoPlazas(base64_decode($id_tbl_centro_trabajo));
                        }
                        if ($listado) {
                            if (pg_num_rows($listado) > 0) {
                                while ($obj = pg_fetch_object($listado)) { ?>
                                    <tr>
                                        <td>

                                            <!-- Button more acctions -->
                                            <div class=" btn-group">
                                                <button type="button" class="btn btn-light" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    style="background-color: transparent; border:none; outline:none; color: white;">
                                                    <i class="fa fa-cog" style="font-size: 1.4rem; color:#cb9f52;"></i>
                                                </button>
                                                <div class="dropdown-menu" <?php if(pg_num_rows($listado) == 1){echo 'style="height: 130%; overflow: auto;"';}?>>
                                                    <a class="dropdown-item"
                                                        href="<?php echo "Editar.php?D-F=" . base64_encode($obj->id_tbl_control_plazas) . '&RP=' . $id_tbl_centro_trabajo ?>">Modificar</a>
                                                    <a class="dropdown-item"
                                                        href="<?php echo "../Empleados/Listar.php?D-F3=" . base64_encode($obj->id_tbl_control_plazas) . '&RP=' . $id_tbl_centro_trabajo ?>">Empleado</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" data-toggle="modal"
                                                        data-target="<?php echo '#modal-' . $obj->id_tbl_control_plazas ?>">Eliminar</a>
                                                </div>
                                            </div>

                                            <!-- MODAL ELIMINAR -->
                                            <div class="modal fade" id="<?php echo 'modal-' . $obj->id_tbl_control_plazas ?>"
                                                tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">¿Desea Continuar?</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            La accion de eliminar no se puede rehacer.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancelar</button>
                                                            <a class="btn btn-danger"
                                                                href="<?php echo "../../php/PlazasC/Eliminar.php?D-F=" . base64_encode($obj->id_tbl_control_plazas) . '&RP=' . $id_tbl_centro_trabajo ?>">Eliminar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- MODAL ELIMINAR -->
                                        </td>
                                        <td>
                                            <?php echo codigoEmpleado($obj->id_tbl_control_plazas) ?>
                                        </td>
                                        <td>
                                            <?php echo nombreEmpleado($obj->id_tbl_control_plazas) ?>
                                        </td>
                                        <td>
                                            <?php echo rfcEmpleado($obj->id_tbl_control_plazas) ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->num_plaza ?>
                                        </td>
                                        <td>
                                            <?php echo catalogoPlazaPk($obj->id_cat_plazas); ?>
                                        </td>
                                        <td>
                                            <?php echo catalogoContratacionPk($obj->id_cat_tipo_contratacion) ?>
                                        </td>
                                        <td>
                                            <?php echo listadoSituacionPlazaPk($obj->id_cat_situacion_plaza) ?>
                                        </td>
                                        <td>
                                            <?php echo catPk($obj->id_cat_unidad_reponsable) ?>
                                        </td>
                                        <td>
                                            <?php echo catalogoPuestoPk($obj->id_cat_puesto) ?>
                                        </td>
                                        <td>
                                            <?php echo catalogoZonaPk($obj->id_cat_zonas_tabuladores) ?>
                                        </td>
                                        <td>
                                            <?php echo catalogoNivelesPk($obj->id_cat_niveles) ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->zona_pagadora ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->fecha_ini_contrato ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->fecha_fin_contrato ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->fecha_modificacion ?>
                                        </td>

                                    </tr>
                                    <?php
                                }
                            } else
                                echo "<p></p>";
                        }
                        ?>

                        <?php include('../../ajuste-menu.php') ?>
                        <?php include('../../footer-librerias.php') ?>

            </div>
        </div>
        <input type="hidden" id="messageInfo" value="<?php echo base64_decode($_GET['MS3']); ?>">
</body>

<script>
    function messageInfo() {
        let messageInfo = document.getElementById("messageInfo").value;
        if (messageInfo == 1) {
            messajeError('No es posible eliminar una plaza que tenga empleados.');
        }
    }
</script>


<script>
    $(document).ready(function () {
        $('#t-usuarios').DataTable({
            scrollX: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            responsive: "true",
            dom: 'Bfrtilp',
            buttons: [

            ],
        }

        );
    });


</script>
<?php include("libFooter.php"); ?>

</html>