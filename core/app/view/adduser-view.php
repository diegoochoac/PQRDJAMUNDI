<?php

/**
 * PQRD
 * @author Diego Ochoa
 * @url http://
 **/

if (count($_POST) > 0) {
	$is_admin = 0;
	if (isset($_POST["is_admin"])) {
		$is_admin = 1;
	}
	$is_active = 0;
	if (isset($_POST["is_active"])) {
		$is_active = 1;
	}

	$user = new UserData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->is_admin = $is_admin;
	$user->is_active = $is_active;

	$user->password = sha1(md5($_POST["password"]));
	$user->add();
	Core::alert("Creado exitosamente!");
	print "<script>window.location='index.php?view=users';</script>";
}
