<?php
  require_once(VIEW_PATH . "/header.php");
?>

<div class="row"><div class="col-xs-12"><h1>Forum</h1></div></div>
<div class="row"><div class="col-xs-12"><h2>Neuen Beitrag</h2></div></div>

<div class="row">
  <div class="col-xs-12">
    <form action="index.php?" method="POST">
      <div class="form-group">
        <label for="post">Text / Inhalt</label>
        <textarea class="form-control" rows="5" id="post" name="content" required></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-default" name="op" value="newpost">Post</button>
      </div>
    </form>
  </div>   
</div>

<div class="row"><div class="col-xs-12"><h2>Beiträge</h2></div></div>

<div class="row">
  <div class="col-xs-12">

  
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
      </div>
    </div>

    <?php $data->goToPrevPost() ?>
  <?php endwhile; ?>
  
</div>


<?php
  require_once(VIEW_PATH . "/footer.php");
