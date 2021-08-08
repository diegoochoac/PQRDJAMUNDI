<?php

/**
 * PQRD
 * @author Diego Ochoa
 **/

if (count($_POST) > 0) {
	$user = new CategoryData();
	$user->name = $_POST["name"];
	$user->add();

	Core::alert("Creado exitosamente!");
	print "<script>window.location='index.php?view=categories';</script>";
}
