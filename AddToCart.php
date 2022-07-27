<?php 
//add this piece of code in top of PHP file 
//usually the 'display_errors' directive is turn off by default
//1 is for ON and 0 is for OFF
session_start();
ini_set('display_errors', 1);  
//setting display_startup_errors to ON using 1
ini_set('display_startup_errors', 1);
//error_reporting function with parameter E_ALL
error_reporting(E_ALL);
?>
<?php
include('includes/connectDB.php');   
//Check form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    
    if(isset($_POST['Cart'])){
        // $name=$_SESSION['name'];  
        // $email=trim($_SESSION['email']); 
        // $password=trim($_SESSION['password']);
        // $phonenumber=trim($_SESSION['PhoneNo']);
        // $city=$_SESSION['city'];
        // $address=trim($_SESSION['address']);
        if (isset($_SESSION['ShoppingCart'])) {

        } else {
            $cart_array = array();
        }
    }    
}
?>