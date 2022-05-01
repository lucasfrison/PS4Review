<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/web1-trabalhofinal/app/database/db_functions.php';
    require "val_functions.php";
    
    $error = false;
    $success = false;
    $name = $email = $password = $confirm_password = $pass ="";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $pass = $_POST["password"];  
      if(empty(trim($_POST["name"]))){
        $erro_nome = "Nome é obrigatório.";
        $error = true;
      }
      else{
        $name = verifica_campo($_POST["name"]);
      }
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
        $password = verifica_campo($_POST["password"]);
      }
      if(empty(trim($_POST["confirm_password"]))){
        $erro_conf_senha = "Confirmacao de senha é obrigatório.";
        $error = true;
      }
      else if ($_POST["confirm_password"] != $_POST["password"]) {
        $erro_conf_senha = "As senhas nao sao iguais.";
        $error = true;
      }
      else{
        $confirm_password = verifica_campo($_POST["confirm_password"]);
      }
      if (!$error)
      if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])) {
  
        $conn = connect_db();
  
        $name = mysqli_real_escape_string($conn,$_POST["name"]);
        $email = mysqli_real_escape_string($conn,$_POST["email"]);
        $password = mysqli_real_escape_string($conn,$_POST["password"]);
        $confirm_password = mysqli_real_escape_string($conn,$_POST["confirm_password"]);
        $password = md5($password);

        $sql = "SELECT * FROM $table_users WHERE email=$email";

        if(!mysqli_query($conn, $sql)){
          $name = $email = $password = $confirm_password = "";  
          $success = true;
        }
        else {
          $error = true;
          $erro_email = "Email ja cadastrado.";
        }
  
        $sql = "INSERT INTO $table_users
                (name, email, password, created_at) VALUES
                ('$name', '$email', '$password', NOW())";
  
        if(mysqli_query($conn, $sql)){
          $name = $email = $password = $confirm_password = "";  
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
  

?>