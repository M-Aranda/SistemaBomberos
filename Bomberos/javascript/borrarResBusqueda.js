function borrarResultadosDeBusqueda(moduloALimpiar){
  $.ajax({
      type: "POST",
      url: 'borrarResultadosDeBusqueda.php',
      data: {"datos":moduloALimpiar},
      success: function(data){

      }
  });
}
