<?php

/************************
 * Exercícios da Aula 4 *
 ************************/

// 1 - Defina um Array numérico com vários valores à escolha.

$data = array(10, FALSE, 8.9, "test");

// 1.1 - Utilizando um ciclo FOR, itere o Array criando no ponto 1, imprimindo os valores contidos neste (um por linha).

echo "Exercício 1.1";
echo "<br/><br/>";

$size = count($data);

for ($i = 0; $i < $size; $i++) {
	if ($data[$i] === TRUE) {
		echo "TRUE<br/>";
	} else if ($data[$i] === FALSE) {
		echo "FALSE<br/>";
	} else {
		echo $data[$i] . "<br/>";
	}
}

// 1.2 - Imprima o valor do último elemento do Array definido no ponto 1.

echo "<br/><br/><br/>";
echo "Exercício 1.2";
echo "<br/><br/>";

if ($data[$size - 1] === TRUE) {
	echo "TRUE";
} else if ($data[$size - 1] === FALSE) {
	echo "FALSE";
} else {
	echo $data[$size - 1];
}

// 2 - Defina um Array associativo com pelo menos três elementos.

$myData = array(
	"name"	=> "Fábio",
	"age"		=> 31,
	"valid"	=> FALSE
);

// 2.1 - Utilizando um ciclo FOREACH, itere o Array criado no ponto 2, imprimindo os valores contidos neste (um por linha).

echo "<br/><br/><br/>";
echo "Exercício 2.1";
echo "<br/><br/>";

foreach ($myData as $key => $item) {
	if ($item === TRUE) {
		echo $key . ": TRUE<br/>";
	} else if ($item === FALSE) {
		echo $key . ": FALSE<br/>";
	} else {
		echo $key . ": " . $item . "<br/>";
	}
}

// 2.2 - Imprima o tamanho do Array criado no ponto 2.

echo "<br/><br/><br/>";
echo "Exercício 2.2";
echo "<br/><br/>";

echo count($myData);

// 3 - Defina uma função que irá receber 3 valores como parâmetros e irá retornar a soma dos mesmos.

function doSum($a, $b, $c) {
	$result = $a + $b + $c;
	
	return $result;
}

// 3.1 - Utilizando a função definida no ponto 3, imprima a soma de 3 valores.

echo "<br/><br/><br/>";
echo "Exercício 3.1";
echo "<br/><br/>";

echo doSum(10, 20, 30);

// 3.2 - Defina uma função que depois irá utilizar em conjunto com um ciclo à sua escolha para imprimir 20 vezes o seu nome.

echo "<br/><br/><br/>";
echo "Exercício 3.2";
echo "<br/><br/>";

function printName($name) {
	echo $name . "<br/>";
}

for ($i = 0; $i < 20; $i++) {
	printName("Fábio");
}

?>