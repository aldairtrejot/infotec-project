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
                                        <a href="../../System/home/index.php" style="color:#cb9f52;">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Empleados</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <p>Informaci&oacuten de los &uacuteltimos movimientos de empleados.</p>
                <div class="form-inline">
                    <button onclick="agregarEditarDetalles(null)" class="btn btn-light"><i class="fa fa-user-plus"></i>
                        <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar un empleado</span>
                    </button>
                </div>
                <p></p>
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar"
                    onkeyup="buscarEmpleado();" aria-label="Search">
                <p></p>


                <table class="table table-striped" id="tabla_empleados" style="width:100%">
                </table>
                <div class="position-absolute top-50 start-50">
                    <button onclick="anteriorValor()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                        <span class="hide-menu" style="font-weight: bold;"></span>
                    </button>
                    <label id="idEmpleadotable">1</label>
                    <button onclick="siguienteValor()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
                        <span class="hide-menu" style="font-weight: bold;"></span>
                    </button>
                </div>
                <br>

            </div>
        </div>
    </div>

    <?php include ('Librerias.php') ?>
    <?php include ('../../footer-librerias.php') ?>
</body>