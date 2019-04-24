<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restriccion extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function picoYPlaca(){
		$placa = $this->input->post('txtPlaca');
		$ultimo = substr($placa, -1);
			
		switch ($ultimo) {
			case '1':
			case '2': 
				$restriccionDia = 1; //Lunes
				break;
			
			case '3':
			case '4': 
				$restriccionDia = 2; //Martes
				break;

			case '5':
			case '6': 
				$restriccionDia = 3; //Miercoles
				break;

			case '7':
			case '8': 
				$restriccionDia = 4; //Jueves
				break;

			case '9':
			case '0': 
				$restriccionDia = 5; //Viernes
				break;
		}
		echo json_encode($this->getRestriccion($restriccionDia));
	}

	private function getRestriccion($param){
		$fecha = $this->input->post('txtFecha');
		$hora = DateTime::createFromFormat('!H:i', $this->input->post('txtHora'));
		$rest = false;
		if(date("w", strtotime($fecha)) == $param){
			if($hora < DateTime::createFromFormat('!H:i','12:00')){
				$rest = $this->horasRestriccion("07:00","09:30", $hora);
			}else{
				$rest = $this->horasRestriccion("16:00","19:30", $hora);
			}
		}
		return $rest;
	}

	private function horasRestriccion($desde, $hasta) {
	    $horaDesde = DateTime::createFromFormat('!H:i', $desde);
	    $horaHasta = DateTime::createFromFormat('!H:i', $hasta);
	    $horaVehiculo = DateTime::createFromFormat('!H:i', $this->input->post('txtHora'));
	    return ($horaDesde <= $horaVehiculo && $horaVehiculo <= $horaHasta);
	}

}