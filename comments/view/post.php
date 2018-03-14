
<?php while ($data->issetCurrentPost()): ?>

  <div class="media">
    <div class="media-left">
      <img src="<?php echo "media/" . $data->getPosterAvatar() ?>" class="media-object">
    </div>

    <div class="media-body">
      <h4 class="media-heading">
        <?php echo $data->getPosterFirstname() . " " . $data->getPosterLastname() ?>
        <small><i>Gepostet am: <?php echo $data->getPostDate() ?></i></small>
      </h4>
      <p><?php echo $data->getPostContent() ?></p>
      
      <button type="button" class="btn btn-default" onclick="">comment</button>
      
      <?php
        if ($data->issetYoungestChild())
        {
          $data->goToYoungestChild();
          include (VIEW_PATH . "/post.php");
        }
      ?>
    </div>
  </div>

  <?php
    if ($data->issetOlderSibling())
    {
      $data->goToOlderSibling();
    } 
    else
    {
      $data->goToParent();
      break;
    }
  ?>
<?php endwhile; ?>
  
