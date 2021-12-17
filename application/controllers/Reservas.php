<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reservas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('reservas_model');
		$this->load->helper('url_helper');
		$this->load->library("pagination");
	}

	public function index()
	{
		$datos['reservas'] = $this->reservas_model->get_reserva();
		$datos['título'] = 'Listado reservas';
		$config = array();
		$config["base_url"] = base_url() . "reservas";
		$config["total_rows"] = $this->reservas_model->get_count();
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
		//recupera el segmento(parte) de la url empezando a contar a partir de /reservas(es 1)
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;


		$datos["links"] = $this->pagination->create_links();
		$datos['reservas'] = $this->reservas_model->get_reservas($config["per_page"], $page);


		$this->load->view('plantillas/header',$datos);
		$this->load->view('reservas/reservas',$datos);
		$this->load->view('plantillas/footer');
	}
	//para pdf
	public function reservas_pdf() {

           //Se agrega la clase desde thirdparty para usar FPDF
		require_once APPPATH.'third_party/fpdf_code/fpdf.php';

		$datos = $this->reservas_model->get_modificar_reserva();

		$pdf = new FPDF(); 
		$pdf->AddPage('','A4',0);
		$pdf->SetFont('Arial','B',16);


		$pdf->Cell(0,7,'Reservas',0,1,'C');  

		$pdf->Cell(30,9,'id',1,0,'C'); 
		$pdf->Cell(42,9,'fecha_entrada',1,0,'C'); 
		$pdf->Cell(42,9,'fecha_salida',1,0,'C'); 
		$pdf->Cell(30,9,'id_cliente',1,0,'C');
		$pdf->Ln(); 

		foreach ($datos as  $reserva_item){

			$pdf->Cell(30,9,$reserva_item['id'],1,0,'C'); 
			$pdf->Cell(42,9,$reserva_item['fecha_entrada'],1,0,'C'); 
			$pdf->Cell(42,9,$reserva_item['fecha_salida'],1,0,'C'); 
			$pdf->Cell(30,9,$reserva_item['id_cliente'],1,0,'C');

			$pdf->Ln();
		}

		$pdf->Output('reservas_pdf.pdf' , 'I' );
	}


//reservas exel
	public function reservas_excel(){
		$datos = $this->reservas_model->get_reserva();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();



		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);

		$sheet->getStyle('A1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
		$sheet->getStyle('B1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
		$sheet->getStyle('C1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
		$sheet->getStyle('D1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);

		$sheet->setCellValue('A1','ID');
		$sheet->setCellValue('B1','fecha entrada');
		$sheet->setCellValue('C1', 'fecha salida');
		$sheet->setCellValue('D1', 'id cliente');



		$contador=1;

		foreach ($datos as  $reserva_item){
			$contador++;

			$sheet->setCellValue('A'.$contador,$reserva_item['id']);
			$sheet->setCellValue('B'.$contador,$reserva_item['fecha_entrada']);
			$sheet->setCellValue('C'.$contador,$reserva_item['fecha_salida']);
			$sheet->setCellValue('D'.$contador,$reserva_item['id_cliente']);

		}

		$writer = new Xlsx($spreadsheet);

		$titulo = 'Reservas';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $titulo .'.xlsx"'); 
		header('Cache-Control: max-age=0');


    $writer->save('php://output'); // es para q te lo descargue a ti y no internet
}

//funcion registrar
public function registrar()
{

//funcionalidades q poseen codeigniter
	$this->load->helper('form');
	$this->load->library('form_validation');

	$clientes['clientes'] = $this->reservas_model->get_clientes();
	$clientes['habitaciones'] = $this->reservas_model->get_numero_habitaciones();


	$datos['nombre'] = 'Crear reserva';
//verifica la validacion del formulario
    $this->form_validation->set_error_delimiters("
    					<div class='row'>
						<div class='col-sm-2'></div>
						<div class='col-sm-5'>
						<div class='alert alert-danger' role='alert'>", "</div></div></div>");


	$this->form_validation->set_rules('fecha_entrada','fecha de entrada','required|callback_fecha_disponible');
	$this->form_validation->set_rules('fecha_salida','Fecha salida','required');
	$this->form_validation->set_rules('id_cliente','Nombre Cliente','required');
	$this->form_validation->set_rules('id_habitacion','Id habitacion','required');
	//$this->form_validation->set_rules('precio','Precio','required');




//si la validacion es falsa entra en el if, de lo contrario en el else
	if ($this->form_validation->run() === FALSE)
	{
		$this->load->view('plantillas/header', $datos);//carga la cabecera en la plantilla que luego se observa en la vista

		$this->load->view('reservas/registrar_reserva', $clientes);//carga la iformacion q se encuentra en el controlador crear que posteriormente e observa en la vista 
		$this->load->view('plantillas/footer');//carga el pie en la plantilla que luego se observa en la vista
	}

	else
	{
		$this->reservas_model->set_reservas();
		$this->load->view('plantillas/header', $datos);
		$this->load->view('reservas/resultado_creado');
		$this->load->view('plantillas/footer');//carga el pie en la plantilla que luego se observa en la vista
		$this->reservas_model->get_id();
	}
}

public function eliminar($id){
	$datos['reservas'] = $this->reservas_model->delete_reserva($id);

	$this->load->view('plantillas/header',$datos);
	$this->load->view('reservas/result_eliminado',$datos);
	$this->load->view('plantillas/footer');



}	
public function fecha_disponible($fecha_salida, $fecha_entrada){
	$nueva_fecha_entrada = date('Y-m-d', strtotime($_POST['fecha_entrada']));
	$nueva_fecha_salida = date('Y-m-d', strtotime($_POST['fecha_salida']));

	$fechas_disponible['reservas'] = $this->reservas_model->fecha_disponible($nueva_fecha_entrada, $nueva_fecha_salida);
	
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
			}
		}
		
//funcion modificar con parametro cargado
public function modificar($id = updatereservas) //inicializamos la variable id con el valor updatereservas, de lo contrario 
//coge un valor numerico
{


$datos['nombre'] = 'modificar';// el nombre q aparece en el titulo

//si el id es distinto de pdatehabitaciones entra en este if
//si entra en este if es porque pasa un id valido y se carga automaticamente en el formulario con el dato del habitaciones que queremos modificar
if($id != 'updatereservas'){

//recojemos el id en una variable y lo convertimos en entero
	$id= $this->db->escape((int)$id);
//accedemos a pais_model y recogemos los datos del registro con la condicion id habitacion
	$reservas= $this->reservas_model->get_modificar_reservas($id);

$this->load->view('plantillas/header', $datos);//carga la cabecera en la plantilla que luego se observa en la vista
$this->load->view('reservas/modificar_reserva', compact("reservas"), $datos); //carga la vista con el formulario autocumplementado con el registro  que queremos modificar
$this->load->view('plantillas/footer');//carga el pie en la plantilla que luego se observa en la vista

//si la variable id viene con valor updatereservas entra en este else de abajo
}else{


		$id= $this->db->escape((int)$_POST["id"]);
		$fecha_entrada= $this->db->escape($_POST["fecha_entrada"]);
		$fecha_salida= $this->db->escape($_POST["fecha_salida"]);
		$id_cliente= $this->db->escape((int)$_POST["id_cliente"]);
		//$id_habitacion= $this->db->escape((int)$_POST["id_habitacion"]);


		$this->reservas_model->updatereservas($id,  $fecha_entrada, $fecha_salida, $id_cliente); //realiza el update en la base de datos
		$this->load->view('plantillas/header', $datos);
		$this->load->view('reservas/modificado', $datos); //carga la vista modificado.php con mensaje de confirmacion
		$this->load->view('plantillas/footer');
	}
}

//Función para información completa del cliente
public function info_cliente($id){

	$datos['clientes'] = $this->reservas_model->get_info_cliente($id);
	$datos['título'] = 'Información Cliente';

	$this->load->view('plantillas/header',$datos);
	$this->load->view('reservas/info_cliente',$datos);
	$this->load->view('plantillas/footer');




}

public function recoger_id()
{
	$datos['reservas'] = $this->reservas_model->get_clientes();

}



public function detalles()
{
	$datos['reservas'] = $this->reservas_model->get_id();



}


 // devuelve clientes
public function reservas_buscador(){

      // busca a medida q se va tecleando en el input
	$buscarTermino = $this->input->post('buscarTermino');

      // consulta a la bd y pasa por parametro lo escrito en el input
	$respuesta = $this->reservas_model->reservas_buscador($buscarTermino);

      echo json_encode($respuesta); //formato json
}


 
}