<?php
//ejercicio 1   multiplicacion sumando los numeros

function multiplicar($a, $b ) {

    if ( $b == 0) {
return 0;
}

    return $a + multiplicar ( $a, $b -1, "<br>");
}  

echo multiplicar (5, 3);
echo "<br>";


//ejercicio 2 cuantos caracteres tiene una cadena de texto

function Potencia($b, $e){
    if ($e == 0){
        return 1;
    }

    return $b * Potencia ($b, $e - 1);

}
echo Potencia (2, 3);
echo "<br>";

//ejercicio 3 contar caracteres de una cadena de texto

function contar($P){
if ($P == ""){
return 0;
}
return 1 + contar (substr($P, 1));

}
echo contar("Hola");
echo "<br>";

// ejercicio 4 si una palabra es un palindromo

function esPalindromo($palabra){
    if (strlen($palabra) <= 1) {
    return "Es un palindromo";

} 
if ($palabra[0] != $palabra [strlen($palabra) - 1]){
    return "No es un palindromo";
}  
return esPalindromo(substr($palabra, 1, -1));

}

echo esPalindromo("SOFIA");
echo "<br>";


//ejercicio 5 euclides
function euclides($a, $b) {
    if ($b == 0) {
     return $a;
    }

    return euclides($b, $a % $b);
}

echo euclides(48, 18);
echo "<br>";

//ejercicio 6  Crea una función recursiva que convierta un número decimal a binario.
function Binario($n) {
    if ($n == 0) {
        return "";
    }

    return Binario((int)($n / 2)) . ($n % 2);
}


echo Binario(13); 
echo "<br>";

//ejercicio 7 Realiza una función recursiva que sume todos los elementos de un arreglo.
 function suma ($p) {
     if( count($p) == 0) {
        return 0;
  } 
  return $p[0] + suma( array_slice($p, 1));

 }
 $milista = [1, 2, 3, 4, 5];
echo suma($milista);
echo "<br>";

//saber si un elemento existe en un arreglo
function Arreglo($p, $x) {
    if (count($p) == 0) {
        return "No existe";
    }

    if ($p[0] == $x) {
        return "Existe";
    }

    return Arreglo(array_slice($p, 1), $x);
}

$lista = [4, 8, 15, 16, 23, 42];
echo Arreglo($lista, 16) ;
echo "<br>";


//saber cuantas vocales tiene una palabra
function vocales($p) {
    if (strlen($p) == 0) {
        return 0;
    }

    $letra = strtolower($p[0]);
    if ($letra == 'a' || $letra == 'e' || $letra == 'i' || $letra == 'o' || $letra == 'u') {
        return 1 + vocales(substr($p, 1));
    } else {
        return 0 + vocales(substr($p, 1));
    }
}

echo vocales("Hola"); 
echo "<br>";


// ejercicio 10

function sumarPares($n) {
    if ($n == 0) {
        return 0;
    }

    if ($n % 2 == 0) {
        return $n + sumarPares($n - 1);
    } 
    else {
        return 0 + sumarPares($n - 1);
    }
}

echo sumarPares(5);
?>