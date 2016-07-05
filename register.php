<?php
  include 'core/init.php';
  include 'include/header.php';

  if (!empty($_POST))
  {
    $required_fields = array('username', 'email', 'email_conf', 'password', 'password_conf');
    foreach($_POST as $key=>$value)
    {
      if(empty($value) && in_array($key, $required_fields))
      {
        $_SESSION['errors'] = "Fields marked with an asterisk are required.";
      }
      elseif($key != 'email' && $key != 'email_conf' && $key != "password" && $key != "password_conf" && $key != "g-recaptcha-response")
      {
        if(preg_match("/\b[a-z0-9_-]{3,15}\b/", $value, $match))
        {
          if(strlen($match[0]) !== strlen($value))
          {
            $_SESSION['errors'] = "Fields may only contain alphanumeric characters A-z 0-9 and underscores. {$key}";
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

    if(isset($_POST['g-recaptcha-response']))
    {
      $settings = load_ini('recaptcha.ini');

      $secret = $settings['recaptcha']['secret'];
      $ip = $_SERVER['REMOTE_ADDR'];
      $captcha = $_POST['g-recaptcha-response'];
      $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$captcha}&remoteip={$ip}");
      $response_array = json_decode($response, true);

      if($response_array['success'] === false)
      {
        $_SESSION['errors'] = "Please complete the reCAPTCHA verification.";
      }
    }

    if(!isset($_SESSION['errors']))
    {
      $email_code = md5($_POST['username'] + microtime());
      if(!register_account($_POST['username'], $_POST['email'], $email_code, $_POST['password']))
      {
        $_SESSION['errors'] = "We were unable to create your account due to a problem with our servers. Please try again later.";
      }
    }
  }
?>

<div class="table-center container-white">
<h2>Register a new account</h2>
<hr/>
<?php
  if(!empty($_SESSION['errors']))
  {
    include 'include/loginerror.php';
    unset($_SESSION['errors']);
  }
  elseif(!empty($_POST))
  {
    echo '<div class="alert alert-success" role="alert">
            Success! A confirmation e-mail has been sent to your inbox. <a href="index.php" class="alert-link">Return to home page.</a>
          </div>';
  }
?>
    <form action="" method="post">
      <div class="center">
        <div class="register-form center">
          <label class="required">Username</label><br/>
          <input class="form-control register" name="username" placeholder="Username" required autofocus><br/>
          <label class="required">E-mail</label><br/>
          <input class="form-control register" name="email" placeholder="example@website.com" required><br/>
          <label class="required">Confirm e-mail</label><br/>
          <input class="form-control register" name="email_conf" placeholder="example@website.com" required><br/>
          <label class="required">Password</label><br/>
          <input class="form-control register" name="password" type="password" placeholder="Password" required><br/>
          <label class="required">Confirm password</label><br/>
          <input class="form-control register" name="password_conf" type="password" placeholder="Password" required><br/>
        </div>
        <div class="g-recaptcha center" data-sitekey="6LeokSMTAAAAAFt-eLn_YTDhRhefxMWDzO8ulFwe"></div>
        <div class='register-form center'>
          <button class="btn btn-primary btn-register">Register</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
  include 'include/footer.php';
?>
