<?php
$pacient = MedicData::getById($_GET["id"]);
?>
<div class="row">

	<div class="card">
		<div class="card-header" data-background-color="blue">
			<h4 class="title">Historial de Solicitudes del Funcionario</h4>
			<p>Funcionario: <?php echo $pacient->name . " " . $pacient->lastname; ?></p>
		</div>
		<div class="card-content table-responsive">
			<div class="col-md-12">
				<div class="btn-group pull-right">
				</div>
				<?php
				$users = ReservationData::getAllByMedicId($_GET["id"]);
				if (count($users) > 0) {
					// si hay usuarios
				?>
					<table class="table table-bordered table-hover">
						<thead>
							<th>Número del Caso</th>
							<th>Tipo de Caso</th>
							<th>Estado del Caso</th>
							<th>Nombre Afectado</th>
							<th>Apellido Afectado</th>
							<th>EPS</th>
							<th>Condición del Afectado</th>
							<th>Funcionario Atención</th>
							<th>Número de PQRD SISNET</th>
							<th>Fecha Creación</th>
						</thead>
						<?php
						foreach ($users as $user) {
							$pacient  = $user->getPacient();
							$medic = $user->getMedic();
						?>
							<tr>
								<td><?php echo $user->id; ?></td>
								<td><?php echo $user->typecase; ?></td>
								<td><?php echo $user->status_id; ?></td>
								<td><?php echo PacientData::getById($user->pacient_id)->name; ?></td>
								<td><?php echo PacientData::getById($user->pacient_id)->lastname; ?></td>
								<td><?php echo PacientData::getById($user->pacient_id)->eps; ?></td>
								<td><?php echo $user->conafec ?></td>
								<td><?php echo MedicData::getById($user->funci_id1)->name; ?></td>
								<td><?php echo $user->numrad; ?></td>
								<td><?php echo $user->date_at; ?></td>
							</tr>
						<?php

						}
						?>
					</table>
				<?php


				} else {
					echo "<p class='alert alert-danger'>No hay Solicitudes para este Usuario</p>";
				}


				?>

			</div>
		</div>
	</div>
</div>