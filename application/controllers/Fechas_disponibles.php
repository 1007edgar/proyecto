<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fechas_disponibles extends CI_Controller {

    public function __construct() {
        parent::__construct(); //Método constructor
        $this->load->model('fechas_disponibles_model');
        $this->load->model('reservas_model'); //Recupera los datos a través de el modelo
        $this->load->helper('url_helper'); //Para trabajar con URL.
    }

    public function index() {

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $fecha_entrada = $this->form_validation->set_rules('fecha_entrada', 'Fecha_entrada', 'required|callback_fecha');
        $fecha_salida = $this->form_validation->set_rules('fecha_salida', 'Fecha_salida', 'required');

        if ($this->form_validation->run() === FALSE) {//Condición de validación de entrada de datos

            $mensaje['error'] = 'Rellenar todos los campos';
            $this->load->view('public/header_public');
            $this->load->view('public/mauva1', $mensaje);
            $this->load->view('public/footer_public');

            echo json_encode(validation_errors());
            exit();
        } else {


            $fecha_entrada = $this->input->post('fecha_entrada');
            $fecha_salida = $this->input->post('fecha_salida');

            $this->session->set_userdata('fecha_entrada', $fecha_entrada);
            $this->session->set_userdata('fecha_salida', $fecha_salida);
            $datos['habitaciones'] = $this->reservas_model->get_numero_habitaciones();

            $this->load->view('public/header_public');
            $this->load->view('reservas_cliente/formulario_reserva', $datos);
            $this->load->view('public/footer_public');
        }
    }

    public function formulario_reserva() {
        $datos['habitaciones'] = $this->reservas_model->get_numero_habitaciones();

        $this->load->view('public/header_public');
        $this->load->view('reservas_cliente/formulario_reserva', $datos);
        $this->load->view('public/footer_public');
    }

    public function fecha($fecha_entrada) {

        $fecha_entrada = date('Y-m-d', strtotime($fecha_entrada));
        $fecha_salida = date('Y-m-d', strtotime($_POST['fecha_salida']));

        $fechas_disponible['reservas'] = $this->fechas_disponibles_model->fecha_disponible($fecha_entrada, $fecha_salida);

        if (!empty($fechas_disponible['reservas'])) {//Realizando comparación con una cadena
            /** Comprobación de habitaciones libres para una fecha **/
            if ($fechas_disponible['reservas'] == "invalido") {
                $ErrorFechaMayor = "La fecha de salida tiene que ser mayor a la fecha de entrada";
                $this->form_validation->set_message('fecha',
                        "$ErrorFechaMayor");
                $this->session->set_flashdata('error', $ErrorFechaMayor);
                redirect(base_url('#error-busqueda'));
                return FALSE;
            } elseif ($fechas_disponible['reservas'] == 'vacio') {
                $this->session->set_flashdata('error', 'Las fechas de entrada y salida son obligatorias');
                redirect(base_url('#error-busqueda'));
                return FALSE;
            } else {

                $fecha_entrada = date('Y-m-d', strtotime($_POST['fecha_entrada']));
                $fecha_salida = date('Y-m-d', strtotime($_POST['fecha_salida']));

                $habitaciones_reservadas = $this->fechas_disponibles_model->habitacion_reservada($fecha_entrada, $fecha_salida);

                //echo var_dump($habitaciones_reservadas); die;

                $habitaciones = $this->fechas_disponibles_model->habitaciones();
                //echo var_dump($habitaciones);

                $resultado = array();
                $resultado = array_diff($habitaciones, $habitaciones_reservadas);


                //die();
                if (count($resultado) == 0) {
                    $mensaje = "Fechas no disponible";
                    $this->session->set_flashdata('error', $mensaje);
                    redirect(base_url('#error-busqueda'));
                    return false;
                } else {

                    return true;
                }
            }
        }else // No hay reservas en esas fechas
            return TRUE;
    }

}
