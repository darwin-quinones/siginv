<?php require_once "../app/views/template.php"; ?>
<!-- MODAL EDITAR REGIONAL-->
<div class="modal fade" id="ModelRegional" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR REGIONAL</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="" method="POST">
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>Nombre Regional:</label>
                                <input type="hidden" id="idRegional" value="<?php echo $datos['idRegional'] ?>">
                                <input onkeyup="mayus(this);" type="text" class="form-control" value="<?php echo $datos['nombre'] ?>" id="nombreRegional">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-info btn-round col-md-12" id="EditarRegional">ACTUALIZAR</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">CANCELAR</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URL_SISINV ?>MATERIAL_THEME/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL_SISINV ?>js/alerts.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#ModelRegional").modal("show");
        $("#ModelRegional").on('hidden.bs.modal', function() {
            window.location.replace('<?php echo URL_SISINV ?>Regional/ListarRegional');
        });

        document.getElementById("EditarRegional").addEventListener('click', function() {
            EditarRegional()
        });

        function EditarRegional() {
            var idRegional = $('#idRegional').val();
            var nombreRegional = $('#nombreRegional').val();

            if (nombreRegional == "") {
                fillData();
            } else {
                $.ajax({
                    url: '<?php echo URL_SISINV ?>Regional/CompareRegional',
                    type: 'POST',
                    data: {
                        regional: nombreRegional
                    }
                }).done(function(resp) {
                    var data = JSON.parse(resp);
                    if (data['tbl_regional_NOMBRE'] == nombreRegional) {
                        Existe();
                    } else {
                        $.ajax({
                            url: '<?php echo URL_SISINV ?>Regional/EditarRegional',
                            type: 'POST',
                            data: {
                                idRegional: idRegional,
                                nombreRegional: nombreRegional
                            }
                        }).done(function(response) {
                            Edit();
                            // function de tiempo
                            setTimeout(function() {
                                window.location.href = '<?php echo URL_SISINV ?>Regional/ListarRegional';
                            }, 2000);

                        }).fail(function() {
                            ErrorEdit();
                            // function de tiempo
                            setTimeout(function() {
                                window.location.href = '<?php echo URL_SISINV ?>Regional/ListarRegional';
                            }, 2000);
                        })
                    }

                })
            }

        }
    })
</script>