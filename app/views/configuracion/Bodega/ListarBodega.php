<?php require_once "../app/views/template.php"; ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <h1 class="h3 mb-2 text-gray-800">Listado de Bodegas</h1>
            <p class="mb-4">
                Registre la cantidad de bodegas que esten asociados a los estantes.
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
                        <h5 class="card-title">REGISTRAR BODEGA</h5>
                        <label class="" style="font-weight: bold;">
                            SELECCIONA LA REGIONAL:*
                        </label>
                        <select class="form-control" id="bodegaRegional" name="bodegaRegional">
                            <option>--SELECCIONAR--</option>
                            <?php foreach ($datos['ListarReginal'] as $ListarReginal) : ?>
                                <?php if ($ListarReginal) : ?>
                                    <option value="<?php echo $ListarReginal->tbl_regional_ID; ?>"><?php echo $ListarReginal->tbl_regional_NOMBRE; ?></option>
                                <?php else : ?>
                                    <option value="0">-- NO SE ENCONTRARON DATOS --</option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select><br>
                        <label class="" style="font-weight: bold;">
                            SELECCIONA LA CENTRO:*
                        </label>
                        <select class="form-control" id="bodegaCentro" name="bodegaCentro">

                        </select><br>
                        <label class="" style="font-weight: bold;">
                            SELECCIONA LA SEDE:*
                        </label>
                        <select class="form-control" id="bodegaSede" name="bodegaSede">

                        </select><br>

                        <form class="" action="<?php echo URL_SISINV; ?>Bodega/RegistrarBodega" method="POST">
                            <div class="row">
                                <div class="position-relative form-group col-md-12">
                                    <label class="" style="font-weight: bold;">
                                        NOMBRE DE LA BODEGA:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" id="bodegaNombre" name="bodegaNombre" placeholder="SERVICIOS GENERALES" type="text" required>
                                    <p class="text-muted"><i> Los campos con * son obligatorios</i></p>
                                    <button class="mb-2 mr-2 btn btn-primary col-md-12" id="RegistrarBodega" type="button" value="REGISTRAR">
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
                                <h6 class="m-0 font-weight-bold">BODEGAS</h6>
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
                                    <th>BODEGA</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $contador = 1;
                                foreach ($datos['ListarBodega'] as $ListarBodega) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $contador++; ?></th>
                                        <td id="bodegaRegional"><?php echo $ListarBodega->tbl_regional_NOMBRE; ?></td>
                                        <td id="bodegaCentro"><?php echo $ListarBodega->tbl_centro_NOMBRE; ?></td>
                                        <td id="bodegaSede"><?php echo $ListarBodega->tbl_sede_NOMBRE; ?></td>
                                        <td id="bodegaNombre"><?php echo $ListarBodega->tbl_bodega_NOMBRE; ?></td>

                                        <?php // if ($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR') : 
                                        ?>
                                        <td>
                                            <cite title="Editar">
                                                <a href="<?php echo URL_SISINV; ?>Bodega/EditarBodega/<?php echo $ListarBodega->tbl_bodega_ID; ?>" class="btn btn-info btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                            </cite>
                                            <cite title="Borrar">
                                                <a href="<?php echo URL_SISINV; ?>Bodega/EliminarBodega/<?php echo $ListarBodega->tbl_bodega_ID; ?>" class="btn btn-danger btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </a>
                                            </cite>
                                        </td>
                                        <?php // endif; 
                                        ?>
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
        document.getElementById("RegistrarBodega").addEventListener('click', function() {
            RegistrarBodega();
        });
        /*Cambiar regional */
        $('#bodegaRegional').change(function() {
            var regionalID = $('#bodegaRegional').val();
            console.log(regionalID);
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
                        cadena += "<option id='bodegaCentro' value='" + data[i].tbl_centro_ID + "'>" + data[i].tbl_centro_NOMBRE + "</option>"
                    }
                    $('#bodegaCentro').html(cadena);
                    var centroID = $('#bodegaCentro').val();
                    LoadSedes(centroID);
                } else {
                    cadena = "<option value='0'>NO SE ENCONTRARON DATOS </option>";
                    $('#bodegaCentro').html(cadena);
                    var centroID = $('#bodegaCentro').val();
                    LoadSedes(centroID);
                }
            })
        }
        $('#bodegaCentro').change(function() {
            var centroID = $('#bodegaCentro').val();
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
                        cadena += "<option id='bodegaSede' value='" + data[i].tbl_sede_ID + "'>" + data[i].tbl_sede_NOMBRE + "</option>";
                    }
                    var centroID = $('#bodegaCentro').val()
                    if (centroID == 0) {
                        $('#bodegaSede').html('');
                    }
                    $('#bodegaSede').html(cadena);
                    var sedeID = $('#bodegaSede').val();
                } else {
                    cadena = "<option id='bodegaSede' value='0'>NO SE ENCONTRARON DATOS</option>";
                    $('#bodegaSede').html(cadena); // <- significa poner los datos dentro del input
                    var sedeID = $('#bodegaSede').val();
                }
            })
        }

        function RegistrarBodega() {
            var bodegaRegional = $('#bodegaRegional').val();
            var bodegaCentro = $('#bodegaCentro').val();
            var bodegaSede = $('#bodegaSede').val();
            var bodegaNombre = $('#bodegaNombre').val();
            console.log(bodegaRegional)
            var ambienteExists = false;
            $.ajax({
                url: '<?php echo URL_SISINV ?>Bodega/RegistrarBodega',
                type: 'POST',
                data: {
                    bodegaRegional: bodegaRegional,
                    bodegaCentro: bodegaCentro,
                    bodegaSede: bodegaSede,
                    bodegaNombre: bodegaNombre
                }
            }).done(function() {
                Success();
                // function de tiempo
               /*  setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Bodega/ListarBodega';
                }, 2000); */
            }).fail(function() {
                error()
                setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Bodega/ListarBodega';
                }, 2000);
            })

            //alert(ambienteRegional + " "+ ambienteCentro+ " " + ambienteSede + " "+ ambienteNombre + " " + ambienteResponsable)
            if (bodegaRegional == "" || bodegaRegional == "--SELECCIONAR--" || bodegaCentro == "" || bodegaCentro == 0 || bodegaSede == "" || bodegaNombre == "") {
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

                });
            }
        }
    });
</script>