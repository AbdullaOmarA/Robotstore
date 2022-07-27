<?php 
//add this piece of code in top of PHP file 
//usually the 'display_errors' directive is turn off by default
//1 is for ON and 0 is for OFF
ini_set('display_errors', 1);  
//setting display_startup_errors to ON using 1
ini_set('display_startup_errors', 1);
//error_reporting function with parameter E_ALL
error_reporting(E_ALL);
ob_start();
?>
<?php
 $duplicateEmail="";
 $insertSuccess=false;
 $emailExist=false;
 ?>
<?php include('signup.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/all.css">
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <title>Register</title>
    
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
<body class="CreateAccount">
    
    <div id="Bar"></div>
    <?php 
if($insertSuccess){
    // header('location: Login.php');
    echo "<script>window.location.href='Login.php'</script>";
}
?>
    <!-- main content here -->
    <div class="WhiteBox"></div>
    <div class="content">
        <h2>Creat Your Account</h2>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" name="login" >
            <p><label><span>*</span> Your Name<br><input id="name" class="FirstName" type="text" name="name" required autofocus placeholder="First and last name" value="<?php if(isset( $_POST['name'])) {print htmlspecialchars($_POST['name']);}?>">
            <i class="fas fa-user-alt"></i></label></p>
            <p><label><span>*</span> Email address<br> <input type="email" name="email" required placeholder="example@domain.com" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$"value="<?php if(isset( $_POST['email'])) {print htmlspecialchars($_POST['email']);}?>">
            <span class="checkEmail"></span>
            <i class="fas fa-envelope"></i></label></p>

            <p> <label><span>*</span> Password<br><input id="pass" width="50em" type="password" name="password" minlength="8" maxlength="20" required placeholder="Use at least 8 characters">
            <i class='fas fa-lock' id="icon1" onclick="showPassSignUp()"></i>
        </label></p>
        <div id="setMsg">&nbsp;</div><hr>
        <div class='tooltip help'>
            
            <div class="contents">
                <b></b>
                <p>Please enter a password which:<br>
                1. length of password from 8 to 20.<br>
                2. contains number(s)<br>
                3. contains letter(s)<br>
                4. contains special charachter(s)<br>
            </p>
        </div>
    </div>
    
    <!-- //
    //if(!$emailExist)
    //else
    //print("<p><i class='fas fa-lock'></i></P>");
    //-->
    
    <div class="bottom">
    <p><label><span class="phonN">*</span> Phone number<br><input type="tel" name="PhoneNo" placeholder="eg. 0500000000" required
    pattern="05[0-9]{8}" maxlength="10" value="<?php if(isset( $_POST['PhoneNo'])) {print htmlspecialchars($_POST['PhoneNo']);}?>"><span class="checkTel"></span>
        <i class="fas fa-phone-alt"></i></label></p>

        <label for="city"><span>*</span> City<br>
        <Select id="city" required name="city">
            <option value="ahsa">Ahsa</option>
            <option value="abqaiq">Abqaiq</option>
            <option value="dammam" selected>Dammam</option>
            <option value="dhahran">Dhahran</option>
            <option value="hafr">Hafr AlBatin</option>
            <option value="jubail">Jubail</option>
            <option value="khafji">Khafji</option>
            <option value="khobar">Khobar</option>
            <option value="olya">Qaryat AlUlya</option>
            <option value="qatif">Qatif</option>
            <option value="ras">Ra's Tanura</option>
            <option value="Sehat">Sehat</option>
        </Select><i class="fas fa-map-marker-alt"></i></label>
</div>

        <p><label><span>*</span> Address<br><input type="text" required placeholder="Neighborhood-Street-House No." name="address" required value="<?php if(isset( $_POST['address'])) {print htmlspecialchars($_POST['address']);}?>">
        <i class="fas fa-street-view"></i></label></p>   
</div>
    </div>
    <div style="text-align:center">
        <input  id="submit" class="formButtons"  type="submit" name="submit" value="Sign up" >
        <div id="setErrorName">&nbsp;</div>
        <?php
        if($emailExist)
        print("<br><p style='color:red; margin-left:10px;'>". $duplicateEmail." </p>");
        ?> 
        </div>
    </form>
    
    <!-- end of the content -->
    <div id="footer"></div>
    
    <script type="text/javascript" src="includes/Scripts.js"></script>
</body>
</html>