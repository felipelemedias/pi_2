
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios basicos - PHP</title>
</head>
<body>
    <h1>Felipe Leme Dias</h1>
    <h2>32121BSI027</h2>
</body>
</html>

<?php
function fatorialrecursividade($n)
{
    if($n <= 1)
    {
        return 1;
    }else{
        return $n * fatorialrecursividade($n - 1);
    }
}
$num = 5;
$result = fatorialrecursividade($num);
echo "O fatorial de $num é: " . $result;

?>

<?php

function fatorial($n)
{
    if ($n < 0) {
        return "nao pode numeros negativos.";
    }

    $fatorial = 1;
    for ($i = 2; $i <= $n; $i++) {
        $fatorial *= $i;
    }

    return $fatorial;
}

$num = 5;
$result = fatorial($num);
echo "O fatorial de $num é: " . $result . "<br>";

?>

<?php
function calcularSomaEMedia() {
    $numeros = func_get_args();
    $quantidade = count($numeros);

    $soma = 0;
    for ($i = 0; $i < $quantidade; $i++) {
        $soma += $numeros[$i];
    }

    $media = $soma / $quantidade;

    return array('soma' => $soma, 'media' => $media);
}

$resultado = calcularSomaEMedia(10, 20, 30, 40);
echo "Soma: " . $resultado['soma'] . "<br>";
echo "Média: " . $resultado['media'] . "<br>";

?>

<?php

echo "Exercicio 1: <br>";

$a = -5;
$b = 6;

if ($a < $b) {
    $lista = [];
    for ($i = $a + 1; $i < $b; $i++) {
        $lista[] = $i;
    }
    echo "[" . implode(", ", $lista) . "]<br>";
} else {
    echo "[]";
}
?>

<?php

echo "<br>Exercicio 2: <br>";

$inteiro = 5;

if ($inteiro > 1) {
    for ($i = 1; $i <= $inteiro; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $j;
        }
        echo "<br>";
    }
} else {
    echo "O número deve ser maior que 1.";
}
?>

<?php

echo "<br>Exercicio 3: <br>";

function dividirString($string, $aux) {
    $tamanho = strlen($string);

    if ($tamanho % $aux === 0) {
        $partes = str_split($string, $tamanho / $aux);
        return $partes;
    } else {
        return ["O tamanho da string não é divisível por $aux."];
    }
}

$string1 = "a123b123";
$aux1 = 2;
echo implode("<br>", dividirString($string1, $aux1));

$string2 = "abc";
$aux2 = 3;
echo "<br>";
echo implode("<br>", dividirString($string2, $aux2));
?>

<?php

echo "<br>Exercicio 4: <br>";

function comprimirString($string) {
    $comprimida = '';
    $contador = 1;

    for ($i = 0; $i < strlen($string); $i++) {
        if ($i > 0 && $string[$i] === $string[$i - 1]) {
            $contador++;
        } else {
            if ($contador > 1) {
                $comprimida .= $contador;
            }
            $comprimida .= $string[$i];
            $contador = 1;
        }
    }

    if ($contador > 1) {
        $comprimida .= $contador;
    }

    return $comprimida;
}

$string = "qqwwweeeerrrrrtyy";
echo comprimirString($string);
?>

<?php

echo "<br><br>Exercicio 5: <br>";

function Fibonacci($n) {
    $fib = [];
    $fib[0] = 0;
    $fib[1] = 1;

    for ($i = 2; $i <= $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }

    return $fib;
}

$n = 5;
$serieFibonacci = Fibonacci($n);

foreach ($serieFibonacci as $numero) {
    echo $numero . "<br>";
}
?>

<?php

echo "<br>Exercicio 6: <br>";

function soma(...$args) {
    $total = 0;
    
    foreach ($args as $numero) {
        $total += $numero;
    }
    
    return $total;
}

echo soma(1, 2) . "<br>";      // Saída: 3
echo soma(1, 2, 8) . "<br>";   // Saída: 11
?>

<?php

echo "<br>Exercicio 7: <br>";

// Padrão 1
$numero = 1;
for ($linha = 1; $linha <= 4; $linha++) {
    for ($coluna = 1; $coluna <= $linha; $coluna++) {
        echo $numero;
        $numero++;
    }
    echo "<br>";
}

// Padrão 2
$numero = 1;
$altura = 4;
for ($linha = 1; $linha <= $altura; $linha++) {
    for ($espaco = $altura - $linha; $espaco > 0; $espaco--) {
        echo "&nbsp;&nbsp;";
    }
    for ($coluna = 1; $coluna <= $linha; $coluna++) {
        echo $numero;
        $numero++;
        if ($coluna < $linha) {
            echo "&nbsp;&nbsp;";
        }
    }
    echo "<br>";
}
?>

<?php

echo "<br>Exercicio 8: <br>";

function criarTabela($titulo, $numColunas, $numLinhas) {
    echo "<table border='1'>";
    echo "<caption>$titulo</caption>";
    
    for ($linha = 1; $linha <= $numLinhas; $linha++) {
        echo "<tr>";
        for ($coluna = 1; $coluna <= $numColunas; $coluna++) {
            echo "<td>L$linha" . "C$coluna</td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";
}

criarTabela("Teste", 4, 2);
?>

    