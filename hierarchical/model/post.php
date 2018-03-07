<?php

class Post {

  public $id;
  public $postingDate;
  public $content;
  
  public $subPosts;
  public $previousPost;

  //user data
  public $userId;
  public $firstname;
  public $lastname;
  public $avatar;


  public function __construct ($id, $postingDate, $content, $userId, $firstname, $lastname, $avatar) {

    $this->id = $id;
    $this->postingDate = new DateTime ($postingDate);
    $this->content = $content;

    $this->userId = $userId;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->avatar = $avatar;

  }


}

 ?>
