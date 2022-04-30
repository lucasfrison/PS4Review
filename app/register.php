<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  require "validation/register_check.php";

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
  <script src="/validation/check_form_register.js"></script>
</head>
<body>
<div class="topbar col-xs-12">
      <span>PS4Review</span>

      <ul>
        <li><a href="login.php">Entrar</a></li>
        <li><a href="index.php">Home</a></li>
      </ul>
  </div>
<div class="container">
  <div class="row">
    <div style="margin-top: 40px;" class="col-xs-12">
      <h1 class="page-header">Criar Conta</h1>

      <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (!$error): ?>
              <?php // limpa o formulário.
                $name = $email = $password = $confirm_password = "";
              ?>
        <?php else: ?>
          <div class="alert alert-danger">
            Falha ao criar conta!
          </div>
      <?php endif; ?>
      <?php endif; ?>
      <?php if ($success): ?>
        <h3 style="color:lightgreen;">Usuário criado com sucesso!</h3>
        <p>
          Seguir para <a href="login.php">login</a>.
        </p>
      <?php endif; ?>

      <form enctype="multipart/form-data" id="form-test" method="POST" action="register.php">
        
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
          <label style="padding-top: 18px;" for="inputConf_senha" class="col-sm-2 control-label">Confirmar senha</label>
          <div class="col-sm-10">
            <input required type="password" class="form-control" name="confirm_password" placeholder="Confirmar senha" value="<?php echo $confirm_password; ?>">
            <div id="erro-conf_senha">

            </div>
            <?php if (!empty($erro_conf_senha)): ?>
              <span class="help-block"><?php echo $erro_conf_senha ?></span>
            <?php endIf; ?>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="button">Criar Conta</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
