<?php
  include 'core/init.php';
  include 'include/header.php';

  protect_page();
?>

<div class="row">
  <div class="col-sm-8 col-sm-offset-2 blog-main container-white">
      <h3>Post a new topic</h3>
      <hr/>
      <form action="post.php" method="post">
        <dl class='topic-input'>
          <dt>Subject</dt>
          <dd><input class='topic-input' name='subject'></input></dd>
        </dl>
        <textarea name='body' class='reply-input'></textarea>
        <button class='btn btn-primary btn-register btn-reply'>Submit</button>
      </form>
    </div>
  </div>
</div>

<?php include 'include/footer.php'; ?>
