<head>
    <link href="{{ url('css/vistadash.css')}}" rel="stylesheet">
</head>
@csrf
    <div class="form-group">
        <!-- Nombres y Apellidos en la misma fila -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vc_nombre">Nombres</label>
                    <input value="{{ $empleado->vc_nombre ?? '' }}" id="vc_nombre" name="vc_nombre" type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vc_apellido">Apellidos</label>
                    <input id="vc_apellido" value="{{ $empleado->vc_apellido ?? '' }}"  name="vc_apellido" type="text" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Cargo y Email en la misma fila -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vc_cargo">Cargo</label>
                    <input id="vc_cargo" value="{{ $empleado->vc_cargo ?? '' }}"  name="vc_cargo" type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vc_email">Email Corporativo</label>
                    <input id="vc_email" value="{{ $empleado->vc_email ?? '' }}"  name="vc_email" type="email" class="form-control" required>
                    <small id="emailError" class="text-danger" style="display:none;"></small>
                </div>
            </div>
        </div>

        <!-- Email Personal en una fila -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="vc_email_personal">Email Personal</label>
                    <input id="vc_email_personal" value="{{ $empleado->vc_email_personal ?? '' }}"  name="vc_email_personal" type="email" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Telefonos en la misma fila -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vc_telefono">Teléfono</label>
                    <input id="vc_telefono" value="{{ $empleado->vc_telefono ?? '' }}"  name="vc_telefono" type="number" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vc_telefono_corporativo">Teléfono Corporativo</label>
                    <input id="vc_telefono_corporativo" value="{{ $empleado->vc_telefono_corporativo ?? '' }}"  name="vc_telefono_corporativo" type="number" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Usuario Directorio Activo en una fila -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="vc_usuario_DA">Usuario Directorio Activo</label>
                    <input id="vc_usuario_DA" value="{{ $empleado->vc_usuario_DA ?? '' }}"  name="vc_usuario_DA" type="text" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Contrato, Exámenes y Cédula en una fila de tres columnas -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="vc_url_contrato">Contrato</label>
                    <input id="vc_url_contrato" name="vc_url_contrato" type="file" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="vc_url_examenes">Exámenes</label>
                    <input id="vc_url_examenes" name="vc_url_examenes" type="file" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="vc_url_cedula">Cédula</label>
                    <input id="vc_url_cedula" name="vc_url_cedula" type="file" class="form-control">
                </div>
            </div>
        </div>

        <!-- Botón de envío -->
        <button type="submit" class="btn mt-3" id="Btnactividad">Guardar y enviar</button>
    </div>
