<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: bold;color:#235B4E"></label>Agregar plaza</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Tipo de plaza</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_plazas"
                            required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Tipo de contrataci&oacuten</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_tipo_contratacion_hraes"
                            required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Unidad responsable</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_unidad_responsable"
                            required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Puesto</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_puesto_hraes"
                            required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Zonas tabuladores</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_zonas_tabuladores_hraes"
                            required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Niveles</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_niveles_hraes"
                            required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>N&uacutemero de plaza</label><label style="color:red">*</label>
                        <input type="number" class="form-control" id="num_plaza" placeholder="Número de plaza">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Zona pagadora</label><label style="color:red">*</label>
                        <input type="number" class="form-control" id="zona_pagadora" placeholder="Zona pagadora">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Fecha de ingreso</label><label style="color:red"></label>
                        <input type="date" class="form-control" id="fecha_ingreso_inst" >
                    </div>

                    <div class="form-group col-md-6">
                        <label>Fecha inicio de movimiento</label><label style="color:red"></label>
                        <input type="date" class="form-control" id="fecha_inicio_movimiento" >
                    </div>

                    <div class="form-group col-md-6">
                        <label>Fecha termino de movimiento</label><label style="color:red"></label>
                        <input type="date" class="form-control" id="fecha_termino_movimiento" >
                    </div>

                    <div class="form-group col-md-6">
                        <label>Fecha de modificaci&oacuten</label><label style="color:red"></label>
                        <input type="date" class="form-control" id="fecha_modificacion" >
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                    onclick="return validar();">Guardar</button>
                <input type="hidden" id="id_object">
                <input type="hidden" id="id_tbl_centro_trabajo_hraes">
            </div>

        </div>
    </div>
</div>