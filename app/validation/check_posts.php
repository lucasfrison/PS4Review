<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/web1-trabalhofinal/app/database/db_functions.php';

$id;
function show_posts() {
    global $table_posts, $id;
    $i = 0;
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
        }
        echo "<td><a class='white btn btn-success' role='button' href='edit_post.php?id=$id'>Editar</a></td>";
        echo "<td><a class='white btn btn-danger' role='button'>Excluir</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    disconnect_db($conn);
}

?>