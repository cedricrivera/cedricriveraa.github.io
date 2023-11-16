<?php 
    if(isset($_GET['delid'])){
        include '../connection/connection.php';
        $id = $_GET['delid'];

        $query = "DELETE FROM Appointment
        WHERE AppointID = $id";
        $res = $conn->prepare($query);
        $res->execute();

        if($res){
           echo"<script>window.location.href='../appointment.php?delete=Deleted Succefully'</script>"; 
        }       
    }
?>
