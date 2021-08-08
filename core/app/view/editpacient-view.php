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

          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Nombres del Afectado*</label>
              <div class="col-md-3">
                <input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control" id="name" placeholder="Nombre">
              </div>
            </div>
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Apellidos del Afectado*</label>
              <div class="col-md-3">
                <input type="text" name="lastname" value="<?php echo $user->lastname; ?>" required class="form-control" id="lastname" placeholder="Apellido">
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Tipo Documento*</label>
              <div class="col-lg-3">
                <select name="typedoc" class="form-control" required>
                  <option value=""> <?php echo $user->typedoc; ?></option>
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
                <input type="text" name="numdoc" required class="form-control" id="lastname" value="<?php echo $user->numdoc; ?>">
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Nacimiento</label>
              <div class="col-md-3">
                <input type="date" name="day_of_birth" class="form-control" value="<?php echo $user->day_of_birth; ?>" id="address1" placeholder="Fecha de Nacimiento">
              </div>
            </div>
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Edad</label>
              <div class="col-md-3">
                <input type="text" name="age" value="<?php echo $user->age; ?>" class="form-control" id="age" placeholder="Edad">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Genero*</label>
              <div class="col-md-3">
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

            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Usted se Autoreconoce como*</label>
              <div class="col-md-3">
                <label class="checkbox-inline">
                  <input type="radio" id="inlineCheckbox1" name="gender2" required <?php if ($user->gender2 == "Hetero") {
                                                                                      echo "checked";
                                                                                    } ?> value="Hetero"> Heterosexual
                </label>
                <label class="checkbox-inline">
                  <input type="radio" id="inlineCheckbox2" name="gender2" required <?php if ($user->gender == "Homo") {
                                                                                      echo "checked";
                                                                                    } ?>value="Homo"> Homosexual
                </label>
                <label class="checkbox-inline">
                  <input type="radio" id="inlineCheckbox2" name="gender2" required <?php if ($user->gender2 == "Bi") {
                                                                                      echo "checked";
                                                                                    } ?>value="Bi"> Bisexual
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Poblacion Especial*</label>
              <div class="col-md-3">
                <select name="typepobla2" class="form-control" required>
                  <option value="<?php echo $user->typepobla2; ?>"><?php echo $user->typepobla2; ?></option>
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
                <select name="typepobla" class="form-control" required>
                  <option value="<?php echo $user->typepobla; ?>"><?php echo $user->typepobla; ?></option>
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
                <select name="typedisca" class="form-control" required>
                  <option value="<?php echo $user->typedisca; ?>"><?php echo $user->typedisca; ?></option>
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
              <label for="inputEmail1" class="col-lg-2 control-label">Telefono Fijo</label>
              <div class="col-md-3">
                <input type="text" name="phone" value="<?php echo $user->phone; ?>" class="form-control" id="inputEmail1" placeholder="Telefono">
              </div>
            </div>
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Telefono Celular</label>
              <div class="col-md-3">
                <input type="text" name="phonecel" value="<?php echo $user->phonecel; ?>" class="form-control" id="inputEmail1" placeholder="Telefono">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
              <div class="col-md-6">
                <input type="text" name="email" value="<?php echo $user->email; ?>" class="form-control" id="email" placeholder="Email">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
              <div class="col-md-3">
                <input type="text" name="address" class="form-control" id="address1" value="<?php echo $user->address; ?>">
              </div>
            </div>
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Barrio*</label>
              <div class="col-md-3">
                <input type="text" name="address2" class="form-control" id="address2" value="<?php echo $user->address2; ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Municipio*</label>
              <div class="col-md-3">
                <input type="text" name="address3" class="form-control" id="address1" value="<?php echo $user->address3; ?>">
              </div>
            </div>
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Corregimiento*</label>
              <div class="col-md-3">
                <input type="text" name="address4" class="form-control" id="address2" value="<?php echo $user->address4; ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">EPS*</label>
              <div class="col-md-3">
                <select name="eps" class="form-control" required>
                  <option value=""><?php echo $user->eps; ?></option>
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
                <select name="typereg" class="form-control" required>
                  <option value=""><?php echo $user->typereg; ?></option>
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
                <select name="extranjero" class="form-control" required>
                  <option value=""><?php echo $user->extranjero; ?></option>
                  <option value="NO Aplica">NO Aplica</option>
                  <option value="Venezolano">Venezolano</option>
                  <option value="Otro">Otro</option>
                </select>
              </div>
            </div>
            <div class="col-4">
              <label for="inputEmail1" class="col-lg-2 control-label">Especifique si el Extranjero esta*</label>
              <div class="col-md-3">
                <select name="extranjerostate" class="form-control" required>
                  <option value=""><?php echo $user->extranjerostate; ?></option>
                  <option value="NO Aplica">NO Aplica</option>
                  <option value="Con Seguridad Social">Con Seguridad Social</option>
                  <option value="Sin Seguridad Social">Sin Seguridad Social</option>
                </select>
              </div>
            </div>
          </div>



          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
              <button type="submit" class="btn btn-primary">Actualizar Afectado</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>