<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require "database/db_functions.php";
  require "validation/authenticate.php";

  $error = false;
  $password = $email = "";

if (!$login && $_SERVER["REQUEST_METHOD"] == "POST") {
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
  if(empty(trim($_POST["senha"]))){
    $erro_senha = "Senha é obrigatório.";
    $error = true;
  }
  else{
    $senha = verifica_campo($_POST["password"]);
  }
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
<!DOCTYPE html>
<html>
<head>
  <title>PS4Review</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="/validation/check_form_login.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">Entrar</h1>

      <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (!$error): ?>
              <?php // limpa o formulário.
                $email      = "";
                $senha      = "";
              ?>
        <?php else: ?>
          <div class="alert alert-danger">
            Falha ao efetuar login!
          </div>
        <?php endif; ?>
      <?php endif; ?>

      <form enctype="multipart/form-data" id="form-test" class="form-horizontal" method="POST" action="login.php">

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
            <input required type="password" class="form-control" name="senha" placeholder="Senha" value="<?php echo $password; ?>">
            <div id="erro-senha">

            </div>
            <?php if (!empty($erro_senha)): ?>
              <span class="help-block"><?php echo $erro_senha ?></span>
            <?php endIf; ?>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Entrar</button>
            <button type="submit" class="btn btn-default">
              <a href="/PHP/registrar.php">Criar Conta</a>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
