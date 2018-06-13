
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
