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
                <h2 class="fs-2 n-0">Dashboard</h2>
            </div>

            <button class="navbar-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsupportedcontent"
            aria-controls="navbarsupportedcontent" aria-expanded="false" aria-label="toggel navigation">
                <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsupportedcontent">
            <ul class="navbar-nav ns-auto nb-2 nb-lg-0">
                <li class="nav-item-dropdown">
                    <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" 
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-2"></i>Tito
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">profile</a></li>
                      <li><a  class="dropdown-item" href="#" >settings</a></li>
                      <li><a  class="dropdown-item" href="#" >logout</a></li>
                    </ul>
               </li>
            </ul>
        </div>
            </nav>
            </div>
            
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous"></script>


</body>
</html>