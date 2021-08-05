<?php
$reservations = ReservationData::getAll();
// $pacients = PacientData::getAll();
// $pacientsp = PacientDataP::getAll();
$medics = MedicData::getAll();
$statuses = StatusData::getAll();
$payments = PaymentData::getAll();

$viewpage = "newreservation&id=0"
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header" data-background-color="blue">
        <h4>Nueva Atención PQRD</h4>
        <!-- <?php $idultimo = ReservationData::getEndId(); ?> -->

        <?php
        if ((isset($_GET["id"])) && $_GET["id"] != "") {
          $pacient = PacientData::getById($_GET["id"]);
        ?>
          <p>Paciente: <?php echo $pacient->name . " " . $pacient->lastname; ?></p>

        <?php
        } else {
        } ?>

      </div>

      <div class="card-content table-responsive">



        <?php
        if ((isset($_GET["id"])) && $_GET["id"]  != "") {
        ?>
          <div class="form-group">
            <label for="inputEmail1" style="visibility: hidden" class="col-lg-2 control-label">No ID del Paciente</label>
            <div class="col-lg-4">
              <!-- <input type="text" name="pacient_id" required class="form-control" id="inputEmail1" readonly style="visibility: hidden" placeholder="ID unico del paciente" value=<?php echo $pacient->id; ?>> -->
            </div>
          </div>

        <?php
        } else {
          //Buscador de personas por numero de cedula
        ?>



          <div class="form-group">
            <form class="form-horizontal" role="form">
              <input type="hidden" name="view" value="newreservation">
              <h4 class="title">Buscar Afectado</h4>
              <div class="col-lg-6">
                <div class="input-group">
                  <span class="input-group-addon">Número Documento Afectado <i class="fa fa-search"></i></span>
                  <input type="text" name="qa" value="<?php if (isset($_GET["qa"]) && $_GET["qa"] != "") {
                                                        echo $_GET["qa"];
                                                      } ?>" class="form-control" placeholder="  Ingrese Número Documento">
                </div>
              </div>
              <br>
              <div class="col-lg-3">
                <button class="btn btn-primary btn-block">Buscar Afectado</button>
              </div>
              <br><br><br>
              <hr>
              <!-- <br> -->


              <?php
              //$users = array();
              if ((isset($_GET["qa"])) && ($_GET["qa"] != "")) {

                $userA = PacientData::getByCC($_GET["qa"]);

                if ($userA != "") {
              ?>

                  <?php
                  // echo "<p class='alert alert-warning'>Se encontro afectador por el buscador</p>";
                  ?>
                  <div class="row">
                    <div class="col-4">
                      <label for="inputEmail1" class="col-lg-2 control-label">Nombres*</label>
                      <div class="col-lg-3">
                        <input type="text" name="nameafectado" required class="form-control" id="nameafectado" value="<?php echo $userA->name; ?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
                      <div class="col-lg-3">
                        <input type="text" name="lastnameafectado" required class="form-control" id="lastnameafectado" value="<?php echo $userA->lastname; ?>">
                      </div>
                    </div>
                  </div>
                  <br><br>
                  <hr>

                <?php
                } else {
                ?>
                  <!-- <br><br> -->
                  <?php
                  echo "<p class='alert alert-danger'>No se encontro AFECTADO por el buscador, por favor creelo a contiuación</p>";
                  ?>
                  <div>
                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Nombres*</label>
                        <div class="col-lg-3">
                          <input type="text" name="namepeticiona" required class="form-control" id="namepeticionario" placeholder="Nombres del Contacto">
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
                        <div class="col-lg-3">
                          <input type="text" name="lastnamepeticionario" required class="form-control" id="lastnamepeticionario" placeholder="Apellidos del Contacto">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Tipo Documento*</label>
                        <div class="col-lg-3">
                          <select name="typedoc" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="GESTION DE APOYO"> Cedula Ciudadania</option>
                            <option value="GESTION DE APOYO"> Cedula Extranjeria</option>
                            <option value="GESTION DE APOYO"> Tarjeta de Identidad</option>
                            <option value="GESTION DE APOYO"> Pasaporte</option>
                            <option value="GESTION DE APOYO"> Registro Civil</option>
                            <option value="GESTION DE APOYO"> Tarjeta de Identidad</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">No Documento Identidad</label>
                        <div class="col-md-3">
                          <input type="text" name="ccpeticionario" required class="form-control" id="lastname" placeholder="Número Documento Contacto">
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Nacimiento</label>
                        <div class="col-md-3">
                          <input type="date" name="day_of_birth" class="form-control" id="address1" placeholder="Fecha de Nacimiento">
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Edad</label>
                        <div class="col-md-3">
                          <input type="text" name="age" class="form-control" id="age" placeholder="Edad">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Genero*</label>
                        <div class="col-md-3">
                          <label class="checkbox-inline">
                            <input type="radio" id="inlineCheckbox1" name="gender" required value="h"> Hombre
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" id="inlineCheckbox2" name="gender" required value="m"> Mujer
                          </label>
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Usted se Autoreconoce como*</label>
                        <div class="col-lg-3">
                          <select name="gender2" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="">Heterosexual</option>
                            <option value="">Homosexual</option>
                            <option value="">Bisexual</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Poblacion Especial*</label>
                        <div class="col-md-3">
                          <select name="tipopoblacionespecial" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="">Desplazado</option>
                            <option value="">Habitante de Calle </option>
                            <option value="">Persona con Discapacidad</option>
                            <option value="">Población Carcelaria (presos)</option>
                            <option value="">Trabajador Sexual</option>
                            <option value="">Violencia de Genero</option>
                            <option value="">Violencia de Conflico Armado</option>
                            <option value="">No Aplica</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Clasificacion de poblacion*</label>
                        <div class="col-md-3">
                          <select name="tipopoblacion" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="">Afrocolombiano</option>
                            <option value="">Indigena</option>
                            <option value="">Mulato</option>
                            <option value="">Negro</option>
                            <option value="">ROM-Gitano</option>
                            <option value="">No Aplica</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Discapacidad*</label>
                        <div class="col-md-3">
                          <select name="tipopoblacion" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="">Ninguna</option>
                            <option value="">Visual</option>
                            <option value="">Auditiva</option>
                            <option value="">Fisica</option>
                            <option value="">Intelectual</option>
                            <option value="">Psicosocial</option>
                            <option value="">Multiple</option>
                          </select>
                        </div>
                      </div>
                    </div>



                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">No Telefono Fijo*</label>
                        <div class="col-md-3">
                          <input type="text" name="phone1peticionario" required class="form-control" id="phone1peticionario" placeholder="Telefono Fijo">
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">No Telefono Celular*</label>
                        <div class="col-md-3">
                          <input type="text" name="phone2peticionario" required class="form-control" id="phone2peticionario" placeholder="Telefono celular">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Email Contacto*</label>
                        <div class="col-md-6">
                          <input type="text" name="emailpeticionario" required class="form-control" id="emailpeticionario" placeholder="correo electronico peticionario">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
                        <div class="col-md-3">
                          <input type="text" name="address" class="form-control" id="address1" placeholder="Direccion">
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Area Rural*</label>
                        <div class="col-md-3">
                          <input type="text" name="address2" class="form-control" id="address2" placeholder="Area Rural">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">EPS*</label>
                        <div class="col-md-3">
                          <select name="eps" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="">Coosalud</option>
                            <option value="">S.O.S</option>
                            <option value="">Nueva EPS </option>
                            <option value="">Comfenalco Valle </option>
                            <option value="">EPS Sura</option>
                            <option value="">Coomeva EPS</option>
                            <option value="">Sanitas EPS</option>
                            <option value="">Salud Total</option>
                            <option value="">Asmet Salud</option>
                            <option value="">A.I.C Epsi</option>
                            <option value="">Famisanar</option>
                            <option value="">Compensar</option>
                            <option value="">Universidades</option>
                            <option value="">Ecopetrol</option>
                            <option value="">Fuerzas Militares</option>
                            <option value="">Magisterio</option>
                            <option value="">Ferrocarriles y Puertos</option>
                            <option value="">Otra</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Tipo de Regimen*</label>
                        <div class="col-md-3">
                          <select name="tiporegimen" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="">Contributivo</option>
                            <option value="">Subsidiado</option>
                            <option value="">Especial</option>
                          </select>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Si el afectado es Extranjero*</label>
                        <div class="col-md-3">
                          <select name="extranjero" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="">Venezolano</option>
                            <option value="">Otro</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Especifique si el Extranjero esta*</label>
                        <div class="col-md-3">
                          <select name="extranjerostate" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="">Con Seguridad Social</option>
                            <option value="">Sin Seguridad Social</option>
                          </select>
                        </div>
                      </div>
                    </div>

                  </div>

          </div>
          <br><br>
          <hr>

        <?php
                }
        ?>
      <?php
              }
      ?>
      <!-- /////////////////////////////////////////////////////PETICIONARIO//////////////////////////////// -->
      <h4 class="title">Buscar Peticionario</h4>
      <div class="col-lg-6">
        <div class="input-group">
          <span class="input-group-addon">Número Documento Peticionario <i class="fa fa-search"></i></span>
          <input type="text" name="qp" value="<?php if (isset($_GET["qp"]) && $_GET["qp"] != "") {
                                                echo $_GET["qp"];
                                              } ?>" class="form-control" placeholder="  Ingrese Número Dcoumento ">
        </div>
      </div>
      <div class="col-lg-3">
        <button class="btn btn-primary btn-block">Buscar Peticionario</button>
      </div>
      <br><br><br>
      <hr>

      <?php
          //$users = array();
          if ((isset($_GET["qp"])) && ($_GET["qp"] != "")) {


            $userP = PacientDataP::getByCC($_GET["qp"]);


            if ($userP != "") {
      ?>
          <?php
              // echo "<p class='alert alert-warning'>Se encontro PETICIONARIO por el buscador</p>";
          ?>
          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Nombres*</label>
              <div class="col-lg-3">
                <input type="text" name="namepeticionario" required class="form-control" id="namepeticionario" value="<?php echo $userP->name; ?>">
              </div>
            </div>
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
              <div class="col-lg-3">
                <input type="text" name="lastnamepeticionario" required class="form-control" id="lastnamepeticionario" value="<?php echo $userP->lastname; ?>">
              </div>
            </div>
          </div>

          <br><br>
          <hr>

        <?php
            } else {
        ?>
          <!-- <br><br> -->
          <?php
              echo "<p class='alert alert-danger'>No se encontro PETICIONARIO por el buscador, por favor creelo a contiuación</p>";
          ?>
          <div>
            <form>
              <div class="row">
                <div class="col-4">
                  <label for="inputEmail1" class="col-lg-2 control-label">Nombres*</label>
                  <div class="col-lg-3">
                    <input type="text" name="namepeticionarioq" required class="form-control" id="namepeticionario" placeholder="Nombres del Contacto">
                  </div>
                </div>
                <div class="col-4">
                  <label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
                  <div class="col-lg-3">
                    <input type="text" name="lastnamepeticionarioq" required class="form-control" id="lastnamepeticionario" placeholder="Apellidos del Contacto">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-4">
                  <label for="inputEmail1" class="col-lg-2 control-label">Tipo Documento*</label>
                  <div class="col-lg-3">
                    <select name="typedocq" class="form-control" required>
                      <option value="">-- SELECCIONE --</option>
                      <option value="Cedula Ciudadania"> Cedula Ciudadania</option>
                      <option value="Cedula Extranjeria"> Cedula Extranjeria</option>
                      <option value="Tarjeta de Identidad"> Tarjeta de Identidad</option>
                      <option value="Pasaporte"> Pasaporte</option>
                    </select>
                  </div>
                </div>
                <div class="col-4">
                  <label for="inputEmail1" class="col-lg-2 control-label">No Documento Identidad</label>
                  <div class="col-md-3">
                    <input type="text" name="numdocq" required class="form-control" id="lastname" placeholder="Número Documento" value="<?php echo $_GET["qp"] ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-4">
                  <label for="inputEmail1" class="col-lg-2 control-label">No Telefono Fijo*</label>
                  <div class="col-md-3">
                    <input type="text" name="phone1petq" required class="form-control" id="phone1peticionario" placeholder="Telefono Fijo">
                  </div>
                </div>
                <div class="col-4">
                  <label for="inputEmail1" class="col-lg-2 control-label">No Telefono Celular*</label>
                  <div class="col-md-3">
                    <input type="text" name="phone2petq" required class="form-control" id="phone2peticionario" placeholder="Telefono celular">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Email Contacto*</label>
                <div class="col-md-4">
                  <input type="text" name="emailpetq" required class="form-control" id="emailpeticionario" placeholder="correo electronico peticionario">
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-offset-4 col-lg-10">
                  <button type="submit" class="btn btn-primary">Agregar Peticionario</button>
                </div>
              </div>
            </form>
          </div>

          <?php

              if ((isset($_GET["namepeticionarioq"])) && ($_GET["namepeticionarioq"] != "") && $usersP == "") {
                PacientDataP::addForce($_GET["namepeticionarioq"], $_GET["lastnamepeticionarioq"], $_GET["typedocq"], $_GET["numdocq"], $_GET["phone1petq"], $_GET["phone2petq"], $_GET["emailpetq"]);

                Core::redir("./index.php?view=newreservation&qa=" . $_GET["qa"] . "&qp=" . $_GET["qp"]);
              }


          ?>

          <br><br>
          <hr>
        <?php
            }
        ?>
      <?php
          } else {
          }
      ?>
      </form>
      </div>

      <!-- //////////////////////////////////////////////////////////////////////////////////// -->
      <br>
      <h4 class="title">Datos de la Solucitud</h4>
      <hr>
    <?php
        }
    ?>
    <div>

      <form class="form-horizontal" role="form" method="post" action="./?action=addreservation">

        <div class="col-lg-3">
          <input type="tect" name="pacient_id" required class="form-control" id="nameafectado" value="<?php echo $userA->id; ?>">
        </div>
        <div class="col-lg-3">
          <input type="tect" name="pacientp_id" required class="form-control" id="nameafectado" value="<?php echo $userP->id; ?>">
        </div>
        <br><br><br>

        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Número de Solicitud</label>
          <div class="col-lg-2">
            <input type="text" name="id_reservationView" readonly value=<?php echo $idultimo->id + 1; ?> required class="form-control" id="inputEmail1">
          </div>
        </div>

        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Fecha/Hora Solicitud</label>
          <div class="col-lg-2">
            <input type="date" name="date_at" readonly class="form-control" id="inputEmail1" value="<?= date('Y-m-d', time()); ?>" placeholder="Fecha">
          </div>
        </div>


        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Descripción de la Petición</label>
          <div class="col-lg-8">
            <textarea class="form-control" name="description" placeholder="Ingrese la descripción" cols="40" rows="8" style="resize: both"></textarea>
          </div>
        </div>
        <br>

        <div class="row">
          <div class="col-4">
            <label for="inputEmail1" class="col-lg-2 control-label">Tipo de Caso*</label>
            <div class="col-lg-3">
              <select name="typecase" class="form-control" required>
                <option value="">-- SELECCIONE --</option>
                <option value="Orientacion">Orientacion </option>
                <option value="Gestion">Gestion</option>
                <option value="Radicación">Radicación </option>
              </select>
            </div>
          </div>
          <div class="col-4">
            <label for="inputEmail1" class="col-lg-2 control-label">Tipo de Evento*</label>
            <div class="col-lg-3">
              <select name="typeevent" class="form-control" required>
                <option value="">-- SELECCIONE --</option>
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
              <select name="conafec" class="form-control" required>
                <option value="">-- SELECCIONE --</option>
                <option value="Hospitalizado">Hospitalizado </option>
                <option value="Ambulatorio">Ambulatorio</option>
              </select>
            </div>
          </div>
          <div class="col-4">
            <label for="inputEmail1" class="col-lg-2 control-label">Número SISNET</label>
            <div class="col-lg-3">
              <textarea class="form-control" name="numrad" placeholder="Ingrese Número"></textarea>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <label for="inputEmail1" class="col-lg-2 control-label">Entes de Control*</label>
            <div class="col-lg-3">
              <select name="encontrol" class="form-control" required>
                <option value="">-- SELECCIONE --</option>
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
              <select name="orpeticion" class="form-control" required>
                <option value="">-- SELECCIONE --</option>
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
              <select name="funci_id1" class="form-control" required>
                <option value="">-- SELECCIONE --</option>
                <?php foreach ($medics as $p) : ?>
                  <option value="<?php echo $p->id; ?>"><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="col-4">
            <label for="inputEmail1" class="col-lg-2 control-label">Funcionario a quien se asigna la Solicitud</label>
            <div class="col-lg-3">
              <select name="funci_id2" class="form-control" required>
                <option value="">-- SELECCIONE --</option>
                <?php foreach ($medics as $p) : ?>
                  <option value="<?php echo $p->id; ?>"><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>



        <div class="row">
          <div class="col-4">
            <label for="inputEmail1" class="col-lg-2 control-label">Canal de recepción</label>
            <div class="col-lg-3">
              <select name="chcomun" class="form-control" required>
                <option value="">-- SELECCIONE --</option>
                <option value="Presencial"> Presencial</option>
                <option value="Telefonico"> Telefonico</option>
                <option value="web Alcaldia"> web Alcaldia</option>
                <option value="whatssap"> whatssap</option>
                <option value="Redes Sociales"> Redes Sociales</option>
              </select>
            </div>
          </div>

          <div class="col-4">
            <label for="inputEmail1" class="col-lg-2 control-label">Atributo de Calidad</label>
            <div class="col-lg-3">
              <select name="atrcalidad" class="form-control" required>
                <option value="">-- SELECCIONE --</option>
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

    </div>
    <br><br>
    <hr>

    <div class="form-group">
      <div class="col-lg-offset-5 col-lg-5">
        <button type="submit" class="btn btn-default">Agregar Petición</button>
      </div>
    </div>
    </form>
    </div>
  </div>
</div>
</div>