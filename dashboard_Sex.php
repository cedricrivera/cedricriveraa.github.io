<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
</head>
<body>

    <div id="chartContainer" style="width: 400px; height: 400px;">
        <canvas id="pieChart"></canvas>
    </div>

    <!-- <canvas id="pieChart" width="900" height="500"></canvas> -->

    <div>
        <p>Total Male: <?php echo $totalMale; ?></p>
        <p>Total Female: <?php echo $totalFemale; ?></p>
    </div>

    <script>
        // Use Chart.js to draw the pie chart
        var ctx = document.getElementById('pieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    data: [<?php echo $totalMale; ?>, <?php echo $totalFemale; ?>],
                    backgroundColor: ['#427D9D', '#F875AA'],
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Distribution of Male and Female Patients'
                }
            }
        });
    </script>
</body>
</html>
