<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculo extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function validacionPlaca(){
		$placa = $this->input->post("placa");
		$parteLetras = ctype_alpha(substr($placa, 0, 3));
		$parteNumeros = ctype_digit(substr($placa, 3));

		if($parteLetras && $parteNumeros ) echo json_encode(true);
		else echo json_encode(false);
	}
}