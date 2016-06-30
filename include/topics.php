<?php
  $topics = get_topics();
?>

<div class="row">
  <table class="col-md-12 table-bordered table-striped table-condensed forum">
    <thead>
      <tr>
        <th>Subject</th>
        <th class="fit">Replies</th>
        <th class="fit">Last Post</th>
      </tr>
    </thead>
    <tbody>

<?php
  foreach($topics as $topic)
  {
    $name = get_username($topic['topic_by']);
    $replies = get_reply_count($topic['topic_id']);
    $last = get_last_reply($topic['topic_id']);
    if(!$last)
    {
      $username = get_username($topic['topic_by']);
      $date = $topic['topic_date'];
    }
    else
    {
      $username = get_username($last['reply_by']);
      $date = $last['reply_date'];
    }


    echo "<tr>
            <td>
              <div><a href='forum.php?topic={$topic['topic_id']}'>{$topic['topic_subject']}</a></div>
              <div>Started by {$name}</div>
            </td>
            <td class='fit'>
              {$replies}
            </td>
            <td class='fit'>
              <div>{$date}</div>
              <div>by {$username}</div>
            </td>
          </tr>";
  }
?>
    </tbody>
  </table>
</div>
