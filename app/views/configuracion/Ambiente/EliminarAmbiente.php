<?php require_once "../app/views/template.php"; ?>
<!-- MODAL EDITAR REGIONAL-->
<div class="modal fade" id="CentroModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ELIMINAR AMBIENTE</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <input type="text" id="idAmbiente" value="<?php echo $datos['idAmbiente'] ?>">
                                
                                <label>NOMBRE AMBIENTE:</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control" readonly="readonly" value="<?php echo $datos['ambienteNombre'] ?>" id="centroNombre"><br>
                                <label>INSTRUCTOR:</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control" readonly="readonly" value="<?php echo $datos['ambienteInstructor'] ?>" id="centroSubdirector"><br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-info btn-danger col-md-12" type="button" name="" id="EliminarAmbiente">ELIMINAR</button>
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
        $("#CentroModel").modal("show");
        $("#CentroModel").on('hidden.bs.modal', function() {
            window.location.replace('<?php echo URL_SISINV ?>Ambiente/ListarAmbiente');
        });
        document.getElementById('EliminarAmbiente').addEventListener('click', function() {
            EliminarAmbiente();
        });

        function EliminarAmbiente() {
            var idAmbiente = $('#idAmbiente').val()

            $.ajax({
                url: '<?php echo URL_SISINV ?>Ambiente/DeleteAmbiente',
                type: 'POST',
                data: {
                    idAmbiente: idAmbiente
                }
            }).done(function() {
                Delete()
                // function de tiempo
                setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Ambiente/ListarAmbiente';
                }, 2000);
            }).fail(function() {
                ErrorDelete()
                // function de tiempo
                setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Ambiente/ListarAmbiente';
                }, 2000);
            })
        }

    })
</script>