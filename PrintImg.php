<?php 
$printimg="";
$successimg=false;
require ('includes/connectDB.php'); 
  
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $allquery= "SELECT * FROM product WHERE pic='".$_Post["pic"]."'";
  $result=mysqli_query($DB, $allquery) ;
  if(mysqli_num_rows($result)!=0){
      if($value==$resultArray['pic']){ 
      $successimg=true;
      $printimg='<div style="'.'"background-image:url(images/Special/"'.$resultArray['pic'].'");
        margin-left: 75%;
        top: 25%;
        z-index: 2;>
      </div>';   
    }}
    else{
      echo 'No result';
    }
  }
  mysqli_close($DB);
   
?>