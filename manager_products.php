<?php
    require_once('config.php');
    session_start();
?>
<?php
    $email = $_SESSION['email'];
    $sqlQuery = "SELECT productname,description,type,unitprice,quantity,storename FROM available INNER JOIN product ON product.pid = available.pid INNER JOIN store ON available.storeid = store.storeid INNER JOIN staff ON staff.staffid = store.staffid where staff.email = :email ";
    $statement = $db_conn->prepare($sqlQuery);
    $statement->execute(
        array(  
        'email'     =>     $email  
    )  );
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
    <title>Manager Dashboard</title>
    
</head>

<body>
    <div class="d-flex" id="wrapper">

        <!--- Sidebar starts here ----->

        <div class="bg-white" id="wrapper">

        <div class="bg-white" id="wrapper">
        
        <div class="sidebar-heading text-center py-4 primary-feet fs-4 fw-bold text-uppercase border-bottom">
            <i class="fa fa-medkit" aria-hidden="true"></i> Pharmacy
        </div>   

        <div class="list-grpup list-group-flush#y-3">
        <a href="manager_products.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fa fa-cogs" aria-hidden="true"></i>Product
        </a>
        <a href="logout.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fa fa-sign-out" aria-hidden="true"></i>logout
        </a>
                 
        </div>

    </div>

        </div>

        <!------ sidebar ends here ----->

        
        <div id="page-content-wrapper">
            <br class="mb-3">
            <div class="text-center">
                <a href="manager_products_add.php" class="btn btn-primary btn-lg">Add Producer</a>
            </div>
            <br class="mb-3">
            <table id="editableTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Store Name</th>
                        <th>UnitPrice</th>
                        <th>Quantity</th>													
                    </tr>
                </thead>
                <tbody>
                    <?php while( $user = $statement->fetch() ) { ?>
                    <tr>
                    <td><?php echo $user['productname']; ?></td>
                    <td><?php echo $user['description']; ?></td>
                    <td><?php echo $user['type']; ?></td>
                    <td><?php echo $user['storename']; ?></td>
                    <td><?php echo $user['unitprice']; ?></td>
                    <td><?php echo $user['quantity']; ?></td>
                    <td><a href="manager_products_update.php?id=<?php echo $user['productid'];?>">edit/delete</a></td> 				   				   				  
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>


        </div>
            
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous"></script>


</body>
</html>