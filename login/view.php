<?php
$diccionario = array('subtitle' => array(
	VIEW_SET_LOGIN => 'Crear un nuevo login',
	VIEW_GET_LOGIN => 'Buscar login',
	VIEW_DELETE_LOGIN => 'Eliminar un login',
	VIEW_EDIT_LOGIN => 'Modificar login'),

	'links_menu' => array(
	'VIEW_SET_LOGIN' => MODULO . VIEW_SET_LOGIN .'/',//'VIEW_SET_LOGIN' => 'site_media/html/' . MODULO . VIEW_SET_LOGIN .'.html',//
	'VIEW_GET_LOGIN' => MODULO . VIEW_GET_LOGIN .'/',
	'VIEW_EDIT_LOGIN' => MODULO . VIEW_EDIT_LOGIN .'/',
	'VIEW_DELETE_LOGIN' => MODULO . VIEW_DELETE_LOGIN .'/'),

'form_actions' => array(
	'SET' => '/PW/Hospital/' . MODULO . SET_LOGIN .'/',//MODULO = 'logins/';
	'GET' =>'/PW/Hospital/' . MODULO . GET_LOGIN .'/',//SET_LOGIN = 'set';
	'DELETE' => '/PW/Hospital/' . MODULO . DELETE_LOGIN .'/',
	'EDIT' => '/PW/Hospital/' . MODULO . EDIT_LOGIN .'/'));

function get_template($form = 'get'){
	$file = '../site_media/html/login_' . $form .'.html';
	$template = file_get_contents($file);
	return $template;
}
function render_dinamic_data($html, $data){
	foreach($data as $clave => $valor){
		$html = str_replace('{' . $clave .'}', $valor, $html);
	}
	return $html;
}
function retornar_vista($vista,$data = array()){//set,
	global $diccionario;
	$html = get_template('template');
	$html = str_replace('{subtitulo}',$diccionario['subtitle'][$vista],$html);
	$html = str_replace('{formulario}', get_template($vista),$html);
	$html = render_dinamic_data($html,$diccionario['form_actions']);
	$html = render_dinamic_data($html,$diccionario['links_menu']);
	$html = render_dinamic_data($html,$data);

	// render {mensaje}
	if(array_key_exists('nombre',$data) &&
		array_key_exists('apellido',$data) &&
		$vista==VIEW_EDIT_LOGIN){
		$mensaje = 'Editar login ' . $data ['nombre'] . ' ' . $data ['apellido'];
	}else{
		if(array_key_exists('mensaje',$data)){
			$mensaje = $data['mensaje'];
		}else{
			$mensaje = 'Datos del login:';
		}
	}
	$html = str_replace('{mensaje}',$mensaje,$html);
	print $html;
}
?>
