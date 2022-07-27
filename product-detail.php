<?php
 $insertSuccess=false;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/all.css">
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <title> Detail</title>
    <script src="includes/sweetalert.js"></script>
    <script src="includes/alerts.js"></script>
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

<body class="SpecialOrder">
<?php include('CheckCart.php') ?>

  <div id="Bar"></div>
   <?php 
if($insertSuccess){
    header('location: Cart.php');
}

require('includes/connectDB.php');     
        
$PID = $_GET['pid'];
$Query="Select * from product where PID={$PID}";
$result=mysqli_query($DB,$Query);
$product = mysqli_fetch_array($result);
extract($product);
?>

    <section>
	<figure><img src = "image/<?php echo $pic?>" width = "300" height = "300" ></figure>

    <div class="form">


    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" name="Cart">
    <table class="" style="width: 70% ">
        <tbody>
            <tr>
                <td>Name</td>
                <td><?php echo $PName?></td>
            </tr>
            
            <tr>
                <td>Price</td>
                <td><?php echo $price?></td>
            </tr>
    
            <tr>
                <td>Stock</td>
                <td><?php echo $quantity?></td>
            </tr>
        </tbody>
    </table>
          <p>
            <label><b>Description: </b></label><br><?php echo $description?>
          </p>

          <?php if(isset($_SESSION['cID'])) {?>
            <label for="">Quantity</label>
          <br>
          <input type="number" name="sentQuantity" id="change_qty" max="<?php echo $quantity?>" min="1" required value="1">
          <input type="hidden" name="PID" id="PID" value="<?php echo $PID?>">
		

		<div class="templatemo_form">
        <button type="submit" name="Cart">Add To Cart</button>
        <button onclick="quickcheckout()" type="button">CheckOut</button> </div>
          <?php } else { ?>
            <label for="">Quantity</label>
          <br>
          <input type="number" name="sentQuantity" max="<?php echo $quantity?>" min="1" required value="1" disabled>
          <input type="hidden" name="pid" value="<?php echo $PID?>">
		

		<div class="templatemo_form">
        <button type="button" name="Cart" onclick="alert('Please login to continue')">Add To Cart</button>
        <button onclick="alert('Please login to continue')" type="button">CheckOut</button>
        </div>
            <?php }  ?>
          

		
        <br>
    </form>   
   </div>
 
 
</form>
</section>
    <div id="footer"></div>
    <script>
function quickcheckout(){
    var qty = document.getElementById('change_qty').value;
    var pid = document.getElementById('PID').value;
    window.location.href = "Checkout.php?pid="+pid+"&qty="+qty+"";
}
</script>
</body>
</html>