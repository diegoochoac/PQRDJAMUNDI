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
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Reporte de solicitudes</h4>
			</div>
			<div class="card-content table-responsive">


				<form class="form-horizontal" role="form">
					<input type="hidden" name="view" value="reports">
					<?php
					$pacients = PacientData::getAll();
					$medics = MedicData::getAll();
					$statuses = StatusData::getAll();
					// $payments = PaymentData::getAll();
					?>

					<div class="form-group">

						<div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-male"></i></span>
								<select name="pacient_id" class="form-control">
									<option value="">AFECTADO</option>
									<?php foreach ($pacients as $p) : ?>
										<option value="<?php echo $p->id; ?>" <?php if (isset($_GET["pacient_id"]) && $_GET["pacient_id"] == $p->id) {
																					echo "selected";
																				} ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-support"></i></span>
								<select name="funci_id1" class="form-control">
									<option value="">FUNCIONARIO</option>
									<?php foreach ($medics as $p) : ?>
										<option value="<?php echo $p->id; ?>" <?php if (isset($_GET["funci_id1"]) && $_GET["funci_id1"] == $p->id) {
																					echo "selected";
																				} ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon">INICIO</span>
								<input type="date" name="start_at" value="<?php if (isset($_GET["start_at"]) && $_GET["start_at"] != "") {
																				echo $_GET["start_at"];
																			} ?>" class="form-control" placeholder="Palabra clave">
							</div>
						</div>
						<div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon">FIN</span>
								<input type="date" name="finish_at" value="<?php if (isset($_GET["finish_at"]) && $_GET["finish_at"] != "") {
																				echo $_GET["finish_at"];
																			} ?>" class="form-control" placeholder="Palabra clave">
							</div>
						</div>

					</div>
					<div class="form-group">

						<div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon">ESTADO</span>
								<select name="status_id" class="form-control">
									<?php foreach ($statuses as $p) : ?>
										<option value="<?php echo $p->id; ?>" <?php if (isset($_GET["status_id"]) && $_GET["status_id"] == $p->id) {
																					echo "selected";
																				} ?>><?php echo $p->name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<!-- <div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon">PAGO</span>
								<select name="payment_id" class="form-control">
									<?php foreach ($payments as $p) : ?>
										<option value="<?php echo $p->id; ?>" <?php if (isset($_GET["payment_id"]) && $_GET["payment_id"] == $p->id) {
																					echo "selected";
																				} ?>><?php echo $p->name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div> -->
						<div class="col-lg-6">
							<button class="btn btn-primary btn-block">Procesar</button>
						</div>

					</div>
				</form>

				<?php
				$users = array();
				if ((isset($_GET["status_id"])  && isset($_GET["pacient_id"]) && isset($_GET["funci_id1"]) && isset($_GET["start_at"]) && isset($_GET["finish_at"])) && ($_GET["status_id"] != ""  || $_GET["pacient_id"] != "" || $_GET["funci_id1"] != "" || ($_GET["start_at"] != "" && $_GET["finish_at"] != ""))) {
					$sql = "select * from reservation where ";
					if ($_GET["status_id"] != "") {
						$sql .= " status_id = " . $_GET["status_id"];
					}

					if ($_GET["pacient_id"] != "") {
						if ($_GET["status_id"] != "" ) {
							$sql .= " and ";
						}
						$sql .= " pacient_id = " . $_GET["pacient_id"];
					}

					if ($_GET["funci_id1"] != "") {
						if ($_GET["status_id"] != "" || $_GET["pacient_id"] != "") {
							$sql .= " and ";
						}

						$sql .= " func_id1 = " . $_GET["func_id1"];
					}



					if ($_GET["start_at"] != "" && $_GET["finish_at"]) {
						if ($_GET["status_id"] != "" || $_GET["pacient_id"] != "" || $_GET["funci_id1"] != "" ) {
							$sql .= " and ";
						}

						$sql .= " ( date_at >= \"" . $_GET["start_at"] . "\" and date_at <= \"" . $_GET["finish_at"] . "\" ) ";
					}

					//echo $sql;
					$users = ReservationData::getBySQL($sql);
				} else {
					//$users = ReservationData::getAllPendings();
					$users = ReservationData::getAll();
				}
				if (count($users) > 0) {
					// si hay usuarios
					$_SESSION["report_data"] = $users;
				?>
					<div class="panel panel-default">
						<div class="panel-heading">
							Reportes</div>
						<table class="table table-bordered table-hover">
							<thead>
								<th>Número del Caso</th>
								<th>Tipo de Caso</th>
								<th>Estado del Caso</th>
								<th>EPS</th>
								<th>Condición del Afectado</th>
								<th>Funcionario Atención</th>
								<th>Número de PQRD SISNET</th>
								<th>Fecha Creación</th>

							</thead>
							<?php
							$total = 0;
							foreach ($users as $user) {
								$pacient  = $user->getPacient();
								$medic = $user->getMedic();
							?>
								<tr>
									<td><?php echo $user->id; ?></td>
									<td><?php echo $user->typecase; ?></td>
									<td><?php echo $user->status_id; ?></td>
									<td><?php echo PacientData::getById($user->pacient_id)->eps; ?></td>
									<td><?php echo $user->conafec ?></td>
									<td><?php echo MedicData::getById($user->funci_id1)->name; ?></td>
									<td><?php echo $user->numrad; ?></td>
									<td><?php echo $user->date_at; ?></td>

								</tr>
							<?php
								// $total += $user->price;
							}
							echo "</table>";
							?>
							<div class="panel-body">
								<!-- <h1>Total: $ <?php echo number_format($total, 2, ".", ","); ?></h1> -->
								<a href="./report/report-pdf.php" class="btn btn-default"><i class="fa fa-download"> Descargar (.docx)</i></a>

							</div>
						<?php

					} else {
						echo "<p class='alert alert-danger'>No hay pacientes</p>";
					}
						?>

					</div>
			</div>

		</div>
	</div>