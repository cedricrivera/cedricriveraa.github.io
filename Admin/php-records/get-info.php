<?php
if (isset($_GET['patientid']) && isset($_GET['recordid'])) {
    $patientid = $_GET['patientid'];
    $recordid = $_GET['recordid'];

    // Validate $patientid (e.g., check if it's a valid integer)

    // Create a prepared statement with parameter binding
    $query = "SELECT patient_details.fname, patient_details.lname, patient_details.patient_detID, patient_records.*
    FROM patient_records 
    INNER JOIN patient_details ON patient_records.patient_detID = patient_details.patient_detID
    WHERE patient_records.patient_detID = $patientid and patient_records.patientid=$recordid ;";

    $res = $conn->prepare($query);
    $res->execute();  
}
?>