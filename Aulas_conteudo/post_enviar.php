<?php

ini_set('display errors', 1);
ini_set('display startup errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['count'])){
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}

if ($_SESSION['count'] == 5){
  unset($_SESSION['count']);
  echo "Desregistrando a variável";
} else {
  echo $_SESSION['count'];
}

?>

<?php

echo var_dump($_GET);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercicio php</title>
</head>
<body>

<form method= "post" action="index.php">
  <label for="fname">Enviar texto:</label>
  <input type="text" id="fname" name="variavel"><br><br>
  <input type="submit" value="Enviar">
</form>


EXERCICIO 
<?php
session_start();

if (!isset($_SESSION['text_history'])) {
    $_SESSION['text_history'] = array();
}

function adicionarTexto($text) {
    $_SESSION['text_history'][] = $text;
}
function deletarHistorico($index) {
    if (isset($_SESSION['text_history'][$index])) {
        unset($_SESSION['text_history'][$index]);
    }
}
function limparHistorico() {
    $_SESSION['text_history'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['variavel'])) {
    $text = $_POST['variavel'];
    adicionarTexto($text);
}

if (isset($_GET['clear'])) {
  limparHistorico();
}

if (isset($_GET['delete'])) {
    $indexToDelete = (int)$_GET['delete'];
    deletarHistorico($indexToDelete);
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
    <form method="post" action="index.php">
        <label for="fname">Enviar texto:</label>
        <input type="text" id="fname" name="variavel"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <h2>Histórico de Textos Enviados:</h2>
    <ul>
        <?php
        foreach ($_SESSION['text_history'] as $index => $text) {
            echo '<li>' . $text . ' [<a href="index.php?delete=' . $index . '">Remover</a>]</li>';
        }
        ?>
    </ul>

    <p><a href="index.php?clear=1">Apagar todo o histórico</a></p>
</body>
</html>