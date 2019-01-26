<?php

$data = isset($_REQUEST['myData'])?$_REQUEST['myData']:"";
session_start();
$_SESSION["info"]=$data;



?>
