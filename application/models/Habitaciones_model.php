<?php
class Habitaciones_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_habitacion()
    {

        $query = $this->db->get('habitaciones');
        return $query->result_array();
 
    }

    public function set_habitaciones()
{

//helper(url)reaplaza los los espacios por guiones y q todo este en minusculas
  $this->load->helper('url');


  $slug = url_title($this->input->post('numero_habitacion'), 'dash', TRUE);


 //se recoge los datos en un array y se guarda en la variable datos 
  $datos = array(
    'numero_habitacion' => $this->input->post('numero_habitacion'),
    'piso'=> $this->input->post('piso'),
    'cantidad_persona'=> $this->input->post('cantidad_persona'),
    'matrimonial'=> $this->input->post('matrimonial'),
    'precio'=> $this->input->post('precio')
 );
//  var_dump($this->input->post);
 // die();

//realiza la insercion en la base de datos
  return $this->db->insert('habitaciones', $datos);
}

    public function delete_habitacion($id){
         return $this->db->delete('habitaciones', ['id'=>$id]);

        }



public function get_modificar_habitaciones(int $id)
{

//realiza la consulta la base de datos con el id del cliente que pasamos por parametro   
  $query = $this->db->query("SELECT id, numero_habitacion, piso, cantidad_persona, matrimonial, precio FROM habitaciones WHERE id = {$id}")->row(); //el row devuelve un solo registro

//devuelve la informacion de la consulta
    return $query;

}

//Función de borrar los datos de la tabla habitaciones con parametro cargado.
public function updatehabitaciones( $id,  $numero_habitacion, $piso,  $cantidad_persona, $matrimonial, $precio)
{


//accede a la base de datos y modifica la informacion especificada     
  $query= $this->db->query("UPDATE habitaciones SET id = {$id}, numero_habitacion= {$numero_habitacion}, piso = {$piso}, cantidad_persona = {$cantidad_persona}, matrimonial = {$matrimonial}, precio = {$precio}  WHERE id = {$id}");

//devuelve la informacion modificada.
    return $query;
    
}
 public function get_count() {
        return $this->db->count_all('habitaciones');
    }

 public function get_habitaciones($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('habitaciones');

        return $query->result_array();
    }

    public function get_count_no_matrimonial() {
       //realiza la consulta la base de datos con el id del cliente que pasamos por parametro   
  $query = $this->db->query("SELECT id, numero_habitacion, piso, cantidad_persona, matrimonial, precio FROM habitaciones WHERE matrimonial = 'no'"); //el row devuelve un solo registro

//devuelve la informacion de la consulta
   return $query->result_array();


    }

     public function get_count_si_matrimonial() {
       //realiza la consulta la base de datos con el id del cliente que pasamos por parametro   
  $query = $this->db->query("SELECT id, numero_habitacion, piso, cantidad_persona, matrimonial, precio FROM habitaciones WHERE matrimonial = 'si'"); //el row devuelve un solo registro

//devuelve la informacion de la consulta
   return $query->result_array();


    }


}