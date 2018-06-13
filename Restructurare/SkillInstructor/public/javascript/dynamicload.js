$(window).scroll(function () {
  //console.log("scolling...");
  //console.log($(window).scrollTop());
  //console.log($(document).height() - $(window).height());
  if ($(window).scrollTop() >= $(document).height() - $(window).height() -.5) // - 100
  {
   //console.log("inside it!");
        $.ajax({
          type: "POST",
          url: 'getvideos',
          success: function(html) {
            $("#container").append(html);
          }
        });
  }
});
