<?php 
$user_id=$_POST["id"];
$conn =mysqli_connect("localhost", "root","","test");
$q="delete from login where id={$user_id}";
$r=mysqli_query($conn,$q);

if($r==True){
    echo 1;
}
else{
    echo 2;
}
?>