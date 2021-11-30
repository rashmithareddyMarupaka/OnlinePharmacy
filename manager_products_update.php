<?php
    require_once('config.php');
    require_once('session_manager.php');
?>

<?php
    $pid= $_GET['id'];
    $storeid= $_GET['sid'];
    $email = $_SESSION['email'];
?>

<?php
    $message = " ";
    $error = " ";
    if(isset($_POST['delete'])){  
        $sql_statement = "DELETE FROM product Where pid = :pid";
        $insert = $db_conn->prepare($sql_statement);
        $out = $insert->execute(
            array(  
                'pid'     =>  $pid
            )
        );
        if($out){
            $message =  'Deleted Succesfully';
        }
    }
?>


<?php
    if(isset($_POST['update'])){

        $unitprice = $_POST['unitprice'];
        $quantity = $_POST['quantity'];
        $type = $_POST['type'];
        $description = $_POST['description'];
        $sqlQuery = "SELECT product.pid,productname,description,type,unitprice,quantity,storename FROM available INNER JOIN product ON product.pid = available.pid INNER JOIN store ON available.storeid = store.storeid INNER JOIN staff ON staff.staffid = store.staffid where staff.email = :email and product.pid = :pid and store.storeid=:storeid";
        $statement = $db_conn->prepare($sqlQuery);
        $statement->execute(
            array(  
            'email'     =>     $email  ,
            'pid'     =>     $pid,
            'storeid' =>     $storeid
        )  );
        $count = $statement->rowCount();
        
        if($count != 1 )  
        {  
            $error = 'Product does not exist ';  
        }
        else{
            $sql_statement = "UPDATE product SET type= :type, description= :description Where pid = :pid";
            $insert = $db_conn->prepare($sql_statement);
            $out = $insert->execute(array(  
                'type'     =>     $type,
                'description'     =>     $description,
                'pid' => $pid
            ) );
            
            if($out){
                $message =  'Product updated ';
            }
            else{
                $message = 'Product update failed';
            }
            $sql_statement = "UPDATE available SET quantity= :quantity, unitprice= :unitprice Where pid = :pid AND storeid=:storeid";
            $insert = $db_conn->prepare($sql_statement);
            $out = $insert->execute(array(  
                'quantity' => $quantity,
                'unitprice' => $unitprice,
                'pid'     =>     $pid,
                'storeid'     =>     $storeid,
            ));
            
            if($out){
                $message =  'Quantity updated ';
            }
            else{
                $message = 'Quantity update failed';
            }
        }

    }
?>


<?php
    
    $sqlQuery = "SELECT product.pid,productname,description,type,unitprice,quantity,storename FROM available INNER JOIN product ON product.pid = available.pid INNER JOIN store ON available.storeid = store.storeid INNER JOIN staff ON staff.staffid = store.staffid where staff.email = :email and product.pid = :pid";
    $statement = $db_conn->prepare($sqlQuery);
    $statement->execute(
        array(  
        'email'     =>     $email  ,
         'pid'     =>     $pid
    )  );
    $count = $statement->rowCount();
    
    if($count != 1 )  
    {  
        $error = 'Product does not exist';  
    }
    else{
        $user = $statement->fetch();
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
    <title>Manager Dashboard</title>
    
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!--- Sidebar starts here ----->
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

        <!------ sidebar ends here ----->

        <div id="page-content-wrapper">
            <form action="manager_products_update.php?id=<?php echo $pid ?>&sid=<?php echo $storeid ?>" method="post" >
                <div class="container">
                    <div class="row">
                        <h1>Update Product : <?php if($count == 1)echo $user['productname']; echo ' in Store ID--'; echo $storeid;?> </h1>
                        <br class="mb-3">
                        <div class="col-sm-3">
                            <br class="mb-3">
                            <label for="description"><b>Description</b></label>
                            <input class="form-control" type="text" value="<?php if($count == 1)echo $user['description'];?>" name="description" required>
                            <br class="mb-3">
                            <label for="type"><b>Type</b></label>
                            <input class="form-control" type="text" name="type" value="<?php if($count == 1)echo $user['type'];?>"  required>
                            <br class="mb-3">
                            <label for="email"><b>Unit Price</b></label>
                            <input class="form-control" type="number" min="0.00" max="10000.00" step="0.01"name="unitprice" value="<?php if($count == 1)echo $user['unitprice'];?>" required>
                            <br class="mb-3">
                            <br class="mb-3">
                            <label for="Quantity"><b>Qunatity</b></label>
                            <input class="form-control" type="number" id="quantity" name="quantity" min="0" max="100000" value="<?php if($count == 1)echo $user['quantity'];?>" required>
                            <br class="mb-3">
                            <div style = "font-size:20px; color:#cc0000; margin-top:2px"><?php echo $message; echo $error ?></div>
                            <br class="mb-3">
                            <input class="btn btn-primary"type="submit" name="update" value="Update">
                            <input class="btn btn-primary"type="submit" name="delete" value="Delete from All stores">
                            <br class="mb-3">
                        </div>
                    </div>
                </div> 
            </form>
        </div>
            
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous"></script>


</body>
</html>