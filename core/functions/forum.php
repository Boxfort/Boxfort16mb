<?php

  function get_categories()
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("SELECT * FROM categories");

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($isOkay)
    {
      return $categories;
    }
    else
    {
      return false;
    }
  }

  function get_category_name($id)
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("SELECT cat_name FROM categories WHERE cat_id = :id");

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    $id = $stmt->fetch(PDO::FETCH_ASSOC);

    if($isOkay)
    {
      return $id['cat_name'];
    }
    else
    {
      return false;
    }
  }

  function create_post($reply, $op)
  {
    if($op)
    {
      $author = get_username($reply['topic_by']);
      $posts = get_post_count($reply['topic_by']);
      $date = $reply['topic_date'];
      $body = $reply['topic_body'];
    }
    else
    {
      $author = get_username($reply['reply_by']);
      $posts = get_post_count($reply['reply_by']);
      $date = $reply['reply_date'];
      $body = $reply['reply_content'];
    }

    $author = htmlentities($author);
    $body = htmlentities($body);
    $date = date("jS M, Y, h:i:s A", strtotime($date));

    echo "<div class='col-md-12 reply'>
            <div class='reply-user'>
              {$author}
              <img src='img/profile.png' class='img-circle'></img>
              Posts: {$posts}
            </div>

            <div class='reply-body'>
              <div class='reply-date'>
                {$date}
              </div>
              <div>
                {$body}
              </div>
            </div>
          </div>";
  }

  function get_topics($category = "all")
  {
    $db = new DbConnection();
    $data = array();

    if($category == "all")
    {
      $sql = "SELECT * FROM topics";
    }
    else
    {
      $sql = "SELECT * FROM topics WHERE topic_cat = :category";
    }

    $stmt = $db->prepare($sql);

    $category = get_category_id($category);
    $stmt->bindParam(":category", $category, PDO::PARAM_INT);

    $isOkay = $stmt->execute();
    $topics = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($isOkay)
    {
      return $topics;
    }
    else
    {
      return false;
    }
  }

  function get_topic_by_id($id)
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("SELECT * FROM topics WHERE topic_id = :id");

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if($isOkay)
    {
      return $data;
    }
    else
    {
      return false;
    }
  }

  function get_replies($topic)
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("SELECT * FROM replies WHERE reply_topic = :topic ORDER BY reply_date");

    $stmt->bindParam(":topic", $topic, PDO::PARAM_INT);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($isOkay)
    {
      return $data;
    }
    else
    {
      return false;
    }
  }

  function get_reply_count($topic)
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("SELECT COUNT(reply_id) FROM replies WHERE reply_topic = :topic");

    $stmt->bindParam(":topic", $topic, PDO::PARAM_INT);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if($isOkay)
    {
      return $data['COUNT(reply_id)'];
    }
    else
    {
      return false;
    }
  }

  function get_last_reply($topic)
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("SELECT reply_by, reply_date FROM replies WHERE reply_topic = :topic");

    $stmt->bindParam(":topic", $topic, PDO::PARAM_INT);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if($isOkay)
    {
      return $data;
    }
    else
    {
      return false;
    }
  }

  function get_category_id($category)
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("SELECT cat_id FROM categories WHERE cat_name = :category");

    $stmt->bindParam(":category", $category, PDO::PARAM_STR);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    $id = $stmt->fetch(PDO::FETCH_ASSOC);

    if($isOkay)
    {
      return $id['cat_id'];
    }
    else
    {
      return false;
    }
  }

?>
