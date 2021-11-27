<?php
    require_once('config.php');
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
               <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active">
                  <i class="fa fa-snowflake-o" aria-hidden="true"></i>Admin
               </a>
               <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
               <i class="fa fa-home" aria-hidden="true"></i>Home
            </a>
               <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                   <i class="fa fa-users" aria-hidden="true"></i>Add Customer
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                   <i class="fas fa-project-diagram me-2"></i>Update Customer
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                   <i class="fas fa-project-diagram me-2"></i>Delete customer
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>Add store
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                   <i class="fas fa-project-diagram me-2"></i>Delete Store
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                   <i class="fas fa-project-diagram me-2"></i>Update Store
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                  <i class="fa fa-eye" aria-hidden="true"></i>view
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa fa-sign-out" aria-hidden="true"></i>logout
            </a>
                     
            </div>

        </div>
          <!------ sidebar ends here ----->

          <div id="page-content-wrapper">

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
<div class="d-flex align-items-center">
    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
    <h2 class="fs-2 n-0">Add Store</h2>
</div>
</nav>
<div class="container-field px-4">
<title>Add Store</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>

<div>
<?php
    $message = " ";
    if(isset($_POST['addstore'])){
        
    }
?>
</div>

<div>
<form action="Admin_addstore.php" method="post">
    <div class="container">
        <div class="row">
            <h1>Add Store</h1>
            <br class="mb-3">
            <div class="col-sm-3">
                <br class="mb-3">
                <label for="Storename"><b>Storename</b></label>
                <input class="form-control" type="text" name="Storename" required>
                <br class="mb-3">
                <label for="Region"><b>Region</b></label>
                <input class="form-control" type="text" name="region" required>
                <br class="mb-3">
                <label for="Manager"><b>Manager</b></label>
                <input class="form-control" type="text" name="manager" required>
                <br class="mb-3">
                <label for="phonenumber"><b>Phone number</b></label>
                <input class="form-control" type="tel" name="phonenumber" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                <br class="mb-3">
                <div style = "font-size:20px; color:#cc0000; margin-top:2px"><?php echo $message; ?></div>
                <br class="mb-3">
                <input class="btn btn-primary"type="submit" name="addstore" value="AddStore">
            </div>
        </div>
    </div>  
</form>

</div>






</div>




</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
></script>


</body>
</html>