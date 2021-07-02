<?php

$conn =mysqli_connect("localhost", "root","","test");
$limit_per_page=5;
$page="";
if(isset($_POST['page_no'])){
    $page=$_POST['page_no'];
    echo $page;
}
else{
    $page=0;
}
//$offset=($page-1)*$limit_per_page;
$q="select * from login LIMIT {$page},{$limit_per_page}";//for pagination replace {$page} to {$offseta}
$r=mysqli_query($conn,$q);
if($r==TRUE){
    $output="";
    if(mysqli_num_rows($r)>0){
        $output='<table>
           <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Delete</th>
             <th>Update</th>
           <tr>';
           while($row=mysqli_fetch_assoc($r)){
               $last_id=$row['id'];
               echo $last_id;
               $output.="<tr>
                <td>{$row['id']}</td>
                <td>{$row['user_name']}</td>
                <td><button class='delete-btn' data-id='{$row['id']}'>Delete</button.</td>
                <td><button class='update-btn' data-id='{$row['id']}'>Update</button.</td>
               </tr>";
           }       
           $output.="</table>";
           /*$sql_total="select * from login";
           $records=mysqli_query($conn, $sql_total);
           $total_record=mysqli_num_rows($records);
           $total_pages=ceil($total_record/$limit_per_page);
           $output .='<div id="pagination">';
           for($i=1;$i<=$total_pages;$i++){
               $output .="<a class='active' id='{$i}' href=''>{$i}</a>";
               echo $output;
           } */
         $output .=' </div>';
         $output .="<button id='ajax-btn' data-id='{$last_id}'>Load More</button>";
         echo $output;
       
    }else{
        echo "fail";
    }
}
?>