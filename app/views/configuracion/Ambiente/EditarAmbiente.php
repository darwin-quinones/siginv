<?php require_once "../app/views/template.php"; ?>
<!-- MODAL EDITAR REGIONAL-->
<div class="modal fade" id="ModelCentro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR AMBIENTE</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <label class="" style="font-weight: bold;">
                                SELECCIONA LA REGIONAL:*
                            </label>
                            <select class="form-control" id="ambienteRegional">
                                <option>--SELECCIONAR--</option>
                                <?php foreach ($datos['ListarRegional'] as $ListarRegional) : ?>
                                    <option value="<?php echo $ListarRegional->tbl_regional_ID ?>"><?php echo $ListarRegional->tbl_regional_NOMBRE ?></option>
                                <?php endforeach; ?>
                            </select> <br>
                            <label class="" style="font-weight: bold;">
                                SELECCIONA EL CENTRO:*
                            </label>
                            <select class="form-control" id="ambienteCentro">
                            </select><br>
                            <label class="" style="font-weight: bold;">
                                SELECCIONA EL SEDE:*
                            </label>
                            <select class="form-control" id="ambienteSede">

                            </select>
                            <div class="form-group">
                                <label>Nombre Ambiente:</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control" value="<?php echo $datos['ambienteNombre'] ?>" id="ambienteNombre"><br>

                                <input onkeyup="mayus(this);" type="hidden" class="form-control" value="<?php echo $datos['idAmbiente'] ?>" id="idAmbiente"><br>
                            </div>
                            <label>Responsable:</label>
                            <select class="form-control" id="ambienteInstructor">

                            </select>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-info btn-round col-md-12" type="button" id="EditarAmbiente">ACTUALIZAR</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URL_SISINV ?>MATERIAL_THEME/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL_SISINV ?>js/alerts.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#ModelCentro").modal("show");
        $("#ModelCentro").on('hidden.bs.modal', function() {
            window.location.replace('<?php echo URL_SISINV ?>Ambiente/ListarAmbiente');
        });



        document.getElementById('EditarAmbiente').addEventListener('click', function() {
            EditarAmbiente()
        });

        /*Cambiar regional */
        $('#ambienteRegional').change(function() {
            var regionalID = $('#ambienteRegional').val();
            LoadCentros(regionalID)
        });

        function LoadCentros(regionalID) {
            $.ajax({
                url: '<?php echo URL_SISINV ?>Ambiente/LoadCentros',
                type: 'POST',
                data: {
                    regionalID: regionalID
                }
            }).done(function(response) {
                var data = JSON.parse(response);
                var cadena = "";
                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        cadena += "<option id='ambienteCentro' value='" + data[i].tbl_centro_ID + "'>" + data[i].tbl_centro_NOMBRE + "</option>"
                    }
                    $('#ambienteCentro').html(cadena);
                    var centroID = $('#ambienteCentro').val();
                    LoadSedes(centroID);
                } else {
                    cadena = "<option value='0'>NO SE ENCONTRARON DATOS </option>";
                    $('#ambienteCentro').html(cadena);
                    var centroID = $('#ambienteCentro').val();
                    LoadSedes(centroID);
                }
            })
        }
        $('#ambienteCentro').change(function() {
            var centroID = $('#ambienteCentro').val();
            LoadSedes(centroID);
        })

        function LoadSedes(centroID) {
            $.ajax({
                url: '<?php echo URL_SISINV ?>Ambiente/LoadSedes',
                type: 'POST',
                data: {
                    centroID: centroID
                },
            }).done(function(resp) {
                var data = JSON.parse(resp)
                var cadena = "";
                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        cadena += "<option id='ambienteSede' value='" + data[i].tbl_sede_ID + "'>" + data[i].tbl_sede_NOMBRE + "</option>";
                    }
                    var centroID = $('#ambienteCentro').val()
                    if (centroID == 0) {
                        $('#ambienteSede').html('');
                    }
                    $('#ambienteSede').html(cadena);
                    var sedeID = $('#ambienteSede').val();
                    LoadInstructores(sedeID);

                } else {
                    cadena = "<option id='ambienteSede' value='0'>NO SE ENCONTRARON DATOS</option>";
                    $('#ambienteSede').html(cadena); // <- significa poner los datos dentro del input
                    var sedeID = $('#ambienteSede').val();
                    LoadInstructores(sedeID);
                }
            })
        }
        // load instructor
        $('#ambienteSede').change(function() {
            var sedeID = $('#ambienteSede').val();
            LoadInstructores(sedeID);
        })

        function LoadInstructores(sedeID) {
            $.ajax({
                url: '<?php echo URL_SISINV ?>Ambiente/LoadInstructores',
                type: 'POST',
                data: {
                    sedeID: sedeID
                }
            }).done(function(response) {
                var data = JSON.parse(response);
                var cadena = "";
                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        cadena += ("<option data-tokens='" + data[i].tbl_instructor_NOMBRES + "'  value='" + data[i].tbl_instructor_ID + "'>" + data[i].tbl_instructor_NOMBRES + "</option>");
                    }
                    $('#ambienteInstructor').html(cadena);
                } else {
                    cadena = "<option id='ambienteSede' value='0'>NO SE ENCONTRARON DATOS</option>";
                    $('#ambienteInstructor').html(cadena);
                }
            })
        }

        //edit ambiente
        function EditarAmbiente() {
            var idAmbiente = $('#idAmbiente').val();
            var ambienteRegional = $('#ambienteRegional').val();
            var ambienteCentro = $('#ambienteCentro').val();
            var ambienteSede = $('#ambienteSede').val();
            var ambienteNombre = $('#ambienteNombre').val();
            var ambienteInstructor = $('#ambienteInstructor').val();
            var AmbientesExists = false;
            alert(idAmbiente + ambienteRegional + ambienteCentro + ambienteSede + ambienteNombre + ambienteInstructor)

            $.ajax({
                url: '<?php echo URL_SISINV ?>Ambiente/EditarAmbiente',
                type: 'POST',
                data: {
                    idAmbiente: idAmbiente,
                    ambienteNombre: ambienteNombre,
                    ambienteInstructor: ambienteInstructor,
                    ambienteRegional: ambienteRegional,
                    ambienteCentro: ambienteCentro,
                    ambienteSede: ambienteSede
                }
            }).done(function() {
                Edit()
                setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Ambiente/ListarAmbiente';
                }, 2000);

            }).fail(function() {
                ErrorEdit()
                setTimeout(function() {
                    window.location.href = '<?php echo URL_SISINV ?>Ambiente/ListarAmbiente';
                }, 2000);

            })


            if (ambienteNombre == "" || ambienteInstructor == "" || ambienteCentro == 0 || ambienteSede == "" || ambienteSede == 0 || ambienteRegional == "--SELECCIONAR--") {
                FillData()
            } else { // compare ambiente 
                $.ajax({
                    url: '<?php echo URL_SISINV ?>Ambiente/CompararAmbiente',
                    type: 'POST',
                    data: {
                        ambienteNombre: ambienteNombre
                    }
                }).done(function(response) {
                    var data = JSON.parse(response);
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].tbl_amb_NOMBRE == ambienteNombre && data[i].tbl_sede_tbl_sede_ID == ambienteSede) {
                            /*if(data[i].tbl_amb_RESPONSABLE != ambienteResponsable && data[i].tbl_amb_NOMBRE == ambienteNombre){
                                AmbientesExists = false;
                                break;
                            }*/
                           /*  Existe(); */
                            AmbientesExists = true;
                            break;
                        }
                    }

                    // if never found any reginal it pass to register it



                })

            }
        }
    })
</script>