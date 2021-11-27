<?php
    require_once('config.php');
?>

<?php
    $message =" ";
    if(isset($_POST['signup'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email  = $_POST['email']; 
        $phonenumber = $_POST['phonenumber'];
        $password = md5($_POST['password']);
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        
        $query = "SELECT * FROM customer WHERE email = :email ";  
        $statement = $db_conn->prepare($query);  
        $statement->execute(  
                    array(  
                        'email'     =>     $email
                    )  
                );  
        $count = $statement->rowCount();  
        if($count == 0)  
        {  
            $sql_statement = "INSERT INTO customer (firstname, lastname, email, phonenumber,password,address,dob) VALUES(?,?,?,?,?,?,?)";
            $insert = $db_conn->prepare($sql_statement);
            $out = $insert->execute([$firstname,$lastname,$email,$phonenumber,$password,$address,$dob]);
            if($out){
                $message =  'Registration successful and please login ';
            }
            else{
                $message = 'Username already taken or try again';
            }
        }  
        else  
        {  
                $message = 'Username already taken or try again';
        }



        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Registration</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>

<div>
    <form action="register.php" method="post" oninput='password2.setCustomValidity(password2.value != password.value ? "Passwords do not match." : "")'>
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
                    <input class="form-control" type="date" name="dob" value="1998-07-22" min="1940-01-01" max="2010-12-31" required>
                    <br class="mb-3">
                    <label for="password"><b>Password</b></label>
                    <input class="form-control" type="password" name="password" minlength="8" required>
                    <br class="mb-3">
                    <label for="password"><b>Renter Password</b></label>
                    <input class="form-control" type="password" name="password2" minlength="8" required>
                    <br class="mb-3">
                    <br class="mb-3">
                    <div style = "font-size:20px; color:#cc0000; margin-top:2px"><?php echo $message; ?></div>
                    <br class="mb-3">
                    <input class="btn btn-primary"type="submit" name="signup" value="Sign Up">
                    <br class="mb-3">
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a href="index.php" style="color: #393f81;">Login here</a></p>
                    
                </div>
            </div>
        </div>  
    </form>

</div>

</body>

</html>