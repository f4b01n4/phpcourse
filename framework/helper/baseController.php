<?php

require("session.class.php");
require("request.class.php");
require("response.class.php");
require("db.class.php");


class baseController {
	
	public $_s;
	public $_rq;
	public $_rs;
	public $db;
	
  public $appName	= "Framework";
  public $domain;
  public $controller;
  public $action;

  public function __construct($domain, $controller, $action) {
		$this->domain			= $domain;
    $this->controller	= $controller;
    $this->action			= $action;
		
		$this->db   = db::getInstance();
		$this->_s   = new sessionController();
    $this->_rq  = requestController::getInstance();
    $this->_rs  = responseController::getInstance($this->domain, $this->appName);
	}
	
	public function redirection($controller = "default", $action = "index") {
    $url = $this->domain . '/index.php?controller=' . $controller . '&action=' . $action;

    return $this->_rq->redirect($url);
  }

  public function display($page = null) {
    if ($page) {
      $_page = explode('/', $page);

      if (count($_page) == 2) {
        $this->_rs->assign("controller", $_page[0]);
        $this->_rs->assign("action", $_page[1]);
      } else {
        $this->_rs->assign("controller", $this->controller);
        $this->_rs->assign("action", $this->action);
      }

      $this->_rs->display($page);
    } else {
      $this->_rs->assign("controller", $this->controller);
      $this->_rs->assign("action", $this->action);
      $this->_rs->display($this->controller . '/' . $this->action);
    }
  }

  public function notFoundAction() {
    $this->display('default/notFound');
  }
	
}

?>