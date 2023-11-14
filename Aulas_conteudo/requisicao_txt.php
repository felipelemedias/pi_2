<?php

$tittle = "Aula 9";
$txt1 = "Texto 1";
$txt2 = "Texto 2";
$txt3 = "Texto 3";

?>

<?php 

$saida = `dir`;
printf($saida);

?>

<br>
<html>
<head><tittle><?php echo "$tittle";?></tittle></head>
<body>
<h1><?php echo "$txt1";?></h1>
<h2><?php echo "$txt2";?></h2>
<h3><?php echo "$txt3";?></h3>
</body>
</html>
