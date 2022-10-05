
<?php

session_start();

include './classes/user.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Welcome we have successfully redirected the page from login to here....";

if (isset($_POST['loginBtn'])) {

    //create user
    $_SESSION['user'] = new User (
        rand(1000,9000),
        $_POST['firstname'],
        $_POST['surname'],
        $_POST['email'],
    );

}

?>

<?php print_r($_POST); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/styles.css">


    <title>Compare Hotels</title>
</head>
<body>

 <h4> Welcome <?php echo $_POST["firstname"]; ?> ! </h4> 

</body>

</html>