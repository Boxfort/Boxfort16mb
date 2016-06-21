<?php
  include('core/init.php');
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Boxfort16mb</title>
  </head>
  <body>
    <header>
      <h1 id="logo">Logo</h1>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="downloads.php">Downloads</a></li>
          <li><a href="forum.php">Forum</a></li>
          <li><a href="contact.php">Contact</a></li>
        <ul>
      </nav>
    </header>
    <div id="container">
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
