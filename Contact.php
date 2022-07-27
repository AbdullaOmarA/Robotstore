<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/all.css">
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <title>Contact</title>

    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
    </script>
    <script> 
    $(function(){
    $("#Bar").load("includes/Bar.php"); 
    $("#footer").load("includes/Footer.html"); 
    });
    </script> 
    <style>
        #mapSize{
            width: 600px;
            height: 330px;
        }
    </style>
</head>
<body class="ContactPage">
    <div id="Bar"></div>
    <!-- main content here -->
    <div class="content">
      <h2>We are happy to hear your Suggestion</h2><br>
      <form role="form" method="post" action="#">

        <div class="templatemo_form">
          <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Your Name">
        </div>

        <div class="templatemo_form">
          <input name="email" type="text" class="form-control" id="email" placeholder="Your Email">
        </div>

        <div class="templatemo_form">
          <textarea name="message" rows="10" cols="40" class="form-control" id="message"
            placeholder="Type Your Message Here ..."></textarea>
        </div>

        <div class="templatemo_form"><button type="submit">Send Message</button>
        </div>

        <div class="address">
          <i class="fa fa-phone"></i> 013-860-1111<br>
          <i class="fa fa-map-marker"></i> ROBOt and electronic AlKhobar <br>
          <i class="fa fa-envelope"></i> <a style="color: blue;"  href="mailto:ROBOt&lectronicStore@info.com">ROBOt & electronicStore@info.com</a><br>
        </div>
      </form>
    </div>
    
      <div class="mapouter">
        <div class="gmap_canvas">
             <script id="mapSize">
        //google map API script
        var marker
        function myMap() {
            var mapProp = {
                center: new google.maps.LatLng(26.39511, 50.19561),
                zoom: 18,
                mapTypeId: 'satellite',
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

            var marker = new google.maps.Marker({
                map,
                animation: google.maps.Animation.DROP,
                position: {
                    lat: 26.39511,
                    lng: 50.19561
                },
            });

        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxSoD96jbfa84IOyGaTb3Kd_9tTQznZ5s&callback=myMap"></script>

<!--
          <iframe width="600" height="330" id="gmap_canvas"
          src="https://maps.google.com/maps?q=Prince%20Faisal%20Bin%20Fahd%20Road,%20AlKhobar&t=&z=13&ie=UTF8&iwloc=&output=embed"
          frameborder="0" scrolling="no" marginheight="0" marginwidth="0"> 

  </iframe>
-->
  </div>
  </div>

     <!-- end of the content --> 
    <div id="footer"></div>
</body>
</html>