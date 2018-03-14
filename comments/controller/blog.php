<?php
require_once(MODEL_PATH . "/user.php");
require_once(CONTROLLER_PATH . "/controller.php");


class BlogController extends Controller {

  public $blogModel;

  public function __construct () {

    parent::__construct();
  }

  public function handleRequest () {


    try {
      $this->userModel = Factory::getUserModel();

      if ($this->userModel->auth->isAuthenticated()) {

        $this->blogModel = Factory::getBlogModel($this->userModel->id);

        if (strcasecmp($_REQUEST["op"], "newpost") == 0) {
          $isSuccessful = $this->blogModel->addPost($this->userModel->id, $_REQUEST["content"]);
          if (!$isSuccessful) {
            $this->setAlert(true, ALERT_DANGER, "Unknown error. Adding new post failed.");
          }
        }

        $this->view = "blog.php"; 
      
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
