
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
  width: 350px;
  height: 600px;
  border: 2px black outset;
  margin-top: -25px;
  margin-left: 50px;
  border-radius: 70px 70px 70px 70px
}
#cuadro2{
  width: 350px;
  height: 300px;
  margin-top: -260px;
  margin-left: 450px;
  border: 2px black outset;
  border-radius: 70px 70px 70px 70px
}
#cuadro3{
  width: 800px;
  height: 385px;
  margin-top: 20px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 70px 70px 70px 70px;

}
#cuadro4{
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
      <div class="container">

<div id="cuadro1" style="height: 269px;">
    <div class="jumbotron" style="height: 265px;  border-radius: 70px 70px 70px 70px"  >
      <div class="container" style="height: 253px;">
        <center style="margin-top:-30px;font-weight:bold;"> Oficiales en Servicio</center><br>
        <div class="form-group" style="margin-left: -48px;">

         <table class="table table-striped">
              <thead>
                <tr>
                  <th>&nbsp;&nbsp;CB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  <th>&nbsp;&nbsp;1Cia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  <th>&nbsp;&nbsp;2Cia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  <th>&nbsp;&nbsp;3Cia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    1&nbsp;<input type="button" id="btn1" class="<?php if($data->getEstadoActualDeOficial(31)=="0-8"){
                      echo "btn btn-danger";
                    }elseif ($data->getEstadoActualDeOficial(31)=="0-9"){
                      echo "btn btn-success";
                    }?>" value="" style="width:20px;height:20px;" >
                  </td>
                  <td>71&nbsp;&nbsp;<input type="button" id="btn71" class="<?php if($data->getEstadoActualDeOficial(2)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(2)=="0-9"){
                    echo "btn btn-success";
                  }?>" value="" style="width:20px;height:20px;" ></td>
                  <td>72&nbsp;&nbsp;<input type="button" id="btn72" class="<?php if($data->getEstadoActualDeOficial(12)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(12)=="0-9"){
                    echo "btn btn-success";
                  }?>" value="" style="width:20px;height:20px;" ></td>
                  <td>73&nbsp;&nbsp;<input type="button" id="btn73" class="<?php if($data->getEstadoActualDeOficial(22)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(22)=="0-9"){
                    echo "btn btn-success";
                  }?>" value="" style="width:20px;height:20px;" ></td>

                </tr>

                <tr>
                  <td>2&nbsp;<input type="button" id="btn2" class="<?php if($data->getEstadoActualDeOficial(32)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(32)=="0-9"){
                    echo "btn btn-success";
                  }?>" value="" style="width:20px;height:20px;" ></td>
                  <td>41&nbsp;&nbsp;<input type="button" id="btn41" class="<?php if($data->getEstadoActualDeOficial(1)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(1)=="0-9"){
                    echo "btn btn-success";
                  }?>"  value="" style="width:20px;height:20px;" ></td>
                  <td>42&nbsp;&nbsp;<input type="button" id="btn42" class="<?php if($data->getEstadoActualDeOficial(11)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(11)=="0-9"){
                    echo "btn btn-success";
                  }?>" value="" style="width:20px;height:20px;" ></td>
                  <td>43&nbsp;&nbsp;<input type="button" id="btn43" class="<?php if($data->getEstadoActualDeOficial(21)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(21)=="0-9"){
                    echo "btn btn-success";
                  }?>" value="" style="width:20px;height:20px;" ></td>

                </tr>

                <tr>
                  <td>6&nbsp;<input type="button" id="btn6" class="<?php if($data->getEstadoActualDeOficial(36)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(36)=="0-9"){
                    echo "btn btn-success";
                  }?>" value="" style="width:20px;height:20px;" ></td>
                  <td>104&nbsp;<input type="button" id="btn104" class="<?php if($data->getEstadoActualDeOficial(6)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(6)=="0-9"){
                    echo "btn btn-success";
                  }?>" value="" style="width:20px;height:20px;" ></td>
                  <td>204&nbsp;<input type="button" id="btn204" class="<?php if($data->getEstadoActualDeOficial(16)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(16)=="0-9"){
                    echo "btn btn-success";
                  }?>" value="" style="width:20px;height:20px;" ></td>
                  <td>304&nbsp;<input type="button" id="btn304" class="<?php if($data->getEstadoActualDeOficial(26)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(26)=="0-9"){
                    echo "btn btn-success";
                  }?>" value="" style="width:20px;height:20px;" ></td>

                </tr>

                <tr>
                  <td>7&nbsp;<input type="button" id="btn7" class="<?php if($data->getEstadoActualDeOficial(37)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(37)=="0-9"){
                    echo "btn btn-success";
                  }?>" value="" style="width:20px;height:20px;" ></td>
                  <td>105&nbsp;<input type="button" id="btn105" class="<?php if($data->getEstadoActualDeOficial(7)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(7)=="0-9"){
                    echo "btn btn-success";
                  }?>" value="" style="width:20px;height:20px;" ></td>
                  <td>205&nbsp;<input type="button" id="btn205" class="<?php if($data->getEstadoActualDeOficial(17)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(17)=="0-9"){
                    echo "btn btn-success";
                  }?>"  value="" style="width:20px;height:20px;" ></td>
                  <td>305&nbsp;<input type="button" id="btn305" class="<?php if($data->getEstadoActualDeOficial(27)=="0-8"){
                    echo "btn btn-danger";
                  }elseif ($data->getEstadoActualDeOficial(27)=="0-9"){
                    echo "btn btn-success";
                  }?>" value="" style="width:20px;height:20px;" ></td>

                </tr>

              </tbody>
              </table>

          </div>
        </div>
   </div>
</div>


 <div id="cuadro2" style="height: 245px;">
     <div class="jumbotron" style="height: 240px;border-radius: 70px 70px 70px 70px">
       <div class="container" style="height: 300px;">
         <center style="margin-top:-30px;font-weight:bold;"> Unidades en Servicio</center><br>
       <div class="form-group" style="margin-left:-15px;margin-top: -40px;">

         <table class="table table-striped">
             <thead>
               <tr>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td>B-1<input type="button" value="" id="b1"  class="btn btn-danger" style="width:20px;height:20px;" ></td>
                 <td>BX-1<input type="button" value="" id="bx1"  class="btn btn-danger" style="width:20px;height:20px;" ></td>
                 <td>Q-1<input type="button" value="" id="q1"  class="btn btn-danger" style="width:20px;height:20px;" ></td>

              </tr>

              <td>X-1<input type="button" value="" id="x1"  class="btn btn-danger" style="width:20px;height:20px;" ></td>

              <td>K-1<input type="button" value="" id="k1"   class="btn btn-danger" style="width:20px;height:20px;" ></td>
              <td>R-1<input type="button" id="r1"  class="btn btn-danger" style="width:20px;height:20px;"></td>

              <tr>

              </tr>


               <tr>
                 <td>B-2<input type="button" value="" id="b2"  class="btn btn-danger" style="width:20px;height:20px;" ></td>&nbsp;
                 <td>BX-2<input type="button" value="" id="bx2"  class="btn btn-danger" style="width:20px;height:20px;" ></td>&nbsp;
                 <td>R-2<input type="button" value="" id="r2"  class="btn btn-danger" style="width:20px;height:20px;" ></td>&nbsp;

               </tr>
               <br>
               <tr>
                 <td>B-3<input type="button" value="" id="b3"  class="btn btn-danger" style="width:20px;height:20px;" ></td>&nbsp;
                 <td>J
                   <input type="button" value="" id="j"  class="btn btn-danger" style="width:20px;height:20px;" ></td>&nbsp;
               </tr>

             </tbody>
             </table>




       </div>

      </div>
    </div>
  </div>


  <div id="cuadro3" style="height: 334px;">
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

   <div id="cuadro4">
       <div class="jumbotron" style="border-radius: 70px 70px 70px 70px">
         <div class="container">

         <div class="form-group" style="margin-left:-20px;margin-top:-35px;">
           <form id="formDespacho" action="controlador/CrearDespacho.php" method="post">

           Nombre:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="txtnombre" style="width:290px;">
           Rut: <input type="text" name="txtrut" style="width:95px;">
           Telefono: <input type="text" name="txtTF" style="width:95px;"> <br><br>

           Direccion:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="txtdireccion" style="width:580px;"> <br><br>

           Esquina Nº1: <input type="text" name="txtEsquina1" style="width:240px">&nbsp;
           Esquina Nº2: <input type="text" name="txtEsquina2" style="width:247px">
           <br><br>

           Sector:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <select  name="cboSectores" id="cboSectores" style="width:280px; height:30px;">
           <?php
           $listado = $data->readSectores();
           foreach($listado as $o => $objeto){
           ?>
           <option value="<?php echo $objeto->getIdSector(); ?>"><?php echo $objeto->getNombreSector(); ?></option>
           <?php
           }
           ?>
           </select>

           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;

           Tipo de Emergencia:
           <select  name="cboTiposDeServicios" id="cboTiposDeServicios" style="width:80px; height:30px;">
           <?php
           $listado = $data->readTiposDeServicios();
           foreach($listado as $o => $objeto){
           ?>
           <option value="<?php echo $objeto->getId_tipo_servicio(); ?>"><?php echo $objeto->getCodigo_tipo_servicio(); ?></option>
           <?php
           }
           ?>
           </select>
           <br><br>
            Detalles:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="detalle" id="detalle" style="width:580px;">
            <br>

           &nbsp;&nbsp;&nbsp;
        <center>
        <button type="submit" value="Despachar" id="btn_despachar" name="btn_despachar" onclick="despachar()" style="width:100px;height:100px;">
          <img src="images/camion3.png" alt="x" />Despachar</button>
        </center>
        </form>

         </div>


        </div>

      </div>
      <div style="margin-top: -60px;margin-left: 60px;font-size:20px;">
        <?php
          date_default_timezone_set('America/Santiago');


          $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
          $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

          echo "<b>".$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y')."</b>" ;
          echo "<b>".date(" H:i:s")."<b>";
          ?>
      </div>
    </div>


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
