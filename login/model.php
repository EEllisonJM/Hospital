<?php
# Importar modelo de abstracción de base de datos
require_once('../core/db_abstract_model.php');
class Usuario extends DBAbstractModel {
  ############################### PROPIEDADES ################################
  public $userName;
  public $password;
  public $type;
  private $clave;
  protected $id;
  ################################# MÉTODOS ##################################
  # Traer datos de un usuario
  public function get($user_type = ''){
    if($user_type != ''){
      $this -> query = "
      SELECT id, userName, password, type, clave
      FROM usuarios
        WHERE type = '$user_type'";
      $this -> get_results_from_query();
    }
    if(count($this -> rows) == 1){
      foreach($this->rows[0] as $propiedad => $valor){
        $this->$propiedad=$valor;
      }
      $this->mensaje = 'Usuario encontrado';
    }else{
         $this->mensaje = 'Usuario no encontrado';
    }
  }
   # Crear un nuevo usuario
  public function set($user_data = array()){
    if(array_key_exists('type',$user_data)){
      $this->get($user_data['type']);
      if($user_data['type'] != $this-> type){
        foreach($user_data as $campo => $valor){
          $$campo = $valor;
        }
        $this->query ="
        INSERT INTO usuarios
        (userName, password, type, clave)
        VALUES ('$userName', '$password', '$type', '$clave')";
        $this->execute_single_query();
        $this->mensaje = 'Usuario agregado exitosamente';
      }else{
        $this->mensaje = 'El usuario ya existe';
      }
    }else{
      $this->mensaje = 'No se ha agregado al usuario';
    }
  }
  # Modificar un usuario
  public function edit($user_data = array()){
    foreach($user_data as $campo => $valor){
      $$campo = $valor;
    }
    $this->query ="
    UPDATE usuarios
    SET userName='$userName', password='$password',  clave='$clave'
    WHERE type = '$type'";
    $this->execute_single_query();
    $this->mensaje = 'Usuario modificado';
  }
   # Eliminar un usuario
   public function delete($user_type = ''){
     $this->query  = "
     DELETE FROM usuarios
     WHERE type = '$user_type'";
     $this->execute_single_query();
     $this->mensaje = 'Usuario eliminado';
   }
   # Método constructor
   function __construct(){
     $this->db_name = 'my_db';
   }
    # Método destructor del objeto
   /*function __destruct(){
     unset($this);
   }*/
}
?>
