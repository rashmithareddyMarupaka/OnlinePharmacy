<?php
   include('config.php');
   session_start();
   if($_SESSION['user']!='manager'){
        header("location:logout.php");
      die();
   }
?>