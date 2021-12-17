<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
        //libreria que convierte la variable de php a javascript
		$this->load->library('PHPtoJS');

		$this->load->model('clientes_model');
		$this->load->model('habitaciones_model');
		$this->load->model('reservas_model');
	}
	public function index()
	{
		$datos['Numero_clientes'] = count($this->clientes_model->get_cliente());
		$datos['Numero_habitaciones'] = count($this->habitaciones_model->get_habitacion());
		$datos['Numero_reservas'] = count($this->reservas_model->get_reserva());
		$datos['Matrimoniales_no'] = count($this->habitaciones_model->get_count_no_matrimonial());
		$datos['Matrimoniales_si'] = count($this->habitaciones_model->get_count_si_matrimonial());


		$this->load->library('PHPtoJS');
		$this->phptojs->put([
			'Matrimoniales_si' => $datos['Matrimoniales_si'],
			'Matrimoniales_no' => $datos['Matrimoniales_no']
		]);
		
		

		$this->load->view('plantillas/header');
		$this->load->view('inicio', $datos);
		$this->load->view('plantillas/footer');
	}

	
}
