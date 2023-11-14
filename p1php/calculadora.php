<!DOCTYPE html>
<html>
<head>
    <title>Calculadora</title>
</head>
<body>
    <form method="post">
        <label for="A">A</label>
        <input type="text" name="A" id="A" required>
        
        <select name="operacao" id="operacao" required>
            <option value="adicao">+</option>
            <option value="subtracao">-</option>
            <option value="multiplicacao">*</option>
            <option value="divisao">/</option>
        </select>

        <label for="B">B</label>
        <input type="text" name="B" id="B" required>
        
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $A = $_POST["A"];
        $B = $_POST["B"];
        $operacao = $_POST["operacao"];
        $resultado = 0;

        if (is_numeric($A) && is_numeric($B)) {
            switch ($operacao) {
                case "adicao":
                    $resultado = $A + $B;
                    echo "<p>$A + $B = $resultado</p>";
                    break;
                case "subtracao":
                    $resultado = $A - $B;
                    echo "<p>$A - $B = $resultado</p>";
                    break;
                case "multiplicacao":
                    $resultado = $A * $B;
                    echo "<p>$A * $B = $resultado</p>";
                    break;
                case "divisao":
                    if ($B != 0) {
                        $resultado = $A / $B;
                        echo "<p>$A / $B = $resultado</p>";
                    } else {
                        echo "<p>Não é possível fazer divisão por zero, informe um valor válido!</p>";
                    }
                    break;
            }
        } else {
            echo "<p>Favor informar um valor válido!</p>";
        }
    }
    ?>
</body>
</html>