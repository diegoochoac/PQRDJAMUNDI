<?php
$reservation = ReservationData::getById($_GET["id"]);
$pacients = PacientData::getAll();
$medics = MedicData::getAll();
$statuses = StatusData::getAll();
$payments = PaymentData::getAll();

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
        <h4 class="title">Modificar Peticion</h4>
      </div>

      <div class="card-content table-responsive">
        <form class="form-horizontal" role="form" method="post" action="./?action=updatereservation">

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Número de Solicitud</label>
            <div class="col-lg-2">
              <input type="text" name="id_reservationView" readonly value=<?php echo $reservation->id; ?> class="form-control" id="inputEmail1">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Fecha Solicitud</label>
            <div class="col-lg-2">
              <input type="date" name="date_at" readonly class="form-control" id="inputEmail1" value=<?php echo $reservation->date_at; ?> placeholder="Fecha">
            </div>
          </div>


          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Descripción de la Petición*</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="description" value=<?php echo $reservation->description; ?> cols="40" rows="8" style="resize: both">
            </div>
          </div>
          <br>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Diagnostico*</label>
            <div class="col-lg-5">
              <input type="text" class="form-control" name="diagnostico" value=<?php echo $reservation->diagnostico; ?>>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Tipo de Caso*</label>
              <div class="col-lg-3">
                <select name="typecase" class="form-control">
                  <option value=<?php echo $reservation->typecase; ?>><?php echo $reservation->typecase; ?></option>
                  <option value="Orientacion">Orientacion </option>
                  <option value="Radicación">Radicación </option>
                </select>
              </div>
            </div>
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Tipo de Evento*</label>
              <div class="col-lg-3">
                <select name="typeevent" class="form-control">
                  <option value=<?php echo $reservation->typeevent; ?>><?php echo $reservation->typeevent; ?></option>
                  <option value="COVID 19">COVID 19 </option>
                  <option value="Enfermedad General">Enfermedad General</option>
                  <option value="ncologico">Oncologico</option>
                  <option value="Enfermedad Huerfana">Enfermedad Huerfana</option>
                  <option value="Enfermedad Catastrofica">Enfermedad Catastrofica</option>
                  <option value="Gestantes">Gestantes</option>
                  <option value="Salud Mental">Salud Mental</option>
                  <option value="Accidente de Trabajo">Accidente de Trabajo</option>

                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Condición del Afectado*</label>
              <div class="col-lg-3">
                <select name="conafec" class="form-control">
                  <option value=<?php echo $reservation->conafec; ?>><?php echo $reservation->conafec; ?></option>
                  <option value="Hospitalizado">Hospitalizado </option>
                  <option value="Ambulatorio">Ambulatorio</option>
                </select>
              </div>
            </div>
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Número SISNET</label>
              <div class="col-lg-3">
                <input type="text" class="form-control" value=<?php echo $reservation->numrad; ?> name="numrad" placeholder="Ingrese Número">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Entes de Control</label>
              <div class="col-lg-3">
                <select name="encontrol" class="form-control">
                  <option value=<?php echo $reservation->encontrol; ?>><?php echo $reservation->encontrol; ?></option>
                  <option value="No Aplica">No Aplica </option>
                  <option value="Personeria Municipal">Personeria Municipal </option>
                  <option value="Veeduria Ciudadana">Veeduria Ciudadana</option>
                  <option value="Defensoria del Pueblo">Defensoria del Pueblo</option>
                  <option value="Procuraduria">Procuraduria</option>
                  <option value="Concejo Municipal">Concejo Municipal </option>
                </select>
              </div>
            </div>
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Origen de Petición*</label>
              <div class="col-lg-3">
                <select name="orpeticion" class="form-control">
                  <option value=<?php echo $reservation->orpeticion; ?>><?php echo $reservation->orpeticion; ?></option>
                  <option value="EPS">EPS </option>
                  <option value="IPS">IPS</option>
                </select>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Funcionario que crea la Solicitud</label>
              <div class="col-lg-3">
                <select name="funci_id1" readonly class="form-control">
                  <option value=""><?php echo MedicData::getById($reservation->funci_id1)->name ?></option>
                  <?php foreach ($medics as $p) : ?>
                    <option value="<?php echo $p->id; ?>"><?php echo $p->name . " " . $p->lastname; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Funcionario a quien se asigna la Solicitud</label>
              <div class="col-lg-3">
                <select name="funci_id2" readonly class="form-control">
                  <option value=""><?php echo MedicData::getById($reservation->funci_id2)->name; ?></option>
                  <?php foreach ($medics as $p) : ?>
                    <option value="<?php echo $p->id; ?>"><?php echo $p->name . " " . $p->lastname; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Canal de recepción*</label>
              <div class="col-lg-3">
                <select name="chcomun" class="form-control">
                  <option value=<?php echo $reservation->chcomun ?>><?php echo $reservation->chcomun ?></option>
                  <option value="Presencial"> Presencial</option>
                  <option value="Telefonico"> Telefonico</option>
                  <option value="web Alcaldia"> web Alcaldia</option>
                  <option value="whatssap"> whatssap</option>
                  <option value="Redes Sociales"> Redes Sociales</option>
                </select>
              </div>
            </div>

            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Atributo de Calidad*</label>
              <div class="col-lg-3">
                <select name="atrcalidad" class="form-control">
                  <option value=<?php echo $reservation->atrcalidad ?>><?php echo $reservation->atrcalidad ?></option>
                  <option value="Accesibilidad"> Accesibilidad</option>
                  <option value="Oportunidad"> Oportunidad</option>
                  <option value="Continuidad"> Continuidad</option>
                  <option value="Pertinencia"> Pertinencia</option>
                  <option value="Satisfaccion del Usuario"> Satisfaccion del Usuario</option>
                  <option value="Seguridad"> Seguridad</option>
                </select>
              </div>
            </div>
          </div>

          <!-- <div class="row">
                <div class="col-4">
                  <div class="col-4">
                    <input type="hidden" name="pacient_id" required class="col-lg-2 control-label" value="<?php echo $userA->id; ?>">
                  </div>
                  <div class="col-4">
                    <input type="hidden" name="pacientp_id" required class="col-lg-2 control-label" value="<?php echo $userP->id; ?>">
                  </div>
                </div>
              </div> -->


          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <input type="hidden" name="id" value="<?php echo $reservation->id; ?>">
              <button type="submit" class="btn btn-primary">Actualizar Petición</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>