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

            <div class="col-lg-3">
              <a href="index.php?view=newreservation" class="btn btn-default btn-block">Limpiar Busqueda</a>
              <!-- <button class="btn btn-primary btn-block">Limpiar Busqueda</button> -->
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
            }
            ?>
            <!-- </form> -->