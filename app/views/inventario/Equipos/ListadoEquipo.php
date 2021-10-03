<?php require_once "../app/views/template.php"; ?>
<!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">SISTEMA DE INVENTARIO</h1>
          <p class="mb-4">En esta seccion puede consultar los equipos existentes.</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-md-11" >
                <br>
                <h6 class="m-0 font-weight-bold text-primary">LISTADO DE EQUIPOS</h6>
                </div>
              <div class="col-md-1">
                <cite title="Agregar">
                  <a  class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#AgregarEquipos">
                   <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                   </span>
                  </a>
                </cite>
              </div>
            </div>
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>MODELO</th>
                      <th>CONSECUTIVO</th>
                      <th>DESCRIPCION</th>
                      <th>DESCRIPCION ACTUAL</th>
                      <th>TIPO</th>
                      <th>PLACA</th>
                      <th>SERIAL</th>
                      <th>FECHA DE ADQUISICION</th> 
                      <th>VALOR DE INGRESO</th>
                      <th>ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $contador = 1; foreach ($datos['ListarEquipos'] as $ListarEquipos): ?>
                    <tr>
                      <td><?php echo $contador++ ?></td>
                      <td><?php echo $ListarEquipos->Tbl_equipo_MODELO?></td>
                      <td><?php echo $ListarEquipos->Tbl_equipo_CONSECUTIVO?></td>
                      <td><?php echo $ListarEquipos->Tbl_equipo_DESCRIPCION?></td>
                      <td><?php echo $ListarEquipos->Tbl_equipo_DESCRIPCION_ACTUAL?></td>
                      <td><?php echo $ListarEquipos->Tbl_equipo_TIPO?></td>
                      <td><?php echo $ListarEquipos->Tbl_equipo_PLACA?></td>
                      <td><?php echo $ListarEquipos->Tbl_equipo_SERIAL?></td>
                      <td><?php echo $ListarEquipos->Tbl_equipo_FECHA_ADQUISICION?></td>
                      <td><?php echo $ListarEquipos->Tbl_equipo_VALOR_INGRESO?></td>
                      <?php // if ($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR') : ?>
                          <td>
                          <cite title="Editar">
                               <a  class="btn btn-info btn-icon-split" href="<?php echo URL_SISINV;?>Equipo/EditarEquipo/<?php echo $ListarEquipos->Tbl_equipo_ID;?>">
                                <span class="icon text-white-50">
                                  <i class="fas fa-edit"></i>
                                </span>
                              </a>
                            </cite>
                            <cite title="Borrar">
                              <a  class="btn btn-danger btn-icon-split" href="<?php echo URL_SISINV;?>Equipo/EliminarEquipo/<?php echo $ListarEquipos->Tbl_equipo_ID;?>">
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
<!-- /.container-fluid -->
<div class="modal fade" id="AgregarEquipos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">AGREGAR EQUIPOS</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
         <form class="" action="<?php echo URL_SISINV;?>equipo/RegistrarEquipo" method="POST">
              <div class="row">
                  <div class="position-relative form-group col-md-12">

                      <label class="" style="font-weight: bold;">
                          MODELO:*
                      </label>
                      <input onkeyup="mayus(this);" class="form-control" name="MODELO" placeholder="" type="text" required><br>
                      <label class="" style="font-weight: bold;">
                          CONSECUTIVO:*
                      </label>
                      <input onkeyup="mayus(this);" class="form-control" name="CONSECUTIVO" placeholder="" type="text" required><br>
                      <label class="" style="font-weight: bold;">
                          DESCRIPCION:*
                      </label>
                      <input onkeyup="mayus(this);" class="form-control" name="DESCRIPCION" placeholder="" type="text" required><br>
                      <label class="" style="font-weight: bold;">
                          DESCRIPCION ACTUAL:*
                      </label>
                      <input onkeyup="mayus(this);" class="form-control" name="DESCRIPCION ACTUAL" placeholder="" type="text" required><br>
                      <label class="" style="font-weight: bold;">
                          TIPO:*
                      </label>
                      <input onkeyup="mayus(this);" class="form-control" name="TIPO" placeholder="" type="text" required><br>
                      <label class="" style="font-weight: bold;">
                          PLACA:*
                      </label>
                      <input onkeyup="mayus(this);" class="form-control" name="PLACA" placeholder="" type="text" required><br>
                      <label class="" style="font-weight: bold;">
                          SERIAL:*
                      </label>
                      <input onkeyup="mayus(this);" class="form-control" name="SERIAL" placeholder="" type="text" required><br>
                      <label class="" style="font-weight: bold;">FECHA DE ADQUISICION:*</label>
                      <div class="form-group row">
                        <div class="col-10">
                          <input class="form-control" type="date" value="2011-08-19" name="FECHA_INGRESO" id="example-date-input">
                          <i class="fa fas-calendar "></i>
                        </div>
                      </div>
                      <label class="" style="font-weight: bold;">
                          VALOR DE INGRESO:*
                      </label>
                      <input class="form-control" name="VALOR_INGRESO" placeholder="" type="text" required><br>

                    <button class="mb-2 mr-2 btn btn-primary col-md-12" type="submit" value="REGISTRAR">
                      REGISTRAR
                  </button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo URL_SISINV;?>MATERIAL_THEME/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
$("#NUM_ESTANTE").change(function(){
    var IdEstante = $("#NUM_ESTANTE").val();
    ListarGaveta(IdEstante);
});

function ListarEstante(){
  $.ajax({
      url: '<?php echo URL_SISINV;?>Ajax/ObtenerEstantes',
      type: 'POST'
  }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena = "";
      if (data.length > 0) {
        for (var i = 0; i < data.length; i++) {
            cadena += "<option value='" + data[i].Tbl_estante_ID + "'>" + data[i].Tbl_estante_NUMERO + "</option>";
        }
        $("#NUM_ESTANTE").html(cadena);
        var IdEstante = $("#NUM_ESTANTE").val();
         ListarGaveta(IdEstante);
      }else {
        cadena = "<option value=''>'NO SE ENCONTRANRON DATOS'</option>";
        $("#NUM_ESTANTE").html(cadena);
      }
  })
}
ListarEstante();

</script>