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

<body>
    <?php include("../../conexion.php") ?>
    <?php include('../nav-menu.php') ?>
    <?php include("../../php/CentroTrabajoC/Listar.php") //Se incluye la libreria para generar su tabla                 ?>
    <?php include("../../php/CatRegionC/Listar.php") //Se incluye la libreria para generar las sql para el catalogo de region                 ?>
    <?php include("../../php/CatEstatusC/Listar.php") //Se incluye la libreria para generar las sql para el catalogo de estatus                 ?>


    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Centro de Trabajo</h2>
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
                                    <li class="breadcrumb-item active" aria-current="page">Centro de Trabajo</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">
                <p>La sig. tabla muestra informacion de centro de trabajo.</p>
                <div class=" btn-group">
                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" style="background-color: white; border:none; outline:none; color: white;">
                        <i class="fa fa-cog" style="font-size: 1.4rem; color:#9f2241;"></i>
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo 'Agregar.php' ?>">Agregar</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#modal-serarch">Buscar</a>
                    </div>
                </div>
                <table class="table table-striped" id="t-usuarios">
                    <thead>
                        <tr style="background-color: #5c5c5c;">
                            <th style="color: white;">Acciones</th>
                            <th style="color: white;">id</th>
                            <th style="color: white;">Clave de Centro de Trabajo</th>
                            <th style="color: white;">Nombre</th>
                            <th style="color: white;">Pais</th>
                            <th style="color: white;">Colonia</th>
                            <th style="color: white;">Codigo Postal</th>
                            <th style="color: white;">Numero Exterior</th>
                            <th style="color: white;">Numero Interior</th>
                            <th style="color: white;">Latitud</th>
                            <th style="color: white;">Longitud</th>
                            <th style="color: white;">Cat-sepomex</th>
                            <th style="color: white;">Region</th>
                            <th style="color: white;">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
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
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="<?php echo "Editar.php?D-F=" . base64_encode($obj->id_tbl_centro_trabajo) ?>">Modificar</a>
                                                    <a class="dropdown-item"
                                                        href="<?php echo "../RegistroPatronal/Listar.php?D-F=" . base64_encode($obj->id_tbl_centro_trabajo) ?>">Registro
                                                        Patronal</a>
                                                    <a class="dropdown-item"
                                                        href="<?php echo "../ZonasPago/Listar.php?D-F=" . base64_encode($obj->id_tbl_centro_trabajo) ?>">Zonas
                                                        de Pago</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item"
                                                        href="<?php echo "../../php/CentroTrabajoC/Eliminar.php?CT=" . base64_encode($obj->id_tbl_centro_trabajo) ?>">Eliminar</a>
                                                </div>
                                            </div>

                                            <!-- MODAL ELIMINAR -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                href="<?php echo "../../php/CentroTrabajoC/Eliminar.php?CT=" . base64_encode($obj->id_tbl_centro_trabajo) ?>">Eliminar1</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- MODAL ELIMINAR -->
                                        </td>
                                        <td>
                                            <?php echo $obj->id_tbl_centro_trabajo ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->clave_centro_trabajo ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->nombre ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->pais ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->colonia_origen ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->codigo_postal_origen ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->num_exterior ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->num_interior ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->latitud ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->longitud ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->id_cat_sepomex ?>
                                        </td>
                                        <td>
                                            <?php echo catRegionRegion($obj->id_cat_region) ?>
                                        </td>
                                        <td>
                                            <?php echo catEstatus($obj->id_estatus_centro) ?>
                                        </td>

                                    </tr>
                                    <?php
                                }
                            } else
                                echo "<p>Sin Resultados</p>";
                        }
                        ?>
                    </tbody>
                    <?php include('../../ajuste-menu.php') ?>
                    <?php include('../../footer-librerias.php') ?>

            </div>
        </div>


        <!-- Modal -->
        <div style="display: none" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Emil</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>16</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal AGREGAR PRODUCTOS-->
        <div class="modal fade bd-example-modal-lg" id="modal-serarch" tabindex="-1" role="dialog"
            aria-labelledby="newModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Buscar Productos</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <label>Campo de busqueda</label><label style="color:red">*</label>
                        <input type="text" class="form-control" onkeyup="search();" id="idSearch" name="curp"
                            placeholder="CURP/RFC/">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-search">

                            </table>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal AGREGAR-->





</body>

<script>
    function search() {
        let idSearch = document.getElementById("idSearch").value;
        console.log(idSearch);

        $.ajax({
            type: 'POST',
            url: '../../php/EmpleadosC/busqueda.php',
            data: { idSearch: idSearch },
            success: function (data) {
                $('#table-search').html(data);
            }
        });
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