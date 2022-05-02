<?php 
    require "validation/authenticate.php";
    require "validation/check_posts.php";
    require "validation/check_new_comment.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"> 
    <title>PS4Review</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/index.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/validation/check_form_new_comment.js"></script>
</head>
<body>
    <?php if ($login): ?>  
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (!$error): ?>
              <?php // limpa o formulário.
                $texto = "";
              ?>
        <?php endif; ?>
        <?php endif;?>
    <div class="topbar col-xs-12">
      <span>PS4Review</span>

      <ul>
        <li><a href="logout.php">Sair</a></li>
        <?php if($isadmin):?>
            <li><a href="posts.php">Meus Posts</a></li>
        <?php endif;?>    
        <li><a href="index.php">Home</a></li> 
      </ul>
    </div>

    <div class="container">
        <div style="margin-top: 40px;" class="col-xs-12"> 
            <?php $title = $_GET['title'];?>
            <?php $text = $_GET['text'];?>
            <?php echo "<h1 class='page-header'>$title</h1>"; ?>
            <p>
              <span style="font-size: 16px;">
                <?php echo "$text";?>
              </span>
            </p>
        </div>
        <div style="margin-top: 40px;" class="col-xs-12">
            <h3>Comentarios</h3>
            <?php show_comments(); ?>
            <form enctype="multipart/form-data" id="form-test" method="POST" action="">

                <!---Texto---->
                <div class="form-group <?php if(!empty($erro_texto)){echo "has-error";}?>">
                  <div class="col-sm-8">
                  <label for="inputTexto" class="col-sm-3 control-label">Novo Comentario</label>
                    <textarea style="margin-top: 20px;" required type="text" class="form-control" name="comment" placeholder="Comentario" value="<?php echo $texto; ?>" rows="5"></textarea>
                    <div id="erro-texto">

                    </div>
                    <?php if (!empty($erro_texto)): ?>
                      <span class="help-block"><?php echo $erro_texto ?></span>
                    <?php endIf; ?>
                  </div>
                </div>
                    
                <div class="form-group">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Postar</button>
                  </div>
                </div>
            </form>
        </div>
    </div>
    <?php else:?>
        <?php die("<h1>Voce nao tem permissao para acessar essa pagina!!"); ?>
    <?php endif;?>    
        
</body>
</html>