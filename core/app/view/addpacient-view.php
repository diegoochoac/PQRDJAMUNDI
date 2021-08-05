<?php
/**
* PQRD
* @author Diego Ochoa
* @url http://
**/

if(count($_POST)>0){
	$user = new PacientData();
	$user->namepeticionario = $_POST["namepeticionario"];
	$user->lastnamepeticionario = $_POST["lastnamepeticionario"];
	$user->typedocpeticionario = $_POST["typedocpeticionario"];
	$user->ccpeticionario = $_POST["ccpeticionario"];
	$user->phone1peticionario = $_POST["phone1peticionario"];
	$user->phone2peticionario = $_POST["phone2peticionario"];
	$user->emailpeticionario = $_POST["emailpeticionario"];


	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->typedoc = $_POST["typedoc"];
	$user->cc = $_POST["cc"];
	$user->day_of_birth = $_POST["day_of_birth"];
	$user->age = $_POST["age"];
	$user->tipopoblacion = $_POST["tipopoblacion"];

	$user->gender = $_POST["gender"];
	$user->gender2 = $_POST["gender2"];
	$user->disca = $_POST["disca"];
	$user->phone = $_POST["phone"];
	$user->phonecel = $_POST["phonecel"];
	$user->address = $_POST["address"];
	$user->address2 = $_POST["address2"];
	$user->email = $_POST["email"];
	$user->eps = $_POST["eps"];
	$user->regimen = $_POST["regimen"];
	$user->extranjero = $_POST["extranjero"];
	$user->extranjerostate = $_POST["extranjerostate"];



	
	$user->add();

Core::alert("Creado exitosamente!");
 print "<script>window.location='index.php?view=pacients';</script>";

//		$sql = "insert into ".self::$tablename." (name,lastname,cc,gender,day_of_birth,address,phone,email,sick,medicaments,alergy,created_at) ";

}
