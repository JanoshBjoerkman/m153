<?php
require_once(LIBRARY_PATH . "/authentication.php");

class ProprietaryAuthentication implements Authentication {

  private $isAuthenticated = false;

  public function __construct () {}

  public function isAuthenticated () {

    return $this->isAuthenticated;
  }

  public function verifyAuthentication ($proof) {

    $rows = null;
  
    
    if (isset($proof["username"]) && isset($proof["pwd"])) {
       

      $sql =
        'select
          user.id as userid,
          firstname,
          lastname,
          mail,
          pwd,
          avatar,
          role.code as rolecode
            from
              user, proprietary_auth, role
            where
              user.id = proprietary_auth.id and
              user.role_id = role.id and
              mail = :username';

      $params = [':username' => $proof["username"]];
      $rows = DB::getConnection()->select($sql, $params);
      $rowCount = count($rows);

      //ooops, terrible error, database not consistent
      if ($rowCount > 1) {
        $this->setToUnauthenticated();
        throw new Exception ('username ambiguous', ERR_AMBIGUOUS_USERNAME);

      //result set is 0 user, user does not exist
      } elseif ($rowCount == 0) {
        $this->setToUnauthenticated();

      // user found
      } elseif ($rowCount == 1) {
        $pwdHash = $rows[0]->pwd;
        
        //verify retrieved hash
        if (password_verify($proof["pwd"], $pwdHash)) {
          $this->setToAuthenticated();
        } else {
          $this->setToUnauthenticated();
          $rows = null;
        }
      }
    }

    return $rows;
  }


  public function setToAuthenticated() {

    $this->isAuthenticated = true;
  }


  public function setToUnauthenticated() {

    $this->isAuthenticated = false;
  }

  public function signup ($userdata) {

    $params1 = array (
      ":username" => "",
      ":firstname" => "",
      ":lastname" => "",
    );

    $params2 = array (
      ":pwd" => "",
    );

    if (isset($userdata["username"])) {
      $params1[":username"] = $userdata["username"];
    }
    if (isset($userdata["firstname"])) {
      $params1[":firstname"] = $userdata["firstname"];
    }
    if (isset($userdata["lastname"])) {
      $params1[":lastname"] = $userdata["lastname"];
    }
    if (isset($userdata["avatar"])) {
      $params1[":avatar"] = $userdata["avatar"];
    }
    if (isset($userdata["pwd"])) {
      $pwdHash = password_hash($userdata["pwd"], PASSWORD_DEFAULT); 
      $params2[":pwd"] = $pwdHash;
    }
    


    $sql1 =
      "insert into user
          (mail, firstname, lastname, avatar, role_id)
        values
          (:username, :firstname, :lastname, :avatar, (select id from role where code = '" . STANDARD_ROLE . "'))";
    $sql2 =
      "insert into proprietary_auth
          (id, pwd)
        values
          ((select LAST_INSERT_ID()), :pwd)";
    
    $stmts = array (
      array ($sql1, $params1),
      array ($sql2, $params2)
    );
    
    $isSuccessful = DB::getConnection()->insertOrUpdate($stmts);

    return $isSuccessful;
  }
}

?>