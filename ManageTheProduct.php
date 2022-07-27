<?php session_start(); 
include('includes/MNGMcases.php');
 if(!isset($_SESSION['admin_login'])){
     echo'<script>         
    var conf = confirm("You are not Logged in !!\n \n Click YES to go to Login Page");
    if (conf == true) {
            window.location.href = "Login.php"; 
    }else{
      window.location.href = "Home.php"; 

    }
  </script>';
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <link rel="stylesheet" href="includes/all.css">
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <title> ManageTheProduct</title>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"> </script>
    <script> 
        $(function(){
            $("#Bar").load("includes/Bar.php"); 
            $("#footer").load("includes/Footer.html"); 
        });
        </script> 
</head>
<body class="ManageTheProduct">
<div id="Bar"></div>
    <!-- main content here -->
    <div class="WhiteBox"></div>
    <div class="content">
        <h2>Managment Control <i class="fas fa-user-cog"></i></h2>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
            <div class="error"> <?php echo $errorMessage;?></div>     
            <div class="success"> <?php echo $ConfirmMessage;?></div>     
            <p><label class="num"><span>*</span> Product ID:
            <span class="error"> <?php echo $PID_error; ?> </span><br>
            <input class="InputStyle" name="PID" type="number" min="1" max="9999" step="1"  placeholder="####" maxlength="4" value="<?php echo $ROW['PID']; ?>" autofocus> <button type="submit" name="refresh" title=" Click this icon to retrieve the product data"><i class="fas fa-sync"></i> </button>
            </label></p>

            <p><label> Product Name:
                <span  class="error"> <?php echo $PName_error; ?></span><br>
                <input class="InputStyle" name="PName" type="text" size="30" placeholder="Enter Product name Here...." value="<?php echo $ROW['PName']; ?>">    
                
            </label></p>

            
            

            <p><label class="num"> Product Price:
                <span class="error"><?php echo $price_error ?></span><br>
                <input class="InputStyle" name="price" type="number" min="50" step="any" value="<?php echo $ROW['price']; ?>"> SAR         
                
            </label></p> 

            <p><label class="quantity"> Quantity: 
            <span class="error"><?=$quantity_error?> </span><br>
                <input class="InputStyle" name="quantity" type="number" min="1" step="1" name="Quantity" value="<?php echo $ROW['quantity']; ?>" >
            </label></p>

            <label>  Description: <br>
            <textarea name="description" cols="40" rows="5" placeholder="Enter description...."><?php echo $ROW['description']; ?> </textarea>
            </label>
            <div class="ButtonsAlign" >
                <input class="formButtons" type="reset" value="Clear" size="10"><br>
                <input class="formButtons" name="add" type="submit" value="Add Item" ><br>
                <input class="formButtons" name="update" type="submit" value="Update" ><br>
                <input class="formButtons" name="delete" type="submit" value="Delete" >
            </div>
            </div>
        </form>
        <div class="extraspace"></div>
    </div><!-- end of the content -->
    <div id="footer"></div>
        <script type="text/javascript" src="includes/Scripts.js"></script>
</body>
</html>