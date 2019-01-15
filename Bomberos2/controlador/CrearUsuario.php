<?php
if(isset($_POST["btnAceptar"])){//if usuario presiona boton
    //rescatar datos
    $nombreUsuario = $_REQUEST["txtnombre"];
    $passUsuario = $_REQUEST["txtpass"];
    //Construir un objeto con esos datos
    require_once("../model/Tbl_Usuario.php");
    require_once("../model/Data.php");

    $usuario = new Tbl_Usuario();
    //"seteo" los datos
    $usuario->setNombreUsuario($nombreUsuario);
    $usuario->setPassUsuario($passUsuario);

    $data = new Data();
    $data->crearUsuario($usuario);
    echo "Hola";
    echo "Consola";

    echo "nombre:".$nombreUsuario;
    echo "Pass:".$passUsuario;

}


 ?>
