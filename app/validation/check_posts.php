<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web1-trabalhofinal/app/database/db_functions.php';

$id;
$title;
$text;
$erro_texto;

function show_posts() {
    global $table_posts, $id, $title;
    $conn = connect_db();
    $sql = "SELECT id, title, content FROM $table_posts";
    $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
    echo "<br><br>";
    echo "<table class='table'>";
    echo "<tr>";
    echo "<td>ID</td>";
    echo "<td>Titulo</td>";
    echo "<td>Editar</td>";
    echo "<td>Excluir</td>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
        echo "<tr>";
        foreach ($row as $value) { 
            $id = $row['id'];
            $title = $row['title'];
            $text = $row['content'];
        }
        echo "<td>".$id."</td>";
        echo "<td>".$title."</td>";
        echo "<td><a class='white btn btn-success' role='button' href='edit_post.php?id=$id&title=$title&text=$text'>Editar</a></td>";
        echo "<td><a class='white btn btn-danger' role='button' href='validation/check_delete_post.php?id=$id'>Excluir</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    disconnect_db($conn);
}

function show_post_list() {
    global $table_posts, $id, $title, $text;
    $conn = connect_db();
    $sql = "SELECT id, title, content FROM $table_posts";
    $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
    echo "<br><br>";
    //echo "<h2 class='page-header'>Posts</h2>";
    echo "<ul class='list-group text-center'>";
    
    while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
        echo "<tr>";
        foreach ($row as $value) { 
            $id = $row['id'];
            $title = $row['title'];
            $text = $row['content'];
        }
        echo "<li class='list-group-item'><a href='view.php?id=$id&title=$title&text=$text'>".$row['title']."</a></li>";
    }    
    echo "</ul>";
    disconnect_db($conn);
}

function show_comments() {
    global $table_comments, $table_users, $table_posts, $autor, $title, $text, $id, $erro_texto;
    $conn = connect_db();
    $text = $_GET['text'];
    $sql = "SELECT A.*, C.name FROM $table_comments A LEFT JOIN $table_posts B 
            ON A.post_id = B.id LEFT JOIN $table_users C ON C.id = A.user_id";      
    $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
   // echo "<div class='container'>";
    while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
        $cid = $row['id'];
        echo "<h3>".$row['name']."</h3>";
        $comment = $row['content'];
        if (isset($_GET['edit'])&&($cid == $_GET['edit'])) {
            echo "<form action='' enctype='multipart/form-data' id='form-edit' method='POST'>";
            echo '<div class="form-group <?php if(!empty($erro_texto)){echo "has-error";}"?>';
            echo "<label for='inputC' class='col-sm-3 control-label'>Editar Comentario</label>";
            echo "<textarea required type='text' style='padding-right: 300px;' rows='5' name='ec' value='$comment'></textarea><br>";
            echo "<div id='erro-texto'></div>";
            echo "<?php if (!empty($erro_texto)): ?>
                    <span class='help-block'><?php echo $erro_texto ?></span>
                  <?php endIf; ?>";
            echo "<input class='btn btn-success' type='submit' value='Confirmar'></input>"." ";
            echo "<a href='view.php?id=$id&title=$title&text=$text'>Voltar</a>";
            echo "</div>";
            echo "</form>";
           
        }
        else { echo "<p>$comment</p>";
            if ($row['name'] == $autor) {
                echo "<a href='view.php?id=$id&title=$title&text=$text&edit=$cid'>Editar</a>"." ";
                echo "<a href='validation/comment_delete.php?id=$cid'>Excluir</a></p>";
            }
        }
    }
    //echo "</div>";
    disconnect_db($conn);
}

?>