<?php
session_start();
include('includes/connectDB.php');
$status=""; 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['PID'] === $_POST["PID"]){
        $PID = $_POST['PID'];
        $checkQuantity="Select quantity FROM product WHERE PID='$PID'";
        $result = mysqli_query($DB,$checkQuantity);
        if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        if($_POST['quantity']> $row['quantity']){
            echo"<script> alert('Not enuogh stock available, try less'); </script>";
        }else{
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }}
}
  	
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/all.css">
    <link rel="stylesheet" href="Styles.css?v=<?php echo time(); ?>">
    <title>Your Cart</title>

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

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<th style="width:60px"></td>
<th style="width:60%">ITEM NAME</th>
<th style="padding-left: 0em;">QUANTITY</th>
<th style="padding-left: 2em;">UNIT PRICE</th>
<th style="padding-left: 2em;">ITEMS TOTAL</th>
</tr>	
<?php	
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><br>
<img src="image/<?php echo $info[4]=$product["pic"]; ?>" width="50" height="40" />
</td>
<td><?php echo $info[1]=$product["PName"]; ?><br/>
<form method='post' action=''>
<input type='hidden' name='PID' value="<?php echo $product["PID"]; ?>" />
</form>
</td>
<td style="padding-left: 1em;">
<form method='post' action=''>
<input type='hidden' name='PID' value="<?php echo $product["PID"]; ?>" />
<input type='hidden' name='action' value="change" />
<input class="InputStyle" name="quantity" style="width: 3em;" type="number" min="0" step="1" onChange="this.form.submit()" value="<?php echo    $info[2]=$product["quantity"]; ?>" >
</form>
</td>
<td style="padding-left: 3em;"><?php echo "SR".$info[3]=$product["price"]; ?></td>
<td style="padding-left: 3em;"><?php echo "SR".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
        // insert into DB
    $totali=$info[3]*$info[2];

    $query= "INSERT INTO last_purchase (P_name, P_quantity, P_unitPrice, Items_total, pic) VALUES ('$info[1]', '$info[2]','$info[3]','$totali','$info[4]')";
    
     $insert = mysqli_query($DB,$query) OR die(mysqli_error());
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "SR".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3 align='center'>Your cart is empty!</h3>";
    
	}
?>
</div>

<div style="clear:both;"></div>
<div class="SpecialOrder">
    <div class="templatemo_form" align="center">
        <?php 
        if(isset($_SESSION["shopping_cart"])){ ?>
        <button onclick="window.location.href = 'Checkout.php'" type="button">CheckOut</button>
        <?php } ?>
    </div>
    <div class="templatemo_form" align="center">
        <button style="width:200px" onclick="window.location.href = 'Home.php'" type="button">Continue Shopping</button>
    </div>
</div>
    <!-- end of the content -->
    <div id="footer"></div>
</body>
</html>