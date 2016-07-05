<nav role="navigation" class="navbar navbar-simple navbar-static-top">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
      <span class="sr-only">Toggle navigation</span>
      <span class="glyphicon glyphicon-menu-hamburger"></span>
    </button>
  <a href="#" class="navbar-brand">B O X F O R T</a>
  </div>
  <div id="navbarCollapse" class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="downloads.php">Downloads</a></li>
      <li class="nav-item"><a class="nav-link" href="forum.php">Forum</a></li>
      <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
    </ul>

    <ul class="nav navbar-nav pull-right">
      <li><a href="register.php"><span class='glyphicon glyphicon-pencil'></span>   Sign Up</a></li>
      <li class="divider-vertical"></li>
        <?php
          if(logged_in())
          {
            $username = get_username($_SESSION['user_id']);
            echo '<li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>   '.$username.'<strong class="caret"></strong></a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-login" style="padding: 15px; padding-bottom: 0px;">
                      <li><a href="profile.php?user='.$_SESSION['user_id'].'">Profile</a></li>
                      <li><a href="passwordchange.php">Change Password</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="logout.php">Logout</a></li>
                    </ul>
                  </li>';
          }
          else
          {
            echo '<li class="btn-login"><a href="#loginmodal" class="btn-login" data-toggle="modal" data-target="#loginmodal"><span class="glyphicon glyphicon-log-in"></span>   Sign In</a></li>';
          }
        ?>
      </li>
    </ul>
  </div>
</nav>
