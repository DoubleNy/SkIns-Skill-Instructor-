<html>

  <head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/home.css">
    <link rel="stylesheet" href="public/css/animations.css">
    <link rel="stylesheet" href="public/css/menu.css">
    <link rel="stylesheet" href="public/css/slideshow.css">
    <link rel="stylesheet" href="public/css/template.css">
    <script src="public/javascript/home.js"></script>
    <!--<script src="../javascript/slideshow.js"></script>-->
    <link rel="stylesheet" href="public/css/contact.css">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!--    <link rel="stylesheet" href="../css/ft-para.css">-->


  </head>

  <body>
    <?php require_once 'menu.php';?>
    <?php require_once 'slider.php';?>
    <div class="contact_Container">
        <div class="contact_Title_Div"><span class="contact_Title_Span">Contact Us</span></div>

        <div class="contact_Content_Div">
            <div class="cos_50per" id="adresa">
            <h3><span>Adresa</span></h3>
            <p>Pentru mai multe detalii ne gasiti la:</p>
            <p><i class="fa fa-map-marker ico"></i>  Iasi, Ro</p>
            <p><i class="fa fa-phone ico" ></i> +40743897488</p>
            <p><i class="fa fa-envelope-o ico"></i>skins@example.com</p>

            </div>
            <div class="cos_50per" id="map"></div>

            <div class="cos_100per" style="height:380">
                  <form class="cos_form">
                    <div class="cos_form_row">
                        <label class="cos_label">Name</label>
                        <input class="cos_input" type="text" name="Name" required>
                    </div>
                    <div class="cos_form_row">
                        <label class="cos_label">Email</label>
                        <input class="cos_input" type="text" name="Email" required>
                    </div>
                    <div class="cos_form_row">
                          <label class="cos_label">Message</label>
                          <input class="cos_input" type="text" name="Message" required>
                    </div>
                    <div>
                      <button class="cos_send_button" type="submit">Send</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
    <script src="publicC/javascript/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH7weUXxtqb9S6W-5IQsFsuN-LQxaaDDc&callback=contactMap"></script>
<?php require_once 'footer.php'; ?>
