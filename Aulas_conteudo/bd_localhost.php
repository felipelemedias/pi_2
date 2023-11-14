<?php  

$mysqli = new mysqli("localhost", "root", "");

echo "Info 1: ".$mysqli->host_info. "<br>";

$mysqli = new mysqli("127.0.0.1", "root", "", "", "3306");

echo "Info 2: ".$mysqli->host_info . "<br>";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "root", "");

$result = $mysqli->query("show databases;");

var_dump($result);
echo "<br><br><table border=\"2\"><tr><th>Database</th><tr>";

foreach($result as $row)
{
  echo "<tr><td>". $row["Database"] . "</td></tr>";
}

echo "</table>";

?>

index.php
<?php  
  $dbh = new PDO('mysql:host=localhost;');
?>