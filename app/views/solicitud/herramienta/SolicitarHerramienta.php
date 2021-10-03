<?php require_once "../app/views/template.php"; ?>
<div class="container-fluid">
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade active show" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-5">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">CONSULTAR HERRAMIENTA</h5>
                            <form>
                                <div class"">
                                    <select class="selectpicker form-select col-md-12" data-live-search="true" aria-label="Default select example" id="nameTool">
                                        <option value="0">SELECCIONAR...</option>
                                        <?php foreach($datos['ListarHerramientas'] as $ListarHerramientas):?>
                                            <option data-tokens="<?php echo $ListarHerramientas->Tbl_herramienta_DESCRIPCION?>" value="<?php echo $ListarHerramientas->Tbl_herramienta_ID?>"><?php echo $ListarHerramientas->Tbl_herramienta_DESCRIPCION?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">CANTIDAD HERRAMIENTAS</h5>
                            <form>
                                <div class="col-auto">
                                    <input type="number" id="amountTool" class="form-control" aria-describedby="">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">ACCIONES</h5>
                            <form>
                                <button type="button" class="btn btn-success" id="addProduct" >AGREGAR</button>
                                <a href="<?php echo URL_SISINV?>Solicitud/SolicitarHerramientas"><button type="button" class="btn btn-info" style="padding-left:10px" href="">REFRESCAR</button></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">LISTADO DE HERRAMIENTAS A SOLICITAR</h5>
            <form>
                <div class="col-auto col-md-2">
                    <label for="formGroupExampleInput" class="form-label text-lg-start">Codigo Solicitud </label>
                    <input type="text" id="idSolicitud" class="form-control" value="<?php echo $datos['idSolicitud']?>" readonly="readonly">
                </div>
            </form><br>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">HERRAMIENTA</th>
                  <th scope="col">CANTIDAD</th>
                  <th scope="col">ACCION</th>
                </tr>
              </thead>
              <tbody id="tblBody">
                
              </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById("addProduct").onclick = () => { addProduct() };
    
    function addProduct(){
        
        var tool = [];
        var amount = [];
        
        var idRequest = document.getElementById("idSolicitud");
        
        var nameTool = document.getElementById("nameTool");
        var selected = nameTool.options[nameTool.selectedIndex].text;
        var amountTool = document.getElementById("amountTool").value;
        
        var tblBody = document.getElementById("tblBody");
        
        tool.push(selected);
       
        amount.push(amountTool);
        
        for(var i = 0; i < tool.length; i++){
            
            var row = document.createElement("tr");
            var cellItem = document.createElement("td");
            var cellTool = document.createElement("td");
            var cellAmount = document.createElement("td");
            
            var textItem = document.createTextNode(i);
            var textTool = document.createTextNode(tool);
            var textAmount = document.createTextNode(amount);
            
            cellItem.appendChild(textItem);
            cellTool.appendChild(textTool);
            cellAmount.appendChild(textAmount);
            
            row.appendChild(cellItem);
            row.appendChild(cellTool);
            row.appendChild(cellAmount);
            
            
            // agrega la hilera al final de la tabla (al final del elemento tblbody)
            tblBody.appendChild(row);
        }
    }
</script>