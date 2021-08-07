<div class="row">
	<div class="col-md-12">
		<div class="btn-group pull-right">

		</div>
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Afectados</h4>
			</div>


			<div class="card-content table-responsive">
				<h4 class="title">Agregar Afectado</h4>
				<a href="index.php?view=newpacient" class="btn btn-default"><i class='fa fa-male'></i> Nuevo Paciente</a>
				<br>
				<hr>

				<form class="form-horizontal" role="form">
					<input type="hidden" name="view" value="pacients">
					<h4 class="title">Buscar Afectado</h4>
					<div class="col-lg-6">
						<div class="input-group">
							<span class="input-group-addon">Número Documento <i class="fa fa-search"></i></span>
							<input type="text" name="q" value="<?php if (isset($_GET["q"]) && $_GET["q"] != "") {
																	echo $_GET["q"];
																} ?>" class="form-control" placeholder="  Ingrese Número ">
						</div>
					</div>
					<div class="col-lg-3">
						<button class="btn btn-primary btn-block">Buscar</button>
					</div>
					<br><br>
				</form>


				<?php
				$users = array();
				if ((isset($_GET["q"])) && ($_GET["q"] != "")) {
					$sql = "select * from pacient where ";

					if ($_GET["q"] != "") {
						// $sql .= " title like '%$_GET[q]%' and note like '%$_GET[q] %' ";
						$sql .= " cc = " . $_GET["q"];
					}
					$users = PacientData::getBySQL($sql);
				} else {
					// $users = PacientData::getAll();
				}

				if (count($users) > 0) {
					// si hay usuarios
				?>
					<table class="table table-bordered table-hover">
						<thead>
							<th>Nombre completo</th>
							<th>Numero de Documento</th>
							<th>Correo Electronico</th>
							<th>Telefono</th>
							<th>Telefono Celular</th>
							<th></th>
						</thead>

						<?php
						foreach ($users as $user) {
						?>
							<tr>
								<td><?php echo $user->name . " " . $user->lastname; ?></td>
								<td><?php echo $user->cc; ?></td>
								<td><?php echo $user->email; ?></td>
								<td><?php echo $user->phone; ?></td>
								<td><?php echo $user->phonecel; ?></td>
								<td style="width:280px;">
									<!-- <a href="index.php?view=newreservation&id=<?php echo $user->id; ?>" class="btn btn-default btn-xs">Nuevo PQRD</a> -->
									<!-- <a href="index.php?view=newreservation" class="btn btn-warning btn-xs">Nuevo PQRD</a> -->
									<a href="index.php?view=pacienthistory&id=<?php echo $user->id; ?>" class="btn btn-default btn-xs">Historial</a>
									<a href="index.php?view=editpacient&id=<?php echo $user->id; ?>" class="btn btn-warning btn-xs">Editar</a>
									<!-- <a href="index.php?view=delpacient&id=<?php echo $user->id; ?>" class="btn btn-danger btn-xs">Eliminar</a> -->
								</td>
							</tr>
						<?php

						}
						?>
					</table>
			</div>
		</div>
	<?php
				} else {
	?>
		<br><br>
		<?php
					echo "<p class='alert alert-danger'>No se encontro afectador por el buscador</p>";
		?>
		<!-- Fin buscador de pacientes -->

		<br>
		<hr>
		<h4 class="title">Lista de todos los Afectados</h4>


		<!-- TODO- Limitar el numero de pacientes que se muestran -->
		<?php
					$users = PacientData::getAll();
					if (count($users) > 0) {
						// si hay usuarios
		?>

			<table class="table table-bordered table-hover">
				<thead>
					<th>Nombre completo</th>
					<th>Numero de Documento</th>
					<th>Correo Electronico</th>
					<th>Telefono</th>
					<th>Telefono Celular</th>
					<th></th>
				</thead>
				<?php
						foreach ($users as $user) {
				?>

					<td><?php echo $user->name . " " . $user->lastname; ?></td>
					<td><?php echo $user->numdoc; ?></td>
					<td><?php echo $user->email; ?></td>
					<td><?php echo $user->phone; ?></td>
					<td><?php echo $user->phonecel; ?></td>
					<td style="width:280px;">
						<!-- <a href="index.php?view=newreservation&id=<?php echo $user->id; ?>" class="btn btn-default btn-xs">Nuevo PQRD</a> -->
						<a href="index.php?view=pacienthistory&id=<?php echo $user->id; ?>" class="btn btn-default btn-xs">Historial</a>
						<a href="index.php?view=editpacient&id=<?php echo $user->id; ?>" class="btn btn-warning btn-xs">Editar</a>
						<!-- <a href="index.php?view=delpacient&id=<?php echo $user->id; ?>" class="btn btn-danger btn-xs">Eliminar</a> -->
					</td>
					</tr>
				<?php

						}
				?>
			</table>
	<?php

					} else {
						echo "<p class='alert alert-danger'>No hay pacientes</p>";
					}
				}
	?>


	</div>
</div>


<!-- </div>
</div> -->