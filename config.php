<?php

    $db_dsn = "mysql:host=localhost;dbname=online_phramacy_mod";
    $db_user = "root";
    $db_pass = "";

    $db_conn = new PDO($db_dsn,$db_user, $db_pass);
    $db_conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>