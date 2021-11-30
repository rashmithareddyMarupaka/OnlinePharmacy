<?php
    require_once('config.php');
    require_once('session_customer.php');
    
?>

<?php


    if(isset($_POST['addtocart'])){
        $_SESSION['count'] = $_SESSION['count'] + 1;
        $_SESSION['storeid'][] = $_POST['storeid'];
        $_SESSION['pid'][]=$_POST['pid'];
        $_SESSION['unitprice'][]=$_POST['unitprice'];
        $_SESSION['quantity'][]=$_POST['newquantity'];
        
        $sql_statement = "UPDATE available SET quantity=:quantity Where pid = :pid and storeid =:storeid";
        $insert = $db_conn->prepare($sql_statement);
        $out = $insert->execute(
            array(  
                'quantity'     =>     ($_POST['quantity']-$_POST['newquantity']),  
                'pid'     =>  $_POST['pid'],
                'storeid'     =>     $_POST['storeid']
            )
        );

    }
    $sqlQuery ="SELECT store.storeid,product.pid,productname,description,type,unitprice,quantity,storename FROM available INNER JOIN product ON product.pid = available.pid INNER JOIN store ON available.storeid = store.storeid";
    
    $statement = $db_conn->prepare($sqlQuery);  
    $statement->execute();

    if(isset($_POST['filterhl'])){
        //echo "Update button pressed";
        $sqlQuery ="SELECT productname,description,type,unitprice,quantity,storename FROM available INNER JOIN product ON product.pid = available.pid INNER JOIN store ON available.storeid = store.storeid order by unitprice desc";
    
        $statement = $db_conn->prepare($sqlQuery);  
        $statement->execute();   
    }

    if(isset($_POST['filterlh'])){
        //echo "Update button pressed";
        $sqlQuery ="SELECT productname,description,type,unitprice,quantity,storename FROM available INNER JOIN product ON product.pid = available.pid INNER JOIN store ON available.storeid = store.storeid order by unitprice asc";
    
        $statement = $db_conn->prepare($sqlQuery);  
        $statement->execute();   
    }

    if(isset($_POST['filterword'])){
        //echo "Update button pressed";
        $keyword=$_POST['Keyword'];
        $sqlQuery ="SELECT productname,description,type,unitprice,quantity,storename FROM available INNER JOIN product ON product.pid = available.pid INNER JOIN store ON available.storeid = store.storeid where product.type=:type";
    
        $statement = $db_conn->prepare($sqlQuery);  
        $statement->execute(
            array(  
                'type'     =>     $keyword
            ) 

        );   
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

        <!------ sidebar ends here ----->

        <div id="page-content-wrapper">
            <br class="mb-3">
            <div class="text-left">
                <form action="customer_products.php" method="post">
                    <input class="btn btn-primary"type="submit" name="filterhl" value="Filter High-Low">
                    <input class="btn btn-primary"type="submit" name="filterlh" value="Filter Low-High">
                </form>
                <form action="customer_products.php" method="post">
                    <input class="form-control" type="text" name="Keyword" required>

                    <input class="btn btn-primary"type="submit" name="filterword" value="Keyword">
                </form>

            
            </div>
           
            
            <br class="mb-3">
            <table id="editableTable" class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>productname</th>
                        <th>decription</th>
                        <th>type</th>
                        <th>storename</th>
                        <th>quantity</th>
                        <th>unitprice</th>
                        <th>Buy Quantity</th>
                        <th>Add to cart</th>
                													
                    </tr>
                </thead>
                <tbody>
                    <?php while( $user = $statement->fetch() ) { ?>
                    <tr>
                    
                    <td><?php echo $user['productname']; ?></td>
                    <td><?php echo $user['description']; ?></td>
                    <td><?php echo $user['type']; ?></td>
                    <td><?php echo $user['storename']; ?></td>
                    <td><?php echo $user['quantity']; ?></td>
                    <td><?php echo $user['unitprice']; ?></td>
                    <form action="customer_products.php" method="post">
                    <td>  <input class="form-control" type="number" min="1" max="<?php echo $user['quantity']; ?>" step="1" name="newquantity" required> </td>
                    <input type="hidden" value="<?php echo $user['storeid'];?>" name="storeid" />
                    <input type="hidden" value="<?php echo $user['pid'];?>" name="pid" />
                    <input type="hidden" value="<?php echo $user['unitprice'];?>" name="unitprice" />
                    <input type="hidden" value="<?php echo $user['quantity'];?>" name="quantity" />
                    <td> <input class="btn btn-primary" type="submit" name="addtocart" value="Add to cart"> </td>
                    </form>
   				   				   				  
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