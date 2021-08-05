<?php
$reservation = ReservationData::getById($_GET["id"]);
$statuses = StatusData::getAll();

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


          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Numero de seguimiento</label>
            <div class="col-lg-6">
              <textarea class="form-control" name="reservation_id"  placeholder=""></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Tipo de Seguimiento</label>
            <div class="col-lg-6">
              <textarea class="form-control" name="tiposeguimiento" placeholder=""></textarea>
            </div>
          </div>


          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Diagnostico</label>
            <div class="col-lg-10">
              <textarea class="form-control" name="diagnostico" placeholder=""></textarea>
            </div>
          </div>


          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">LLamada Realizada</label>
            <div class="col-lg-10">
              <textarea class="form-control" name="llamada" placeholder=""></textarea>
            </div>
          </div>


          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Tipo de Caso</label>
            <div class="col-lg-10">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="title" value="GESTION DE APOYO"> GESTION DE APOYO
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="title" value="OTRO"> OTRO
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
            <div class="col-lg-10">
              <select name="estado" class="form-control" required>
                <?php foreach ($statuses as $p) : ?>
                  <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Tipo Evento</label>
            <div class="col-lg-10">
              <textarea class="form-control" name="tipoevento" placeholder=""></textarea>
            </div>
          </div>


          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Descripción de la Solicitud</label>
            <div class="col-lg-8">
              <textarea class="form-control" name="descripcion" placeholder="Ingrese la descripción" cols="80" rows="10" style="resize: both"></textarea>
            </div>
          </div>









          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button type="submit" class="btn btn-default">Agregar Seguimiento</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>