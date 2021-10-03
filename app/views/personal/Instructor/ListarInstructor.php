<?php require_once "../app/views/template.php"; ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <h1 class="h3 mb-2 text-gray-800">Listado de Instructor</h1>
            <p class="mb-4">
                Registre la cantidad de instructor que esten asociados a la sede.
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
                        <h5 class="card-title">REGISTRAR INSTRUCTOR</h5>
                        <form>
                            <div class="row">
                                <div class="position-relative form-group col-md-12">
                                    <label class="" style="font-weight: bold;">
                                        SELECCIONA LA SEDE:*
                                    </label>
                                    <select class="form-control" id="instructorSedeID">
                                        <option>--SELECCIONAR--</option>
                                        <?php foreach ($datos['ListarSedes'] as $ListarSede) : ?>
                                            <option value="<?php echo $ListarSede->tbl_sede_ID ?>"><?php echo $ListarSede->tbl_sede_NOMBRE ?></option>
                                        <?php endforeach; ?>
                                    </select> <br>
                                    <label class="" style="font-weight: bold;">
                                        NOMBRES:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" placeholder="NOMBRES" type="text" id="instructorNombre"><br>
                                    </input>
                                    <label class="" style="font-weight: bold;">
                                        APELLIDOS:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" placeholder="APELLIDOS" type="text" id="instructorApellido"><br>
                                    </input>
                                    <label class="" style="font-weight: bold;">
                                        TIPO DE TIPO DE DOCUMENTO:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" placeholder="TIPO DE DOCUMENTO" type="text" id="instructorTipoDocumento"><br>
                                    </input>
                                    <label class="" style="font-weight: bold;">
                                        NUMERO DE DOCUMENTO:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" placeholder="NUMERO DE DOCUMENTO" type="text" id="instructorNumeroDocumento"><br>
                                    </input>
                                    <label class="" style="font-weight: bold;">
                                        NUMERO DE TELEFONO:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" placeholder="NUMERO DE TELEFONO" type="text" id="instructorNumeroTelefono"><br>
                                    </input>
                                    <label class="" style="font-weight: bold;">
                                        DIRECION DE CORREO:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" placeholder="DIRECION DE CORREO" type="text" id="instructorDirecionCorreo"><br>
                                    </input>
                                    <label class="" style="font-weight: bold;">
                                        DIRECION:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" placeholder="DIRECION" type="text" id="instructorDirecion"><br>
                                    </input>
                                    <p class="text-muted"><i> Los campos con * son obligatorios</i></p>
                                    <button class="mb-2 mr-2 btn btn-primary col-md-12" value="REGISTRAR" type="button" id="RegistrarInstructor">
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
                                <h6 class="m-0 font-weight-bold">TABLA DE INFORMACION</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>SEDE</th>
                                    <th>NOMBRES</th>
                                    <th>APELLIDOS</th>
                                    <th>TIPO DE DOCUMENTO</th>
                                    <th>NUMERO DE DOCUMENTO</th>
                                    <th>TELEFONO</th>
                                    <th>DIRECION DE CORREO</th>
                                    <th>DIRECION</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $contador = 1;
                                foreach ($datos['ListarInstructor'] as $ListarInstructor) : ?>
                                    <tr>
                                        <th scope="row" id="idInsdtructor"><?php echo $contador++; ?></th>
                                        <td id="instructorSedeID"><?php echo $ListarInstructor->tbl_sede_NOMBRE; ?></td>
                                        <td id="instructorNombre"><?php echo $ListarInstructor->tbl_instructor_NOMBRES; ?></td>
                                        <td id="instructorApellido"><?php echo $ListarInstructor->tbl_instructor_APELLIDOS; ?></td>
                                        <td id="instructorTipoDocumento"><?php echo $ListarInstructor->tbl_instructor_TIPODOCUMENTO; ?></td>
                                        <td id="instructorNumeroDocumento"><?php echo $ListarInstructor->tbl_instructor_NUMDECUMENTO; ?></td>
                                        <td id="instructorNumeroTelefono"><?php echo $ListarInstructor->tbl_instructor_TELEFONO; ?></td>
                                        <td id="instructorDirecionCorreo"><?php echo $ListarInstructor->tbl_instructor_CORREO; ?></td>
                                        <td id="instructorDirecion"><?php echo $ListarInstructor->tbl_instructor_DIRECION; ?></td>
                                        <?php if ($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR') : ?>

                                            <td>
                                                <cite title="Editar">
                                                    <a href="<?php echo URL_SISINV; ?>Instructor/ObtenerInstructorId/<?php echo $ListarInstructor->tbl_instructor_ID ?>" class="btn btn-info btn-icon-split" id="EditarInstructor">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                    </a>
                                                </cite>
                                                <cite title="Borrar">
                                                    <a href="<?php echo URL_SISINV; ?>Instructor/EliminarInstructor/<?php echo $ListarInstructor->tbl_instructor_ID; ?>" class="btn btn-danger btn-icon-split" id="BorrarInstructor">
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

        document.getElementById("RegistrarInstructor").addEventListener('click', function() {
            RegistrarInstructor();
        });

        function RegistrarInstructor() {
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
                url: '<?php echo URL_SISINV ?>Instructor/RegistrarInstructor',
                type: 'POST',
                data: {
                    instructorSedeID: instructorSedeID,
                    instructorNombre: instructorNombre,
                    instructorApellido: instructorApellido,
                    instructorTipoDocumento: instructorTipoDocumento,
                    instructorNumeroDocumento: instructorNumeroDocumento,
                    instructorNumeroTelefono: instructorNumeroTelefono,
                    instructorDirecionCorreo: instructorDirecionCorreo,
                    instructorDirecion: instructorDirecion
                }
            }).done(function() {
                Success();
                // funcion de tiempo
                setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Instructor/ListarInstructor';
                }, 3000);
            }).fail(function() {
                error();
                // funcion de tiempo
                setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Instructor/ListarInstructor';
                }, 3000);
            })
        }
    });
</script>