<?php
  include 'core/init.php';
  include 'include/header.php';

  if(isset($_GET['topic']) && $topic = get_topic_by_id($_GET['topic']))
  {
    include 'include/thread.php';
  }
  else
  {
    $categories = get_categories();
    $topics = get_topics();

    //TODO: FIX THIS MESS

    foreach($categories as $category)
    {
      echo "<div>{$category['cat_name']}</div>";
    }

    echo '<div class="row">
          <table class="col-md-12 table-bordered table-striped table-condensed forum">
            <thead>
              <tr>
                <th>Subject</th>
                <th class="fit">Replies</th>
                <th class="fit">Last Post</th>
              </tr>
            </thead>
            <tbody>';

    foreach($topics as $topic)
    {
      $name = get_username($topic['topic_by']);
      $replies = get_reply_count($topic['topic_id']);
      $last = get_last_reply($topic['topic_id']);
      $username = get_username($last['reply_by']);

      echo "<tr>
              <td>
                <div><a href='forum.php?topic={$topic['topic_id']}'>{$topic['topic_subject']}</a></div>
                <div>Started by {$name}</div>
              </td>
              <td class='fit'>
                {$replies}
              </td>
              <td class='fit'>
                <div>{$last['reply_date']}</div>
                <div>by {$username}</div>
              </td>
            </tr>";
    }

    echo "</tbody></table></div>";
  }

  include 'include/footer.php';
?>
