<?php
  include('core/init.php');

  if(empty($_POST) === false)
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo $username;
    echo $password;
  }
?>
