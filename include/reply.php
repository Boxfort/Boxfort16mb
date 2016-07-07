<?php
  $pphtml = "";
  $sightml = "";

  if($sigpp['personal_text'] !== "")
  {
    $pphtml = "<div>{$sigpp['personal_text']}</div>";
  }
  if($sigpp['signature'] !== "")
  {
    $sightml = "<hr class='signature' /><div class='signature'>{$sigpp['signature']}</div>";
  }
?>

<tr class='reply' id='<?php echo $reply_id; ?>'>
  <td class='reply-user fit container-white'>
    <h4><a href='profile.php?user=<?php echo $id; ?>'><?php echo $author; ?></a></h4>
    <img src='<?php echo $picture; ?>' class='img-circle'></img>
    <div>Posts: <?php echo $posts; ?></div>
    <?php echo $pphtml; ?>
  </td>
  <td class='reply-body container-white'>
    <div class='reply-header'>
      <a class='reply-title' href='#<?php echo $reply_id; ?>'><?php echo $title; ?></a>
      <span class='reply-date'><span class='glyphicon glyphicon-time'></span> <?php echo $date; ?></span>
    </div>
    <div>
      <?php echo $body; ?>
    </div>
    <?php echo $sightml; ?>
  </td>
</tr>
