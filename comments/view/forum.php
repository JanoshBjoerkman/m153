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
    <?php include (VIEW_PATH . "/post.php"); ?>
  </div>
</div>


<?php
  require_once(VIEW_PATH . "/footer.php");
