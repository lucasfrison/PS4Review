<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require "check_form.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>PS4Review</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="check_form.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">Criar Conta</h1>

      <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (!$erro): ?>
          <div class="alert alert-success">
            Conta criada com sucesso!
              <?php // limpa o formulário.
                $nome       = "";
                $email      = "";
                $data       = "";
                $senha      = "";
                $conf_senha = "";
              ?>
          </div>
        <?php else: ?>
          <div class="alert alert-danger">
            Erros no formulário.
          </div>
        <?php endif; ?>
      <?php endif; ?>

      <form enctype="multipart/form-data" id="form-test" class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        
        <!---Nome---->
        <div class="form-group <?php if(!empty($erro_nome)){echo "has-error";}?>">
          <label for="inputNome" class="col-sm-2 control-label">Nome</label>
          <div class="col-sm-10">
            <input required type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $nome; ?>">
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

        <!---Data---->
        <div class="form-group <?php if(!empty($erro_data)){echo "has-error";}?>">
          <label for="inputData" class="col-sm-2 control-label">Data de Nascimento</label>
          <div class="col-sm-10">
            <input required type="date" class="form-control" name="data" placeholder="Data" value="<?php echo $data; ?>">
            <div id="erro-data">

            </div>
            <?php if (!empty($erro_data)): ?>
              <span class="help-block"><?php echo $erro_data ?></span>
            <?php endIf; ?>
          </div>
        </div>

        <!---Senha---->
        <div class="form-group <?php if(!empty($erro_senha)){echo "has-error";}?>">
          <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
          <div class="col-sm-10">
            <input required type="password" class="form-control" name="senha" placeholder="Senha" value="<?php echo $senha; ?>">
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
            <input required type="password" class="form-control" name="conf_senha" placeholder="Conf_senha" value="<?php echo $conf_senha; ?>">
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
