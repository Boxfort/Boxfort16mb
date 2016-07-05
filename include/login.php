<form class="form-signin" action="login.php" method="post">
  <h2 class="form-signin-heading aside">Login</h2>
  <?php
    if(!empty($_SESSION['errors']))
    {
      include 'include/loginerror.php';
      unset($_SESSION['errors']);
    }
  ?>
  <label for="username" class="sr-only">Username</label>
  <input id="username" class="form-control login" name="username" placeholder="Username" required autofocus></input>
  <label for="password" class="sr-only">Password</label>
  <input id="password" class="form-control login" name="password" type="password" placeholder="Password" required></input>
  </br>
  <button class="btn btn-primary login btn-login" type="submit">Login</button>
</form>
<a class='register' href='register.php'>Need an account?</a>
