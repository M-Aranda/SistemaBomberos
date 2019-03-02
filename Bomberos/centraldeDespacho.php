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
   <!-- <script type="text/javascript" src="javascript/sweetAlertMin.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    -->


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>


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
  margin-top: 21px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 70px 70px 70px 70px;

}
#cuadro3{
  width: 800px;
  height: 434px;
  margin-top: 7px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 70px 70px 70px 70px;
}

#cuadro4{
  width: 800px;
  height: 434px;
  margin-top: 7px;
  margin-left: 30px;
  border: 2px black outset;
  border-radius: 70px 70px 70px 70px;
}

#jum{
    width: 900px;
    height: 1000px;
    margin-bottom: 100px;
}
.something {
      width: 90px;
      background: red;
    }
</style>


<?php
    // unir vista con el modelo sin pasar por un controlador
    require_once("model/Data.php");
    $data = new Data();
?>

<div style="width: 900px" style="height: 1000px" style="margin-top: -100px" id="jum">
    <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
        <center style="font-weight:bold;font-size:20px;margin-top:-40px;">Central de Despacho</center>
      <b> <div id="currentTime" style="margin-left:700px;margin-top:-20px"></div> </b>
      <div class="container">

        <div id="cuadro1" style="height: 125px;">
            <div class="jumbotron"  style="height: 120px;border-radius: 70px 70px 70px 70px;">
              <div class="container" style="height: 190px;">
              <div class="form-group" style="margin-left:50px;Margin-top:-40px;">



              Despacho:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input value="<?php
              if(isset($_SESSION["idDeServicioCreado"])){
                echo utf8_encode($data->getTipoDeServicioYSectorDeServicio($idServicioCreado)->getServicio());
               echo "  "; echo utf8_encode($data->getTipoDeServicioYSectorDeServicio($idServicioCreado)->getSector()); echo " ";

               $idTipoServ=$data->getTipoDeServicioYSectorDeServicio($idServicioCreado)->getServicio();
               $idTipoServ=$data->getIdDeTipoDeServicioAPartirDelCodigo($idTipoServ);

               $idSector=$data->getTipoDeServicioYSectorDeServicio($idServicioCreado)->getSector();
               $idSector=$data->getIdDeSectorAPartirDelNombre($idSector);

               $listadoDeUnidadesAEnviar=$data->determinarCarrosADespacharSegunCodigoDeServicioYSector($idTipoServ,$idSector);

                foreach ($listadoDeUnidadesAEnviar as $lu => $unidad) {
                    echo utf8_encode($data->getNombreDeUnidadPorId($unidad));
                    echo " ";
                  }
              }


              ?>" type="text"id="txtDespacho" name="txtDespacho" disabled style="width:400px;margin-top:10px;height:30px;">

              <form id="formEnviarUnidades" name="formEnviarUnidades" action="controlador/despacharUnidades.php" method="post">
                <input type="hidden" name="tipoServicio" id="tipoServicio" value="<?php echo $idTipoServ;?>">
                <input type="hidden" name="sector" id="sector" value="<?php echo $idSector;?>">

              </form>
              <button type="submit"  id="btn_despachar" name="btnsonido" onclick="despacharUnidadesALaEmergencia()" style="width:60px;height:60px;margin-left:530px;margin-top:-19px;">
                <img src="images/torre.png" alt="x" /></button>



              En Despacho:&nbsp;
              <select id="cboxdespacho" name="cboxdespacho" onchange="cargarTabla()"style="width:400px;height:30px;margin-top:-12px;" >
                <?php $emergenciasActivas=$data->getServiciosDeEmergenciasActivas();
                foreach ($emergenciasActivas as $e => $emer) {?>

                  <option value="<?php echo $emer->getId_servicio();?>"><?php echo $emer->getFecha_servicio();
                  echo " "; echo $emer->getFk_tipoDeServicio(); echo " "; $unidadesDelServicio=$data->getUnidadesInvolucradasEnServicio($emer->getId_servicio());
                  foreach ($unidadesDelServicio as $u => $unidad) {
                    echo $unidad." ";
                  }
                  ?> </option>


              <?php
            }
                ?>

              </select>

            <br><br>

              </div>

             </div>
           </div>
         </div>

  <div id="cuadro2" style="height: 340px;">
      <div class="jumbotron"  style="height: 330px;border-radius: 70px 70px 70px 70px;">
        <div class="container" style="height: 330px;">
          <center style="margin-top:-30px;font-weight:bold;"> Detalle del Servicio</center><br>
        <div class="form-group" style="margin-left:0px;Margin-top:-9px;">

          <table id="tablaDeEmergencia" name="tablaDeEmergencia" class="table table-striped" RULES="cols" >
              <thead>
                <TD style="width:80px;">Unidad</TD>
                <TD>6-0</TD>
                <TD style="width:20px;">boton</TD>
                <TD>6-3</TD>
                <TD>6-7</TD>
                <TD>6-8</TD>
                <TD>6-9</TD>
                <TD>6-10</TD>
              </thead>
              <tbody>


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
        <button type="submit"  id="btn_despachar" name="btnsonido" style="width:100px;height:33px;">
          <img src="images/guardar.png" alt="x" />&nbsp;Guardar</button>

      </div>
    </div>


   <div id="cuadro4" style="height: 244px;">
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
        <button type="submit"  id="btn_despachar" name="btnsonido" style="width:100px;height:33px;">
          <img src="images/guardar.png" alt="x" />&nbsp;Guardar</button>

      </div>
    </div>
    <br>


<center>
  <button type="submit" id="btn_despachar" name="btnsonido" style="width:200px;height:33px;margin-top: -50px">
      <img src="images/camion.png" alt="x" /><a href="centraldeAlarma.php" style="text-decoration:none;color:black;" >&nbsp;Nuevo Despacho</a></button>

      <button type="submit"  id="btn_despachar" name="btnsonido" style="width:200px;height:33px;margin-top:-100px;">
        <img src="images/comprobar.png" alt="x" /><a href="centraldeAlarma.php" style="text-decoration:none;color:black;">&nbsp;Cerrar Servicio</button>
</center>


     </div>
   </div>
 </div>


</div>



<script>

function actualizarDatosOBACConductoryNPersonal(idSerUnidad){
  swal({
    title: 'Ingresar datos:',
    html:
      '<input placeholder="OBAC" type="text" id="OBAC" class="swal2-input">' +
      '<input placeholder="Conductor" type="text" id="Conductor" class="swal2-input">'+
      '<input placeholder="N° Personal" type="text" id="NPersonal" class="swal2-input">',
    preConfirm: function () {
      return new Promise(function (resolve) {
        resolve([
          $('#OBAC').val(),
          $('#Conductor').val(),
          $('#NPersonal').val()
        ])
      })
    },
    onOpen: function () {
      $('#OBAC').focus()
    }
  }).then(function (result) {

    var ar=(JSON.stringify(result)).split(/(?:,|{|}|")+/);
    var nomOb=ar[3];
    var nomCon=ar[4];
    var nPer=ar[5];

    swal({
        title: "Sistema de bomberos",
        text: "Operación exitosa",
        type: "success",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ok",
    })

    $.ajax({
      url: "actualizarOBACConductorYNPersonal.php",
      type: "POST",
      data:{"nombreOBAC": nomOb,
            "nombreConductor": nomCon,
            "cantidadPersonal": nPer,
            "idServicioUnidad": idSerUnidad,}
    });

  }).catch(swal.noop)

}

function mostrarhora(){
var f=new Date();
cad=f.getHours()+":"+f.getMinutes()+":"+f.getSeconds();
window.status =cad;
setTimeout("mostrarhora()",1000);
}




function despacharUnidadesALaEmergencia(){

Swal.fire({
  title: 'Sistema de bomberos',
  text: "¿Despachar unidades?",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí',
  cancelButtonText: 'No'
}).then((result) => {
  if (result.value) {

    document.getElementById("formEnviarUnidades").submit();
  }
})
}


function obtenerHoraActual(){
  var today = new Date();
  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  return time;
}

$(document).ready(
 function() {
 setInterval(function() {
 var hora = obtenerHoraActual();
  $('#currentTime').text(hora);
}, 1000);
});


function marcarHora(){
  return $('#currentTime').text();
}

function registrarHora6_0(idDeLaEmergencia){
  $.ajax({
    url: "registrarEstadoDeCarro6_0.php",
    type: "POST",
    data:{"identificadorDeEmergencia": idDeLaEmergencia},
    success: function(data){
      console.log(data);
    }
  });
}


function registrarHora6_3(idDeLaEmergencia){
  $.ajax({
    url: "registrarEstadoDeCarro6_3.php",
    type: "POST",
    data:{"identificadorDeEmergencia": idDeLaEmergencia},
    success: function(data){
      console.log(data);
    }
  });
}

function registrarHora6_7(idDeLaEmergencia){
  $.ajax({
    url: "registrarEstadoDeCarro6_7.php",
    type: "POST",
    data:{"identificadorDeEmergencia": idDeLaEmergencia},
    success: function(data){
      console.log(data);
    }
  });
}

function registrarHora6_8(idDeLaEmergencia){
  $.ajax({
    url: "registrarEstadoDeCarro6_8.php",
    type: "POST",
    data:{"identificadorDeEmergencia": idDeLaEmergencia},
    success: function(data){
      console.log(data);
    }
  });
}

function registrarHora6_9(idDeLaEmergencia){
  $.ajax({
    url: "registrarEstadoDeCarro6_9.php",
    type: "POST",
    data:{"identificadorDeEmergencia": idDeLaEmergencia},
    success: function(data){
      console.log(data);
    }
  });
}

function registrarHora6_10(idDeLaEmergencia){
  $.ajax({
    url: "registrarEstadoDeCarro6_10.php",
    type: "POST",
    data:{"identificadorDeEmergencia": idDeLaEmergencia},
    success: function(data){
      console.log(data);
    }
  });
}

//pendiente esta funcion
function getHora6_0(idEmer,e){
var aRetornar="algo";
  $.ajax({
    url: "obtenerHora6_0.php",
    type: "POST",
    data:{"identificadorDeEmergencia": idEmer},
    success: function(data){
      console.log(data);
      //Si le puedo pasar el elemento entero, pero necesito poder cambiar el valor que tiene
      alert(e);

    }
  });

  return aRetornar;

}


function cargarTabla(){
  var id = document.getElementById("cboxdespacho").value;

  $.ajax({
    url: "getServiciosUnidad.php",
    type: "POST",
    data:{"datos":id}
  }).done(function(data) {
    console.log(data);
    var objetos=JSON.parse(data);

     $("#tablaDeEmergencia tbody tr").remove();

    var i;
    for (i = 0; i < objetos.length; i++) {
      var objetoJSON= $.parseJSON(objetos[i]);

      var idEmergencia=objetoJSON.id;
      var nombreUnidadEmergencia=objetoJSON.nombre;
      var momento6_0Emergencia=objetoJSON.momento6_0;
      var momento6_3Emergencia=objetoJSON.momento6_3;
      var momento6_7Emergencia=objetoJSON.momento6_7;
      var momento6_8Emergencia=objetoJSON.momento6_8;
      var momento6_9Emergencia=objetoJSON.momento6_9;
      var momento6_10Emergencia=objetoJSON.momento6_10;



      if (!document.getElementsByTagName) return;
      tabBody=document.getElementsByTagName("tbody").item(0);
      row=document.createElement("tr");

      cell1 = document.createElement("td");
      textnode1=document.createTextNode(nombreUnidadEmergencia);


      textnode2=document.createTextNode(momento6_0Emergencia);
      cell2 = document.createElement("td");
      cell2.setAttribute('onclick','registrarHora6_0('+idEmergencia+'), this.innerText = getHora6_0('+idEmergencia+',this');

      textnode4=document.createTextNode(momento6_3Emergencia);
      cell4 = document.createElement("td");
      cell4.setAttribute('onclick','registrarHora6_3('+idEmergencia+') ');

      textnode5=document.createTextNode(momento6_7Emergencia);
      cell5 = document.createElement("td");
      cell5.setAttribute('onclick','registrarHora6_7('+idEmergencia+') ');

      textnode6=document.createTextNode(momento6_8Emergencia);
      cell6 = document.createElement("td");
      cell6.setAttribute('onclick','registrarHora6_8('+idEmergencia+') ');

      textnode7=document.createTextNode(momento6_9Emergencia);
      cell7 = document.createElement("td");
      cell7.setAttribute('onclick','registrarHora6_9('+idEmergencia+') ');

      textnode8=document.createTextNode(momento6_10Emergencia);
      cell8 = document.createElement("td");
      cell8.setAttribute('onclick','registrarHora6_10('+idEmergencia+') ');

      var cell3=document.createElement("INPUT");

      cell3.setAttribute('onclick','actualizarDatosOBACConductoryNPersonal('+idEmergencia+')');

      cell3.setAttribute("type", "submit");
      cell3.setAttribute("value", "algun valor");

      cell1.appendChild(textnode1);
      cell2.appendChild(textnode2);
      cell4.appendChild(textnode4)
      cell5.appendChild(textnode5);
      cell6.appendChild(textnode6);
      cell7.appendChild(textnode7);
      cell8.appendChild(textnode8);


      row.appendChild(cell1);
      row.appendChild(cell2);
      row.appendChild(cell3);
      row.appendChild(cell4);
      row.appendChild(cell5);
      row.appendChild(cell6);
      row.appendChild(cell7);
      row.appendChild(cell8);
      tabBody.appendChild(row);
    }
  });
}


</script>


  </body>
</html>
