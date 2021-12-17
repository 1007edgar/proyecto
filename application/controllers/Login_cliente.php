<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_cliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_cliente_model');
        $this->load->model('reservas_model');
        $this->load->helper('url_helper');

    }

    public function index(){
        $this->load->view('public/header_public');
        $this->load->view('login_cliente/cliente');
        $this->load->view('public/footer_public');
    }

    public function validar(){
        date_default_timezone_set("Europe/Madrid");
        

        $this->load->library('form_validation');
         $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('dni', 'DNI', 'required');
        if ($this->form_validation->run()==FALSE) {
            echo "<script>alert('Datos incorrectos'); window.location.href='http://hotelmauva.com/login_cliente';</script>";
        }
        else{
            $nombre = $this->input->post('nombre');
            $dni = $this->input->post('dni');
            $fecha_actual = date("d-m-Y");
            $respuesta = $this->login_cliente_model->valida($nombre, $dni, $fecha_actual);
            if ($respuesta) {
                echo "<script>alert('BIENVENIDO! {$nombre}'); </script>";
                $cliente_sesion = array(
                    "nombre"=> $respuesta->nombre,
                    "dni"=> $respuesta->dni,
                    "login" => TRUE
                );
                $this->session->set_userdata($cliente_sesion);
                $datos['titulo']= "Reservas";
                $fecha_actual = date('Y-m-d');
                $datos['reservas'] = $this->login_cliente_model->reservas_cliente($nombre, $dni,$fecha_actual);
                $datos['reservas_anteriores'] = $this->login_cliente_model->reservas_anteriores($nombre, $dni,$fecha_actual);
                
                $this->load->view('public/header_public');
                $this->load->view('login_cliente/reservas_de_cliente.php',$datos);
                $this->load->view('public/footer_public');
            }
            else{
                echo "<script>alert('Error! Datos incorrectos'); window.location.href='http://hotelmauva.com/login_cliente';</script>";
            }
        }
    }
    function salir() {
        $this->session->unset_userdata('nombre');
        redirect(base_url() . '/');
        //echo "<script>alert('Sesión cancelada'); window.location.href='http://hotelmauva.com/';</script>";
    }

    public function eliminar_reserva($id){

        $this->login_cliente_model->eliminar_reserva($id);
    }
}