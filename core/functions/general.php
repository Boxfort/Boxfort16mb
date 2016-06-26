<?php
  function contains($str, array $arr)
  {
    foreach($arr as $a)
    {
        if (stripos($str,$a) !== false) return true;
    }
    return false;
  }
?>
