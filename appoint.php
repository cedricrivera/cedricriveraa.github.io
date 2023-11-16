<?php 
if(!isset($_SESSION)){
    session_start();
}

include('Admin/connection/connection.php');

if(isset($_POST['submit']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $reasons = $_POST['reason'];
    $date = $_POST['date-a'];
    $status = "PENDING";
    $cnum = $_POST['cnum'];
    $email = $_SESSION['Email'];

    $query_run = $conn->prepare("INSERT INTO Appointment (fname, lname, mname, reason, appointdate, Status, cnum, email) VALUES (?,?,?,?,?,?,?,?)");
    $query_run->execute([$fname, $lname, $mname, $reasons, $date, $status, $cnum, $email]);
    
    if($query_run)
    {
       echo"<script>window.location.href = 'menu.php?insertap=SuccessfullyAdded';</script>";
    }
    else
    {
        exit(0);
    }
}



?>