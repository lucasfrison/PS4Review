<?php
    require 'db_credentials.php';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "CREATE DATABASE $dbname";
    if (mysqli_query($conn, $sql)) {
        echo "<br>Banco de dados criado com sucesso!<br>";
    } else {
        echo "<br>Erro ao criar o BD: " . mysqli_error($conn);
    }

    // Choose database
    $sql = "USE $dbname";
    if (mysqli_query($conn, $sql)) {
        echo "<br>Banco de dados selecionado.<br>";
    } else {
        echo "<br>Erro ao selecionar o BD: " . mysqli_error($conn);
    }

    // sql to create table
    $sql = "CREATE TABLE $table_users (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(100) NOT NULL,
      email VARCHAR(100) NOT NULL,
      password VARCHAR(128) NOT NULL,
      created_at DATETIME,
      UNIQUE (email)
    )";

    if (mysqli_query($conn, $sql)) {
        echo "<br>Tabela $table_users criada com sucesso!<br>";
    } else {
        echo "<br>Error ao criar a tabela $table_users: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
