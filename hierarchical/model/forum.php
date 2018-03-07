<?php
require_once(MODEL_PATH . "/post.php");

class ForumModel {

  public $posts;


  public function __construct () {}

  
  public function loadPosts () {

    $i;

    $sql =
      "select
        post.id as postid,
        timestamp,
        content,
        user.id as userid,
        firstname,
        lastname,
        avatar
      from
        post, user
      where
        post.user_id = user.id
      order by
        timestamp desc";

    $params = [];
    $rows = DB::getConnection()->select($sql, $params);
    $rowCount = count($rows);

    //chaining all posts, build post history - most recent first, oldest last
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
        $rows[$i]->avatar);
      if ($i == 0) {
        $this->posts = $newPost;
      } else {
        $recentPost->previousPost = $newPost;
      }
      $recentPost = $newPost;
    }
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

  
}

 ?>
