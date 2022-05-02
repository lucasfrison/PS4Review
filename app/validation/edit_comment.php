<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/web1-trabalhofinal/app/database/db_functions.php';
    require_once "val_functions.php";
    require_once "check_posts.php";
    
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
    $error = false;
    $comment = "";
   
    if (($_SERVER["REQUEST_METHOD"] == "POST")&&(isset($_GET['edit']))) {
        if(empty(trim($_POST["ec"]))){
          $erro_texto = "O comentario nao pode ser vazio.";
          $error = true;
        }
        else{
          $comment = verifica_campo($_POST["ec"]);
        }  
    if (!$error)
     if (isset($_POST["ec"]) && isset($_GET["id"])) {
   
       $conn = connect_db();
   
       $id = mysqli_real_escape_string($conn,$id);
       $comment = mysqli_real_escape_string($conn,$_POST["ec"]);

       $sql = "UPDATE $table_comments SET content = '$comment', updated_at = NOW() WHERE id = $id";

        if(mysqli_query($conn, $sql)){
            $id = $comment = "";  
            $success = true;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
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