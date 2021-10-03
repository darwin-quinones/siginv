<?php require_once "../app/views/template.php"; ?>
<!--MODAL ELIMINAR EQUIPO-->
<div class="modal fade" id="EliminarEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ELIMINAR EQUIPOS</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="<?php echo URL_SISINV;?>Equipo/EliminarEquipo/<?php echo $datos['idEquipo'];?>" method="POST">
            <div class="row">
                <div class="position-relative form-group col-md-12">
                    
                      <label class="" style="font-weight: bold;">MODELO:*</label>
                      <input onkeyup="mayus(this);" class="form-control" name="MODELO" value=" <?php echo $datos['EquipoModelo'] ?> " type="text" disabled><br>

                      <label class="" style="font-weight: bold;">CONSECUTIVO:*</label>
                      <input onkeyup="mayus(this);" class="form-control" name="CONSECUTIVO" value=" <?php echo $datos['EquipoConsecutivo'] ?> " type="text" disabled><br>

                      <label class="" style="font-weight: bold;">DESCRIPCION:*</label>
                      <input onkeyup="mayus(this);" class="form-control" name="DESCRIPCION" value=" <?php echo $datos['EquipoDescripcion'] ?> " type="text" disabled><br>

                      <label class="" style="font-weight: bold;">DESCRIPCION ACTUAL:*</label>
                      <input onkeyup="mayus(this);" class="form-control" name="DESCRIPCION_ACTUAL" value=" <?php echo $datos['EquipoDescripcionActual'] ?> " type="text" disabled><br>

                      <label class="" style="font-weight: bold;">TIPO:*</label>
                      <input onkeyup="mayus(this);" class="form-control" name="TIPO" value=" <?php echo $datos['EquipoTipo'] ?> " type="text" disabled><br>

                      <label class="" style="font-weight: bold;">PLACA:*</label>
                      <input onkeyup="mayus(this);" class="form-control" name="PLACA" value=" <?php echo $datos['EquipoPlaca'] ?> " type="text" disabled><br>

                      <label class="" style="font-weight: bold;">SERIAL:*</label>
                      <input onkeyup="mayus(this);" class="form-control" name="SERIAL" value=" <?php echo $datos['EquipoSerial'] ?> " type="text" disabled><br>

                      <label class="" style="font-weight: bold;">FECHA DE ADQUISICION:*</label>
                      <div class="form-group row">
                        <div class="col-10">
                          <input class="form-control" type="text" value="<?php echo $datos['EquipoFechaIngreso'];?> " name="FECHA_INGRESO" id="example-date-input" disabled>
                          <i class="fa fas-calendar "></i>
                        </div>
                      </div>
                      <label class="" style="font-weight: bold;">VALOR DE INGRESO:*</label>
                      <input onkeyup="mayus(this);" class="form-control" name="VALOR_INGRESO" value=" <?php echo $datos['EquipoValorIngreso'] ?> " type="text" disabled><br>
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
    $("#EliminarEquipo").modal("show");
  });
</script>