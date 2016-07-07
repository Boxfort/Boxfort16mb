<?php
  include 'core/init.php';

  if(isset($_FILES['file']))
  {
    if($_FILES['file']['name'] != "")
    {
      $file = $_FILES['file'];

      //File properties
      $file_name = $file['name'];
      $file_tmp = $file['tmp_name'];
      $file_size = $file['size'];
      $file_error = $file['error'];


      //Get file extension
      $file_ext = explode('.', $file_name);
      $file_ext = strtolower(end($file_ext));

      $allowed = array('gif','bmp','jpg','jpeg','png');

      if(in_array($file_ext, $allowed))
      {
        if($file_error === 0 && $file_size <= 2097152)
        {
          $file_name_new = $_SESSION['user_id'] . '.' . $file_ext;
          $file_destination = "img/profiles/" . $file_name_new;
          //delete files uploaded by the user
          foreach($allowed as $ext)
          {
            $mask = $_SESSION['user_id'].".".$ext;
            array_map( "unlink", glob( $mask ) );
          }
          if(!move_uploaded_file($file_tmp, $file_destination))
          {
            $_SESSION['errors'] = 'Error uploading file.';
          }
        }
        else
        {
          $_SESSION['errors'] = 'Error uploading file.';
        }
      }
      else
      {
        $_SESSION['errors'] = 'Error uploading file.';
      }
    }
  }

  $ptext = trim($_POST['ptext']);
  $sig = trim($_POST['sig']);

  if(strlen($ptext) != 0)
  {
    if(strlen($ptext) < 26)
    {
      if(!update_ptext($_SESSION['user_id'], $ptext))
      {
        $_SESSION['errors'] = 'There is a problem with our servers. Please try again later.';
      }
    }
    else
    {
      $_SESSION['errors'] = 'Personal text must be 25 characters or less.';
    }
  }

  if(trim($sig) != "")
  {
    if(strlen($sig) < 256)
    {
      if(!update_signature($_SESSION['user_id'], $sig))
      {
        $_SESSION['errors'] = 'There is a problem with our servers. Please try again later.';
      }
    }
    else
    {
      $_SESSION['errors'] = 'Signature must be 255 characters or less.';
    }
  }

  if(isset($_SESSION['errors']))
  {
    header('Location: editprofile.php');
    exit();
  }

  header('Location: profile.php');
?>
