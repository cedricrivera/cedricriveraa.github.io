<?php
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
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