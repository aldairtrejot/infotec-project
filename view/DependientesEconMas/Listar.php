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
    <?php include ("libHeader.php"); ?>

</head>

<body>
    <?php include ("../../conexion.php") ?>
    <?php include ('../nav-menu.php') ?>


    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">M&aacutes Datos</h2>
                        <h4 class="page-title">Dependientes Econ&oacutemicos</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Carga Masiva (Dependientes
                                        Econ&oacutemicos)</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">
                <p>M&oacutedulo de cargas masivas.</p>
                <div class=" btn-group">
                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" style="background-color: white; border:none; outline:none; color: white;">
                        <i class="fa fa-cog" style="font-size: 1.4rem; color:#9f2241;"></i>
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter">Importar</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter">Descargar
                            Plantilla</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        Instrucciones
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source
                                    Title</cite></footer>
                        </blockquote>
                    </div>
                </div>

                <!-- MODAL CARGA MASIVA -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Carga Masiva (Dependientes
                                    Econ&oacutemicos)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="../../php/DependientesEcoMC/CargaMasiva.php" method="post"
                                    enctype="multipart/form-data">
                                    <label for="formFile" class="form-label">Ingrese el archivo</label>
                                    <input class="form-control" type="file" id="formFile" name="archivo" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Cancelar</button>
                                <button type="submit" class="btn btn-secondary"
                                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Importar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include ('../../ajuste-menu.php') ?>
                <?php include ('../../footer-librerias.php') ?>

            </div>
        </div>

        <div id="myModalExito" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Control de Registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <h6 style="color: green">Total de registros agregados: <?php echo base64_decode($_GET['Re']) ?></h6>
                    <h6 style="color: red">Total de registros erroneos: <?php echo base64_decode($_GET['Rr']) ?></h6>
                    <br>
                    <table class="table table-striped" id="t-usuarios">
                    <thead>
                        <tr style="background-color: #5c5c5c;">
                            <th style="color: white;">Estatus</th>
                            <th style="color: white;">RFC Empleado</th>
                            <th style="color: white;">CURP Empleado</th>
                            <th style="color: white;">CURP Menor</th>
                            <th style="color: white;">Nombre</th>
                            <th style="color: white;">Apellido Paterno</th>
                            <th style="color: white;">Apellido Materno</th>
                            <th style="color: white;">Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        $roEx = pg_query("SELECT * FROM tmp_error_dependientes_economicos");
                        if ($roEx) {
                            if (pg_num_rows($roEx) > 0) {
                                while ($obj = pg_fetch_object($roEx)){?>
                                    <tr>
                                    <td> <?php echo $obj->estatus ?></td>    
                                    <td> <?php echo $obj->rfc_empleado ?></td>
                                    <td><?php  echo $obj->curp_empleado ?></td>
                                    <td><?php  echo $obj->curp_menor ?></td>
                                    <td><?php  echo $obj->nombre ?></td>
                                    <td><?php  echo $obj->apellido_paterno ?></td>
                                    <td><?php  echo $obj->apellido_materno ?></td>
                                    <td><?php  echo $obj->descripcion ?></td>
                                </tr>
                                    <?php
                                }
                            } else
                         echo "<p>Sin Resultados</p>";
                        }
                        ?>
                    </tbody>
                </table>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>



        <input type="hidden" id="active" value="<?php echo base64_decode($_GET['Me']) ?>" />


</body>

<script>

    $(document).ready(function () {
        let active = document.getElementById("active").value;
        if (active == "true") {// se activa la funcion
            $('#myModalExito').modal('show');
        }
    });
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
            buttons: ['excel'],
        }

        );
    });


</script>

<?php include ("libFooter.php"); ?>

</html>