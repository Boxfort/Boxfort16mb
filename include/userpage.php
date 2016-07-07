<?php
$posts=get_post_count($_GET['user']);
$ptext=get_sig_and_personal($_GET['user'])['personal_text'];
?>

<div class="row">
  <div class="col-sm-10 col-sm-offset-1 blog-main">
    <table>
      <tbody>
        <tr class='reply'>
          <td class='reply-user fit container-white'>
            <h4><?php echo get_username($_GET['user']); ?></h4>
            <img src='<?php echo get_pp_url($_GET['user']); ?>' class='img-circle'></img>
            <?php if($_GET['user'] == $_GET['user']){ echo '<a href="editprofile.php">Edit Profile</a>'; } ?>
          </td>
          <td class='reply-body container-white'>
            <dl class='profile'>
              <dt>Posts:<br/></dt>
              <dd><?php echo $posts; ?></dd>
            </dl>
            <dl class='profile'>
              <dt>Personal Text:<br/></dt>
              <dd><?php echo $ptext; ?></dd>
            </dl>
            <dl class='profile'>
              <dt>Date Registered:<br/></dt>
              <dd>Don't know bruv.</dd>
            </dl>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
