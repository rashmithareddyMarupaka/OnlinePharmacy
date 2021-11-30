<?php
   include('config.php');
   session_start();
   if($_SESSION['user']!='customer'){
      header("location:index.php");
      die();
   }
?>