<?php
    require 'db_credentials.php';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Cria bd
    $sql = "CREATE DATABASE $dbname";
    if (mysqli_query($conn, $sql)) {
        echo "<br>Banco de dados criado com sucesso!<br>";
    } else {
        echo "<br>Erro ao criar o BD: " . mysqli_error($conn);
    }

    // seleciona bd
    $sql = "USE $dbname";
    if (mysqli_query($conn, $sql)) {
        echo "<br>Banco de dados selecionado.<br>";
    } else {
        echo "<br>Erro ao selecionar o BD: " . mysqli_error($conn);
    }

    // cria tabela users
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
        echo "<br>Erro ao criar a tabela $table_users: " . mysqli_error($conn);
    }
    //insere conta de admin
    $sql = "INSERT INTO $table_users
            (name, email, password, created_at) VALUES
            ('$admin_name', '$admin_email', '$admin_pass', NOW());";

    if (mysqli_query($conn, $sql)) {
        echo "<br>Usuario $admin_name criado com sucesso!<br>";
    } else {
        echo "<br>Erro ao criar o usuario $admin_name: " . mysqli_error($conn);
    }        

    $sql = "CREATE TABLE $table_posts (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        content TEXT NOT NULL,
        created_at DATETIME,
        updated_at DATETIME
      )";

    if (mysqli_query($conn, $sql)) {
        echo "<br>Tabela $table_posts criada com sucesso!<br>";
    } else {
        echo "<br>Erro ao criar a tabela $table_posts: " . mysqli_error($conn);
    }

    $sql = "CREATE TABLE $table_comments (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(6) UNSIGNED,
        post_id INT(6) UNSIGNED,
        content TEXT NOT NULL,
        created_at DATETIME,
        updated_at DATETIME,
        FOREIGN KEY (user_id) REFERENCES $table_users(id),
        FOREIGN KEY (post_id) REFERENCES $table_posts(id)
      )";

    if (mysqli_query($conn, $sql)) {
        echo "<br>Tabela $table_comments criada com sucesso!<br>";
    } else {
        echo "<br>Erro ao criar a tabela $table_comments: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
