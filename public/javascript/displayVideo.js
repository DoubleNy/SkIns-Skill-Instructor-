
window.setInterval(function() {myFunction()},2000);
var container = document.getElementById("container");
var yPoz = container.offsetTop;
function myFunction() {
  if(window.pageYOffset < 100) {
    container.style.marginTop = "100px";
  } else {
    if (window.pageYOffset+40 >= yPoz) {
      container.style.marginTop = (window.pageYOffset+40) + "px";
    }
  }
}

function addcomment() {
  var user = document.getElementById("user").innerHTML;
  var videoID = document.getElementById("videoid").innerHTML;
  var comm = document.getElementById("comment").value;
  //window.alert(user + " " + videoID + " " + comm);
  $.ajax({
    type: "POST",
    url: 'displayVideo/addComment',
    data: ({videoID : videoID, user : user, comm : comm}),
    success: function(response) {
        alert(response);
    }
  });

}
