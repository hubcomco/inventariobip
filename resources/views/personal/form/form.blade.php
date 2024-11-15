    @csrf
    <div class="form-group">
        <!-- Nombres y Apellidos en la misma fila -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vc_nombre">Nombres</label>
                    <input value="{{ (isset($empleado)) ? $empleado->vc_nombre : null}}" id="vc_nombre" name="vc_nombre" type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vc_apellido">Apellidos</label>
                    <input id="vc_apellido" value="{{ (isset($empleado)) ? $empleado->vc_apellido : null}}"  name="vc_apellido" type="text" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Cargo y Email en la misma fila -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vc_cargo">Cargo</label>
                    <input id="vc_cargo" value="{{ (isset($empleado)) ? $empleado->vc_cargo : null}}"  name="vc_cargo" type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vc_email">Email</label>
                    <input id="vc_email" value="{{ (isset($empleado)) ? $empleado->vc_email : null}}"  name="vc_email" type="email" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Email Personal en una fila -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="vc_email_personal">Email Personal</label>
                    <input id="vc_email_personal" value="{{ (isset($empleado)) ? $empleado->vc_email_personal : null}}"  name="vc_email_personal" type="email" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Telefonos en la misma fila -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vc_telefono">Teléfono</label>
                    <input id="vc_telefono" value="{{ (isset($empleado)) ? $empleado->vc_telefono : null}}"  name="vc_telefono" type="number" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vc_telefono_corporativo">Teléfono Corporativo</label>
                    <input id="vc_telefono_corporativo" value="{{ (isset($empleado)) ? $empleado->vc_telefono_corporativo : null}}"  name="vc_telefono_corporativo" type="tel" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Usuario Directorio Activo en una fila -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="vc_usuario_DA">Usuario Directorio Activo</label>
                    <input id="vc_usuario_DA" value="{{ (isset($empleado)) ? $empleado->vc_usuario_DA : null}}"  name="vc_usuario_DA" type="text" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Contrato, Exámenes y Cédula en una fila de tres columnas -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="vc_url_contrato">Contrato</label>
                    <input id="vc_url_contrato" name="vc_url_contrato" type="file" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="vc_url_examenes">Exámenes</label>
                    <input id="vc_url_examenes" name="vc_url_examenes" type="file" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="vc_url_cedula">Cédula</label>
                    <input id="vc_url_cedula" name="vc_url_cedula" type="file" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Botón de envío -->
        <button type="submit" class="btn btn-primary mt-3">Guardar y enviar</button>
    </div>