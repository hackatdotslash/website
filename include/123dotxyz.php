<?php
require_once("config.php");
        $db_handle = new DBController();
        $query = "SELECT * FROM registrationNew;";
        $total_team = $db_handle->numRows($query);
        echo ""+$total_team;
?>