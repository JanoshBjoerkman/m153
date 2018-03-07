<?php
require_once(MODEL_PATH . "/user.php");
require_once(CONTROLLER_PATH . "/controller.php");


class HomeController extends Controller {
  
  public function __construct () {
    parent::__construct();
  }

  public function handleRequest () {

    try {
      $this->userModel = Factory::getUserModel();
      $this->view = "home.php";    
    } catch (Exception $e) {
      //something unknown went wrong, go to login page again
      //and make sure that user is not authenticated
      $this->setAlert(true, ALERT_DANGER, $e->getMessage());
    } finally {
      $this->render($this->view, new DataExtractor($this));
    }

  }
}
 ?>
