<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    // public static $userid = $_GET['id'];
    include 'connection/connection.php';


    // Query for ages less than 15
    $queryLessThan15 = "SELECT COUNT(*) AS total FROM patient_details WHERE age < 15";
    $stmtLessThan15 = $conn->prepare($queryLessThan15);
    $stmtLessThan15->execute();  
    $resultLessThan15 = $stmtLessThan15->fetch(PDO::FETCH_ASSOC);
    $totalAgeLessThan15 = $resultLessThan15['total'];

    // Query for ages greater than 15
    $queryGreaterThan15 = "SELECT COUNT(*) AS total FROM patient_details WHERE age > 15";
    $stmtGreaterThan15 = $conn->prepare($queryGreaterThan15);
    $stmtGreaterThan15->execute();  
    $resultGreaterThan15 = $stmtGreaterThan15->fetch(PDO::FETCH_ASSOC);
    $totalAgeGreaterThan15 = $resultGreaterThan15['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
</head>
<body>    
    <?php include 'php/stats.php' ?>
    <?php include "nav.php"; ?>
    <main class="main">
        <div id="Dashboard">
            <div class="user-account">
                <i class="fa-solid fa-users"></i>
                <?php
                 if(!empty($user_acc)){
                ?>
                <h2><?php echo $user_acc['User_Counts'] ?></h2>
                <?php }  else {
                    0;
                }?>
                <p>Total User Accounts</pack>
            </div>
            <div class="appointment-records">
                <i class="fa-solid fa-calendar-check"></i>
                <?php
                 if(!empty($appoint)){
                ?>
                <h2><?php echo $appoint['Appointment'] ?></h2>
                <?php }  else {
                    0;
                }?>
                <p>Total Appointments</p>
            </div>
            <div id="piechart1" style="width: 100%; height: 100%;"></div>            
        </div>
    </main>
</body>
<script>
    // google.charts.load('current', {'packages':['corechart']});
    // google.charts.setOnLoadCallback(drawChart);

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

        
        function drawChart() {
                var data = google.visualization.arrayToDataTable([
            ['Age Range', 'Count'],
            ['Age < 15', <?php echo $totalAgeLessThan15; ?>],
            ['Age > 15', <?php echo $totalAgeGreaterThan15; ?>],
            ]);

            var options = {
            title: 'Distribution of Ages',
            pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

            chart.draw(data, options);
        }
</script>
</html>

