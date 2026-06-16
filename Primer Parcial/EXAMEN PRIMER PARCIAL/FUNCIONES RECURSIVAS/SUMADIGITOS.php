<?php
function sumarDigitos($P) {
    $P = (string)$P; 

    if ( $P === "") {
return 0;
}
$digitoActual = (int)substr($P, 0, 1); 

    return $digitoActual + sumarDigitos(substr($P, 1));
}  

echo sumarDigitos (1234);
echo "<br>";

?>

