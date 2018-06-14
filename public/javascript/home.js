function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

function logout(){
  //window.alert("aa");
  var val = "true";
  $.ajax({
      type: "POST",
      url: "logout/makeLogout",
      data: ({val : val}),
      success: function(rs){
        //alert(rs);
      },
      error: function(xhr, textStatus, errorThrown){
       //alert(errorThrown);
    }

  });
}


function myFunction(x) {
    x.classList.toggle("change");
    var menu=document.getElementById('navbar');
    if(menu.classList.contains("slide-right")){
      menu.classList.toggle("slide-left");
    }
    else {
      menu.classList.toggle("slide-right");
    }
}
  function addPop() {
      var logare = document.getElementById('pop');
      //var singIsOnDisplay = document.getElementById('signUP').classList.contains('sign-up-forward');
      var hasClass = logare.classList.contains('pop-up-forward');
      //console.log(singIsOnDisplay);
      //if(singIsOnDisplay){
    //      addSign();
    //  }
      if(hasClass){
          logare.classList.add("pop-up-backward");
          logare.classList.remove("pop-up-forward");
          //logare.classList.toggle("pop-up-backward");
        } else {
          logare.style.visibility='visible';
          logare.classList.remove("pop-up-backward");
          logare.classList.add("pop-up-forward");
          logare.style.display = "block";
          //logare.classList.toggle("pop-up-forward");
        }
}

  function addSign() {
      var logare = document.getElementById('signUP');
      var popIsOnDisplay = document.getElementById('pop').classList.contains('pop-up-forward');
      var hasClass = logare.classList.contains('sign-up-forward');
      if(popIsOnDisplay){
          addPop();
      }
      //console.log(popIsOnDisplay);
      if(hasClass){
          logare.classList.add("sign-up-backward");
          logare.classList.remove("sign-up-forward");
          //logare.classList.toggle("sign-up-backward");
      } else {
          logare.classList.remove("sign-up-backward");
          logare.classList.add("sign-up-forward");
          logare.style.display = "block";
          //logare.style.display = "block";
          //logare.classList.toggle("sign-up-forward");
      }
}

function microSurival(){
    $.ajax({
        type: "POST",
        url: "videosSurvival/getSurvivalJson",
        success: function(rs){
              if(document.getElementById("centerOf").innerHTML.length <= 50){
                  document.getElementById("centerOf").innerHTML += rs;
              }
        },
        error: function(xhr, textStatus, errorThrown){
        }
    });
}

function microFitness(){
  $.ajax({
      type: "POST",
      url: "videosFitness/getFitnessJson",
      success: function(rs){
            if(document.getElementById("centerOf").innerHTML.length <= 50){
                document.getElementById("centerOf").innerHTML += rs;
            }
      },
      error: function(xhr, textStatus, errorThrown){
      }
  });
}
