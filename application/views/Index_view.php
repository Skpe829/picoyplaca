<div class="container">
	<div class="card bg-light">
		<div class="card-header">
			Pico y Placa
		</div>
		<div class="card-body">
			<form id="frmSend">
				<div class="form-group">
					<label>Placa del Vehiculo:</label>	
					<input class="form-control" type="text" name="txtPlaca" id="txtPlaca" autocomplete="off" maxlength="7">
				</div>
				<div class="form-group">
					<label>Fecha de Recorrido:</label>	
					<input class="form-control" type="text" name="txtFecha" id="txtFecha" autocomplete="off" readonly="">
				</div>
				<div class="form-group">
					<label>Hora de Salida:</label>	
					<input class="form-control" type="text" name="txtHora" id="txtHora" autocomplete="off" readonly="">
				</div>
				<button id="btnEnvio" class="btn btn-primary" disabled="">Revisar</button>
			</form>
			<hr>
			<div id="divNtf"></div>
		</div>
	</div>
</div>