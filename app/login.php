<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require "validation/authenticate.php";
  require "validation/login_check.php";

?>
<!DOCTYPE html>
<html>
<head>
  <title>PS4Review</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="/validation/check_form_login.js"></script>
</head>
<body>
  <div class="topbar col-xs-12">
        <span>PS4Review</span>
  
        <ul>
          <li><a href="register.php">Registrar-se</a></li>
          <li><a href="index.php">Home</a></li> 
        </ul>
  </div>
  <div class="container">
    <div class="row">
      <div style="margin-top: 40px;" class="col-xs-12">
        <h1 class="page-header">Entrar</h1>
  
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
          <?php if (!$error): ?>
                <?php // limpa o formulário.
                  $email = $password = "";
                ?>
          <?php else: ?>
            <div class="alert alert-danger">
              Falha ao efetuar login!
            </div>
          <?php endif; ?>
        <?php endif; ?>
          
        <form enctype="multipart/form-data" id="form-test" method="POST" action="login.php">
          
          
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
              <input required type="password" class="form-control" name="password" placeholder="Senha" value="<?php echo $pass; ?>">
              <div id="erro-senha">
              
              </div>
              <?php if (!empty($erro_senha)): ?>
                <span class="help-block"><?php echo $erro_senha ?></span>
              <?php endIf; ?>
            </div>
          </div>
              
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="button">Entrar</button>
              
                <a href="register.php" class="button transparent">Criar Conta</a>
              
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
