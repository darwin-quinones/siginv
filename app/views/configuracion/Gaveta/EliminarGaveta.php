<?php require_once "../app/views/template.php"; ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <h1 class="h3 mb-2 text-danger">Eliminar Gavetas</h1>
            <p class="mb-4">
               Elimine la cantidad de Gavetas que esten asociados a cada uno de los Estantes.
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
                        <h5 class="card-title">ELIMINAR GAVETA</h5>
                        <form class="" action="<?php echo URL_SISINV;?>Gaveta/EliminarGaveta/<?php echo $datos['idGaveta'];?>" method="POST">
                            <div class="row">
                                <div class="position-relative form-group col-md-12">
                                    <label class="" style="font-weight: bold;">SELECCIONA LA BODEGA:*</label>
                                    <select class="form-control" name="NUM_BODEGA" id="NUM_BODEGA" disabled>
                                       <option value="<?php echo $datos['idBodega'];?>"><?php echo $datos['idBodega'];?></option>
                                    </select><br>
                                    <label class="" style="font-weight: bold;">SELECCIONA EL ESTANTE:*</label>
                                    <select class="form-control" name="NUM_ESTANTE" id="NUM_ESTANTE" disabled>
                                       <option value="<?php echo $datos['numEstante'];?>"><?php echo $datos['numEstante'];?></option>
                                    </select><br>
                                    <label class="" style="font-weight: bold;">
                                        NUMERO DE GAVETA:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" name="NUM_GAVETA" value="<?php echo $datos['numGaveta'];?>" type="number" disabled>
                                    <br>
                                    <button class="mb-2 mr-2 btn btn-danger col-md-12" type="submit" value="ELIMINAR">
                                        ELIMINAR
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
                                    <h6 class="m-0 font-weight-bold">GAVETA</h6>
                                </div>
                                <div class="col-md-1">
                                    <cite title="Agregar">
                                        <a  class="btn btn-success btn-icon-split" href="<?php echo URL_SISINV;?>Gaveta/ListarGaveta">
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
                                    <th>NUMERO BODEGA</th>
                                    <th>NUMERO DE ESTANTE</th>
                                    <th>NUMERO DE GAVETA</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $contador = 1;  foreach($datos['ListarGavetas'] as $ListarGavetas) : ?>
                                <tr>
                                    <th scope="row"> <?php echo $contador ++; ?></th>
                                    <td id="estanteBodega"> <?php echo $ListarGavetas->tbl_estante_tbl_bodega_Tbl_bodega_ID . " - " . $ListarGavetas->Tbl_bodega_NOMBRE ;?></td>
                                    <td id="estanteNumero"><?php echo $ListarGavetas->Tbl_estante_NUMERO . " - " . $ListarGavetas->Tbl_estante_DESCRIPCION;?></td>
                                    <td id="estanteDescripcion"><?php echo $ListarGavetas->Tbl_gaveta_NUMERO;?></td>
                                    <?php // if ($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR') : ?>
                                    <td>
                                        <cite title="Editar">
                                        <a  class="btn btn-info btn-icon-split" href="<?php echo URL_SISINV;?>Gaveta/EditarGaveta/<?php echo $ListarGavetas->Tbl_gaveta_ID;?>">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        </cite>
                                        <cite title="Eliminar">
                                        <a href="<?php echo URL_SISINV;?>Gaveta/EliminarGaveta/<?php echo $ListarGavetas->Tbl_gaveta_ID;?>" class="btn btn-danger btn-icon-split">
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

