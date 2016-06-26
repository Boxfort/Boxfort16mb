<?php
  session_start();
  //error_reporting(0);

  require 'dbconnection.php';
  require 'functions/users.php';
  require 'functions/general.php';

  $errors = array();

  if(logged_in())
  {
    $user_data = get_user_data($_SESSION['user_id']);
    if (!user_active($user_data['username']))
    {
      session_destroy();
      header('Location: index.php');
      exit();
    }
  }
?>
