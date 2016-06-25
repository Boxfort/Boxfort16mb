<?php
  include_once 'core/init.php';

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
      $login = login($username, $password);
      if($login === false)
      {
        $errors[] = 'Incorrect username or password.';
      }
      else
      {
        $_SESSION['user_id'] = $login;
        header('Location: index.php');
        exit();
      }
    }

    $_SESSION['errors'] = $errors[count($errors) - 1];
    header('Location: index.php');
  }
?>
