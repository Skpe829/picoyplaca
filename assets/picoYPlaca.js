$(document).ready(function(){
	selectFecha();
	selectHora();
	listeners();
})

function listeners(){
	$("#txtPlaca").on("blur", function(rs){ validacionPlaca(); });
	$("#btnEnvio").on("click", function(rs){ rs.preventDefault(); envio(); });
}

function validacionPlaca(){
	var placa = $("#txtPlaca").val();
	$.ajax({
		url:"./Vehiculo/validacionPlaca",
		type:"POST",
		dataType:"JSON",
		data:{"placa":placa},
		success: function(rs){
			if(rs){
				$("#btnEnvio").prop("disabled", false);
			}else{
				$("#btnEnvio").prop("disabled", true);
			}
		}
	})
}

function selectFecha(){
	$('#txtFecha').bootstrapMaterialDatePicker({ 
		weekStart : 0,
		time: false,
		format : 'DD-MM-YYYY'
	});
}

function selectHora(){
	$('#txtHora').bootstrapMaterialDatePicker({ 
		date: false,
		format: 'HH:mm'
	 });
}

function envio(){
	var form = $("#frmSend").serialize();
	$.ajax({
		url:"./Restriccion/picoYPlaca",
		data: form,
		type: "POST",
		dataType: "JSON",
		success: function(rs){
			$("#divNtf").removeClass();
			$("#divNtf").empty();
			if(rs){
				$("#divNtf").addClass("alert alert-danger");
				$("#divNtf").append("El vehiculo NO puede Circular.");
			}else{
				$("#divNtf").addClass("alert alert-success");
				$("#divNtf").append("El vehiculo puede Circular sin problemas.");
			}
		}
	})
}