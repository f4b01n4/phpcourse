<?php

class sessionController {
	
	private $s;
	
	public function __construct() {
		session_start();
		$this->s = $_SESSION;
	}
	
	public function store($var, $value) {
		$_SESSION[$var] = $value;
		
		$this->s = $_SESSION;
	}
	
	public function stored($var) {
		if (isset($_SESSION[$var]))
			return true;
		
		return false;
	}
	
	public function retrieve($var) {
		if ($this->stored($var))
			return $_SESSION[$var];
		
		return null;
	}
	
	public function remove($var) {
		if ($this->stored($var)) {
			unset ($_SESSION[$var]);
			$this->s = $_SESSION;
		}
	}
	
}

?>