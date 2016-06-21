<?php
  include 'core/init.php';

  if(empty($_POST) === false)
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password))
    {
      echo "No username / pass entered";
      //Login Failure
    }elseif(user_exists($username) === true)
    {
      echo "user exists";
    }
    else
    {
      echo "NO USER WITH THAT NAME HAHAHAH";
    }
  }
?>
