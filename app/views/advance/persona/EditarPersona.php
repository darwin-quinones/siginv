<?php require_once "../app/views/template.php"; ?>
<!--MODAL EDITAR PERSONA -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="EditarPersona" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR PERSONA</h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo URL_SISINV;?>Persona/EditarPersona/<?php echo $datos['idPersona'] ?>" autocomplete="off" class="form-neon " data-form="save" method="POST">
                    <fieldset>
                        <legend>
                            <i class="far fa-address-card"></i>
                            Información personal
                        </legend>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="usuario_dni">Tipo Documento</label>
                                        <select class="form-control" name="TIPO_DOCUMENTO">
                                            <option value="<?php echo $datos['idTipoDocumento']?>"><?php echo $datos['TipoDocumento'];?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="usuario_apellido">Documento</label>
                                        <input class="form-control" id="usuario_apellido" maxlength="35" name="NUM_DOCUMENTO" value="<?php echo $datos['NumDocumento'] ?> " type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="">Nombres</label>
                                        <input class="form-control" id="usuario_email" maxlength="70" name="NOMBRES" value="<?php echo $datos['Nombres'];?>" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="usuario_apellido">Primer Apellido</label>
                                        <input class="form-control" id="usuario_apellido" maxlength="35" name="PRIMER_APELLIDO" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,35}"  value="<?php echo $datos['PrimerApellido'];?>" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="usuario_apellido">Segundo Apellido</label>
                                        <input class="form-control" id="usuario_apellido" maxlength="35" name="SEGUNDO_APELLIDO" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,35}" value=" <?php echo $datos['SegundoApellido'];?>" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" >Fecha de nacimiento</label>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="text" value="<?php echo $datos['Fecha'];?>" name="FECHA" id="example-date-input">
                                                    <i class="fa fas-calendar "></i>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="usuario_telefono">Teléfono</label>
                                        <input class="form-control" id="usuario_telefono" maxlength="20" name="TELEFONO" pattern="[0-9()+]{6,20}" value="<?php echo $datos['Telefono'];?>" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="usuario_email">Email</label>
                                        <input class="form-control" id="usuario_email" maxlength="70" name="CORREO" value=" <?php echo $datos['Correo'];?>" type="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <br>
                        <fieldset>
                            <legend><i class="fas fa-medal"></i>
                             	Cargo
                         	</legend>
                            <br>
                                <br>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <p><span class="badge badge-info">Control total</span>Permisos para registrar, actualizar y eliminar</p>
                                                <p><span class="badge badge-success">Edición</span>Permisos para registrar y actualizar</p>
                                                <p><span class="badge badge-dark">Registrar</span>Solo permisos para registrar</p>
                                                <div class="form-group">
                                                    <select class="form-control" name="CARGO">
                                                        <option value="<?php echo $datos['idTipoCargo'];?>"><?php echo $datos['Cargo'];?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </br>
                            </br>
                        </fieldset>
                        <div class="modal-footer">
                            <button class="btn btn-raised btn btn-info btn-default" type="submit">EDITAR</button>
                            <button class="btn btn-light btn-default" type="reset">LIMPIAR</button>
                            <button class="btn btn-secondary btn btn-default active" data-dismiss="modal" type="button">CANCELAR</button>
                        </div>
                    </br>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo URL_SISINV;?>MATERIAL_THEME/vendor/jquery/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#EditarPersona").modal("show");
    $("#EditarPersona").on('hidden.bs.modal', function(){
    	window.location.replace('<?php echo URL_SISINV;?>Persona/ListadoPersona');
    });
});  
</script>
