<?php
class MySQL{
	private $conexion;
	private $total_consultas;
	 function __construct($schema="") {

		if (! isset ( $this->conexion )) {
			
			//$schema="xtc";
			$schema="u323190948_fashi";
			// Create connection
			//$this->conexion = new mysqli("192.185.131.129", "fashiong_u323190", "1234567890", "fashiong_u323190948");
			//$this->conexion = new mysqli("localhost", "u323190948_fashi", "1234567890", $schema);
			// Create connection .mx
			$this->conexion = new mysqli("localhost", "fashiong_u323190", "1234567890", 'fashiong_u323190948');
			//$this->conexion = new mysqli("sql126.main-hosting.eu", "u323190948_fashi", "1234567890", $schema);
			//mysql_query("SET NAMES 'utf8'");
			// Check connection
			if ($this->conexion->connect_error) {
				die("Connection failed: " . $this->conexion->connect_error);
				error_log($this->conexion->connect_error, 0);
			}
				

		}
	}
	

	
	public function getConexion() {
		return $this->conexion;
	}

	
	public function closeSession(){
		$this->conexion->close();
	}

	
	
	
	
}
?>