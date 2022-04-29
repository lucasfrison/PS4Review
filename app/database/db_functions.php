<?php
require "db_credentials.php";

$server = $servername; $user = $username; $pass = $password; $db = $dbname;

function connect_db(){
  global $server, $user, $pass, $db;
  $conn = mysqli_connect($server, $user, $pass, $db);
  if (!$conn) {
      die("Conexao falhou: " . mysqli_connect_error());
  }

  return($conn);
}

function disconnect_db($conn){
  mysqli_close($conn);
}

?>
