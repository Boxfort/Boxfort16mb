<?php
  function user_exists($username)
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("SELECT COUNT(user_id) FROM users WHERE username = :username");

    //Bind parameters
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    if($isOkay){
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
      return((int)$data['COUNT(user_id)'] === 1 ? true : false);
    }else{
      return false;
    }
  }

  function user_active($username)
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("SELECT active FROM users WHERE username = :username");

      //Bind parameters
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    if($isOkay){
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
      return((int)$data['active'] === 1 ? true : false);
    }else{
      return false;
    }
  }

  function login($username, $password)
  {
    $db = new DbConnection();
    $data = array();
    $stmt = $db->prepare("SELECT password FROM users WHERE username = :username");

      //Bind parameters
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    //Check that the statement can be performed.
    $isOkay = $stmt->execute();
    if($isOkay){
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
      return(password_verify($password, $data['password']));
    }else{
      return false;
    }
  }
?>
