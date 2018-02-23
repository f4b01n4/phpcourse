<?php

error_reporting(E_ALL);
ini_set('display_errors','1');


function debug($var) {
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}

/************************
 * Exercício da Aula 8 *
 ************************/

class Product {
	
	private $id				= 0;
	private $name			= "";
	private $price		= 0;
	private $quantity	= 0;
	
	public function __construct($_id, $_name, $_price, $_quantity) {
		$this->id				= $_id;
		$this->name 		= $_name;
		$this->price 		= $_price;
		$this->quantity = $_quantity;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getPrice() {
		return $this->price;
	}
	
	public function getQuantity() {
		return $this->quantity;
	}
	
	public function setId($_id) {
		$this->id = $_id;
	}
	
	public function setName($_name) {
		$this->name = $_name;
	}
	
	public function setPrice($_price) {
		$this->price = $_price;
	}
	
	public function setQuantity($_quantity) {
		$this->quantity = $_quantity;
	}
	
}

class User {
	
	private $id		= 0;
	private $type	= "";
	
	public function __construct($_id, $_type) {
		$this->id		= $_id;
		$this->type	= $_type;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getType() {
		return $this->type;
	}
	
	public function setId($_id) {
		$this->id = $_id;
	}
	
	public function setType($_type) {
		$this->type = $_type;
	}
	
}

class Admin extends User {
	
	private $name		= "";
	private $phone	= "";
	
	public function __construct($_id, $_type, $_name, $_phone) {
		parent::__construct($_id, $_type);
		
		$this->name		= $_name;
		$this->phone	= $_phone;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getPhone() {
		return $this->phone;
	}
	
	public function setName($_name) {
		$this->name = $_name;
	}
	
	public function setPhone($_phone) {
		$this->phone = $_phone;
	}
	
}

class Manager extends User {
	
	private $name		= "";
	private $phone	= "";
	
	public function __construct($_id, $_type, $_name, $_phone) {
		parent::__construct($_id, $_type);
		
		$this->name		= $_name;
		$this->phone	= $_phone;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getPhone() {
		return $this->phone;
	}
	
	public function setName($_name) {
		$this->name = $_name;
	}
	
	public function setPhone($_phone) {
		$this->phone = $_phone;
	}
	
}

class Warehouse {
	
	private $products	= array();
	
	public function addProduct($user, $_product, $_quantity) {
		if ($user->getType() == "admin") {
			$found	= false;
			$size		= count($this->products);
			
			if ($size > 0) {
				foreach ($this->products as $i => $prod) {
					if ($prod["product"]->getId() == $_product->getId()) {
						$found = true;
						
						$prod["quantity"] = $prod["quantity"] + $_quantity;
						
						$this->products[$i] = $prod;
						
						break;
					}
				}
			}
			
			if ($found == false) {
				$item = array(
					"product"		=> $_product,
					"quantity"	=> $_quantity
				);
				
				$this->products[] = $item;
			}
		}
	}
	
	public function removeProduct($user, $_product) {
		if ($user->getType() == "admin") {
			$size = count($this->products);
			
			if ($size > 0) {
				foreach ($this->products as $i => $prod) {
					if ($prod["product"]->getId() == $_product->getId()) {
						unset($this->products[$i]);
						
						return;
					}
				}
			}
		}
	}
	
	public function changeQuantity($user, $_product, $_quantity) {
		if ($_quantity <= 0)
			$this->removeProduct($user, $_product);
		else {
			$size = count($this->products);
		
			if ($size > 0) {
				foreach ($this->products as $i => $prod) {
					if ($prod["product"]->getId() == $_product->getId()) {
						$diff = abs($prod["quantity"] - $_quantity);
						
						if ($user->getType() == "admin" || ($user->getType() == "manager" && $diff <= 100)) {
							$prod["quantity"] = $_quantity;
						
							$this->products[$i] = $prod;
						}
						
						break;
					}
				}
			}
		}
	}
	
}

$c	= new Admin(1, "admin", "Fábio", "915877458");
$p1	= new Product(1, "Test Product", 10.9, 100);
$p2	= new Product(2, "Another One", 5.99, 200);

$warehouse = new Warehouse();

$warehouse->addProduct($c, $p1, 10);
$warehouse->addProduct($c, $p2, 20);
$warehouse->addProduct($c, $p2, 20);
$warehouse->changeQuantity($c, $p1, 5);
$warehouse->changeQuantity($c, $p2, 3);
$warehouse->removeProduct($c, $p1);

debug($warehouse);

?>