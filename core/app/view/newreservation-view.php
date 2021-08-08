<?php
$reservations = ReservationData::getAll();
// $pacients = PacientData::getAll();
// $pacientsp = PacientDataP::getAll();
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
        <h4>Nueva Atención</h4>
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
        <div class="form-group">
          <form class="form-horizontal" role="form">
            <input type="hidden" name="view" value="newreservation">



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
                        <button type="submit" class="btn btn-primary">Agregar Afectado</button>
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
            }
            ?>
            <!-- </form> -->


            <!-- ///////////////////////////////////////// AFECTADO ///////////////////////////// -->
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
                  <form>
                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Nombres*</label>
                        <div class="col-lg-3">
                          <input type="text" name="namepeticionarioa" required class="form-control" id="namepeticionario" placeholder="Nombres del Contacto">
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
                        <div class="col-lg-3">
                          <input type="text" name="lastnamea" required class="form-control" id="lastnamepeticionario" placeholder="Apellidos del Contacto">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Tipo Documento*</label>
                        <div class="col-lg-3">
                          <select name="typedoca" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="Cedula Ciudadania"> Cedula Ciudadania</option>
                            <option value="Cedula Extranjeria"> Cedula Extranjeria</option>
                            <option value="Tarjeta de Identidad"> Tarjeta de Identidad</option>
                            <option value="Pasaporte"> Pasaporte</option>
                            <option value="Registro Civil"> Registro Civil</option>
                            <option value="Tarjeta de Identidad"> Tarjeta de Identidad</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">No Documento Identidad</label>
                        <div class="col-md-3">
                          <input type="text" name="cca" required class="form-control" id="lastname" placeholder="Número Documento Contacto" value="<?php echo $_GET["qa"] ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Nacimiento</label>
                        <div class="col-md-3">
                          <input type="date" name="day_of_birtha" class="form-control" id="address1" placeholder="Fecha de Nacimiento">
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Edad</label>
                        <div class="col-md-3">
                          <input type="text" name="agea" class="form-control" id="age" placeholder="Edad">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Genero*</label>
                        <div class="col-md-3">
                          <label class="checkbox-inline">
                            <input type="radio" id="inlineCheckbox1" name="gendera" required value="h"> Hombre
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" id="inlineCheckbox2" name="gendera" required value="m"> Mujer
                          </label>
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Usted se Autoreconoce como*</label>
                        <div class="col-lg-3">
                          <select name="gender2a" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="Heterosexual">Heterosexual</option>
                            <option value="Homosexual">Homosexual</option>
                            <option value="Bisexual">Bisexual</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Poblacion Especial*</label>
                        <div class="col-md-3">
                          <select name="tipopoblacionespeciala" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="No Aplica">No Aplica</option>
                            <option value="Desplazado">Desplazado</option>
                            <option value="Habitante de Calle">Habitante de Calle </option>
                            <option value="Persona con Discapacidad">Persona con Discapacidad</option>
                            <option value="Población Carcelaria (presos)">Población Carcelaria (presos)</option>
                            <option value="Trabajador Sexual">Trabajador Sexual</option>
                            <option value="Violencia de Genero">Violencia de Genero</option>
                            <option value="Violencia de Conflico Armado">Violencia de Conflico Armado</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Clasificacion de poblacion*</label>
                        <div class="col-md-3">
                          <select name="tipopoblaciona" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="No Aplica">No Aplica</option>
                            <option value="Afrocolombiano">Afrocolombiano</option>
                            <option value="Indigena">Indigena</option>
                            <option value="Mulato">Mulato</option>
                            <option value="ROM-Gitano">ROM-Gitano</option>

                          </select>
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Discapacidad*</label>
                        <div class="col-md-3">
                          <select name="tipodiscapacidada" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="Ninguna">Ninguna</option>
                            <option value="Visual">Visual</option>
                            <option value="Auditiva">Auditiva</option>
                            <option value="Fisica">Fisica</option>
                            <option value="Intelectual">Intelectual</option>
                            <option value="Psicosocial">Psicosocial</option>
                            <option value="Multiple">Multiple</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">No Telefono Fijo*</label>
                        <div class="col-md-3">
                          <input type="text" name="phone1a" required class="form-control" id="phone1peticionario" placeholder="Telefono Fijo">
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">No Telefono Celular*</label>
                        <div class="col-md-3">
                          <input type="text" name="phone2a" required class="form-control" id="phone2peticionario" placeholder="Telefono celular">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Email Contacto*</label>
                        <div class="col-md-6">
                          <input type="text" name="emaila" required class="form-control" id="emailpeticionario" placeholder="correo electronico peticionario">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
                        <div class="col-md-3">
                          <input type="text" name="addressa" class="form-control" id="address1" placeholder="Direccion">
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Barrio*</label>
                        <div class="col-md-3">
                          <input type="text" name="address2a" class="form-control" id="address2" placeholder="Barrio">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Municipio*</label>
                        <div class="col-md-3">
                          <input type="text" name="address3a" class="form-control" id="address1" placeholder="Municipio">
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Corregimiento*</label>
                        <div class="col-md-3">
                          <input type="text" name="address4a" class="form-control" id="address2" placeholder="Corregimiento">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">EPS*</label>
                        <div class="col-md-3">
                          <select name="epsa" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="Coosalud">Coosalud</option>
                            <option value="">S.O.S</option>
                            <option value="Nueva EPS">Nueva EPS </option>
                            <option value="Comfenalco Valle">Comfenalco Valle </option>
                            <option value="EPS Sura">EPS Sura</option>
                            <option value="Coomeva EPS">Coomeva EPS</option>
                            <option value="Sanitas EPS">Sanitas EPS</option>
                            <option value="Salud Total">Salud Total</option>
                            <option value="Asmet Salud">Asmet Salud</option>
                            <option value="A.I.C Epsi">A.I.C Epsi</option>
                            <option value="Famisanar">Famisanar</option>
                            <option value="Compensar">Compensar</option>
                            <option value="Universidades">Universidades</option>
                            <option value="Ecopetrol">Ecopetrol</option>
                            <option value="Fuerzas Militares">Fuerzas Militares</option>
                            <option value="Magisterio">Magisterio</option>
                            <option value="Ferrocarriles y Puertos">Ferrocarriles y Puertos</option>
                            <option value="Otra">Otra</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Tipo de Regimen*</label>
                        <div class="col-md-3">
                          <select name="tiporegimena" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="Contributivo">Contributivo</option>
                            <option value="Subsidiado">Subsidiado</option>
                            <option value="Especial">Especial</option>
                          </select>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Si el afectado es Extranjero*</label>
                        <div class="col-md-3">
                          <select name="extranjeroa" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="NO Aplica">NO Aplica</option>
                            <option value="Venezolano">Venezolano</option>
                            <option value="Otro">Otro</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-4">
                        <label for="inputEmail1" class="col-lg-2 control-label">Especifique si el Extranjero esta*</label>
                        <div class="col-md-3">
                          <select name="extranjerostatea" class="form-control" required>
                            <option value="">-- SELECCIONE --</option>
                            <option value="NO Aplica">NO Aplica</option>
                            <option value="Con Seguridad Social">Con Seguridad Social</option>
                            <option value="Sin Seguridad Social">Sin Seguridad Social</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-offset-4 col-lg-10">
                        <button type="submit" class="btn btn-primary">Agregar Afectado</button>
                      </div>
                    </div>
                  </form>
                </div>

                <?php
                if ((isset($_GET["namepeticionarioa"])) && ($_GET["namepeticionarioa"] != "") && $usersP == "") {
                  PacientData::addForce($userP->id, $_GET["namepeticionarioa"], $_GET["lastnamea"], $_GET["typedoca"], $_GET["cca"], $_GET["phone1a"], $_GET["phone2a"], $_GET["emaila"], $_GET["gendera"], $_GET["day_of_birtha"], $_GET["agea"], $_GET["gender2a"], $_GET["tipodiscapacidada"], $_GET["addressa"], $_GET["address2a"], $_GET["address3a"], $_GET["address4a"], $_GET["epsa"], $_GET["tiporegimena"], $_GET["extranjeroa"], $_GET["extranjerostatea"], $_GET["tipopoblacionespeciala"]);
                  Core::redir("./index.php?view=newreservation&qa=" . $_GET["qa"] . "&qp=" . $_GET["qp"]);
                }
                ?>
                <!-- </div> -->
                <br><br>
                <hr>


              <?php
              }
              ?>
            <?php
            }
            ?>
            <!-- </div> -->
          </form>

          <!-- <form class="form-horizontal" role="form"> -->
          <!-- //////////////////////////////////////////////////////////////////////////////////// -->
          <br>
          <h4 class="title">Datos de la Solucitud</h4>
          <hr>

          <div>

            <form class="form-horizontal" role="form" method="post" action="./?action=addreservation">

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

              <div class="row">
                <div class="col-4">
                  <div class="col-4">
                    <input type="hidden" name="pacient_id" required class="col-lg-2 control-label" value="<?php echo $userA->id; ?>">
                  </div>
                  <div class="col-4">
                    <input type="hidden" name="pacientp_id" required class="col-lg-2 control-label" value="<?php echo $userP->id; ?>">
                  </div>
                </div>
              </div>

              <hr>
              <div class="form-group">
                <div class="col-lg-offset-5 col-lg-5">
                  <button type="submit" class="btn btn-default">Agregar Petición</button>
                </div>
              </div>

          </div>
          </form>
        </div>
      </div>
    </div>
  </div>