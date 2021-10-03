<?php require_once "../app/views/template.php"; ?>
<!-- MODAL EDITAR REGIONAL-->
<div class="modal fade" id="ModelCentro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR CENTRO</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" method="POST">
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <label class="" style="font-weight: bold;">
                                SELECCIONA LA REGIONAL:*
                            </label>
                            <select class="form-control" id="centroRegional">
                                <option>--SELECCIONAR--</option>
                                <?php foreach ($datos['ListarRegional'] as $ListarRegional) : ?>
                                    <option value="<?php echo $ListarRegional->tbl_regional_ID ?>"><?php echo $ListarRegional->tbl_regional_NOMBRE ?></option>
                                <?php endforeach; ?>
                            </select> <br>
                            <div class="form-group">
                                <input type="hidden" id="idCentro" value="<?php echo $datos['idCentro'] ?>">
                                <label>Nombre Centro:</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control" value="<?php echo $datos['centroNombre'] ?>" id="centroNombre"><br>
                                <label>Telefono:</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control" value="<?php echo $datos['centroTelefono'] ?>" id="centroTelefono"><br>
                                <label>Subdirector:</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control" value="<?php echo $datos['centroSubdirector'] ?>" id="centroSubdirector"><br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-info btn-round col-md-12" id="EditarCentro">ACTUALIZAR</button>
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
<script src="<?php echo URL_SISINV ?>MATERIAL_THEME/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL_SISINV ?>js/alerts.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#ModelCentro").modal("show");
        $("#ModelCentro").on('hidden.bs.modal', function() {
            window.location.replace('<?php echo URL_SISINV ?>Centro/ListarCentro');
        });

        document.getElementById("EditarCentro").addEventListener('click', function() {
            EditarCentro()
        });

        function EditarCentro() {
            var idCentro = $('#idCentro').val();
            var centroRegional = $('#centroRegional').val();
            var centroNombre = $('#centroNombre').val();
            var centroTelefono = $('#centroTelefono').val();
            var centroSubdirector = $('#centroSubdirector').val();
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
                    // si nunca encotro algo existente pasa a registar
                    if (!regionalExists) {
                        $.ajax({
                            url: '<?php echo URL_SISINV ?>Centro/EditarCentro',
                            type: 'POST',
                            data: {
                                centroRegional: centroRegional,
                                idCentro: idCentro,
                                centroNombre: centroNombre,
                                centroTelefono: centroTelefono,
                                centroSubdirector: centroSubdirector
                            }
                        }).done(function() {
                            Edit();
                            // function de tiempo
                            setTimeout(function() {
                                window.location.href = '<?php echo URL_SISINV ?>Centro/ListarCentro';
                            }, 2000);
                        }).fail(function() {
                            ErrorEdit()
                            // function de tiempo
                            setTimeout(function() {
                                window.location.href = '<?php echo URL_SISINV ?>Centro/ListarCentro';
                            }, 2000);
                        })
                    }

                });


            }


        }

    })
</script>