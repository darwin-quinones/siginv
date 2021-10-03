<?php require_once "../app/views/template.php"; ?>
-<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <h1 class="h3 mb-2 text-gray-800">Listado de Ambiente</h1>
            <p class="mb-4">
                Registre la cantidad de Ambiente que estas asociados .
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
                        <h5 class="card-title">REGISTRAR AMBIENTE</h5>
                        <form>
                            <div class="row">
                                <div class="position-relative form-group col-md-12">
                                    <label class="" style="font-weight: bold;">
                                        SELECCIONA LA REGIONAL:*
                                    </label>
                                    <select class="form-control" name="" id="ambienteRegional">
                                        <option>--SELECCIONAR--</option>
                                        <?php foreach ($datos['ListarRegional'] as $ListarRegional) : ?>
                                            <?php if ($ListarRegional) : ?>
                                                <option value="<?php echo $ListarRegional->tbl_regional_ID; ?>"><?php echo $ListarRegional->tbl_regional_NOMBRE; ?></option>
                                            <?php else : ?>
                                                <option value="0">-- NO SE ENCONTRARON DATOS --</option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select><br>
                                    <label class="" style="font-weight: bold;">
                                        SELECCIONA LA CENTRO:*
                                    </label>
                                    <select class="form-control" id="ambienteCentro">

                                    </select><br>
                                    <label class="" style="font-weight: bold;">
                                        NOMBRE DE LA SEDE:*
                                    </label>
                                    <select class="form-control" id="ambienteSede">

                                    </select><br>
                                    <label class="" style="font-weight: bold;">
                                        INSTRUCTOR:*
                                    </label>
                                    <select id="ambienteInstructor" class="form-control" data-live-search="true" aria-label="Default select example">

                                    </select><br>
                                    <label class="" style="font-weight: bold;">
                                        NOMBRE DE AMBIENTE:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" id="ambienteNombre" placeholder="SERVICIOS GENERALES" type="text"> <br>
                                    <p class="text-muted"><i> Los campos con * son obligatorios</i></p>
                                    <button class="mb-2 mr-2 btn btn-primary col-md-12" type="button" value="REGISTRAR" id="RegistarAmbiente">
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
                                <h6 class="m-0 font-weight-bold">AMBIENTE</h6>
                            </div>
                            <!-- <div class="col-md-1">
                                    <cite title="Agregar">
                                        <a  class="btn btn-success btn-icon-split" href="<?php echo URL_SISINV; ?>Bodega/ListarBodega">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                            </span>
                                        </a>
                                    </cite>
                                </div> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>REGIONAL</th>
                                    <th>CENTRO</th>
                                    <th>SEDE</th>
                                    <th>NOMBRE DE AMBIENTE:</th>
                                    <th>INSTRUCTOR:</th>
                                    <th>ACCIÓN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $contador = 1;
                                foreach ($datos['ListarAmbientes'] as $ListarAmbiente) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $contador++; ?></th>
                                        <td id="estanteNumero"><?php echo $ListarAmbiente->tbl_regional_NOMBRE; ?></td>
                                        <td id="estanteNumero"><?php echo $ListarAmbiente->tbl_centro_NOMBRE; ?></td>
                                        <td id="estanteNumero"><?php echo $ListarAmbiente->tbl_sede_NOMBRE; ?></td>
                                        <td id="estanteNumero"><?php echo $ListarAmbiente->tbl_amb_NOMBRE; ?></td>
                                        <td id="estanteNumero"><?php echo $ListarAmbiente->tbl_instructor_NOMBRES; ?></td>
                                        <?php if ($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR') : ?>
                                            <td>
                                                <cite title="Editar">
                                                    <a href="<?php echo URL_SISINV; ?>Ambiente/ObtenerAmbiente/<?php echo $ListarAmbiente->tbl_amb_ID ?>" class="btn btn-info btn-icon-split" id="EditarCentro">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                    </a>
                                                </cite>
                                                <cite title="Borrar">
                                                    <a href="<?php echo URL_SISINV; ?>Ambiente/EliminarAmbiente/<?php echo $ListarAmbiente->tbl_amb_ID; ?>" class="btn btn-danger btn-icon-split" id="BorrarCentro">
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
        document.getElementById("RegistarAmbiente").addEventListener('click', function() {
            RegistrarAmbiente();
        });

        /*Cambiar regional */
        $('#ambienteRegional').change(function() {
            var regionalID = $('#ambienteRegional').val();
            LoadCentros(regionalID)
        });

        function LoadCentros(regionalID) {
            $.ajax({
                url: '<?php echo URL_SISINV ?>Ambiente/LoadCentros',
                type: 'POST',
                data: {
                    regionalID: regionalID
                }
            }).done(function(response) {
                var data = JSON.parse(response);
                var cadena = "";
                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        cadena += "<option id='ambienteCentro' value='" + data[i].tbl_centro_ID + "'>" + data[i].tbl_centro_NOMBRE + "</option>"
                    }
                    $('#ambienteCentro').html(cadena);
                    var centroID = $('#ambienteCentro').val();
                    LoadSedes(centroID);
                } else {
                    cadena = "<option value='0'>NO SE ENCONTRARON DATOS </option>";
                    $('#ambienteCentro').html(cadena);
                    var centroID = $('#ambienteCentro').val();
                    LoadSedes(centroID);
                }
            })
        }
        $('#ambienteCentro').change(function() {
            var centroID = $('#ambienteCentro').val();
            LoadSedes(centroID);
        })

        function LoadSedes(centroID) {
            $.ajax({
                url: '<?php echo URL_SISINV ?>Ambiente/LoadSedes',
                type: 'POST',
                data: {
                    centroID: centroID
                },
            }).done(function(resp) {
                var data = JSON.parse(resp)
                var cadena = "";
                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        cadena += "<option id='ambienteSede' value='" + data[i].tbl_sede_ID + "'>" + data[i].tbl_sede_NOMBRE + "</option>";
                    }
                    var centroID = $('#ambienteCentro').val()
                    if (centroID == 0) {
                        $('#ambienteSede').html('');
                    }
                    $('#ambienteSede').html(cadena);
                    var sedeID = $('#ambienteSede').val();
                    LoadInstructores(sedeID);

                } else {
                    cadena = "<option id='ambienteSede' value='0'>NO SE ENCONTRARON DATOS</option>";
                    $('#ambienteSede').html(cadena); // <- significa poner los datos dentro del input
                    var sedeID = $('#ambienteSede').val();
                    LoadInstructores(sedeID);
                }
            })
        }
        // load instructor
        $('#ambienteSede').change(function() {
            var sedeID = $('#ambienteSede').val();
            LoadInstructores(sedeID);
        })

        function LoadInstructores(sedeID) {
            $.ajax({
                url: '<?php echo URL_SISINV ?>Ambiente/LoadInstructores',
                type: 'POST',
                data: {
                    sedeID: sedeID
                }
            }).done(function(response) {
                var data = JSON.parse(response);
                var cadena = "";
                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        cadena += ("<option data-tokens='" + data[i].tbl_instructor_NOMBRES + "'  value='" + data[i].tbl_instructor_ID + "'>" + data[i].tbl_instructor_NOMBRES + "</option>");
                    }
                    $('#ambienteInstructor').html(cadena);
                } else {
                    cadena = "<option id='ambienteSede' value='0'>NO SE ENCONTRARON DATOS</option>";
                    $('#ambienteInstructor').html(cadena);
                }
            })
        }


        function RegistrarAmbiente() {
            var ambienteRegional = $('#ambienteRegional').val();
            var ambienteCentro = $('#ambienteCentro').val();
            var ambienteSede = $('#ambienteSede').val();
            var ambienteNombre = $('#ambienteNombre').val();
            var ambienteInstructor = $('#ambienteInstructor').val();
            var ambienteExists = false;
            alert(ambienteInstructor);
            //alert(ambienteRegional + " "+ ambienteCentro+ " " + ambienteSede + " "+ ambienteNombre + " " + ambienteResponsable)
            if (ambienteRegional == "" || ambienteRegional == "--SELECCIONAR--" || ambienteCentro == "" || ambienteCentro == 0 || ambienteSede == "" || ambienteNombre == "" || ambienteInstructor == "") {
                FillData()
            } else {
                /*Pasamos a comparar el ambiente */
                $.ajax({
                    url: '<?php echo URL_SISINV ?>Ambiente/CompararAmbiente',
                    type: 'POST',
                    data: {
                        ambienteNombre: ambienteNombre
                    }
                }).done(function(response) {
                    var data = JSON.parse(response);
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].tbl_amb_NOMBRE == ambienteNombre && data[i].tbl_sede_tbl_sede_ID == ambienteSede) {
                                Existe();
                                ambienteExists = true;
                                break
                            }
                        }
                    }
                    /*si nunca encontro el ambiente  pasa a registrar*/
                    if (!ambienteExists) {
                        $.ajax({
                            url: '<?php echo URL_SISINV ?>Ambiente/RegistrarAmbiente',
                            type: 'POST',
                            data: {
                                ambienteRegional: ambienteRegional,
                                ambienteCentro: ambienteCentro,
                                ambienteSede: ambienteSede,
                                ambienteNombre: ambienteNombre,
                                ambienteInstructor: ambienteInstructor
                            }
                        }).done(function() {
                            Success();
                            // function de tiempo
                            setTimeout(function() {
                                window.location.href = '<?php echo URL_SISINV ?>Ambiente/ListarAmbiente';
                            }, 2000);
                        }).fail(function() {
                            error()
                            setTimeout(function() {
                                window.location.href = '<?php echo URL_SISINV ?>Centro/ListarAmbiente';
                            }, 2000);
                        })
                    }
                });
            }
        }
    });
</script>