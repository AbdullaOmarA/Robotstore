<?php

$ConfirmMessage=$PID_error=$PName_error=$price_error=$quantity_error="";
$ROW=array("PID"=>"","PName"=>"","price"=>"","quantity"=>"","description"=>"");
require ('includes/connectDB.php'); 
   
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $PID=$_POST['PID'];
    $PName=$_POST['PName'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $adminID=1;
    $description=$_POST['description'];

    if(isset($_POST['add'])){
          $errors=false;
    //validate PID
    if(empty($PID)){
        $PID_error="You forgot to enter the Product ID";
        $errors=true;
    }
    //Validate name
    if(empty($PName)){
        $PName_error="You forgot to enter the product name";
        $errors=true;
    }
    elseif(ctype_alpha($PName)){
       $PName_error="Invalid product name";
        $errors=true;
    }
    //Validate price
    if(empty($price)){
        $price_error=" || You forgot to enter the price";
        $errors=true;
    }
    //Validate quantity
    if(empty($quantity)){
        $quantity_error="You forgot to enter the quantity";
        $errors=true;
    }
    if(!$errors){
        $addquery= "INSERT INTO `product` (`PID`, `PName`,  `price`, `quantity`, `adminID`, `description`) VALUES ('$PID', '$PName', '$price', '$quantity', '$adminID', '$description')";
        if (mysqli_query($DB, $addquery)) {
            $ConfirmMessage="Product Added Successfully";
        } else {
            $ConfirmMessage="Error Addinging the Product :". mysqli_error($DB);          
}}         
}
        elseif(isset($_POST['refresh'])){ 
        $refreshquery= "SELECT * FROM product WHERE PID='" . $_POST["PID"] . "'";
        $result=mysqli_query($DB, $refreshquery) ;
        $ROW=mysqli_fetch_array($result);
        }    

	  elseif(isset($_POST['update'])){ 
        foreach($_POST as $key => $value){
            $editquery= "UPDATE product SET $key='$value' WHERE PID='" . $_POST["PID"] . "'";
            if (mysqli_query($DB, $editquery)) {
                $ConfirmMessage="Product updated Successfully";
            } else {
                $ConfirmMessage="Error updating the Product :". mysqli_error($DB);          
            }}    
        }              
    
    elseif(isset($_POST['delete'])){
    //    $PID=$_POST['PID'];
        $deletequery=  "DELETE FROM product WHERE PID='" . $_POST["PID"] . "'";
		
        
        if (mysqli_query($DB, $deletequery)) {
            $ConfirmMessage="Product deleted Successfully";
        } else {
            $ConfirmMessage="Error deleting the Product :". mysqli_error($DB);          
}
       
    }
    
} 
mysqli_close($DB);
		

	

	
?>
