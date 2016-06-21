<?php
  include 'core/init.php';

  if(empty($_POST) === false)
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password))
    {
      $errors[] = 'You need to enter a username and password.';
    }
    elseif(!user_exists($username))
    {
      $errors[] = 'Incorrect username or password.';
    }
    elseif(!user_active($username))
    {
      $errors[] = 'Please activate your account.';
    }
    else
    {
        //Check if password is correct!
    }

    print_r($errors);
  }
?>
