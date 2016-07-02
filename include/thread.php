<?php
  $_SESSION['last_topic'] = $_SERVER['REQUEST_URI'];
  $_SESSION['topic_post'] = $_GET['topic'];

  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  $perpage = 10;
  $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

  $total = get_num_replies($_GET['topic']);

  $pages = ceil($total / $perpage);

  $replies = get_replies($_GET['topic'], $start, $perpage);

  if($page == 1)
  {
    create_post(get_topic_by_id($_GET['topic']), true);
  }

  foreach($replies as $reply)
  {
    create_post($reply, false);
  }

?>

<div id="pagination">
  <ul class="pagination">
  <?php
    $topic = $_GET['topic'];
    //If its not the first page, create a previous button.
    if($page != 1){
      $prevPage = $_GET['page'] - 1;
      echo "<li><a href='?topic={$topic}&page={$prevPage}'>Previous</a></li>";
    }
    //Create number buttons for each page.
    for($i = 1; $i <= $pages; $i++){
      //Remove link for current page button.
      if($page == $i){
        echo "<li><a>{$i}</a></li>";
      }else{
        echo "<li><a href='?topic={$topic}&page={$i}'>{$i}</a></li>";
      }
    }
    //If its not the last page create a next button.
    if($page != $pages && $total >= $perpage){
      $nextPage = $page + 1;
      echo "<li><a href='?topic={$topic}&page={$nextPage}'>Next</a></li>";
    }
  ?>
 </ul>
</div>

<?php
  if(logged_in())
  {
    include 'replyform.php';
  }
?>
