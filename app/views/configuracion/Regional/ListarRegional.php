<?php require_once "../app/views/template.php"; ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <h1 class="h3 mb-2 text-gray-800">Listado de Regional</h1>
            <p class="mb-4">
                Registre la cantidad de Regional que esten asociados a los estantes.
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
                        <h5 class="card-title">REGISTRAR REGIONAL</h5>
                        <form class="" method="POST">
                            <div class="row">
                                <div class="position-relative form-group col-md-12">
                                    <label class="" style="font-weight: bold;">
                                        NOMBRE DE LA REGIONAL:*
                                    </label>

                                    <input onkeyup="mayus(this);" class="form-control" placeholder="SERVICIOS GENERALES" type="text" id="nombreRegional">
                                    <p class="text-muted"><i> Los campos con * son obligatorios</i></p>
                                    <button class="mb-2 mr-2 btn btn-primary col-md-12"  value="REGISTRAR" id="RegistrarRegional">
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
                            <div class="col-md-11"><br>
                                <h6 class="m-0 font-weight-bold">REGIONAL</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE DE LA REGIONAL</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $contador = 1;
                                foreach ($datos['ListarRegional'] as $ListarRegional) : ?>
                                    <tr>
                                        <th scope="row" id="idRegional" value="<?php echo $ListarRegional->tbl_regional_ID; ?>"><?php echo $contador++; ?></th>
                                        <td id="nombreRegional"><?php echo $ListarRegional->tbl_regional_NOMBRE; ?></td>
                                        <?php // if ($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR') : 
                                        ?>
                                        <td>
                                            <cite title="Editar">
                                                <a class="btn btn-info btn-icon-split" id="EditarRegional" href="<?php echo URL_SISINV ?>Regional/ObtenerRegional/<?php echo $ListarRegional->tbl_regional_ID; ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                            </cite>
                                            <cite title="Borrar">
                                                <a type="button" class="eliminarRegional btn btn-primary" id="EliminarRegional" href="<?php echo URL_SISINV ?>Regional/EliminarRegional/<?php echo $ListarRegional->tbl_regional_ID; ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </a>
                                            </cite>
                                        </td>
                                        <?php // endif; 
                                        ?>
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

<script src="<?php echo URL_SISINV ?>MATERIAL_THEME/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL_SISINV ?>js/alerts.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        document.getElementById("RegistrarRegional").addEventListener('click', function() {
            RegistrarRegional();
        });

        function RegistrarRegional() {
            var Regional = $('#nombreRegional').val();
            if (Regional == "") {
                FillData();
            }else{
                $.ajax({
                    url: '<?php echo URL_SISINV ?>Regional/CompareRegional',
                    type: 'POST',
                    data: {regional : Regional}
                }).done(function(resp) {
                    var data = JSON.parse(resp);
                    if(data['tbl_regional_NOMBRE'] == Regional) {
                        Existe();
                    }else{
                        $.ajax({
                            url: '<?php echo URL_SISINV ?>Regional/RegistrarRegional',
                            type: 'POST',
                            data: {
                                Regional: Regional
                            }
                        }).done(function() {
                            Success()
                            // function de tiempo
                            setTimeout(function() {
                                window.location.href = '<?php echo URL_SISINV ?>Regional/ListarRegional';
                            }, 2000);
                        }).fail(function() {
                            error()
                            // function de tiempo
                            setTimeout(function() {
                                window.location.href = '<?php echo URL_SISINV ?>Regional/ListarRegional';
                            }, 2000);
                        })
                    }
                })
            }
        }
    });
</script>