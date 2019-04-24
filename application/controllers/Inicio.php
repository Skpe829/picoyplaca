<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('common/head_view');
		$this->load->view('index_view');
		$this->load->view('common/foot_view');
	}
}
