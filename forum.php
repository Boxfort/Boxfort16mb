<?php
  include 'core/init.php';
  include 'include/header.php';

  if(isset($_GET['topic']) && $topic = get_topic_by_id($_GET['topic']))
  {
    $replies = get_replies($_GET['topic']);
    foreach($replies as $reply)
    {
      echo "<div><div>{$reply['reply_by']} {$reply['reply_date']}</div><div>{$reply['reply_content']}</div></div>";
    }
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

    echo '<table class="col-md-12 table-bordered table-striped table-condensed">
            <thead>
              <tr>
                <th>Subject</th>
                <th>Replies</th>
                <th>Last Post</th>
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
                <div>Started by: {$name}</div>
              </td>
              <td>
                {$replies}
              </td>
              <td>
                <div>{$last['reply_date']}</div>
                <div>by {$username}</div>
              </td>
            </tr>";
    }

    echo "</tbody></table>";
  }

  include 'include/footer.php';
?>
