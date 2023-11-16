<?php 
    if(isset($_GET['appid'])){
        include '../connection/connection.php';
        $id = $_GET['appid'];
        $remarks = $_POST['remarks'];
        $status = $_POST['status'];

        $query = "UPDATE Appointment
        SET remarks = '$remarks', status = '$status'
        WHERE AppointID = $id";
        $res = $conn->prepare($query);
        $res->execute();

        if($res){
           echo"<script>window.location.href='../appointment.php?update=Updated Succefully'</script>"; 
        }       
    }
?>
