<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header" data-background-color="blue">
        <h4 class="title">Nuevo Contacto para Caso de Afectado</h4>
      </div>
      <div class="card-content table-responsive">

        <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addpacient" role="form">

          <h4 class="title">Peticionario </h4>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombres*</label>
            <div class="col-lg-6">
              <input type="text" name="namepeticionario" required class="form-control" id="namepeticionario" placeholder="Nombres del Contacto">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
            <div class="col-lg-6">
              <input type="text" name="lastnamepeticionario" required class="form-control" id="lastnamepeticionario" placeholder="Apellidos del Contacto">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Tipo Documento*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="typedocpeticionario" required value="cc"> Cedula Ciudadania
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="typedocpeticionario" required value="ce"> Cedula Extranjeria
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox3" name="typedocpeticionario" required value="ti"> Tarjeta de Identidad
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox4" name="typedocpeticionario" required value="ps"> Pasaporte
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">No Documento Identidad</label>
            <div class="col-md-6">
              <input type="text" name="ccpeticionario" required class="form-control" id="lastname" placeholder="Número Documento Contacto">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">No Telefono Fijo*</label>
            <div class="col-md-6">
              <input type="text" name="phone1peticionario" required class="form-control" id="phone1peticionario" placeholder="Telefono Fijo">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">No Telefono Celular*</label>
            <div class="col-md-6">
              <input type="text" name="phone2peticionario" required class="form-control" id="phone2peticionario" placeholder="Telefono celular">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Email Contacto*</label>
            <div class="col-md-6">
              <input type="text" name="emailpeticionario" required class="form-control" id="emailpeticionario" placeholder="correo electronico peticionario">
            </div>
          </div>



          <h4 class="title">Afectado</h4>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombres del Afectado*</label>
            <div class="col-md-6">
              <input type="text" name="name" required class="form-control" id="name" placeholder="Nombres">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Apellidos del Afectado*</label>
            <div class="col-md-6">
              <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Tipo Documento*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="typedoc" required value="cc"> Cedula Ciudadania
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="typedoc" required value="ce"> Cedula Extranjeria
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox3" name="typedoc" required value="ti"> Tarjeta de Identidad
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox4" name="typedoc" required value="rc"> Registro Civil
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox5" name="typedoc" required value="ps"> Pasaporte
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">No Documento Identidad</label>
            <div class="col-md-6">
              <input type="text" name="cc" required class="form-control" id="lastname" placeholder="Número Documento">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Nacimiento</label>
            <div class="col-md-6">
              <input type="date" name="day_of_birth" class="form-control" id="address1" placeholder="Fecha de Nacimiento">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Edad</label>
            <div class="col-md-6">
              <input type="text" name="age" class="form-control" id="age" placeholder="Edad">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Genero*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="gender" required value="h"> Hombre
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="gender" required value="m"> Mujer
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Usted se Autoreconoce como*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="gender2"  value="het"> Heterosexual
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="gender2"  value="hom"> Homosexual
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="gender2"  value="bis"> Bisexual
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Clasificacion de poblacion*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="tipopoblacion"  value="het"> Negro
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="tipopoblacion"  value="hom"> Indigena 
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="tipopoblacion"  value="bis"> Ra
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Discapacidad*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="disca"  value="N"> Ninguna
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="disca"  value="v"> Visual
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox3" name="disca"  value="A"> Auditiva
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox4" name="disca"  value="F"> Fisica
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox5" name="disca"  value="I"> Intelectual
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox6" name="disca"  value="P"> Psicosocial
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox3" name="disca"  value="M"> Multiple
              </label>
            </div>
          </div>


          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Telefono Fijo*</label>
            <div class="col-md-6">
              <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono Fijo">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Telefono Celular*</label>
            <div class="col-md-6">
              <input type="text" name="phonecel" class="form-control" id="phonecel" placeholder="Telefono Celular">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
            <div class="col-md-6">
              <input type="text" name="address" class="form-control" id="address1" placeholder="Direccion">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Area Rural*</label>
            <div class="col-md-6">
              <input type="text" name="address2" class="form-control" id="address2" placeholder="Area Rural">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
            <div class="col-md-6">
              <input type="text" name="email" class="form-control" id="email1" placeholder="Correo Electronico">
            </div>
          </div>


          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">EPS*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="eps"  value="SA"> Sanitas
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="eps"  value="NE"> Nueva EPS
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox3" name="eps"  value="CO"> Comfenalco
              </label>
            </div>
          </div>


          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Tipo de regimen contributivo*</label>
            <div class="col-md-6">
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox1" name="regimen"  value="c"> Cotizante
              </label>
              <label class="checkbox-inline">
                <input type="radio" id="inlineCheckbox2" name="regimen"  value="s"> Subsidiado
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Afectado es Extranjero</label>
            <div class="col-md-6">
              <textarea name="extranjero" class="form-control" id="sick" placeholder="Extranjero"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Extranjero Estado</label>
            <div class="col-md-6">
              <textarea name="extranjerostate" class="form-control" id="sick" placeholder="Estado"></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button type="submit" class="btn btn-primary">Agregar Paciente</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>