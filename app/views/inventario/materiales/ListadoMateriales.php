<?php require_once "../app/views/template.php"; ?>
<!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">SISTEMA DE INVENTARIO</h1>
          <p class="mb-4">En esta seccion puede consultar los materiales existentes.</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-md-11" >
                <br>
                <h6 class="m-0 font-weight-bold text-primary">LISTADO DE MATERIALES</h6>
                </div>
              <div class="col-md-1">
                <?php if($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR') : ?>
                <cite title="Agregar">
                  <a  class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#AgregarMateriales">
                   <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                   </span>
                  </a>
                </cite>
              <?php endif; ?>
              </div>
            </div>
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>FECHA INGRESO</th>
                      <th>CODIGO SENA</th>
                      <th>UNSPSC</th>
                      <th>DESCRIPCION</th>
                      <th>PROGRAMA DE FORMACION</th>
                      <th>CANTIDAD</th>
                      <th>TIPO DE MATERIAL</th>
                      <th>UNIDAD DE MEDIDA</th>
                      <th>DESTINO</th>
                      <th>ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $contador = 1; foreach ($datos['ListarMateriales'] as $ListarMateriales): ?>
                    <tr>
                      <td><?php echo $contador++ ?></td>
                      <td><?php echo $ListarMateriales->Tbl_materiales_FECHA;?></td>
                      <td><?php echo $ListarMateriales->Tbl_materiales_CODIGOSENA;?></td>
                      <td><?php echo $ListarMateriales->Tbl_materiales_UNSPSC;?></td>
                      <td><?php echo $ListarMateriales->Tbl_materiales_DESCRIPCION;?></td>
                      <td><?php echo $ListarMateriales->Tbl_materiales_PROGRAMAFORMACION;?></td>
                      <td><?php echo $ListarMateriales->Tbl_materiales_CANTIDAD; ?></td>
                      <td><?php echo $ListarMateriales->Tbl_materiales_TIPOMATERIAL; ?></td>
                      <td><?php echo $ListarMateriales->Tbl_materiales_UNIDADMEDIDA; ?></td>
                      <td><?php echo $ListarMateriales->Tbl_materiales_DESTINO; ?></td>
                      <?php if ($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR') : ?>
                          <td>
                            <cite title="Editar">
                               <a  class="btn btn-info btn-icon-split" href="<?php echo URL_SISINV;?>Materiales/EditarMaterial/<?php echo $ListarMateriales->Tbl_materiales_ID;?>">
                                <span class="icon text-white-50">
                                  <i class="fas fa-edit"></i>
                                </span>
                              </a>
                            </cite>
                            <cite title="Borrar">
                              <a  class="btn btn-danger btn-icon-split" href="<?php echo URL_SISINV;?>Materiales/EliminarMaterial/<?php echo $ListarMateriales->Tbl_materiales_ID;?>">
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
<!-- /.container-fluid MODAL REGISTRAR MATERIALES-->
<div class="modal fade" id="AgregarMateriales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">AGREGAR MATERIALES</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="<?php echo URL_SISINV;?>Materiales/RegistrarMaterial" method="POST">
            <div class="row">
              <div class="position-relative form-group col-md-12">
                <label class="" style="font-weight: bold;">FECHA DE INGRESO:*</label>
                <div class="form-group row">
                  <div class="col-10">
                    <input class="form-control" type="date" value="<?php echo date();?> " name="FECHA_INGRESO" id="example-date-input">
                    <i class="fa fas-calendar "></i>
                  </div>
                </div>
                <label class="" style="font-weight: bold;">CODIGO SENA:*</label>
                <input onkeyup="mayus(this);" class="form-control" name="CODIGO_SENA" placeholder="" type="text" required><br>
                <label class="" style="font-weight: bold;">UNSPSC:*</label>
                <input onkeyup="mayus(this);" class="form-control" name="UNSPSC" placeholder="" type="text" required><br>
                <label class="" style="font-weight: bold;">DESCRIPCION:*</label>
                <input onkeyup="mayus(this);" class="form-control" name="DESCRIPCION" placeholder="" type="text" required><br>
                <label class="" style="font-weight: bold;">PROGRAMA DE FORMACION:*</label>
                <input onkeyup="mayus(this);" class="form-control" name="PROGRAMA_FORMACION" placeholder="" type="text" required><br>
                <label class="" style="font-weight: bold;">CANTIDAD DE MATERIALES:*</label>
                <input onkeyup="mayus(this);" class="form-control" name="CANTIDAD_MATERIALES" placeholder="" type="number" required><br>
                <label class="" style="font-weight: bold;">TIPO DE MATERIALES:*</label>
                <input onkeyup="mayus(this);" class="form-control" name="TIPO_MATERIALES" placeholder="" type="text" required><br>
                <label class="" style="font-weight: bold;">UNIDAD DE MEDIDA:*</label>   
                <input onkeyup="mayus(this);" class="form-control" name="UNIDAD_MEDIDA" placeholder="" type="text" required><br>
                <label class="" style="font-weight: bold;">DESTINO:*</label>
                <input onkeyup="mayus(this);" class="form-control" name="DESTINO" placeholder="" type="text" required><br>
                <button class="mb-2 mr-2 btn btn-primary col-md-12" type="submit" value="REGISTRAR">REGISTRAR</button>
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
