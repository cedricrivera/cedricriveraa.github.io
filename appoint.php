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
    $status = "PENDING";
    $cnum = $_POST['cnum'];
    $email = $_SESSION['Email'];
    $symptoms = $_POST['symptoms'];
    $accidentdate = $_POST['accident-d'];

    $query_run = $conn->prepare("INSERT INTO Appointment (fname, lname, mname, reason, Status, cnum, email, symptoms, Accident_date) VALUES (?,?,?,?,?,?,?,?,?)");
    $query_run->execute([$fname, $lname, $mname, $reasons, $status, $cnum, $email, $symptoms, $accidentdate]);
    
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