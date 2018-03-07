<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
        <form action="/action_page.php">
          <div class="form-group">
            <label for="email">Benutzername</label>
            <input
              type="email"
              class="form-control"
              id="username"
              placeholder="Benutzername"
              name="username">
          </div>
          <div class="form-group">
            <label for="pwd">Passwort</label>
            <input
              type="password"
              class="form-control"
              id="pwd"
              placeholder="Passwort"
              name="pwd">
          </div>
          <div class="checkbox">
            <label><input type="checkbox" name="remember"> Remember me</label>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </div>
  </div>

  </div>
</div>


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
        <li data-navtag="home" class="navitem">
          <a href="home.php">Home</a>
        </li>
        <li data-navtag="blog" class="navitem">
          <a href="blog.php">Blog</a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
        </li>
        <li>
          <a href="#" data-toggle="modal" data-target="#myModal">
            <span class="glyphicon glyphicon-log-in"></span> Login
          </a>
        </li>
      </ul>
    </div>

  </div>

</nav>
<!-- end of navigation bar -->
