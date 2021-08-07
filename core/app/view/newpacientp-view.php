<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Nuevo Contacto para Caso de Afectado</h4>
            </div>
            <div class="card-content table-responsive">

                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addpacientp" role="form">

                    <div class="row">
                        <div class="col-4">
                            <label for="inputEmail1" class="col-lg-2 control-label">Nombres*</label>
                            <div class="col-lg-3">
                                <input type="text" name="namepeticionario" required class="form-control" id="namepeticionario" placeholder="Nombres del Contacto">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
                            <div class="col-lg-3">
                                <input type="text" name="lastname" required class="form-control" id="lastnamepeticionario" placeholder="Apellidos del Contacto">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label for="inputEmail1" class="col-lg-2 control-label">Tipo Documento*</label>
                            <div class="col-lg-3">
                                <select name="typedoc" class="form-control" required>
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
                                <input type="text" name="numdoc" required class="form-control" id="lastname" placeholder="Número Documento Contacto">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-4">
                            <label for="inputEmail1" class="col-lg-2 control-label">No Telefono Fijo*</label>
                            <div class="col-md-3">
                                <input type="text" name="phone1" required class="form-control" id="phone1peticionario" placeholder="Telefono Fijo">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="inputEmail1" class="col-lg-2 control-label">No Telefono Celular*</label>
                            <div class="col-md-3">
                                <input type="text" name="phone2" required class="form-control" id="phone2peticionario" placeholder="Telefono celular">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label for="inputEmail1" class="col-lg-2 control-label">Email Contacto*</label>
                            <div class="col-md-6">
                                <input type="text" name="email" required class="form-control" id="emailpeticionario" placeholder="correo electronico peticionario">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-4 col-lg-10">
                            <button type="submit" class="btn btn-primary">Agregar Peticionario</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>