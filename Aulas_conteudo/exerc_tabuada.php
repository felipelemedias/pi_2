<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['numero'])) {
    $numero = $_GET['numero'];

    echo "<h1>Tabuada do $numero</h1>";
    echo "<table>";
    for ($i = 1; $i <= 10; $i++) {
        $resultado = $numero * $i;
        echo "<tr><td>$numero x $i</td><td>=</td><td>$resultado</td></tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício PHP</title>
</head>
<body>
    <h1>Escolha um número para ver a tabuada:</h1>

    <form method="get">
        <label for="numero">Escolha um número:</label>
        <select id="numero" name="numero" onchange="this.form.submit()">
            <?php

            echo "<option value='$numero'></option>";

            for ($i = 1; $i <= 10; $i++) {
              echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
    </form>
</body>
</html>
