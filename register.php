<?php
  include 'core/init.php';
  include 'include/header.php';

  if (!empty($_POST))
  {
    $required_fields = array('username', 'first', 'email', 'email_conf', 'password', 'password_conf');
    foreach($_POST as $key=>$value)
    {
      if(empty($value) && in_array($key, $required_fields))
      {
        $_SESSION['errors'] = "Fields marked with an asterisk are required.";
      }
      elseif($key != 'email' && $key != 'email_conf')
      {
        if(preg_match("/\b[a-z0-9_-]{3,15}\b/", $value, $match))
        {
          if(strlen($match[0]) !== strlen($value))
          {
            $_SESSION['errors'] = "Fields may only contain alphanumeric characters A-z 0-9 and underscores.";
          }
        }
      }
    }
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
      $_SESSION['errors'] = "Invalid e-mail address.";
    }
    elseif(strtolower($_POST['email']) !== strtolower($_POST['email_conf']))
    {
      $_SESSION['errors'] = "E-mail addresses do not match.";
    }
    elseif($_POST['password'] !== $_POST['password_conf'])
    {
      $_SESSION['errors'] = "Passwords do not match.";
    }
    elseif(user_exists($_POST['username']))
    {
      $_SESSION['errors'] = "Username already exists.";
    }
    elseif(email_exists($_POST['email']))
    {
      $_SESSION['errors'] = "E-mail is already registered to an account.";
    }

    if(!isset($_SESSION['errors']))
    {
      if(!register_account($_POST['username'], $_POST['first'], $_POST['last'], $_POST['email'], $_POST['password']))
      {
        $_SESSION['errors'] = "We were unable to create your account due to a problem with our servers. Please try again later.";
      }
    }
  }
?>

<div class="table-center">
<h1>Register a new account</h1>
<?php
  if(!empty($_SESSION['errors']))
  {
    include 'include/loginerror.php';
    unset($_SESSION['errors']);
  }elseif(!empty($_POST))
  {
    echo '<div class="alert alert-success" role="alert">
            Success! A confirmation e-mail has been sent to your inbox. <a href="index.php" class="alert-link">Return to home page.</a>
          </div>';
  }
?>
  <form action="" method="post">
    <table class="table">
      <tbody>
        <tr>
          <td><label class="required">Username</label></td>
          <td><input class="form-control register" name="username" placeholder="Username" required autofocus></td>
        <tr>
        <tr>
          <td><label class="required">First name</label></td>
          <td><input class="form-control register" name="first" placeholder="First name" required></td>
        </tr>
        <tr>
          <td><label>Last name</label></td>
          <td><input class="form-control register" name="last" placeholder="Last name"></td>
        </tr>
        <tr>
          <td><label class="required">E-mail</label></td>
          <td><input class="form-control register" name="email" placeholder="example@website.com" required></td>
        </tr>
        <tr>
          <td><label class="required">Confirm e-mail</label></td>
          <td><input class="form-control register" name="email_conf" placeholder="example@website.com" required></td>
        </tr>
        <tr>
          <td><label class="required">Password</label></td>
          <td><input class="form-control register" name="password" type="password" placeholder="Password" required></td>
        </tr>
        <tr>
          <td><label class="required">Confirm password</label></td>
          <td><input class="form-control register" name="password_conf" type="password" placeholder="Password" required></td>
        </tr>
        <tr>
          <td></td>
          <td><button class="btn btn-primary btn-register">Register</button></td>
        </tr>
      <tbody>
    </table>
  </form>
</div>

<?php
  include 'include/footer.php';
?>
