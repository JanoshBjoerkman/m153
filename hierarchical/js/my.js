$(document).ready(function () {

  var bodyNavtag = $("body").data("navtag");

  //loop over all navitems and set them active or inactive by comparing navtag
  //of bodyNavtag
  $(".navitem").each(function () {

    var navtag = $(this).data("navtag");

    if (bodyNavtag.localeCompare(navtag) == 0) {
      $(this).removeClass("inactive");
      $(this).addClass("active");
    } else {
      $(this).removeClass("active");
      $(this).addClass("inactive");
    }
  });
});

