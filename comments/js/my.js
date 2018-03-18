$(document).ready(function ()
{
  var bodyNavtag = $("body").data("navtag");

  //loop over all navitems and set them active or inactive by comparing navtag
  //of bodyNavtag
  $(".navitem").each(function ()
  {
    var navtag = $(this).data("navtag");
    if (bodyNavtag.localeCompare(navtag) == 0)
    {
      $(this).removeClass("inactive");
      $(this).addClass("active");
    }
    else
    {
      $(this).removeClass("active");
      $(this).addClass("inactive");
    }
  });
});

function comment(currentElement, postID)
{
  // get clicked element
  var comment_area = $('#comment_text_'+postID);
  hideAllCommentAreas();
  comment_area.parent().show();
  comment_area.show();
}

function post_comment(postID)
{
  var text = $('#comment_text_'+postID);
  if(text.val() != "")
  {
    var request = $.ajax({
      url: "index.php?",
      type: 'POST',
      data: {content:text.val(), op:"addComment", parentID:postID}
    });

    request.done(function(){
      console.log('posted');
      location.reload();
    });
  }
  else
  {
    hideAllCommentAreas();
  }
}

function hideAllCommentAreas()
{
  // hide all open comment areas
  $('.comment_textarea').each(function(){
    $(this).hide();
  });
}
