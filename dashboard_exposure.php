<?php
    include 'Admin/connection/connection.php';

    try {
        // Dog exposure
        $query1 = "SELECT COUNT(*) as total_count_Dog FROM patient_records WHERE source_expo = 'Dog'";
        $stmt = $conn->prepare($query1);
        $stmt->execute();
        $stmttotalDog = $stmt->fetch(PDO::FETCH_ASSOC);

        // Stray dog exposure
        $query2 = "SELECT COUNT(*) as total_count_Straydog FROM patient_records WHERE source_expo = 'Stray Dog'";
        $stmt = $conn->prepare($query2);
        $stmt->execute();
        $stmttotalstrayDog = $stmt->fetch(PDO::FETCH_ASSOC);

        // Cat exposure
        $query3 = "SELECT COUNT(*) as total_count_Cat FROM patient_records WHERE source_expo = 'Cat'";
        $stmt = $conn->prepare($query3);
        $stmt->execute();
        $stmttotalCat = $stmt->fetch(PDO::FETCH_ASSOC);

        // Stray cat exposure
        $query4 = "SELECT COUNT(*) as total_count_StrayCat FROM patient_records WHERE source_expo = 'Stray Cat'";
        $stmt = $conn->prepare($query4);
        $stmt->execute();
        $stmttotalstrayCat = $stmt->fetch(PDO::FETCH_ASSOC);

        // Stray_Dog_Exposure
        $totalstraydog = $stmttotalstrayDog['total_count_Straydog'];

        // Dog exposure
        $totalDogs = $stmttotalDog['total_count_Dog'] + $stmttotalstrayDog['total_count_Straydog'];

        // Stray_Cat_Exposure 
        $totalstraycat = $stmttotalstrayCat['total_count_StrayCat'];

        // Cat exposure
        $totalCats = $stmttotalCat['total_count_Cat'] + $stmttotalstrayCat['total_count_StrayCat'];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Records Chart</title>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <div id="chartContainer" style="width: 400px; height: 400px;">
        <canvas id="pieChart"></canvas>
    </div>

    <!-- <canvas id="pieChart" width="900" height="500"></canvas> -->

    <div>
        <p>Total Dog Exposure: <?php echo $totalDogs; ?></p>
        <p>Total Stra Dog Exposure: <?php echo $totalstraydog; ?> </p>
        <p>Total Cat Exposure: <?php echo $totalCats; ?> </p>
        <p>Total Stray Cat Exposure: <?php echo $totalstraycat; ?> </p>

    </div>

    <script>
        // Use Chart.js to draw the pie chart
        var ctx = document.getElementById('pieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Dog', 'Cat'],
                datasets: [{
                    data: [<?php echo $totalDogs; ?>, <?php echo $totalCats; ?>],
                    backgroundColor: ['#4F4A45', '#CE5A67'],
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
