<?php

class defaultActionController extends baseController {

  public function __construct($domain, $controller, $action) {
    parent::__construct($domain, $controller, $action);
  }
	
	public function indexAction() {
	  $this->display();
  }

}