<?php $posts=get_post_count($_GET['user']); ?>

<table>
  <tbody>
    <tr class='reply'>
      <td class='reply-user fit container-white'>
        <h4><?php echo get_username($_GET['user']); ?></h4>
        <img src='<?php echo get_pp_url($_GET['user']); ?>' class='img-circle'></img>
        <?php if($_GET['user'] == $_GET['user']){ echo '<a href="editprofile.php">Edit Profile</a>'; } ?>
      </td>
      <td class='reply-body container-white'>
        <table class='profile-body'>
          <tbody>
            <tr>
              <td>Posts:</td><td><?php echo $posts; ?></td>
            </tr>
            <tr>
              <td>Personal Text:</td><td></td>
            </tr>
            <tr>
              <td>Date Registered:</td><td></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
