<?php

error_reporting(E_ALL);
ini_set('display_errors','1');

function debug($var) {
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}

/************************
 * Exercícios da Aula 5 *
 ************************/

// 1 - Defina uma classe que após ser inicializada escreva a mensagem: "A classe foi inicializada com sucesso."

class Something {
	
	public function __construct() {
		echo "The class has been initialized with success<br/>";
	}
	
}

$some = new Something();

// 2 - Defina uma classe que contenha duas propriedades privadas (nome e idade).
// 2.1 - Altere a classe de modo a ser possível inicializar o objecto passando directamente os valores do nome e da idade aquando da sua criação.
// 2.2 - Adicione um método à classe que imprima directamente o valor da propriedade nome.
// 2.3 - Adicione um método à classe que devolva o valor da propriedade idade.

class Something2 {
	
	private $name	= null;
	private $age	= null;
	
	public function __construct($_name, $_age) {
		$this->name	= $_name;
		$this->age	= $_age;
	}
	
	public function printName() {
		echo $this->name . "<br/>";
	}
	
	public function getAge() {
		return $this->age;
	}
	
}

$some2 = new Something2("Fábio", 31);
$some2->printName();
echo $some2->getAge();

// 3 - Crie as seguintes classes, fazendo as ligações necessárias entre as mesmas de forma a que se verifiquem as regras descritas:

class Object {
	
	private $id		= null;
	private $name	= null;
	
	public function __construct($_id, $_name) {
		$this->id		= $_id;
		$this->name	= $_name;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getName() {
		return $this->name;
	}
	
}

class Article extends Object {
	
	private $availability	= null;
	private $price				= null;
	
	public function __construct($_id, $_name, $_availability, $_price) {
		parent::__construct($_id, $_name);
		
		$this->availability	= $_availability;
		$this->price				= $_price;
	}
	
	public function getAvailability() {
		return $this->availability;
	}
	
	public function getPrice() {
		return $this->price;
	}
	
}

class Book extends Article {
	
	private $pages	= null;
	
	public function __construct($_id, $_name, $_availability, $_price, $_pages) {
		parent::__construct($_id, $_name, $_availability, $_price);
		
		$this->pages = $_pages;
	}
	
	public function getPages() {
		return $this->pages;
	}
	
}

class Notebook extends Article {
	
	private $type	= null;
	
	public function __construct($_id, $_name, $_availability, $_price, $_type) {
		parent::__construct($_id, $_name, $_availability, $_price);
		
		$this->type = $_type;
	}
	
	public function getType() {
		return $this->type;
	}
	
}

$book			= new Book(1, "Some Book Title", TRUE, 9.99, 20);
$notebook	= new Notebook(2, "My Personal Notes", TRUE, 5.75, "lines");

debug($book);
debug($notebook);

echo $book->getName();

?>