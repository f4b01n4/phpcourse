<?php

error_reporting(E_ALL);
ini_set('display_errors','1');


function debug($var) {
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}

/************************
 * Exercício da Aula 7 *
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

class Client {
	
	private $id			= 0;
	private $name		= "";
	private $email	= "";
	private $phone	= "";
	
	public function __construct($_id, $_name, $_email, $_phone) {
		$this->id			= $_id;
		$this->name		= $_name;
		$this->email	= $_email;
		$this->phone	= $_phone;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function getPhone() {
		return $this->phone;
	}
	
	public function setId($_id) {
		$this->id = $_id;
	}
	
	public function setName($_name) {
		$this->name = $_name;
	}
	
	public function setEmail($_email) {
		$this->email = $_email;
	}
	
	public function setPhone($_phone) {
		$this->phone = $_phone;
	}
	
}

class Basket {
	
	private $client		= null;
	private $products	= array();
	private $total		= 0;
	
	public function setClient($_client) {
		$this->client = $_client;
	}
	
	public function addProduct($_product, $_quantity) {
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
		
		$this->calcTotal();
	}
	
	public function removeProduct($_product) {
		$size = count($this->products);
		
		if ($size > 0) {
			foreach ($this->products as $i => $prod) {
				if ($prod["product"]->getId() == $_product->getId()) {
					unset($this->products[$i]);
					
					$this->calcTotal();
					
					return;
				}
			}
		}
	}
	
	public function changeQuantity($_product, $_quantity) {
		if ($_quantity <= 0)
			$this->removeProduct($_product);
		else {
			$size = count($this->products);
		
			if ($size > 0) {
				foreach ($this->products as $i => $prod) {
					if ($prod["product"]->getId() == $_product->getId()) {
						$prod["quantity"] = $_quantity;
						
						$this->products[$i] = $prod;
						
						break;
					}
				}
			}
			
			$this->calcTotal();
		}
	}
	
	private function calcTotal() {
		$this->total = 0;
		
		$size = count($this->products);
		
		if ($size > 0) {
			foreach ($this->products as $prod) {
				$price		= $prod["product"]->getPrice();
				$quantity	= $prod["quantity"];
				
				$this->total += ($price * $quantity);
			}
		}
	}
	
	public function getTotal() {
		$this->calcTotal();
		
		return $this->total;
	}
	
}

$c	= new Client(1, "Fábio", "fabio@pears.fr", "915877458");
$p1	= new Product(1, "Test Product", 10.9, 100);
$p2	= new Product(2, "Another One", 5.99, 200);

$basket = new Basket();

$basket->setClient($c);
$basket->addProduct($p1, 10);
$basket->addProduct($p2, 20);
$basket->addProduct($p2, 20);
$basket->changeQuantity($p1, 5);
$basket->changeQuantity($p2, 3);
$basket->removeProduct($p1);

echo $basket->getTotal();

debug($basket);

?>