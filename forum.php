<?php
  include 'core/init.php';
  include 'include/header.php';

  if(isset($_GET['topic']) && $topic = get_topic_by_id($_GET['topic']))
  {
    include 'include/thread.php';
  }
  else
  {
    include 'include/topics.php';
  }

  include 'include/footer.php';
?>
