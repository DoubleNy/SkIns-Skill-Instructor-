<?php session_start(); ?>

<html>
<head>
  <link rel="stylesheet" href="public/css/quiz.css">
<script src="public/javascript/home.js"></script>
</head>
<body>
<?php
        require_once 'models/databaseModel.php';
        $exec = new DatabaseModel();
        $array = $exec->getQuestions('beginner', $_SESSION['category']);
        $one="";
        echo ' <center> <p class="quiz_title"> Quizz for Beginner ' . $_SESSION['category'] . '</p> </center> ';
        $i = 0;
        while($i < 25){
              echo '  <center>
                      <div class="quizbox">
                          <p> '  . $array[$i] .  ' </p>
                          <input type="checkbox" id="'. ($i+1) .'">'  . $array[$i+1] .  '<br>
                          <input type="checkbox" id="'. ($i+2) .'">'  . $array[$i+2] .  '<br>
                          <input type="checkbox" id="'. ($i+3) .'">'  . $array[$i+3] .  '
                      </div>
                      </center>
              ';
                $i = $i + 5;

                  if($array[$i - 1] == $array[$i - 2]){
                      $one = $one . "3";
                  }
                  if($array[$i - 1] == $array[$i - 3]){
                      $one = $one . "2";
                  }
                  if($array[$i - 1] == $array[$i - 4]){
                      $one = $one . "1";
                  }
        }

        //$one = $array[4].'*'.$array[9].'*'.$array[14].'*'.$array[19].'*'.$array[24];
        //$two = $array[9];
        //$three = $array[14];
        //$four = $array[19];
        //$five = $array[24];
        echo '<center> <button class="quiz_send_button" type="button" onclick="popUpPunctaj('. $one .')">Submit answers!</button> </center>';
?>
</body>
</html>
