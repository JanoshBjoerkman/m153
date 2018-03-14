<?php
require_once(MODEL_PATH . "/post.php");


class ForumModel
{
  public $posts;
  public function __construct () {}

  public function loadPosts ()
  {
    $i;
    $sql_timeSortedPosts =
      "select
        post.id as postID,
        post.parent_id as parentID,
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
    $flat_timeSortedPosts = DB::getConnection()->select($sql_timeSortedPosts, $params);
    $rowCount = count($flat_timeSortedPosts);

    // chaining all posts, build post history - most recent first, oldest last
    $this->chainPosts($flat_timeSortedPosts);
  }

  public function chainPosts($flatPosts)
  {
    $count_flatPosts = count($flatPosts);
    $recentPost;
    $i;
    for($i = 0; $i < $count_flatPosts; $i++)
    {
      // sort out all parents
      if($flatPosts[$i]->parentID == null)
      {
        $newPost = new Post(
          $flatPosts[$i]->postID,
          $flatPosts[$i]->parentID,
          $flatPosts[$i]->timestamp,
          $flatPosts[$i]->content, 
          $flatPosts[$i]->userid,
          $flatPosts[$i]->firstname,
          $flatPosts[$i]->lastname,
          $flatPosts[$i]->avatar
        );
        if ($i == 0) 
        {
          // the newest post should be the first
          $this->posts = $newPost;
        }
        else 
        {
          // chain older post
          $recentPost->previousPost = $newPost;
        }
        // chain subposts to current parent post (reference)
        $this->chainSubPosts($newPost, $flatPosts);
        $recentPost = $newPost;
      }
    }
  }

  public function chainSubPosts(&$parent, $flatPosts)
  {
    $subposts = $this->selectPostsFromFlatStructure($flatPosts, $parent->id);
    $count_subposts = count($subposts);
    $recentPost;
    $i;
    for($i = 0; $i < $count_subposts; $i++)
    {
      $newPost = new Post(
        $subposts[$i]->postID,
        $subposts[$i]->parentID,
        $subposts[$i]->timestamp,
        $subposts[$i]->content, 
        $subposts[$i]->userid,
        $subposts[$i]->firstname,
        $subposts[$i]->lastname,
        $subposts[$i]->avatar
      );
      if ($i == 0) 
      {
        // the newest post should be the first
        $this->posts = $newPost;
      }
      else 
      {
        // chain older post
        $recentPost->previousPost = $newPost;
      }
      chainSubPosts($newPost, $flatPosts);
      $recentPost = $newPost;
    }
  }

  public function selectPostsFromFlatStructure($flatPosts, $parentID)
  {
    $selected = array();
    foreach($flatPosts as $key => $value)
    {
      if($value->parentID == $parentID)
      {
        array_push($selected, $value);
      }
    }
    return $selected;
  }

  public function addPost ($userId, $content)
  {
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
