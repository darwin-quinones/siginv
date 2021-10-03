<?php require_once "../app/views/template.php"; ?>
<!-- MODAL EDITAR REGIONAL-->
<div class="modal fade" id="DeleteRegional" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ELIMINAR REGIONAL</h5>
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
                                <input type="text" class="form-control" name="NombreRegional" readonly="readonly" value="<?php echo $datos['nombre'] ?>" id="nombreRegional">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button"  class="btn btn-info btn-danger col-md-12" id="EliminarRegional">ELIMINAR</button>
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
        $("#DeleteRegional").modal("show");
        $("#DeleteRegional").on('hidden.bs.modal', function() {
            window.location.replace('<?php echo URL_SISINV ?>Regional/ListarRegional');
        });

        document.getElementById("EliminarRegional").addEventListener('click', function() {
            EliminarRegional()
        });

        function EliminarRegional() {
            idRegional = $('#idRegional').val();
            $.ajax({
                url: '<?php echo URL_SISINV ?>Regional/DeleteRegional',
                type: 'POST',
                data: {
                    idRegional: idRegional
                }
            }).done(function() {
                Delete();
                // function de tiempo
                setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Regional/ListarRegional';
                }, 2000);

            }).fail(function() {
                errorDelete();
                // function de tiempo
                setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Regional/ListarRegional';
                }, 2000);
            })
        }
    })
</script>