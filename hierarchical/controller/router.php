<?php

class Router {
    
  public $controller;
  
  public function __construct () {


    //handling forms
    if (isset($_REQUEST["op"])) {

      if ((strcasecmp($_REQUEST["op"], "login-form") == 0) ||
          (strcasecmp($_REQUEST["op"], "login-action") == 0) ||
          (strcasecmp($_REQUEST["op"], "logout") == 0) ||
          (strcasecmp($_REQUEST["op"], "signup-form") == 0) ||
          (strcasecmp($_REQUEST["op"], "signup-action") == 0)) {

        require_once(CONTROLLER_PATH . "/user.php"); 
        $this->controller = new UserController();
      
      } elseif ((strcasecmp($_REQUEST["op"], "forum") == 0)  ||
                (strcasecmp($_REQUEST["op"], "newpost") == 0)) {

        require_once(CONTROLLER_PATH . "/forum.php"); 
        $this->controller = new ForumController();

      } elseif (strcasecmp($_REQUEST["op"], "pct") == 0) {

        require_once(CONTROLLER_PATH . "/codetest.php"); 
        $this->controller = new CodetestController();

      }
    }

    if (is_null($this->controller)) {
      require_once(CONTROLLER_PATH . "/home.php"); 
      $this->controller = new HomeController();
    }    
  }       
}
    
?>