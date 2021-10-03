<?php require_once "../app/views/template.php"; ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <h1 class="h3 mb-2 text-gray-800">Listado de Centro</h1>
            <p class="mb-4">
                Registre la cantidad de estantes que esten asociados a la Centro.
            </p>
        </div>
    </div>
</div>
<div class="tab-content">
    <div class="tab-pane tabs-animation fade active show" id="tab-content-0" role="tabpanel">
        <div class="row">
            <div class="col-md-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">REGISTRAR CENTRO</h5>
                        <form >
                            <div class="row">
                                <div class="position-relative form-group col-md-12">
                                    <label class="" style="font-weight: bold;">
                                        SELECCIONA LA REGIONAL:*
                                    </label>
                                    <select class="form-control" id="centroRegional">
                                        <option>--SELECCIONAR--</option>
                                        <?php foreach ($datos['ListarRegional'] as $ListarRegional) : ?>
                                            <option value="<?php echo $ListarRegional->tbl_regional_ID ?>"><?php echo $ListarRegional->tbl_regional_NOMBRE ?></option>
                                        <?php endforeach; ?>
                                    </select> <br>
                                    <label class="" style="font-weight: bold;">
                                        NOMBRE DEL CENTRO:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" placeholder="NOMBRE DEL CENTRO" type="text" id="centroNombre"><br>
                                    </input>
                                    <label class="" style="font-weight: bold;">
                                        SUBDIRECTOR:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" placeholder="NOMBRE DEL SUBDIRECTOR" type="text" id="centroSubdirector"><br>
                                    </input>
                                    <label class="" style="font-weight: bold;">
                                        TELEFONO:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" placeholder="NUMERO DE TELEFONO" type="text" id="centroTelefono">
                                    <p class="text-muted"><i> Los campos con * son obligatorios</i></p>
                                    <button class="mb-2 mr-2 btn btn-primary col-md-12" type="button" value="REGISTRAR" id="RegistrarCentro">
                                        REGISTRAR
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-11"><br>
                                <h6 class="m-0 font-weight-bold">CENTROS DE FORMACION</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>REGIONAL</th>
                                    <th>CENTRO</th>
                                    <th>TELEFONO</th>
                                    <th>SUBDIRECTOR</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $contador = 1;
                                foreach ($datos['ListarCentro'] as $ListarCentro) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $contador++; ?></th>
                                        <td id="centroRegional"><?php echo $ListarCentro->tbl_regional_NOMBRE; ?></td>
                                        <td id="centroNombre"><?php echo $ListarCentro->tbl_centro_NOMBRE; ?></td>
                                        <td id="centroTelefono"><?php echo $ListarCentro->tbl_centro_TELEFONO; ?></td>
                                        <td id="centroSubdirector"><?php echo $ListarCentro->tbl_centro_SUBDIRECTOR; ?></td>
                                        <?php if ($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR') : ?>

                                            <td>
                                                <cite title="Editar">
                                                    <a href="<?php echo URL_SISINV; ?>Centro/ObtenerCentroId/<?php echo $ListarCentro->tbl_centro_ID ?>" class="btn btn-info btn-icon-split" id="EditarCentro">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                    </a>
                                                </cite>
                                                <cite title="Borrar">
                                                    <a href="<?php echo URL_SISINV; ?>Centro/EliminarCentro/<?php echo $ListarCentro->tbl_centro_ID; ?>" class="btn btn-danger btn-icon-split" id="BorrarCentro">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                    </a>
                                                </cite>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URL_SISINV ?>MATERIAL_THEME/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL_SISINV ?>js/alerts.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        document.getElementById("RegistrarCentro").addEventListener('click', function() {
            RegistrarCentro();
        });

        function RegistrarCentro() {
            var centroNombre = $('#centroNombre').val();
            var centroTelefono = $('#centroTelefono').val();
            var centroSubdirector = $('#centroSubdirector').val();
            var centroRegional = $('#centroRegional').val();
            var regionalExists = false;

            if (centroNombre == "" || centroTelefono == "" || centroSubdirector == "" || centroRegional == "--SELECCIONAR--") {
                FillData();
            } else {
                $.ajax({
                    url: '<?php echo URL_SISINV ?>Centro/CompararCentro',
                    type: 'POST',
                    data: { 
                        centroNombre: centroNombre,
                    }
                }).done(function(response) {

                    var data = JSON.parse(response)
                    for (i = 0; i < data.length; i++) {
                        //regionales.push(data[i].tbl_regional_tbl_regional_ID)
                        if (data[i].tbl_centro_NOMBRE == centroNombre && data[i].tbl_regional_tbl_regional_ID == centroRegional) {
                            regionalExists = true; // si encuentra un dato existente
                            Existe();
                            break;
                        }
                    }
                    // si nunca encotro algo existente
                    if (!regionalExists) {
                        $.ajax({
                            url: '<?php echo URL_SISINV ?>Centro/RegistrarCentro',
                            type: 'POST',
                            data: {
                                centroNombre: centroNombre,
                                centroTelefono: centroTelefono,
                                centroSubdirector: centroSubdirector,
                                centroRegional: centroRegional
                            }
                        }).done(function() {
                            Success();
                            // function de tiempo
                            setTimeout(function() {
                                window.location.href = '<?php echo URL_SISINV ?>Centro/ListarCentro';
                            }, 2000);
                        }).fail(function() {
                            error()
                            setTimeout(function() {
                                window.location.href = '<?php echo URL_SISINV ?>Centro/ListarCentro';
                            }, 2000);
                        });
                    }
                });
            }
        }
    });
</script>