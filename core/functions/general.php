<?php

  function load_ini($file)
  {
    if (!$settings = parse_ini_file(dirname(__DIR__) . '/' . $file, TRUE))
    {
      throw new exception('Unable to open ' . $file . '.');
    }

    return $settings;
  }

  function send_confirmation($email, $email_code)
  {
    require_once('core/functions/PHPMailer/PHPMailerAutoload.php');

    $file = 'functions/PHPMailer/email.ini';
    $settings = load_ini($file);

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = "{$settings['email']['host']}";             // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "{$settings['email']['username']}";     // SMTP username
    $mail->Password = "{$settings['email']['password']}";     // SMTP password
    $mail->Port = "{$settings['email']['port']}";             // TCP port to connect to

    $mail->setFrom($settings['email']['username']);
    $mail->addAddress($email);                            // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Account activation.';
    $mail->Body    = "Please activate your account by following this link - localhost/boxfort16mb/activate.php?email={$email}&email_code={$email_code}";
    $mail->AltBody = "Please activate your account by following this link - localhost/boxfort16mb/activate.php?email={$email}&email_code={$email_code}";

    if(!$mail->send()) {
        return false;
    } else {
        return true;
    }
  }

  function contains($str, array $arr)
  {
    foreach($arr as $a)
    {
        if (stripos($str,$a) !== false) return true;
    }
    return false;
  }

  function protect_page()
  {
    if(!logged_in())
    {
      header('Location: Index.php');
      exit();
    }
  }
?>
