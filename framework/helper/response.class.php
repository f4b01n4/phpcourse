<?php

require('Smarty/Smarty.class.php');

class responseController {

  private static $instance;
	private $smarty;
	private $layout;
  private $appName;
	private $publicUrl;
	private $title;

  public static function getInstance($_domain, $_appName) {
    if (!isset(self::$instance))
      self::$instance = new responseController($_domain, $_appName);

    return self::$instance;
  }

  private function __construct($_domain, $_appName) {
    $this->smarty = new Smarty();
		
		$this->smarty->setTemplateDir(getcwd() . '/view');
		$this->smarty->setCompileDir(getcwd() . '/tmp/templates_c');
		$this->smarty->setCacheDir(getcwd() . '/tmp/cache');
		$this->smarty->setConfigDir(getcwd() . '/tmp/configs');
		
		$this->setLayout("default");

    $this->publicUrl	= $_domain;
    $this->appName		= $_appName;
  }
	
	public function setLayout($name) {
		$this->layout = $name;
	}
	
	public function setTitle($name) {
		$this->title = $name;
	}
	
	public function assign($var, $data) {
		$this->smarty->assign($var, $data);
	}
	
	public function display($page) {
	  $this->smarty->assign('appName', $this->appName);
		$this->smarty->assign('publicUrl', $this->publicUrl);
		$this->smarty->assign('title', $this->title);
		$pageContent = $this->smarty->fetch($page . '.tpl');
		$this->smarty->assign("pageContent", $pageContent);
		$this->smarty->display("../layout/" . $this->layout . ".tpl");
	}
	
	public function fetch($page) {
    $this->smarty->assign('publicUrl', $this->publicUrl);

		return $this->smarty->fetch($page . '.tpl');
	}

	public function fetchString($string) {
	  return $this->smarty->fetch("string:" . $string);
  }
	
	public function sendJSON($data) {
		echo json_encode($data);
	}
	
}

?>