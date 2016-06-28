<?php

  function logged_in()
  {
    return (isset($_SESSION['user_id'])) ? true : false;
  }

  function total_users()
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("SELECT COUNT(user_id) FROM users WHERE active = 1");

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    if($isOkay)
    {
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
      return $data['COUNT(user_id)'];
    }

    return 0;
  }

  function register_account($username, $first, $last, $email, $email_code, $password)
  {
    $encrypt_pass = password_hash($password, PASSWORD_BCRYPT);

    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("INSERT INTO users (username, password, first_name, surname, email, email_code)
                          VALUES (:username, :password, :first, :last, :email, :email_code)");

    //Bind parameters
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":password", $encrypt_pass, PDO::PARAM_STR);
    $stmt->bindParam(":first", $first, PDO::PARAM_STR);
    $stmt->bindParam(":last", $last, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":email_code", $email_code, PDO::PARAM_STR);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();

    if($isOkay)
    {
      return true;
    }

    return false;
  }

  function change_password($user_id, $new_password)
  {
    $encrypt_pass = password_hash($new_password, PASSWORD_BCRYPT);

    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("UPDATE users SET password = :encrypt_pass WHERE user_id = :user_id");

    //Bind parameters
    $stmt->bindParam(':encrypt_pass', $encrypt_pass, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    if($isOkay)
    {
      return true;
    }

    return false;
  }

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

  function email_exists($email)
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("SELECT COUNT(email) FROM users WHERE email = :email");

    //Bind parameters
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    if($isOkay)
    {
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
      return ((int)$data['COUNT(email)'] === 1 ? true : false);
    }

    return false;
  }

  function get_user_data($id)
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("SELECT * FROM users WHERE user_id = :id");

    //Bind parameters
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    if($isOkay)
    {
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
      return $data;
    }

    return false;
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
