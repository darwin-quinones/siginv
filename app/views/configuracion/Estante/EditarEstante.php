<?php require_once "../app/views/template.php"; ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <h1 class="h3 mb-2 text-info">Listado de Estantes</h1>
            <p class="mb-4">
               Registre la cantidad de estantes que esten asociados a la herramenteria.
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
                        <h5 class="card-title">ACTUALIZAR ESTANTE</h5>
                        <form class="" action="<?php echo URL_SISINV;?>Estante/EditarEstante/<?php echo $datos['idEstante']; ?>" method="POST">
                            <div class="row">
                                <div class="position-relative form-group col-md-12">
                                    <label class="" style="font-weight: bold;">
                                        SELECCIONA LA BODEGA:*
                                    </label>
                                    <select class="form-control" name="NUM_BODEGA">
                                        <option>--SELECCIONE UNA BODEGA--</option>
                                        <?php foreach ($datos['ListarEstantes'] as $ListarEstantes) : ?>
                                            <?php if($ListarEstantes) : ?>
                                                <option value="<?php echo $ListarEstantes->Tbl_bodega_ID;?>"><?php echo $ListarEstantes->Tbl_bodega_NOMBRE;?></option>
                                            <?php else: ?>
                                                <option value="0">-- NO SE ENCONTRARON DATOS --</option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select><br>
                                    <label class="" style="font-weight: bold;">
                                        NUMERO DE ESTANTE:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" name="NUM_ESTANTE" type="number" value="<?php echo $datos['numEstante'];?>" required>
                                    <label class="" style="font-weight: bold;">
                                        DESCRIPCION:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" name="DESCRIPCION" type="text"  value="<?php echo $datos['descripcionEstante'];?>" required>
                                    <p class="text-muted"><i> Los campos con * son obligatorios</i></p>
                                    <button class="mb-2 mr-2 btn btn-info col-md-12" type="submit" value="ACTUALIZAR">
                                        ACTUALIZAR
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
                                <div class="col-md-11" >
                                    <h6 class="m-0 font-weight-bold">ESTANTES</h6>
                                </div>
                                <div class="col-md-1">
                                    <cite title="Agregar">
                                        <a  class="btn btn-success btn-icon-split" href="<?php echo URL_SISINV;?>Estante/ListarEstante">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                            </span>
                                        </a>
                                    </cite>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>BODEGA</th>
                                    <th>NUMERO DE ESTANTE</th>
                                    <th>DESCRIPCION</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $contador = 1;  foreach($datos['ListarEstantes'] as $ListarEstantes) : ?>
                                <tr>
                                    <th scope="row"><?php echo $contador ++;?></th>
                                    <td id="estanteBodega"><?php echo $ListarEstantes->Tbl_bodega_NOMBRE;?></td>
                                    <td id="estanteNumero"><?php echo $ListarEstantes->Tbl_estante_NUMERO;?></td>
                                    <td id="estanteDescripcion"><?php echo $ListarEstantes->Tbl_estante_DESCRIPCION;?></td>
                                    <?php // if ($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR') : ?>
                                    <td>
                                        <cite title="Editar">
                                        <a  class="btn btn-info btn-icon-split" href="<?php echo URL_SISINV;?>Estante/EditarEstante/<?php echo $ListarEstantes->Tbl_estante_ID;?>">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        </cite>
                                        <cite title="Borrar">
                                        <a href="<?php echo URL_SISINV;?>Estante/EliminarEstante/<?php echo $ListarEstantes->Tbl_estante_ID;?>" class="btn btn-danger btn-icon-split">
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
    </div>
</div>
