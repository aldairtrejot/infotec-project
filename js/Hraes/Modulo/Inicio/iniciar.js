function buscarInfoEmpleado(id_tbl_empleados_hraes){
    let nombreResult = document.getElementById("nombreResult");
    let numEmpleadoResult = document.getElementById("numEmpleadoResult");
    let curpResult = document.getElementById("curpResult");
    let rfcResult = document.getElementById("rfcResult");
    
    $.post('../../../../App/Controllers/Hrae/EmpleadoC/InformacionC.php', {
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            console.log(data);
            let jsonData = JSON.parse(data);
            let nombre = jsonData.nombre;
            let curp = jsonData.curp;
            let rfc = jsonData.rfc;
            let noEmpleado = jsonData.noEmpleado;

            nombreResult.textContent = nombre;
            numEmpleadoResult.textContent = noEmpleado;
            curpResult.textContent = curp;
            rfcResult.textContent = rfc;
        }
    );
}