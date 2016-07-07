<?php
  include 'core/init.php';
  include 'include/header.php';

  protect_page();
 ?>

    <div class="row">
      <div class="col-sm-10 col-sm-offset-1 blog-main container-white">
        <h2>Edit Profile</h2>
        <hr/>
        <?php
          if(!empty($_SESSION['errors']))
          {
            include 'include/loginerror.php';
            unset($_SESSION['errors']);
          }
        ?>
        <form action="uploadprocessor.php" method="post" enctype="multipart/form-data">
          <dl class='profile-input'>
            <dt>Profile Picture<br/></dt>
            <dd><input id="file" type="file" name="file"> </dd>
          </dl>
          <hr/>
          <dl class='profile-input'>
            <dt>Personal Text<br/><h5>This will be shown below your profile picture.</h5></dt>
            <dd><textarea class='profile-input' name='ptext'></textarea></dd>
          </dl>
          <dl class='profile-input'>
            <dt>Signature<br/><h5>Signatures are displayed at the bottom of each post</h5></dt>
            <dd><textarea class='profile-input' name='sig'></textarea></dd>
          </dl>
            <button type="submit" class="btn btn-primary btn-register">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
