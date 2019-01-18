<?php
if (isset($_POST['btnIniciarSesion'])) {
    require_once("../model/Conexion.php");
    require_once("../model/Data.php");

    $nombre = $_REQUEST["txtNombre"];
    $contrasenia = $_REQUEST["txtpass"];

    $d = new Data();

    $usuario = $d->getUsuario($nombre,$contrasenia);


      if ($usario == null) {

         header("location: ../inicio.html");

    } else {

      session_start();
      $_SESSION["usuario"] = serialize($usuario);

     header("location: ../Mantenedor.php");

    }
//  header("location: ../initSesion.php?mensaje=2");

}
?>
