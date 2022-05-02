<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/web1-trabalhofinal/app/database/db_functions.php';
    require "val_functions.php";

    $autor = $_SESSION['user_name'];
    
    $error = false;
   
   if (isset($_POST['comment'])) { 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty(trim($_POST["comment"]))){
          $erro_texto = "O commentario nao pode ser vazio.";
          $error = true;
        }
        else{
          $text = verifica_campo($_POST["comment"]);
        }    
    if (!$error)
     if (isset($_POST["comment"])) {
   
       $user_id = $_SESSION['user_id'];
       $post_id = $_GET['id'];
       $conn = connect_db();
   
       $text = mysqli_real_escape_string($conn,$_POST["comment"]);

       $sql = "INSERT INTO $table_comments
       (user_id, post_id, content, created_at, updated_at) VALUES
       ($user_id, $post_id, '$text', NOW(), NOW())";

        if(mysqli_query($conn, $sql)){
            $title = $name = $text = ""; 
            $success = true;
        }
        else {
            $error_msg = mysqli_error($conn);
            $error = true;
        }
        disconnect_db($conn);
    }
    else {
       $error_msg = "Por favor, preencha todos os dados.";
       $error = true;
     }
    } 
  }
?>