<?php require_once "../app/views/template.php"; ?>
<!-- MODAL EDITAR REGIONAL-->
<div class="modal fade" id="SedeModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ELIMINAR SEDE</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" method="POST">
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <input type="hidden" id="idSede" value="<?php echo $datos['idSede'] ?>">
                                <label>Nombre Sede:</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control" readonly="readonly" value="<?php echo $datos['sedeNombre'] ?>" id="sedeNombre"><br>
                                <label>Responsable:</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control" readonly="readonly" value="<?php echo $datos['sedeResponsable'] ?>" id="sedeResponsable"><br>
                                <label>Telefono:</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control" readonly="readonly" value="<?php echo $datos['sedeTelefono'] ?>" id="sedeTelefono"><br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button"  class="btn btn-info btn-danger col-md-12" id="EliminarSede">ELIMINAR</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button"  data-dismiss="modal">CANCELAR</button>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo URL_SISINV ?>js/core/jquery.min.js"></script>
<script src="<?php echo URL_SISINV ?>js/alerts.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#SedeModel").modal("show");
        $("#SedeModel").on('hidden.bs.modal', function() {
            window.location.replace('<?php echo URL_SISINV ?>Sede/ListarSede');
        });

        document.getElementById("EliminarSede").addEventListener('click', function() {
            EliminarSede()
        });

        function EliminarSede() {

            var idSede = $('#idSede').val();

            $.ajax({
                url: '<?php echo URL_SISINV ?>Sede/DeleteSede',
                type: 'POST',
                data: {
                    idSede: idSede
                }
            }).done(function() {
                Delete();
                 // function de tiempo
                 setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Sede/ListarSede';
                }, 3000);
            }).fail(function() {
                errorDelete();
                // function de tiempo
                setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Sede/ListarSede';
                }, 3000);
            })
        }
    })
</script>