<?php
require "Admin/connection/connection.php";

// Fetch data from the database
$query = "SELECT TOP 5 place_expo, COUNT(place_expo) AS exposure_count FROM patient_records GROUP BY place_expo ORDER BY exposure_count DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare data for JavaScript
$labels = array();
$values = array();

foreach ($data as $row) {
    $labels[] = $row['place_expo'];
    $values[] = $row['exposure_count'];
}

// Convert PHP arrays to JavaScript arrays
$labels_js = json_encode($labels);
$values_js = json_encode($values);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Exposure Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 80%; margin: auto;">
        <canvas id="animalChart"></canvas>
    </div>

    <script>
        // Use Chart.js to create a column chart
        var ctx = document.getElementById('animalChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo $labels_js; ?>,
                datasets: [{
                    label: 'Top Barangay Animal Exposure',
                    data: <?php echo $values_js; ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'black',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
