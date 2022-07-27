<?php include('includes/checklogin.php'); if(isset($_GET['error'])){echo "<script>alert('You are not allowed to visit.')</script>"; } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/all.css">
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <title> Login</title>
    <script src="includes/Scripts.js"></script>


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
<body class="LoginPage">
    <div id="Bar"></div>
    <!-- main content here -->
    <div class="WhiteBox">
        <div class="login">
            <h2>Login<span style="font-family: 'monospace';"></span></h2>
            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" name="login">
                <input id="userEmail" type="email" name="email" placeholder="Your Email" required="required" class="username" autofocus />
                <i id="at_icon" class="fas fa-at"></i>
                <input id="pswrd" type="password" name="password" placeholder="Password" required="required" />
                <i id="icon1" class="fas fa-eye-slash" onclick="show()"></i>
                <button type="submit" class="btn btn-primary btn-block btn-large" value="Login" name="submit">Sign In</button>
            </form>
            <div class="error" style="text-align: center;"><?php echo $loginerror; ?></div>
            <div class="Links">
                <a href="CreateAccount.php" style="color: blue;">Not a member yet ?    </a>
                
                <a href="ForgetPass.php">Forget password?</a>
            </div>
        </div>
    </div>
    <!-- end of the content -->
<div id="footer"></div>

</body>
</html>