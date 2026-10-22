<?php 
function factoresPrimos(int $numero) :array{
$x = 2;
$factores = [];
$conteo = 0;
while($numero <> 1){
    if($numero%$x == 0){
        array_push($factores, $x);
        $numero = $numero / $x;
    }else{
        $x = $x +1;
    }
}
return $factores;
}

function imprimeFactoresPrimos($factoresArray){
    $resultado = (array_count_values($factoresArray));
    $terminos = [];
    foreach ($resultado as $indice => $valor) {
        $terminos[] = "$indice ^ $valor";
    }
    return implode(" * ", $terminos);
}
while ($linea = fgets(STDIN)){
    $numero = (int) trim($linea);
    $factores = factoresPrimos($numero);
    echo "<p>$numero = " . imprimeFactoresPrimos($factores) . "</p>\n";
}
?>
