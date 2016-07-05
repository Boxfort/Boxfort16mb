<?php
  include 'core/init.php';
  include 'include/header.php';
 ?>

 <div class="table-center container-white">
 <h2>Edit Profile</h2>
 <form action="" method="post">
   <div class="center">
     <div class="register-form center">
       <label class="required">Username</label>
       <input class="form-control register" name="username" placeholder="Username" required autofocus><br/>
       <label class="required">E-mail</label>
       <input class="form-control register" name="email" placeholder="example@website.com" required><br/>
       <label class="required">Confirm e-mail</label>
       <input class="form-control register" name="email_conf" placeholder="example@website.com" required><br/>
       <label class="required">Password</label>
       <input class="form-control register" name="password" type="password" placeholder="Password" required><br/>
       <label class="required">Confirm password</label>
       <input class="form-control register" name="password_conf" type="password" placeholder="Password" required><br/>
     </div>
     <div class="g-recaptcha center" data-sitekey="6LeokSMTAAAAAFt-eLn_YTDhRhefxMWDzO8ulFwe"></div>
     <div class='register-form center'>
       <button class="btn btn-primary btn-register">Register</button>
     </div>
   </div>
 </form>
</div>
</div>
