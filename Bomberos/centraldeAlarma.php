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
  height: 260px;
  margin-top: 20px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 60px 60px 60px 60px


}

#cuadro4{

  width: 800px;
  height: 445px;
  margin-top: 5px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 60px 60px 60px 60px


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
                    1&nbsp;<input type="button" id="btn1" class="btn btn-danger" value="" style="width:20px;height:20px;" >
                  </td>
                  <td>71&nbsp;&nbsp;<input type="button" id="btn71" class="btn btn-danger" value="" style="width:20px;height:20px;" ></td>
                  <td>72&nbsp;&nbsp;<input type="button" id="btn72" class="btn btn-danger" value="" style="width:20px;height:20px;" ></td>
                  <td>73&nbsp;&nbsp;<input type="button" id="btn73" class="btn btn-danger" value="" style="width:20px;height:20px;" ></td>

                </tr>

                <tr>
                  <td>2&nbsp;<input type="button" id="btn2" class="btn btn-danger" value="" style="width:20px;height:20px;" ></td>
                  <td>41&nbsp;&nbsp;<input type="button" id="btn41" class="btn btn-danger"  value="" style="width:20px;height:20px;" ></td>
                  <td>42&nbsp;&nbsp;<input type="button" id="btn42" class="btn btn-danger" value="" style="width:20px;height:20px;" ></td>
                  <td>43&nbsp;&nbsp;<input type="button" id="btn43" class="btn btn-danger" value="" style="width:20px;height:20px;" ></td>

                </tr>

                <tr>
                  <td>6&nbsp;<input type="button" id="btn6" class="btn btn-danger" value="" style="width:20px;height:20px;" ></td>
                  <td>104&nbsp;<input type="button" id="btn104" class="btn btn-danger" value="" style="width:20px;height:20px;" ></td>
                  <td>204&nbsp;<input type="button" id="btn204" class="btn btn-danger" value="" style="width:20px;height:20px;" ></td>
                  <td>304&nbsp;<input type="button" id="btn304" class="btn btn-danger" value="" style="width:20px;height:20px;" ></td>

                </tr>

                <tr>
                  <td>7&nbsp;<input type="button" id="btn7" class="btn btn-danger" value="" style="width:20px;height:20px;" ></td>
                  <td>105&nbsp;<input type="button" id="btn105" class="btn btn-danger" value="" style="width:20px;height:20px;" ></td>
                  <td>205&nbsp;<input type="button" id="btn205" class="btn btn-danger"  value="" style="width:20px;height:20px;" ></td>
                  <td>305&nbsp;<input type="button" id="btn305" class="btn btn-danger" value="" style="width:20px;height:20px;" ></td>

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


  <div id="cuadro3">
      <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" >
        <div class="container">
          <center style="margin-top:-30px;font-weight:bold;"> Últimos Servicios</center><br>
        <div class="form-group" style="margin-left:0px;">

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
                <tr>
                  <td>11-05-2019</td>
                  <td>10-1</td>
                  <td>b1</td>
                  <td>asdajssj</td>

                </tr>

              </tbody>
              </table>


        </div>

       </div>
     </div>
   </div>


   <div id="cuadro4">
       <div class="jumbotron" style="border-radius: 70px 70px 70px 70px">
         <div class="container">

         <div class="form-group" style="margin-left:-20px;">

           Nombre:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="txtnombre" style="width:290px;">
           Rut: <input type="text" name="txtrut" style="width:95px;">
           Telefono: <input type="text" name="txtTF" style="width:95px;"> <br><br>

           Direccion:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="txtdireccion" style="width:580px;"> <br><br>

           Esquina Nº1: <input type="text" name="txtdireccion" style="width:240px">&nbsp;
           Esquina Nº2: <input type="text" name="txtdireccion" style="width:247px">
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


           &nbsp;&nbsp;&nbsp;
        <center>  <!-- <input type="submit" src="images/camion.png" alt="Despachar" value="Despachar" id="btn_despachar" name="btn_despachar" onclick="despachar()" style="width:100px;height:50px;">-->
        <button type="submit" value="Despachar" id="btn_despachar" name="btn_despachar" onclick="despachar()" style="width:100px;height:100px;">
          <img src="images/camion3.png" alt="x" />Despachar</button>
        </center>

        <?php
          date_default_timezone_set('America/Santiago');

          $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
          $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

          echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
          echo date(" H:i:s");

          ?>





         </div>

        </div>
      </div>
    </div>


     </div>
   </div>
 </div>

</div>

<script>
function despachar(){
  var tipoDeServicio=$("#cboTiposDeServicios :selected").text();
  var sector=$("#cboSectores :selected").text();
  swal({
      title: "Sistema de bomberos",
      text: "Despachar "+tipoDeServicio+" a "+sector+"?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: "#03fe00",
      confirmButtonText: "Sí",
      cancelButtonText: "No",
      closeOnConfirm: false,
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
registrarCambio();
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
registrarCambio();
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
registrarCambio();
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
