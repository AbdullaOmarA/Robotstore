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
    if(isset($_COOKIE['cartItem'])) {
        $cart = json_decode($_COOKIE['cartItem']);
        $total = 0;
        for ($i=0; $i <count($cart) ; $i++) { 
            $QTY = $cart[$i]->QTY;
            $product = get_product_info($cart[$i]->PID);
            $total = $total + ($QTY * $product['price']);
        }
        return $total;
    }
}

function get_total_items()
{
    if(isset($_COOKIE['cartItem'])) {
        $cart = json_decode($_COOKIE['cartItem']);
        $total = 0;
        for ($i=0; $i <count($cart) ; $i++) { 
            $QTY = $cart[$i]->QTY;
            $total = $total + $QTY;
        }
        return $total;
    }
}



if(isset($_POST['check_out'])) {
    $total_bill = get_total_bil();
    $total_items = get_total_items();
 if(isset($_COOKIE['Customer_Order'])) {
    //  echo "sd";
    //  echo $_COOKIE['Customer_Order'];
    $cart_json = json_decode($_COOKIE['Customer_Order']);
    $count = count($cart_json);
    $new_order = '{"TOTAL":'.$total_bill.',"Items":'.$total_items.'}';
    $new_order = json_decode($new_order);
    array_push($cart_json,$new_order);
    setcookie(
        "Customer_Order",
        json_encode($cart_json),
        time() + (10 * 365 * 24 * 60 * 60)
      );

      setcookie('cartItem', '', time()-3600);

    //   echo $_COOKIE['Customer_Order'];


} else {
    // $PID = 2;
    $cart_item = "[";
    $cart_item .= '{"TOTAL":'.$total_bill.',"Items":'.$total_items.'},';
    $cart_item = substr($cart_item, 0, -1);
    $cart_item .= "]";
    setcookie(
        "Customer_Order",
        $cart_item,
        time() + (10 * 365 * 24 * 60 * 60)
      );
      setcookie('cartItem', '', time()-3600);
    //   echo $_COOKIE['Customer_Order'];
}


// die();
// header("location: Cart.php");
}

header("Location: orders.php");

?>