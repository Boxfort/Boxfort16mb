<?php
  include 'core/init.php';
  protect_page();
  include 'include/header.php';

  if(!empty($_POST))
  {
    $required_fields = array('password_old', 'password_new', 'password_conf');
    foreach($_POST as $key=>$value)
    {
      if(empty($value) && in_array($key, $required_fields))
      {
        $_SESSION['errors'] = "Fields marked with an asterisk are required.";
      }
      elseif(preg_match("/\b[a-z0-9_-]{3,15}\b/", $value, $match))
      {
        if(strlen($match[0]) !== strlen($value))
        {
          $_SESSION['errors'] = "Fields may only contain alphanumeric characters A-z 0-9 and underscores.";
        }
      }
    }

    if($_POST['password_new'] === $_POST['password_old'])
    {
      $_SESSION['errors'] = "New password cannot be the same as current password.";
    }
    elseif($_POST['password_new'] !== $_POST['password_conf'])
    {
      $_SESSION['errors'] = "Passwords do not match.";
    }
    elseif(!login($user_data['username'], $_POST['password_old']))
    {
      $_SESSION['errors'] = "Incorrect password.";
    }

    if(!isset($_SESSION['errors']))
    {
      if(!change_password($user_data['user_id'], $_POST['password_new']))
      {
        $_SESSION['errors'] = "We were unable to change your password due to a problem with our servers. Please try again later.";
      }
    }

  }
?>

<div class="table-center">
<h1>Change password</h1>
<?php
  if(!empty($_SESSION['errors']))
  {
    include 'include/loginerror.php';
    unset($_SESSION['errors']);
  }elseif(!empty($_POST))
  {
    $user_data = get_user_data($_SESSION['user_id']);
    echo '<div class="alert alert-success" role="alert">
            Password successfully changed! <a href="index.php" class="alert-link">Return to home page.</a>
          </div>';
  }
?>
  <form action="" method="post">
    <table class="table">
      <tbody>
        <tr>
          <td><label class="required">Old password</label></td>
          <td><input type="password" class="form-control register" name="password_old" placeholder="Old password" required autofocus></td>
        <tr>
        <tr>
          <td><label class="required">New password</label></td>
          <td><input type="password" class="form-control register" name="password_new" placeholder="New password" required></td>
        </tr>
        <tr>
          <td><label class="required">Confirm new password</label></td>
          <td><input type="password" class="form-control register" name="password_conf" placeholder="Confirm new password" required></td>
        </tr>
        <tr>
          <td></td>
          <td><button class="btn btn-primary btn-register">Change password</button></td>
        </tr>
      <tbody>
    </table>
  </form>
</div>

<?php include 'include/footer.php'; ?>
