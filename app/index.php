<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require "validation/authenticate.php";
    require "validation/check_posts.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PS4Review</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="css/index.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="topbar col-xs-12">
      <span>PS4Review</span>

      <ul>
        <?php if ($login): ?>
          <li><a href="logout.php">Sair</a></li>
          <?php if ($isadmin): ?>
            <li><a href="posts.php">Meus Posts</a></li>
          <?php endif;?>  
        <?php else: ?> 
          <li><a href="login.php">Entrar</a></li>
          <li><a href="register.php">Registrar-se</a></li>
        <?php endif;?>  
        <li><a href="index.php">Home</a></li>
      </ul>
  </div>

    <div class="container">
        <div style="margin-top: 40px;" class="col-xs-9">    
            <h1 class="page-header">Bem-vindo
              <?php if ($login) {
                  echo ", $user_name!";
                }
                else {
                  echo "!";
                }
              ?>
            </h1>
            <p>
              <h2>PS4Review</h2>
              <span style="font-size: 24px;">Nao tem certeza se deve comprar aquele game novo?<br>
              Veja nossas avaliacoes. <br>
              Nossas avaliacoes levam em consideracao diversos fatores <br>
              como jogabilidade, historia, bugs e a imersao do game. <br></span>
            </p>
            <p>
              <h2 class="page-header">Sobre mim</h2>
              <img width="190" src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png">
              <span style="font-size: 24px; float: right; margin-top: 32px;">Meu nome e lorem ipsum.<br>
              Me dedico a fazer avaliacoes de games. <br>
              Se voce quer saber como e um jogo se gastar seu dinheiro<br>
              voce veio ao lugar certo. <br></span>
            </p>
            
        </div>
        <div style="margin-top: 40px;"class="div col-xs-3">
          <h1 class="page-header text-center">Reviews</h1>
          <?php show_post_list(); ?>
        </div>

    </div>
    <div class="foot">
          <h1 style="color: yellow">PS4 Review</h1>
          <p>Essa pagina e simbolica. <br> Nao ha companhias relacionadas a ela.</p>
          <span>Contato: lucfg15@gmail.com</span>
    </div>
</body>
</html>
