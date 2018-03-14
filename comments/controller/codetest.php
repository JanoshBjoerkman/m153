<?php
require_once(MODEL_PATH . "/user.php");
require_once(CONTROLLER_PATH . "/controller.php");


class CodetestController extends Controller {

  public $phpcode;
  
  public function __construct () {

    parent::__construct();
    $this->view = "codetest.php";
  }

  public function handleRequest () {

    if (isset($_REQUEST["phpcode"])) {
      $this->phpcode = $_REQUEST["phpcode"];
  } else {
    $this->phpcode = "";
  }

    $this->render($this->view, new DataExtractor($this));
  }
}
 ?>
