<?php 
    if(isset($_GET['patientid']))
    include 'connection/connection.php';

    $patientID = $_GET['patientid'];

    $query="SELECT patient_details.*, patient_records.*
            FROM patient_records
            INNER JOIN patient_details ON patient_records.patient_detID = patient_details.patient_detID
            where patient_details.patient_detID = $patientID";
    $res = $conn->prepare($query);
    $res->execute();
    $row = $res->fetch();
?>