<?php require_once "../app/views/template.php"; ?>
<!-- MODAL EDITAR REGIONAL-->
<div class="modal fade" id="CentroModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ELIMINAR BODEGA</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>NOMBRE BODEGA:</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control" readonly="readonly" value="<?php echo $datos['bodegaNombre'] ?>" id="bodegaNombre"><br>
                                <input onkeyup="mayus(this);" type="text" class="form-control" readonly="readonly" value="<?php echo $datos['idBodega'] ?>" id="idBodega"><br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-info btn-danger col-md-12" type="button" id="EliminarBodega">ELIMINAR</button>
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
            window.location.replace('<?php echo URL_SISINV ?>Bodega/ListarBodega');
        });
        document.getElementById('EliminarBodega').addEventListener('click', function() {
            EliminarBodega();
        });

        function EliminarBodega() {
            var idBodega = $('#idBodega').val()

            $.ajax({
                url: '<?php echo URL_SISINV ?>Bodega/DeleteBodega',
                type: 'POST',
                data: {
                    idBodega: idBodega
                }
            }).done(function() {
                Delete()
                // function de tiempo
                setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Bodega/ListarBodega';
                }, 2000);
            }).fail(function() {
                ErrorDelete()
                // function de tiempo
                setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Bodega/ListarBodega';
                }, 2000);
            })
        }
        // comentario
    })
</script>