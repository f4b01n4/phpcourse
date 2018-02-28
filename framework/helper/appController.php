<?php

require("helper/baseController.php");

class appController {
	
	private $controller;
	private $action;
	private $domain;
	
	public function __construct($_controller, $_action, $_domain) {
		$this->controller = $_controller;
		$this->action     = $_action;
		$this->domain     = $_domain;
	}
	
	public function route() {
		if (file_exists("controller/" . $this->controller . "ActionController.php")) {
			require("controller/" . $this->controller . "ActionController.php");
			
			$class = $this->controller . "ActionController";
			$actionController = new $class($this->domain, $this->controller, $this->action);
			
			if (method_exists($actionController, $this->action . "Action")) {
				$action = $this->action . "Action";
				call_user_func(array($actionController, $action));
			} else
        header('Location: ' . $this->domain . '/index.php?controller=default&action=notFound');
		} else
      header('Location: ' . $this->domain . '/index.php?controller=default&action=notFound');
	}
	
}

?>