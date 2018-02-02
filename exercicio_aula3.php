<?php

/************************
 * Exercícios da Aula 3 *
 ************************/

// 1 - Imprima os números múltiplos de 5 até 50 (inclusive).
// a) Usando um ciclo FOR

echo "Exercício 1. Alínea a)";
echo "<br/><br/>";

for ($i = 5; $i <= 50; $i = $i + 5) {
	echo $i . "<br/>";
}

// b) Usando um ciclo WHILE

echo "<br/><br/><br/>";
echo "Exercício 1. Alínea b)";
echo "<br/><br/>";

$i = 5;

while ($i <= 50) {
	echo $i . "<br/>";
	$i = $i + 5;
}

// 2 - Para os números de 1 a 50, imprima "Múltiplo" ou "Não Múltiplo", caso o número seja ou não múltiplo de 7, respectivamente.

echo "<br/><br/><br/>";
echo "Exercício 2";
echo "<br/><br/>";

for ($i = 1; $i <= 50; $i++) {
	if ($i % 7 == 0) {
		echo $i . ": Múltiplo<br/>";
	} else {
		echo $i . ": Não Múltiplo<br/>";
	}
}

// 3 - Para uma variável $a = "123456", imprima "Password Correcta" caso o valor seja "123456" ou "Password Errada" para os restantes casos.

echo "<br/><br/><br/>";
echo "Exercício 3";
echo "<br/><br/>";

$a = "123456";

if ($a == "123456") {
	echo "Password Correcta";
} else {
	echo "Password Incorrecta";
}

?>
