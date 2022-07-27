


<?php 
//add this piece of code in top of PHP file 
//usually the 'display_errors' directive is turn off by default
//1 is for ON and 0 is for OFF
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
    
    
if(isset($_POST['submit'])){
    $name=$_POST['name'];  
    $email=trim($_POST['email']); 
    $password=trim($_POST['password']);
    $phonenumber=trim($_POST['PhoneNo']);
    $city=$_POST['city'];
    $address=trim($_POST['address']);


    
    $duplicateEmail=false;
    $emailExist=false;
    $duplicateEmail="";

    $checkexistemail="Select emailAddress from customer where emailAddress='" .$_POST["email"]."'";
    $result2= mysqli_query($DB,$checkexistemail);
 
    if (!($result2))
         {
         print ("<p> Query couldn't be executed </p>");
         echo mysqli_error($result2);
         }
     if (mysqli_num_rows($result2)>0){
         $emailExist=true;
        $duplicateEmail="This email address already exist, please try another one";
         }
    else{
        $insertSuccess=false;
          //insert query
 $query="INSERT INTO `customer`(`password`, `phoneNumber`, `name`, `city`, `address`,`emailAddress`)VALUES('$password','$phonenumber','$name','$city','$address','$email')";
        
        
        $insertResult=mysqli_query($DB,$query);
        if($insertResult){
            $insertSuccess=true;
        }
        else{
            echo mysqli_error($insertResult);
        }
         
          
         }
    }

         
          
}
else{
        echo mysqli_error($DB);   
        $duplicateEmail="";
}

    mysqli_close($DB);
?>