<?php
$conn =mysqli_connect("localhost", "root","","test");
$name=$_POST['name'];
$password=$_POST['password'];

   $sql="update  login set user_name=$name where password=$password";
   $result=mysqli_query($conn, $sql); 
   if($result==TRUE){
       echo "hello world";
   } else{
       echo "fail";
   }
?>