<?php
require_once('constants.php');
require_once('model.php');
require_once('view.php');

function handler(){
	$event = VIEW_GET_USER;//const VIEW_GET_USER = 'buscar';
	$uri = $_SERVER['REQUEST_URI'];//Obtener todo lo que hay después del dominio[despues de 'localhost']

	$peticiones = array(
		SET_USER,//set
		GET_USER,//get
		DELETE_USER,//delete
		EDIT_USER,//edit
		VIEW_SET_USER,
		VIEW_GET_USER,
		VIEW_DELETE_USER,
		VIEW_EDIT_USER);

	foreach($peticiones as $peticion){
	//usuarioset_
		$uri_peticion = MODULO . $peticion . '/';//$uri_peticion = MODULO . $peticion . '_';
		if(strpos($uri,$uri_peticion) == true){//Buscar [$uri_peticion] en [$uri]
			$event = $peticion;
		}
	}
	$user_data = helper_user_data();
	$usuario = set_obj();
		switch($event){
			case SET_USER://set
			$usuario -> set($user_data);
			$data = array('mensaje' => $usuario -> mensaje);
            retornar_vista(VIEW_SET_USER,$data);
            break;

            case GET_USER://get
            $usuario -> get($user_data);
            $data =array(
            	'nombre' => $usuario -> nombre,
            	'apellido' => $usuario-> apellido,
            	'email' => $usuario-> email);
            retornar_vista(VIEW_EDIT_USER,$data);
            break;
            case DELETE_USER:
            $usuario -> delete($user_data['email']);
            $data = array('mensaje' => $usuario->mensaje);
            retornar_vista(VIEW_DELETE_USER,$data);
            break;
            case EDIT_USER:
            $usuario -> edit ($user_data);
            $data = array('mensaje' => $usuario -> mensaje);
            retornar_vista(VIEW_GET_USER,$data);
            break;
            default :
            retornar_vista($event);
        }
    }

function set_obj(){
	$obj = new Usuario();
	return $obj;
}

function helper_user_data(){
	$user_data = array();
	if($_POST){
		if(array_key_exists('nombre',$_POST)){
			$user_data['nombre'] = $_POST['nombre'];
		}
		if(array_key_exists('apellido',$_POST)){
			$user_data['apellido'] = $_POST['apellido'];
		}
		if(array_key_exists('email',$_POST)){
			$user_data['email'] = $_POST['email'];
		}
		if(array_key_exists('clave',$_POST)){
			$user_data['clave'] = $_POST['clave'];
		}
	}else
	if($_GET){
		if(array_key_exists('email',$_GET)){
			$user_data = $_GET['email'];
		}
	}
	return $user_data;
}

handler();
?>
