<?php
$reservation = ReservationData::getById($_GET["id"]);
$statuses = StatusData::getAll();

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
        <h4>Nuevo Seguimiento PQRD</h4>
        <p>Número Solicitud: <?php echo $_GET["id"] ?></p>
        <p>Paciente: <?php echo PacientData::getById($reservation->pacient_id)->name . " " . PacientData::getById($reservation->pacient_id)->lastname; ?></p>

      </div>
      <div class="card-content table-responsive">

        <!-- <form class="form-horizontal" role="form" method="post" action="./?action=addhistoryreservation"> -->
        <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addhistoryreservation" role="form">

          <div class="col-lg-3">
            <input type="text" name="reservation_id" required class="form-control" id="nameafectado" value="<?php echo $_GET["id"] ?>">
          </div>
          <br><br><br><br>

          <!-- 3 -->
          <div class="row">
            <div class="col-4">
              <!-- COLUMNA izquierda-->
              <label for="inputEmail1" class="col-lg-2 control-label">Tipo de Seguimiento</label>
              <div class="col-lg-3">
                <label class="checkbox-inline">
                  <input type="radio" id="inlineCheckbox1" name="tiposeguimiento" value="GESTION DE APOYO"> GESTION DE APOYO
                </label>
                <label class="checkbox-inline">
                  <input type="radio" id="inlineCheckbox1" name="tiposeguimiento" value="OTRO"> OTRO
                </label>
              </div>

              <div class="col-4">
                <label for="inputEmail1" class="col-lg-2 control-label">Tipo Evento</label>
                <div class="col-lg-3">
                  <textarea class="form-control" name="tipoevento" placeholder=""></textarea>
                </div>
              </div>

            </div>
          </div>

          <!-- 4 -->
          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">LLamada Realizada</label>
              <div class="col-lg-4">
                <label class="checkbox-inline">
                  <input type="radio" id="inlineCheckbox1" name="llamada" value="ACOMPAÑANTE"> ACOMPAÑANTE
                </label>
                <label class="checkbox-inline">
                  <input type="radio" id="inlineCheckbox1" name="llamada" value="PERSONAL DE IPS O EPS">PERSONAL DE IPS O EPS
                </label>
              </div>
            </div>

            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
              <div class="col-lg-3">
                <select name="estado" class="form-control" required>
                  <?php foreach ($statuses as $p) : ?>
                    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Diagnostico</label>
            <div class="col-lg-5">
              <textarea class="form-control" name="diagnostico" placeholder=""></textarea>
            </div>
          </div>
          <hr>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Descripción de la Solicitud</label>
            <div class="col-lg-8">
              <textarea class="form-control" name="descripcion" placeholder="Ingrese la descripción" cols="80" rows="10" style="resize: both"></textarea>
            </div>
          </div>
          <br>
          <hr>


          <!-- 5 -->
          <div class="row">
            <div class="col-4">
              <!-- COLUMNA izquierda-->
              <label for="inputEmail1" class="col-lg-2 control-label">Radicado de cierre</label>
              <div class="col-lg-3">
                <textarea class="form-control" name="rad_cierre" placeholder=""></textarea>
              </div>

              <!-- COLUMNA izquierda-->
              <div class="col-4">
                <label for="inputEmail1" class="col-lg-2 control-label">Radicado de traslado</label>
                <div class="col-lg-3">
                  <textarea class="form-control" name="rad_traslado" placeholder=""></textarea>
                </div>
              </div>
            </div>
          </div>


          <!-- 6 -->
          <div class="row">
            <div class="col-4">
              <!-- COLUMNA izquierda-->
              <label for="inputEmail1" class="col-lg-2 control-label">Fecha de traslado</label>
              <div class="col-md-3">
                <input type="date" name="f_traslado" class="form-control" id="address1" placeholder="Fecha de 
              traslado">
              </div>

              <!-- COLUMNA izquierda-->
              <div class="col-4">
                <label for="inputEmail1" class="col-lg-2 control-label">Entidad a la que se trasladó</label>
                <div class="col-lg-3">
                  <select name="entidadtraslado" class="form-control" required>
                    <option value="">-- SELECCIONE --</option>
                    <option value="Superintendencia de salud"> Superintendencia de salud</option>
                    <option value="Secretaría de salud Departamental"> Secretaría de salud Departamental</option>
                    <option value="Otro"> Otro</option>
                  </select>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-4">
              <!-- 1 -->
              <!-- COLUMNA izquierda-->
              <label for="inputEmail1" class="col-lg-2 control-label">Número de radicado</label>
              <div class="col-lg-3">
                <textarea class="form-control" name="rad" placeholder=""></textarea>
              </div>

              <!-- COLUMNA izquierda-->
              <div class="col-4">
                <label for="inputEmail1" class="col-lg-2 control-label">Radicado de prorroga</label>
                <div class="col-lg-3">
                  <textarea class="form-control" name="rad_prorroga" placeholder=""></textarea>
                </div>
              </div>
            </div>
          </div>

          <!-- 2 -->
          <div class="row">
            <div class="col-4">
              <!-- COLUMNA izquierda-->
              <label for="inputEmail1" class="col-lg-2 control-label">Fecha de prorroga</label>
              <div class="col-md-3">
                <input type="date" name="f_prorroga" class="form-control" id="address1" placeholder="Fecha de 
                prorroga">
              </div>

              <!-- COLUMNA izquierda-->
              <div class="col-4">
                <label for="inputEmail1" class="col-lg-2 control-label">Fecha de cierre</label>
                <div class="col-md-3">
                  <input type="date" name="f_cierre" class="form-control" id="address1" placeholder="Fecha de 
                  cierre">
                </div>
              </div>
            </div>
          </div>
          <hr>


          <div class="form-group">
            <div class="col-lg-offset-5 col-lg-5">
              <button type="submit" class="btn btn-default">Agregar Seguimiento</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>