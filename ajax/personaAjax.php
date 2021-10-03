<?php
    $peticionAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['NUM_DOCUMENTO'])){

        /*--------- Instancia al controlador ---------*/
        require_once "../controllers/Persona.php";
        $ins_usuario = new Persona();

        /*--------- Agregar un usuario ---------*/
        if(isset($_POST['NUM_DOCUMENTO']) && isset($_POST['NOMBRES'])){
            echo $ins_usuario->RegistrarPersona();
        }
    }