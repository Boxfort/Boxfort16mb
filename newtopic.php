<?php
  include 'core/init.php';
  include 'include/header.php';

  protect_page();

  $categories = get_categories();
?>

<div class="row">
  <div class="col-sm-8 col-sm-offset-2 blog-main container-white">
      <h3>Post a new topic</h3>
      <hr/>
      <?php
        if(!empty($_SESSION['errors']))
        {
          include 'include/loginerror.php';
          unset($_SESSION['errors']);
        }
      ?>
      <form action="posttopic.php" method="post">
        <dl class='topic-input'>
          <dt><label class='required'>Subject</label></dt>
          <dd><input class='topic-input' name='subject' required></input></dd>
        </dl>
        <dl class='topic-input'>
          <dt><label class='required'>Category</label></dt>
          <dd>
            <select class="form-control" name='cat'>
              <?php
                foreach($categories as $category)
                {
                  echo "<option>{$category['cat_name']}</option>";
                }
              ?>
            </select>
          </dd>
        </dl>
        <textarea name='body' class='reply-input'></textarea>
        <button class='btn btn-primary btn-register btn-reply' required>Submit</button>
      </form>
    </div>
  </div>
</div>

<?php include 'include/footer.php'; ?>
