<?php

error_reporting(E_ALL);
ini_set('display_errors','1');

function debug($var) {
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}

/************************
 * Exercícios da Aula 6 *
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
	
	// TODO - neste método ainda é necessário efectuar o cálculo do $total
	public function addProduct($_product, $_quantity) {
		$found	= false;
		$size		= count($this->products);
		
		// Verificação extra. Antes de se fazer um iteração, deve-se verificar se o $size é maior que 0
		if ($size > 0) {
			for ($i = 0; $i < $size; $i++) {
				$prod = $this->products[$i];
				
				// Neste caso, em vez de compararmos o objecto Product inteiro, comparamos só os Id's visto que estes identificam unicamente um produto (não há dois produtos com o mesmo id)
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
	
	// TODO - este método irá permitir remover um produto do Basket. Não esquecer que também terá de efectuar o cálculo do $total
	public function removeProduct($_product) {
		
	}
	
	// TODO - neste método ainda é necessário efectuar o cálculo do $total
	// TODO - quando $_quantity for 0 o produto deve ser removido do Basket
	public function changeQuantity($_product, $_quantity) {
		$size = count($this->products);
		
		// Verificação extra. Antes de se fazer um iteração, deve-se verificar se o $size é maior que 0
		if ($size > 0) {
			for ($i = 0; $i < $size; $i++) {
				$prod = $this->products[$i];
				
				// Neste caso, em vez de compararmos o objecto Product inteiro, comparamos só os Id's visto que estes identificam unicamente um produto (não há dois produtos com o mesmo id)
				if ($prod["product"]->getId() == $_product->getId()) {
					$prod["quantity"] = $_quantity;
					
					$this->products[$i] = $prod;
					
					break;
				}
			}
		}
	}
	
	// TODO - este método irá retornar o $total actual
	public function getTotal() {
		
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

debug($basket);

?>