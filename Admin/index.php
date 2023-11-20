<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    // public static $userid = $_GET['id'];
    include 'connection/connection.php';

        $query = "SELECT
            SUM(CASE WHEN age < 15 THEN 1 ELSE 0 END) AS total_age_less_than_15,
            SUM(CASE WHEN age > 15 THEN 1 ELSE 0 END) AS total_age_greater_than_15
            FROM
            patient_details
            GROUP BY age";

        $stmt = $conn->prepare($query);
        $stmt->execute();  
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Age Range', 'Count'],
            <?php foreach($arr as $key=>$val) {?>
                ['Age < 15', <?php echo $val['total_age_less_than_15']?>],
                ['Age > 15', <?php echo $val['total_age_greater_than_15']?>],
            <?php } ?>
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

