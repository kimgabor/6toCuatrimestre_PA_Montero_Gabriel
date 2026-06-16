<?php
function contarDigitos($P){

    $P = (string)$P; 

       if ($P === "") { 
        return 0;
    }


    return 1 + contarDigitos(substr($P, 1));
}

echo contarDigitos(38342435); 
echo "<br>";
?>