<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- REATING HTML USER REGISTRATION FORM Start Here -->
    <div class="test-form">
        <div class="container">
           
                <fieldset>
                    <legend>Enter your information in the form below</legend>
                    <label for="name"> Name:
                        <input type="text" name="name" id="name" placeholder="Enter Name">
                    </label><br>
                    <label for="email">Email:
                        <input type="email" name="email" id="email" placeholder="Enter Emaail">
                    </label><br>
                    <label for="gender">Gender</label>
                    <input type="radio" name="gender" value="M" required="required">Male
                    <input type="radio" name="gender" value="FM" required="required">Female<br>
                    <label for="message">
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Tell me something about yourself"></textarea>
                    </label>
                    <input type="submit" id="submit-button" value="submit" name="submit" class="btn">

                    
                </fieldset>
         
        </div>
    </div>
     <?php if(isset($msg)) echo $msg ?>

    <!--CREATING HTML USER REGISTRATION FORM ENd Here -->
    <table style="width:100%">
        <tr align="center">
            <td id="table-load">
                <input type="button" id="load-button" value="Load Data">
            </td>
        </tr>
        <tr>
            <td id="table-data">
                
            </td>
        </tr>
    </table>
    <script src="js/jquery.js"></script>
    <script>
      $(document).ready(function(){
          $("#load-button").on("click", function(e){

            $.ajax({
                url :"ajax_load.php",
                type:"POST",
                success: function(data){
                    $("#table-data").html(data)
                }
            });
          });
      });
    </script>
</body>

</html>