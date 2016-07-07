<?php
  include 'core/init.php';

  if(isset($_POST))
  {
    if(trim($_POST['subject']) != "")
    {
      if(trim($_POST['body']) != "")
      {
        if(trim($_POST['cat']) != "")
        {
            if(!post_topic($_POST['subject'], $_POST['body'], $_POST['cat'], $_SESSION['user_id']))
            {
              $_SESSION['errors'] = "There is a problem with our servers. Please try again later.";
            }
        }
        else
        {
          $_SESSION['errors'] = "Select a category!";
        }
      }
      else
      {
        $_SESSION['errors'] = "Topic body cannot be empty!";
      }
    }
    else
    {
      $_SESSION['errors'] = "Subject cannot be empty!";
    }
  }

  if(isset($_SESSION['errors']))
  {
    header('Location: newtopic.php');
    exit();
  }
  header('Location: forum.php');

?>
