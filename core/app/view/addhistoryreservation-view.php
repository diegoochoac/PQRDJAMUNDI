<?php

/**
 * PQRD
 * @author Diego Ochoa
 * @url http://
 **/

if (count($_POST) > 0) {

    $r = new HistoryReservationData();
    $reservation_id = "NULL";
    if($_POST["reservation_id"]!=""){ $reservation_id = $_POST["reservation_id"]; }

    $r->diagnostico = $_POST["diagnostico"];
    $r->reservation_id = $_POST["reservation_id"];
    
    // $r->t_caso = $_POST["t_caso"];
    $r->tiposeguimiento = $_POST["tiposeguimiento"];

    $r->llamada = $_POST["llamada"];
    $r->estado = $_POST["estado"];
    
    $r->rad = $_POST["rad"];
    $r->rad_cierre = $_POST["rad_cierre"];
    $r->rad_traslado = $_POST["rad_traslado"];
    $r->rad_prorroga = $_POST["rad_prorroga"];


    $r->f_prorroga = $_POST["f_prorroga"];
    $r->f_cierre = $_POST["f_cierre"];
    $r->f_traslado = $_POST["f_traslado"];

    $r->entidadtraslado = $_POST["entidadtraslado"];

    $r->tipoevento = $_POST["tipoevento"];
    $r->descripcion = $_POST["descripcion"];

    // $r->date_at = $_POST["date_at"];
    $r->add();


    Core::alert("Creado exitosamente!");
    //  print "<script>window.location='index.php?view=reservationhistory&id=';</script>;"
    print "<script>window.location='index.php?view=reservations';</script>";
    //		$sql = "insert into ".self::$tablename." (name,lastname,cc,gender,day_of_birth,address,phone,email,sick,medicaments,alergy,created_at) ";

}
