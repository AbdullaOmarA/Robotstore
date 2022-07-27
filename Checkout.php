<?php
session_start();
include('includes/connectDB.php');

function get_product_info($id)
{
    global $DB;
    $sql = mysqli_query($DB,"SELECT * FROM product WHERE PID={$id}");
    $row=mysqli_fetch_array($sql);
    return $row;
}

function get_total_bil()
{
    if(isset($_SESSION['shopping_cart'])) {
        $total = 0;
        for ($i=0; $i <count($_SESSION['shopping_cart']) ; $i++) { 
            
            $QTY = $_SESSION['shopping_cart'][$i]['quantity'];
            $price = $_SESSION['shopping_cart'][$i]['price'];
            $total = $total + ($QTY * $price);
        }
        echo $total;
    }
}

$quick_total = 0;
if(isset($_GET['pid'])){
    $id = $_GET['pid'];
    $qty = $_GET['qty'];
    $p_info = get_product_info($id);
    $quick_total = $p_info['price'] * $qty;
    $Pro_array = array(
        array(
        'PName'=>$p_info['PName'],
        'PID'=>$id,
        'price'=>$p_info['price'],
        'quantity'=>$qty,
        'total'=>$quick_total,
        'pic'=>$p_info['pic'])
    );
    $_SESSION['QuickOrder'] = $Pro_array;
}



if(isset($_POST['quick'])) {
    $order_json = $_SESSION['QuickOrder'];
    if(isset($_COOKIE['PastOrders'])){
        $qty = $_GET['qty'];
        $stored_orders = $_COOKIE['PastOrders'];
        $stored_orders = substr($stored_orders, 0, -1).",";
        $new_json_string = "";
        $stored_orders .= '{"PName":"'.$order_json[0]['PName'].'","PID":'.$order_json[0]['PID'].',"price":"'.$order_json[0]['price'].'","quantity":"'.$qty.'","pic":"'.$order_json[0]['pic'].'"}]';
        setcookie("PastOrders",$stored_orders,time() + (10 * 365 * 24 * 60 * 60));
        unset($_SESSION['QuickOrder']);
        header("location: PastPurchased.php");
    } else {
        $json_string = json_encode($_SESSION['QuickOrder']);
        setcookie("PastOrders",$json_string,time() + (10 * 365 * 24 * 60 * 60));
        unset($_SESSION['QuickOrder']);
        header("location: PastPurchased.php");
    }
}

if(isset($_POST['pay_now'])) {
    $order_json = $_SESSION['shopping_cart'];
    if(isset($_COOKIE['PastOrders'])){
        $stored_orders = $_COOKIE['PastOrders'];
        $stored_orders = substr($stored_orders, 0, -1).",";
        $new_json_string = "";
        $count = count($order_json);
        for($i=0;$i<$count;$i++){
            $stored_orders .= '{"PName":"'.$order_json[$i]['PName'].'","PID":'.$order_json[$i]['PID'].',"price":"'.$order_json[$i]['price'].'","quantity":"'.$order_json[$i]['quantity'].'","pic":"'.$order_json[$i]['pic'].'"},';
        }
        $stored_orders = substr($stored_orders, 0, -1)."]";
    
        setcookie("PastOrders",$stored_orders,time() + (10 * 365 * 24 * 60 * 60));
        unset($_SESSION['shopping_cart']);
        header("location: PastPurchased.php");
    } else {
        $json_string = json_encode($_SESSION['shopping_cart']);
        setcookie("PastOrders",$json_string,time() + (10 * 365 * 24 * 60 * 60));
        unset($_SESSION['shopping_cart']);
        header("location: PastPurchased.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,intial-scal=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="Location.css">
    <link rel="stylesheet" href="includes/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css">
    <title>CheckOut</title>
    <style type="text/css">

        hr {
            position: absolute;
            width: 50%;
            height: 1px;
            border: none;
            margin-right: auto;
            margin-left: 22em;
            margin-top: 38px;
            margin-bottom: 90px;
            background-color: #862840;
            opacity: 30%;
        }

        .locationForm input {
            height: 30px;
            margin: 2px;
        }

        .locationForm select {
            height: 35px;
            margin: 1px;
        }

        .locationForm input:focus,
        .locationForm select:focus {
            background-color: #fbcec2;
            cursor: text;

        }

        .wrapper {
            margin-left: 4%;
            align-content: center;
            width: 600px;
            padding-top: 0%;
            padding: 10px;
            margin: 25px auto 0;
            box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.5);
        }

        .wrapper h3 {
            color: dimgray;
            font-size: 24px;
            padding: 0px;
            margin: 20px;
            text-align: left;
            border: 1px
        }

        .input-group {
            margin-bottom: 8px;
            width: 100%;
            position: relative;
            display: flex;
            flex-direction: row;
            padding: 5px 0;
        }

        .input-box {
            width: 100%;
            margin-right: 1px;
            position: relative;
        }

        .input-box:last-child {
            margin-right: 10;

        }

        .name {
            padding: 14px 10px 14px 50px;
            width: 89%;
            margin-right: 30px;
            background-color: white;
            border: 1px solid #00000033;
            outline: none;
            letter-spacing: 1px;
            transition: 0.3s;
            border-radius: 3px;
            color: #333;
        }

        .input-box .icon {
            width: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0px;
            left: 0px;
            bottom: 0px;
            color: #333;
            background-color: whitesmoke;
            border-radius: 2px 0 0 2px;
            transition: 0.3s;
            font-size: 20px;
            pointer-events: none;
            border: 1px solid #00000033;
            border-right: none;
        }

        .name:focus+.icon {

            background-color: lightgray;
            color: white;
            border-right: 1px solid lightgray;
            border: none;
            transition: 1s;
        }

        .radio {
            display: none;
        }

        .input-box label {
            width: 44%;
            padding: 13px;
            background-color: white;
            display: inline-block;
            text-align: center;
            align-content: center;
            align-items: center;
            align-self: center;
            border: 1px solid lightgray;
        }

        .input-box label:first-of-type {
            border-top-left-radius: 4px;
            border-bottom-right-radius: 4px;


        }

        .input-box label:last-of-type {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;

        }

        .radio:checked+label {
            background-color: #E7E8EA;
            color: dimgray;
          
            transition: 0.5s;
        }

        .input-box select {

            display: inline-block;
            width: 35%;
            padding: 16px;
            margin-left: 11px;
            background-color: white;
            float: left;
            text-align: center;
            font-size: 14px;
            outline: none;
            border: 1px solid #00000033;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .input-box select:focus {

            background-color: #E7E8EA;
            color: dimgray;
            border: 1px solid #00000033;
            text-align: center;
        }

        button {
            width:89%;
            background: transparent;
            border: none;
            border-color: darkgrey;
            background: #E7E8EA;
            color: dimgray;
            padding: 15px;
            border-radius: 4px;
            font-size: 16px;
            transition: all 0.35s ease;
        }
    </style>
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

<body class="paymentbody">
<div id="Bar"></div>
    <!-- main content here -->
    <div class="bootstrap" style="background:none;">
    <section class="wrapper">
    <div class="wrapper">
        <div class="input-group">
            <div class="input-box">
                <h3> PAYMENT METHOD: <?php if(isset($_GET['pid'])){ echo $quick_total; } else {get_total_bil();}?> SR</h3>
                <input type=radio name="pay" id="CreditCard" checked class="radio" onclick="creditCard()">
                <label for="CreditCard"><span><i class="far fa-credit-card"></i> Credit Card</span></label>
                <input type=radio name="pay" id="Cash"  class="radio" onclick="cash()">
                <label for="Cash"><span><i class="far fa-money-bill-alt"></i> Cash</span></label>
            </div>
        </div>

<form method="POST">
        <section id="1">
            <br>

            <div class="input-group" id="cardNumber">
                <div class="input-box">
                    <input type=tel placeholder="Card Number" maxlength="16" id="card_num" required class="name" size="25">
                    <i class="fa fa-credit-card icon"></i>
                </div>
            </div>


            <div class="input-group" id="cardHolder">
                <div class="input-box">
                    <input type=tel placeholder="Card Holder" id="card_hol" required class="name" size="25">
                    <i class="fa fa-user icon"></i>
                </div>
            </div>

            <div class="input-group" id="cardCVV" >
                <div class="input-box" style="margin-right= 0px; padding-right:0px;">
                    <input type=tel placeholder="CVV" maxlength="3" id="cvv" required class="name" size="25">
                    <i class="fas fa-lock icon"></i>
                </div>
                <div class="input-box" >

                    <select name="YYY">
                        <option> MM</option>
                        <option> 01</option>
                        <option> 02</option>
                        <option> 03</option>
                        <option> 04</option>
                        <option> 05</option>
                        <option> 06</option>
                        <option> 07</option>
                        <option> 08</option>
                        <option> 09</option>
                        <option> 10</option>
                        <option> 11</option>
                        <option> 12</option>
                    </select>
                    <select>
                        <option> YYYY</option>
                        <option> 2021</option>
                        <option> 2022</option>
                        <option> 2023</option>
                        <option> 2024</option>
                        <option> 2025</option>

                    </select>
                </div>
            </div>

            <div class="input-group">
                <div class="input-box">
                    <button type="submit" name="<?php if(isset($_GET['pid'])){ echo 'quick'; } else {echo "pay_now"; } ?>" id="pay_now" onclick="PaymentConfirm()">Pay Now</button>

                </div>
            </div>

        </section>
        </form>
    </div>

    </div>
        <!-- end of the content -->
        <div id="footer"></div>

        <script>
 function cash(){
document.getElementById("cardNumber").style.visibility="hidden";
document.getElementById("card_num").required=false;
document.getElementById("card_hol").required=false;
document.getElementById("cvv").required=false;
document.getElementById("cardHolder").style.visibility="hidden";
document.getElementById("cardCVV").style.visibility="hidden";
document.getElementById("pay_now").innerHTML="Order now";
//document.getElementById("pay_now").value="Order now";

 }
 function creditCard(){
	 document.getElementById("card_num").required=true;
document.getElementById("card_hol").required=true;
document.getElementById("cvv").required=true;
    document.getElementById("cardNumber").style.visibility="visible";
document.getElementById("cardHolder").style.visibility="visible";
document.getElementById("cardCVV").style.visibility="visible";
document.getElementById("pay_now").innerHTML="Pay Now";
 }
function PaymentConfirm(){
    if(document.getElementById("CreditCard").checked){
        return confirm("Successful Payment");
    }else{
        return confirm("Your Order has been confirmed");

    }
}
       </script>
</body>

</html>