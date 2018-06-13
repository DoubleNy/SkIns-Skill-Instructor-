
<div onclick="myFunction(this)" class="container1 change" >
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
</div>

<script src="public/javascript/login.js"></script>
<script src="public/javascript/home.js"></script>
<?php
  if(isset($_SESSION['logged'])){
    echo '<style type="text/css">
        #h6 {
            display: none;
        }

        #h7 {
            display: none;
        }

        #h8 {
            display : block;
        }
        </style>';
  }
  //echo
  // "<div class='iconLog'>
  // <h1>".$_SESSION['user']."</h1>
  // </div>"
?>

<div id="navbar" class="slide-right">
<a href="index"><div id="active1" class="hexagon"><div class="buttonName"><h5>Home</h5></div></div></a>
<a href="about"><div class="hexagon" id="h2"><div class="buttonName"><h5>About</h5></div></div></a>
<a href="videos"><div class="hexagon" id="h3"><div class="buttonName"><h5>Videos</h5></div></div></a>
<a href="docs"><div class="hexagon" id="h4"><div class="buttonName"><h5>Docs</h5></div></div></a>
<a href="contact"><div class="hexagon" id="h5"><div class="buttonName"><h5>Contact</h5></div></div></a>
<a href="login"> <div onclick="addPop()" class="hexagon" id="h6"><div class="buttonName"><h5>Log in</h5></div></div></a><a href="signup"> <div onclick="addSign()" class="hexagon" id="h7"><div class="buttonName"><h5>Sign up</h5></div></div></a>
<a href="index"> <div onclick="logout()" class="hexagon" id="h8"><div class="buttonName"><h5>Logout</h5></div></div></a>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</div>
