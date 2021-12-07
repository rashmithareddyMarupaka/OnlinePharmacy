<?php
    require_once('config.php');
    require_once('session_customer.php')
?>


<?php

    $sqlQuery ="SELECT customerid FROM customer where email=:email";
    $statement = $db_conn->prepare($sqlQuery);  
    $statement->execute(
        array(  
        'email'     =>     $_SESSION['email']
        )
    );
    $data = $statement->fetch();
    $sqlQuery ="SELECT customerid,orderid,pid,unitprice,quantity,orderdate FROM orderhistory where customerid=:customerid";
    $statement = $db_conn->prepare($sqlQuery);  
    $statement->execute(
        array(
        'customerid'     =>     $data['customerid']
        )
    );
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
    <title>Customer Dashboard</title>
    
</head>

<body>

    <div class="d-flex" id="wrapper">
   

        <!--- Sidebar starts here ----->

        <div class="bg-white" id="wrapper">
        
        <div class="container">


        
        
            <div class="sidebar-heading text-center py-4 primary-feet fs-4 fw-bold text-uppercase border-bottom">
                <i class="fa fa-medkit" aria-hidden="true"></i> Pharmacy
            </div>  
           
        <h1>previousorders</h1> 
            </div>
    
            <div class="list-grpup list-group-flush#y-3">
            
            <a href="welcome_customer.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                   <i class="fa fa-users" aria-hidden="true"></i>Home
            </a>
            <a href="customer_previousorders.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                   <i class="fas fa-project-diagram me-2"></i>Previous Orders
            </a>
            <a href="customer_cart.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                  <i class="fa fa-eye" aria-hidden="true"></i>Cart
            </a>
            <a href="customer_products.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                  <i class="fa fa-eye" aria-hidden="true"></i>Buy
            </a>
            <a href="logout.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa fa-sign-out" aria-hidden="true"></i>logout
            </a>
                     
            </div>

        </div>

        <!------ sidebar ends here ----->

       
            
            <br class="mb-3">
            <table id="editableTable" class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>customerid</th>
                        
                        <th>pid</th>
                        <th>unitprice</th>
                        <th>quantity</th>
                        <th>order date</th>
                        
                													
                    </tr>
                </thead>
                <tbody>
                    <?php while( $user = $statement->fetch() ) { ?>
                    <tr>
                    
                    <td><?php echo $user['customerid']; ?></td>
                    
                    <td><?php echo $user['pid']; ?></td>
                    <td><?php echo $user['unitprice']; ?></td>
                    <td><?php echo $user['quantity']; ?></td>
                    <td><?php echo $user['orderdate']; ?></td>
   				   	
   				   				   				  
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>
            
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous"></script>


</body>
</html>