<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/web1-trabalhofinal/app/database/db_functions.php';
    require_once "val_functions.php";
    require_once "check_posts.php";
    require_once "authenticate.php";

    if ($isadmin) {
    
    $id = $_GET['id'];
    $error = false;
   
    $conn = connect_db();

    $id = mysqli_real_escape_string($conn,$id);
    $sql = "DELETE FROM $table_posts WHERE id = $id";
    if(mysqli_query($conn, $sql)){  
        $success = true;
        header("Location: " . "/web1-trabalhofinal/app/posts.php");
        exit();
    }
    else {
        $error_msg = mysqli_error($conn);
        $error = true;
    }
    disconnect_db($conn);
    }
?>