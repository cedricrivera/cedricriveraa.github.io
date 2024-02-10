<?php
if (isset($_GET['updateid'])) {
    include 'connection/connection.php';
    $id = $_GET['updateid'];

    $query = "SELECT FROM patient_details WHERE patient_detID = $id";
    $res = $conn->prepare($query);
    $res->execute();
    $row = $res->fetch();
        
    if (!$res) {
        die("Error: " . $conn->error);
    }
    else{
        if (isset($_POST['edit'])) {
            $id = $_GET['updateid'];
    
            $lname = $_POST['lname'];
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $age = $_POST['age'];
            $cnum = $_POST['cnum'];
            $sex = $_POST['sex'];
            
            $query = "UPDATE patient_details
            SET lname = '$lname', fname = '$fname', mname = '$mname', address = '$address', age = $age, cnum = $cnum, Sex = '$sex', email = '$email'
            WHERE patient_detID = $id;";
            $res = $conn->prepare($query);
            $res->execute();
    
            if (!$res) {
                die($conn->error);
            }
            else{
                echo "<script>window.location.href='patient-records.php?update=Updated Successfully'</script>";
            }
        }
    }
}
?>
