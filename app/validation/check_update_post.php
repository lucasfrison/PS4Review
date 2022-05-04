<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/web1-trabalhofinal/app/database/db_functions.php';
    require "val_functions.php";
    require "check_posts.php";
    require_once "authenticate.php";

    if ($isadmin) {
    
      $id = $_GET['id'];
      $error = false;
      $title = $text = "";
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty(trim($_POST["title_e"]))){
          $erro_titulo = "Titulo é obrigatório.";
          $error = true;
        }
        else{
          $title = verifica_campo($_POST["title_e"]);
        }
        if(empty(trim($_POST["text_e"]))){
          $erro_texto = "O post nao pode ser vazio.";
          $error = true;
        }
        else{
          $text = verifica_campo($_POST["text_e"]);
        }    
        if (!$error)
          if (isset($_POST["title_e"]) && isset($_POST["text_e"])) {
   
            $conn = connect_db();

            $id = mysqli_real_escape_string($conn,$id);
            $title = mysqli_real_escape_string($conn,$_POST["title_e"]);
            $text = mysqli_real_escape_string($conn,$_POST["text_e"]);

            $sql = "UPDATE $table_posts SET title = '$title', content = '$text', updated_at = NOW() WHERE id = $id";

            if(mysqli_query($conn, $sql)){
              $title = $name = $text = "";  
              $success = true;
              header("Location: " . dirname($_SERVER['SCRIPT_NAME']) . "/posts.php");
              exit();
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