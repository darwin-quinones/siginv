<?php require_once "../app/views/template.php"; ?>
<!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">SISTEMA DE INVENTARIO</h1>
          <p class="mb-4">En esta seccion puede consultar las Herramientas existentes.</p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-md-11" >
                <br>
                <h6 class="m-0 font-weight-bold text-primary">LISTADO DE HERRAMIENTAS</h6>
                </div>
              <div class="col-md-1">
                <?php if($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR') : ?>
                <cite title="Agregar">
                  <a  class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#AgregarHerramienta">
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
                      <th>FECHA</th>
                      <th>DESCRIPCION</th>
                      <th>BODEGA</th>
                      <th>ESTANTE</th>
                      <th>GAVETA</th>
                      <th>CANTIDAD</th>
                      <th>ACCIONES</th> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php $contador = 1; foreach ($datos['ListarHerramientas'] as $ListarHerramientas): ?>
                    <tr>
                      <td><?php echo $contador++ ?></td>
                      <td><?php echo $ListarHerramientas->Tbl_herramienta_FECHA;?></td>
                      <td><?php echo $ListarHerramientas->Tbl_herramienta_DESCRIPCION ?></td>
                      <td><?php echo $ListarHerramientas->tbl_gaveta_tbl_estante_tbl_bodega_Tbl_bodega_ID . " - "   //$ListarHerramientas->Tbl_bodega_NOMBRE ?></td>
                      <td><?php echo $ListarHerramientas->tbl_gaveta_tbl_estante_Tbl_estante_ID?></td>
                      <td><?php echo $ListarHerramientas->tbl_gaveta_Tbl_gaveta_ID?></td>
                      <td><?php echo $ListarHerramientas->Tbl_herramienta_CANTIDAD ?></td>
                      <?php if ($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR') : ?>
                          <td>
                            <cite title="Editar">
                               <a  class="btn btn-info btn-icon-split" href="<?php echo URL_SISINV;?>Herramienta/EditarHerramienta/<?php echo $ListarHerramientas->Tbl_herramienta_ID;?>">
                                <span class="icon text-white-50">
                                  <i class="fas fa-edit"></i>
                                </span>
                              </a>
                            </cite>
                            <cite title="Borrar">
                              <a  class="btn btn-danger btn-icon-split" href="<?php echo URL_SISINV;?>Herramienta/EliminarHerramienta/<?php echo $ListarHerramientas->Tbl_herramienta_ID;?>">
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
<!-- /.container-fluid  -->
<!-- MODAL INSERTAR HERRAMIENTA -->
<div class="modal fade" id="AgregarHerramienta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">AGREGAR HERRAMIENTAS</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
         <form class="FormularioAjax" data-form="save" action="<?php echo URL_SISINV;?>Herramienta/RegistrarHerramienta" method="POST">
              <div class="row">
                  <div class="position-relative form-group col-md-12">
                      <label class="" style="font-weight: bold;">FECHA DE INGRESO:*</label>
                      <div class="form-group row">
                        <div class="col-10">
                          <input class="form-control" type="date" value="<?php echo date("Y-m-d");?> " name="FECHA_INGRESO" id="example-date-input">
                          <i class="fa fas-calendar "></i>
                        </div>
                      </div>
                      <label class="" style="font-weight: bold;">DESCRIPCION:*</label>
                      <input onkeyup="mayus(this);" class="form-control" name="DESCRIPCION_HERRAMIENTA" placeholder="SEGUETA" type="text" required><br>
                      <label class="" style="font-weight: bold;">BODEGA:*</label>
                      <select class="form-control" id="NUM_BODEGA" name="NUM_BODEGA">
                                                   
                      </select><br>
                      <label class="" style="font-weight: bold;">NUMERO DE ESTANTE:*</label>
                      <select class="form-control" id="NUM_ESTANTE" name="NUM_ESTANTE">
                            
                      </select><br>
                      <label class="" style="font-weight: bold;">NUMERO DE GAVETA:*</label>
                      <select class="form-control" id="NUM_GAVETA" name="NUM_GAVETA">
                                                  
                      </select><br>
                      <label class="" style="font-weight: bold;">CANTIDAD DE HERRAMIENTA:*</label>
                      <input class="form-control" name="CANTIDAD_HERRAMIENTA" placeholder="" type="number" required><br>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo URL_SISINV;?>MATERIAL_THEME/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
$("#NUM_BODEGA").change(function(){
  var IdBodega = $("#NUM_BODEGA").val();
  ListarEstante(IdBodega);
});

$("#NUM_GAVETA").change(function(){
  var IdGaveta = $("#NUM_GAVETA").val();
});

function ListarBodega(){
  $.ajax({
      url: '<?php echo URL_SISINV;?>Ajax/ObtenerBodegas',
      type: 'POST'
  }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena = "";
      if (data.length > 0) {
        for (var i = 0; i < data.length; i++) {
            cadena += "<option value='" + data[i].Tbl_bodega_ID + "'>" + data[i].Tbl_bodega_NOMBRE +"</option>";
        }
        $("#NUM_BODEGA").html(cadena);
        var IdBodega = $("#NUM_BODEGA").val();
        ListarEstante(IdBodega);
      }else {
        cadena = "<option value=''>'NO SE ENCONTRANRON DATOS'</option>";
        $("#NUM_BODEGA").html(cadena);
      }
  })
}
ListarBodega();

function ListarEstante(IdBodega){
  $.ajax({
      url: '<?php echo URL_SISINV;?>Ajax/ObtenerEstante',
      type: 'POST',
      data: {
        IdBodega: IdBodega
      }
  }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena = "";
      if (data.length > 0) {
        for (var i = 0; i < data.length; i++) {
            cadena += "<option value='" + data[i].Tbl_estante_ID + "'>" + data[i].Tbl_estante_NUMERO + " - " +  data[i].Tbl_estante_DESCRIPCION +"</option>";
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

function ListarGaveta(IdEstante){
  $.ajax({
      url: '<?php echo URL_SISINV;?>Ajax/ObtenerGaveta',
      type: 'POST',
      data: {
        IdEstante : IdEstante
      }
  }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena = "";
      if (data.length > 0) {
        for (var i = 0; i < data.length; i++) {
            cadena += "<option value='" + data[i].Tbl_gaveta_ID + "'>" + data[i].Tbl_gaveta_NUMERO +"</option>";
        }
        $("#NUM_GAVETA").html(cadena);
      }else {
        cadena = "<option value=''>'NO SE ENCONTRANRON DATOS'</option>";
        $("#NUM_GAVETA").html(cadena);
      }
  })
}
</script>