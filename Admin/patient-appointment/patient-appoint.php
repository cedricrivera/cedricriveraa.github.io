<?php
    if(isset($_GET['appid'])){
        $appid=$_GET['appid'];
        include './connection/connection.php';

        $query="SELECT * FROM Appointment WHERE AppointID = $appid";
        $res = $conn->prepare($query);
        $res->execute();
    }
?>