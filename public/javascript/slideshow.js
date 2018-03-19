
var slideIndex = 5
var timeoutHandle;
//showSlides(slideIndex);
automateShowSlides();

function plusSlides(n) {
  slideIndex=slideIndex+n;
  showSlides(slideIndex);
}

function currentSlide(n) {
  slideIndex=n;
  showSlides(slideIndex);
}

function showSlides(n) {

  clearTimeout(timeoutHandle);
  timeoutHandle=setTimeout(automateShowSlides,5000);
  var first=document.getElementsByClassName("first");
  if(first.length>0)
  {
    first[0].className="slide";
  }
  var slides = document.getElementsByClassName("slide");
  var dots=document.getElementsByClassName("dot");

  if (n > slides.length) {
    slideIndex = 1;
  }

  if (n < 1) {
    slideIndex = slides.length;
  }

  var i;
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for(i=0;i< dots.length;i++)
  {
    dots[i].className="dot";
  }

  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className="dot active";

}

function automateShowSlides()
{
  var first=document.getElementsByClassName("first");
  if(first.length>0)
  {
    first[0].className="slide";
  }
  var slides = document.getElementsByClassName("slide");
  var dots=document.getElementsByClassName("dot");

slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }



  var i;
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for(i=0;i< dots.length;i++)
  {
    dots[i].className="dot";
  }

  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className="dot active";
  timeoutHandle=setTimeout(automateShowSlides,5000);
}
