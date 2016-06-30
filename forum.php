<?php
  include 'core/init.php';
  include 'include/header.php';

  $categories = get_categories();
  $topics = get_topics();

  //TODO: SANITISE PLEASE
  foreach($categories as $category)
  {
    echo "<div>{$category['cat_name']}</div>";
  }
  foreach($topics as $topic)
  {
    $name = get_username($topic['topic_by']);
    echo "<div>{$topic['topic_subject']} by: {$name}</div>";
  }

  include 'include/footer.php';
?>
