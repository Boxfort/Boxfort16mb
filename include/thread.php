<?php
  $replies = get_replies($_GET['topic']);

  create_post(get_topic_by_id($_GET['topic']), true);

  foreach($replies as $reply)
  {
    create_post($reply, false);
  }
?>
