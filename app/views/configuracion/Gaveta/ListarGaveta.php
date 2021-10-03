<?php require_once "../app/views/template.php"; ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <h1 class="h3 mb-2 text-gray-800">Listado de Gavetas</h1>
            <p class="mb-4">
               Registre la cantidad de Gavetas que esten asociados a cada uno de los Estantes.
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
                        <h5 class="card-title">REGISTRAR GAVETAS</h5>
                        <label class="" style="font-weight: bold;">
                                        SELECCIONA LA REGIONAL:*
                                    </label>
                        <select class="form-control" name="ID_BODEGA">
                                        <?php foreach ($datos['ListarBodegas'] as $ListarBodegas) : ?>
                                            <?php if($ListarBodegas) : ?>
                                                <option value="<?php echo $ListarBodegas->Tbl_bodega_ID;?>"><?php echo $ListarBodegas->Tbl_bodega_NOMBRE;?></option>
                                            <?php else: ?>
                                                <option value="0">-- SELECCIONA LA REGIONAL--</option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select><br>
                                    <label class="" style="font-weight: bold;">
                                        SELECCIONA LA CENTRO:*
                                    </label> 
                                    <select class="form-control" name="ID_BODEGA">
                                        <?php foreach ($datos['ListarBodegas'] as $ListarBodegas) : ?>
                                            <?php if($ListarBodegas) : ?>
                                                <option value="<?php echo $ListarBodegas->Tbl_bodega_ID;?>"><?php echo $ListarBodegas->Tbl_bodega_NOMBRE;?></option>
                                            <?php else: ?>
                                                <option value="0">-- SELECCIONA LA REGIONAL --</option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select><br>
                                    <label class="" style="font-weight: bold;">
                                        SELECCIONA LA SEDE:*
                                    </label> 
                                    <select class="form-control" name="ID_BODEGA">
                                        <?php foreach ($datos['ListarBodegas'] as $ListarBodegas) : ?>
                                            <?php if($ListarBodegas) : ?>
                                                <option value="<?php echo $ListarBodegas->Tbl_bodega_ID;?>"><?php echo $ListarBodegas->Tbl_bodega_NOMBRE;?></option>
                                            <?php else: ?>
                                                <option value="0">-- SELECCIONA LA REGIONAL --</option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select><br>
                                    <label class="" style="font-weight: bold;">
                                        NOMBRE DE LA AMBIENTE:*
                                    </label>
                                    <select class="form-control" name="ID_BODEGA">
                                        <?php foreach ($datos['ListarBodegas'] as $ListarBodegas) : ?>
                                            <?php if($ListarBodegas) : ?>
                                                <option value="<?php echo $ListarBodegas->Tbl_bodega_ID;?>"><?php echo $ListarBodegas->Tbl_bodega_NOMBRE;?></option>
                                            <?php else: ?>
                                                <option value="0">-- NO SE ENCONTRARON DATOS --</option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select><br>
                                    <label class="" style="font-weight: bold;">
                                        NOMBRE DE LA INTRUTOR:*
                                    </label>
                                    <select class="form-control" name="ID_BODEGA">
                                        <?php foreach ($datos['ListarBodegas'] as $ListarBodegas) : ?>
                                            <?php if($ListarBodegas) : ?>
                                                <option value="<?php echo $ListarBodegas->Tbl_bodega_ID;?>"><?php echo $ListarBodegas->Tbl_bodega_NOMBRE;?></option>
                                            <?php else: ?>
                                                <option value="0">-- NO SE ENCONTRARON DATOS --</option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select><br>
                        <form class="" action="<?php echo URL_SISINV;?>Gaveta/RegistrarGaveta" method="POST">
                            <div class="row">
                                <div class="position-relative form-group col-md-12">
                                    <label class="" style="font-weight: bold;">SELECCIONA LA BODEGA:*</label>
                                    <select class="form-control" name="NUM_BODEGA" id="NUM_BODEGA">
                                       
                                    </select><br>
                                    <label class="" style="font-weight: bold;">SELECCIONA EL ESTANTE:*</label>
                                    <select class="form-control" name="NUM_ESTANTE" id="NUM_ESTANTE">
                                       
                                    </select><br>
                                    <label class="" style="font-weight: bold;">
                                        NUMERO DE GAVETA:*
                                    </label>
                                    <input onkeyup="mayus(this);" class="form-control" name="NUM_GAVETA" placeholder="1-6" type="number" required>
                                    <br>
                                    <button class="mb-2 mr-2 btn btn-primary col-md-12" type="submit" value="REGISTRAR">
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
                                <div class="col-md-11" >
                                <br>
                                    <h6 class="m-0 font-weight-bold">GAVETAS</h6>
                                </div>
                                <div class="col-md-1">
                                    <!-- <cite title="Agregar">
                                        <a  class="btn btn-success btn-icon-split" href="<?php echo URL_SISINV;?>Gaveta/ListarGaveta">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                            </span>
                                        </a>
                                    </cite> -->
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NUMERO REGIONAL</th>
                                    <th>NUMERO CENTRO</th>
                                    <th>NUMERO SEDE</th>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo URL_SISINV;?>MATERIAL_THEME/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
$("#NUM_BODEGA").change(function(){
    var IdBodega = $("#NUM_BODEGA").val();
    ListarEstante(IdBodega);
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
      }else {
        cadena = "<option value=''>'NO SE ENCONTRANRON DATOS'</option>";
        $("#NUM_ESTANTE").html(cadena);
      }
  })
}
</script>
