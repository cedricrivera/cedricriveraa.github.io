<?php  

if (isset($_GET['deleteid'])) {
    include '../connection/connection.php';
    $delete = $_GET['deleteid'];

    try {
        $conn->beginTransaction();

        $query = "DELETE FROM patient_records WHERE patient_detID =  ?";
        $res = $conn->prepare($query);
        $res->execute([$delete]);

        $query = "DELETE FROM patient_details WHERE patient_detID = ?";
        $res = $conn->prepare($query);
        $res->execute([$delete]);

        $conn->commit();
        echo "<script>window.location.href='../patient-records.php?delete=Delete successfully'</script>";
        
    } catch (Exception $e) {
        $conn->rollBack();
        die("Error: " . $e->getMessage());
    }
} elseif(isset($_GET['appid'])){

    include '../connection/connection.php';
    $appid = $_GET['appid'];

    $sql = "DELETE FROM patient_records WHERE AppointID = $appid";
    $res = $conn->prepare($sql);
    $res->execute();

    if($res){
        echo "<script>window.location.href='../patient-records.php?delete=Delete successfully'</script>";
    }
    else{
      echo "Error: " . $conn->errorInfo()[2];
    }
}
?>