<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/web1-trabalhofinal/app/database/db_functions.php';
    require "val_functions.php";
    
    $error = false;
    $password = $email = $pass = "";
   
    if (!$login && $_SERVER["REQUEST_METHOD"] == "POST") {
        $pass = $_POST["password"];
        if(empty(trim($_POST["email"]))){
          $erro_email = "Email é obrigatório.";
          $error = true;
        }
        else if (!(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))){
          $erro_email = "Email invalido.";
          $error = true;
        }
        else{
          $email = verifica_campo($_POST["email"]);
        }
        if(empty(trim($_POST["password"]))){
          $erro_senha = "Senha é obrigatório.";
          $error = true;
        }
        else{
          $senha = verifica_campo($_POST["password"]);
    }
    if (!$error)
     if (isset($_POST["email"]) && isset($_POST["password"])) {
   
       $conn = connect_db();
   
       $email = mysqli_real_escape_string($conn,$_POST["email"]);
       $password = mysqli_real_escape_string($conn,$_POST["password"]);
       $password = md5($password);
   
       $sql = "SELECT id,name,email,password FROM $table_users
               WHERE email = '$email';";
   
       $result = mysqli_query($conn, $sql);
       if($result){
         if (mysqli_num_rows($result) > 0) {
           $user = mysqli_fetch_assoc($result);
   
           if ($user["password"] == $password) {

             $_SESSION["user_id"] = $user["id"];
             $_SESSION["user_name"] = $user["name"];
             $_SESSION["user_email"] = $user["email"];
   
             header("Location: " . dirname($_SERVER['SCRIPT_NAME']) . "/index.php");
             exit();
           }
           else {
             $error_msg = "Senha incorreta!";
             $error = true;
           }
         }
         else{
           $error_msg = "Usuário não encontrado!";
           $error = true;
         }
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