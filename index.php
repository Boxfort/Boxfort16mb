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
        <ul>
      </div>
    </nav>
    <div class="row">
      <div class="col-sm-8 blog-main">
        <h1>Index Page</h1>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras consectetur, nisl non tempus laoreet, nulla lorem interdum lacus, in varius augue velit et mi. Mauris quis lectus sapien. Pellentesque vehicula massa quis est scelerisque, in venenatis sapien dictum. Vivamus tellus arcu, iaculis in iaculis a, commodo in eros. Proin congue quam tortor, et sodales turpis fermentum vitae. Phasellus placerat diam et arcu dignissim, eget eleifend massa suscipit. Nulla a turpis aliquet, ullamcorper lacus sit amet, faucibus enim. Donec hendrerit ligula eu sollicitudin congue. Nunc ipsum est, venenatis non aliquam ac, dapibus non ex. Sed gravida turpis quis nisi facilisis suscipit. Integer quis mattis ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent fermentum dolor sed odio vehicula, vitae imperdiet nisl faucibus. Integer mollis eros felis.
          Phasellus ullamcorper, ipsum at tincidunt auctor, purus diam lobortis mi, id bibendum dolor sem quis velit. Donec laoreet dolor iaculis, tincidunt ante eget, egestas orci. Mauris a dolor vel risus eleifend iaculis at sed quam. Curabitur felis odio, fermentum nec ante nec, eleifend lacinia diam. Aliquam vitae elit ut ipsum sollicitudin fringilla vitae sed sapien. Nullam et tincidunt arcu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque id viverra purus. Vivamus vestibulum eros nunc, at suscipit erat rutrum quis. Duis rhoncus urna neque, a ullamcorper mi euismod nec. Vivamus luctus fermentum ligula, nec luctus metus pretium eu. Aenean non est libero. In hac habitasse platea dictumst. Cras fringilla sit amet lorem vitae pharetra. Curabitur viverra consequat venenatis. Sed ut auctor ligula, non dignissim ipsum.
          Sed tempor cursus nibh, in consequat ipsum molestie eu. Pellentesque nec ipsum vel risus maximus porttitor. In at enim ut neque tempor ullamcorper. Nullam nunc ipsum, pulvinar scelerisque est vel, pharetra condimentum quam. Praesent vulputate, mi eget euismod facilisis, elit erat vulputate risus, non dapibus libero metus ac ipsum. Nulla rutrum pellentesque accumsan. Aliquam porttitor est ac justo lacinia, a sagittis ex auctor. Pellentesque lacinia rhoncus lorem. Vivamus id massa ex. Morbi tincidunt porta urna in ultricies. Sed vitae orci auctor, luctus mauris vel, eleifend dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras leo purus, venenatis nec porta non, viverra quis eros. Donec id sem porta, tempor massa blandit, tincidunt sem. Praesent sit amet rutrum ligula. Proin feugiat pharetra pellentesque.
        </p>
      </div>
      <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
        <form class="form-signin" action="login.php" method="post">
          <h2 class="form-signin-heading">Login</h2>
          <label for="username" class="sr-only">Username</label>
          <input id="username" class="form-control" name="username" placeholder="Username" required autofocus></input>
          <label for="password" class="sr-only">Password</label>
          <input id="password" class="form-control" name="password" type="password" placeholder="Password" required></input>
          </br>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
      </div>
    </div>
  </body>
</html>
