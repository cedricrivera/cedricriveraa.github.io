<?php

    include 'Admin/connection/connection.php';


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
    <title>Document</title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
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
</head>
<body>

    <div id="piechart1" style="width: 900px; height: 500px;"></div>

    <p>Total Age > 15 : <?php echo $totalAgeGreaterThan15; ?></p>
    <p>Total Age < 15 : <?php echo $totalAgeLessThan15; ?></p>

</body>
</html>
