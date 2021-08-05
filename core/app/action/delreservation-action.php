<?php
/**
* PQRD
* @author Diego Ochoa
**/
$user = ReservationData::getById($_GET["id"]);
$user->del();
print "<script>window.location='index.php?view=reservations';</script>";

?>