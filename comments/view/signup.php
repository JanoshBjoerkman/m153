<?php
  require_once(VIEW_PATH . "/header.php");
?>

<div class="row">
  <div class="col-xs-12">
    <h1>Register</h1>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <form action="index.php?" method="POST">
      <div class="form-group has-success has-feedback">
        <label for="username">Username (Email):</label>
        <input type="email" class="form-control" id="username" placeholder="Enter email" name="username" required> 
      </div>     
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
      </div>
      <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" class="form-control" id=firstname placeholder="Enter first name" name="firstname" required>
      </div>
      <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" class="form-control" id="lastname" placeholder="Enter last name" name="lastname" required>
      </div>
      <label>Avatar:</label>
      <div class="form-group">
        <label class="radio-inline" for="avatar">
          <input type="radio" name="avatar" value="male01.svg" checked>
          <img src="media/male01.svg" class="avatar-selection">
        </label>
        <label class="radio-inline" for="avatar">
          <input type="radio" name="avatar" value="male02.svg">
          <img src="media/male02.svg" class="avatar-selection">
        </label>
        <label class="radio-inline" for="avatar">
          <input type="radio" name="avatar" value="male03.svg">
          <img src="media/male03.svg" class="avatar-selection">
        </label>
        <label class="radio-inline" for="avatar">
          <input type="radio" name="avatar" value="male04.svg">
          <img src="media/male04.svg" class="avatar-selection">
        </label>
        <label class="radio-inline" for="avatar">
          <input type="radio" name="avatar" value="male05.svg">
          <img src="media/male05.svg" class="avatar-selection">
        </label>
        <label class="radio-inline" for="avatar">
          <input type="radio" name="avatar" value="male06.svg">
          <img src="media/male06.svg" class="avatar-selection">
        </label>
        <label class="radio-inline" for="avatar">
          <input type="radio" name="avatar" value="male07.svg">
          <img src="media/male07.svg" class="avatar-selection">
        </label>
        <label class="radio-inline" for="avatar">
          <input type="radio" name="avatar" value="female01.svg">
          <img src="media/female01.svg" class="avatar-selection">
        </label>
        <label class="radio-inline" for="avatar">
          <input type="radio" name="avatar" value="female02.svg">
          <img src="media/female02.svg" class="avatar-selection">
        </label>
      
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-default" name="op" value="signup-action">Submit</button>
      </div>
    </form>
  </div>   
</div>

<?php
  require_once(VIEW_PATH . "/footer.php");
?>  
