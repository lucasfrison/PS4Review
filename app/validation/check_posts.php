<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web1-trabalhofinal/app/database/db_functions.php';

$id;
$title;
$text = '';

function show_posts() {
    global $table_posts, $id, $title;
    $conn = connect_db();
    $sql = "SELECT id, title FROM $table_posts";
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
            echo "<td>".$value."</td>";
            $id = $row['id'];
            $title = $row['title'];
        }
        echo "<td><a class='white btn btn-success' role='button' href='edit_post.php?id=$id&title=$title'>Editar</a></td>";
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
    echo "<h2 class='page-header'>Posts</h2>";
    echo "<ul class='list-group'>";
    
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
    global $table_comments;
    $conn = connect_db();
    $sql = "SELECT content FROM $table_comments";
    $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
    echo "<br><br>";
    echo "<table class='table'>";
    while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
        echo "<tr><td>".$row['content']."</td></tr>";
    }
    echo "</table>";
    disconnect_db($conn);
}

?>