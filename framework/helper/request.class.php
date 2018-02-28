<?php

class requestController {

  private static $instance;
  private $_post;
  private $_get;
  private $_file;

  public static function getInstance() {
    if (!isset(self::$instance))
      self::$instance = new requestController();

    return self::$instance;
  }

  private function __construct() {
    $this->_post = $_POST;
    $this->_get = $_GET;
    $this->_file = $_FILES;
  }

  public function hasGet($key) {
    return isset($this->_get[$key]);
  }

  public function hasPost($key) {
    return isset($this->_post[$key]);
  }

  public function hasFile($key) {
    return isset($this->_file[$key]);
  }

  public function get($key, $callback = null) {
    if (!$this->hasGet($key)) {
      if (is_callable($callback))
        call_user_func_array($callback, array("can't find '$key' in GET data"));

      return null;
    }

    return $this->_get[$key];
  }

  public function post($key, $callback = null) {
    if (!$this->hasPost($key)) {
      if (is_callable($callback)) {
        call_user_func_array($callback, array("can't find '$key' in POST data"));
      }

      return null;
    }

    return $this->_post[$key];
  }

  public function file($key, $callback = null) {
    if (!$this->hasFile($key)) {
      if (is_callable($callback))
        call_user_func_array($callback, array("can't find '$key' in FILE data"));

      return null;
    }

    return $this->_file[$key];
  }
	
	public function redirect($url) {
		header('Location: '.$url);
	}

}

?>