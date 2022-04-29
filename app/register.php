<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  require "database/db_functions.php";

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
<!DOCTYPE html>
<html>
<head>
  <title>PS4Review</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="/validation/check_form_register.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">Criar Conta</h1>

      <?php if ($success): ?>
        <h3 style="color:lightgreen;">Usuário criado com sucesso!</h3>
        <p>
          Seguir para <a href="login.php">login</a>.
        </p>
      <?php endif; ?>

      <?php if ($error): ?>
        <h3 style="color:red;"><?php echo $error_msg; ?></h3>
      <?php endif; ?>

      <form enctype="multipart/form-data" id="form-test" class="form-horizontal" method="POST" action="register.php">
        
        <!---Nome---->
        <div class="form-group <?php if(!empty($erro_nome)){echo "has-error";}?>">
          <label for="inputNome" class="col-sm-2 control-label">Nome</label>
          <div class="col-sm-10">
            <input required type="text" class="form-control" name="name" placeholder="Nome" value="<?php echo $name; ?>">
            <div id="erro-nome">
                
            </div>
            <?php if (!empty($erro_nome)): ?>
              <span class="help-block"><?php echo $erro_nome ?></span>
            <?php endIf; ?>
          </div>
        </div>

        <!---email---->
        <div class="form-group <?php if(!empty($erro_email)){echo "has-error";}?>">
          <label for="inputEmail" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input required type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
            <div id="erro-email">

            </div>
            <?php if (!empty($erro_email)): ?>
              <span class="help-block"><?php echo $erro_email ?></span>
            <?php endIf; ?>
          </div>
        </div>

        <!---Senha---->
        <div class="form-group <?php if(!empty($erro_senha)){echo "has-error";}?>">
          <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
          <div class="col-sm-10">
            <input required type="password" class="form-control" name="password" placeholder="Senha" value="<?php echo $password; ?>">
            <div id="erro-senha">

            </div>
            <?php if (!empty($erro_senha)): ?>
              <span class="help-block"><?php echo $erro_senha ?></span>
            <?php endIf; ?>
          </div>
        </div>

        <!---Confirmar senha---->
        <div class="form-group <?php if(!empty($erro_conf_senha)){echo "has-error";}?>">
          <label for="inputConf_senha" class="col-sm-2 control-label">Confirmar Senha</label>
          <div class="col-sm-10">
            <input required type="password" class="form-control" name="confirm_password" placeholder="Conf_senha" value="<?php echo $confirm_password; ?>">
            <div id="erro-conf_senha">

            </div>
            <?php if (!empty($erro_conf_senha)): ?>
              <span class="help-block"><?php echo $erro_conf_senha ?></span>
            <?php endIf; ?>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Criar Conta</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
