<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require "validation/authenticate.php";
    require "validation/check_update_post.php";

    $title = $_GET['title'];
    $text2 = $_GET['text'];
    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"> 
    <title>PS4Review</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="validation/check_form_edit_post.js"></script>
</head>
<body>
  <?php if ($isadmin):?>
    <div class="topbar col-xs-12">
      <span>PS4Review</span>

      <ul>
        <li><a href="logout.php">Sair</a></li>
        <li><a href="posts.php">Meus Posts</a></li>
        <li><a href="index.php">Home</a></li> 
      </ul>
    </div>

    <div class="container">
        <div style="margin-top: 40px;" class="col-xs-12">    
          <h1 class="page-header">Editar post</h1>
        
          <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <?php if (!$error): ?>
              <?php // limpa o formulário.
                
              ?>
              <?php else: ?>
                <div class="alert alert-danger">
                  Falha ao alterar o post!
                </div>
            <?php endif;?>
            <?php endif;?>

          <form style="width: 80%; transform: translate(-50%, 20%);" enctype="multipart/form-data" id="form-test" method="POST" action="">

        
            <!---titulo---->
            <div class="form-group <?php if(!empty($erro_titulo)){echo "has-error";}?>">
              <label for="inputTitulo" class="col-sm-2 control-label">Titulo</label>
              <div class="col-sm-10">
                <input required type="text" class="form-control" name="title_e" value="<?php echo $title; ?>">
                <div id="erro-titulo">

                </div>
                <?php if (!empty($erro_titulo)): ?>
                  <span class="help-block"><?php echo $erro_titulo ?></span>
                <?php endIf; ?>
              </div>
            </div>

            <!---Texto---->
            <div class="form-group <?php if(!empty($erro_texto)){echo "has-error";}?>">
              <label for="inputTexto" class="col-sm-2 control-label">Texto</label>
              <div class="col-sm-10">
                <textarea style="margin-top: 20px;" required type="text" class="form-control" name="text_e" rows="10"><?php echo $text2; ?></textarea>
                <div id="erro-texto">
                    
                </div>
                <?php if (!empty($erro_texto)): ?>
                  <span class="help-block"><?php echo $erro_texto ?></span>
                <?php endIf; ?>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="button">Postar</button>
                <a href="posts.php" class="button transparent">Cancelar</a>
                
              </div>
            </div>
          </form>
        </div>
    </div>
  <?php else:?>
    <?php die("<h1>Voce nao tem permissao para acessar essa pagina!!!</h1>");?>
  <?php endif;?>   
</body>
</html>