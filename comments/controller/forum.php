<?php
require_once(MODEL_PATH . "/user.php");
require_once(CONTROLLER_PATH . "/controller.php");


class ForumController extends Controller {

  public $forumModel;

  public function __construct () {

    parent::__construct();
  }

  public function handleRequest () {


    try {
      $this->userModel = Factory::getUserModel();

      if ($this->userModel->auth->isAuthenticated()) {

        $this->forumModel = Factory::getForumModel();

        if (strcasecmp($_REQUEST["op"], "newpost") == 0) {
          $isSuccessful = $this->forumModel->addPost($this->userModel->id, $_REQUEST["content"]);
          if (!$isSuccessful) {
            $this->setAlert(true, ALERT_DANGER, "Unknown error. Adding new post failed.");
          }
        }

        $this->view = "forum.php"; 
      
      } else {
         $this->setAlert(true, ALERT_DANGER, "Access denied. Please login.");
      }   
    } catch (Exception $e) {
      //something unknown went wrong
      $this->setAlert(true, ALERT_DANGER, $e->getMessage());
    } finally {
      $this->render($this->view, new DataExtractor($this));
    }
  }
}
 ?>
