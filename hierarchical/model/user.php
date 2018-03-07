<?php

class UserModel {

  public $id;
  public $firstname;
  public $lastname;
  public $mail;
  public $avatar;
  
  public $auth;
  public $role;


  public function __construct () {}

  //verify credentials and - success provided - set user data
  //retruns true if authentication was successful
  public function login ($username, $pwd) {

    $isLoginSuccessful = false;
    $credentials = [
      "username" => $username,
      "pwd" => $pwd
    ];
    $rows = $this->auth->verifyAuthentication($credentials);

    if (isset($rows) && count($rows) == 1) {

      foreach ($rows as $row) {
        $this->id = $row->userid;
        $this->firstname = $row->firstname;
        $this->lastname = $row->lastname;
        $this->mail = $row->mail;
        $this->avatar = $row->avatar;
        $this->role = $row->rolecode;
      }
      $this->auth->setToAuthenticated();

      //update session variables
      $_SESSION["username"] = $username;
      $_SESSION["pwd"] = $pwd;

      $isLoginSuccessful = true;
    } else {
      $this->auth->setToUnauthenticated();

      //unset session variables
      unset($_SESSION["username"]);
      unset($_SESSION["pwd"]);

      $isLoginSuccessful = false;
    }
    return $isLoginSuccessful;
  } 

  public function logout () {

    $this->auth->setToUnauthenticated();

    //unset session variables
    session_destroy();
  }


  public function isAdminUser () {

    $isAdminUser = false;

    if (isset($this->role) && $this->role == ADMIN_ROLE) {
      $isAdminUser = true;
    }

    return $isAdminUser;
  }

  public function isStandardUser () {

    $isStandardUser = false;

    if (isset($this->role) && $this->role == STANDARD_ROLE) {
      $isStandardUser = true;
    }

    return $isStandardUser;
  }

  
}

 ?>
