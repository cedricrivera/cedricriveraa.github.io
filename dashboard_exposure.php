<!DOCTYPE html>
<html>
<head>
    <title>Patient Records Visualization</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js library -->
</head>
<body>

<div style="width: 50%;">
    <canvas id="exposureChart"></canvas>
</div>

<?php
    include 'Admin/connection/connection.php';

    try {
        // Fetch data for different exposures
        $queryDog = "SELECT COUNT(*) as total_count_Dog FROM patient_records WHERE source_expo = 'Dog'";
        $stmt = $conn->prepare($queryDog);
        $stmt->execute();
        $totalDog = $stmt->fetch(PDO::FETCH_ASSOC)['total_count_Dog'];

        $queryStrayDog = "SELECT COUNT(*) as total_count_Straydog FROM patient_records WHERE source_expo = 'Stray Dog'";
        $stmt = $conn->prepare($queryStrayDog);
        $stmt->execute();
        $totalStrayDog = $stmt->fetch(PDO::FETCH_ASSOC)['total_count_Straydog'];

        $queryCat = "SELECT COUNT(*) as total_count_Cat FROM patient_records WHERE source_expo = 'Cat'";
        $stmt = $conn->prepare($queryCat);
        $stmt->execute();
        $totalCat = $stmt->fetch(PDO::FETCH_ASSOC)['total_count_Cat'];

        $queryStrayCat = "SELECT COUNT(*) as total_count_StrayCat FROM patient_records WHERE source_expo = 'Stray Cat'";
        $stmt = $conn->prepare($queryStrayCat);
        $stmt->execute();
        $totalStrayCat = $stmt->fetch(PDO::FETCH_ASSOC)['total_count_StrayCat'];

        // Use fetched data to populate JavaScript variables
        echo "<script>";
        echo "var totalDogs = $totalDog;";
        echo "var totalCats = $totalCat;";
        echo "var totalStrayDogs = $totalStrayDog;";
        echo "var totalStrayCats = $totalStrayCat;";
        echo "</script>";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>

<script>
    // Draw the pie chart using Chart.js
    var ctx = document.getElementById('exposureChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Dog', 'Cat', 'Stray Dog', 'Stray Cat'],
            datasets: [{
                data: [totalDogs, totalCats, totalStrayDogs, totalStrayCats],
                backgroundColor: ['#4F4A45', '#CE5A67', 'red', 'orange'],
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Distribution of Patient Records by Source of Exposure'
            }
        }
    });
</script>

</body>
</html>
