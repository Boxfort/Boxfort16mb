<?php
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
