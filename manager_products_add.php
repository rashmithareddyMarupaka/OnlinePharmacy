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
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 n-0">Manager</h2>
            </div>
            </nav>
            <br class="mb-3">
            <form action="admin_stores_add.php" method="post">
                <div class="container">
                        <div class="row">
                            <h1>Add Product</h1>
                            <br class="mb-3">
                            <div class="col-sm-3">
                                <label for="productname"><b>Product Name</b></label>
                                <input class="form-control" type="text" name="productname" required>
                                <br class="mb-3">
                                <label for="type"><b>Type</b></label>
                                <input class="form-control" type="text" name="type" required>
                                <br class="mb-3">
                                <label for="description"><b>Description</b></label>
                                <input class="form-control" type="text" name="description" required>
                                <br class="mb-3">
                                <label for="unitprice"><b>Store Name</b></label>
                                <input class="form-control" type="tel" name="unitprice" required>
                                <br class="mb-3">
                                <label for="quantity"><b>Quantity</b></label>
                                <input class="form-control" type="tel" name="quantity" required>
                                <br class="mb-3">
                                <label for="unitprice"><b>Unit Price</b></label>
                                <input class="form-control" type="tel" name="unitprice" required>
                                <br class="mb-3">
                                <br class="mb-3">
                                <br class="mb-3">
                                <div style = "font-size:20px; color:#cc0000; margin-top:2px"><?php echo $message; ?></div>
                                <br class="mb-3">
                                <input class="btn btn-primary"type="submit" name="signup" value="Add Product">
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