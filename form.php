<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>Please fill the Registration Form</h1>
    <form  id="submit_form" >
        <input type="text " name="name" id="name">
        <input type="password" name="password" id="password">
        <input type="submit" name="submit" id="submit" value="submit">
        <input type="submit" name="update" id="update" value="update">
    </form>
    <div id="response"></div>

    <div id="load-table">

    </div>
    <button id="load-btn" data-id=""></button>
    <script>
    $(document).ready(function(){ 
        function loadTable(page){
            $.ajax({
                  url:'load-table.php',
                  type:'POST',
                  data:{page_no:page},
                  success:function(data){
                   $('#response').html(data);
                  }
              });
        }
        loadTable();
        // load More button
        $(document).on("click","#ajax-btn",function(){
            var pid=$(this).data("id");
            console.log(pid);
            loadTable(pid);
        });
        //pagination code
        /*$(document).on("click","#pagination a",function(e){
              e.preventDefault();
              var page_id=$(this).attr("id");
              loadTable(page_id);
        })
        */
        // inserting data into database
        $('#submit').click(function(){
          var name= $('#name').val();
          console.log(name);
          var password= $('#password').val();
          if(name==""||password==""){  
            alert('All field are required');
          }else{
              $.ajax({
                  url:'save.php',
                  type:'POST',
                  data:$('#submit_form').serialize(),
                  success:function(data){
                   $('#response').html(data);
                   loadTable();
                  }
              })
          }
        });  
        //deleting single row from database table
        $(document).on("click",".delete-btn",function(){
             var u_id=$(this).data("id");
             alert(u_id);
             var element=this;
             $.ajax({
                 url: "delete.php",
                 type: "POSt",
                 data:{id:u_id},
                 success:function(data){
                       console.log("adarsh");
                       if(data==1){
                            //$(element).closest("tr").fadeOut();
                            loadTable();
                       }else{
                           console.log("fail");
                       }
                 }
             });
             
         });    
    });
    </script>
</body>
</html>