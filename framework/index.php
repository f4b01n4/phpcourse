<?php

include("config/conf.php");

function debug($var) {
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}

require("helper/appController.php");

if (isset($_GET['controller'])) {
	$controller = $_GET['controller'];
	unset($_GET['controller']);
	
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
		unset($_GET['action']);
	} else
		$action = "index";
} else {
	$controller = "default";
	$action = "index";
}

date_default_timezone_set('Europe/Lisbon');

$appController = new appController($controller, $action, $domain);

$appController->route();

?>