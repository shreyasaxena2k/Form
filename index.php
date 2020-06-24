<?php
    $insert= false;
    if(isset($_POST['name'])){
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server,$username,$password);

    if (!$con){
        die('connection to this database failed due to'.mysquil_connect_error());
    }

    // echo'Success connecting to  db ';

    $name =$_POST['name'];
    $age =$_POST['age'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $desc =$_POST['desc'];
    $sql= "INSERT INTO `travel_form`.`travel_form` (`name`, `age`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$email', '$phone', '$desc ', current_timestamp());";
    // echo $sql;

    if($con->query($sql)==true){
        // echo 'Successfully inserted';
        $insert=true;
    }
    else{
        echo "ERROR : $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>WELCOME TO TRAVEL FORM</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert==true){
        echo '<p class="submitMsg">Thanks for submiting the form.W are happy to see you joining US</p>';
        }
       ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="number" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>

</body>
</html>