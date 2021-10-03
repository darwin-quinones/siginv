<?php require_once "../app/views/template.php"; ?>
<!-- /.container-fluid MODAL EDITAR MATERIALES-->
<div class="modal fade" id="EditarMaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">EDITAR MATERIALES</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="<?php echo URL_SISINV;?>Materiales/EditarMaterial/<?php echo $datos['idMaterial'];?>" method="POST">
            <div class="row">
              <div class="position-relative form-group col-md-12">
                <label class="" style="font-weight: bold;">FECHA DE INGRESO:*</label>
                <div class="form-group row">
                  <div class="col-10">
                    <input class="form-control" type="date" value="<?php echo $datos['MaterialFecha'];?> " name="FECHA_INGRESO" id="example-date-input">
                    <i class="fa fas-calendar "></i>
                  </div>
                </div>
                <label class="" style="font-weight: bold;">CODIGO SENA:*</label>
                <input onkeyup="mayus(this);" class="form-control" name="CODIGO_SENA" value="<?php echo $datos['MaterialCodigoSena'];?>" type="text" required><br>
                <label class="" style="font-weight: bold;">UNSPSC:*</label>
                <input onkeyup="mayus(this);" class="form-control" name="UNSPSC" value="<?php echo $datos['MaterialUnspsc'];?>" type="text" required><br>
                <label class="" style="font-weight: bold;">DESCRIPCION:*</label>
                <input onkeyup="mayus(this);" class="form-control" name="DESCRIPCION" value="<?php echo $datos['MaterialDescripcion'];?>" type="text" required><br>
                <label class="" style="font-weight: bold;">PROGRAMA DE FORMACION:*</label>
                <input onkeyup="mayus(this);" class="form-control" name="PROGRAMA_FORMACION" value="<?php echo $datos['MaterialProgramaFormacion'];?>" type="text" required><br>
                <label class="" style="font-weight: bold;">CANTIDAD DE MATERIALES:*</label>
                <input onkeyup="mayus(this);" class="form-control" name="CANTIDAD_MATERIALES" value="<?php echo $datos['MaterialCantidad'];?>" type="number" required><br>
                <label class="" style="font-weight: bold;">TIPO DE MATERIALES:*</label>
                <input onkeyup="mayus(this);" class="form-control" name="TIPO_MATERIALES" value="<?php echo $datos['MaterialTipoMaterial'];?>" type="text" required><br>
                <label class="" style="font-weight: bold;">UNIDAD DE MEDIDA:*</label>   
                <input onkeyup="mayus(this);" class="form-control" name="UNIDAD_MEDIDA" value="<?php echo $datos['MaterialUnidadMedida'];?>" type="text" required><br>
                <label class="" style="font-weight: bold;">DESTINO:*</label>
                <input onkeyup="mayus(this);" class="form-control" name="DESTINO" value="<?php echo $datos['MaterialDestino'];?>" type="text" required><br>
                <button class="mb-2 mr-2 btn btn-info col-md-12" type="submit" value="ACTUALIZAR">ACTUALIZAR</button>
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
<script>
  $(document).ready(function(){
    $("#EditarMaterial").modal("show");
    $("#EditarMaterial").on('hidden.bs.modal', function(){
      window.location.replace('<?php echo URL_SISINV;?>Materiales/ListarMateriales');
    });
  });
</script>