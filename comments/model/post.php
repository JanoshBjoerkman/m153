<?php

//Each post may be linked to other posts.
//Linked posts form a hierarchical tree, where each node is an object of the Post class.

//The previousPost attribute references always a node on the SAME hierarchical level. This attribute
//points to the post which preceeds the current post (on the SAME hierarchical level).

//The post attribute on the other hand references always a node which is one level below the current hierarchy.
//This attribute points to the LATEST (or YOUNGST) child post of the current post.
class Post {

  public $id;
  public $postingDate;
  public $content;
  public $parentId;
  
  //the latest ("youngest") child post (of this post).
  public $youngestChild;

  //the previous post on the same level, next older sibling
  //previous = preceeding on the time axis
  public $olderSibling;

  public $parent;

  //user data
  public $userId;
  public $firstname;
  public $lastname;
  public $avatar;


  public function __construct ($id, $postingDate, $content, $userId, $firstname, $lastname, $avatar, $parentId) {

    $this->id = $id;
    $this->postingDate = new DateTime ($postingDate);
    $this->content = $content;

    $this->userId = $userId;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->avatar = $avatar;

    $this->parentId = $parentId;

  }


}

 ?>
