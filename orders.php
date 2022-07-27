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

function get_product_info($id)
{
    global $DB;
    $sql = mysqli_query($DB,"SELECT * FROM product WHERE PID={$id}");
    $row=mysqli_fetch_array($sql);
    return $row;
}
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
    <h3 align="center">All Orders</h3>
<table class="table" style="width:100%">
<tbody>
<tr>
<td>Total Amount</td>
<td>Total QUANTITY</td>
</tr>	
<?php
if(isset($_COOKIE['Customer_Order'])) {
    $cart_json = json_decode($_COOKIE['Customer_Order']);
    $count = count($cart_json);
    $html = "<tr>";
    for($i = 0; $i < $count; $i++) {
if($cart_json[$i]->TOTAL != "") {
    $Total = $cart_json[$i]->TOTAL;
    $Items = $cart_json[$i]->Items;
$div =<<<DELIMETER
<tr>
</td>
<td>{$Total} SR</td>
<td>{$Items} SR</td>
</tr>

DELIMETER;
echo $div; 
}
    } 
}else {
    echo "<h3>You don't have any orders</h3>";
} 

?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
    <!-- end of the content -->
    <div id="footer"></div>
</body>
</html>