<?php session_start();
include('includes/connectDB.php');
function sweet_alert($msg)
{
    echo "<script>swal('".$msg."')</script>";
}
$status="";
if(isset($_POST['Cart'])) {
    if(isset($_POST['special'])) {
       
        $PID = rand(70,100);
        // die();
        $price =$_POST['price'] ;
        $pic = $_POST['pic'];
        $cartArray = array(
            array(
            'PName'=>$PName,
            'PID'=>$PID,
            'price'=>$price,
            'quantity'=>$_POST['quantity'],
            'pic'=>$pic)
        );
        if(empty($_SESSION["shopping_cart"])) {
            $_SESSION["shopping_cart"] = $cartArray;
            // $status = "<div class='box'>Product is added to your cart!</div>";
            
        }
        else{
            $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
          
        }
    } elseif (isset($_POST['PID']) && $_POST['PID']!=""){
        $PID = $_POST['PID'];
        $checkcodeQ="Select PID, PName, price , quantity, pic FROM product WHERE PID='$PID'";
        $result = mysqli_query($DB,$checkcodeQ);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_array($result);
            $PName = $row['PName'];
            $PID = $row['PID'];
            $price = $row['price'];
            $pic = $row['pic'];
            $totalquantity=intval($row['quantity']);
            $_POST['sentQuantity'] = intval($_POST['sentQuantity']);
            $cartArray = array(
                array(
                'PName'=>$PName,
                'PID'=>$PID,
                'price'=>$price,
                'quantity'=>$_POST['sentQuantity'],
                'pic'=>$pic)
            );
            if($_POST['sentQuantity']>$totalquantity){
                // $status='Not enuogh stock available, try less';
                sweet_alert("Not enuogh stock available, try less");
            }else{
                if(empty($_SESSION["shopping_cart"])) {
                    $_SESSION["shopping_cart"] = $cartArray;
                    // $status = "<div class='box'>Product is added to your cart!</div>";
                    sweet_alert("Product is added to your cart!");
                }else{
                    $count_r = 0;
                    $array_count = count($_SESSION["shopping_cart"]);
                    for ($i=0;$i<$array_count;$i++) {
                        if($_SESSION["shopping_cart"][$i]['PID'] == $PID){
                            $newQTY = $_POST['sentQuantity']+$_SESSION["shopping_cart"][$i]['quantity'];
                            if($newQTY > $totalquantity) {
                                sweet_alert("Not enuogh stock available, try less");
                            } else {
                                $_SESSION["shopping_cart"][$i]['quantity'] = $newQTY;
                            }
                            $count_r = 1;
                        }
                    }
                    if ($count_r == 0) {
                        $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
                        sweet_alert("Product is added to your cart!");
                    } 
                }
            }
        } else{
            sweet_alert("Product Not Found!");
        }
    }
    // print_r($_SESSION["shopping_cart"]);
}
?>
