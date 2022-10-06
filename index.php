<?php session_start();?>

<?php 
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

    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <script type="text/javascript" src="./js/script.js" defer> </script>  

    <title>Login Page</title>   
</head>


<body>




 <div class="container">
    <div class="loginForm">

        <form class="form1" action="welcome.php" method="post">
            <h4>Log In</h4>
            <label>Firstname:</label>
            <input type="text" name="firstname">
            <label>Surname:</label>
            <input type="text" name="surname">
            <label>Email Address:</label>
            <input type="email" name="email">

            <input type="submit" name="loginBtn" value="login">
        </form>


    </div>


 </div>

    
</body>

</html>