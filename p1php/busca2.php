<!DOCTYPE html>
<html>
<head>
    <title>Busca de Itens</title>
</head>
<body>
    <h1>Busca de Itens</h1>
    <form method="GET">
        <label for="fruta">Fruta:</label>
        <input type="text" name="fruta" id="fruta">
        <input type="submit" value="Buscar">
    </form>

    <?php
    session_start();
    
    $itens = array(
        "Abacaxi",
        "Banana",
        "Laranja",
        "Limão",
        "Maçã",
        "Manga",
        "Melancia",
        "Morango",
        "Pera",
        "Uva"
    );
    
    if (!isset($_SESSION['historico'])) {
        $_SESSION['historico'] = array();
    }
    
    if (isset($_GET['fruta'])) {
        $frutaBuscada = $_GET['fruta'];
        $encontradas = array();
        
        if (!empty($frutaBuscada)) {
            foreach ($itens as $fruta) {
                if (stripos($fruta, $frutaBuscada) !== false) {
                    $encontradas[] = $fruta;
                }
            }
        }
        
        if (count($encontradas) > 0) {
            
            echo "Frutas encontradas com a letra '$frutaBuscada':<br>";
            echo "<ol>";
            foreach ($encontradas as $frutaEncontrada) {
                echo "<li>" . $frutaEncontrada . "</li>" . "<br>";
            }
            echo "</ol>";
        } else {
            echo "Nenhuma fruta encontrada com a letra '$frutaBuscada'.";
        }
        
        $_SESSION['historico'][] = $frutaBuscada;
    }
    
    if (isset($_POST['limpar'])) {
        $_SESSION['historico'] = array();
    }
    ?>
    
    <hr>
    <form method="post">
        <input type='submit' name="limpar" value="Limpar histórico">
    </form>
    
    <h2>Histórico de Consultas:</h2>
    <?php
    
    if (count($_SESSION['historico']) > 0) {
        echo "<ol>";
        foreach ($_SESSION['historico'] as $consulta) {
            echo "<li>" . $consulta . "</li>";
        }
        echo "</ol>";
    } else {
        echo "Nenhuma consulta realizada.";
    }
    ?>
    
</body>
</html>