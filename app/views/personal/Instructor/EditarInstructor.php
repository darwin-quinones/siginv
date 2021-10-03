<?php require_once "../app/views/template.php"; ?>
<!-- MODAL EDITAR REGIONAL-->
<div class="modal fade" id="ModelInstructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR INSTRUCTOR</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" method="POST">
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <label class="" style="font-weight: bold;">
                                SELECCIONA LA SEDE:*
                            </label>
                            <select class="form-control" id="instructorSedeID">
                                <option>--SELECCIONAR--</option>
                                <?php foreach ($datos['ListarSede'] as $ListarSede) : ?>
                                    <option value="<?php echo $ListarSede->tbl_sede_ID ?>"><?php echo $ListarSede->tbl_sede_NOMBRE ?></option>
                                <?php endforeach; ?>
                            </select> <br>
                            <input type="text" id="idInstructor" value="<?php echo $datos['idInstructor'] ?>"><br>
                            <label class="" style="font-weight: bold;">
                                NOMBRES:*
                            </label>
                            <input onkeyup="mayus(this);" class="form-control" placeholder="NOMBRES" type="text" value="<?php echo $datos['instructorNombre'] ?>" id="instructorNombre"><br>
                            </input>
                            <label class="" style="font-weight: bold;">
                                APELLIDOS:*
                            </label>
                            <input onkeyup="mayus(this);" class="form-control" placeholder="APELLIDOS" type="text" value="<?php echo $datos['instructorApellido'] ?>" id="instructorApellido"><br>
                            </input>
                            <label class="" style="font-weight: bold;">
                                TIPO DE TIPO DE DOCUMENTO:*
                            </label>
                            <input onkeyup="mayus(this);" class="form-control" placeholder="TIPO DE DOCUMENTO" type="text" value="<?php echo $datos['instructorTipoDocumento'] ?>" id="instructorTipoDocumento"><br>
                            </input>
                            <label class="" style="font-weight: bold;">
                                NUMERO DE DOCUMENTO:*
                            </label>
                            <input onkeyup="mayus(this);" class="form-control" placeholder="NUMERO DE DOCUMENTO" type="text" value="<?php echo $datos['instructorNumeroDocumento'] ?>" id="instructorNumeroDocumento"><br>
                            </input>
                            <label class="" style="font-weight: bold;">
                                NUMERO DE TELEFONO:*
                            </label>
                            <input onkeyup="mayus(this);" class="form-control" placeholder="NUMERO DE TELEFONO" type="text" value="<?php echo $datos['instructorNumeroTelefono'] ?>" id="instructorNumeroTelefono"><br>
                            </input>
                            <label class="" style="font-weight: bold;">
                                DIRECION DE CORREO:*
                            </label>
                            <input onkeyup="mayus(this);" class="form-control" placeholder="DIRECION DE CORREO" type="text" value="<?php echo $datos['instructorDirecionCorreo'] ?>" id="instructorDirecionCorreo"><br>
                            </input>
                            <label class="" style="font-weight: bold;">
                                DIRECION:*
                            </label>
                            <input onkeyup="mayus(this);" class="form-control" placeholder="DIRECION" type="text" value="<?php echo $datos['instructorDirecion'] ?>" id="instructorDirecion"><br>
                            </input>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-info btn-round col-md-12" id="EditarInstructor" type="button">ACTUALIZAR</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo URL_SISINV ?>js/core/jquery.min.js"></script>
<script src="<?php echo URL_SISINV ?>js/alerts.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#ModelInstructor").modal("show");
        $("#ModelInstructor").on('hidden.bs.modal', function() {
            window.location.replace('<?php echo URL_SISINV ?>Instructor/ListarInstructor');
        });

        document.getElementById("EditarInstructor").addEventListener('click', function() {
            EditarInstructor();
        });

        function EditarInstructor() {
            var idInstructor = $('#idInstructor').val();
            var instructorSedeID = $('#instructorSedeID').val();
            var instructorNombre = $('#instructorNombre').val();
            var instructorApellido = $('#instructorApellido').val();
            var instructorTipoDocumento = $('#instructorTipoDocumento').val();
            var instructorNumeroDocumento = $('#instructorNumeroDocumento').val();
            var instructorNumeroTelefono = $('#instructorNumeroTelefono').val();
            var instructorDirecionCorreo = $('#instructorDirecionCorreo').val();
            var instructorDirecion = $('#instructorDirecion').val();

            alert(instructorSedeID + instructorNombre + instructorApellido + instructorTipoDocumento + instructorNumeroDocumento + instructorNumeroTelefono + instructorDirecionCorreo + instructorDirecion)

            $.ajax({
                url: '<?php echo URL_SISINV ?>Instructor/EditarInstructor',
                type: 'POST',
                data: {
                    idInstructor: idInstructor, 
                    instructorSedeID: instructorSedeID,
                    instructorNombre: instructorNombre,
                    instructorApellido: instructorApellido,
                    instructorTipoDocumento: instructorTipoDocumento,
                    instructorNumeroDocumento: instructorNumeroDocumento,
                    instructorNumeroTelefono: instructorNumeroTelefono,
                    instructorDirecionCorreo: instructorDirecionCorreo,
                    instructorDirecion: instructorDirecion,
                }
            }).done(function() {
                Success()
                // function de tiempo
                setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Instructor/ListarInstructor';
                }, 2000);
            }).fail(function() {
                ErrorEdit()
                // function de tiempo
                setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Instructor/ListarInstructor';
                }, 3000);
            })
        }
    })
</script>