<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    
    function login() {
        $datos['titulo'] = 'Hotel MAUVA iniciar sesion';
        $this->load->view("login", $datos);
    }

    function login_validacion() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');
        if ($this->form_validation->run()) {

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            //carga el modelo login_model en esta funcion de validacion
            $this->load->model('main_model');
            // crea un array de sesion con los datos del usuario
            if ($this->main_model->login($username, $password)) {
                $session_data = array(
                    'username' => $username
                );
                $this->session->set_userdata($session_data);
                //llama a la funcion entrar
                redirect(base_url() . 'main/entrar');
            } else {
                $this->session->set_flashdata('error', 'Invalido usuario y contraseña');
                redirect(base_url());
            }
        } else {

            $this->login();
        }
    }
    
    function entrar() {
        if ($this->session->userdata('username') != '') {
            redirect(base_url() . 'inicio');
        } else {
            redirect(base_url() . 'main/login');
        }
    }
// destruye las variables de sesion
    function salir() {
        $this->session->unset_userdata('username');
        redirect(base_url());
    }

}

?>