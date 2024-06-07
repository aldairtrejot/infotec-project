function validarDomicilio(){
    let codigo_postal = document.getElementById('codigo_postal1').value;
    let municipio1 = document.getElementById('municipio1').value;
    let colonia1 = document.getElementById('colonia1').value;
    let calle1 = document.getElementById('calle1').value;
    let codigo_postal2 = document.getElementById('codigo_postal2').value;
    let num_exterior1 = document.getElementById('num_exterior1').value;

    if(validarData(codigo_postal,'Código postal') &&
       validarData(municipio1,'Municipio') &&
       validarData(colonia1,'Colonia') &&
       validarData(calle1,'Calle') &&
       validarData(num_exterior1,'Núm. exterior') &&
       caracteresCount('Código postal fiscal',6,codigo_postal2)){
            guardarDomicilio();
    } 
}

function buscarInfor(){
    let codigo_postal = document.getElementById('codigo_postal1').value.trim();
    $.post("../../../../App/Controllers/Hrae/DomicilioC/CodigoPostalC.php", {
        codigo_postal: codigo_postal
    },
        function (data) {
            var jsonData = JSON.parse(data);
            var municipio = jsonData.municipio;
            var colonia = jsonData.colonia; 
            var entidad = jsonData.entidad; 
            var pais = jsonData.pais;

            $('#municipio1').empty();
            $('#municipio1').html(municipio);
            $('#colonia1').empty();
            $('#colonia1').html(colonia);  
            $("#entidad1").val(entidad);
            $("#pais_f").val(pais);
            
        }
    );
}

document.getElementById("municipio1").addEventListener("change", function() {
    let municipio1 = this.value;
    $.post("../../../../App/Controllers/Hrae/DomicilioC/ColoniaC.php", {
        municipio1: municipio1,
    },
        function (data) {
            var jsonData = JSON.parse(data);
            var colonia = jsonData.colonia; 

            $('#colonia1').empty();
            $('#colonia1').html(colonia);   
        }
    );
  });
