<?php 
    require "validation/authenticate.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"> 
    <title>PS4Review</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/index.css"/>
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
  <?php if ($isadmin):?>  
    <div class="topbar col-xs-12">
      <span>PS4Review</span>

      <ul>
        <li><a href="logout.php">Sair</a></li>
        <li><a href="index.php">Home</a></li> 
      </ul>
    </div>

    <div class="container">
        <div style="margin-top: 40px;" class="col-xs-12">    
            <h1 class="page-header">Meus posts</h1>
            <button class="button"><a class="white" href="new_post.php">Novo Post</a></button>
        </div>
    </div>
  <?php else:?>
    <?php die("<h1>Voce nao tem permissao para acessar essa pagina!!!</h1>");?>
  <?php endif;?>    
</body>
</html>