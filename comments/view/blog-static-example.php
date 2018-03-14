<?php
  require_once(VIEW_PATH . "/header.php");
?>

<div class="row"><div class="col-xs-12"><h1>Blog</h1></div></div>
<div class="row"><div class="col-xs-12"><h2>New Post</h2></div></div>

<div class="row">
  <div class="col-xs-12">
    <form action="index.php?" method="POST">
      <div class="form-group">
        <label for="post">Text for new post</label>
        <textarea class="form-control" rows="5" id="post"></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-default" name="op" value="newpost">Create new post</button>
      </div>
    </form>
  </div>   
</div>

<div class="row"><div class="col-xs-12"><h2>My Posts</h2></div></div>

<div class="row">
  <div class="col-xs-12">
  <!-- start media oject 1 on level 0 -->
    <div class="media">
      <div class="media-left">
        <img src="media/boy-1.svg" class="media-object">
      </div>

      <!-- start media body object 1 -->
      <div class="media-body">
        <h4 class="media-heading">Grady Booch <small><i>Posted on February 19, 2016</i></small></h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        
        <!-- start media oject 1.1 on level 1 -->
        <div class="media">
          <div class="media-left">
            <img src="media/man-3.svg" class="media-object">
          </div>

          <!-- start media body object 1.1 -->
          <div class="media-body">
            <h4 class="media-heading">Niklaus Wirth <small><i>Posted on February 20, 2016</i></small></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

            <!-- start media oject 1.1.1 on level 2 -->
            <div class="media">
              <div class="media-left">
                <img src="media/man.svg" class="media-object">
              </div>

              <!-- start media body - object 1.1.1 -->
              <div class="media-body">
                <h4 class="media-heading">Dennis Ritchie <small><i>Posted on February 21, 2016</i></small></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
              <!-- end media body object 1.1.1 -->
            </div>
            <!-- end media oject 1.1.1 on level 2 -->
          </div>
          <!-- end media body object 1.1 -->
        </div>
        <!-- end media oject 1.1 on level 1 -->


        <!-- start media oject 1.2 on level 1 -->
        <div class="media">
          <div class="media-left">
            <img src="media/boy.svg" class="media-object">
          </div>

          <!-- start media body - object 1.2 -->
          <div class="media-body">
            <h4 class="media-heading">Edgar Codd <small><i>Posted on February 20, 2016</i></small></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <!-- end media body - object 1.2 -->
        </div>
        <!-- end media oject 1.2 on level 1 -->
      </div>
      <!-- end media body - object 1 -->
    </div>
    <!-- end media oject 1 on level 0 -->
      
    <!-- start media oject 2 on level 0 -->    
    <div class="media">
      <div class="media-left">
        <img src="media/girl.svg" class="media-object">
      </div>

      <!-- start media body object 2 -->
      <div class="media-body">
        <h4 class="media-heading">Marie Harrison <small><i>Posted on February 19, 2016</i></small></h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <!-- end media body object 2 -->
    </div>
    <!-- end media oject 2 on level 0 -->

  </div>
</div>


<?php
  require_once(VIEW_PATH . "/footer.php");
