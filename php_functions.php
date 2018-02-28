<?php

function debug($var) {
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}

$demo = array("a", "b", "c");

/**************************** ARRAYS ****************************/

/*
 * count($array)
 * Conta o número de items presentes no $array
 */

echo "O Array demo tem " . count($demo) . " elementos<br/><br/>";

/*
 * in_array($elemento, $array)
 * Verifica se o $elemento está presente no $array
 */

echo "O elemento \"a\" está presente no Array demo?<br/>";

if (in_array("a", $demo))
	echo "Sim<br/><br/>";
else
	echo "Não<br/><br/>";


/**************************** DATA ****************************/

/*
 * date($formato)
 * Permite formatar uma data com base no $formato fornecido
 */

echo "A data actual é: " . date("Y-m-d H:i:s") . "<br/><br/>";


/**************************** MATH ****************************/

/*
 * abs($valor)
 * Retorna o valor absoluto de $valor
 */

echo "O valor absoluto de -7 é: " . abs(-7) . "<br/><br/>";

/*
 * ceil($valor)
 * Arredonda o $valor para o próximo inteiro (acima)
 */

echo "O ceil de 7.123 é: " . ceil(7.123) . "<br/><br/>";

/*
 * floor($valor)
 * Arredonda o $valor para o próximo inteiro (abaixo)
 */

echo "O floor de 7.123 é: " . floor(7.123) . "<br/><br/>";

/*
 * round($valor)
 * Arredonda o $valor seguindo as regras standard de arredondamento
 */

echo "O round de 7.123 é: " . round(7.123) . "<br/><br/>";

/*
 * cos($valor)	: retorna o cosseno de $valor
 * sin($valor)	: retorna o seno de $valor
 * tan($valor)	: retorna a tangente de $valor
 * sqrt($valor)	: retorna a raíz quadrada de $valor
 * pi()					: retorna o valor de PI
 * rand()				: retorna um inteiro aleatório
 */


/**************************** STRINGS ****************************/

/*
 * explode($separador, $string)
 * Parte a $string num array, em cada $separador
 */

echo "Para a string \"Olá, o meu nome é Fábio.\" Se fizermos um explode pelos espaços, o resultado será:";

debug(explode(" ", "Olá, o meu nome é Fábio"));

/*
 * implode($junta, $array)
 * Ao contrário do explode, o implode junta os elementos de um $array numa string, usando o $junta para os juntar
 */
 
echo "Para o Array demo, se fizermos um implode com vírgulas, o resultado será:<br/>";
echo implode(",", $demo) . "<br/><br/>";

/*
 * lcfirst($string) e ucfirst($string)
 * Converte o primeiro caracter da $string para lower-case / upper-case
 */

echo "O lcfirst de \"OLÁ\" é: " . lcfirst("OLÁ") . "<br/><br/>";

/*
 * ltrim($string, $charlist), rtrim($string, $charlist) e trim($string, $charlist)
 * Remove espaços em brancos do início/fim da $string
 * Se $charlist for fornecido, remove $charlist do início/fim da $string
 */

echo "Usando o ltrim(), a string \" Olá\" ficaria: \"" . ltrim("      Olá") . "\"<br/><br/>";

/*
 * md5($valor)
 * Calcula o MD5 de $valor
 */

echo "O MD5 de \"fabio@pears.fr\" é: " . md5("fabio@pears.fr") . "<br/><br/>";

/*
 * str_replace($search, $replace, $string)
 * Procura todas as ocurrências de $search em $string e substitui-as por $replace
 */
 
echo str_replace("André", "Fábio", "O meu nome é André") . "<br/><br/>";

/*
 * strlen($string)
 * Devolve o comprimento da $string
 */

echo "O comprimento da string \"Olá, o meu nome é Fábio\" é: " . strlen("Olá, o meu nome é Fábio") . "<br/><br/>";

/*
 * strtolower($string) e strtoupper($string)
 * Converte a $string para lower-case / uppper-case
 */
 
echo "O strtoupper() de \"Hello World\" será: " . strtoupper("Hello World") . "<br/><br/>";


/**************************** VÁRIOS ****************************/

/*
 * die($mensagem)
 * Termina a execução do programa com uma $mensagem, opcional.
 */

die("O programa pára de executar aqui.");

?>