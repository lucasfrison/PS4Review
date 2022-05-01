<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/web1-trabalhofinal/app/database/db_functions.php';
    require "val_functions.php";
    require "check_posts.php";
    
    $id = $_GET['id'];
    $error = false;
   
    $conn = connect_db();

    $title = mysqli_real_escape_string($conn,$_POST["title_e"]);
    $text = mysqli_real_escape_string($conn,$_POST["text_e"]);
    $sql = "DELETE FROM $table_posts WHERE id = $id";
    if(mysqli_query($conn, $sql)){  
        $success = true;
        header("Location: " . dirname($_SERVER['SCRIPT_NAME']) . "/posts.php");
        exit();
    }
    else {
        $error_msg = mysqli_error($conn);
        $error = true;
    }
    disconnect_db($conn);
?>