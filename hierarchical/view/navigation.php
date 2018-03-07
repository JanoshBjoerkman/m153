<!-- start of navigation bar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <!-- Collapse navigation bar on small devices. Create dropdown menu with hamburger-icon -->
    <div class="navbar-header">
      <button
        type="button"
        class="navbar-toggle collapsed"
        data-toggle="collapse"
        data-target="#collapsed-nav-items">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="#">Modul 183</a>
    </div>

    <!-- This are the nav itemes which are collapsed on small devices and then listed as dropdown menus under the hamburger icon. "collapsed-nav-items" is the referencing id. -->
    <div class="collapse navbar-collapse" id="collapsed-nav-items">
      <ul class="nav navbar-nav">
        <li data-navtag="home.php" class="navitem">
          <a href="index.php?op=home">Home</a>
        </li>
        <li data-navtag="blog.php" class="navitem">
          <?php if ($data->isAuthenticated): ?>
            <a href="index.php?op=forum">Forum</a>
          <?php endif; ?>       
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        
        <li data-navtag="signup.php" class="navitem">
          <?php if ($data->isAuthenticated): ?>
              <a href="#"><img src="<?php echo "media/" . $data->getAvatar() ?>" class="avatar-navbar">
              <?php echo $data->getFirstname() . " " . $data->getLastname() ?>
            </a>
          <?php else: ?>
            <a href="index.php?op=signup-form"><span class="glyphicon glyphicon-user"></span>
                Sign Up
            </a>
          <?php endif; ?>
        </li>

        <li data-navtag="login.php" class="navitem">
          <?php if ($data->isAuthenticated): ?>
            <a href="index.php?op=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
          <?php else: ?>
            <a href="index.php?op=login-form"><span class="glyphicon glyphicon-log-in"></span> Login</a>
          <?php endif; ?>
        </li>

      </ul>
    </div>

  </div>

</nav>
<!-- end of navigation bar -->
