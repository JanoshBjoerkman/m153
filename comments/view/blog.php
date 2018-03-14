<?php
  require_once(VIEW_PATH . "/header.php");
?>

<div class="row"><div class="col-xs-12"><h1>Blog</h1></div></div>
<div class="row"><div class="col-xs-12"><h2>Neuen Post erstellen</h2></div></div>

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

<div class="row"><div class="col-xs-12"><h2>Meine Posts</h2></div></div>

<div class="row">
  <div class="col-xs-12">

  <?php $post = $data->posts ?>
  <?php while (isset($post)): ?>

    <div class="media">
      <div class="media-left">
        <img src="media/girl.svg" class="media-object">
      </div>

      <div class="media-body">
        <h4 class="media-heading">
          <?php echo "$data->firstname $data->lastname" ?>
          <small><i>Gepostet am: <?php echo $post->getFormattedDate() ?></i></small>
        </h4>
        <p><?php echo $post->content ?></p>
      </div>
    </div>

    <?php $post = $post->previousPost ?>
  <?php endwhile; ?>
  
</div>


<?php
  require_once(VIEW_PATH . "/footer.php");
