<?php
  include 'include/header.php';
  include 'core/init.php';
  if(logged_in())
  {
    header('Location: index.php');
  }

  if(isset($_GET['email'], $_GET['email_code']))
  {
    if(!email_exists(trim($_GET['email'])))
    {
      $_SESSION['errors'] = "We cannot find that email!";
    }
    elseif(!activate_account(trim($_GET['email']), trim($_GET['email_code'])))
    {
      $_SESSION['errors'] = "We've had a problem activating your account";
    }
  }
  else
  {
    header('Location: index.php');
    exit();
  }

  if(isset($_SESSION['errors']))
  {
    include 'include/loginerror.php';
    unset($_SESSION['errors']);
  }

  include 'include/footer.php';
?>
