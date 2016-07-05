<?php
  include 'core/init.php';
  include 'include/header.php';

  if(isset($_GET['user']))
  {
    if(user_exists(get_username($_GET['user'])))
    {
      include 'include/userpage.php';
    }
    elseif(logged_in())
    {
      header('Location: index.php');
    }
    else
    {
      header('Location: profile.php?user='.$_SESSION['user_id']);
    }
  }
  elseif(logged_in())
  {
    header('Location: profile.php?user='.$_SESSION['user_id']);
  }

  echo '</div>';
  include 'include/footer.php';
?>
