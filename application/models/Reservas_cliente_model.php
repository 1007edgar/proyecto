<?php
class Reservas_cliente_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function set_cliente($datos_cliente){
        return $this->db->insert('clientes', $datos_cliente);
    }

    public function set_reserva($datos_reserva){
        return $this->db->insert('reservas', $datos_reserva);
    }

    public function set_detalles($id_habitacion){
        $id = $this->db->insert_id();
        $datos_detalle = array(
            'id_habitacion'=>$id_habitacion,
            'id_reservas'=>$id
        );
        return $this->db->insert('detalles', $datos_detalle);

    }
    
    public function resultado_reserva(){

        $id = $this->db->insert_id();
        
        $this->db->select('*');
        $this->db->from('reservas');
        $this->db->join('clientes', 'reservas.id_cliente=clientes.id', 'inner');
        $this->db->join('detalles', 'reservas.id=detalles.id_reservas', 'inner');
        $this->db->join('habitaciones', 'detalles.id_habitacion=habitaciones.id');
        //$this->db->limit($limit, $start);
        $this->db->where('detalles.id_detalle', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function resultado_pdf($id){

        //$id = $this->db->insert_id();
        //echo $id;die;
        $this->db->select('*');
        $this->db->from('reservas');
        $this->db->join('clientes', 'reservas.id_cliente=clientes.id', 'inner');
        $this->db->join('detalles', 'reservas.id=detalles.id_reservas', 'inner');
        $this->db->join('habitaciones', 'detalles.id_habitacion=habitaciones.id');
        //$this->db->limit($limit, $start);
        $this->db->where('reservas.id', $id);
        $query = $this->db->get();

        return $query->result_array();
    }
}