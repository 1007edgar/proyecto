<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas_cliente extends CI_Controller {

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
		$this->load->model('reservas_cliente_model');
    }

    public function index(){

        
    }

	public function registrar_reserva(){

		$this->load->helper('form');
		$this->load->library('form_validation');

		//verifica la validacion del formulario
		$this->form_validation->set_error_delimiters("
		<div class='row'>
		<div class='col-sm-2'></div>
		<div class='col-sm-5'>
		<div class='alert alert-danger' role='alert'>", "</div></div></div>");

		$this->form_validation->set_rules('fecha_entrada','fecha de entrada','required|callback_fecha_disponible');
		$this->form_validation->set_rules('fecha_salida','Fecha salida','required');
		//$this->form_validation->set_rules('id_habitacion','Habitacion','callback_fecha_disponible');
		//$this->form_validation->set_rules('id','Habitacion','required');
		//$this->form_validation->set_rules('precio','Precio','required');

		//Datos del cliente
		$this->form_validation->set_rules('nombre','Nombre','required|min_length[2]|max_length[15]|callback_solo_letras');
		$this->form_validation->set_rules('apellido1','1º Apellido','required|min_length[2]|max_length[20]|callback_solo_letras');
		$this->form_validation->set_rules('apellido2','2º Apellido','required|min_length[2]|max_length[20]|callback_solo_letras');
		//$this->form_validation->set_rules('dni','DNI','required|callback_valida_dni');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('direccion','Dirección','required|min_length[5]');
		//$this->form_validation->set_rules('apellido2','2º Apellido','required');
		$this->form_validation->set_rules('telefono','Teléfono','required|min_length[9]|max_length[9]|callback_solo_numeros');

		if ($this->form_validation->run() === FALSE){
			$datos['clientes'] = $this->reservas_model->get_clientes();
			$datos['habitaciones'] = $this->reservas_model->get_numero_habitaciones();
			$this->load->view('public/header_public', $datos);//carga la cabecera en la plantilla que luego se observa en la vista
			$this->load->view('reservas_cliente/formulario_reserva', $datos);//carga la iformacion q se encuentra en el controlador crear que posteriormente e observa en la vista 
			$this->load->view('public/footer_public');//carga el pie en la plantilla que luego se observa en la vista

		}
		else {
			

			$datos_cliente = array(
				'nombre' => $this->input->post('nombre'),
				'apellido1' => $this->input->post('apellido1'),
				'apellido2' => $this->input->post('apellido2'),
				'dni' => $this->input->post('dni'),
				'email' => $this->input->post('email'),
				'direccion' => $this->input->post('direccion'),
				'telefono' => $this->input->post('telefono')
			);
			$this->reservas_cliente_model->set_cliente($datos_cliente);

			/**Precio total de la reserva
			**/
			$f_entrada=$this->input->post('fecha_entrada');
			$f_salida=$this->input->post('fecha_salida');
			
			$precio_habi = $this->input->post('precio');
			$diff = strtotime($f_salida)-strtotime($f_entrada);

			$dife =round($diff / (60 * 60 * 24));
			$precio = $precio_habi*$dife;
			//echo $precio;die;
			//echo var_dump($diff->days);die;
			$datos_reserva = array(
				'fecha_entrada' => $this->input->post('fecha_entrada'),
				'fecha_salida' => $this->input->post('fecha_salida'),
				'id_cliente' => $this->db->insert_id(),
				'precio_total' => $precio
				
			);
			$this->reservas_cliente_model->set_reserva($datos_reserva);

			$fecha_entrada = $this->input->post('fecha_entrada');
			$fecha_salida = $this->input->post('fecha_salida');
			$id_habitacion = $this->input->post('id');
			$this->reservas_cliente_model->set_detalles($id_habitacion);

			$datos['reserva'] = $this->reservas_cliente_model->resultado_reserva();
			//$datos['reserva'] = $this->reservas_cliente_model->resultado_reserva();
			//echo var_dump($datos);die();
			$this->load->view('public/header_public');//carga la cabecera en la plantilla que luego se observa en la vista
			$this->load->view('reservas_cliente/reserva_valida',$datos);//carga la iformacion q se encuentra en el controlador crear que posteriormente e observa en la vista 
			$this->load->view('public/footer_public');//carga el pie en la plantilla que luego se observa en la vista

		}

	}

	public function reservas_pdf($id){
			   //Se agrega la clase desde thirdparty para usar FPDF
		require_once APPPATH.'third_party/fpdf_code/fpdf.php';
		$datos = $this->reservas_cliente_model->resultado_pdf($id);
		//echo var_dump($datos);die();
		$pdf = new FPDF(); 
		$pdf->AddPage('','A4',0);
		$pdf->SetFont('Arial','B',16);


		//HEADER
		// Arial bold 15
		$pdf->SetFont('Arial','B',15);
		$pdf->SetTextColor('61','174','233');
		// Movernos a la derecha
		$pdf->Cell(60);
		// Título
		$pdf->Cell(70,10,'Hotel Mauva S.L.',1,0,'C');
		// Salto de línea
		$pdf->Ln(20);

		/*$pdf->Cell(30,9,'Nombre: ',0,1,'C');
		$pdf->Ln(); 
		$pdf->Cell(30,9,'DNI: ',0,1,'C'); 
		$pdf->Ln();
		$pdf->Cell(50,9,'Fecha de entrada: ',0,1,'C'); 
		$pdf->Ln();
		$pdf->Cell(50,9,'Fecha de salida: ',0,1,'C');
		$pdf->Ln(); 
		$pdf->Cell(50,9,utf8_decode('Nº de habitación: '),0,1,'C');
		$pdf->Ln();
		$pdf->Cell(30,9,'Precio: ',0,1,'C');*/
		

		foreach ($datos as  $reserva_item){
			//$pdf->SetTextColor('40','40','40');
			$pdf->SetTextColor('61','174','233');
			$pdf->Cell(50,9,'Nombre: '); 
			$pdf->SetTextColor('40','40','40');
			$pdf->Cell(39,9,$reserva_item['nombre']);
			$pdf->Ln();//salto de línea 
			$pdf->SetTextColor('61','174','233');
			$pdf->Cell(50,9,'Apellidos: '); 
			$pdf->SetTextColor('40','40','40');
			$pdf->Cell(39,9,$reserva_item['apellido1'].' '.$reserva_item['apellido2']); 
			$pdf->Ln();
			$pdf->SetTextColor('61','174','233');
			$pdf->Cell(50,9,'DNI: ');
			$pdf->SetTextColor('40','40','40');
			$pdf->Cell(39,9,$reserva_item['dni']); 
			$pdf->Ln();
			$pdf->SetTextColor('61','174','233');
			$pdf->Cell(50,9,'Fecha de entrada: ');
			$pdf->SetTextColor('40','40','40');
			$pdf->Cell(78,9,$reserva_item['fecha_entrada']);
			$pdf->Ln();
			$pdf->SetTextColor('61','174','233');
			$pdf->Cell(50,9,'Fecha de salida: ');
			$pdf->SetTextColor('40','40','40');
			$pdf->Cell(78,9,$reserva_item['fecha_salida']);
			$pdf->Ln();
			$pdf->SetTextColor('61','174','233');
			$pdf->Cell(50,9,utf8_decode('Nº de habitación: '));
			$pdf->SetTextColor('40','40','40');
			$pdf->Cell(78,9,$reserva_item['numero_habitacion']);
			$pdf->Ln();
			$pdf->SetTextColor('61','174','233');
			$pdf->Cell(50,9,utf8_decode('Precio: '));
			$pdf->SetTextColor('40','40','40');
			$pdf->Cell(50,9,$reserva_item['precio_total'].' euros');
			//$pdf->Ln();
		}

		//FOOTER
		// Posición: a 1,5 cm del final
		$pdf->SetY(-50);
		// Arial italic 8
		$pdf->SetFont('Arial','I',13);
		// Número de página
		$pdf->Cell(0,-10,utf8_decode('hotelmauva.com     telf: 45-345-987    Página'.$pdf->PageNo().''),0,0,'C');

		$pdf->Output('reservas_pdf.pdf' , 'I' );
	}

	public function fecha_disponible($fecha_salida, $fecha_entrada){

		$id_habitacion = $this->input->post('id');
		//echo var_dump($id_habitacion);die();
			$nueva_fecha_entrada = date('Y-m-d', strtotime($_POST['fecha_entrada']));
			$habitacion_disponible = $this->reservas_model->habitaciones_disponibles($id_habitacion,$nueva_fecha_entrada);
			if (!empty($habitacion_disponible)) {
				$this->form_validation->set_message('fecha_disponible', 
							"La habitación elegida no se encuentra disponible para la fecha solicitada.");
				return FALSE;
			}

			else{
				return TRUE;
			}


		/*$fechas_disponible['reservas'] = $this->reservas_model->fecha_disponible($fecha_entrada, $fecha_salida);
		
				if(!empty($fechas_disponible['reservas'])){//Realizando comparación con una cadena
					if($fechas_disponible['reservas'] == "invalido") {
						$ErrorFechaMayor = "La fecha de salida tiene que ser mayor a la fecha de entrada";
						$this->form_validation->set_message('fecha_disponible', 
							"$ErrorFechaMayor");
						return FALSE;
					}else{
						$this->form_validation->set_message('fecha_disponible', 
							"La {field} no está disponible");
						return FALSE;
					}
				}
				else{
					return TRUE;
				}*/
	}

	function solo_letras($string){
		if (ctype_alpha($string)) {
			return true;
		}
		else {
			$this->form_validation->set_message('solo_letras', 
							"El {field} debe consistir sólo de letras");
						return FALSE;
		}
	}

	function solo_numeros($telefono){
		if (is_numeric($telefono)) {
			return true;
		}
		else{
			$this->form_validation->set_message('solo_numeros', 
							"El {field} debe consistir sólo de números");
						return FALSE;
		}
	}

	function valida_dni($dni){
		
		$letra = substr($dni, -1);
		$numeros = substr($dni, 0, -1);
		
		if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
			return true;
		}else{
			$this->form_validation->set_message('valida_dni', 
							"El formato del {field} es incorrecto");
						
			return false;
		}
	}
}