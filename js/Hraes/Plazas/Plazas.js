var id_tbl_centro_trabajo_hraes = document.getElementById("id_tbl_centro_trabajo_hraes").value;

$(document).ready(function () {
    buscarPlaza();
});

function buscarPlaza(){ //BUSQUEDA
    let buscarNew = clearElement(buscar);
    let buscarlenth = lengthValue(buscarNew);
    
    if (buscarlenth == 0){
        iniciarPlazas(id_tbl_centro_trabajo_hraes,null, iniciarBusqueda())
    } else {
        iniciarPlazas(id_tbl_centro_trabajo_hraes,buscarNew, iniciarBusqueda())
    }
}

function iniciarPlazas(id_tbl_centro_trabajo_hraes,busqueda, paginador){
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Plazas/tabla.php',
        data: { 
            busqueda: busqueda,
            paginador:paginador, 
            id_tbl_centro_trabajo_hraes:id_tbl_centro_trabajo_hraes
        },
        success: function (data) {
            $('#tabla_plazas').html(data);
        }
    });
}

function agregarEditarDetalles(id_object) { //SE OBTIENEN INFO DE ID SELECCIONADO
    $("#id_object").val(id_object);
    let titulo = document.getElementById("titulo_plazas");
    titulo.textContent = 'Modificar';    

    if (id_object == null){
        $("#agregar_editar_modal").find("input,textarea,select").val("");
        titulo.textContent = 'Agregar';  
    }
    $.post("../../../../App/Controllers/Hrae/PlazasC/DetallesC.php", {
        id_object: id_object,
    },
        function (data) {
            console.log(data);
            let jsonData = JSON.parse(data);//se obtiene el json
            let entity = jsonData.entity; //Se agrega a emtidad 
            let plazas = jsonData.plazas;
            let contratacion = jsonData.contratacion;
            let unidadResp = jsonData.unidadResp;
            let puesto = jsonData.puesto;
            let tabulares = jsonData.tabulares;
            let niveles = jsonData.niveles;
            let pago = jsonData.pago;
            
            $('#id_cat_plazas').empty();
            $('#id_cat_plazas').html(plazas); 
            $('#id_tbl_zonas_pago').empty();
            $('#id_tbl_zonas_pago').html(pago);
            $('#id_cat_tipo_contratacion_hraes').empty();
            $('#id_cat_tipo_contratacion_hraes').html(contratacion);
            $('#id_cat_unidad_responsable').empty();
            $('#id_cat_unidad_responsable').html(unidadResp);
            $('#id_cat_puesto_hraes').empty();
            $('#id_cat_puesto_hraes').html(puesto);
            $('#id_cat_zonas_tabuladores_hraes').empty();
            $('#id_cat_zonas_tabuladores_hraes').html(tabulares);
            $('#id_cat_niveles_hraes').empty();
            $('#id_cat_niveles_hraes').html(niveles);
            
            $("#num_plaza").val(entity.num_plaza);
            $("#fecha_ingreso_inst").val(entity.fecha_ingreso_inst);
            $("#fecha_inicio_movimiento").val(entity.fecha_inicio_movimiento);
            $("#fecha_termino_movimiento").val(entity.fecha_termino_movimiento);
            $("#fecha_modificacion").val(entity.fecha_modificacion);
            $("#id_tbl_centro_trabajo_hraes_aux").val(entity.id_tbl_centro_trabajo_hraes);
        }
    );

    $("#agregar_editar_modal").modal("show");
}

function agregarEditarByDb() {
    let id_tbl_centro_trabajo_hraes_aux = $("#id_tbl_centro_trabajo_hraes_aux").val();
    let id_object = $("#id_object").val();

    if (id_tbl_centro_trabajo_hraes == null){
        id_tbl_centro_trabajo_hraes_aux = id_tbl_centro_trabajo_hraes;
    }

    if(id_object == ''){
        id_tbl_centro_trabajo_hraes_aux = id_tbl_centro_trabajo_hraes;
    }

    let id_cat_plazas = $("#id_cat_plazas").val();
    let id_cat_tipo_contratacion_hraes = $("#id_cat_tipo_contratacion_hraes").val();
    let id_cat_unidad_responsable = $("#id_cat_unidad_responsable").val();
    let id_cat_puesto_hraes = $("#id_cat_puesto_hraes").val();
    let id_cat_zonas_tabuladores_hraes = $("#id_cat_zonas_tabuladores_hraes").val();
    let id_cat_niveles_hraes = $("#id_cat_niveles_hraes").val();
    let num_plaza = $("#num_plaza").val();
    let fecha_ingreso_inst = $("#fecha_ingreso_inst").val();
    let fecha_inicio_movimiento = $("#fecha_inicio_movimiento").val();
    let fecha_termino_movimiento = $("#fecha_termino_movimiento").val();
    let fecha_modificacion = $("#fecha_modificacion").val();
    let id_tbl_zonas_pago = $("#id_tbl_zonas_pago").val();

    $.post("../../../../App/Controllers/Hrae/PlazasC/AgregarEditarC.php", {
        id_cat_plazas: id_cat_plazas,
        id_cat_tipo_contratacion_hraes: id_cat_tipo_contratacion_hraes,
        id_cat_unidad_responsable:id_cat_unidad_responsable,
        id_cat_puesto_hraes:id_cat_puesto_hraes,
        id_cat_zonas_tabuladores_hraes:id_cat_zonas_tabuladores_hraes,
        id_cat_niveles_hraes:id_cat_niveles_hraes,
        num_plaza:num_plaza,
        fecha_ingreso_inst:fecha_ingreso_inst,
        fecha_inicio_movimiento:fecha_inicio_movimiento,
        fecha_termino_movimiento:fecha_termino_movimiento,
        fecha_modificacion:fecha_modificacion,
        id_object:id_object,
        id_tbl_centro_trabajo_hraes:id_tbl_centro_trabajo_hraes_aux,
        id_tbl_zonas_pago:id_tbl_zonas_pago
    },
        function (data) {
            console.log(data);
            if (data == 'edit'){
                mensajeExito('Plaza modificada con éxito');
            } else if (data == 'add') {
                mensajeExito('Plaza agregada con éxito');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_modal").modal("hide");
            buscarPlaza();
        }
    );
}

function eliminarEntity(id_object) {
    if( validarAccion()){
    Swal.fire({
        title: "¿Está seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
        $.post("../../../../App/Controllers/Hrae/PlazasC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    mensajeExito('Plaza eliminada con éxito');
                } else {
                    mensajeError(data);
                }
                buscarPlaza();
            }
        );
    }
    });
}
}
/*
function iniciarTabla() { ///INGRESA LA TABLA
    $.get("../../../../App/View/Hraes/Plazas/tabla.php", {}, function (data, status) {
        $("#t-table").html(data);
    });
}

function iniciarTablaByIdCentroTrabajo(id_object) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Plazas/tabla.php',
        data: { id_object: id_object },
        success: function (data) {
            $('#t-table').html(data);
        }
    });
}

function iniciarBusqueda(busqueda,id_object) { //BUSQUEDA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Plazas/tabla.php',
        data: { 
            busqueda: busqueda,
            id_object:id_object 
        },
        success: function (data) {
            $('#t-table').html(data);
        }
    });
}

function buscarInBd(){ //BUSQUEDA
    let buscar = document.getElementById("buscar").value.trim();
    let id_tbl_centro_trabajo_hraes = document.getElementById("id_tbl_centro_trabajo_hraes").value;
    buscar = buscar.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    buscarlenth = buscar.length;
    
    if (buscarlenth == 0){
        iniciarPlazas();
    } else {
        iniciarBusqueda(buscar,id_tbl_centro_trabajo_hraes);
    }
}

function iniciarTablaHistoria(id_object) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Plazas/tablaHistoria.php',
        data: { id_object: id_object },
        success: function (data) {
            $('#t-table-historia').html(data);
        }
    });
}


function detallesEntity(id_object){

    iniciarTablaHistoria(id_object);

    let num_plaza = document.getElementById("num_plaza");
    let cve_centro_trabajo = document.getElementById("cve_centro_trabajo");
    let tipo_plaza = document.getElementById("tipo_plaza");
    let nombre_centro_trabajo = document.getElementById("nombre_centro_trabajo");
    let tipo_contratacion = document.getElementById("tipo_contratacion");
    let entidad = document.getElementById("entidad");
    let unidad_respo = document.getElementById("unidad_respo");
    let codigo_postal = document.getElementById("codigo_postal");

    $("#id_object").val(id_object);

    $.post("../../../../App/Controllers/Hrae/PlazasC/DetallesEntityC.php", {
        id_object: id_object
    },
        function (data, status) {
            var jsonData = JSON.parse(data);//se obtiene el json
            var entity = jsonData.response; //Se agrega a emtidad 

            num_plaza.textContent = entity[1];
            cve_centro_trabajo.textContent = entity[6];
            tipo_plaza.textContent = entity[2];
            nombre_centro_trabajo.textContent = entity[7];
            tipo_contratacion.textContent = entity[3];
            entidad.textContent = entity[8];
            unidad_respo.textContent = entity[4];
            codigo_postal.textContent = entity[9];
        }
    );

    $("#mostar_detalles_modal").modal("show");

}
*/
///DETALLES DE LA Entidad u hiustoria

