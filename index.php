<?php
  include('core/init.php');
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Boxfort16mb</title>
  </head>
  <body>
    <div class="container">
      <nav role="navigation" class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a href="#" class="navbar-brand">B O X F O R T</a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="downloads.php">Downloads</a></li>
            <li class="nav-item"><a class="nav-link" href="forum.php">Forum</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <ul>
        </div>
      </nav>
      <aside>
        <h2>Login</h2>
        <form action="login.php" method="post">
          <label>Username</label><br/>
          <input id="username" name="username"></input><br/>
          <label>Password</label><br/>
          <input id="password" name="password" type="password"></input><br/>
          <button type="submit">Log in</button>
        </form>
      </aside>
    </div>
  </body>
</html>
