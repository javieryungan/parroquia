function selectpaises(url) {
    console.log(url);
	var id_pais = $("#selectpaisesid").val();
	$.ajax({
		url,
		method: "POST",
		data: {
			"id":id_pais
		},
		success: function(respuesta){
            if(respuesta === undefined){
                respuesta = '<option value="">--No tiene horarios--</option>'
            }
            console.log(respuesta);
			$("#selectestado").attr("disabled", false);
			$("#selectestado").html(respuesta);
		}
	})
}

// calendar
