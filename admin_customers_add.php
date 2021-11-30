<?php
    require_once('config.php');
    require_once('session_admin.php');
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
                $message =  'User registered ';
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="user.css">
    <title>Customer Admin Dashboard</title>
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!--- Sidebar starts here ----->

        <div class="bg-white" id="wrapper">
        
            <div class="sidebar-heading text-center py-4 primary-feet fs-4 fw-bold text-uppercase border-bottom">
                <i class="fa fa-medkit" aria-hidden="true"></i> Pharmacy
            </div>   
           

            <div class="list-grpup list-group-flush#y-3">
            <a href="admin_customers.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa fa-cogs" aria-hidden="true"></i>customer
                </a>
            <a href="admin_stores.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa fa-cogs" aria-hidden="true"></i>Store
                </a>
            
            <a href="admin_managers.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa fa-cogs" aria-hidden="true"></i>Manager
                </a>
            <a href="logout.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa fa-sign-out" aria-hidden="true"></i>logout
            </a>
                     
            </div>

        </div>

        <!------ sidebar ends here ----->

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 n-0">Admin</h2>
            </div>
            </nav>
            <br class="mb-3">
            <form action="admin_customers_add.php" method="post" oninput='password2.setCustomValidity(password2.value != password.value ? "Passwords do not match." : "")'>
                <div class="container">
                        <div class="row">
                            <h1>Add Customer</h1>
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
                                <input class="btn btn-primary"type="submit" name="signup" value="Add Customer">
                                <br class="mb-3">                                
                            </div>
                        </div>
                </div>  
            </form>
        </div>
            
            </div>
            
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous"></script>


</body>
</html>
