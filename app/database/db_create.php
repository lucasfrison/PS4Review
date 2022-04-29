<?php
    require "credentials.php";

    $conn = mysqli_connect($servername, $username, $password);
    $sql = "CREATE DATABASE $dbname";
    mysqli_query($conn,  $sql);
?>    