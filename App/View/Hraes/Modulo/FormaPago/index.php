<br>
<div class="form-inline">
    <button onclick="agregarEditarFormaPago(null)" class="btn btn-light"><i class="fas fa-plus"></i>
        <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar forma de pago</span>
    </button>
</div>
<p></p>
<input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar_f"
    onkeyup="buscarFormaPago();" aria-label="Search">
<p></p>

<table class="table table-striped" id="tabla_forma_pago" style="width:100%">
</table>
<div class="position-absolute top-50 start-50">
    <button onclick="anteriorValor_f()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
    <label id="idtable_f">1</label>
    <button onclick="siguienteValor_f()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
</div>
<br>
<br>
<br>

<?php include 'agregarEditar.php' ?>