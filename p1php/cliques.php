<?php
session_start();

if (!isset($_SESSION['click_count'])) {
    $_SESSION['click_count'] = 0;
}

function incrementClickCount() {
    $_SESSION['click_count']++;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['variavel'])) {
    incrementClickCount();
}

if (isset($_GET['clear'])) {
    $_SESSION['click_count'] = 0;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário PHP</title>
</head>
<body>
    <form method="post" action="cliques.php">
        <input type="hidden" id="fname" name="variavel"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <h2>Número de Cliques: <?php echo $_SESSION['click_count']; ?></h2>

    <p><a href="cliques.php?clear=1">Zerar contador de cliques</a></p>
</body>
</html>