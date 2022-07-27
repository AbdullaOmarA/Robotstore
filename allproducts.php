<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/all.css">
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css">
    <script src="includes/sweetalert.js"></script>
    <script src="includes/alerts.js"></script>


 
    <title></title>

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
<body>
    <div id="Bar"></div>
    <!-- main content here -->
    <div class="bootstrap" style="background:none;">
        
<!-- Any HTML here will be styled with Bootstrap CSS -->
<?php
include('CheckCart.php');
?>
<div class="container" style="padding-top:30px; background:none;" >
    <div class="row mt-8" >
    <?php 
        
require('includes/connectDB.php');     
        
$Query="Select * from product";
$result=mysqli_query($DB,$Query);        
if($result)
{
   
while($row=mysqli_fetch_assoc($result))
   {
    ?>
    
    <div class="col-sm-4" style="hight:50%" >
        
        <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
        <div class="card" style="column-break-inside: avoid; margin-top:20px;  text-align: center; display: block" >
             <input type='hidden' name='PID' value="<?php echo $row['PID'];?>">
             <input type='hidden' name='type' value="simple">

		    <a href="product-detail.php?pid=<?php echo $row['PID'];?>"><img  width="300" height="300" src="image/<?php echo $row['pic'];?>" ></a>
            
		    <div class="card-body text-center">
                <div class=".productname">
                    <h2 class="card-title">  <?php print $row['PName']; ?> </h2>
                </div>
            
                <h4 class="card-title">  <?php print $row['price']; ?> SR </h4>
                <div class="productDisc">
           
                    <p class="card-text"><?php print $row['description']; ?></p>
                </div>
            
                <div class="card-footer">
                <small class="text-muted"></small>
       
		            <div class="quantity">
                    <?php if(isset($_SESSION['cID'])){ ?>
                        <input type="number" id="quantity" name="sentQuantity" min="1" max="<?php echo $row['quantity'];?>" value="1">                                   
                                <button type="submit" class="btn-secondary" style="background:blue " title="add to cart" name="Cart" onclick="myFunction()" >
                            <i class="fa fa-cart-plus" style="color: white;"></i>
                        </button>
                        <?php } else { ?>
                            <input type="number" id="quantity" disabled name="sentQuantity" min="1" max="<?php echo $row['quantity'];?>" value="1">                                   
                                <button type="button"  class="btn-secondary" style="background:blue " title="add to cart" name="Cart" onclick="alert('Please login to continue')" >
                            <i class="fa fa-cart-plus"style="color: white;"></i>
                        </button>
                    <?php }  ?>
            
                    <?php if($status!=""){
                        echo"<script> alert('$status'); </script>";
                        $status="";
                        
                    }
                   ?>
                    </div>
       
                </div>
            </div>
				
        </div></form>
        
    </div>
        <?php
    }
    
                  
}
else 
{
          echo "no result found" ;
}
 ?>   


    
    </div>
    </div>
</div>
        
    <!-- end of the content -->
    <div id="footer"></div>
</body>
</html>