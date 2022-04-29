<?php

  function verifica_campo($texto){
    $texto = trim($texto);
    $texto = stripslashes($texto);
    $texto = htmlspecialchars($texto);
    return $texto;
  }
  
  $email      = "";
  $senha      = "";
  $erro = false;
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if(empty(trim($_POST["email"]))){
      $erro_email = "Email é obrigatório.";
      $erro = true;
    }
    else if (!(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))){
      $erro_email = "Email invalido.";
      $erro = true;
    }
    else{
      $email = verifica_campo($_POST["email"]);
    }
    if(empty(trim($_POST["senha"]))){
      $erro_senha = "Senha é obrigatório.";
      $erro = true;
    }
    else{
      $senha = verifica_campo($_POST["senha"]);
    }
  }
?>
