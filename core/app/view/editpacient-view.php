<?php
if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
} else {
	header('Location: index.php'); 
	die();
}
?>

<?php $user = PacientData::getById($_GET["id"]); ?>
<div class="row">
  <div class="col-md-12">

    <div class="card">
      <div class="card-header" data-background-color="blue">
        <h4 class="title">Editar Paciente</h4>
      </div>
      <div class="card-content table-responsive">
        <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatepacient" role="form">


          <h4 class="title">Afectado</h4>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombres del Afectado*</label>
            <div class="col-md-6">
              <input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control" id="name" placeholder="Nombre">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Apellidos del Afectado*</label>
            <div class="col-md-6">
              <input type="text" name="lastname" value="<?php echo $user->lastname; ?>" required class="form-control" id="lastname" placeholder="Apellido">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Tipo Documento*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="typedoc" required <?php if ($user->typedoc == "cc") {
                                                                                    echo "checked";
                                                                                  } ?> value="cc"> Cedula Ciudadania
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="typedoc" required <?php if ($user->typedoc == "ce") {
                                                                                    echo "checked";
                                                                                  } ?> value="ce"> Cedula Extranjeria
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox3" name="typedoc" required <?php if ($user->typedoc == "ti") {
                                                                                    echo "checked";
                                                                                  } ?> value="ti"> Tarjeta de Identidad
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox4" name="typedoc" required <?php if ($user->typedoc == "rc") {
                                                                                    echo "checked";
                                                                                  } ?> value="rc"> Registro Civil
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox5" name="typedoc" required <?php if ($user->typedoc == "ps") {
                                                                                    echo "checked";
                                                                                  } ?> value="ps"> Pasaporte
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">No Documento Identidad</label>
            <div class="col-md-6">
              <input type="text" name="cc" value="<?php echo $user->cc; ?>" class="form-control" id="lastname" placeholder="Número Documento">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Nacimiento</label>
            <div class="col-md-6">
              <input type="date" name="day_of_birth" class="form-control" value="<?php echo $user->day_of_birth; ?>" id="address1" placeholder="Fecha de Nacimiento">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Edad</label>
            <div class="col-md-6">
              <input type="text" name="age" value="<?php echo $user->age; ?>" class="form-control" id="age" placeholder="Edad">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Genero*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="gender" required <?php if ($user->gender == "h") {
                                                                                  echo "checked";
                                                                                } ?> value="h"> Hombre
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="gender" required <?php if ($user->gender == "m") {
                                                                                  echo "checked";
                                                                                } ?> value="m"> Mujer
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Usted se Autoreconoce como*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="gender2" required <?php if ($user->gender2 == "het") {
                                                                                    echo "checked";
                                                                                  } ?> value="het"> Heterosexual
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="gender2" required <?php if ($user->gender == "hom") {
                                                                                    echo "checked";
                                                                                  } ?>value="hom"> Homosexual
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="gender2" required <?php if ($user->gender2 == "bis") {
                                                                                    echo "checked";
                                                                                  } ?>value="bis"> Bisexual
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Discapacidad*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="disca" required <?php if ($user->disca == "N") {
                                                                                  echo "checked";
                                                                                } ?> value="N"> Ninguna
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="disca" required <?php if ($user->disca == "V") {
                                                                                  echo "checked";
                                                                                } ?>value="V"> Visual
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox3" name="disca" requiered <?php if ($user->disca == "A") {
                                                                                  echo "checked";
                                                                                } ?>value="A"> Auditiva
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox4" name="disca" requiered <?php if ($user->disca == "F") {
                                                                                  echo "checked";
                                                                                } ?>value="F"> Fisica
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox5" name="disca" requiered <?php if ($user->disca == "I") {
                                                                                  echo "checked";
                                                                                } ?>value="I"> Intelectual
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox6" name="disca" requiered <?php if ($user->disca == "P") {
                                                                                  echo "checked";
                                                                                } ?>value="P"> Psicosocial
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox3" name="disca" requiered <?php if ($user->disca == "M") {
                                                                                  echo "checked";
                                                                                } ?>value="M"> Multiple
              </label>
            </div>
          </div>


          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Telefono Fijo</label>
            <div class="col-md-6">
              <input type="text" name="phone" value="<?php echo $user->phone; ?>" class="form-control" id="inputEmail1" placeholder="Telefono">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Telefono Celular</label>
            <div class="col-md-6">
              <input type="text" name="phone" value="<?php echo $user->phonecel; ?>" class="form-control" id="inputEmail1" placeholder="Telefono">
            </div>
          </div>


          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
            <div class="col-md-6">
              <input type="text" name="address" value="<?php echo $user->address; ?>" class="form-control" required id="username" placeholder="Direccion">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Area Rural*</label>
            <div class="col-md-6">
              <input type="text" name="address2" value="<?php echo $user->address2; ?>" class="form-control" id="address2" placeholder="Area Rural">
            </div>
          </div>


          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
            <div class="col-md-6">
              <input type="text" name="email" value="<?php echo $user->email; ?>" class="form-control" id="email" placeholder="Email">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">EPS*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="eps" requiered <?php if ($user->eps == "SA") {
                                                                                echo "checked";
                                                                              } ?>value="SA"> Sanitas
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="eps" requiered <?php if ($user->eps == "NE") {
                                                                                echo "checked";
                                                                              } ?>value="NE"> Nueva EPS
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox3" name="eps" requiered <?php if ($user->eps == "CO") {
                                                                                echo "checked";
                                                                              } ?>value="CO"> Comfenalco
              </label>
            </div>
          </div>


          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Tipo de regimen contributivo*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="regimen" requiered <?php if ($user->regimen == "C") {
                                                                                    echo "checked";
                                                                                  } ?>value="c"> Cotizante
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="regimen" requiered <?php if ($user->regimen == "S") {
                                                                                    echo "checked";
                                                                                  } ?>value="s"> Subsidiado
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Afectado es Extranjero</label>
            <div class="col-md-6">
              <textarea name="extranjero" value="<?php echo $user->extranjero; ?>" class="form-control" id="sick" placeholder="Extranjero"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Extranjero Estado</label>
            <div class="col-md-6">
              <textarea name="stateextranjero" value="<?php echo $user->extranjerostate; ?>" class="form-control" id="sick" placeholder="Estado"></textarea>
            </div>
          </div>





          <h4 class="title">Peticionario </h4>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombres*</label>
            <div class="col-lg-6">
              <input type="text" name="namepeticionario" value="<?php echo $user->namepeticionario; ?>" class="form-control" id="namepeticionario" placeholder="Nombres del Contacto">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
            <div class="col-lg-6">
              <input type="text" name="lastnamepeticionario" value="<?php echo $user->lastname; ?>" class="form-control" id="lastnamepeticionario" placeholder="Apellidos del Contacto">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Tipo Documento*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="typedocpeticionario" required <?php if ($user->typedocpeticionario == "cc") {
                                                                                                echo "checked";
                                                                                              } ?>value="cc"> Cedula Ciudadania
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="typedocpeticionario" required <?php if ($user->typedocpeticionario == "ce") {
                                                                                                echo "checked";
                                                                                              } ?>value="ce"> Cedula Extranjeria
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox3" name="typedocpeticionario" required <?php if ($user->typedocpeticionario == "ti") {
                                                                                                echo "checked";
                                                                                              } ?>value="ti"> Tarjeta de Identidad
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox4" name="typedocpeticionario" required <?php if ($user->typedocpeticionario == "ps") {
                                                                                                echo "checked";
                                                                                              } ?>value="ps"> Pasaporte
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">No Documento Identidad</label>
            <div class="col-md-6">
              <input type="text" name="ccpeticionario" value="<?php echo $user->ccpeticionario; ?>" class="form-control" id="lastname" placeholder="Número Documento Contacto">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">No Telefono Fijo*</label>
            <div class="col-md-6">
              <input type="text" name="phone1peticionario" value="<?php echo $user->phone1peticionario; ?>" class="form-control" id="phone1peticionario" placeholder="Telefono Fijo">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">No Telefono Celular*</label>
            <div class="col-md-6">
              <input type="text" name="phone2peticionario" value="<?php echo $user->phone2peticionario; ?>" class="form-control" id="phone2peticionario" placeholder="Telefono celular">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Email Contacto*</label>
            <div class="col-md-6">
              <input type="text" name="emailpeticioario" value="<?php echo $user->emailpeticionario; ?>" class="form-control" id="emailpeticionario" placeholder="correo electronico peticionario">
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
              <button type="submit" class="btn btn-primary">Actualizar Paciente</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>