<?php include('includes/checklogin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/all.css">
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <title>Forget Password</title>

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

</head>
<body class="LoginPage Forgetpass">
    <div id="Bar"></div>
    <!-- main content here -->
    <div class="WhiteBox">
        <div class="login">
            <h2> Restore Password</h2>
            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" name="Validate">
                <input type="text" name="email" placeholder="Your Email" required="required" class="username"><i class="fas fa-user"></i>
                <button type="submit" class="btn-primary btn-block btn-large newWidth" name="validateEmail" value="send">Send a link to change password</button>
            </form>  
            <div class="error"> <?php echo $validationerror; ?></div>
            <div class="success"> <?php echo $validationConfirm; ?></div>
        </div>
    </div>
    <!-- end of the content -->
<div id="footer"></div>

</body>
</html>