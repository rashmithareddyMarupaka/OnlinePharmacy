<?php
   include('config.php');
   session_start();
   if($_SESSION['user']!='admin'){
      header("location:index.php");
      die();
   }
?>