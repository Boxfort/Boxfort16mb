<?php
  include 'include/header.php';
?>

<h1>Register a new account</h1>
<form action="###" method="post">
  <div class="table-responsive">
    <table class="table">
      <tbody>
        <tr>
          <td><label class="required">Username</label></td>
          <td><input class="form-control register" placeholder="Username"></td>
        <tr>
        <tr>
          <td><label class="required">First name</label></td>
          <td><input class="form-control register" placeholder="First name"></td>
        </tr>
        <tr>
          <td><label>Last name</label></td>
          <td><input class="form-control register" placeholder="Last name"></td>
        </tr>
        <tr>
          <td><label class="required">E-mail</label></td>
          <td><input class="form-control register" placeholder="example@website.com"></td>
        </tr>
        <tr>
          <td><label class="required">Confirm e-mail</label></td>
          <td><input class="form-control register" placeholder="example@website.com"></td>
        </tr>
        <tr>
          <td><label class="required">Password</label></td>
          <td><input class="form-control register" placeholder="Password"></td>
        </tr>
        <tr>
          <td><label class="required">Confirm password</label></td>
          <td><input class="form-control register" placeholder="Password"></td>
        </tr>
        <tr>
          <td></td>
          <td><button class="btn btn-primary btn-register">Register</button></td>
        </tr>
      <tbody>
    </table>
  </div>
</form>

<?php
  include 'include/footer.php';
?>
