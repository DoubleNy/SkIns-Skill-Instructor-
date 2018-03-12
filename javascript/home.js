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
