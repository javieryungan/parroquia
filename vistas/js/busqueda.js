// buscar
/**
 * 
 * @param {*} url ruta del archivo Ajax 
 * @param {*} campo nonbre del campo para tomar el valor
 * @param {*} tipo 1 consulta bautizo, 2 consulta matrimonio
 */
function buscardatos(url, campo, tipo) {
  var valor = $(`#${campo}`).val();
  let data = "";
  if (tipo === 1) {
    data = { consulta: valor };
  }else if(tipo === 2){
    data = { searchmatrimonio: valor };
  }
  // console.log(url, valor, campo, tipo);
  $.ajax({
    url,
    method: "POST",
    data,
    success: function (respuesta) {
      // console.log(respuesta);
      if(tipo === 1){
          $("#tabla_bautizo").html(respuesta);
      }else if(tipo === 2){
        $("#tabla_matrimonio").html(respuesta);
      }
    },
  });
}
