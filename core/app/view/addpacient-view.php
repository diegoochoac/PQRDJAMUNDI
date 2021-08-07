<?php

/**
 * PQRD
 * @author Diego Ochoa
 * @url http://
 **/

if (count($_POST) > 0) {
	$user = new PacientData();

	$user->id_pacientp = $_POST["id_pacientp"];
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->typedoc = $_POST["typedoc"];
	$user->numdoc = $_POST["numdoc"];
	$user->day_of_birth = $_POST["day_of_birth"];
	$user->age = $_POST["age"];
	$user->typepobla = $_POST["typepobla"];

	$user->gender = $_POST["gender"];
	$user->gender2 = $_POST["gender2"];
	$user->typedisca = $_POST["typedisca"];
	$user->phone = $_POST["phone"];
	$user->phonecel = $_POST["phonecel"];

	$user->address = $_POST["address"];
	$user->address2 = $_POST["address2"];
	$user->address3 = $_POST["address3"];
	$user->address4 = $_POST["address4"];

	$user->email = $_POST["email"];
	$user->eps = $_POST["eps"];
	$user->typereg = $_POST["typereg"];
	$user->extranjero = $_POST["extranjero"];
	$user->extranjerostate = $_POST["extranjerostate"];


	$user->add();

	Core::alert("Creado exitosamente!");
	print "<script>window.location='index.php?view=pacients';</script>";
}
