<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('clientes_model');
        $this->load->helper('url_helper');
        $this->load->library("pagination");
    }
//paginar
    public function index() {
        //llama al modelo y recoge todos los clientes
        $datos['clientes'] = $this->clientes_model->get_cliente();
        $datos['título'] = 'Listado clientes';
        $config = array();//declara un array
        //carga htt://codeignaiter.sp/clientes
        $config["base_url"] = base_url() . "clientes";
        //cuenta todos los clientes
        $config["total_rows"] = $this->clientes_model->get_count();
        //cantidad de registro por paginas
        $config["per_page"] = 5;
        //obtiene el segundo segmento de la url
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
        //carga el array q hemos creado previamente
        $this->pagination->initialize($config);
        //obtiene 5 porque la paginacion lo hemos en rangos de 5 registros
        //http://codeigniter.sp/clientes/5 obtiene el segmento 2 porque se empieza a contar desde "clientes" q seria uno y 5 el el segmento numero 2
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        //crea los links
        $datos["links"] = $this->pagination->create_links();
        //guarda en un array para enviarselo a la vista y metemos configuracion de cantidad de registros por paginas y el segmento obtenido anteriormente
        $datos['clientes'] = $this->clientes_model->get_clientes($config["per_page"], $page);


        $this->load->view('plantillas/header', $datos);
        $this->load->view('clientes/clientes', $datos);
        $this->load->view('plantillas/footer');
    }

    //funcion registrar
    public function registrar() {

//funcionalidades q poseen codeigniter
        $this->load->helper('form');
        $this->load->library('form_validation');


        $datos['nombre'] = 'Crear registro';
//aqui ponemos las clases de bootstrap en caso de error
        $this->form_validation->set_error_delimiters('
            <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-5">
            <div class="alert-danger">', 
            '</div>
            </div>
            </div>'
        );
        $this->form_validation->set_rules('dni', 'DNI', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido1', 'Apellido', 'required');
        $this->form_validation->set_rules('apellido2', '2º Apellido', 'required');
        $this->form_validation->set_rules('dni', 'DNI', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('direccion', 'Dirección', 'required');



//si la validacion es falsa entra en el if, de lo contrario en el else
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('plantillas/header', $datos); //carga la cabecera en la plantilla que luego se observa en la vista
            $this->load->view('clientes/registrar_cliente', $datos); //carga la iformacion q se encuentra en el controlador crear que posteriormente e observa en la vista 
            $this->load->view('plantillas/footer'); //carga el pie en la plantilla que luego se observa en la vista
        } else { // si la validacion es verdadera entra aqui
            $this->clientes_model->set_clientes();
            $this->load->view('plantillas/header', $datos); 
            $this->load->view('clientes/resultado_insertado');
            $this->load->view('plantillas/footer'); 
        }
    }

    public function eliminar($id) {
        $datos['clientes/clientes'] = $this->clientes_model->delete_cliente($id);

        $this->load->view('plantillas/header', $datos);
        $this->load->view('clientes/result_eliminado', $datos);
        $this->load->view('plantillas/footer');
    }

//funcion modificar con parametro cargado
    public function modificar($id = updateclientes) { //inicializamos la variable id con el valor updatecliente, de lo contrario 
//coge un valor numerico


        $datos['nombre'] = 'modificar'; // el nombre q aparece en el titulo
//si el id es distinto de updateclientes entra en este if
//si entra en este if es porque pasa un id valido y se carga automaticamente en el formulario con el dato  que queremos modificar
        if ($id != 'updateclientes') {

//recojemos el id en una variable y lo convertimos en entero
            $id = $this->db->escape((int) $id);
//accedemos a clientes_model y recogemos los datos del registro con la condicion id clientes
            $clientes = $this->clientes_model->get_modificar_clientes($id);


            $this->load->view('plantillas/header', $datos); //carga la cabecera en la plantilla que luego se observa en la vista
            $this->load->view('clientes/modificar_cliente', compact("clientes"), $datos); //carga la vista con el formulario autocumplimentado con el registro del pais que queremos modificar
            $this->load->view('plantillas/footer'); //carga el pie en la plantilla que luego se observa en la vista
//si la variable id viene con valor updatehacliente entra en este else de abajo
        } else {

            $id = $this->db->escape((int) $_POST["id"]);
            $dni = $this->db->escape($_POST["dni"]);
            $nombre = $this->db->escape($_POST["nombre"]);
            $apellido = $this->db->escape($_POST["apellido"]);


            $this->clientes_model->updateclientes($id, $dni, $nombre, $apellido); //realiza el update en la base de datos
            $this->load->view('plantillas/header', $datos);
            $this->load->view('clientes/modificado', $datos); //carga la vista modificado.php con mensaje de confirmacion
            $this->load->view('plantillas/footer');
        }
    }

    





}
