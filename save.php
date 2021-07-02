<?php
$conn =mysqli_connect("localhost", "root","","test");
$name=$_POST['name'];
$password=$_POST['password'];

   $sql="insert into login(user_name, password) values('$name','{$password}')";
   $result=mysqli_query($conn, $sql); 
   if($result==TRUE){
       echo "hello world";
   } else{
       echo "fail";
   }
?>
