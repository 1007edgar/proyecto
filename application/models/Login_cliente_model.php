<?php

class Login_cliente_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function valida($nombre, $dni){
        $this->db->where('nombre', $nombre);
        $this->db->where('dni', $dni);
        $resultado = $this->db->get('clientes');
        if ($resultado->num_rows()>0) {
            return $resultado->row();
        }
        else {
            return false;
        }
    }
    //Consulta para nombre del cliente y reservas
    public function reservas_cliente($nombre, $dni, $fecha_actual) {
        $this->db->select('reservas.id as id_reserva, reservas.*, clientes.*, habitaciones.*');
        $this->db->from('reservas');
        $this->db->join('clientes', 'reservas.id_cliente=clientes.id', 'left');
        $this->db->join('detalles', 'reservas.id=detalles.id_reservas', 'left');
        $this->db->join('habitaciones', 'detalles.id_habitacion=habitaciones.id');
        $this->db->where('nombre' ,$nombre);
        $this->db->where('dni' ,$dni);
        
        $this->db->where('fecha_salida >' , $fecha_actual);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function reservas_anteriores($nombre, $dni, $fecha_actual){
        $this->db->select('reservas.id as id_reserva, reservas.*, clientes.*, habitaciones.*');
        $this->db->from('reservas');
        $this->db->join('clientes', 'reservas.id_cliente=clientes.id', 'left');
        $this->db->join('detalles', 'reservas.id=detalles.id_reservas', 'left');
        $this->db->join('habitaciones', 'detalles.id_habitacion=habitaciones.id');
        $this->db->where('nombre' ,$nombre);
        $this->db->where('dni' ,$dni);
        
        $this->db->where('fecha_salida <' , $fecha_actual);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function eliminar_reserva($id){
        return $this->db->delete('reservas', ['id' => $id]);
    }
}