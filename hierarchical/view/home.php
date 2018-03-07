<?php
  require_once(VIEW_PATH . "/header.php");
?>

<div class="row"><div class="col-xs-12"><h1>Home</h1></div></div>


<div class="row"><div class="col-xs-12"><h2>General Content For All Users</h1></div></div>
<div class="row">
  <div class="col-xs-12">
    <img
      class="img-responsive"
      src="media/uc.svg"
      alt="Under Construction">
  </div>
</div>

<?php if ($data->isAuthenticated): ?>
  <div class="row"><div class="col-xs-12"><h2>Content For Authenticated Users</h1></div></div> 
  <div class="row">
    <div class="col-xs-12">
      <img
        class="img-responsive"
        src="media/uc.svg"
        alt="Under Construction">
    </div>
  </div>      
<?php endif; ?> 

<?php if ($data->isAdminUser()): ?>
  <div class="row"><div class="col-xs-12"><h2>Special Content For Admin Users</h1></div></div>
  <div class="row">
  <div class="col-xs-12">
    <img
      class="img-responsive"
      src="media/uc.svg"
      alt="Under Construction">
  </div>
</div>       
<?php endif; ?>

<?php
  require_once(VIEW_PATH . "/footer.php");
?>  
