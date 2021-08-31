<?php

/**
 * PQRD
 * @author Diego Ochoa
 * @url http://
 **/

if (count($_POST) > 0) {
	$user = new PacientDataP();

	$user->id_pacientp = $_POST["id_pacientp"];
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->typedoc = $_POST["typedoc"];
	$user->numdoc = $_POST["numdoc"];
	$user->phone = $_POST["phone"];
	$user->phonecel = $_POST["phonecel"];
	$user->email = $_POST["email"];
	
	$user->add();

	Core::alert("Creado exitosamente!");
	print "<script>window.location='index.php?view=pacients';</script>";
}
