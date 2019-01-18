<?php
  session_start();
    session_destroy();
    unset($_SESSION["nombre"]); Elimina una variable a la vez

    header("location: ../inicio.html");

?>
