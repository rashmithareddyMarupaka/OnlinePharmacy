<?php
    require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Registration</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>

<div>
    <?php
        if(isset($_POST['signup'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email  = $_POST['email']; 
            $phonenumber = $_POST['phonenumber'];
            $password = md5($_POST['password']);
            $address = $_POST['address'];
            $dob = $_POST['dob'];
            
            $sql_statement = "INSERT INTO customer (firstname, lastname, email, phonenumber,password,address,dob) VALUES(?,?,?,?,?,?,?)";
            $insert = $db_conn->prepare($sql_statement);
            $out = $insert->execute([$firstname,$lastname,$email,$phonenumber,$password,$address,$dob]);
            if($out){
                echo 'Successfull';
            }
            else{
                echo 'Verify and try again';
            }
        }
    ?>
</div>

<div>
    <form action="register.php" method="post">
        <div class="container">

            <div class="row">
                <h1>Customer Registration</h1>
                <br class="mb-3">
                <div class="col-sm-3">
                    <br class="mb-3">
                    <label for="firstname"><b>First Name</b></label>
                    <input class="form-control" type="text" name="firstname" required>
                    <br class="mb-3">
                    <label for="lastname"><b>Last Name</b></label>
                    <input class="form-control" type="text" name="lastname" required>
                    <br class="mb-3">
                    <label for="email"><b>Email Address</b></label>
                    <input class="form-control" type="email" name="email" required>
                    <br class="mb-3">
                    <label for="phonenumber"><b>Phone number</b></label>
                    <input class="form-control" type="tel" name="phonenumber" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                    <br class="mb-3">
                    <label for="address"><b>Address</b></label>
                    <input class="form-control" type="text" name="address" required>
                    <br class="mb-3">
                    <label for="dob"><b>Date Of Birth</b></label>
                    <input class="form-control" type="date" name="dob" required>
                    <br class="mb-3">
                    <label for="password"><b>Password</b></label>
                    <input class="form-control" type="password" name="password" required>
                    <br class="mb-3">
                    <br class="mb-3">
                    <input class="btn btn-primary"type="submit" name="signup" value="Sign Up">
                </div>
            </div>
        </div>  
    </form>

</div>

</body>

</html>