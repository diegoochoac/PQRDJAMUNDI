<?php
if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
} else {
	header('Location: index.php');
	die();
}
?>

<div class="row">
	<div class="col-md-12">
		<div class="btn-group pull-right">

		</div>
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Casos de Atención</h4>
			</div>
			<div class="card-content table-responsive">
				<a href="./index.php?view=newreservation" class="btn btn-info">Crear Nuevo Caso</a>
				<!-- <a href="./index.php?view=oldreservations" class="btn btn-default">Citas Anteriores</a> -->
				<hr>
				<!-- <br><br> -->
				<h4 class="title">Busqueda de Casos</h4>
				<form class="form-horizontal" role="form">
					<input type="hidden" name="view" value="reservations">
					<?php
					$pacients = PacientData::getAll();
					$medics = MedicData::getAll();
					?>

					<div class="form-group">


						<div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon">Número de caso <i class="fa fa-search"></i></span>
								<input type="text" name="numcase" value="<?php if (isset($_GET["numcase"]) && $_GET["numcase"] != "") {
																				echo $_GET["numcase"];
																			} ?>" class="form-control" placeholder=" ">

							</div>
						</div>

						<div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-male"></i></span>
								<select name="pacient_id" class="form-control">
									<option value="">Usuario</option>
									<?php foreach ($pacients as $p) : ?>
										<option value="<?php echo $p->id; ?>" <?php if (isset($_GET["pacient_id"]) && $_GET["pacient_id"] == $p->id) {
																					echo "selected";
																				} ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="col-lg-2">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-support"></i></span>
								<select name="funci_id1" class="form-control">
									<option value="">Funcionario</option>
									<?php foreach ($medics as $p) : ?>
										<option value="<?php echo $p->id; ?>" <?php if (isset($_GET["medic_id"]) && $_GET["medic_id"] == $p->id) {
																					echo "selected";
																				} ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								<input type="date" name="date_at" value="<?php if (isset($_GET["date_at"]) && $_GET["date_at"] != "") {
																				echo $_GET["date_at"];
																			} ?>" class="form-control" placeholder="Palabra clave">
							</div>
						</div>

						<div class="col-lg-2">
							<button class="btn btn-primary btn-block">Buscar</button>
						</div>

					</div>
				</form>

				<?php
				$users = array();
				if ((isset($_GET["numcase"]) && isset($_GET["funci_id1"]) && isset($_GET["date_at"])) && ($_GET["numcase"] != "" || $_GET["funci_id1"] != "" || $_GET["date_at"] != "")) {
					$sql = "select * from reservation where ";

					if ($_GET["numcase"] != "") {
						$sql .= "id=" . $_GET["numcase"];
					}
					if ($_GET["funci_id1"] != "") {
						if ($_GET["pacient_id"] != "") {
							$sql .= " and ";
						}
						$sql .= " funci_id1 = " . $_GET["funci_id1"];
					}
					if ($_GET["date_at"] != "") {
						if ($_GET["numcase"] != "" || $_GET["funci_id1"] != "") {
							$sql .= " and ";
						}
						$sql .= " date_at = \"" . $_GET["date_at"] . "\"";
					}

					$users = ReservationData::getBySQL($sql);
				} else {
					//$users = ReservationData::getAll();
				}
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
							//$medic = $user->getMedic();
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
								<td style="width:180px;">
									<a href="index.php?view=editreservation&id=<?php echo $user->id; ?>" class="btn btn-warning btn-xs">Editar</a>
									<a href="index.php?action=delreservation&id=<?php echo $user->id; ?>" class="btn btn-danger btn-xs">Eliminar</a>
								</td>
							</tr>
						<?php

						}
						?>
					</table>
			</div>
		</div>
	<?php
				} else if (isset($_GET["pacient_id"]) != "" && count($users) == 0) {
					echo "<p class='alert alert-danger'>No Se encuentra Busqueda</p>";
				} else {
	?>

		<br>
		<hr>
		<h4 class="title">Lista de todos los Casos</h4>

		<?php

					//$users = ReservationData::getAll();
					$users = ReservationData::getAllDATA();
					$usersPac = array();

					if (count($users) > 0) {
						//$usersPac = PacientData::getById($user->pacient_id);
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
					<th></th>
				</thead>
				<?php
						foreach ($users as $user) {
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
						<td style="width:180px;">
							<a href="index.php?view=reservationhistory&id=<?php echo $user->id; ?>" class="btn btn-default btn-xs">Seguimiento</a>
							<?php if (UserData::getById($_SESSION["user_id"])->is_admin) {
							?>
								<a href="index.php?view=editreservation&id=<?php echo $user->id; ?>" class="btn btn-warning btn-xs">Editar</a>	
								<a href="index.php?action=delreservation&id=<?php echo $user->id; ?>" class="btn btn-danger btn-xs">Eliminar</a>
							<?php
							}
							?>
						</td>
					</tr>

				<?php
						}
				?>

			</table>
	<?php

					} else {
						echo "<p class='alert alert-danger'>No Se encuentra Busqueda</p>";
					}
				}
	?>


	</div>
</div>