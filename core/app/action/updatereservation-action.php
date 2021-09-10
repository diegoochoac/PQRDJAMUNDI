<?php
/**
* PQRD
* @author Diego Ochoa
* @url http://
**/

if(count($_POST)>0){
	$r = ReservationData::getById($_POST["id"]);
	$r->date_at = $_POST["date_at"];
	$r->description = $_POST["description"];
	$r->diagnostico = $_POST["diagnostico"];
	$r->typecase = $_POST["typecase"];
	$r->typeevent = $_POST["typeevent"];
	$r->conafec = $_POST["conafec"]; 
	$r->numrad = $_POST["numrad"];
	$r->encontrol = $_POST["encontrol"]; 
	$r->orpeticion = $_POST["orpeticion"]; 

	// $r->funci_id1 = $_POST["funci_id1"];
	// $r->funci_id2 = $_POST["funci_id2"];

	$r->chcomun = $_POST["chcomun"];  
	$r->atrcalidad = $_POST["atrcalidad"];  

	// $r->pacient_id = $_POST["pacient_id"];
	// $r->pacientp_id = $_POST["pacientp_id"];
	$r->user_id = $_SESSION["user_id"];
	$r->status_id =1;

	$r->update();

Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=reservations';</script>";


}
