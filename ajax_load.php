<?php

$conn =mysqli_connect("localhost", "root","","test");

if(!$conn){
    echo "fail";
}
else{
    echo "success";
    $sql="select * from users";
    $result=mysqli_query($conn,$sql);
    $output="";
    if(mysqli_num_rows($result)>0){
        $output='<table>
           <tr>
             <th>Id</th>
             <th>Name</th>
           <tr>';

           while($row=mysqli_fetch_assoc($result)){
               $output.="<tr>
                <td>{$row['user_id']}</td>
                <td>{$row['name']}</td>
               
               </tr>";
           }
        
           $output.="</table>";
        
        mysqli_close($conn);
        echo $output;
        
    }
    else{
        echo "fail";
    }
}
//

?>