<?php
    require_once('config.php');
    session_start();
?>

<?php
    $error = " ";
    //When login button is pressed
    if(isset($_POST['login'])){ 
        // username and password 
        $email  = $_POST['email']; 
        $password = md5($_POST['password']);
        $user = $_POST['user'];
       
        if($user == 'Customer'){

            $query = "SELECT * FROM customer WHERE email = :email AND password = :password";  
            $statement = $db_conn->prepare($query);  
            $statement->execute(  
                        array(  
                            'email'     =>     $email,  
                            'password'     =>  $password  
                        )  
                    );  
            $count = $statement->rowCount();  
            if($count > 0)  
            {  
                    $_SESSION['email'] = $email;
                    $_SESSION['user'] = $user;  
                    header("location:welcome_customer.php");  
            }  
            else  
            {  
                    $error = 'Please enter valid credentials ';  
            }

        }
        else {
            $query = "SELECT * FROM staff WHERE email = :email AND password = :password";  
            $statement = $db_conn->prepare($query);  
            $statement->execute(  
                        array(  
                            'email'     =>     $email,  
                            'password'     =>  $password  
                        )  
                    );  
            $count = $statement->rowCount();  
            if($count > 0)  
            {  
                    $_SESSION['email'] = $email;
                    $_SESSION['user'] = $user;
                    $result = $statement->fetch();
                    $staff_level = $result['stafflevel'];
                    if($staff_level == 0){
                        header("location:welcome_admin.php");
                    }
                    else{
                        header("location:welcome_manager.php");
                    }
            }  
            else  
            {  
                    $error = 'Please enter valid credentials '; 
                    //$error = $password; 
            }
        }
          
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online_Pharmacy</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
    <section class="vh-100" style="background-color: #9A616D;">
    
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img
                    src="medicine.jpeg"
                    alt="login form"
                    class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
                />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <form action= "index.php" method="post">

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <span class="h1 fw-bold mb-0">Online Pharmacy</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                            <div class="form-outline mb-4">
                                <label for="exampleFormControlSelect1">Select User</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="user" required>
                                <option>Customer</option>
                                <option>Staff</option>
                                </select>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" id="form2Example17" class="form-control form-control-lg" name="email" required />
                                <label class="form-label" for="form2Example17">Email address</label>
                            </div>
                            
                            <div class="form-outline mb-4">
                                <input type="password" id="form2Example27" class="form-control form-control-lg" name="password" required />
                                <label class="form-label" for="form2Example27">Password</label>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-dark btn-lg btn-block" type="submit" name="login">Login</button>
                            </div>

                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.php" style="color: #393f81;">Register here</a></p>
                            
                            <div style = "font-size:20px; color:#cc0000; margin-top:2px"><?php echo $error; ?></div>
                            
                            <a href="#!" class="small text-muted">Terms of use.</a>
                            <a href="#!" class="small text-muted">Privacy policy</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
    </section>

</html>