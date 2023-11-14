<?php

header('Content-Type: application/json');
$data = file_get_contents('http://servicodados.ibge.gov.br/api/v1/paises/BR|RU|IN|CN|ZA/indicadores/77850');
echo $data;


?>