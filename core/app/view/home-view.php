<?php

if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
} else {
	header('Location: index.php'); //Aqui lo redireccionas al lugar que quieras.
	die();
}



$thejson = null;
$events = ReservationData::getEvery();
foreach ($events as $event) {
	$thejson[] = array("title" => $event->typecase." #Caso: ".$event->id  ,  "start" => $event->date_at);

	//$thejson[] = array("title" => $event->typecase, "url" => "./?view=editreservation&id=" . $event->id, "start" => $event->date_at);
}
?>
<script>
	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '<?php echo date('Y-m-d'); ?>',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo json_encode($thejson); ?>
		});

	});
</script>


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Calendario de PQRD</h4>
			</div>
			<div class="card-content table-responsive">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
</div>