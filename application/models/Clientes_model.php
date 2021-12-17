<?php

class Clientes_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
// recoge todos los clientes
    public function get_cliente() {

        $query = $this->db->get('Clientes');
        return $query->result_array();
    }
// funcion q guarda  cliente
    public function set_Clientes() {

//helper(url)reaplaza los los espacios por guiones y q todo este en minusculas
        $this->load->helper('url');
        $slug = url_title($this->input->post('id'), 'dash', TRUE);
        //se recoge los datos en un array y se guarda en la variable datos 
        $datos = array(
            'id' => $this->input->post('id'),
            'dni' => $this->input->post('dni'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2'),
            'email' => $this->input->post('email'),
            'direccion' => $this->input->post('direccion'),
            'telefono' => $this->input->post('telefono')
        );

//realiza la insercion en la base de datos
        return $this->db->insert('Clientes', $datos);
    }
//funcion q borra cliente
    public function delete_cliente($id) {
        return $this->db->delete('clientes', ['id' => $id]);
    }
// funcion q modifica cliente
    public function get_modificar_Clientes(int $id) {

//realiza la consulta la base de datos con el id del cliente que pasamos por parametro   
        $query = $this->db->query("SELECT id, dni, nombre, apellido1, apellido2, telefono, email  FROM Clientes WHERE id = {$id}")->row(); //el row devuelve un solo registro
//devuelve la informacion de la consulta
        return $query;
    }

//Función de borrar los datos de la tabla habitaciomes con parametro cargado.
    public function updateClientes(int $id, string $dni, string $nombre, string $apellido) {


//accede a la base de datos y modifica la informacion especificada     
        $query = $this->db->query("UPDATE Clientes SET id = {$id}, dni= {$dni}, nombre = {$nombre}, apellido1 = {$apellido} WHERE id = {$id}");

//devuelve la informacion modificada.
        return $query;
    }

    //PAGINACION-----------------------------------------------------
   
//funcion contadora, q cuenta todos los clientes, se utiliza para paginacion
    public function get_count() {
        return $this->db->count_all('clientes');
    }
//funcion para paginacion con comienzo y final
    public function get_clientes($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('clientes');

        return $query->result();
    }

}
