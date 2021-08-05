<?php

/**
 * PQRD
* @author Diego Ochoa

 **/


$rx = HistoryReservationData::getRepeated($_POST["reservation_id"]);
if ($rx == null) {
    $r = new HistoryReservationData();
    $r->tiposeguimiento = $_POST["tiposeguimiento"];
    $r->diagnostico = $_POST["diagnostico"];
    $r->llamada = $_POST["llamada"];
    $r->estado = $_POST["estado"];
    $r->tipoevento = $_POST["tipoevento"];
    $r->descripcion = $_POST["descripcion"];
    $r->user_id = $_SESSION["reservation_id"];
    $r->date_at = $_POST["date_at"];
    $r->add();

    Core::alert("Agregado exitosamente!");
} else {
    Core::alert("Error al agregar, Cita Repetida!");
}
Core::redir("./index.php?view=pacients");
