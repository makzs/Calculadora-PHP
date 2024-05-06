<?php
function somar($x, $y) {
    $x = intval($x);
    $y = intval($y);

    return $x + $y;
}

function subtrair($x, $y) {
    $x = intval($x);
    $y = intval($y);

    return $x - $y;
}

function multiplicar($x, $y) {
    $x = intval($x);
    $y = intval($y);

    return $x * $y;
}

function dividir($x, $y) {
    $x = intval($x);
    $y = intval($y);

    return $x / $y;

}

function potencia($x, $y) {
    $x = intval($x);
    $y = intval($y);

    if ($y == 0) {
        return 1;
    }
    return $x ** $y;

}

function fatorial($x){
    $x = intval($x);
    
    if ($x <= 1) {
        return 1;
    }
    $calc = 1;
    while ($x > 1) {
        $calc *= $x;
        $x--;
    }
    return $calc;
}
?>
