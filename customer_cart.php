<?php
    require_once('config.php');
    require_once('session_customer.php');
?>

<?php
    $query = "SELECT customerid FROM customer WHERE email = :email";  
    $statement = $db_conn->prepare($query);  
    $statement->execute(  
                array(  
                    'email'     =>     $_SESSION['email']
                )  
            );
    $result = $statement->fetch();
    //echo $result['customerid'];
    
    if(isset($_POST['delete'])){
        //echo "Update button pressed";
        $count_delete=$_POST['todelete'];
        unset($_SESSION['pid'][$count_delete]);
        unset($_SESSION['storeid'][$count_delete]);
        unset($_SESSION['unitprice'][$count_delete]);
        unset($_SESSION['qunatity'][$count_delete]);
        //Update Database
    }

    if(isset($_POST['checkoutcart'])){
        $count = $_SESSION['count']-1;
        while($count>=0){
            $sql_statement = "INSERT INTO orderhistory (customerid,pid,unitprice,quantity,orderdate) VALUES(?,?,?,?,?)";
            $insert = $db_conn->prepare($sql_statement);
            $date = date("Y-m-d");
            $out = $insert->execute([$result['customerid'],$_SESSION['pid'][$count],$_SESSION['unitprice'][$count],$_SESSION['quantity'][$count],$date]);
            $count = $count -1;
        }
        $_SESSION['count'] = 0;
        
        header("location:welcome_customer.php");
        
    }
    if(isset($_POST['delete'])){
        $count = $_SESSION['count-1']-1;
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
    <title>Customer Dashboard</title>
    
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!--- Sidebar starts here ----->

        <div class="bg-white" id="wrapper">
        
            <div class="sidebar-heading text-center py-4 primary-feet fs-4 fw-bold text-uppercase border-bottom">
                <i class="fa fa-medkit" aria-hidden="true"></i> Pharmacy
            </div>   
    
            <div class="list-grpup list-group-flush#y-3">
            
            <a href="welcome_customer.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                   <i class="fa fa-users" aria-hidden="true"></i>Home
            </a>
            <a href="customer_orderhistory.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
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

        <div id="page-content-wrapper">
        <h1 style="text-align:center;">Cart</h1>
            <table id="editableTable" class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>pid</th>
                        <th>storeid</th>
                        <th>unitprice</th>
                        <th>quantity</th>
                        <th>remove</th>
                													
                    </tr>
                </thead>
                <tbody>
                    <?php $count = $_SESSION['count']-1?>
                    
                    <?php while( $count >= 0) { ?>
                    <tr>
                    <td><?php echo $_SESSION['pid'][$count]; ?></td>
                    <td><?php echo $_SESSION['storeid'][$count]; ?></td>
                    <td><?php echo $_SESSION['unitprice'][$count]; ?></td>
                    <td><?php echo $_SESSION['quantity'][$count]; ?></td>
                    <form action="customer_cart.php" method="post">
                    <input type="hidden" value="<?php echo $count;?>" name="todelete" />
                    <td> <input class="btn btn-primary" type="submit" name="delete" value="Delete"></td>
                    </form>
                    
                    <?php $count = $count -1 ;?>
   				   				   				  
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="text-center">
                    <form action="customer_cart.php" method="post">
                    <input class="btn btn-primary" type="submit" name="checkoutcart" value="Check Out Cart">
                    </form>
            </div>
            
        </div>
            
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous"></script>


</body>
</html>