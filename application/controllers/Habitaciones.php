<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Habitaciones extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('habitaciones_model');
		$this->load->helper('url_helper');
		$this->load->library("pagination");
	}

	public function index()
	{
		$datos['habitaciones'] = $this->habitaciones_model->get_habitacion();
		$datos['título'] = 'Listado habitaciones';
		$config = array();
		$config["base_url"] = base_url() . "habitaciones";
		$config["total_rows"] = $this->habitaciones_model->get_count();
		$config["per_page"] = 2;
		$config["uri_segment"] = 2;



// Bootstrap 
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$datos["links"] = $this->pagination->create_links();
		$datos['habitaciones'] = $this->habitaciones_model->get_habitaciones($config["per_page"], $page);




		$this->load->view('plantillas/header',$datos);
		$this->load->view('habitaciones/habitaciones',$datos);
		$this->load->view('plantillas/footer');
	}


	//funcion crear
public function registrar(){

	//funcionalidades q poseen codeigniter
	$this->load->helper('form');
	$this->load->library('form_validation');

	$datos['nombre'] = 'Crear registro';
	//verifica la validacion del formulario
		$this->form_validation->set_error_delimiters('
			<div class="row">
				<div class="col-sm-4"></div>
					<div class="col-sm-5">
						<div class="alert-danger">', 
						'</div>
					</div>
			</div>'

		);
	$this->form_validation->set_rules('numero_habitacion','Nombre','required');
	$this->form_validation->set_rules('piso','Piso','required');
	$this->form_validation->set_rules('cantidad_persona','Cantidad persona','required');
	$this->form_validation->set_rules('matrimonial','Matrimonial','required');
	$this->form_validation->set_rules('precio','precio','required');


	//si la validacion es falsa entra en el if, de lo contrario en el else
	if ($this->form_validation->run() === FALSE)
	{
	$this->load->view('plantillas/header', $datos);//carga la cabecera en la plantilla que luego se observa en la vista
	$this->load->view('habitaciones/registrar_habitacion', $datos);//carga la iformacion q se encuentra en el controlador crear que posteriormente e observa en la vista 
		$this->load->view('plantillas/footer');//carga el pie en la plantilla que luego se observa en la vista
	}
	else
	{
		$this->habitaciones_model->set_habitaciones();
		$this->load->view('plantillas/header',$datos);
		$this->load->view('habitaciones/resultado_insertado');
		$this->load->view('plantillas/footer');
	}

}
	
	public function eliminar($id){
		$datos['habitaciones'] = $this->habitaciones_model->delete_habitacion($id);
		
		$this->load->view('plantillas/header',$datos);
		$this->load->view('habitaciones/result_eliminado',$datos);
		$this->load->view('plantillas/footer');

	

}	

//funcion modificar con parametro cargado
public function modificar($id = updatehabitaciones) //inicializamos la variable id con el valor updatehabitaciones, de lo contrario 
//coge un valor numerico
{


    $datos['nombre'] = 'modificar';// el nombre q aparece en el titulo

//si el id es distinto de updatehabitaciones entra en este if
//si entra en este if es porque pasa un id valido y se carga automaticamente en el formulario con el dato que queremos modificar
    if($id != 'updatehabitaciones'){

//recojemos el id en una variable y lo convertimos en entero
        $id= $this->db->escape((int)$id);
//accedemos a habitaciones_model y recogemos los datos del registro con la condicion id habitacion
        $habitaciones= $this->habitaciones_model->get_modificar_habitaciones($id);


    $this->load->view('plantillas/header', $datos);//carga la cabecera en la plantilla que luego se observa en la vista
    $this->load->view('habitaciones/modificar_habitacion', compact("habitaciones"), $datos); //carga la vista con el formulario autocumplementado con el registro de la habitacion que queremos modificar
    $this->load->view('plantillas/footer');//carga el pie en la plantilla que luego se observa en la vista

//si la variable id viene con valor updahabitaciones entra en este else de abajo
}else{

 $id= $this->db->escape((int)$_POST["id"]);
 $numero_habitacion= $this->db->escape((int)$_POST["numero_habitacion"]);
 $piso= $this->db->escape((int)$_POST["piso"]);
 $cantidad_persona= $this->db->escape((int)$_POST["cantidad_persona"]);
 $matrimonial= $this->db->escape($_POST["matrimonial"]);
 $precio= $this->db->escape($_POST["precio"]);

 $this->habitaciones_model->updatehabitaciones($id, $numero_habitacion, $piso, $cantidad_persona, $matrimonial,$precio); //realiza el update en la base de datos
 $this->load->view('plantillas/header', $datos);
 $this->load->view('habitaciones/modificado', $datos); //carga la vista modificado.php con mensaje de confirmacion
 $this->load->view('plantillas/footer');
}
}


}
