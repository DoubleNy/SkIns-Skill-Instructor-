function myFunction(x) {
    x.classList.toggle("change");
    //addMenu();
    var menu=document.getElementById('navbar');
    //var has=menu.classList.contains("slide-right");
    if(menu.classList.contains("slide-right")){
      menu.classList.toggle("slide-left");
    }
    else {
      menu.classList.toggle("slide-right");
    }
}

  function addPop() {
      //logare.classList.remove("pop-up-forward");
      var logare = document.getElementById('pop');
      var hasClass = logare.classList.contains('pop-up-forward');
      var elem = document.getElementById('body');
      //window.alert(hasClass);
      //if(hasClass){
      //} else {
        //logare.style.visibility = "visible";
      if(hasClass){
        logare.classList.toggle("pop-up-backward");
        //elem.style.filter = "";
      } else {
        logare.style.display = "block";
        logare.classList.toggle("pop-up-forward");
        //elem.style.filter = "blur(2px)";
      }

      //}
}

  function removePop() {
      var logare = document.getElementById('pop');
      //logare.style.visibility = "hidden";
      logare.classList.toggle("pop-up-backward");
      //logare.classList.toggle("pop-up-forward");
  }
