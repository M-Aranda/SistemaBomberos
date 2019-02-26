<!DOCTYPE html>
<?php
    // unir vista con el modelo sin pasar por un controlador
    require_once("model/Data.php");
    $data = new Data();
    session_start();
    if(isset($_SESSION["resultadosDeBusquedaDeBomberos"])){
      unset($_SESSION["resultadosDeBusquedaDeBomberos"]);
    }
    if(isset($_SESSION["resultadosDeBusquedaDeUnidad"])){
      unset($_SESSION["resultadosDeBusquedaDeUnidad"]);
    }
    if(isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])){
      unset($_SESSION["resultadosDeBusquedaDeMaterialMenor"]);
    }


    if(isset($_SESSION["idDeServicioCreado"])){
      $idServicioCreado=$_SESSION["idDeServicioCreado"];
    }



?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mantenedor</title>


    <link rel ="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
   <script src="js/bootstrap.js"></script>

   <script src="javascript/JQuery.js"></script>
   <script type="text/javascript" src="javascript/sweetAlertMin.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

  </head>


<body  background="images/fondofichaintranet.jpg">

    <br>
    <nav class="navbar navbar-default nav-stacked  navbar-pills responsive" role="navigation" >
      <div class="jumbotron">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="Mantenedor.php" class="navbar-brand" href="#">Sistema Bomberos</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bomberos <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="CrearFicha.php">Crear</a></li>
              <li><a href="buscarBombero.php">Buscar</a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Unidades <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="crearUnidades.php">Crear</a></li>
              <li><a href="buscarUnidades.php">Buscar Unidades</a></li>
              <li><a href="reporteUnidad.php">Reporte</a></li>
              <li><a href="bitacoraUnidad.php">Bitacora</a></li>
              <li><a href="buscarBitacora.php">Buscar Bitacora</a></li>

            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventario <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="crearInventario.php">Crear</a></li>
              <li><a href="buscarInventario.php">Buscar </a></li>
              <li><a href="reporteInventario.php">Reporte </a></li>


            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Despacho <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="centraldeAlarma.php">Central de Alarma</a></li>

            </ul>
          </li>
        </ul>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <button class="btn btn-default" style="width: 150px;" style="margin-top: 400px"> <a href="crearUsuario.php" style="text-decoration:none;color:black;">Crear Usuario</a> </button>
        <br>
        <br>
        <button class="btn btn-danger" style="width: 150px;" style="margin-top: 400px"> <a href="controlador/CerrarSesion.php" style="text-decoration:none;color:black;">Cerrar Sesion</a> </button>


      </div><!-- /.navbar-collapse -->
    </div>
    </nav>

  <div class = "cuerpo" style="
    margin-left: 20%;
    float: left;
    width: 75%;
    padding-left: 5%;
    padding-top: -100%;
    margin-top: -850px;
    margin-bottom: -1000px;
    width: 1000px;
    height: 800px;
    ">

<style>
#transparencia{
    opacity: .75;
    -moz-opacity: .75;
    filter: alpha(opacity=75);
}

#cuadro1{
  width: 800px;
  height: 385px;
  margin-top: 20px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 70px 70px 70px 70px;

}

#cuadro2{
  width: 800px;
  height: 385px;
  margin-top: 20px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 70px 70px 70px 70px;

}
#cuadro3{
  width: 800px;
  height: 434px;
  margin-top: 5px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 70px 70px 70px 70px;
}
#jum{
    width: 900px;
    height: 1000px;
    margin-bottom: 100px;
}
</style>


<?php
    // unir vista con el modelo sin pasar por un controlador
    require_once("model/Data.php");
    $data = new Data();
?>
<div style="width: 900px" style="height: 1000px" style="margin-top: -100px" id="jum">
    <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
        <center style="font-weight:bold;font-size:20px;">Central de Despacho</center>
      <div class="container">

        <div id="cuadro1" style="height: 194px;">
            <div class="jumbotron"  style="height: 190px;border-radius: 70px 70px 70px 70px;">
              <div class="container" style="height: 190px;">
              <div class="form-group" style="margin-left:50px;Margin-top:-7px;">

              Despacho:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input value="<?php echo utf8_encode($data->getTipoDeServicioYSectorDeServicio($idServicioCreado)->getServicio());
             echo "  "; echo utf8_encode($data->getTipoDeServicioYSectorDeServicio($idServicioCreado)->getSector()); echo " "; ?>" type="text" name="txtDespacho" disabled style="width:400px">
              <button type="submit"  id="btn_despachar" name="btnsonido" style="width:50px;height:50px;">
                <img src="images/torre.png" alt="x" /></button>
            <br><br>
              En Despacho:&nbsp;
              <select name="cboxdespacho" style="width:400px">

              </select>

              </div>

             </div>
           </div>
         </div>

  <div id="cuadro2" style="height: 334px;">
      <div class="jumbotron"  style="height: 330px;border-radius: 70px 70px 70px 70px;">
        <div class="container" style="height: 330px;">
          <center style="margin-top:-30px;font-weight:bold;"> Últimos Servicios</center><br>
        <div class="form-group" style="margin-left:0px;Margin-top:-7px;">
          <?php
          $ultimosServicios=$data->getUltimos5Servicios();

          ?>

          <table class="table table-striped">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Servicio</th>
                  <th>Unidades</th>
                  <th>Detalles</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($ultimosServicios as $s => $servicio) {?>
                  <tr>
                    <td><?php
                    $fechaSinConvertir =  $servicio->getFecha_servicio();
                    $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                    echo $fechaConvertida;
                    ?></td>
                    <td><?php echo utf8_encode($data->verNombreDeServicioPorId($servicio->getFk_tipoDeServicio()));?></td>
                    <td><?php
                    $unidades=$data->getUnidadesInvolucradasEnServicio($servicio->getId_servicio());
                    foreach ($unidades as $u => $unidad) {
                      echo $unidad." ";
                    }
                    ?></td>
                    <td><input type="submit" value="Ver detalles" onclick="verDetalles(<?php echo $servicio->getId_servicio(); ?>)"></td>
                  </tr>
              <?php
                }
                ?>


              </tbody>
              </table>


        </div>

       </div>
     </div>
   </div>


   <div id="cuadro3" style="height: 244px;">
       <div class="jumbotron" style="height: 240px;border-radius: 70px 70px 70px 70px">
         <div class="container" style="height: 240px;">

         <div class="form-group" style="margin-left:-20px;margin-top:-35px;">

            Detalles:<br>
            <textarea style="width:700px;height:150px">
            </textarea>

         </div>
        </div>

      </div>
      <div style="margin-top: -69px;margin-left: 590px;">
        Cerrar Servicio
        <button type="submit"  id="btn_despachar" name="btnsonido" style="width:50px;height:33px;">
          <img src="images/comprobar.png" alt="x" /></button>
      </div>
    </div>
    <br>
<center>
    <button type="submit" id="btn_despachar" name="btnsonido" style="width:200px;height:33px;">
      <img src="images/camion.png" alt="x" /><a href="centraldeAlarma.php" >Nuevo Despacho</a></button>
</center>
     </div>
   </div>
 </div>

</div>


<script>
function despachar(){
  event.preventDefault();

  var tipoDeServicio=$("#cboTiposDeServicios :selected").text();
  var sector=$("#cboSectores :selected").text();

  var unidadesADespachar =[];
  // 10-0
  if((tipoDeServicio=="10-0") && (sector=="Barros Negros")){
    unidadesADespachar=["B-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Villa La Vinilla")) {
    unidadesADespachar=["B-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Villa El Alamo")) {
    unidadesADespachar=["B-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Poblacion La America")) {
    unidadesADespachar=["B-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Poblacion 12 de Febrero")) {
    unidadesADespachar=["B-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Villa El Llano")) {
    unidadesADespachar=["B-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Cali Canto")) {
    unidadesADespachar=["B-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Poblacion Bello Olivo")) {
    unidadesADespachar=["B-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Poblacion Municipal")) {
    unidadesADespachar=["B-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="El Guindal")) {
    unidadesADespachar=["B-1","BX-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="La Hacienda")) {
    unidadesADespachar=["B-1","BX-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Santa Sofia")) {
    unidadesADespachar=["B-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Las Pircas")) {
    unidadesADespachar=["B-3","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Las Rozas")) {
    unidadesADespachar=["B-3","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Los Acantos")) {
    unidadesADespachar=["B-3","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Lo Castillo")) {
    unidadesADespachar=["B-3","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Plazas del campo")) {
    unidadesADespachar=["B-3","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Plaza las Rosas")) {
    unidadesADespachar=["B-3","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Valle lo Castillo")) {
    unidadesADespachar=["B-3","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Santa Teresita")) {
    unidadesADespachar=["B-3","BX-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Acceso a Machali")) {
    unidadesADespachar=["B-3","BX-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Padre Huratado")) {
    unidadesADespachar=["B-3","BX-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="La Reserva")) {
    unidadesADespachar=["B-3","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="El Remanso")) {
    unidadesADespachar=["B-3","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="El Polo")) {
    unidadesADespachar=["B-3","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Cruce Nogales")) {
    unidadesADespachar=["B-3","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Nogales")) {
    unidadesADespachar=["B-3","BX-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Camino a Sauzal")) {
    unidadesADespachar=["B-3","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Carretera el Cobre (Acceso a Machali)")) {
    unidadesADespachar=["B-3","BX-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Carretera el Cobre (Subida a Coya)")) {
    unidadesADespachar=["B-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Avenida Balaguer")) {
    unidadesADespachar=["B-3","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Parque San Fuente")) {
    unidadesADespachar=["B-3","BX-1","Q-1"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Coya")) {
    unidadesADespachar=["B-2","BX-2"];
  }else if ((tipoDeServicio=="10-0") && (sector=="Ninguno de los Anteriores")) {
    unidadesADespachar=[];
  }
  //10-1
  else if((tipoDeServicio=="10-1") && (sector=="Barros Negros")){
    unidadesADespachar=["B-1"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Villa La Vinilla")) {
    unidadesADespachar=["B-1"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Villa El Alamo")) {
    unidadesADespachar=["B-1"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Poblacion La America")) {
    unidadesADespachar=["B-1"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Poblacion 12 de Febrero")) {
    unidadesADespachar=["B-1"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Villa El Llano")) {
    unidadesADespachar=["B-1"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Cali Canto")) {
    unidadesADespachar=["B-1"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Poblacion Bello Olivo")) {
    unidadesADespachar=["B-1"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Poblacion Municipal")) {
    unidadesADespachar=["B-1"];
  }else if ((tipoDeServicio=="10-1") && (sector=="El Guindal")) {
    unidadesADespachar=["B-1"];
  }else if ((tipoDeServicio=="10-1") && (sector=="La Hacienda")) {
    unidadesADespachar=["B-1"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Santa Sofia")) {
    unidadesADespachar=["B-1"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Las Pircas")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Las Rozas")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Los Acantos")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Lo Castillo")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Plazas del campo")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Plaza las Rosas")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Valle lo Castillo")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Santa Teresita")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Acceso a Machali")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Padre Huratado")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="La Reserva")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="El Remanso")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="El Polo")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Cruce Nogales")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Nogales")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Camino a Sauzal")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Carretera el Cobre (Acceso a Machali)")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Carretera el Cobre (Subida a Coya)")) {
    unidadesADespachar=["B-1"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Avenida Balaguer")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Parque San Fuente")) {
    unidadesADespachar=["B-3"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Coya")) {
    unidadesADespachar=["B-2"];
  }else if ((tipoDeServicio=="10-1") && (sector=="Ninguno de los Anteriores")) {
    unidadesADespachar=[];
  }

  swal({
      title: "Sistema de bomberos",
      text: "Despachar unidad/es "+unidadesADespachar.join(" y ")+" para servir un "+tipoDeServicio+" a "+sector+"?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: "#03fe00",
      confirmButtonText: "Sí",
      cancelButtonText: "No",
      closeOnConfirm: false,
  });
}


function verDetalles(id){
  $.ajax({
      type: "POST",
      url: 'verDetallesDeServicio.php',
      data: {"datos": id},
      success: function(data){
        swal(data);
      }
  });
}


function registrarCambio(id){
  $.ajax({
      type: "POST",
      url: 'registrarCambioDeEstado.php',
      data: {"datos": id},
      success: function(data){
        console.log(data);
      }
  });
}

$("#btn1").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(31);
});
$("#btn71").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(2);
});
$("#btn72").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(12);
});
$("#btn73").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(22);
});
$("#btn2").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(32);
});
$("#btn41").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(1);
});
$("#btn42").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(11);
});
$("#btn43").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(21);
});
$("#btn6").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(36);
});
$("#btn104").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(6);
});
$("#btn204").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(16);
});
$("#btn304").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(26);
});
$("#btn7").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(37);
});
$("#btn105").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(7);
});
$("#btn205").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(17);
});
$("#btn305").click(function(){
$(this).toggleClass("btn-danger btn-success");
registrarCambio(27);
});
$("#b1").click(function(){
$(this).toggleClass("btn-danger btn-success");
});
$("#bx1").click(function(){
$(this).toggleClass("btn-danger btn-success");
});
$("#q1").click(function(){
$(this).toggleClass("btn-danger btn-success");
});
$("#x1").click(function(){
$(this).toggleClass("btn-danger btn-success");
});
$("#k1").click(function(){
$(this).toggleClass("btn-danger btn-success");
});
$("#r1").click(function(){
$(this).toggleClass("btn-danger btn-success");
});
$("#b2").click(function(){
$(this).toggleClass("btn-danger btn-success");
});
$("#bx2").click(function(){
$(this).toggleClass("btn-danger btn-success");
});
$("#r2").click(function(){
$(this).toggleClass("btn-danger btn-success");
});
$("#b3").click(function(){
$(this).toggleClass("btn-danger btn-success");
});
$("#j").click(function(){
$(this).toggleClass("btn-danger btn-success");
});
</script>


  </body>
</html>
