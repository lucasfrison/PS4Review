<?php
  session_start();
  $isadmin = false;

  if (isset($_SESSION["user_id"]) && isset($_SESSION["user_name"]) && isset($_SESSION["user_email"])) {
    $login = true;
    $user_id = $_SESSION["user_id"];
    if ($user_id == 1) $isadmin = true;
    $user_name = $_SESSION["user_name"];
    $user_email = $_SESSION["user_email"];
  }
  else{
    $login = false;
  }

?>
