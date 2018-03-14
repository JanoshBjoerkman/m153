<?php
require_once(MODEL_PATH . "/user.php");
require_once(CONTROLLER_PATH . "/controller.php");

class UserController extends Controller {

  public function __construct () {
    parent::__construct();
  }
  

  public function handleRequest () {

    try {

      //get user model
      $this->userModel = Factory::getUserModel(); 
      
      //distinguish between authenticated and unauthenticated sessions
      //case: authenticated session
      if ($this->userModel->auth->isAuthenticated()) {
      
        //op = logout
        if (strcasecmp($_REQUEST["op"], "logout") == 0) {
          $this->userModel->logout();
          $this->view = "login.php";
        }
      
      //case: unauthenticated session
      } else {

        if (strcasecmp($_REQUEST["op"], "login-form") == 0) {
          //op = login-form
          $this->view = "login.php";       
        } elseif (strcasecmp($_REQUEST["op"], "login-action") == 0) {
          //op = login-action
          if (
            isset($_REQUEST["username"]) && isset($_REQUEST["pwd"]) && $this->userModel->login($_REQUEST["username"],$_REQUEST["pwd"])) {
            $this->view = "home.php";
          } else {
            //authentication fails due to wrong username or password, show login form again
            $this->setAlert(true, ALERT_DANGER, "Login failed. Username or password wrong.");
            $this->view = "login.php";
          }
        } elseif (strcasecmp($_REQUEST["op"], "signup-form") == 0) {
          //op = signup-form
          $this->view = "signup.php";
        } elseif (strcasecmp($_REQUEST["op"], "signup-action") == 0) {
          //op = signup-form
          $userdata = array (
            "username" => $_REQUEST["username"],
            "pwd" => $_REQUEST["pwd"],
            "firstname" => $_REQUEST["firstname"],
            "lastname" => $_REQUEST["lastname"],
            "avatar" => $_REQUEST["avatar"]
          );
          $isSuccessful = $this->userModel->auth->signup($userdata);
          if ($isSuccessful) {
            //signup was successful, go to login page
            $this->setAlert(true, ALERT_SUCCESS, "Sign up successful. Pleas log in.");
            $this->view = "login.php";
          } else {
            throw new Exception ("Sign up failed", ERR_SIGNUP);
          }

        }

      }
   
    } catch (Exception $e) {

      //something went wrong, go to login page again
      //set alert message
      $this->setAlert(true, ALERT_DANGER, $e->getMessage());
      //make sure to be logged out
      if (isset($this->userModel->auth)) {
        $this->userModel->logout();
      }

    } finally {

      $this->render($this->view, new DataExtractor($this));
    }
  }
    
}

 ?>
