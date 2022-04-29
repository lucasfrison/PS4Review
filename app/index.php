<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require "validation/authenticate.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PS4Review</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-xs-12">    
            <h1 class="page-header">Bem-vindo
              <?php
                if ($login) {
                  echo ", $user_name!";
                }
                else {
                  echo "!";
                }
              ?>
            </h1>
            
            <p>
              Escolha uma das opções:
            </p>
            <ul>
              <?php if ($login): ?>
                <li><a href="logout.php">Logout</a></li>
              <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Registrar-se</a></li>
              <?php endif; ?>
            </ul>
            </p>
        </div>
    </div>
</body>
</html>
