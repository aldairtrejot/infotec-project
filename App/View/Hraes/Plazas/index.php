<?php
$id_tbl_centro_trabajo_hraes = 'ok';
if (isset($_POST['id_tbl_centro_trabajo_hraes'])){
    $id_tbl_centro_trabajo_hraes = $_POST['id_tbl_centro_trabajo_hraes'];
} 
?>

<body>

    <?php include '../../nav-menu.php' ?>
    <div id="main-wrapper">
        <div class="page-wrapper">
        
            <div class="page-breadcrumb">
            <h2 class="page-title">M&oacutedulo Hospital Regional de Alta Especialidad</h2>
                <div class="row">
                    <div class="col-5 align-self-center">
                        
                        <div class="d-flex align-items-center">
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../../../../index.php" style="color:#cb9f52;">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Empleados</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <input type="hidden" id="id_tbl_centro_trabajo_hraes" value="<?php echo $id_tbl_centro_trabajo_hraes?>" />
                
                <?php if ($id_tbl_centro_trabajo_hraes != 'ok'){?>
                <p>Informaci&oacuten de las plazas correspondientes con el centro de trabajo seleccionado.</p>
                <div class="form-inline">
                    <button onclick="agregarEditarDetalles(null)" class="btn btn-light"><i class="fas fa-plus"></i>
                        <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar una plaza</span>
                    </button>
                </div>
                <?php } else {?>
                <p>Informaci&oacuten de los &uacuteltimos movimientos de plazas.</p>
                <?php }?>

                <p></p>
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar"
                    onkeyup="buscarInBd();" aria-label="Search">
                <p></p>

                <table class="table table-striped" id="t-table" style="width:100%">
                </table>

                <?php include 'AgregarEditar.php' ?>
                <?php include 'Detalles.php' ?>

            </div>
        </div>
    </div>

    <script src="../../../../js/Hraes/Plazas/Plazas.js"></script>
    <script src="../../../../js/Hraes/Plazas/validar.js"></script>
    <?php include ('../../footer-librerias.php') ?>
</body>
