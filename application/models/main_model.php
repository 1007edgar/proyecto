<?php  
 class Main_model extends CI_Model  
 {  
      function login($username, $password)  
      {  
        //Selecciona todos los usuarios de la tabla administradores y como parametro pasamos la condicion username y password, si hay coincidencias retornamos true, en caso contrario false
  $query = $this->db->query("SELECT usuario, password 
    FROM administradores 
    WHERE usuario='$username' AND password='$password' 
    "); //el row devuelve un solo registro

//devuelve la informacion de la consulta
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
      }  
 }  