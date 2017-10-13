<?php

class Puesto extends EntidadBase{
	private $idpuesto;
	private $tipoempleado;
	private $sueldo;

	public function __construct(){
		$table="puesto";
		parent::__construct($table);
	}

	public function getIdpuesto(){
		return $this-> idpuesto;
	}

	public function setIdpuesto($idpuesto){
		$this-> idpuesto=$idpuesto;
	}

	public function getTipoempleado(){
		return $this-> tipoempleado;
	}

	public function setTipoempleado($tipoempleado){
		$this-> tipoempleado=$tipoempleado;
	}

	public function getSueldo(){
		return $this-> sueldo; 
	}

	public function setSueldo($sueldo){
		$this-> sueldo= $sueldo;
	}

	public function save(){
	$query="INSERT INTO puesto (idpuesto, tipoempleado, sueldo) VALUES (NULL,
								'".this->idpuesto."',
								'".this->tipoempleado."',
								'".this->sueldo."');";
		$save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
	}
}
?>