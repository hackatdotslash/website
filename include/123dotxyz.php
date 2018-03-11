<?php
require_once("config.php");
        $db_handle = new DBController();
        $query = "SELECT * FROM registrationNew;";
        $query1 = "SELECT * FROM registration;";
        $total_team = $db_handle->numRows($query);
        $total_team1 = $db_handle->numRows($query1);
        echo ""+$total_team1+" "+$total_team;
?>
