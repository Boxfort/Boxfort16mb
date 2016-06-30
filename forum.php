<?php
  include 'core/init.php';
  include 'include/header.php';

  echo "<div class='container'>";

  if(isset($_GET['topic']) && $topic = get_topic_by_id($_GET['topic']))
  {
    include 'include/thread.php';
  }
  else
  {
    include 'include/topics.php';
  }

    echo "</div>";

  include 'include/footer.php';
?>
