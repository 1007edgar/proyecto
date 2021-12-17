<?php
class Reservas_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_reserva()
    {

        $query = $this->db->get('reservas');
        return $query->result_array();
        
    }

    public function set_reservas()
    {

//helper(url)reaplaza los los espacios por guiones y q todo este en minusculas
      $this->load->helper('url');


 //se recoge los datos en un array y se guarda en la variable datos 
      $datos = array(
        'fecha_entrada' => $this->input->post('fecha_entrada'),
        'fecha_salida'=> $this->input->post('fecha_salida'),
        'id_cliente'=> $this->input->post('id_cliente'),
       //comento las lineas de abajo poque reservas no tiene estas columnas
      //  'nombre_cliente'=> $this->input->post('nombre_cliente'),
      //   'precio'=> $this->input->post('precio')
       
       

    );
//  var_dump($this->input->post);
 // die();

//realiza la insercion en la base de datos
      return $this->db->insert('reservas', $datos);
  }

  public function delete_reserva($id){
   return $this->db->delete('reservas', ['id'=>$id]);

}



public function get_modificar_reservas(int $id)
{

//realiza la consulta la base de datos con el id del cliente que pasamos por parametro   
  $query = $this->db->query("SELECT id, fecha_entrada, fecha_salida, id_cliente FROM reservas WHERE id = {$id}")->row(); //el row devuelve un solo registro

//devuelve la informacion de la consulta
  return $query;


}

//es un modelo para pdf
public function get_modificar_reserva()
{

//realiza la consulta la base de datos con el id del cliente que pasamos por parametro   
  $query = $this->db->query("SELECT id, fecha_entrada, fecha_salida, id_cliente FROM reservas"); //el row devuelve un solo registro

//devuelve la informacion de la consulta
  return $query->result_array();


}


//Función de borrar los datos de la tabla habitaciones con parametro cargado.
public function updatereservas(int $id, string $fecha_entrada, string $fecha_salida, int $id_cliente)
{


//accede a la base de datos y modifica la informacion especificada     
  $query= $this->db->query("UPDATE reservas SET id = {$id}, fecha_entrada= {$fecha_entrada}, fecha_salida = {$fecha_salida}, id_cliente = {$id_cliente} WHERE id = {$id}");

//devuelve la informacion modificada.
  return $query;
  


}

public function get_clientes()
{

    $query = $this->db->get('clientes');
    return $query->result_array();
    
}

//Función para retornar datos del cliente
public function get_info_cliente($id){
  
           $this->db->where('id',$id);
  $query = $this->db->get('clientes');

    return $query->result_array();
}

public function get_numero_habitaciones()
{

    $query = $this->db->get('habitaciones');
    return $query->result_array();
    
}
public function get_id()
{

        $id_habitaciones = $this->input->post('id_habitacion');//id_habitacion es lo que tengo en mi checvox
        $id_reserva= $this->db->insert_id('reservas');//recupera el ultimo id insertado en la tabla reserva
        $datos = array(

            'id_habitacion' => $this->input->post('id_habitacion'),
        'id_reservas' => $this->db->insert_id('id')//esta llamando al ultimo id que hemos ingresado automaticamente
    );

        return $this->db->insert('detalles', $datos);
        
    }

    public function fecha_disponible($fecha_salida, $fecha_entrada){
      //$fecha_entrada = $this->input->post('fecha_entrada');
      //$fecha_salida = $this->input->post('fecha_salida');
      $nueva_fecha_entrada = date('Y-m-d', strtotime($_POST['fecha_entrada']));
	  $nueva_fecha_salida = date('Y-m-d', strtotime($_POST['fecha_salida']));
      if( strtotime($nueva_fecha_entrada) >=  strtotime($nueva_fecha_salida)){
       $query = "invalido";
       return $query;


      }else{
        //$habitacion_disponible = $this->reservas_model->habitaciones_disponibles()
        
          $query = $this->db->query("SELECT * FROM reservas WHERE fecha_entrada >= '".$nueva_fecha_entrada."'  AND fecha_salida <= '".$nueva_fecha_salida."'");
          return $query->result_array();
      }

    } 

    public function habitaciones_disponibles($id_habitacion,$nueva_fecha_entrada){
        //echo var_dump($id_habitacion);die();
        $this->db->select('*');
        $this->db->from('reservas');
        $this->db->join('detalles', 'reservas.id=detalles.id_reservas', 'left');
        $this->db->where('id_habitacion', $id_habitacion);
        $this->db->where('fecha_entrada', $nueva_fecha_entrada);
        $query = $this->db->get();

        return $query->result_array();
    }

public function get_count() {
    return $this->db->count_all('reservas');
}

//Consulta para nombre del cliente y precios
public function get_reservas($limit, $start) {
    $this->db->select('reservas.id as id_reserva, reservas.*, clientes.*, habitaciones.*');
    $this->db->from('reservas');
    $this->db->join('clientes', 'reservas.id_cliente=clientes.id', 'left');
    $this->db->join('detalles', 'reservas.id=detalles.id_reservas', 'left');
    $this->db->join('habitaciones', 'detalles.id_habitacion=habitaciones.id');
    $this->db->limit($limit, $start);
    $query = $this->db->get();



    return $query->result_array();
}


function reservas_buscador($buscarTermino=""){

     // busca en la base de datos el nombre con lo escrito en el input
   $this->db->select('*');
   $this->db->where("nombre like '%".$buscarTermino."%' ");

     //selecciona todos los clientes y se devuelve en formato array
   $fetched_records = $this->db->get('clientes');
   $clientes = $fetched_records->result_array();

     // crea un array con los resultados devueltos en la consulta anterior
   $data = array();
   
   foreach($clientes as $cliente){
    $data[] = array("id"=>$cliente['id'], "text"=>$cliente['nombre']);
}
return $data;
}



}