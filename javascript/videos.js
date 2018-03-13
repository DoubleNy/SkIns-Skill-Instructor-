window.onscroll = function(){revealVideos()};

var contentCells = document.getElementsByClassName("contentCell");

function revealVideos() {
  var i;
  for (i = 0; i < contentCells.length; i++) {
    if((window.pageYOffset + window.innerHeight/2 >= contentCells[i].offsetTop) && (window.pageYOffset + window.innerHeight/2 <= contentCells[i].offsetTop + 350)) {
      contentCells[i].style.opacity = "1";
      contentCells[i].style.filter="blur(0px)";

    }
    else {
      contentCells[i].style.opacity = "0.5";
      contentCells[i].style.filter="blur(3px)";
    }

  }
}

function setTemplate1() {
  document.documentElement.style.setProperty('--color1','var(--T1color1)');
  document.documentElement.style.setProperty('--color2','var(--T1color2)');
  document.documentElement.style.setProperty('--color3','var(--T1color3)');
  document.documentElement.style.setProperty('--color4','var(--T1color4)');
  document.documentElement.style.setProperty('--color5','var(--T1color5)');
  document.documentElement.style.setProperty('--color6','var(--T1color6)');
  document.documentElement.style.setProperty('--color7','var(--T1color7)');
  document.documentElement.style.setProperty('--color8','var(--T1color8)');
}

function setTemplate2() {
  document.documentElement.style.setProperty('--color1','var(--T2color1)');
  document.documentElement.style.setProperty('--color2','var(--T2color2)');
  document.documentElement.style.setProperty('--color3','var(--T2color3)');
  document.documentElement.style.setProperty('--color4','var(--T2color4)');
  document.documentElement.style.setProperty('--color5','var(--T2color5)');
  document.documentElement.style.setProperty('--color6','var(--T2color6)');
  document.documentElement.style.setProperty('--color7','var(--T2color7)');
  document.documentElement.style.setProperty('--color8','var(--T2color8)');
}
