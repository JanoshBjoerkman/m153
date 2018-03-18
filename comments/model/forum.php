<?php
require_once(MODEL_PATH . "/post.php");

class ForumModel {

  //The LATEST top level post (see Post class for more information). All other posts are linked from within
  //the post class.
  public $youngestChild;


  public function __construct () {}

  
  public function loadPosts () {

    $this->addChildNodes($this->youngestChild, null);
  } 


  public function addPost ($userId, $content) {

    $now = new DateTime();
    $sql =
      "insert into post
          (timestamp, content, user_id)
        values
          (:timestamp, :content, :userid)";

    $params = array (
      ":timestamp" => $now->format("Y-m-d H:i:s"),
      ":content" => $content,
      ":userid" => $userId
    );

    $stmts = array (
      array ($sql, $params)
    );

    $isSuccessful = DB::getConnection()->insertOrUpdate($stmts);
    $this->loadPosts();

    return $isSuccessful;
  }

  public function addComment($userID, $content, $parentPostID)
  {
    $now = new DateTime();
    $sql =
      "insert into post
          (timestamp, content, user_id, parent_id)
        values
          (:timestamp, :content, :userid, :parent_id)";

    $params = array (
      ":timestamp" => $now->format("Y-m-d H:i:s"),
      ":content" => $content,
      ":userid" => $userID,
      ":parent_id" => $parentPostID
    );

    $stmts = array (
      array ($sql, $params)
    );

    $isSuccessful = DB::getConnection()->insertOrUpdate($stmts);
    $this->loadPosts();

    return $isSuccessful;
  }

  public function addChildNodes (&$youngestChildNode, $parentNode) {

    $sqlParentCondition = "parent_id = :parentid";
    
    if (!isset($parentNode)) {
      $sqlParentCondition = "parent_id is null";
      $params = [];
    } else {
      $params = array (
        ":parentid" => $parentNode->id
      );
    }

    $sql =
      "select
        post.id as postid,
        timestamp,
        content,
        user.id as userid,
        parent_id as parentid,
        firstname,
        lastname,
        avatar
      from
        post, user
      where
        post.user_id = user.id and " . $sqlParentCondition . " 
      order by
        timestamp desc";

    $rows = DB::getConnection()->select($sql, $params);
    $rowCount = count($rows);

    $recentPost;
    $newPost;
    for ($i = 0; $i < $rowCount; $i++) {
      $newPost = new Post (
        $rows[$i]->postid,
        $rows[$i]->timestamp,
        $rows[$i]->content, 
        $rows[$i]->userid,
        $rows[$i]->firstname,
        $rows[$i]->lastname,
        $rows[$i]->avatar,
        $rows[$i]->parentid);
      if ($i == 0) {
        $youngestChildNode = $newPost;
      } else {
        $recentPost->olderSibling = $newPost;
      }
      $newPost->parent = $parentNode;
      $recentPost = $newPost;
      //recursion - find children
      $this->addChildNodes($newPost->youngestChild, $newPost);
    }

  }

  
}

 ?>
