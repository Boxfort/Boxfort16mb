<?php
  function user_exists($username)
  {
    $data = query_on_username("SELECT COUNT(user_id) FROM users WHERE username = :username", $username);
    return($data === false ? false : ((int)$data['COUNT(user_id)'] === 1 ? true : false));
  }

  function user_active($username)
  {
    $data = query_on_username("SELECT active FROM users WHERE username = :username", $username);
    return($data === false ? false : ((int)$data['active'] === 1 ? true : false));
  }

  function id_from_username($username)
  {
    $data = query_on_username("SELECT user_id FROM users WHERE username = :username", $username);
    return($data === false ? false : $data['user_id']);
  }

  function login($username, $password)
  {
    $userid = id_from_username($username);
    $data = query_on_username("SELECT password FROM users WHERE username = :username", $username);
    return ($data === false ? false : (password_verify($password, $data['password'])) ? $userid : false );
  }

  function query_on_username($sql, $username)
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare($sql);

    //Bind parameters
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    if($isOkay)
    {
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
      return $data;
    }

    return false;
  }
?>
