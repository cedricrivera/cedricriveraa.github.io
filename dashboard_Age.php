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

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <!-- Create a div to contain the chart -->
    <div id="chartContainer" style="width: 400px; height: 400px;">
        <canvas id="myPieChart"></canvas>
    </div>

    <script>
        // Get the data from PHP
        var totalAgeLessThan15 = <?php echo $totalAgeLessThan15; ?>;
        var totalAgeGreaterThan15 = <?php echo $totalAgeGreaterThan15; ?>;

        // Create a pie chart using Chart.js
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Age < 15', 'Age > 15'],
                datasets: [{
                    data: [totalAgeLessThan15, totalAgeGreaterThan15],
                    backgroundColor: ['#61677A', '#C70039'],
                }],
            },
            options: {
                title: {
                    display: true,
                    text: 'Distribution of Ages',
                },
            },
        });
    </script>

    <p>Total Age > 15: <?php echo $totalAgeGreaterThan15; ?></p>
    <p>Total Age < 15: <?php echo $totalAgeLessThan15; ?></p>

</body>
</html>
