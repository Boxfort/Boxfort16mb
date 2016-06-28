<?php

  function send_confirmation($email)
  {
    require_once('core/functions/PHPMailer/PHPMailerAutoload.php');
    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'boxfort16mb@gmail.com';                 // SMTP username
    $mail->Password = 'PASSWORD';                           // SMTP password
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('boxfort16mb@gmail.com', 'Boxfory16mb');
    $mail->addAddress($email);     // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Account activation.';
    $mail->Body    = "Hello! <br/> newline";
    $mail->AltBody = "Hello!";

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
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
