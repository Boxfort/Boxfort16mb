<?php
  include 'core/init.php';
  protect_page();
  include 'include/header.php';
?>

<div class="table-center">
<h1>Register a new account</h1>
<?php
  if(!empty($_SESSION['errors']))
  {
    include 'include/loginerror.php';
    unset($_SESSION['errors']);
  }elseif(!empty($_POST))
  {
    echo '<div class="alert alert-success" role="alert">
            Password successfully changed!. <a href="#" class="alert-link">Return to home page.</a>
          </div>';
  }
?>
  <form action="" method="post">
    <table class="table">
      <tbody>
        <tr>
          <td><label class="required">Old password</label></td>
          <td><input class="form-control register" name="password_old" placeholder="Old password" required autofocus></td>
        <tr>
        <tr>
          <td><label class="required">New password</label></td>
          <td><input class="form-control register" name="password_new" placeholder="New password" required></td>
        </tr>
        <tr>
          <td><label class="required">Confirm new password</label></td>
          <td><input class="form-control register" name="password_conf" placeholder="Confirm new password" required></td>
        </tr>
        <tr>
          <td></td>
          <td><button class="btn btn-primary btn-register">Change password</button></td>
        </tr>
      <tbody>
    </table>
  </form>
</div>

<?php include 'include/footer.php'; ?>
