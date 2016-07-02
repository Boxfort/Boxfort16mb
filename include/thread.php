<?php
  $_SESSION['last_topic'] = $_SERVER['REQUEST_URI'];
  $_SESSION['topic_post'] = $_GET['topic'];

  $replies = get_replies($_GET['topic']);

  create_post(get_topic_by_id($_GET['topic']), true);

  foreach($replies as $reply)
  {
    create_post($reply, false);
  }

  if(logged_in())
  {
    include 'replyform.php';
  }
?>
