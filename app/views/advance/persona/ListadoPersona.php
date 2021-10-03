<?php require_once "../app/views/template.php"; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">USUARIOS</h1>
    <p class="mb-4">En esta seccion puede consultar los Usuarios existentes.</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-11">
                    <br>
                        <h6 class="m-0 font-weight-bold text-primary">LISTADO DE USUARIOS</h6>
                    </br>
                </div>
                <div class="col-md-1">
                    <cite title="Agregar">
                        <a class="btn btn-success btn-icon-split" data-target="#AgregarUsuario" data-toggle="modal">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus">
                                </i>
                            </span>
                        </a>
                    </cite>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table cellspacing="0" class="table table-bordered" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>TIPO DE DOCUMENTO</th>
                            <th>DOCUMENTO</th>
                            <th>NOMBRES</th>
                            <th>PRIMER APELLIDO</th>
                            <th>SEGUNDO APELLIDO</th>
                            <th>FECHA NACIMIENTO</th>
                            <th>TELEFONO</th>
                            <th>CORREO</th>
                            <th>CARGO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; foreach ($datos['ListarPersonas'] as $ListarPersonas): ?>
                        <tr>
                            <td><?php echo $contador++ ?></td>
                            <td><?php echo $ListarPersonas->Tbl_tipodocumento_NOMBRE;?></td>
                            <td><?php echo $ListarPersonas->Tbl_persona_NUMDOCUMENTO;?></td>
                            <td><?php echo $ListarPersonas->Tbl_persona_NOMBRES;?></td>
                            <td><?php echo $ListarPersonas->Tbl_persona_PRIMERAPELLIDO;?></td>
                            <td><?php echo $ListarPersonas->Tbl_persona_SEGUNDOAPELLIDO;?></td>
                            <td><?php echo $ListarPersonas->Tbl_persona_FECHANAC;?></td>
                            <td><?php echo $ListarPersonas->Tbl_persona_TELEFONO;?></td>
                            <td><?php echo $ListarPersonas->Tbl_persona_CORREO;?></td>
                            <td><?php echo $ListarPersonas->Tbl_cargo_TIPO;?></td>
                            <?php // if ($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR') : ?>
                            <td>
                                <cite title="Editar">
                                    <a class="btn btn-info btn-icon-split" href="<?php echo URL_SISINV;?>Persona/EditarPersona/<?php echo $ListarPersonas->Tbl_persona_ID;?>">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </a>
                                </cite>
                                <cite title="Borrar">
                                    <a class="btn btn-danger btn-icon-split" href="<?php echo URL_SISINV;?>Persona/EliminarPersona/<?php echo $ListarPersonas->Tbl_persona_ID;?>">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </a>
                                </cite>
                            </td>
                            <?php // endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid  -->
<!--MODAL INSERTAR PERSONA -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="AgregarUsuario" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AGREGAR PERSONA</h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo URL_SISINV;?>Persona/RegistrarPersona" autocomplete="off" class="form-neon FormularioAjax" data-form="save" method="POST">
                    <fieldset>
                        <legend>
                            <i class="far fa-address-card"></i>
                            Información personal
                        </legend>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="usuario_tipo_documento">Tipo Documento</label>
                                        <select class="form-control" name="TIPO_DOCUMENTO">
                                            <option value="">--SELECCIONAR--</option>
                                            <?php foreach ($datos['ListarTipoDocumentos'] as $ListarTipoDocumentos) : ?>
                                                <?php if($ListarTipoDocumentos) : ?>
                                                    <option value="<?php echo $ListarTipoDocumentos->Tbl_tipodocumento_ID;?>">
                                                        <?php echo $ListarTipoDocumentos->Tbl_tipodocumento_ABREVIATURA;?>
                                                    </option>
                                                <?php else : ?>
                                                    <option value="0">--NO EXISTEN DATOS--</option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="usuario_documento">Documento</label>
                                        <input class="form-control" id="NUM_DOCUMENTO" name="NUM_DOCUMENTO" pattern="[0-9]{8,20}" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="usuario_nombre">Nombres</label>
                                        <input onkeyup="mayus(this);"class="form-control" id="NOMBRES" name="NOMBRES" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,35}" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="usuario_apellido">Primer Apellido</label>
                                        <input onkeyup="mayus(this);" class="form-control" id="PRIMER_APELLIDO" name="PRIMER_APELLIDO" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,35}" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="usuario_apellido">Segundo Apellido</label>
                                        <input onkeyup="mayus(this);"class="form-control" id="SEGUNDO_APELLIDO" maxlength="35" name="SEGUNDO_APELLIDO" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,35}" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="" style="font-weight: bold;">Fecha de nacimiento</label>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="date" value="<?php echo date(" y-m-d");?>" name="FECHA" id="example-date-input">
                                                    <i class="fa fas-calendar "></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="usuario_telefono">Teléfono</label>
                                        <input class="form-control" id="TELEFONO" name="TELEFONO" pattern="[0-9()+]{6,20}" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="usuario_email">Email</label>
                                        <input class="form-control" id="CORREO" maxlength="70" name="CORREO" required="" type="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <br>
                        <fieldset>
                            <legend>
                                <i class="fas fa-medal"></i>Cargo
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
                                                        <option value="">--SELECCIONAR--</option>
                                                        <?php foreach ($datos['ListarCargos'] as $ListarCargos) : ?>
                                                            <?php if($ListarCargos) : ?>
                                                                <option value="<?php echo $ListarCargos->Tbl_cargo_ID;?>"><?php echo $ListarCargos->Tbl_cargo_TIPO;?></option>
                                                            <?php else : ?>
                                                                <option value="0">--NO EXISTEN DATOS--</option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </br>
                            </br>
                        </fieldset>
                        <div class="modal-footer">
                            <button class="btn btn-light btn-default" type="reset">LIMPIAR</button>
                            <button class="btn btn-secondary btn btn-danger active" data-dismiss="modal" type="button">SALIR</button>
                            <button class="btn btn-raised btn btn-success btn-default" type="submit">GUARDAR</button>
                        </div>
                    </br>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo URL_SISINV;?>MATERIAL_THEME/vendor/jquery/jquery.min.js"></script>
