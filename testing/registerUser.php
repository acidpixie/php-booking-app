<?php require("./classes/register.php") ?>

<?php 
if(isset($_POST['submit'])){
    $user = new User ($_POST['firstname'],$_POST['surname'],$_POST['password'],$_POST['email']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet.css">

    <title>Register Page</title>
</head>
<body>

<div class="container">

<form action="" method="post" enctype="multipart/form-data" autocomplete="off">

<h2>Register Form</h2>
<h4>All fields are <span>required</span></h4>

<label>Name:</label>
<input type="text" name="name" class="userInput">

<label>Surname:</label>
<input type="text" name="surname" class="userInput">

<label>Password:</label>
<input type="text" name="password" class="userInput">

<label>Email:</label>
<input type="email" name="email" class="userInput">

<button type="submit" name="register" class="regButton">Register</button>

<p class="error"><?php echo $_SESSION['newUser']->error() ?> </p>
<p class="success"><?php echo $_SESSION['newUser']->success()?> </p>

</div>

</form>

</body>

</html>