<?php 
//check errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?> 


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" type="text/css" href="../css/styles.css">
   <script type="text/javascript" src="./js/script.js" defer> </script>  

   <title>Login Page</title>   
</head>


<body>

<div class="container">

   <div class="imageBox">
       <img src="../public/resource/background.jpg" alt="Background" width="500" height="600" class="imgBox">
   </div>

   
<div class="infoContainer">
   <div class="infoBox">

       <h4>Quest Booking</h4>
       <p>Helping your plan your perfect Adventure</p>

       <form class="form1" action="./compare.php" method="post">
           <h4>Customer Info:</h4>
           <label>Firstname:</label>
           <input type="text" name="firstname">
           <label>Surname:</label>
           <input type="text" name="surname">
           <label>Email Address:</label>
           <input type="email" name="email">
   </div>


           <h4>Booking Info:</h4>
   <div class="dateInfo">
           <label>Check-In Date:</label>
           <input type="date" name="checkin" required>

           <label>Check-Out Date:</label>
           <input type="date" name="checkout" required>

       <div class="buttonContainer">
           <input type="submit" name="confirmInfo" value="confrim" class="confirmBtn">
       </div>
       </form>
   </div>

</div>



</div>

   
</body>

</html>