<?php
class Farmacia extends EntidadBase{
private $idproducto
private $nomproducto
private $tipoproducto
private $existencia
private $precio
private $visible
public function __construct($adapter){
	$table="farmacia";
	parent::__construct($table,$adapter);
}

public function getIdproducto(){
	return $this-> idproducto;
}	

public function setIdproducto($idproducto){
	$this-> idproducto = $idproducto;
}

public function getNombreproducto(){
	return $this-> nomproducto;
}

public function setNomproducto($nomproducto){
	$this-> nomproducto = $nomproducto;
}

public function getTipoproducto(){
	return $this-> tipoproducto;
}

public function setTipoproducto($tipoproducto){
	$this-> tipoproducto = $tipoproducto;
}

public function getExistencia(){
	return $this-> existencia;
}

public function setExistencia($existencia){
	$this-> existencia=$existencia;
}

public function getPrecio(){
	return $this->precio;
}

public function setPrecio($precio){
	$this-> precio=$precio;
}

public function getVisible(){
	return $this->visible;
}

public function setVisible($visible){
	$this-> visible=$visible;
}

public function save(){
	$query="INSERT INTO farmacia (idproducto, nomproducto, tipoproducto, existencia, precio, visible) VALUES (NULL,
								'".this->nomproducto."',
								'".this->tipoproducto."',
								'".this->existencia."',
								'".this->precio."',
								'".this->visible."');";
		$save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
	}
}
?>