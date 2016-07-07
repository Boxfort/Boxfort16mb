<?php
  include 'core/init.php';

  if(!empty($_POST) && logged_in())
  {
    post_reply(trim($_POST['message']), $_SESSION['topic_post'], date("Y-m-d H:i:s"));
    unset($_SESSION['topic_post']);
    header("Location: {$_SESSION['last_topic']}");
  }
  else
  {
    header("Location: index.php");
  }
?>
