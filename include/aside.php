<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
  <?php
    if(logged_in())
    {
      echo "<a href='logout.php'> Log out </a>
            <a href='passwordchange.php'> Change password </a>";
    }
    else
    {
      include('include/login.php');
    }
  ?>
  <h2 class="aside">Users</h2>
  <p>We currently have <?php echo total_users(); ?> registered users.</p>
</div>
