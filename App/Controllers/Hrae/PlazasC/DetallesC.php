<?php
include '../../../../conexion.php';

include '../../../Model/Hraes/PlazasM/PlazasM.php';
include '../../../Model/Catalogos/CatPlazasM/CatPlazasM.php';
include '../../../Controllers/Catalogos/CatPlazasC/CatPlazasC.php';
include '../../../Model/Catalogos/CatUnidadResponsableM/CatUnidadResponsableM.php';
include '../../../Controllers/Catalogos/CatUnidadResponsableC/CatUnidadResponsableC.php';
include '../../../Model/Hraes/Catalogos/CatTipoContratacionM/CatTipoContratacionM.php';
include '../../../Controllers/Hrae/Catalogos/CatTipoContratacionC/CatTipoContratacionC.php';
include '../../../Model/Hraes/Catalogos/CatPuestoM/CatPuestoM.php';
include '../../../Controllers/Hrae/Catalogos/CatPuestoC/CatPuestosC.php';
include '../../../Model/Hraes/Catalogos/CatTabularesM/CatTabularesM.php';
include '../../../Controllers/Hrae/Catalogos/CatTabularesC/CatTabularesC.php';
include '../../../Model/Hraes/Catalogos/CatNivelesM/CatNivelesM.php';
include '../../../Controllers/Hrae/Catalogos/CatNivelesC/CatNivelesC.php';

$catalogoPlazasM = new catalogoPlazasM();
$catalogoPlazasC = new catalogoPlazasC();
$modelPlazasHraes = new modelPlazasHraes();
$catalogoTipoContratcionHraesC = new catalogoTipoContratcionHraesC();
$catalogoTipoContratacionM = new catalogoTipoContratacionM();
$catalogoUnidadResponsableC = new catalogoUnidadResponsableC();
$cataloUnidadResposableM = new cataloUnidadResposableM();
$catalogoPuestosC = new catalogoPuestosC();
$catalogoPuestoM = new catalogoPuestoM();
$catalogoTabularesC = new catalogoTabularesC();
$catalogoTabularesM = new catalogoTabularesM();
$catalogoNivelesC = new catalogoNivelesC();
$catalogoNivelesM = new catalogoNivelesM();

$id_object = $_POST['id_object'];

if ($id_object != null){
    $entity = returnArray($modelPlazasHraes -> listarByIdEdit($id_object));
    $plazas = $catalogoPlazasC ->returnCatPLazasByIdObject($catalogoPlazasM ->listarByAll(), returnArrayById($catalogoPlazasM ->obtenerElemetoById($entity['id_cat_plazas'])));
    $contratacion = $catalogoTipoContratcionHraesC ->returnCatContratacionByIdObject($catalogoTipoContratacionM ->listarByAll(),returnArrayById($catalogoTipoContratacionM ->obtenerElemetoById($entity['id_cat_tipo_contratacion_hraes'])));
    $unidadResp = $catalogoUnidadResponsableC ->returnCatUnidadByIdObject($cataloUnidadResposableM->listarByAll(), returnArrayById($cataloUnidadResposableM->obtenerElemetoById($entity['id_cat_unidad_responsable'])));
    $puesto = $catalogoPuestosC ->returnCatPuestosByIdObject($catalogoPuestoM->listarByAll(),returnArrayById($catalogoPuestoM->obtenerElemetoById($entity['id_cat_puesto_hraes'])));
    $tabulares = $catalogoTabularesC->returnSelectByIdObject($catalogoTabularesM->listarByAll(),returnArrayById($catalogoTabularesM->obtenerElemetoById($entity['id_cat_zonas_tabuladores_hraes'])));
    $niveles = $catalogoNivelesC ->returnSelectByIdObject($catalogoNivelesM->listarByAll(),returnArrayById($catalogoNivelesM->obtenerElemetoById($entity['id_cat_niveles_hraes'])));
    $raw = [
        'entity' => $entity,
        'plazas' => $plazas,
        'unidadResp' => $unidadResp,
        'contratacion' => $contratacion,
        'puesto' => $puesto,
        'tabulares' => $tabulares,
        'niveles' => $niveles,
    ];
    echo json_encode($raw);
} else { ///Agregar
    $plazas = $catalogoPlazasC -> returnCatPlazas($catalogoPlazasM->listarByAll());
    $contratacion = $catalogoTipoContratcionHraesC -> returnCatContratacion($catalogoTipoContratacionM->listarByAll());
    $entity = $modelPlazasHraes -> listarByNull();
    $unidadResp = $catalogoUnidadResponsableC ->returnCatUnidad($cataloUnidadResposableM ->listarByAll());
    $puesto = $catalogoPuestosC ->returnCatPuestos($catalogoPuestoM->listarByAll());
    $tabulares = $catalogoTabularesC->returnSelect($catalogoTabularesM->listarByAll());
    $niveles = $catalogoNivelesC->returnSelect($catalogoNivelesM->listarByAll());
    $raw = [
        'niveles' => $niveles,
        'puesto' => $puesto,
        'plazas' => $plazas,
        'entity' => $entity,
        'contratacion' => $contratacion,
        'unidadResp' => $unidadResp,
        'tabulares' => $tabulares,
    ];
    echo json_encode($raw);
}


function returnArray($result)
{
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_assoc($result)) {
            $response = $row;
        }
    }
    return $response;
}

function returnArrayById($result)
{
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_row($result)) {
            $response = $row;
        }
    }
    return $response;
}
