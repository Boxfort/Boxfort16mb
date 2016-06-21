<?php
  include('core/init.php');

  if(empty($_POST) === false)
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password) || !user_exists($username))
    {
      //Login Failure
    }
  }
?>
