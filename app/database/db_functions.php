<?php
require "db_credentials.php";

$server = $servername; $user = $username; $passdb = $password; $db = $dbname;

function connect_db(){
  global $server, $user, $passdb, $db;
  $conn = mysqli_connect($server, $user, $passdb, $db);
  if (!$conn) {
      die("Conexao falhou: " . mysqli_connect_error());
  }

  return($conn);
}

function disconnect_db($conn){
  mysqli_close($conn);
}

?>
