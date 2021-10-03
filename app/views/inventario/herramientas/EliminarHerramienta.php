<?php require_once "../app/views/template.php"; ?>
<!--MODAL ELIMINAR HERRAMIENTA-->
<div class="modal fade" id="EliminarHerramienta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ELIMINAR HERRAMIENTA</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="<?php echo URL_SISINV;?>Herramienta/EliminarHerramienta/<?php echo $datos['idHerramienta']; ?>" method="POST">
            <div class="row">
                <div class="position-relative form-group col-md-12">
                    <label class="" style="font-weight: bold;">FECHA DE INGRESO:*</label>
                      <div class="form-group row">
                        <div class="col-10">
                          <input class="form-control" type="date" value="<?php echo $datos['HerramientaFecha'];?> " name="FECHA_INGRESO" id="example-date-input" disabled>
                          <i class="fa fas-calendar "></i>
                        </div>
                      </div>
                      <label class="" style="font-weight: bold;">DESCRIPCION:*</label>
                      <input onkeyup="mayus(this);" class="form-control" name="DESCRIPCION_HERRAMIENTA" value=" <?php echo $datos['HerramientaDescripcion'] ?> " type="text" disabled><br>
                      <label class="" style="font-weight: bold;">BODEGA:*</label>
                      <select class="form-control" id="NUM_BODEGA" name="NUM_BODEGA" disabled >
                        <option value="<?php echo $datos['NumBodega'];?>"><?php echo $datos['NumBodega'];?> </option> 
                      </select><br>
                      <label class="" style="font-weight: bold;">NUMERO DE ESTANTE:*</label>
                      <select class="form-control" id="NUM_ESTANTE" name="NUM_ESTANTE" disabled>
                        <option value="<?php echo $datos['NumEstante'];?>"><?php echo $datos['NumEstante'];?></option>
                      </select><br>
                      <label class="" style="font-weight: bold;">NUMERO DE GAVETA:*</label>
                      <select class="form-control" id="NUM_GAVETA" name="NUM_GAVETA" disabled>
                        <option value="<?php echo $datos['NumGaveta'];?>"><?php echo $datos['NumGaveta'];?></option>            
                      </select><br>
                      <label class="" style="font-weight: bold;">CANTIDAD DE HERRAMIENTA:*</label>
                      <input class="form-control" name="CANTIDAD_HERRAMIENTA" value="<?php echo $datos['HerramientaCantidad'];?>" type="text" disabled><br>
                      <button class="mb-2 mr-2 btn btn-danger col-md-12" type="submit" value="ELIMINAR">ELIMINAR</button>
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
    $("#EliminarHerramienta").modal("show");
    $("#EliminarHerramienta").on('hidden.bs.modal', function(){
      window.location.replace('<?php echo URL_SISINV;?>Herramienta/ListarHerramienta');
    });
  });
</script>