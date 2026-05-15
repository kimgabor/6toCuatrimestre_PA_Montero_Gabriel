<?php
/*$anterior = 0;
$actual = 1;
$n = 10;

echo $anterior . "<br>";
echo $actual . "<br>";

for ($i = 2; $i < $n; $i++){
    $siguiente = $anterior + $actual;
    echo $siguiente . "<br>";

    $anterior = $actual;
    $actual = $siguiente;
}*/

//ejemplo fibonacci
//funcion recursiva
function contar($arreglo, $numeroBuscado) {
    if (count($arreglo) == 0) {
        return 0;
    }
    
    if ($arreglo[0] == $numeroBuscado) {
        return 1 + contar(array_slice($arreglo, 1), $numeroBuscado);
    } else {
        return contar(array_slice($arreglo, 1), $numeroBuscado);
    }
}
// Ejemplo de uso para probarlo:
$miArreglo = [2, 5, 3, 5, 5, 8];
echo contar($miArreglo, 5) . "<br>"; // Esto imprimirá: 3




function contarPositivos($arreglo) {
    // Caso Base: Arreglo vacío
    if (count($arreglo) == 0) {
        return 0;
    }
    
    // Caso Recursivo: Evaluamos si el primer elemento es positivo
    if ($arreglo[0] > 0) {
        return 1 + contarPositivos(array_slice($arreglo, 1));
    } else {
        return contarPositivos(array_slice($arreglo, 1));
    }
}

// Ejemplo para probar tu código:
$datos = [4, -2, 0, 7, -5, 1];
echo contarPositivos($datos); // Esto imprimirá: 3 (ya que 4, 7 y 1 son positivos)


function encontrarMenor($arreglo) {

    if (count($arreglo) == 1) {
        return $arreglo[0];
    }

    $menorEnElResto = encontrarMenor(array_slice($arreglo, 1));

    if ($arreglo[0] < $menorEnElResto) {
        return $arreglo[0];
    } else {
        return $menorEnElResto;
    }
}


//use gem profe, solo que al final ya me daba error 1099 :c

?>