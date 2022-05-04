<?php 
    require "validation/authenticate.php";
    require "validation/check_posts.php";
    require "validation/check_new_comment.php";
    require "validation/edit_comment.php";
    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"> 
    <title>PS4Review</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/index.css"/>
    <link type="text/css" rel="stylesheet" href="css/form_view.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="validation/check_form_new_comment.js"></script>
</head>
<body>
    <?php if ($login): ?>  
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        
              <?php // limpa o formulário.
                $texto = "";
              ?>
        
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
              <?php $id = $_GET['id'];?>
              <?php $title = $_GET['title'];?>
              <?php $text2 = $_GET['text'];?>
              <?php echo "<h1 class='page-header'>$title</h1>"; ?>
              <p style="word-wrap: break-word; width: 800px;">
                <span style="font-size: 18px;">
                  <?php echo "$text2";?><br><br>
                  <?php echo "Autor: $admin_name";?>
                </span>
              </p>
          </div>
          <?php if(!isset($_GET['edit'])):  ?>
          <div style="margin-top: 40px;" class="col-xs-12">
          
              <form enctype="multipart/form-data" class="form" id="form-test" method="POST" action=''>

                  <!---Texto---->
                  <div class="form-group col-xs-12 <?php if(!empty($erro_texto)){echo "has-error";}?>">
                    
                      <label for="inputTexto" class="col-sm-12 control-label">Novo Comentario</label>
                      <div id="erro-texto">
                      <?php if (!empty($erro_texto)): ?>
                        <span class="help-block"><?php echo $erro_texto ?></span>
                      <?php endIf; ?>
                      </div>  
                      <textarea style="margin-top: 20px;" required type="text" class="form-control" name="comment" placeholder="Comentario" value="<?php echo $texto; ?>" rows="5"></textarea>
                      <button type="submit" class="btn btn-success">Postar</button>
                    
                  </div>
                      
                  
              </form>
                      
          </div>
          <?php endif;?>
                      
      </div>
      <div class="container">
          <h3 style="border-top: 20px;" class="page-header">Comentarios</h3>
          <?php show_comments(); ?>
      </div> 
      <div class="foot">
            <h1 style="color: yellow">PS4 Review</h1>
            <p>Essa pagina e simbolica. <br> Nao ha companhias relacionadas a ela.</p>
            <span>Contato: lucfg15@gmail.com</span>
      </div>   
    <?php else:?>
        <?php die("<h1>Para acessar, faca <a href='login.php'>login</a></h1>"); ?>
    <?php endif;?>    
        
</body>
</html>