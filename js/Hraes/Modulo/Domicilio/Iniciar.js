var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function iniciarDomicilio(){
    domicilioDetalles(id_tbl_empleados_hraes);
}

function domicilioDetalles(id_object){
    $.post("../../../../App/Controllers/Hrae/DomicilioC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            console.log(data);
            var jsonData = JSON.parse(data);
            var entity = jsonData.response;
            
            var municipio = jsonData.municipio;
            var colonia = jsonData.colonia; 

            $('#colonia1').empty();
            $('#colonia1').html(colonia); 
            $('#municipio1').empty();
            $('#municipio1').html(municipio); 
            
            $("#id_tbl_domicilios").val(entity.id_tbl_domicilios);
            $("#codigo_postal1").val(entity.codigo_postal1);  
            $("#entidad1").val(entity.entidad1);
            $("#calle1").val(entity.calle1);
            $("#num_exterior1").val(entity.num_exterior1);
            $("#num_interior1").val(entity.num_interior1);
            $("#codigo_postal2").val(entity.codigo_postal2);
        }
    );
}

function guardarDomicilio() {

    let id_tbl_domicilios = $("#id_tbl_domicilios").val();
    let codigo_postal2 = $("#codigo_postal2").val();
    let codigo_postal1 = $("#codigo_postal1").val();
    let entidad1 = $("#entidad1").val();
    let municipio1 = $("#municipio1").val();
    let colonia1 = $("#colonia1").val();
    let calle1 = $("#calle1").val();
    let num_exterior1 = $("#num_exterior1").val();
    let num_interior1 = $("#num_interior1").val();

    $.post("../../../../App/Controllers/Hrae/DomicilioC/AgregarEditarC.php", {
        id_tbl_empleados_hraes: id_tbl_empleados_hraes,
        id_tbl_domicilios: id_tbl_domicilios,
        codigo_postal2: codigo_postal2,
        codigo_postal1: codigo_postal1,
        entidad1: entidad1,
        municipio1: municipio1,
        colonia1: colonia1,
        calle1: calle1,
        num_exterior1: num_exterior1,
        num_interior1: num_interior1,
    },
        function (data) {
            console.log(data);
            if (data == 'edit'){
                mensajeExito('Domicilio modificado con éxito');
            } else if (data == 'add') {
                mensajeExito('Domicilio agregado con éxito');  
            } else {
                mensajeError(data);
            }
            iniciarDomicilio();
        }
    );
}