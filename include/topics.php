<?php
  if(isset($_GET['cat']))
  {
    $topics = get_topics($_GET['cat']);
  }
  else
  {
    $topics = get_topics();
  }

  $categories = get_categories();
?>

<div class="container-white">
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      <?php echo (isset($_GET['cat']) ? $_GET['cat'] : 'All Categories'); ?>
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
      <li><a href="forum.php">All Categories</a></li>
      <?php
        foreach($categories as $category)
        {
          echo "<li><a href='forum.php?cat={$category['cat_name']}'>{$category['cat_name']}</a></li>";
        }
      ?>
    </ul>
  </div>

  <div class="row">
    <table class="col-md-12 table-bordered table-condensed forum">
      <thead>
        <tr>
          <th>Subject</th>
          <?php echo (isset($_GET['cat']) ? "" : '<th class="fit">Category</th>'); ?>
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
              </td>";
              echo (isset($_GET['cat']) ? "" : '<td class="fit">'.get_category_name($topic["topic_cat"]).'</td>');
      echo   "<td class='fit'>
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
</div>
</div>
