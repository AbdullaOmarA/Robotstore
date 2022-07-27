<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/all.css">
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <title> Home</title>

    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
    </script>
    <script> 
    $(function(){
    $("#header").load("includes/Header.php"); 
    $("#footer").load("includes/Footer.html"); 
    });
    </script> 

</head>
<body class="home">
    <div id="header"></div>
    <!-- main content here -->
    <div class="content">
        <div class="text">
            <p><h1 style="color:blue"> Welcome to  store </h1><br>
            
        </div>
        <div class="container">
            <div class="imgbox">
                <div class="thumbnail">
                    <a href="allproducts.php">
                        <img src="image/r.jpeg" >
                        <span></span>
                    </a>
                </div>  
            </div>

        </div>

      
        </div>
    </div>
    <div class="extraspace"></div>
    <!-- end of the content -->
    <div id="footer"></div>
</body>
</html>