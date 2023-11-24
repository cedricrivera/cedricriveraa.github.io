<?php
include 'Admin/connection/connection.php';

// Query for Male count
$queryMale = "SELECT COUNT(*) AS total FROM patient_details WHERE Sex = 'Male'";
$stmtMale = $conn->prepare($queryMale);
$stmtMale->execute();  
$resultMale = $stmtMale->fetch(PDO::FETCH_ASSOC);
$totalMale = $resultMale['total'];

// Query for Female count
$queryFemale = "SELECT COUNT(*) AS total FROM patient_details WHERE Sex = 'Female'";
$stmtFemale = $conn->prepare($queryFemale);
$stmtFemale->execute();  
$resultFemale = $stmtFemale->fetch(PDO::FETCH_ASSOC);
$totalFemale = $resultFemale['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Sex', 'Count'],
                ['Male', <?php echo $totalMale; ?>],
                ['Female', <?php echo $totalFemale; ?>],
            ]);

            var options = {
                title: 'Distribution of Male and Female Patients',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>

    <div id="piechart1" style="width: 900px; height: 500px;"></div>

    <div>
        <p>Total Male: <?php echo $totalMale; ?></p>
        <p>Total Female: <?php echo $totalFemale; ?></p>
    </div>
    
</body>
</html>
