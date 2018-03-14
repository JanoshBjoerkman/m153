<?php
require_once(MODEL_PATH . "/post.php");

class BlogModel {

  public $posts;


  public function __construct () {}

  
  public function loadPosts ($userId) {

    $i;

    $sql =
      "select
        post.id as postid,
        timestamp,
        content
      from
        post, user
      where
        user.id = post.user_id and
        user.id = :userid
      order by
        timestamp desc";

    $params = [':userid' => $userId];
    $rows = DB::getConnection()->select($sql, $params);
    $rowCount = count($rows);

    //chaining all posts, build post history - most recent first, oldest last
    $recentPost;
    $newPost;
    for ($i = 0; $i < $rowCount; $i++) {
      $newPost = new Post ($rows[$i]->postid, $rows[$i]->timestamp, $rows[$i]->content);
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
    $this->loadPosts($userId);

    return $isSuccessful;
  }

  
}

 ?>
