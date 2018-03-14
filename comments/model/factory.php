<?php
require_once(MODEL_PATH . "/user.php");
require_once(MODEL_PATH . "/forum.php");
require_once(LIBRARY_PATH . "/proprietaryauthentication.php");

class Factory {


  private function __construct() {}
  private function __clone() {}
  
  public static function getUserModel () {

    $userModel = new UserModel ();
    $userModel->auth = new ProprietaryAuthentication ();

    // if we have an active user session, we always try to load user data
    if (isset($_SESSION["username"]) && isset($_SESSION["pwd"])) {
      $userModel->login($_SESSION["username"], $_SESSION["pwd"]);
    }
    return $userModel;
  }

  public static function getBlogModel ($userId) {

    $blogModel = new BlogModel ();
    $blogModel->loadPosts($userId);
    
    return $blogModel;
  }


  public static function getForumModel () {

    $forumModel = new ForumModel ();
    $forumModel->loadPosts();
    
    return $forumModel;
  }

}
?>