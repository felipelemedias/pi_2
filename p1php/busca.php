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
            
            echo "Resultados para '$frutaBuscada':<br>";
            echo "<ol>";
            foreach ($encontradas as $frutaEncontrada) {
                echo "<li>" . $frutaEncontrada . "</li>" ."<br>";
            }
            echo "</ol>";
        } else {
            echo "Nenhuma fruta encontrada para '$frutaBuscada'.";
        }
    }
    ?>
</body>
</html>