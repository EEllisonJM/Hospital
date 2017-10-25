<?php
class Area extends EntidadBase{
	private $idarea;
	private $nombre;
	private $descripcion;
	private $visible;

	  public function __construct() {
        $table="area";
        parent::__construct($table);
    }

    public function getIdArea(){
    	return $this->idarea;
    }

    public function setIdarea($idarea){
    	$this->idarea=$idarea;
    }

    public function getNombre(){
    	return $this->nombre;
    }

    public function setNombre($nombre){
    	$this->nombre=$nombre;
    }

    public function getDescripcion(){
    	return $this->descripcion;
    }

    public function setDescripcion($descripcion){
    	$this->descripcion=$descripcion;
    }

    public function getVisible(){
    	return $this->visible;
    }

    public function setVisible($visible){
    	$this->visible=$visible;
    }

    public function save(){
	$query="INSERT INTO area (idarea, nombre, descripcion, visible) VALUES (NULL,
								'".this->idarea."',
								'".this->nombre."',
								'".this->descripcion."',
								'".this->visible."');";
		$save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
	}

}
?>