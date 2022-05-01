<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/web1-trabalhofinal/app/database/db_functions.php';
    require "val_functions.php";
    
    $error = false;
    $title = $text = "";
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty(trim($_POST["title"]))){
          $erro_titulo = "Titulo é obrigatório.";
          $error = true;
        }
        else{
          $title = verifica_campo($_POST["title"]);
        }
        if(empty(trim($_POST["text"]))){
          $erro_texto = "O post nao pode ser vazio.";
          $error = true;
        }
        else{
          $text = verifica_campo($_POST["text"]);
    }
    if (!$error)
     if (isset($_POST["title"]) && isset($_POST["text"])) {
   
       $conn = connect_db();
   
       $title = mysqli_real_escape_string($conn,$_POST["title"]);
       $text = mysqli_real_escape_string($conn,$_POST["text"]);

       $sql = "INSERT INTO $table_posts
       (title, content, created_at) VALUES
       ('$title', '$text', NOW())";

        if(mysqli_query($conn, $sql)){
            $title = $name = $text = "";  
            $success = true;
        }
        else {
            $error_msg = mysqli_error($conn);
            $error = true;
        }
     }
     else {
       $error_msg = "Por favor, preencha todos os dados.";
       $error = true;
     }
   }
?>