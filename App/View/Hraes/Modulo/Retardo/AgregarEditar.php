<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_retardo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#235B4E">
                <h5 class="modal-title" style="font-weight: bold;color:white"><label id="titulo_retardo"
                        style="font-weight: bold;color:white"></label> retardo</h5>
                <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="salirAgregarEditarRetardo();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Fecha</label><label style="color:red">*</label>
                        <input type="date" class="form-control" id="fecha_retardo" placeholder="Nombre"
                            maxlength="20">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Hora entrada</label><label style="color:red">*</label>
                        <input type="time" class="form-control" id="hora_entrada" placeholder="Curp"
                            maxlength="20">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Hora salida</label><label style="color:red"></label>
                        <input type="time" class="form-control" id="hora_salida" placeholder="Apellido paterno"
                            maxlength="20">
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    onclick="salirAgregarEditarRetardo();">Cancelar</button>
                <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                    onclick="return validarDependiente();">Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>