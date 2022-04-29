<?php

  function verifica_campo($texto){
    $texto = trim($texto);
    $texto = stripslashes($texto);
    $texto = htmlspecialchars($texto);
    return $texto;
  }
  
  $nome       = "";
  $email      = "";
  $data       = "";
  $senha      = "";
  $conf_senha = "";
  $erro = false;
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if(empty(trim($_POST["nome"]))){
      $erro_nome = "Nome é obrigatório.";
      $erro = true;
    }
    else{
      $nome = verifica_campo($_POST["nome"]);
    }
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
    if(empty(trim($_POST["data"]))){
      $erro_data = "Data de Nascimento é obrigatório.";
      $erro = true;
    }
    else{
      $data = verifica_campo($_POST["data"]);
    }
    if(empty(trim($_POST["senha"]))){
      $erro_senha = "Senha é obrigatório.";
      $erro = true;
    }
    else{
      $senha = verifica_campo($_POST["senha"]);
    }
    if(empty(trim($_POST["conf_senha"]))){
      $erro_conf_senha = "Confirmacao de senha é obrigatório.";
      $erro = true;
    }
    else if ($_POST["conf_senha"] != $_POST["senha"]) {
      $erro_conf_senha = "As senhas nao sao iguais.";
      $erro = true;
    }
    else{
      $conf_senha = verifica_campo($_POST["conf_senha"]);
    }
  }
?>
