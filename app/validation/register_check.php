<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/web1-trabalhofinal/app/database/db_functions.php';

    function verifica_campo($texto){
        $texto = trim($texto);
        $texto = stripslashes($texto);
        $texto = htmlspecialchars($texto);
        return $texto;
      }
    
      $error = false;
      $success = false;
      $name = $email = $password = $confirm_password = "";
    
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    
          if ($password == $confirm_password) {
            $password = md5($password);
    
            $sql = "INSERT INTO $table_users
                    (name, email, password) VALUES
                    ('$name', '$email', '$password');";
    
            if(mysqli_query($conn, $sql)){
              $success = true;
            }
            else {
              $error_msg = mysqli_error($conn);
              $error = true;
            }
          }
          else {
            $error_msg = "Senha não confere com a confirmação.";
            $error = true;
          }
        }
        else {
          $error_msg = "Por favor, preencha todos os dados.";
          $error = true;
        }
      }
?>