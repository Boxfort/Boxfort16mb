<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
  <?php
    if(logged_in())
    {
      echo "<a href='logout.php'> Log out </a>";
    }
    else
    {
      include('include/login.php');
    }
  ?>
</div>
