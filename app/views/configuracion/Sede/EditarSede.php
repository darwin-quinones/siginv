<?php require_once "../app/views/template.php"; ?>
<!-- MODAL EDITAR REGIONAL-->
<div class="modal fade" id="ModelSede" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR SEDE</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12 pr-1">
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
                            <div class="form-group">
                                <input type="hidden" id="idSede" value="<?php echo $datos['idSede'] ?>">
                                <label>Nombre Sede:</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control" value="<?php echo $datos['sedeNombre'] ?>" id="sedeNombre"><br>
                                <label>Responsable:</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control" value="<?php echo $datos['sedeResponsable'] ?>" id="sedeResponsable"><br>
                                <label>Telefono:</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control" value="<?php echo $datos['sedeTelefono'] ?>" id="sedeTelefono"><br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-info btn-round col-md-12" id="EditarSede">ACTUALIZAR</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?php echo URL_SISINV ?>js/jquery.min.js"></script>
<script src="<?php echo URL_SISINV ?>js/core/jquery.min.js"></script>
<script src="<?php echo URL_SISINV ?>js/alerts.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#ModelSede").modal("show");
        $("#ModelSede").on('hidden.bs.modal', function() {
            window.location.replace('<?php echo URL_SISINV ?>Sede/ListarSede');
        });

        document.getElementById("EditarSede").addEventListener('click', function() {
            EditarSede()
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
                    cadena = "<option value='0'> NO SE ENCONTRANRON DATOS</option>";
                    $("#sedeCentro").html(cadena);
                }
            });
        }

        function EditarSede() {
            var idSede = $('#idSede').val();
            var sedeRegional = $('#sedeRegional').val();
            var sedeCentro = $('#sedeCentro').val();
            var sedeNombre = $('#sedeNombre').val();
            var sedeResponsable = $('#sedeResponsable').val();
            var sedeTelefono = $('#sedeTelefono').val();
            var CentroExists = false
            if (sedeNombre == "" || sedeResponsable == "" || sedeTelefono == "" || sedeRegional == "--SELECCIONAR--" || sedeCentro == "0") {
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
                    // if never faund any centro it pass to edit it
                    if (!CentroExists) {

                        $.ajax({
                            url: '<?php echo URL_SISINV ?>Sede/EditarSede',
                            type: 'POST',
                            data: {
                                idSede: idSede,
                                sedeRegional: sedeRegional,
                                sedeCentro: sedeCentro,
                                sedeNombre: sedeNombre,
                                sedeResponsable: sedeResponsable,
                                sedeTelefono: sedeTelefono
                            }
                        }).done(function() {
                            Edit();
                            // funcion de tiempo
                            setTimeout(function() {
                                window.location.href = '<?php echo URL_SISINV ?>Sede/ListarSede';
                            }, 3000);
                        }).fail(function() {
                            Error2();
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