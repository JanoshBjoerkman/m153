<?php
  require_once(VIEW_PATH . "/header.php");
?>

<div class="row">
  <div class="col-xs-12">
    <h1>Login</h1>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <form action="index.php?" method="POST">
      <div class="form-group">
        <label for="email">Username (Email):</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="username">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-default" name="op" value="login-action">Submit</button>
      </div>
    </form>
  </div>   
</div>

<!-- include footer -->
<?php
  require_once(VIEW_PATH . "/footer.php");
?>

