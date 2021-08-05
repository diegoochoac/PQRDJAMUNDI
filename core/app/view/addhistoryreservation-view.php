<?php
/**
* PQRD
* @author Diego Ochoa
* @url http://
**/

if(count($_POST)>0){

	$r = new HistoryReservationData();
    $reservation_id = "NULL";
	if($_POST["reservation_id"]!=""){ $reservation_id = $_POST["reservation_id"]; }


    $r->tiposeguimiento = $_POST["tiposeguimiento"];
    $r->diagnostico = $_POST["diagnostico"];
    $r->llamada = $_POST["llamada"];
    $r->estado = $_POST["estado"];
    
    $r->tipoevento = $_POST["tipoevento"];
    $r->descripcion = $_POST["descripcion"];
    $r->reservation_id = $_POST["reservation_id"];
    // $r->date_at = $_POST["date_at"];
    $r->add();


Core::alert("Creado exitosamente!");
 print "<script>window.location='index.php?view=reservations';</script>";

//		$sql = "insert into ".self::$tablename." (name,lastname,cc,gender,day_of_birth,address,phone,email,sick,medicaments,alergy,created_at) ";

}
