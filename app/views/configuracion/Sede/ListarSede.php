<?php require_once "../app/views/template.php"; ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <h1 class="h3 mb-2 text-gray-800">Listado de Sede</h1>
            <p class="mb-4">
                Registre la cantidad de estantes que esten asociados a la Sede.
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
                        <h5 class="card-title">REGISTRAR SEDE</h5>
                        <form class="">
                            <div class="row">
                                <div class="position-relative form-group col-md-12">
                                    <label class="" style="font-weight: bold;">
                                        SELECCIONA LA REGIONAL:*
                                    </label>
                                    <select class="form-control" id="sedeRegional">
                                        <option>--SELECCIONAR--</option>
                                        <?php foreach ($datos['ListarRegional'] as $ListarRegional) : ?>
                                            <option value="<?php echo $ListarRegional->tbl_regional_ID ?>"><?php echo $ListarRegional->tbl_regional_NOMBRE ?></option>
                                        <?php endforeach; ?>
                                    </select> <br>
                                    <label class="" style="font-weight: bold;">
                                        SELECCIONA LA CENTRO:*
                                    </label>
                                    <select class="form-control" id="sedeCentro">
                                    </select> <br>

                                    <label class="" style="font-weight: bold;">
                                        NOMBRE DEL SEDE:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" placeholder="NOMBRE DEL SEDE" type="text" id="sedeNombre"><br>
                                    </input>
                                    <label class="" style="font-weight: bold;">
                                        RESPONSABLE:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" placeholder="NOMBRE DEL RESPONSABLE" type="text" id="sedeResponsable"><br>
                                    </input>
                                    <label class="" style="font-weight: bold;">
                                        TELEFONO:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" placeholder="NUMERO DE TELEFONO" type="text" id="sedeTelefono"></input>
                                    <p class="text-muted"><i> Los campos con * son obligatorios</i></p>
                                    <button class="mb-2 mr-2 btn btn-primary col-md-12" value="REGISTRAR" id="RegistrarSede" type="button">
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
                                <h6 class="m-0 font-weight-bold">SEDE</h6>
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
                                    <th>SEDE</th>
                                    <th>RESPONSABLE</th>
                                    <th>TELEFONO</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $contador = 1;
                                foreach ($datos['ListarSede'] as $ListarSede) : ?>
                                    <tr>
                                        <th scope="row" id="idSede"><?php echo $contador++; ?></th>
                                        <td id="sedeRegional"><?php echo $ListarSede->tbl_regional_NOMBRE; ?></td>
                                        <td id="sedeCentro"><?php echo $ListarSede->tbl_centro_NOMBRE; ?></td>
                                        <td id="sedeNombre"><?php echo $ListarSede->tbl_sede_NOMBRE; ?></td>
                                        <td id="sedeRedeponsable"><?php echo $ListarSede->tbl_sede_RESPONSABLE; ?></td>
                                        <td id="sedeTelefono"><?php echo $ListarSede->tbl_sede_TELEFONO; ?></td>
                                        <?php if ($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR') : ?>

                                            <td>
                                                <cite title="Editar">
                                                    <a href="<?php echo URL_SISINV; ?>Sede/ObtenerSede/<?php echo $ListarSede->tbl_sede_ID ?>" class="btn btn-info btn-icon-split" id="EditarSede">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                    </a>
                                                </cite>
                                                <cite title="Borrar">
                                                    <a href="<?php echo URL_SISINV; ?>Sede/EliminarSede/<?php echo $ListarSede->tbl_sede_ID; ?>" class="btn btn-danger btn-icon-split" id="BorrarSede">
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo URL_SISINV ?>js/alerts.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        document.getElementById("RegistrarSede").addEventListener('click', function() {
            RegistrarSede();
        });

        $("#sedeRegional").change(function() {
            var regionalID = $("#sedeRegional").val();
            loadCentros(regionalID);
        });

        function loadCentros(regionalID) {
            $.ajax({
                url: '<?php echo URL_SISINV ?>Centro/loadCentros',
                type: 'POST',
                data: {
                    regionalID: regionalID
                }
            }).done(function(resp) {
                var data = JSON.parse(resp);
                var cadena = "";
                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        cadena += "<option value='" + data[i].tbl_centro_ID + "'>" + data[i].tbl_centro_NOMBRE + "</option>";
                    }
                    $("#sedeCentro").html(cadena);
                    var regionalID = $("#sedeCentro").val();
                } else {
                    cadena = "<option value=''> NO SE ENCONTRARON DATOS</option>";
                    $("#sedeCentro").html(cadena);
                }
            });
        }

        function RegistrarSede() {
            var sedeNombre = $('#sedeNombre').val();
            var sedeResponsable = $('#sedeResponsable').val();
            var sedeTelefono = $('#sedeTelefono').val();
            var sedeRegional = $('#sedeRegional').val();
            var sedeCentro = $('#sedeCentro').val();
            var CentroExists = false

            if (sedeNombre == "" || sedeResponsable == "" || sedeTelefono == "" || sedeRegional == "" || sedeCentro == "") {
                FillData();
            } else {
                $.ajax({
                    url: '<?php echo URL_SISINV ?>Sede/CompararSede',
                    type: 'POST',
                    data: {
                        sedeNombre: sedeNombre
                    }
                }).done(function(response) {

                    var data = JSON.parse(response)
                    for (i = 0; i < data.length; i++) {
                        //regionala.push(data[i].tbl_centro_tbl_centro_ID)
                        if (data[i].tbl_sede_NOMBRE == sedeNombre && data[i].tbl_centro_tbl_centro_ID == sedeCentro) {
                            CentroExists = true; // si encuentra un dato exitente
                            Existe();
                            break;
                        }
                    }
                    // si nuca encuentra algo exitente. pasa a registar
                    if (!CentroExists) {

                        $.ajax({
                            url: '<?php echo URL_SISINV ?>Sede/RegistrarSede',
                            type: 'POST',
                            data: {
                                sedeNombre: sedeNombre,
                                sedeResponsable: sedeResponsable,
                                sedeTelefono: sedeTelefono,
                                sedeRegional: sedeRegional,
                                sedeCentro: sedeCentro
                            }
                        }).done(function() {
                            Success();
                            // funcion de tiempo
                            setTimeout(function() {
                                window.location.href = '<?php echo URL_SISINV ?>Sede/ListarSede';
                            }, 3000);
                        }).fail(function() {
                            error()
                            // funcion de tiempo
                            setTimeout(function() {
                                window.location.href = '<?php echo URL_SISINV ?>Sede/ListarSede';
                            }, 3000);
                        })
                    }

                });
            }
        }
    });
</script>