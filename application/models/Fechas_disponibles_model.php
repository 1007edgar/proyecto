<?php

class Fechas_disponibles_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function fecha_disponible($fecha_entrada, $fecha_salida) {


       // $fecha_entrada = $this->input->post('fecha_entrada');
       // $fecha_salida = $this->input->post('fecha_salida');
        if (($fecha_entrada == "") || ($fecha_salida == "")) {
            $query = "vacio";
            return $query;
        } else if (strtotime($fecha_entrada) >= strtotime($fecha_salida)) {
            $query = "invalido";
            return $query;
        } else {
            $f_entrada = date("Y-m-d", strtotime($fecha_entrada));
            $f_salida = date("Y-m-d", strtotime($fecha_salida));

            $query = $this->db->query("SELECT * FROM reservas WHERE fecha_entrada >= '" . $f_entrada . "'  AND fecha_salida <= '" . $f_salida . "'");

            return $query->result_array();
        }
    }

    public function habitaciones() {

        $query = $this->db->query("SELECT id FROM habitaciones");

        $array2 = $query->result_array();
        $arr2 = array_map(function($value) {
            return $value['id'];
        }, $array2);


        return $arr2;
    }

    public function habitacion_reservada($nueva_fecha_entrada, $nueva_fecha_salida) {

        $query = $this->db->query("SELECT id_habitacion FROM reservas left join detalles on reservas.id = detalles.id_reservas WHERE fecha_entrada>='" . $nueva_fecha_entrada . "' and fecha_salida>='" . $nueva_fecha_entrada . "' and fecha_entrada<='" . $nueva_fecha_salida . "'");
        //return $query->result_array();

        $array1 = $query->result_array();
        $arr1 = array_map(function($value) {
            return $value['id_habitacion'];
        }, $array1);

        return $arr1;
    }

}
