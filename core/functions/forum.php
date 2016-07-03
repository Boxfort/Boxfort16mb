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
      $id = $reply['topic_by'];
      $author = get_username($reply['topic_by']);
      $posts = get_post_count($reply['topic_by']);
      $date = $reply['topic_date'];
      $body = $reply['topic_body'];
    }
    else
    {
      $id = $reply['reply_by'];
      $author = get_username($reply['reply_by']);
      $posts = get_post_count($reply['reply_by']);
      $date = $reply['reply_date'];
      $body = $reply['reply_content'];
    }

    $author = htmlentities($author);
    $body = nl2br(htmlentities($body));
    $date = date("jS M, Y, h:i:s A", strtotime($date));

    echo "<tr class='reply'>
            <td class='reply-user fit'>
              <h4><a href='profile.php?user={$id}'>{$author}</a></h4>
              <img src='img/profile.png' class='img-circle'></img>
              Posts: {$posts}
            </td>

            <td class='reply-body'>
              <div class='reply-date'>
                {$date}
              </div>
              <div>
                {$body}
              </div>
            </td>
          </tr>";
  }

  function post_reply($message, $topic, $datetime)
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("INSERT INTO replies (reply_content, reply_date, reply_topic, reply_by) VALUES (:message, :dt, :topic, :user_id)");

    $stmt->bindParam(":message", $message, PDO::PARAM_STR);
    $stmt->bindParam(":dt", $datetime, PDO::PARAM_STR);
    $stmt->bindParam(":topic", $topic, PDO::PARAM_INT);
    $stmt->bindParam(":user_id", $_SESSION['user_id'], PDO::PARAM_INT);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();

    if($isOkay)
    {
      return true;
    }
    else
    {
      return false;
    }
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

  function get_replies($topic, $start, $perpage)
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("SELECT * FROM replies WHERE reply_topic = :topic ORDER BY reply_date LIMIT :start, :perpage");

    $stmt->bindParam(":topic", $topic, PDO::PARAM_INT);
    $stmt->bindParam(":start", $start, PDO::PARAM_INT);
    $stmt->bindParam(":perpage", $perpage, PDO::PARAM_INT);

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

  function get_num_replies($topic)
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
