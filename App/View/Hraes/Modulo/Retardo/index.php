<br>
<div class="form-inline">
    <button onclick="agregarEditarRetardo(null)" class="btn btn-light"><i class="fas fa-plus"></i>
        <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar retardo</span>
    </button>
    <!--
    <a type="button" href="../Empleados/index.php" class="btn btn-light" style="color:#235B4E"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-info-circle"></i></a>
-->
</div>
<p></p>
<input class="form-control mr-sm-2" type="text" placeholder="Buscar..." id="campoFecha"
    onkeyup="buscarRetardo();" aria-label="Search">
<p></p>
<table class="table table-striped" id="tabla_retardo" style="width:100%">
</table>
<div class="position-absolute top-50 start-50">
    <button onclick="anteriorValor_re()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
    <label id="idtable_re">1</label>
    <button onclick="siguienteValor_re()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
</div>
<br>
<br>
<br>
<?php include 'AgregarEditar.php' ?>