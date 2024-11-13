<head>
    <link href="{{ url('css/admin.css')}}" rel="stylesheet">
</head>
<div class="form-group">
    @csrf
    <!-- Nombres y Apellidos en la misma fila -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="vc_nombre">Nombres</label>
                <input id="vc_nombre" name="vc_nombre" type="text" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="vc_apellido">Apellidos</label>
                <input id="vc_apellido" name="vc_apellido" type="text" class="form-control" required>
            </div>
        </div>
    </div>

    <!-- Cargo y Email en la misma fila -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="vc_cargo">Cargo</label>
                <input id="vc_cargo" name="vc_cargo" type="text" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="vc_email">Email</label>
                <input id="vc_email" name="vc_email" type="email" class="form-control" required>
            </div>
        </div>
    </div>

    <!-- Telefonos en la misma fila -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="vc_telefono">Teléfono</label>
                <input id="vc_telefono" name="vc_telefono" type="tel" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="vc_telefono_corporativo">Teléfono Corporativo</label>
                <input id="vc_telefono_corporativo" name="vc_telefono_corporativo" type="tel" class="form-control" required>
            </div>
        </div>
    </div>

    <!-- Contrato, Exámenes y Cédula en una fila de tres columnas -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="vc_url_contrato">Contrato</label>
                <input id="vc_url_contrato" name="vc_url_contrato" type="url" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="vc_url_examenes">Exámenes</label>
                <input id="vc_url_examenes" name="vc_url_examenes" type="url" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="vc_url_cedula">Cédula</label>
                <input id="vc_url_cedula" name="vc_url_cedula" type="url" class="form-control" required>
            </div>
        </div>
    </div>

    <!-- Botón de envío -->
    <button type="submit" class="btn btn-primary mt-3">Guardar y enviar</button>
</div>